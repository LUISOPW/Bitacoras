
<!doctype html>
<html lang="es-MX">
<head>
	<meta charset="UTF-8">
	<title>home</title>
	<link rel="stylesheet" href="css/estiloindex.css">
</head>
<body> 
<div id="carro" class="carrito">
	<img src="imagenes/car.png"  width="35" height="30" alt="">
	<?php 
		include('modulos.php');
		echo "<a href=carrito.php class=letra>".$_SESSION['ocarrito']->productos_carrito()."</a>";
	?>
</div>
<div class="users">
	<?php
		$formulario->constructor_usuario();	
	?>
</div>

<nav>
<?php
	$formulario->constructor_nav();
?>
</nav>

<?php
$contenido->tags_categorias();
?>

<section id="contenedor">
	<section id="articulos">
		<?php $contenido->categoria();?>
	</section>
</section>

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