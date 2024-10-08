<?php
include "contienePalabra.php";

if (empty($_POST["frase"]) || empty($_POST["busqueda"]))
    echo "Ha ocurrido un error";
else {
    $frase = $_POST["frase"];
    $busqueda = $_POST["busqueda"];

    echo verificaCadena($frase, $busqueda);
}

?>

<html>
<br><br>
<a href="index.html">Volver</a>

</html>