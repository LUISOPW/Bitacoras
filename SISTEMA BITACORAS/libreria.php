<?php
/////////////////////////////////////////// CLASSE DAR DE ALTA MAESTRO ////////////////////////////////////////////

class Registro{
	private $host = "localhost";
	private $usuario = "root";
	private $contrasena = "";

	public function __construct(){
		$conexion = mysql_connect($this->host,$this->usuario,$this->contrasena) or die("ERROR EN LA CONEXION");
		mysql_select_db('laboratorio',$conexion);
	}
	public function Registrar($nom,$ape_mat,$ape_pat,$matricula,$nacimiento,$espe,$jefa){
		$sql = "insert into maestros values('','$nom','$ape_pat','$ape_mat','$matricula','$nacimiento','$espe','$jefa')";
		mysql_query($sql);
	}
}
$registro = new Registro();

////////////////////////////////// CLASSE DAR DE ALTA MATERIAS ////////////////////////////////////////////////7
    

class Alta_Materias{

	private $host = "localhost";
	private $usuario = "root";
	private $contrasena = "";

	//public function __construct(){
	//	$conexion = mysql_connect($this->host,$this->usuario,$this->contrasena) or die("ERROR EN LA CONEXION");
	//	mysql_select_db('laboratorio',$conexion);
	//}

    function Buscar($b){
       		$conexion = mysql_connect('localhost','root','') or die("ERROR EN LA CONEXION");
			mysql_select_db('laboratorio',$conexion);

            $sql = mysql_query("SELECT * FROM materias WHERE nombre LIKE '%".$b."%'",$conexion);
            $array = mysql_num_rows($sql);
            if($array == 0){
                  echo "No se han encontrado resultados para '<b>".$b."</b>'.";
            }else{
                  while($row=mysql_fetch_array($sql)){
                        $nombre = $row['nombre'];
                        $id = $row['id_materia'];
                        echo "<a href='#' class='resultadoa' id='".$id."'>".$nombre."</a>";    
                  }
            }
    }
	
	function Buscar_id($num_control){
		$conexion = mysql_connect('localhost','root','') or die("ERROR EN LA CONEXION");
		mysql_select_db('laboratorio',$conexion);
		$sql = "select id_maestro from maestros where matricula = '$num_control'";
		$resultado = mysql_query($sql,$conexion);
		$id = mysql_fetch_array($resultado);
		echo $id['id_maestro'];
	}

	function Ingresar_Horarios($materias){
			$conexion = mysql_connect('localhost','root','') or die("ERROR EN LA CONEXION");
			mysql_select_db('laboratorio',$conexion);
			$no_materias = count($materias);
			$contador  = 1;
			while($contador < $no_materias){
				$busca_id_materia = "select id_materia from materias where nombre = '$materias[$contador]'";
				$resultado = mysql_query($busca_id_materia);
				$resultado_b = mysql_fetch_array($resultado);
				
				//echo $resultado_b['id_materia'];

				$sql = "insert into horarios values('','$materias[0]','$resultado_b[id_materia]','','','','','')";
				mysql_query($sql);
				$contador++;
			}
	}

