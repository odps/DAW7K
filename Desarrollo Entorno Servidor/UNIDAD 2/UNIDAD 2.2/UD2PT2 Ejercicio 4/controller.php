<?php
include "contienePalabra.php";

if( empty($_POST["frase"]) || empty($_POST["busqueda"]) )
    echo "Ha ocurrido un error";
else {
    $frase = $_POST["frase"];
    $busqueda = $_POST["busqueda"];

    echo verificaCadena($frase,$busqueda);
    //echo contieneSubcadena($frase, $busqueda)? "Si la tiene":"No la tiene";
}