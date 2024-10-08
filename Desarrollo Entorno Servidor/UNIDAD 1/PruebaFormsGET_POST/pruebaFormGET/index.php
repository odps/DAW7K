<?php

if (isset($_GET["nombre"])){
    $nombre = $_GET["nombre"];
} else {
    $nombre = "";
}

if (isset($_GET["apellido"])){
    $apellido = $_GET["apellido"];
} else {
    $apellido = "";
}

echo "Hemos recibido el nombre: " . $nombre . "<br>";
echo "Hemos recibido el apellido: " . $apellido . "<br>";

?>