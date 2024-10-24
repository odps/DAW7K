<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
function escribeTresNumeros($num1, $num2, $num3)
{
    $ruta = "./numeros.txt";
    if ($fichero = fopen($ruta, "a+")) {

        fwrite($fichero, $num1 . PHP_EOL);
        fwrite($fichero, $num2 . PHP_EOL);
        fwrite($fichero, $num3 . PHP_EOL);
        fclose($fichero);
        return true;
    } else {
        echo "Error al abrir el fichero";
        return false;
    }
}

escribeTresNumeros(1, 2, 3);
