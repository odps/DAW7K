<?php
include("./libs/bGeneral.php");

$errores = [];
cabecera();
if (isset($_POST["bAceptar"])) {
    $nombre = recoge("nombre");
    cTexto($nombre, "nombre", $errores, 40);

    $edad = recoge("edad");
    cNum($edad, "edad", $errores, 150, 0);

    if (count($errores) == 0) {
        header("Location: correcto.php?nombre=$nombre&edad=$edad");
    }
}
include("formEjer_1.php");
pie();
