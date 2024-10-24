<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function obtenerSuma($archivo)
{
    $suma = 0;

    if (is_file($archivo)) {
        if ($archivo = fopen($archivo, "r+")) {
            while (!feof($archivo)) {
                $linea = fgets($archivo);
                $suma += $linea;
            }
            fclose($archivo);
        } else {
            echo "Error al abrir el fichero";
        }
    }
    echo $suma;
}

$file = "./numeros.txt";
obtenerSuma($file);
