<?php
include('libreria.php');
if($logeo->verificar_usuario()){
	echo = "ok";
}else{
	echo "Lo sentimos la sesion no a sido iniciada";
}
?>