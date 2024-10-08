<?php
include("libs/bGeneral.php");
cabecera();
$errores = [];
$provincias = ["Alicante", "Castellón", "Valencia"];
$aficiones = ["Deportes", "Viajar", "Cine", "Videojuegos"];

if (isset($_POST["bAceptar"])) {
    $nombre = recoge("nombre");
    $provincia = recoge("provincias");
    $premium = recoge("premium");
    $checkboxes = $_POST["aficiones"];

    cTexto($nombre, "nombre", $errores, 40);
    cTexto($provincia, "provincias", $errores);

    if (empty($checkboxes)) {
        $errores["aficiones"] = "Debe introducir al menos una afición";
    } else {
        foreach ($checkboxes as $aficion) {
            cTexto($aficion, "aficiones", $errores);
        }
    }

    if (count($errores) === 0) {
        header("Location: result3.php?nombre=$nombre&provincia=$provincia&premium=$premium&aficiones=" . serialize($checkboxes));
    }
}

include("formEjer_3.php");
pie();
