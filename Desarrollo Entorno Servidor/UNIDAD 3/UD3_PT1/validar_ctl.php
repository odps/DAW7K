<?php

$validos = array('10000000A', '20000000B', '30000000C');
$dni = $_POST["dni"];
$nombre = "";
$apellido = "";

if (!in_array($dni, $validos)) {
    echo "Ha ocurrido un error 😢";
} else {

    if (isset($_POST["nombre"])) {
        $nombre = $_POST["nombre"];
    }

    if (isset($_POST["apellido"])) {
        $apellido = $_POST["apellido"];
    }

    header("Location: " . "menu.php?nombre=" . $nombre . "&apellido=" . "$apellido");
}


?>

<html>
<br><br>
<a href="index.html">Volver</a>

</html>