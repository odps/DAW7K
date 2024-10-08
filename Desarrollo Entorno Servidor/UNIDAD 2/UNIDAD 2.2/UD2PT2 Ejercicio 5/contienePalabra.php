<?php

function contieneSubcadena($cadena, $subcadena)
{
    $cadenaTratada = explode(" ", strtolower($cadena));
    $resultados = "";

    foreach ($cadenaTratada as $palabra) {

        if (preg_match(("/$subcadena/"), $palabra)) {
            $resultados .= $palabra . ", ";
        }
    }
    $resultados = substr($resultados, 0, strlen($resultados) - 2);

    return empty($resultados);
}

function verificaCadena($cadena, $subcadena)
{
    $cadenaTratada = explode(" ", strtolower($cadena));
    $subcadenaTratada =  quitaAcentos($subcadena); //iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', strtolower($subcadena));

    $resultados = "";

    foreach ($cadenaTratada as $palabra) {

        $palabra = str_replace(",", "", $palabra);
        if (preg_match(("/$subcadenaTratada/"), $palabra)) {
            $resultados .= $palabra . ", ";
        }
    }
    $resultados = substr($resultados, 0, strlen($resultados) - 2);

    return "Se han encontrado las siguientes palabras en '{$cadena}'
    que tienen la subcadena '{$subcadena}': <br>" . $resultados;
}


function quitaAcentos($palabra)
{

    $accented = ['á', 'é', 'í', 'ó', 'ú', 'ñ', 'ç', 'à', 'è', 'ù', 'Á', 'É', 'Í', 'Ó', 'Ú', 'Ñ', 'Ç'];
    $unaccented = ['a', 'e', 'i', 'o', 'u', 'n', 'c', 'a', 'e', 'u', 'A', 'E', 'I', 'O', 'U', 'N', 'C'];

    $cleanedString = str_replace($accented, $unaccented, $palabra);
    $result = strtolower($cleanedString);
    return $result;
}
