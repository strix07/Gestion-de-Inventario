<?php
require_once '../../librerias/dompdf/autoload.inc.php';
use Dompdf\Dompdf;

require_once "../../clases/Conexion.php";
require_once "../../clases/Ventas.php";

$objv = new ventas();

$c = new conectar();
$conexion = $c->conexion();
$idventa = $_GET['idventa'];

$sql = "SELECT ve.id_venta,
                ve.fechaCompra,
                ve.id_cliente,
                art.nombre,
                art.precio
        from ventas as ve 
        inner join articulos as art
        on ve.id_producto=art.id_producto
        and ve.id_venta='$idventa'";

$result = mysqli_query($conexion, $sql);

$ver = mysqli_fetch_row($result);

$folio = $ver[0];
$fecha = $ver[1];
$idcliente = $ver[2];

$html = '
<!DOCTYPE html>
<html>
<head>
    <title>Reporte de venta</title>
    <style type="text/css">
        @page {
            margin-top: 0.3em;
            margin-left: 0.6em;
        }
        body{
            font-size: xx-small;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <p>FACTURA</p>
    <p>Fecha: '.$fecha.'</p>
    <p>Folio: '.$folio.'</p>
    <p>Cliente: '.$objv->nombreCliente($idcliente).'</p>
    <table>
        <tr>
            <td>Nombre</td>
            <td style="text-align: right;">Precio</td>
        </tr>';

$total = 0;
// Mover el puntero del resultado al inicio
mysqli_data_seek($result, 0);
while ($mostrar = mysqli_fetch_row($result)) {
    $html .= '
        <tr>
            <td>'.$mostrar[3].'</td>
            <td style="text-align: right;">$'.$mostrar[4].'</td>
        </tr>';
    $total += $mostrar[4];
}

$html .= '
        <tr>
            <td>Total:</td>
            <td style="text-align: right;">$'.$total.'</td>
        </tr>
    </table>
</body>
</html>';

$pdf = new Dompdf();
$pdf->loadHtml($html);
$pdf->set_paper(array(0, 0, 104, 250));
$pdf->render();
$pdf->stream('reporteVenta.pdf');
?>
