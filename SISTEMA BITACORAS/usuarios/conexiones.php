<?php
class logeo{

	Public function conectar_verificar($nick,$contrasena){
		$conexion = mysql_connect('localhost','root','luis');
		mysql_select_db(laboratorio,$conexion);
		$sql = "select * from usuarios where nick_name = '$nick' and contrasena = '$contrasena'";
		$verificacion = mysql_query($sql);
		if(mysql_num_rows($verificacion)!=0){
			session_start();
			$_SESSION['usuario'] = $nick;
			$_SESSION['clave_sesion'] = $this->genera_id(10);
			$_SESSION['hora'] = $this->obtener_hora_completa();
			return true;
		}else{
			return false;
		}
	}
	//CONSULTA DE DATOS
		/*while($dato = mysql_fetch_array($verificacion)){
			echo $dato['id_usuario']."<br>";
			echo $dato['nick_name']."<br>";
			echo $dato['contrasena']."<br>";
	}*/
	Public function genera_id($longitud) { 
	    $mapa = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ"; 
	    for($i = 0; $i < $longitud; $i++) { 
	        $clave = $clave.$mapa{rand(0, 35)}; 
	    } 
	    return $clave; 
	}  
	Public function obtener_hora_completa(){
		$initDate = new DateTime();
		return $initDate->format("Y/m/d H:i:s");
	}
	/*
	function obtener_hora(){
		$a = new DateTime();
		return $a->format("H:i:s");
	}
	function obtener_fecha(){
		$a = new DateTime();
		return $a->format("Y/m/d");
	}
	*/
	Public function obtener_fecha_formato(){
		$objeto = new DateTime();
		$fecha = $objeto->format("d/m/Y"); 
		$hora = $objeto->format("h:i a"); 
		$formato_hora = "Usted fue registrado el dia ".$fecha." a las ".$hora;
		return $formato_hora;
	}
 	Public function verificar_usuario(){
		session_start();
		if (isset($_SESSION['usuario'])){
			return true;
		}
	}	
} // LLAVE DE LA CLASE //// LLAVE DE LA CLASE// LLAVE DE LA CLASE// LLAVE DE LA CLASE// LLAVE DE LA CLASE// LLAVE DE LA CLASE// LLAVE DE LA CLASE// LLAVE DE LA CLASE

$logeo = new logeo();


#Alumno :S////////////////////////////////////////////

?>