	function construir_formularios($materias){
		$conexion = mysql_connect('localhost','root','') or die("ERROR EN LA CONEXION");
		mysql_select_db('laboratorio',$conexion);
		$no_materias = count($materias);
			$contador  = 1;
			while($contador < $no_materias){
				$sql = "";
				echo "<div class='content'>

					<input type='text' value='".$materias[$contador]."' class='agregadoa' readonly name='mat[]'/>
					<input type='time' class='time' id='ini' name='mat_ini[]'/>
            		<input type='time' class='time' id='fin' name='mat_fin[]'/>
            		<input type='text' class='grupo' id='grupo' name='mat_grupo[]'/>

            		<select class='carreras' name='mat_carreras[]'>
						<option value='ingenieria en sistmas computacionales' class='carrera'>ingenieria en sistmas computacionales</option>
						<option value='ingenieria industrial' class='carrera'>ingenieria industrial</option>
						<option value='ingenieria electromecanica' class='carrera'>ingenieria electromecanica</option>
						<option value='ingenieria mecatronica' class='carrera'>ingenieria mecatronica</option>
						<option value='ambiental' class='carrera'>ambiental</option>
						<option value='ingenieria en materiales' class='carrera'>ingenieria en materiales</option>
						<option value='ingenieria en gestion empresarial' class='carrera'>ingenieria en gestion empresarial</option>
						<option value='ingenieria en tecnologias de informacion y comunicaciones' class='carrera'>ingenieria en tecnologias de informacion y comunicaciones</option>
						<option value='ingenieria quimica' class='carrera'>ingenieria quimica</option>
						<option value='ingenieria civil' class='carrera'>ingenieria civil</option>
						<option value='licenciatura en administracion' class='carrera'>licenciatura en administracion</option>
            		</select>

				</div>";
				$contador++;
		}
	}

	function ingresar_horario_mat($mat,$mat_hr_ini,$mat_hr_fin,$maestro,$mat_grupo,$periodo,$mat_carreras){
		$conexion = mysql_connect('localhost','root','') or die("ERROR EN LA CONEXION");
		mysql_select_db('laboratorio',$conexion);		
		$mat_conteo = count($mat);
		$contador = 0;

		while($contador < $mat_conteo){

			$id_materia = "select id_materia from materias where nombre = '$mat[$contador]'";
			$id_materia_resultado = mysql_query($id_materia);
			$res = mysql_fetch_array($id_materia_resultado);
			$sql = "update horarios set hr_inicio = '$mat_hr_ini[$contador]',hr_final = '$mat_hr_fin[$contador]',grupo = '$mat_grupo[$contador]',periodo = '$periodo',carrera = '$mat_carreras[$contador]' where id_maestro = '$maestro' and id_materia = '$res[id_materia]'";
			mysql_query($sql);
			$contador++;
		}
	}

	function ingresar_horario_add($add,$add_ini,$add_fin,$maestro,$add_grupo,$periodo,$add_carreras){
		$conexion = mysql_connect('localhost','root','') or die("ERROR EN LA CONEXION");
		mysql_select_db('laboratorio',$conexion);		
		$add_conteo = count($add);
		$contador = 0;	
		while($contador < $add_conteo){
			$id_materia = "select id_materia from materias where nombre = '$add[$contador]'";
			$id_materia_resultado = mysql_query($id_materia);
			$res = mysql_fetch_array($id_materia_resultado);

			$sql = "insert into horarios values('','$maestro','$res[id_materia]','$add_ini[$contador]','$add_fin[$contador]','$add_grupo[$contador]','$periodo','$add_carreras[$contador]')";
			mysql_query($sql);
			$contador++;
		}

	}

}
$alta_materias = new Alta_Materias();


class logeo{
	Public function conectar_verificar($nick,$contrasena){
		$conexion = mysql_connect('localhost','root','');
		mysql_select_db('laboratorio',$conexion);
		$sql = "select * from maestros where matricula= '$nick' and nacimiento = '$contrasena'";
		$verificacion = mysql_query($sql);
		if(mysql_num_rows($verificacion)!=0){
			session_start();
			$_SESSION['usuario'] = $nick;
			$_SESSION['clave_sesion'] = $this->genera_id(10);
			//$_SESSION['hora'] = $this->obtener_hora_completa();
			return true;
		}else{
			return false;
		}
	}

/*	Public function prueba($nick,$contrasena){
		$conexion = mysql_connect('localhost','root','');
		mysql_select_db('laboratorio',$conexion);
		$sql = "select * from maestros where matricula= '$nick' and nacimiento = '$contrasena'";
		$verificacion = mysql_query($sql);
		$row = mysql_fetch_array($verificacion);
	}*/
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
	Public function obtener_grupo($matricula){
		date_default_timezone_set("America/Mexico_City");
		$hr = date("H:i:s");
		$sql_id_maestro = "select id_maestro from maestros where matricula = '$matricula'";
		$resultado = mysql_query($sql_id_maestro);
		$id_maestro = mysql_fetch_array($resultado);
		$sql_horarios = "select id_horario,hr_inicio,hr_final from horarios where id_maestro = '$id_maestro[0]'";
		$resultado2 = mysql_query($sql_horarios);
		while ($row = mysql_fetch_row($resultado2)){ 
				if($hr > $row[1] and $hr < $row[2]){
					$sql = "select id_materia,grupo from horarios where id_horario = '$row[0]'";
					$sql_resultado = mysql_query($sql);
					$mat_grup = mysql_fetch_array($sql_resultado);
					return $mat_grup[1];
				}
		}	
	}
	
