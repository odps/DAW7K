<!DOCTYPE html>
<?php
include "datos_barrios.php";
$nombre = $_GET["nombre"];
$apellido = $_GET["apellido"];
$barrio = $_GET["barrio"];


?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>distritos_ctl</title>
</head>

<body>
    <?php
    echo "<h1>Bienvenido " . $nombre . " " . $apellido . " 👋😄</h1>";

    if ($barrio == "todos") {
        echo "<h2>Todos los barrios de Patraix</h2>";
        foreach ($datos_patraix as $key => $value) {
            echo "<p>" . $value[0] . " tiene: " . $value[1] . " habitantes</p>";
        }
    } else {
        echo "<h2>Barrio: " . $datos_patraix[$barrio][0] . "</h2>";
        echo "<p>" . $datos_patraix[$barrio][0] . " tiene: " . $datos_patraix[$barrio][1] . " habitantes</p>";
    }

    ?>

</body>

</html>