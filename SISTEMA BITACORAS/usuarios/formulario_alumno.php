<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registro</title>
</head>
<body>

	<?
	include('conexiones.php');
	if($logeo->verificar_usuario()){
		echo "Bienvenido".$_SESSION['usuario'];

	}else{
		echo "No hay logeo";
	}


	?>

	
</body
></html>