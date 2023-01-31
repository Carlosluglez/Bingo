<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>bingoSolo</title>
</head>
<body>
	<?php

function generarBola(){
$bombo=array(); //creamos bombo
	for($i=0;$i<60;$i++){
        $bombo[$i]=$i+1;    //bombo tiene numeros sin repetir del 1 al 60
    }
   shuffle($bombo); // movemos bombo para descolocar los numeros
    $i=0;
}

?>
</body>
</html>