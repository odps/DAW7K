<?php
include "./footer.php";
include "./header.php";
include "../controller/libs/libCookies.php";

fnCabecera();
include "./list_frases.php";
echo "<a href='../index.php'>Volver</a> <br>";

if (isset($_COOKIE["frasesConocidas"])) {
    echo "<a href='../controller/reiniciar.php'>Borrar todas las frases</a>";
}
fnFooter();