<?php
include("libs/bGeneral.php");
$errores = [];

cabecera();
if (isset($_POST["bAceptar"])) {

    $nombre = recoge("nombre");
    cTexto($nombre, "nombre", $errores, 40);
    $dado = recoge("dado");
    validaDado($dado, $errores);
    $imagenes = recoge("imagenes");
    $imagenes = ($imagenes === "on") ? true : false;

    if (count($errores) == 0) {
        header("Location: resultado.php?nombre=$nombre&dado=$dado&imagenes=$imagenes");
    }
}

if (isset($_POST["Clear"])) {
    $nombre = "";
    $dado = "";
    $imagenes = false;
}



include("formEjer_2.php");
pie();

function validaDado($campo, &$errores)
{
    $dado = intval($campo);
    if ($dado >= 1 && $dado <= 3) {
        return true;
    } else {
        $errores[$campo] = "Error en el campo $campo";
        return false;
    }
}
