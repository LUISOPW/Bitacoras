<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>registro</title>
	<link rel="stylesheet" href="css/estiloregistro.css">
</head>
<body>


<nav>
	<?php
	include('modulos.php');
	$formulario->constructor_nav();
	?>
	
</nav>
<section id="contentgeneral">
<h1>
	registro de usuario
</h1>
<section id="contenedor">
	<form action="validar_nuevo_usuario.php" method="POST">
		<input type="text" placeholder="Nick" id="" name="nick" required >
		<input type="text" placeholder="Nombre" id="nombre" name="nombre" required >
		<input type="text" placeholder="Apellidos" id="apellido" name="apellido" required >
		<input type="email" placeholder="Example@domain.com" id="email" name="email" required >
		<input type="password" placeholder="****" id="contrasena" name="contrasena" required >
		<input type="text" placeholder="Edad" id="edad" name="edad" required >
		<input type="text" placeholder="Direccion" id="direccion" name="direccion" required >
		<input type="text" placeholder="012345678" id="telefono" name="telefono" required >
		<input type="submit" value="registrame">
	</form>
</section></section>
</body>
</html>

