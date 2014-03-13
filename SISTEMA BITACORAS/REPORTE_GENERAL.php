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
	
	$conexion= mysql_connect('localhost','root','');
	@mysql_query("SET NAMES 'utf8'");
	mysql_select_db('laboratorio', $conexion);
	$sistemas = mysql_query("select count(*) from bitacoras where carrera = 'ingenieria en sistmas computacionales'");
	$array_sistema = mysql_fetch_array($sistemas);

	$industrial = mysql_query("select count(*) from bitacoras where carrera = 'ingenieria industrial'");
	$array_industrial = mysql_fetch_array($industrial);

	$electromecanica = mysql_query("select count(*) from bitacoras where carrera = 'ingenieria electromecanica'");
	$array_electromecanica = mysql_fetch_array($electromecanica);

	$mecatronica = mysql_query("select count(*) from bitacoras where carrera = 'ingenieria mecatronica'");
	$array_mecatronica = mysql_fetch_array($mecatronica);

	$ambiental = mysql_query("select count(*) from bitacoras where carrera = 'ambiental'");
	$array_ambiental = mysql_fetch_array($ambiental);

	$materiales = mysql_query("select count(*) from bitacoras where carrera = 'ingenieria en materiales'");
	$array_materiales = mysql_fetch_array($materiales);

	$gestion_em = mysql_query("select count(*) from bitacoras where carrera = 'ingenieria en gestion empresarial'");
	$array_gestion_em = mysql_fetch_array($gestion_em);

	$tics = mysql_query("select count(*) from bitacoras where carrera = 'ingenieria en tecnologias de informacion y comunicaciones'");
	$array_tics = mysql_fetch_array($tics);

	$quimica = mysql_query("select count(*) from bitacoras where carrera = 'ingenieria quimica'");
	$array_quimica = mysql_fetch_array($quimica);

	$civil = mysql_query("select count(*) from bitacoras where carrera = 'ingenieria civil'");
	$array_civil = mysql_fetch_array($civil);

	$admon = mysql_query("select count(*) from bitacoras where carrera = 'licenciatura en administracion'");
	$array_admon = mysql_fetch_array($admon);



 ?>
<script>
	
		// var carreras = new array(['informatica'],['sistemas'],['ambiental'],['admon'],['tics']);
		// var valor1= parseInt(document.getElementById('mes1').value);
		// var valor2= parseInt(document.getElementById('mes2').value);
		// var valor3= parseInt(document.getElementById('mes3').value);
		// var valor4= parseInt(document.getElementById('mes4').value);
		// var valor5= parseInt(document.getElementById('mes5').value);
	var myColors = new Array('#379185', '#AC218F', '#FFD44B', '#AC212F', '#216AAC','#216AAC','#216AAC','#216AAC','#216AAC','#216AAC','#216AAC');
	var carreras = ['ISC','Industrial','Electro','Mecatronica','Ambiental','Materiales','Gestion_Em.','TICS','Quimica','Civil','Administracion'];
	var myData = new Array([carreras[0], <?php echo $array_sistema[0] ?>], [carreras[1], <?php echo $array_industrial[0] ?>], [carreras[2], <?php echo $array_electromecanica[0] ?>], [carreras[3], <?php echo $array_mecatronica[0] ?>], [carreras[4],<?php echo $array_ambiental[0] ?>], [carreras[5],<?php echo $array_materiales[0] ?>],[carreras[6],<?php echo $array_gestion_em[0] ?>],[carreras[7],<?php echo $array_tics[0] ?>],[carreras[8],<?php echo $array_quimica[0] ?>],[carreras[9],<?php echo $array_civil[0] ?>],[carreras[10],<?php echo $array_admon[0] ?>]);
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
