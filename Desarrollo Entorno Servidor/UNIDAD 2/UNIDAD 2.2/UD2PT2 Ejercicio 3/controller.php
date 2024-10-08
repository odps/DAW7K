<?php
include "cuentaVocales.php";

if ( empty($_POST["cadena1"]) || empty($_POST["cadena2"]) )
    echo "Ha ocurrido un error.";
else{
    $frase1 = $_POST["cadena1"];
    $frase2 = $_POST["cadena2"];

    echo ( cuentaVocales($frase1)>cuentaVocales($frase2) ) ? 
    "La frase '{$frase1}' tiene mas vocales. <br>":"La frase '{$frase2}' tiene mas vocales. <br>";
}

  