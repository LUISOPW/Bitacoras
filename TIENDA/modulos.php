<?php
class formulario{
#PAGINA DE REGISTROS///////////////////////////////////////////////////////////////////////////////////////////
#REGISTRO DE FORMULARIO /////////////////////////////////////////////////////////////////////////////////////
	function registrar($nick,$nombre,$apellido,$contrasena,$direccion,$telefono,$email){
		$conex = mysql_connect('localhost','root','');
		mysql_select_db('tienda',$conex);
		$sql = "insert into clientes values('','$nombre','$contrasena','$direccion','$telefono','$email','$nick','$apellido')";
		mysql_query($sql,$conex);
		header('Location: index.php');	
	}
#LOGIN/////////////////////////////////////////////////////////////////////////////////////////////////////////
	function login($usuario,$clave){
		$conectar = mysql_connect('localhost','root','');
		mysql_select_db('tienda',$conectar);
		$sql = "select * from clientes where nick='$usuario' AND contrasena='$clave'";
		$ejecutar_sql=mysql_query($sql,$conectar);
		$datos_compra=mysql_fetch_array($ejecutar_sql);
		if (mysql_num_rows($ejecutar_sql)!=0){
			session_start();
			$_SESSION['email']=$datos_compra['email'];
			$_SESSION['telefono']=$datos_compra['telefono'];
			$_SESSION['usuario']=$usuario;
			return True;
		}else{
			return False;
		}
	}	
#CONSTRUIR BARRA DE SESSION///////////////////////////////////////////////////////////////////////////////////////
	function constructor_usuario(){
		if($this->verificar_usuario()){
			echo "<p>Bienvenido ".$_SESSION['usuario']."</p>";
			echo '<a href="deslog.php" class="letra">log out</a>';
		}else{
			echo '<a href="login.php" class="letra">log in</a>';
		}
	}
	function constructor_nav(){	
		if($this->verificar_usuario()){
			echo"<ul>
			<li class=item><a href=index.php class=letra>Inicio</a></li>
			<li class=item><a href=productos.php class=letra>Carrito</a></li> 
			<li class=item><a href=deslog.php class=letra>Logout</a></li>
			<li class=item><a href=about.php class=letra>About</a></li>
			</ul>";
		}else{
			echo"<ul>			<li class=item><a href=index.php class=letra>Inicio</a></li>
			
			<li class=item><a href=about.php class=letra>About</a></li>
			<li class=item><a href=registro.php class=letra>Registro</a></li>
			</ul>";
		}
	}
#VERIFICACION DE SESSION ABIERTA PARA LOGOUT//////////////////////////////////////////////////////////////////////////
	function verificar_usuario(){
		#session_start();
		if(isset($_SESSION['usuario'])){
			return true;
		}
	}

}
$formulario = new formulario(); #OBJETO CONTRUIDO PARA TRABAJAR CON LA CLASE ////////////////////////////////////////////

class contenidos{
	#PAGINA DE CONTENIDO DE TODOS LOS PRODUCTOS/////////////////////////////////////////////////////////////////////////////	
	#Categorias
	function tags_categorias(){		
		$conex = mysql_connect('localhost','root','');
		mysql_select_db('tienda',$conex);
		$todo =  "select count(*) as todo from productos";
		$all = mysql_query($todo,$conex);
		$lol = mysql_fetch_array($all);
		echo "<section id=categorias>";
		echo "<div class=catego><a href=index.php>ALL(".$lol['todo'].")</a></div>";
		$lista = "select nombre_categoria from categoria";
		$a = mysql_query($lista,$conex);
		while($b = mysql_fetch_array($a)){
				$d = mysql_query("select count(*) as contador from productos where nombre_categoria = '$b[nombre_categoria]'");
				$g = mysql_fetch_array($d);
		 
				echo "<div class=catego><a href=categoria.php?categoria=".$b['nombre_categoria'].">".$b['nombre_categoria']." (".$g['contador'].") </a></div>";
		}	
		echo "</section>";
	}
	#VISTA PRINCIPAL DE TODOS LOS PRODUCTOS/////////////////////////////////////////////////////////////////////   
	function articulos(){
		$conex = mysql_connect('localhost','root','');
		mysql_select_db('tienda',$conex);
		$sql = "select * from productos";
		$a = mysql_query($sql,$conex);	
		while($b = mysql_fetch_array($a)){
			echo "<article>
				<img class=imagen src=imagenes/".$b['imagen']." width=150px height=150px>
				<p class=desc>".$b['descripcion']."</p>
				<p class=descripcion>".$b['nombre']."</p>
				<p class=precio>MXN$".$b['costo']."</p>
				<a href=detalle.php?produc=".$b['nombre']."&id=".$b['id_producto']."&costo=".$b['costo']."&img=".$b['imagen']."&descripcion=".$b['descripcion']." class=detalle>Detalle</a>
			</article>";
			}
	}
	#PAGINAS DE LAS CATEGORIAS EN ESPECIFICO ///////////////////////////////////////////////////////////////////
	function categoria(){
		$nom_catego = $_GET['categoria'];
		$conex = mysql_connect('localhost','root','');
		mysql_select_db('tienda',$conex);
		$consulta = "select imagen,nombre,id_producto,costo,descripcion from productos where nombre_categoria = '$nom_catego'";
		$a = mysql_query($consulta,$conex);
		while($b = mysql_fetch_array($a)){
		echo"<article>
			<img class=imagen src=imagenes/".$b['imagen']." width=150px height=150px>
			<p class=desc>".$b['descripcion']."</p>
			<p class=descripcion>".$b['nombre']."</p>
			<p class=precio>MXN$".$b['costo']."</p>
			<a href=detalle.php?produc=".$b['nombre']."&id=".$b['id_producto']."&costo=".$b['costo']."&img=".$b['imagen']."&descripcion=".$b['descripcion']." class=detalle>Detalle</a>
		</article>";
			}
	}
}#FINAL DE LA CLASE///////////////////////////////////////////////////////////////////////////////////////////

