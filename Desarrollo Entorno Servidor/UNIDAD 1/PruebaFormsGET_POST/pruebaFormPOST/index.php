<?php

if (isset($_POST["nombre"])){
    $nombre = $_POST["nombre"];
} else {
    $nombre = "";
}

if (isset($_POST["apellido"])){
    $apellido = $_POST["apellido"];
} else {
    $apellido = "";
}

echo "Hemos enviado el nombre: " . $nombre . "<br>";
echo "Hemos enviado el apellido: " . $apellido . "<br>";


?>