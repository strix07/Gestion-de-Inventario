<?php 

// Definición de la clase ventas
class ventas{
	
	// Método para obtener los datos de un producto
	public function obtenDatosProducto($idproducto){
		// Conexión a la base de datos
		$c=new conectar();
		$conexion=$c->conexion();

		// Consulta SQL para obtener los datos del producto
		$sql = "SELECT 
				    art.nombre,
				    art.descripcion,
				    art.cantidad,
				    img.ruta,
				    art.precio
				FROM
				    articulos AS art
				        INNER JOIN
				    imagenes AS img ON art.id_imagen = img.id_imagen
				        AND art.id_producto = '$idproducto'";
		$result=mysqli_query($conexion,$sql);

		// Obtener el resultado de la consulta
		$ver=mysqli_fetch_row($result);

		// Obtener la ruta de la imagen
		$d=explode('/', $ver[3]);
		$img=$d[1].'/'.$d[2].'/'.$d[3];

		// Almacenar los datos en un array
		$data=array(
			'nombre' => $ver[0],
			'descripcion' => $ver[1],
			'cantidad' => $ver[2],
			'ruta' => $img,
			'precio' => $ver[4]
		);		
		return $data;
	}

	// Método para crear una nueva venta
	public function crearVenta(){
		// Conexión a la base de datos
		$c= new conectar();
		$conexion=$c->conexion();

		// Obtener la fecha actual
		$fecha=date('Y-m-d');
		// Crear un folio único para la venta
		$idventa=self::creaFolio();
		// Obtener los datos de la sesión del usuario
		$datos=$_SESSION['tablaComprasTemp'];
		$idusuario=$_SESSION['iduser'];
		$r=0;

		// Iterar sobre los datos de los productos comprados
		for ($i=0; $i < count($datos) ; $i++) { 
			$d=explode("||", $datos[$i]);

			// Insertar la información de la venta en la base de datos
			$sql="INSERT into ventas (id_venta,
										id_cliente,
										id_producto,
										id_usuario,
										precio,
										fechaCompra)
							values ('$idventa',
									'$d[5]',
									'$d[0]',
									'$idusuario',
									'$d[3]',
									'$fecha')";
			$r=$r + $result=mysqli_query($conexion,$sql);
		}

		return $r;
	}

	// Método para crear un folio único para la venta
	public function creaFolio(){
		// Conexión a la base de datos
		$c= new conectar();
		$conexion=$c->conexion();

		// Obtener el último ID de venta
		$sql="SELECT id_venta from ventas group by id_venta desc";
		$resul=mysqli_query($conexion,$sql);
		$id=mysqli_fetch_row($resul)[0];

		// Si no hay ID de venta, se asigna 1, de lo contrario se incrementa en 1
		if($id=="" or $id==null or $id==0){
			return 1;
		}else{
			return $id + 1;
		}
	}

	// Método para obtener el nombre del cliente
	public function nombreCliente($idCliente){
		// Conexión a la base de datos
		$c= new conectar();
		$conexion=$c->conexion();

		// Consulta SQL para obtener el nombre y apellido del cliente
		$sql="SELECT apellido,nombre 
			from clientes 
			where id_cliente='$idCliente'";
		$result=mysqli_query($conexion,$sql);

		// Obtener el resultado de la consulta
		$ver=mysqli_fetch_row($result);

		// Verificar si $ver contiene datos antes de acceder a sus índices
if ($ver !== null && count($ver) >= 2) {
    // Acceder a los índices solo si $ver no es null y tiene al menos 2 elementos
    return $ver[0]." ".$ver[1];
} else {
    // Manejar el caso donde $ver es null o no tiene suficientes elementos
    return "Datos no disponibles";
}

	}

	// Método para obtener el total de la venta
	public function obtenerTotal($idventa){
		// Conexión a la base de datos
		$c= new conectar();
		$conexion=$c->conexion();

		// Consulta SQL para obtener el precio de los productos de la venta
		$sql="SELECT precio 
				from ventas 
				where id_venta='$idventa'";
		$result=mysqli_query($conexion,$sql);

		// Inicializar el total en 0
		$total=0;

		// Iterar sobre los precios de los productos
		while($ver=mysqli_fetch_row($result)){
			$total=$total + $ver[0];
		}

		return $total;
	}
}

?>
