<?php

function contieneSubcadena($cadena, $subcadena){
    $cadenaTratada = explode(" ",strtolower($cadena));
    $resultados = "";

    foreach ($cadenaTratada as $palabra) {
        
        if ( preg_match(("/$subcadena/"), $palabra) ) {
            $resultados .= $palabra .", ";
        }
    }
    $resultados = substr($resultados, 0, strlen($resultados)-2);

    return empty($resultados);
}

function verificaCadena($cadena, $subcadena){
    $cadenaTratada = explode(" ",strtolower($cadena));
    $resultados = "";

    foreach ($cadenaTratada as $palabra) {
        
        if ( preg_match(("/$subcadena/"), $palabra) ) {
            $resultados .= $palabra .", ";
        }
    }
    $resultados = substr($resultados, 0, strlen($resultados)-2);

    return "Se han encontrado las siguientes palabras en '{$cadena}'
    que tienen la subcadena '{$subcadena}': <br>" . $resultados;
}