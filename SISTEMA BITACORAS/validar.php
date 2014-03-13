<?php
include('libreria.php');
	if($logeo->verificar_usuario()){

		$clave_session = $_POST['clave'];
		$nombre = $_POST['nombre'];
		$apellidop = $_POST['apellidop'];
		$apellidom = $_POST['apellidom'];
		$matricula = $_POST['matricula'];

		//echo $_SESSION['usuario']; 
		//$logeo->obtener_id_maestro($_SESSION['usuario']);
		//$id_maestro = $logeo->obtener_id_maestro($_SESSION['usuario']);
		//echo $logeo->obtener_grupo($_SESSION['usuario']);
	

		//$materias = $logeo->obtener_materia($_SESSION['usuario']);
		//$id_maestro = $logeo->obtener_id_maestro($_SESSION['usuario']);
		if($clave_session == $_SESSION['clave_sesion']){
		$logeo->ingresar_bitacora($clave_session,$nombre,$apellidop,$apellidom,$matricula,$logeo->obtener_id_maestro($_SESSION['usuario']),$logeo->obtener_grupo($_SESSION['usuario']),$logeo->obtener_materia($_SESSION['usuario']),$logeo->obtener_periodo($_SESSION['usuario']),$logeo->obtener_carrera($_SESSION['usuario']));
		header('Location:https://www.google.com.mx/');		
		}else{
			header('Location:REGISTRO_BITACORA.php');
		}

}else{
	header('Location:RESTRINGIDO.html');
}
?>