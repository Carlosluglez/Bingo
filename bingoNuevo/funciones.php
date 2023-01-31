<?php

function generarCarton()
{
    $carton = [];
    $num = range(1, 60);
    shuffle($num);
    for ($i = 0; $i < 15; $i++) {
        array_push($carton, $num[$i]);
    }
    return $carton;
}

function generarJugadoresConCartones($arrayParticipantes, $num_cartones)
{
    //echo $num_cartones;
    //var_dump($arrayParticipantes);
    $arrayJugadoresConCartones = [];
    for ($i = 0; $i < count($arrayParticipantes); $i++) {
        for ($j = 0; $j < $num_cartones; $j++) {
            $arrayJugadoresConCartones[$arrayParticipantes[$i]][$j] = generarCarton();
        }
    }
    return $arrayJugadoresConCartones;
}

function generarBomobo()
{
    $bombo = [];
    $bombo = range(1, 60);
    return $bombo;
}

function jugar($arrayJugadoresConCartones, $bombo)
{
    shuffle($bombo);
    $bolaQueSale = 0;
    var_dump($arrayJugadoresConCartones);
    $hayGanador = false;
    $posicionModificar = -2;
    $i = 0;
    $contadorBolas = 0;
    while (!$hayGanador) {
        $bolaQueSale = $bombo[$i];
        $contadorBolas++;
        mostrarBolas($bolaQueSale);
        // echo "---bola" . $bolaQueSale . "<br>";
        foreach ($arrayJugadoresConCartones as $nombres => $carton) {
            for ($j = 0; $j < count($carton); $j++) {
                for ($k = 0; $k < count($carton[$j]); $k++) {
                    if ($bolaQueSale == $arrayJugadoresConCartones[$nombres][$j][$k]) {
                        //  echo "posicion" . $k . "<br>";
                        $posicionModificar = [$k];
                        if ($posicionModificar > 0) {
                            $arrayJugadoresConCartones[$nombres][$j][$k] = -1;
                            if (detectarGanador($arrayJugadoresConCartones[$nombres][$j])) {
                                $hayGanador = true;
                                echo "<br/>el campeón es " . $nombres . " con el carton " . $j . "<br>";
                            }
                        }
                    }
                }
            }
        }
        $i++;
    }
    echo "han salido " . $contadorBolas . " bolas";
    echo "<br/>";
}



function detectarGanador($carton)
{
    // var_dump($carton);
    $ganador = false;
    $cartonGanador = array_unique($carton);
    //  var_dump(count($cartonGanador)) ;
    if (count($cartonGanador) == 1) {
        $ganador = true;
    }

    return $ganador;
}

function mostrarBolas($bola)
{

    echo '<img src="img/' . $bola . '.PNG" style=width:40px >';
}

function mostrarCartones($arrayJugadoresConCartones)
{

    foreach ($arrayJugadoresConCartones as $nombre => $cartones) {
        echo "<br><b>$nombre</b><br>";
        echo "<table border='1' cellspacing='0' cellpadding=''>";
        echo "<tr>";
        foreach ($cartones as $carton => $numeros) {
            echo "<b>" . $carton . "</b><br>";
            echo "<table border='2' cellspacing='0' cellpadding>";
            echo "</tr><tr>";
            $contador = -1;
            foreach ($numeros as $numero) {
                $contador++;
                // echo $contador;
                if ($contador % 5 == 0) {
                    echo "<tr></tr>";
                }

                echo "<td>$numero</td>";
            }
            echo "</tr>";
            echo "</table>";
        }
    }

    echo "</table>";
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}



// function jugar($arrayJugadoresConCartones, $bombo)
// {
//     shuffle($bombo);
//     $bolaQueSale = 0;
//     var_dump($arrayJugadoresConCartones);
//     $hayGanador = false;
//     $i = 0;
//     $contadorBolas = 0;
//    while (!$hayGanador) {
//         $bolaQueSale = $bombo[$i];
//         $contadorBolas++;
//         mostrarBolas($bolaQueSale);
//         foreach ($arrayJugadoresConCartones as $nombres => $cartones) {
//             foreach ($cartones as $index => $numeros) {
//                 foreach ($numeros as $indiceNumero => $numero) {
//                     if ($bolaQueSale == $arrayJugadoresConCartones[$nombres][$index][$indiceNumero]) {
//                         $arrayJugadoresConCartones[$nombres][$index][$indiceNumero] = -1;
//                         print_r( $numeros);
//                         if (detectarGanador($numeros)) {
//                             $hayGanador = true;
//                             echo "<br/>el campeón es " . $nombres . " con el carton " . $index . "<br>";
//                         }
//                     }
//                 }
//             }
//         }
//         $i++;
//    }
//     echo "han salido " . $contadorBolas . " bolas";
//     echo "<br/>";
// }