$contenido = new contenidos(); #OBJETO CONSTRUIDO PARA TRABAJAR CON LA CLASE///////////////////////////////////////

class carrito {
#propiedades del producto
   	var $num_productos;
   	var $array_id_prod;
  	var $array_cantidad;
   	var $array_total;
   	var $array_descripcion;
  	var $array_imagen;
#contruir el carrito
	function carrito () {
   		$this->num_productos=0;
	}
#agrega productos al arreglo	
	function introduce_producto($id_prod,$cantidad_prod,$total,$descripcion,$img){
		$this->array_id_prod[$this->num_productos]=$id_prod;
		$this->array_cantidad[$this->num_productos]=$cantidad_prod;
		$this->array_total[$this->num_productos]=$total;
		$this->array_descripcion[$this->num_productos]=$descripcion;
		$this->array_imagen[$this->num_productos]=$img;
		$this->num_productos++;
	}
#hace la impr3esion del carrito
	function imprime_carrito(){
		$suma = 0;
		echo '<table cellpadding="10">
		<tr>
		<th>Producto</th>
		<th>Descripción</th>
		<th>Cantidad</th>
		<th>Precio</th>
		<th>Eliminar</th>
		</tr>';
		for ($i=0;$i<$this->num_productos;$i++){
			if($this->array_id_prod[$i]!=0){
				echo '<tr>';
				echo "<td class=imagenproducto><img src=imagenes/".$this->array_imagen[$i]." alt= width=120 height=120></td>";
				echo "<td class=descripcion>". $this->array_descripcion[$i]."</td>";
				echo "<td class=cantidad>" . $this->array_cantidad[$i] . "</td>";
				echo "<td class=precio>" . $this->array_total[$i] . "</td>";
				echo "<td><a href='eliminar_producto.php?linea=$i'>Eliminar</td>";
				echo '</tr>';
				$suma += $this->array_total[$i];
			}
		}
		//muestro el total
		//total más IVA
		#echo "<tr><td><b>IVA (16%):</b></td><td> <b>" . $suma * 1.16 . "</b></td><td>&nbsp;</td></tr>";
		
		echo "</table>";
		echo "<h3>TOTAL :$".$suma."</h3>";
	}
#eliminacion del producto


	function elimina_producto($linea){
		$this->array_id_prod[$linea]=0;
	}	

	function obtener_total(){
		$suma = 0;
		for ($i=0;$i<$this->num_productos;$i++){
			if($this->array_id_prod[$i]!=0){
				$suma += $this->array_total[$i];
			}
		}
		echo $suma;
	}

	function productos_carrito(){
		$acumulador = 0;
		for ($i=0;$i<$this->num_productos;$i++){
			if($this->array_id_prod[$i]!=0){
				$acumulador = $acumulador +1;
			}
		}
		echo $acumulador;
	}

}
#contruccion del incio de la session para hacer el objeto del producto
session_start();
if (!isset($_SESSION["ocarrito"])){
	$_SESSION["ocarrito"] = new carrito();
}
?>
