<?php
include('modulos.php');
$_SESSION['ocarrito']->elimina_producto($_GET['linea']);
header('Location:productos.php');

?>