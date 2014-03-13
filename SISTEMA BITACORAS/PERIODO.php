<?php 
include('libreria.php');
 ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Opcion periodo</title>
	<link rel="stylesheet" href="css/estiloopcperiodo.css">
</head>
<body>
<header>
    <h1>
    	Elije el  <strong>"periodo"</strong>
    </h1>
        <div id="logo">
    </div>
</header>
	<section>
		<form action="REPORTE_PERIODO.php" method='POST'>
			<section class="periodos">
				<?php 
					$Reportes->periodos();
				 ?>
			</section>
			<input type="submit" class="busqueda" value="generar">
 		</form>

	</section>
</body>
</html>