	Public function obtener_periodo($matricula){
		date_default_timezone_set("America/Mexico_City");
		$hr = date("H:i:s");
		$sql_id_maestro = "select id_maestro from maestros where matricula = '$matricula'";
		$resultado = mysql_query($sql_id_maestro);
		$id_maestro = mysql_fetch_array($resultado);
		$sql_horarios = "select id_horario,hr_inicio,hr_final from horarios where id_maestro = '$id_maestro[0]'";
		$resultado2 = mysql_query($sql_horarios);
		while($row = mysql_fetch_array($resultado2)){
			if($hr > $row[1] and $hr < $row[2]){
				$periodo = "select periodo from horarios where id_horario = '$row[0]'";
				$sql_periodo = mysql_query($periodo);
				$periodo_array = mysql_fetch_array($sql_periodo);
				//var_dump($periodo_array);
				return $periodo_array['periodo'];
			}
		}
	}

	Public function obtener_carrera($matricula){
		date_default_timezone_set("America/Mexico_City");
		$hr = date("H:i:s");
		$sql_id_maestro = "select id_maestro from maestros where matricula = '$matricula'";
		$resultado = mysql_query($sql_id_maestro);
		$id_maestro = mysql_fetch_array($resultado);
		$sql_horarios = "select id_horario,hr_inicio,hr_final from horarios where id_maestro = '$id_maestro[0]'";
		$resultado2 = mysql_query($sql_horarios);
		while($row = mysql_fetch_array($resultado2)){
			if($hr > $row[1] and $hr < $row[2]){
				$periodo = "select carrera from horarios where id_horario = '$row[0]'";
				$sql_carrera = mysql_query($periodo);
				$carrera_array = mysql_fetch_array($sql_carrera);
				//var_dump($periodo_array);
				return $carrera_array['carrera'];
			}
		}
	}


