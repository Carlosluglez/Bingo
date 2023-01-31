<?php

function rellenaCartones()
{
    $carton = array();
    $numeros = range(1, 60);
    shuffle($numeros);
    for ($i = 0; $i < 15; $i++) {
        $numeros[$i];
        array_push($carton, $numeros[$i]);
        // echo $carton[$i]."<br>";
    }
    return $carton;
}

function crearJugadorConCartones($numero_cartones)
{
    //$numero_cartones=3;   
    $jugadores = array();
    //importante, primero rellenar lo que está en el array mas interno
    for ($j = 0; $j < $numero_cartones; $j++) {
        array_push($jugadores, rellenaCartones());
        $jugador_relleno = $jugadores;
    }
    //rellenar lo que esta en el array mas externo    
    return $jugador_relleno;
}

function numeroJugadores($numero_Jugadores, $numero_cartones)
{
    //$numero_Jugadores=4;
    $total_jugadores = array();
    for ($i = 0; $i < $numero_Jugadores; $i++) {
        array_push($total_jugadores, crearJugadorConCartones($numero_cartones));
    }
    return $total_jugadores;
}

function esGanador($carton)
{
    $i = 0;
    $carton_ganador = true;
    while ($i < count($carton) && $carton_ganador) {
        if ($carton[$i] != -1) {
            $carton_ganador = false;
        }
        $i++;
    }
    if ($carton_ganador) {
        //var_dump($carton);
    }
    return $carton_ganador;
}


function mostrarBola($bola)
{
    echo "-->" . $bola;
    echo '<img src="img/' . $bola . '.PNG" style="width:40px" />';
}



function llenarBombo()
{
    $bombo = array(); //creamos bombo
    for ($i = 0; $i < 60; $i++) {
        $bombo[$i] = $i + 1;    //bombo tiene numeros sin repetir del 1 al 60
    }
    shuffle($bombo); // movemos bombo para descolocar los numeros
    return $bombo;
}

function jugar($bombo, $total_jugadores, $numero_cartones)
{

    $i = 0;
    $contadorBolas = 1;
    $ganadores = array();
    $hay_ganador = false; //iniciamos a false
    while (!$hay_ganador) {
        $bola_Que_Sale = $bombo[$i]; //sacamos la bola
        mostrarBola($bola_Que_Sale);
        // Para comprobar el acierto: 
        for ($j = 0; $j < count($total_jugadores); $j++) { // Por cada jugador
            for ($k = 0; $k < $numero_cartones; $k++) { // Por cada carton
                $posicion_numero_en_carton = array_search($bola_Que_Sale, $total_jugadores[$j][$k]); //devuelve la clave de la posicion y guardamos la posicion
                //var_dump($posicion_numero_en_carton);
                if ($posicion_numero_en_carton >= 0) { //esto tiene que estar en el siguiente nivel
                    $total_jugadores[$j][$k][$posicion_numero_en_carton] = -1;
                    if (esGanador($total_jugadores[$j][$k])) { //todas las posiciones de un carton estan en -1 pones hay_ganador a true para que salga
                        $hay_ganador = true;
                        // echo "################################################## HA HABIDO GANADOR";
                        $jugador_y_carton_ganador = array($j, $k); //guardamos el ganador en un array por si hubiera varios
                        array_push($ganadores, $jugador_y_carton_ganador); // Guardando el carton
                    }
                }
            }
        }
        $i++; // avanzamos una posición en el bombo
        $contadorBolas++;
    }
    echo "<br><br>El número de bolas sacadas es " . $contadorBolas;
    return $ganadores;
}

function mostrarGanadores($ganadores)
{

    for ($i = 0; $i < count($ganadores); $i++) {

        $jugador_ganador = intval($ganadores[$i][0]) + 1;
        $carton_ganador = intval($ganadores[$i][1]) + 1;
        echo "<br><br><b> el ganador o ganadores son el jugador número: " . $jugador_ganador . "  con el cartón: " . $carton_ganador . "</b>";
        echo "<br>";
    }

    //var_dump($ganadores);

}

function mostrarCartones($total_jugadores, $numero_cartones)
{

    for ($j = 0; $j < count($total_jugadores); $j++) {
        echo "<br><b>jugador: " . ($j + 1) . "</b><br>";

        echo "<table border='0' cellspacing='5' >";
        echo "<tr>";


        for ($k = 0; $k < $numero_cartones; $k++) {
            echo "<td>";

            echo "<b>cartón número: " . ($k + 1) . "</b><br>";
            echo "<table border='4' cellspacing='0'  >";

            $carton = $total_jugadores[$j][$k];

            echo "<tr>";
            $array_Blancos[0] = random_int(0, 2);

            $array_Blancos[1] = random_int(3, 4);

            $contTr = 0;


            for ($i = 0; $i < count($carton); $i++) {
                if ($i % 5 == 0) { //hacemos que haga 5 posiciones
                    $array_Blancos[0] = random_int(0, 2) + $contTr;
                    $array_Blancos[1] = random_int(3, 4) + $contTr;

                    $contTr = $contTr + 5;
                    echo "</tr><tr>";
                }

                echo "<td align='center' style='width:20px ; background-color:PapayaWhip'>" . $carton[$i] . "</td>";
                if ($i == $array_Blancos[0] || $i == $array_Blancos[1]) {
                    echo "<td align='center' style='width:20px ; background-color:grey'>&nbsp;</td>";
                }
            }

            echo "</tr>";
            echo " </table><br>";


            echo "</td>";
        }
        echo "</tr>";
        echo "</table>";
    }
}
