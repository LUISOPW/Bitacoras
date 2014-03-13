<?php
include('libreria.php');
if ($logeo->verificar_usuario()){
	session_unset();
	session_destroy();
	header ('Location:LOGEO_PANEL_MAESTRO.html');
}
?>

