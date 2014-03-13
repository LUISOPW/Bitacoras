<?php
include('conexiones.php');
if ($logeo->verificar_usuario()){
	session_unset();
	session_destroy();
	header ('Location:logeo.php');
}

?>

