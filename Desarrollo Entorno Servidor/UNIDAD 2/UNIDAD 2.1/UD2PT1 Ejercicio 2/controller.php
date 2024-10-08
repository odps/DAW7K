<?php

if ( (empty($_GET["numX"])) && (empty($_GET["numY"])) ){

    echo "Uno de los campos necesarios esta vacío";

} else {

    $result = 0;
    $numX = $_GET["numX"];
    $numY = $_GET["numY"];

    for ($i=1; $i < $numX; $i++) { 
        if ($i%$numY==0) {
            $result += $i;
        }
    }

//Respuesta
echo "La suma de todos los números del 1 al " . $numX . " que sean divisibles por " . $numY . " es " . $result;
}

?>

<html>
<br>
<a href="index.html">Volver</a>
</html>