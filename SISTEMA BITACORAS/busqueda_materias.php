<?php
include('libreria.php');
   $buscar = $_POST['b'];
   if(!empty($buscar)) {
        $alta_materias->Buscar($buscar);
    }
?>