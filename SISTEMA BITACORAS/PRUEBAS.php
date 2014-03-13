<?php 
		$conexion = mysql_connect('localhost','root','');
		mysql_select_db('laboratorio',$conexion);
		$sql = "select nacimiento from maestros";
		$verificacion = mysql_query($sql);
		$row = mysql_fetch_array($verificacion);
		echo $row['nacimiento'];
 ?>