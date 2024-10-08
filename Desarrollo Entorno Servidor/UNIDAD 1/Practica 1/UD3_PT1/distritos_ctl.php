<!DOCTYPE html>
<?php
include "datos_distritos.php";
$nombre = $_GET["nombre"];
$apellido = $_GET["apellido"];
$distrito = $_GET["distrito"];


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

    if (isset($_GET["todos"])) {
        echo "<h3>Todos los distritos</h3>";
        foreach ($datos_distritos as $distrito => $poblacion) {
            echo "$distrito tiene: " . $poblacion . " habitantes <br>";
        }
    } else
        echo "$distrito tiene: " . $datos_distritos[$distrito] . " habitantes";

    ?>

</body>

</html>