	Public function obtener_materia($matricula){
		date_default_timezone_set("America/Mexico_City");
		$hr = date("H:i:s");
		$sql_id_maestro = "select id_maestro from maestros where matricula = '$matricula'";
		$resultado = mysql_query($sql_id_maestro);
		$id_maestro = mysql_fetch_array($resultado);
		$sql_horarios = "select id_horario,hr_inicio,hr_final from horarios where id_maestro = '$id_maestro[0]'";
		$resultado2 = mysql_query($sql_horarios);
		while ($row = mysql_fetch_row($resultado2)){ 
				if($hr > $row[1] and $hr < $row[2]){
					$sql = "select id_materia,grupo from horarios where id_horario = '$row[0]'";
					$sql_resultado = mysql_query($sql);
					$mat_grup = mysql_fetch_array($sql_resultado);
					$nombre_materia = "select nombre from materias where id_materia = '$mat_grup[0]'";
					$nombre = mysql_query($nombre_materia);
					$nombre_mat = mysql_fetch_array($nombre);
					return $nombre_mat[0];
				}

		} 	
		echo "ACTUALMENTE NO TIENE NINGUNA MATERIA";
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

	Public function obtener_nombre($matricula){
		$conexion = mysql_connect('localhost','root','');
		mysql_select_db('laboratorio',$conexion);
		$sql = "select nombre from maestros where matricula = '$matricula'";
		$nombre_maestro = mysql_query($sql);
		$resultado = mysql_fetch_array($nombre_maestro);
		echo $resultado['nombre'];
	}

	Public function ingresar_bitacora($clave_session,$nombre,$apellidop,$apellidom,$matricula,$id_maestro,$grupo,$materia,$periodo,$carrera){
		$conexion = mysql_connect('localhost','root','');
		mysql_select_db('laboratorio',$conexion);
		$sql = "insert into bitacoras values('','$clave_session','$nombre','$apellidop','$apellidom','$matricula','$id_maestro','$grupo','$materia','$periodo','$carrera')";
		mysql_query($sql);
		//header('Location:www.google.com');
	}

	Public function obtener_id_maestro($matricula){
		$conexion = mysql_connect('localhost','root','');
		mysql_select_db('laboratorio',$conexion);
		$sql = "select id_maestro from maestros where matricula = '$matricula'";
		$nombre_maestro = mysql_query($sql);
		$resultado = mysql_fetch_array($nombre_maestro);
		return $resultado['id_maestro'];
	}

	Public function consultar_alumnos($id_session){
		$conexion = mysql_connect('localhost','root','');
		mysql_select_db('laboratorio',$conexion);
		$sql = "select nombre,apellido_paterno,apellido_materno,matricula from bitacoras where id_sesion = '$id_session'";
		$res_alumno = mysql_query($sql);
		while ($row = mysql_fetch_row($res_alumno)){ 
			 echo "<a href='' class='nombre'>".$row[0]." ".$row[1]." ".$row[2]."</a><p class='matricula'>".$row[3]."</p>";      
			 //" ".$row[1]." ".$row[2].
		} 
	}
} // LLAVE DE LA CLASE //// LLAVE DE LA CLASE// LLAVE DE LA CLASE// LLAVE DE LA CLASE// LLAVE DE LA CLASE// LLAVE DE LA CLASE// LLAVE DE LA CLASE// LLAVE DE LA CLASE

$logeo = new logeo();

class reportes{

	public function periodos(){
		$conexion = mysql_connect('localhost','root','');
		mysql_select_db('laboratorio',$conexion);
		$resultado = mysql_query('select distinct periodo from bitacoras');
		while ($row = mysql_fetch_row($resultado)){
			//$row['periodo'];

			echo"<div class='contentperiodo'>
					<input type='checkbox' name='periodo[]' value='".$row[0]."''>
					<label for='' class='etiqueta'>".$row[0]."</label>
				</div>";
		}
		
	}

}
$Reportes = new reportes();

class bitacora_alumno{
	function agregar($id_session,$id_maestro,$grupo,$nom_mat,$periodo,$carrera){
		$conexion = mysql_connect('localhost','root','');
		mysql_select_db('laboratorio',$conexion);
		$sql = "insert into sesiones values('','$id_session','$id_maestro','$grupo','$nom_mat','$periodo','$carrera')";
		mysql_query($sql);
	}
	function verificar_sesion($_clave){
		$conexion = mysql_connect('localhost','root','');
		mysql_select_db('laboratorio',$conexion);
		$consulta =  "select id_sesion from sesiones where id_sesion = '$_clave'";
		$sesion = mysql_query($consulta);
		if(mysql_num_rows($sesion)!=0){
			return true;
		}else{
			return false;
		}
	}
	function ingresar_bitacora($clave_session,$nombre,$apellidop,$apellidom,$matricula){
		$conexion = mysql_connect('localhost','root','');
		mysql_select_db('laboratorio',$conexion);
		$consulta = "select * from sesiones where id_sesion = '$clave_session'";
		$_result = mysql_query($consulta);
		$_array = mysql_fetch_array($_result);
		$insertar = "insert into bitacoras values('','$clave_session','$nombre','$apellidop','$apellidom','$matricula','$_array[id_maestro]','$_array[grupo]','$_array[nombre_materia]','$_array[periodo]','$_array[carrera]')";
		mysql_query($insertar);
	}

}
$bitacora = new bitacora_alumno();
?>