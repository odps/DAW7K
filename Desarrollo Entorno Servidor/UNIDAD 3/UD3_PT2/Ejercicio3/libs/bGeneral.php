<?php

function cabecera($titulo = NULL) // el archivo actual
{
    if (is_null($titulo)) {
        $titulo = basename(__FILE__);
    }
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <title>
            <?php
            echo $titulo;
            ?>

        </title>
        <meta charset="utf-8" />
    </head>

    <body>
    <?php
}

function pie()
{
    echo "</body>
	</html>";
}

function sinTildes($frase)
{
    $no_permitidas = array(
        "á",
        "é",
        "í",
        "ó",
        "ú",
        "Á",
        "É",
        "Í",
        "Ó",
        "Ú",
        "à",
        "è",
        "ì",
        "ò",
        "ù",
        "À",
        "È",
        "Ì",
        "Ò",
        "Ù"
    );
    $permitidas = array(
        "a",
        "e",
        "i",
        "o",
        "u",
        "A",
        "E",
        "I",
        "O",
        "U",
        "a",
        "e",
        "i",
        "o",
        "u",
        "A",
        "E",
        "I",
        "O",
        "U"
    );
    $texto = str_replace($no_permitidas, $permitidas, $frase);
    return $texto;
}

function sinEspacios($frase)
{
    $texto = trim(preg_replace('/ +/', ' ', $frase));
    return $texto;
}

function recoge($var)
{
    if (isset($_REQUEST[$var]) && (!is_array($_REQUEST[$var]))) {
        $tmp = sinEspacios($_REQUEST[$var]);
        $tmp = strip_tags($tmp);
    } else
        $tmp = "";

    return $tmp;
}

function cTexto(string $text, string $campo, array &$errores, int $max = 30, int $min = 1, bool $espacios = TRUE, bool $case = TRUE)
{
    $case = ($case === TRUE) ? "i" : "";
    $espacios = ($espacios === TRUE) ? " " : "";
    if ((preg_match("/^[a-zñ$espacios]{" . $min . "," . $max . "}$/u$case", sinTildes($text)))) {
        return true;
    }
    $errores[$campo] = "Error en el campo $campo";
    return false;
}

function cNum($num, $campo, &$errores, $max = PHP_INT_MAX, $min = -PHP_INT_MAX)
{
    if (filter_var($num, FILTER_VALIDATE_INT, array("options" => array("min_range" => $min, "max_range" => $max))) === false) {
        $errores[$campo] = "Error en el campo $campo";
        return false;
    }
    return true;
}


function pintaRadio($provincias, $nombre)
{
    foreach ($provincias as $provincia) {
        echo "<input type='radio' name='$nombre' value='$provincia' required>$provincia<br>";
    }
}

function pintaCheck($aficiones, $nombre)
{
    foreach ($aficiones as $aficion) {
        echo "<input type='checkbox' name='$nombre" . "[]' value='$aficion'>$aficion<br>";
    }
}


    ?>