<?php
include('libreria.php');
if($logeo->verificar_usuario()){
	//sleep(2);
	header('Location:REGISTRO_BITACORA.php');
}else{
	//header('Location:RESTRINGIDO.php');
}
?>


<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>prohibido</title>
	<link rel="stylesheet" href="css/restringido.css">
</head>
<body>
	<h1>
		Error<strong> 404!</strong>
	</h1>

		<p class="exclamacion">¡Oh por Dios, ¿¡Que hiciste!?</p>
	<section id="contenedor">
		<p>
			La pagina a la que trató de acceder parece tener un error o directamente no estar permitida. La razon es:
	
		</p>
		<p>
			<strong>Estamos usando los ventiladores del procesador para refrigerar las cervezas. <br> Sea comprensible y siga trabajando
			</strong>
		</p>
		<section>
			<img src="imagenes/error404.png" alt="Error 404 | Lo que buscas no esta aquí">
		</section>
		<p>
			<!--<a href="REGISTRO_BITACORA.html">HOME</a>-->
		</p>
	</section>

</body>
</html>