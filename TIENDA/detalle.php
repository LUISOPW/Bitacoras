
<!doctype html>
<html lang="es-MX">
<head>
	<meta charset="UTF-8">
	<title>home</title>
	<link rel="stylesheet" href="css/estilodetalle.css">
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

<section id="contentgeneral">
	<h1>
			Detalle del producto
	</h1>
	<section id="detalle">
		
		<div id="imagen">
			<h2>
				 	<?php 
						echo "".$_GET['produc']."";
				 	?>
			</h2>
				<?php 
					//$producto = $_GET['img'];
					echo "<img src=imagenes/".$_GET['img'].">";
					//echo "<img class=imagen src=imagenes/".$produc['imagen']." width=150px height=150>";
				 ?>
		</div>
		
		<section id="datos">
			<div id="descripcion">
				<p><?echo $_GET['descripcion']?></p>
			</div>
			<div id="opciones">
				<form action="carrito.php" method="POST" >
					<input type="text" id="id_producto" value="<?php echo $_GET['id']?>" name="id">
					<div id="cntcantidad">
						<p>Cantidad</p>
						<select name="cantidad"  onChange="multiplicar();" id="cantidad">
							<option value="1" selected>1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
						</select>
					</div>
					<div id="cntprecio">
						<p>Precio MXN $</p>
						<input type="text" id="precioropa" name="precio" value="<?php echo $_GET['costo']?>"  readonly="readonly"/>
					</div>	
					<div id="cntsubtotal">
						<p>Subtotal $</p>	
						<input type="text" id="subtotal" name="total" value="" readonly="readonly" />
					</div>
					<input class="addcart" type="submit" value="Agregame">
				</form>
			</div>	
		</section>
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
<!-- scripts -->
<script language="javascript">
	window.onload = multiplicar();
		function multiplicar(){
			m1 = document.getElementById("cantidad").options.selectedIndex+1;
			m2 = document.getElementById("precioropa").value;
				r = m1*m2;
				document.getElementById('subtotal').value = r;
		}
	</script>
</body>
</html>
