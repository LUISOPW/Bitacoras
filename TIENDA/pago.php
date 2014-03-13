<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>pago</title>
	<link rel="stylesheet" href="css/estilopago.css">
</head>
<body>
<section id="contenedor">
<div id="totalpago">
	<p>
	<?php 
	include('modulos.php');
		$_SESSION['ocarrito']->obtener_total(); 
	?></p>
	<p class="letrero">
		Su pago total
	</p>
	</div>
	<form action="seguimiento.php" id="pago">
		<input type="text" placeholder="Nombre" class="nombre" name="nombre" value=<?php echo $_SESSION['usuario'] ?> >
		<input type="text" placeholder="Email" class="email" name="email" value=<?php echo $_SESSION['email']?> >
		<input type="text" placeholder="Teléfono" class="tel" name="telefono" value=<?php echo $_SESSION['telefono'] ?> >
		<input type="text" placeholder="Número de tarjeta" class="card-number numero">
		<input type="submit" value="COMPRAR" class="envio">
	</form>
	<div class="contacto">
		<p class="skype">
			<a href="skype:llamanos?call">
				<span>Skype</span>
				llamanos
			</a>
		</p>
		<p class="telefono">
			<span>Teléfono</span>
				01 (55) 58795721
			</p>
								
	</div>
</section>
	
</body>
</html>