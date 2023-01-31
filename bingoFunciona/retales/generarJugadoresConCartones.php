
<?php

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

function crearJugadorConCartones($numero_cartones){  
    //$numero_cartones=3;   
    $jugadores=array();
    //importante, primero rellenar lo que está en el array mas interno
    for($j = 0 ;$j < $numero_cartones;$j++){
        array_push($jugadores,rellenaCartones()); 
        $jugador_relleno = $jugadores;     
    }  
    //rellenar lo que esta en el array mas externo    
    return $jugador_relleno; 
}

    function numeroJugadores($numero_Jugadores,$numero_cartones){
        //$numero_Jugadores=4;
        $total_jugadores=array();
        for($i = 0;$i < $numero_Jugadores;$i++){
            array_push($total_jugadores,crearJugadorConCartones($numero_cartones));
        }
        return $total_jugadores;
    }         
        $total_jugadores=numeroJugadores(4,3);
        var_dump($total_jugadores);

        function mostrarGanadores($ganadores){

            for ($i = 0;$i < count($ganadores);$i++){     
                echo "el ganador es el jugador numero".intval($ganadores[$i]);     
                for($j = 0;$j <count($ganadores);$j++){    
                    echo " ,con el cartón numero".intval($ganadores[$j]);
                }
            }
          
          
            
       }

?>

//echo $hay_ganador ? "true" : "false";