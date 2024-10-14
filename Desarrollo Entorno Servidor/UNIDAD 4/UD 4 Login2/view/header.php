<?php

include "../libs/libCookies.php";

function fnHeader()
{
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>distritos_ctl</title>
        <style>
            body {
                text-align: center;
            }
        </style>
    </head>

    <body>

    <?php

    if (isset($_COOKIE['nombreApe'])) {

        $nombre = fnGetCookieSerialized("nombreApe")["nombre"];
        $apellido = fnGetCookieSerialized("nombreApe")["apellido"];

        echo "<h1>Bienvenido " . $nombre . " " . $apellido . " 👋😄</h1>";
    }
}
