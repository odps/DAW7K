<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function cuentaVisitas($archivo)
{
    $visitas = 0;
    if ($archivo = fopen($archivo, "r+")) {
        $linea = fgets($archivo);
        $visitas += $linea;
        $linea++;
        rewind($archivo);
        fwrite($archivo, $linea);
        fclose($archivo);
        // echo "Visitas: $visitas";
        return true;
    } else {
        echo "Error al abrir el fichero";
        return false;
    }
}

//cuentaVisitas("./counter.txt");
