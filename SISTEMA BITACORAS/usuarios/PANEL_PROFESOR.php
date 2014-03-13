<?php
include('conexiones.php');
if($logeo->verificar_usuario()){

	echo"Bivenido $_SESSION[usuario] <br>";
	echo"Tu clave de session es: $_SESSION[clave_sesion] <br>";
	echo $logeo->obtener_fecha_formato();
	echo "<a href=cerrar.php>Cerrar Session</a>";
	//sleep(2);
	//header('Location:logeo.php';
}else{
	header('Location:logeo.php');
}
?>
