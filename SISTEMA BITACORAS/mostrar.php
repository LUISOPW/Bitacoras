<?php
include('libreria.php');
$nick = $_POST['nick'];
$contrasena = $_POST['contrasena'];
if($logeo->conectar_verificar($nick,$contrasena)){	

	header('Location:PANEL_MAESTRO.php');
}else{
	header('Location:LOGEO_PANEL_MAESTRO.html');
}
?>

