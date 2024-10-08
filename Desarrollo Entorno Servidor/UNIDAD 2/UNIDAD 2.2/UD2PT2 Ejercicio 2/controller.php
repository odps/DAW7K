<?php
include "cuentaVocales.php";

if ( empty($_POST["cadena1"]) )
    echo "Ha ocurrido un error.";
else{
    $frase1 = $_POST["cadena1"];
    echo "La frase contiene: ".cuentaVocales($frase1)." vocales. <br>";
}

  