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
<?php
	$conex = mysql_connect('localhost','root','');
	mysql_select_db('tienda',$conex);
	$sql = "select * from productos where id_producto =".$_POST['id'];
	$a = mysql_query($sql,$conex);
	$lista = mysql_fetch_array($a);	
	$lista['descripcion'];
	$lista['imagen'];
	$_SESSION['ocarrito']->introduce_producto($_POST["id"],$_POST["cantidad"],$_POST["total"],$lista['descripcion'],$lista['imagen']);
?>	

<section id="productos">
	<?php 
		$_SESSION['ocarrito']->imprime_carrito(); 
	?>
</section>


	<div id="comprar">
		<a href="pago.php">comprar</a>
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
