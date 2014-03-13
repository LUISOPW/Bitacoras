<html>
	<head>
		<script type="text/javascript" src="js/jscharts.js"></script>
		<link rel="stylesheet" href="css/estilorgeneral.css">
	</head>
	<body>	
	<!--<header>
			<h1>Reporte General</h1>
	</header>-->
	<section id="contenedorgrafica">
		<div id="chartcontainer">
			This is just a replacement in case Javascript is not available or used for SEO purposes
		</div>
	</section>
</body>
</html>
<?php 
   $periodo = $_POST['periodo'];
   $conexion = mysql_connect('localhost','root','');
   @mysql_query("SET NAMES 'utf8'");
	mysql_select_db('laboratorio',$conexion);
    $n = count($periodo);
    $i = 0;
    echo"<script>var periodo = new Array();</script>";
	//echo"<script>var myData = new Array();</script>";
	echo"<script>var myData = new Array();</script>";
	while($i < $n){

		echo "<script>periodo.push('{$periodo[$i]}');</script>";
		//echo "<script>document.write(periodo[$i]);</script>";

		$sql = mysql_query("select count(*) from bitacoras where periodo = '{$periodo[$i]}'");
		$row = mysql_fetch_row($sql);
			//var_dump($parrow);
		settype($row[0],"integer");
		echo"<script>myData.push(['$periodo[$i]',$row[0]])</script>";
		//echo"<script>document.write(myData[$i]);</script>";
    	$i++;
   }
?>

<script>
		// var carreras = new array(['informatica'],['sistemas'],['ambiental'],['admon'],['tics']);
		// var valor1= parseInt(document.getElementById('mes1').value);
		// var valor2= parseInt(document.getElementById('mes2').value);
		// var valor3= parseInt(document.getElementById('mes3').value);
		// var valor4= parseInt(document.getElementById('mes4').value);
		// var valor5= parseInt(document.getElementById('mes5').value);
	var myColors = new Array('#379185');
	//var carreras = ['ISC','Industrial','Electro','Mecatronica','Ambiental','Materiales','Gestion_Em.','TICS','Quimica','Civil','Administracion'];
	//var myData = new Array([periodo[0],noalumnos[0]],[periodo[1],noalumnos[1]]);
	//pasar el canvas y el tipo de grafica
	var myChart = new JSChart('chartcontainer', 'bar', 'b4949a117e0bff9be30,bd6b66a2c65ee32a549');
	//para pasar el canvas a dibujar
	myChart.setDataArray(myData);
	//para colorear las barras
	myChart.colorizeBars(myColors);
	//para el 3D
	myChart.set3D(true);
	//para redimensionar el canvas
	myChart.resize(900, 500);	
	myChart.setAxisColor('#12aaff');
	myChart.setBarSpeed(20);
	myChart.setTitle('Total de alumnos semestral por carrera ');


	myChart.draw();
	
</script>


	
	
	
