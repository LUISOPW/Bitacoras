<?php
include('libreria.php');
$valores = $_POST['mat'];
$alta_materias->Ingresar_Horarios($valores);

?>
<!doctype html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>horario de materias</title>
   <link rel="stylesheet" href="css/estilohorarios.css">
   <script type="text/javascript" src="jquery-1.10.2.min.js"></script>
</head>
<body>
<div class="titles"><h1>
         horarios
      </h1>
      <h2>
         Ingrese lo Horarios
      </h2></div>

<script>
$(document).ready(function(){    
   $('div.content input[type=text].agregadoa').click(function(){
      var nombre = $(this).val();
      //var id = $(this).attr("id");
      $("form section#contenedor section#agregados").append("<div class='content'><input type='text' value='"+nombre+"' name='add[]' style='background-color: #01a4cf;color:white;' class='agregadoa' readonly/><input type='time' name='add_ini[]' class='time' id=ini><input type='time' name='add_fin[]' class='time' id='fin'><input type='text' id='mat_grupo' class='grupo' name='add_grupo[]'/><select class='carreras' name='add_carreras[]'><option value='ingenieria en sistmas computacionales' class='carrera'>ingenieria en sistmas computacionales</option><option value='ingenieria industrial' class='carrera'>ingenieria industrial</option><option value='ingenieria electromecanica' class='carrera'>ingenieria electromecanica</option><option value='ingenieria mecatronica' class='carrera'>ingenieria mecatronica</option><option value='ambiental' class='carrera'>ambiental</option><option value='ingenieria en materiales' class='carrera'>ingenieria en materiales</option><option value='ingenieria en gestion empresarial' class='carrera'>ingenieria en gestion empresarial</option><option value='ingenieria en tecnologias de informacion y comunicaciones' class='carrera'>ingenieria en tecnologias de informacion y comunicaciones</option><option value='ingenieria quimica' class='carrera'>ingenieria quimica</option><option value='ingenieria civil' class='carrera'>ingenieria civil</option><option value='licenciatura en administracion' class='carrera'>licenciatura en administracion</option></select></div>");
   });

});
</script>





<form action="HORARIOS_DEFINITIVO.php" method="POST">

      <section class="ctnperiodo">
      <label for="periodo">
         indica el periodo
      </label>
      <input type="text" class="periodo" name="inputperiodo" id="inputperiodo" placeholder="Pe: 13-14/1">
      </section>

   <section id="contenedor">
      <section id="cabeceras">
         <div class="materia">Materia</div>
         <div class="hentrada">Hr Entrada</div>
         <div class="hsalida">Hr Salida</div>
         <div class="group">Grupo</div>
         <div class="ccarrera">Carrera</div>
      </section>
      <section id="agregados">
      <input type="hidden" value="<?php echo $valores[0]; ?>" name='maestro'>
      <?php
         $alta_materias->construir_formularios($valores);
      ?>
      </section>

   </section>
   <section class="envio">
      <input type="submit" class="agregar" value="Confirmar">
   </section>
</form>
</body>
</html>