<?php
include('modulos.php');

$formulario->registrar($_POST['nick'],$_POST['nombre'],$_POST['apellido'],$_POST['contrasena'],$_POST['direccion'],$_POST['telefono'],$_POST['email']);
echo "Registrado Correctamente";
echo "<a href=index.php>Volver</a>";

?>
