<?php

function rellenarBombo(){
$bombo=array();
$bombo=range(1,60);
shuffle($bombo);
//var_dump($bombo);

return $bombo;
}

//function sacarBola($bombo){
      
//    for($i = 0;$i < count($bombo);$i++){
//       $bombo[$i];    
//    }
//    return $bombo;
//}

function rellenaCartones(){
    $carton=array();
    $numeros=range(1,60);
    shuffle($numeros);
        for($i =0;$i < 15;$i++){
            $numeros[$i];
            array_push($carton,$numeros[$i]);
           // echo $carton[$i]."<br>";
        }
        return $carton;
    }

$bombo1=rellenarBombo();
//$bola = sacarBola($bombo1);
$carton1=rellenaCartones();
$carton2=rellenaCartones();
$contadorX=0;
$contadorY=0;

while(($contadorX < 15) || ($contadorY <15)){

for($i =0;$i<count($bombo1);$i++){
    echo"bola ".$bombo1[$i]."<br>";
    for($j=0; $j < count($carton1);$j++){
        echo"carton1 $j ".$carton1[$j]."<br>";
        if($bombo1[$i] == $carton1[$j] ){
           $contadorX++;    
           echo "contadorx ".$contadorX."<br>";      
        }       
        if($bombo1[$i] == $carton2[$j]){
            $contadorY++;         
            echo "contadorY ".$contadorY."<br>";  
        }       
    }
}
}
var_dump($contadorX);
var_dump($contadorY);
if($contadorX =15){
    echo"has ganado carton1";
   }
   if($contadorY =15){
    echo"has ganado carton2";
   }





?>