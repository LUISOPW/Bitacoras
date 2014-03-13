<?php
include('modulos.php');
if ($formulario->verificar_usuario()){
	session_unset();
	session_destroy();
	header ('Location:index.php');
} else {
	header ('Location:index.php');
}
?>