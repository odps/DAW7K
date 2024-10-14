<!DOCTYPE html>
<?php
include "datos_barrios.php";
include "../view/header.php";
include "../view/footer.php";

$barrio = $_GET["barrio"];

fnHeader();

if ($barrio == "todos") {
    echo "<h2>Todos los barrios de Patraix</h2>";
    foreach ($datos_patraix as $key => $value) {
        echo "<p>" . $value[0] . " tiene: " . $value[1] . " habitantes</p>";
    }
} else {
    echo "<h2>Barrio: " . $datos_patraix[$barrio][0] . "</h2>";
    echo "<p>" . $datos_patraix[$barrio][0] . " tiene: " . $datos_patraix[$barrio][1] . " habitantes</p>";
}

echo "<br><br><a href='../view/form_barrios.php'>Volver</a>";
fnFooter();
