<?php
include('modulos.php');
if($formulario->login($_POST['usuario'],$_POST['password'])){
	header('Location:index.php');
}else{
	header('Location:index.php');
}

?>
