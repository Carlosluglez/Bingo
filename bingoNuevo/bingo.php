<?php

include "funciones.php";

$array=$_POST;
//var_dump($array);
$arrayParticipantes=[];
foreach($_POST  as $key => $nombre){
    if(!empty($nombre) && str_contains($key,"jug") ){
       array_push($arrayParticipantes,$nombre);
    }
}
var_dump($arrayParticipantes);

$num_cartones=test_input($_POST["num_cartones"]);

$carton=generarCarton();
//var_dump($carton);

$participatesConCartones=generarJugadoresConCartones($arrayParticipantes,$num_cartones);
$bombo=generarBomobo();
jugar($participatesConCartones,$bombo);
mostrarCartones($participatesConCartones);
?>