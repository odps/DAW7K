<?php

$nombre = $_GET["nombre"];
$apellido = $_GET["apellido"];

echo "<h1>Bienvenido " . $nombre . " " . $apellido . " 👋😄</h1>";


echo '<br><br><a href="form_distritos.php?nombre=' . $nombre . '&apellido=' . $apellido . ' ">Datos por distritos</a> <br>';
echo '<a href="form_barrios.php?nombre=' . $nombre . '&apellido=' . $apellido . '">Datos por barrios (Patraix)</a> <br><br>';

?>

<html>
<a href=" index.html">Inicio</a><br>

</html>