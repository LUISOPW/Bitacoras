<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>carrito</title>
	<link rel="stylesheet" href="css/carrito.css">
</head>
<body>
	
<div id="carro" class="carrito">
	<img src="imagenes/car.png"  width="35" height="30" alt="">
	<a href="">
	<?php 
		include('modulos.php');
		echo "<a href=carrito.php class=letra>".$_SESSION['ocarrito']->productos_carrito()."</a>";
	 ?>
	
	</a>
</div>
<div class="users">
<?php 
	$formulario->constructor_usuario();
?>
</div>
<nav>
	<?php
		$formulario->constructor_nav ();	
	?>
</nav>

<section id="productos">
	<?php 
		$_SESSION['ocarrito']->imprime_carrito(); 
	?>
</section>


	<div id="comprar">
		<a href="pago.php">Comprar</a>
	</div>

<footer class="social">
	<div class="facebook">
		<a href="">
			facebook
		</a>
	</div>
	<div class="twitter">
		<a href="">
			twitter
		</a> 
	</div>
	<div class="gplus">
		<a href="">
			gplus
		</a>
	</div>
</footer>
</body>
</html>
