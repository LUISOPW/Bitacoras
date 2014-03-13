<?php
include('libreria.php');
$nombre = $_POST['nombre'];
$ape_pat = $_POST['ap'];
$ape_mat = $_POST['am'];
$matricula = $_POST['num_control'];
$nacimiento = $_POST['nacimiento'];
$especialidad = $_POST['especialidad'];
$jefatura = $_POST['jefatura'];

$registro->Registrar($nombre,$ape_mat,$ape_pat,$matricula,$nacimiento,$especialidad,$jefatura);
//header('location:ALTA_HORARIOS.php');
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>alta materias</title>
	<link rel="stylesheet" href="css/estiloaltamaterias.css">
	<script type="text/javascript" src="jquery-1.10.2.min.js"></script>
</head>
<body>
	<div class="titles">
		<h1>Alta de materias</h1>
		<h2><?php echo $nombre; ?></h2>
	</div>
<script>
	$(document).ready(function(){                   
        var consulta;                                                   
		         //hacemos focus al campo de búsqueda
		$("#buscador").focus();                                                                                                    
		        //comprobamos si se pulsa una tecla
		$("#buscador").keyup(function(e){                         
              //obtenemos el texto introducido en el campo de búsqueda
        consulta = $("#buscador").val();
                                                                           
              //hace la búsqueda
                                                                                  
                $.ajax({
                    type: "POST",
                    url: "busqueda_materias.php",
                    data: "b="+consulta,
                    dataType: "html",
                    beforeSend: function(){
                          //imagen de carga
                          $("#resultado").html("<p align='center'><img src='imagenes/loader_bar_blue.gif' /></p>");
                    },
                    error: function(){
                          alert("error petición ajax");
                    },
                    success: function(data){                                                    
                        $("#resultado").empty();
                        $("#resultado").append(data);
					
						$("section#resultado a").click(function(){




					    	var nombre = $(this).text();
							    	var id = $(this).attr("id");
							    	//alert('hola='+nombre);
							    	//var id = $(this).id();
							     	////alert("id = "+id);
							     	//alert("id = "+id);

							    $("form section#agregados").append("<input type='text' id='"+id+"' value='"+nombre+"' class='agregadoa' readonly name='mat[]' />");
									$("form section#agregados input[type=text]").click(function(){
							 			$(this).remove();
							 			//var id = $(this).attr("id");
							 			//alert("id = "+id);
							 			//alert("mierda");
									});
							    });


							 	//$("button.agregar").click(function(){
							 	//var inputs = $('section#agregados form');
							 	//alert("elementos = "+inputs.length);
							 	//	var elementos = $("section#agregados p").get();
							 	//	alert(elementos.length);
							 	//});
                                                                                                                                    

							}
				});		
            });
				
  	});                                      
</script>

	<div class="flecha">
	</div> 
<section id="instruc">
	<section id="busqueda">
		<input type="text" id="buscador" class="search" placeholder="busca tus materias">
	</section>
	<div id="instrucciones">
		y arrastralas a este lado
	</div>
</section>
<section id="contenedor">
		<div id="letrero1" class="letreros">
			materias disponibles
		</div>
		<div id="letrero2" class="letreros">
			materias agregadas
		</div>
		<section id="resultado">
		
		</section>

		<form action="PROCESAMIENTO_HORARIOS.php" method="POST">
	<section id="agregados">
			<input type="hidden" value="<?php $alta_materias->Buscar_id($matricula); ?>" name='mat[]'>
			<!--<section class="envio">
			</section>-->
	</section>
	<section class="envio">
		<input type="submit" class="agregar" value="Confirmar">
	</section>
		</form>

</section>
<h2></h2>
</body>
</html>

