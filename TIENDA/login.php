<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="css/login.css">
</head>
<body>
	<a href="index.php">INICIO</a>
	<section>
		<form action="validar.php" method="post">
			<div class="datos">
		  		<input name="usuario" type="text" class="user" placeholder="Usuario" required/>
		  		<input name="password" type="password"  class="pass" placeholder="Contraseña" required/>
		  	</div>
		  	<div class="envios">
		 		<input type="submit" value="log in" />
		 	</div>
		</form>
	</section>
</body>
</html>