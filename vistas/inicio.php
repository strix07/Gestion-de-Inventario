<?php 
	session_start();
	if(isset($_SESSION['usuario'])){
		
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>inicio</title>
	<?php require_once "menu.php"; ?>
   <link rel="stylesheet" href="../css/inicio.css">
 <style>

        .proyecto h1, h2, p, ul {
            margin-bottom: 20px;
        }
        body {
        background-color: transparent; 
      }
    </style>
</head>
<body>
    <div class="container">
        <div class="proyecto">
            <h1 class="display-4">Bienvenido al Sistema de Gestión de Inventario y Ventas</h1>

            <h2 class="mb-4">Descripción del Proyecto</h2>
            <p class="lead">¡Hola! Mi nombre es Adrian Mayora y estoy emocionado de presentarte mi proyecto de sistema de gestión de inventario y ventas.</p>

            <h2 class="mb-4">Características Principales</h2>
            <ul class="list-group mb-4">
                <li class="list-group-item"><label>Registro de productos: </label> Permite agregar nuevos productos al inventario especificando detalles como nombre, descripción, cantidad, precio, etc.</li>
                <li class="list-group-item"><label>Visualización de inventario:</label> Muestra una lista completa de todos los productos disponibles en el inventario con detalles relevantes.</li>
                <li class="list-group-item"><label>Actualización de productos:</label> Permite modificar la información de los productos existentes, como su nombre, cantidad, precio, etc.</li>
                <li class="list-group-item"><label>Eliminación de productos: </label>Permite eliminar productos del inventario que ya no están disponibles o que ya no se desean mantener.</li>
                <li class="list-group-item"><label>Funcionalidad de búsqueda: </label>Proporciona una forma rápida y eficiente de buscar productos dentro del inventario.</li>
                <li class="list-group-item"><label>Generación de facturas y reportes:</label> Crea archivos PDF detallados con la información de las ventas y reportes de actividad, brindando una herramienta profesional para el análisis y la contabilidad.</li>
                <li class="list-group-item"><label>Inicio de sesión seguro: </label>Implementa un sistema de inicio de sesión que garantiza la seguridad y privacidad de los datos del usuario.</li>
            </ul>

            <h2 class="mb-4">Tecnologías Utilizadas</h2>

            <ul class="list-group mb-4">
                <li class="list-group-item"><label>PHP: </label>Para el desarrollo del backend y la lógica de negocio.</li>
                <li class="list-group-item"><label>SQL: </label>Para la gestión de la base de datos y consultas.</li>
                <li class="list-group-item"><label>HTML: </label>Para la estructura y presentación de la interfaz de usuario.</li>
                <li class="list-group-item"><label>JavaScript: </label>Para la interactividad y dinamismo en la interfaz de usuario.</li>
            </ul>

            <h2 class="mb-4">Objetivo del Proyecto</h2>
            <p class="lead">El objetivo principal de este proyecto es proporcionar a las empresas una herramienta eficiente para gestionar su inventario de manera organizada y efectiva. Con esta aplicación, las empresas pueden llevar un registro detallado de sus productos, realizar un seguimiento de las existencias y realizar acciones como agregar, actualizar o eliminar productos según sea necesario además de llevar un control de las ventas realizadas.</p>

            <h2 class="mb-4">¡En busca de Oportunidades!</h2>
            <p class="lead">Estoy buscando oportunidades para colaborar y contribuir con mi experiencia en el desarrollo de sistemas web. Si te interesa mi proyecto y crees que puedo ser un activo para tu empresa, ¡no dudes en contactarme! Estoy emocionado de formar parte de un equipo apasionado por la tecnología y la innovación.</p>

            <p class="lead">¡Gracias por tu tiempo y consideración! Para más información visiten <a href="https://adrian-mayora-cv.netlify.app">Mi Página Web</a></p>
        </div>
    </div>
</body>
</html>
<?php 
	}else{
		header("location:../index.php");
	}
 ?>