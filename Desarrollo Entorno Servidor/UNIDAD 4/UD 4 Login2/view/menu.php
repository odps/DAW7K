<?php
include "../view/footer.php";
include "../view/header.php";

if (!isset($_COOKIE["distrito"])) {
    fnCreateCookie("distrito", "Patraix");
}

fnHeader();
echo '<br><br><a href="form_distritos.php">Datos por distritos</a> <br>';
echo '<a href="form_barrios.php">Datos por barrios (Patraix)</a> <br><br>';
fnFooter()
?>
<a href="../index.php">Inicio</a><br>