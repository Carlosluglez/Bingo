<HTML>

<HEAD>
    <TITLE> Ejercicios Arrays Multidimensionales</TITLE>
</HEAD>

<BODY>
    <?php

//asignamos a los jugadores 3 cartones
    $jugadores = array(
        "jugador1" =>
        array(
            carton(),
            carton(),
            carton()
        ),
        "jugador2" =>
        array(
            carton(),
            carton(),
            carton()
        ),
        "jugador3" =>
        array(
            carton(),
            carton(),
            carton()
        ),
        "jugador4" =>
        array(
            carton(),
            carton(),
            carton()
        )
    );

    foreach ($jugadores as $jugador => $carton) {
       foreach ($carton as $key => $valor) {
        echo $valor;
       }
    }

    //FUNCIONES

    $bombo = rellenarBombo(); //funcion que saca la bola un numero al azar
    echo $bombo;
    /*echo sacarBola("-------".$bombo);*/
    function rellenarBombo()
    {
        $bombo = range(1, 60);
        shuffle($bombo);
        foreach ($bombo as $val) {
            /* echo $val . "<br/>";*/
        }
        return $val;
    }


    function carton() //funcion que crea cartones
    {
        for ($i = 0; $i < 5; $i++) {
            $num1[$i] = random_int(1, 60);
            $num2[$i] = random_int(1, 60);
            $num3[$i] = random_int(1, 60);
        }
        $numeros = array($num1, $num2, $num3);
        echo "<table border=1>";
        for ($h = 0; $h <= 2; $h++) {
            echo "<tr>";
            for ($q = 0; $q <= 4; $q++) {
                echo "<td>" . $numeros[$h][$q];
            }
            echo "</tr>";
        }
       echo "</table>";
    }


    ?>
</BODY>

</HTML>