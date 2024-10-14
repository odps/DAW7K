<?php
include "../libs/libCookies.php";
$validos = array('10000000A', '20000000B', '30000000C');

$dni = $_POST["dni"];

if (!in_array($dni, $validos)) {

    header("Location: ../view/error.php");
} else {

    $nombre = "";
    $apellido = "";

    if (isset($_POST["nombre"])) {
        $nombre = $_POST["nombre"];
    }
    if (isset($_POST["apellido"])) {
        $apellido = $_POST["apellido"];
    }

    $nombreApe = [];
    $nombreApe["nombre"] = $nombre;
    $nombreApe["apellido"] = $apellido;

    fnCreateCookieSerialized("nombreApe", $nombreApe);

    header("Location: ../view/menu.php");
}
