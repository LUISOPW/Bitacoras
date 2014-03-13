<?php
include('libreria.php');
$nick = $_POST['nick'];
$contrasena = $_POST['contrasena'];
if($logeo->conectar_verificar($nick,$contrasena)){	
	header('Location:PANEL_PROFESOR.php');
}else{
	header('Location:logeo.php');
}
?>

