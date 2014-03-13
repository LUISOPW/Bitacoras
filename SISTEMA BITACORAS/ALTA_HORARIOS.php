<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>alta materias</title>
	<link rel="stylesheet" href="css/estiloaltamaterias.css">
	<script type="text/javascript" src="jquery-1.10.2.min.js"></script>
</head>
<body>
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

							    $("section#agregados form").append("<input type='text' id='"+id+"' value='"+nombre+"' class='agregadoa' readonly name='mat[]' />");
									$("section#agregados form input[type=text]").click(function(){
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
<h1>Alta de materias</h1>

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

	<section id="agregados">
		<form action="PROCESAMIENTO_HORARIOS.php" method="POST">
			<!--<section class="envio">
			</section>-->
			<input type="submit" class="agregar" value="agregar">
		</form>
	</section>

</section>
<h2></h2>
</body>
</html>