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
                art.precio,
                art.descripcion
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
            margin-top: 5em;
            margin-left: 5em;
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
    <p>REPORTE DE VENTA</p>
    <br>
    <table>
        <tr>
            <td>Fecha: '.$fecha.'</td>
        </tr>
        <tr>
            <td>Folio: '.$folio.'</td>
        </tr>
        <tr>
            <td>Cliente: '.$objv->nombreCliente($idcliente).'</td>
        </tr>
    </table>
    <table class="table">
        <tr>
            <td>Nombre producto</td>
            <td>Precio</td>
            <td>Cantidad</td>
            <td>Descripción</td>
        </tr>';

$total = 0;
mysqli_data_seek($result, 0);
while ($mostrar = mysqli_fetch_row($result)) {
    $html .= '
        <tr>
            <td>'.$mostrar[3].'</td>
            <td>'.$mostrar[4].'</td>
            <td>1</td>
            <td>'.$mostrar[5].'</td>
        </tr>';
    $total += $mostrar[4];
}

$html .= '
        <tr>
            <td colspan="4" style="text-align: center;">Total = $'.$total.'</td>
        </tr>
    </table>
</body>
</html>';

// Crear una instancia de Dompdf
$pdf = new Dompdf();
$pdf->loadHtml($html);

// Establecer opciones de visualización del PDF (puede variar según sus necesidades)
$pdf->set_paper("letter", "portrait");

// Renderizar el HTML como PDF
$pdf->render();

// Enviar el PDF generado al navegador
$pdf->stream("reporteVenta.pdf");

// Finalizar el script
exit();
?>
