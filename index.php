<?php 
	// 1. Establece una conexión a la base de datos.
	require_once "clases/Conexion.php";

	// 2. Ejecuta una consulta SQL para verificar si existe un usuario con el email 'admin' en la tabla 'usuarios'.
	$obj= new conectar();
	$conexion=$obj->conexion();

	$sql="SELECT * from usuarios where email='admin'";
	$result=mysqli_query($conexion,$sql);

	// 3. Define una variable llamada $validar, que se establece en 1 si se encuentra al menos un registro con el email 'admin', de lo contrario se mantiene en 0.
	$validar=0;
	if(mysqli_num_rows($result) > 0){
		$validar=1;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login de usuario</title>
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css"> 
  <link rel="stylesheet" href="css/style.css"> 
	<script src="librerias/jquery-3.2.1.min.js"></script>
	<script src="js/funciones.js"></script>
</head>
<body style="background-color: white">
	<br><br><br>
	<div class="container">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<div class="panel panel-primary">
					<div class="panel panel-heading">Sistema de ventas y almacen</div>
					<div class="panel panel-body">
						<div class="imgcon">
							<img class="logo" src="img/logo.jpg">
            </div>
						<!-- Formulario de inicio de sesión -->
						<form id="frmLogin">
							<label>Usuario</label>
							<input type="text" class="form-control input-sm" name="usuario" id="usuario">
							<label>Contraseña</label>
							<input type="password" name="password" id="password" class="form-control input-sm">
							<p></p>
							<span class="btn btn-primary btn-sm" id="entrarSistema">Entrar</span>
							<!-- 5. Si la variable $validar es falsa (0), muestra un botón para registrar un nuevo usuario. -->
							<?php  if(!$validar): ?>
							<a href="registro.php" class="btn btn-danger btn-sm">Registrar</a>
							<?php endif; ?>
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
  <div class="centrar"> <p> <label>Usuario:</label> admin <label>Contraseña:</label> admin</p></div>
</body>
</html>

<!-- Script de jQuery para controlar el evento clic del botón de entrar al sistema -->
<script type="text/javascript">
	$(document).ready(function(){
		$('#entrarSistema').click(function(){
			// 6. El código JavaScript asociado al botón de "Entrar" del formulario realiza una validación de los campos del formulario y envía los datos del formulario mediante AJAX a un script llamado login.php en la carpeta 'procesos/regLogin'.
			vacios=validarFormVacio('frmLogin');
			// Si la función devuelve un valor mayor que 0, se muestra una alerta y se devuelve false para evitar el envío del formulario
			if(vacios > 0){
				alert("Debes llenar todos los campos!!");
				return false;
			}

			datos=$('#frmLogin').serialize();
			$.ajax({
				type:"POST",
				data:datos,
				url:"procesos/regLogin/login.php",
				success:function(r){
					if(r==1){
						window.location="vistas/inicio.php";
					}else{
						alert("No se pudo acceder");
					}
				}
			});
		});
	});
</script>
