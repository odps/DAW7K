<?php
include "datos_distritos.php";
include "../view/header.php";
include "../view/footer.php";

$distrito = $_GET["distrito"];
fnCreateCookie("distrito", $distrito);

fnHeader();

if (isset($_GET["todos"])) {
    echo "<h3>Todos los distritos</h3>";
    foreach ($datos_distritos as $distrito => $poblacion) {
        echo "$distrito tiene: " . $poblacion . " habitantes <br>";
    }
} else
    echo "$distrito tiene: " . $datos_distritos[$distrito] . " habitantes";

echo "<br><br><a href='../view/form_distritos.php'>Volver</a>";
fnFooter();
