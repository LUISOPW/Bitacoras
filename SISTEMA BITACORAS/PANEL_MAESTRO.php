<?php
include('libreria.php');
if($logeo->verificar_usuario()){
	//sleep(2);
	//header('Location:logeo.php';
}else{
	header('Location:LOGEO_PANEL_MAESTRO.html');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Panel maestro</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilomaestro.css">
	<script type="text/javascript" src="jquery-1.10.2.min.js"></script>
</head>
<body>
	<nav id="navegacion">
		<ul>
			<li>
				<a href="cerrar.php">
					<span>
						<img src="imagenes/logoutgray.png">
					</span>
					Salir
				</a>
			</li>
			<li>
				<a href="">
					<span>
						<img src="imagenes/helpgray.png">
					</span>
					Ayuda
				</a>
			</li>
		</ul>
	</nav>

<section id="contenedor">
<!-- inicia bloque de datos -->
	<section id="datos">
		<div>
			<img src="imagenes/USUARIO.jpg">
		</div>

		<h1><?php $logeo->obtener_nombre($_SESSION['usuario']); ?></h1>
		<h2> <strong><?php echo $logeo->obtener_materia($_SESSION['usuario']);?></strong> </h2>
		<h3><?php echo $logeo->obtener_grupo($_SESSION['usuario']); ?></h3>
		<div id="periodo"><?php echo $logeo->obtener_periodo($_SESSION['usuario']); ?></div>
		<div id="carrera"><?php echo $logeo->obtener_carrera($_SESSION['usuario']); ?></div>



	</section>
<!-- inicia el bloque de sesion -->
	<section id="sesion">
		<p>
			<strong>Numero de sesion</strong>
		</p>
		<p id="idsesion"><?php echo $_SESSION['clave_sesion'];?></p>
	</section>


<!-- inicia el bloque de alumnos -->
	<section id="alumnos">
		<div id="veralumnos">
			<a href="" onclick="window.location.reload()" id="actualizar">
				
			</a>
		</div>
		<div id="listalumnos">
			<?php 
			$logeo->consultar_alumnos($_SESSION['clave_sesion']);
			?>
		</div>
		
	</section>
</section>
<?php 
	if(!$bitacora->verificar_sesion($_SESSION['clave_sesion'])){
	$bitacora->agregar($_SESSION['clave_sesion'],$_SESSION['usuario'],$logeo->obtener_grupo($_SESSION['usuario']),$logeo->obtener_materia($_SESSION['usuario']),$logeo->obtener_periodo($_SESSION['usuario']),$logeo->obtener_carrera($_SESSION['usuario']));
	}else{

	}

 ?>
</body>
</html>