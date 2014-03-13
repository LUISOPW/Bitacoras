<?php 
include('libreria.php');

//$maestro = $_POST['maestro'];

if(empty($_POST['add'])){
$mat = $_POST['mat'];
$mat_hr_ini = $_POST['mat_ini'];
$mat_hr_fin = $_POST['mat_fin'];
$mat_grupo = $_POST['mat_grupo'];
$maestro = $_POST['maestro'];
$periodo = $_POST['inputperiodo'];
$mat_carrera = $_POST['mat_carreras'];

$alta_materias->ingresar_horario_mat($mat,$mat_hr_ini,$mat_hr_fin,$maestro,$mat_grupo,$periodo,$mat_carrera);
header('Location:LOGEO_PANEL_MAESTRO.html');
}else{
$mat = $_POST['mat'];
$mat_hr_ini = $_POST['mat_ini'];
$mat_hr_fin = $_POST['mat_fin'];
$mat_grupo = $_POST['mat_grupo'];
$maestro = $_POST['maestro'];
$periodo = $_POST['inputperiodo'];
$add = $_POST['add'];
$add_ini = $_POST['add_ini'];
$add_fin = $_POST['add_fin'];
$add_grupo = $_POST['add_grupo'];
$add_carrera = $_POST['add_carreras'];
$mat_carrera = $_POST['mat_carreras'];
$alta_materias->ingresar_horario_mat($mat,$mat_hr_ini,$mat_hr_fin,$maestro,$mat_grupo,$periodo,$mat_carrera);
$alta_materias->ingresar_horario_add($add,$add_ini,$add_fin,$maestro,$add_grupo,$periodo,$add_carrera);
header('Location:LOGEO_PANEL_MAESTRO.html');
	
}

//$cantidad_hr_inic = count($mat_hr_ini);
//$contador = 0;

//while($contador < $cantidad_hr_inic){
//echo "{$mat_hr_ini[$contador]}";
//$contador++;
//}
?>