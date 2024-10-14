<?php
include "footer.php";
include "header.php";
include "../controller/datos_distritos.php";

if (!isset($_COOKIE["contador"])) {
    fnCreateCookie("contador", 1);
} else {
    $contador = $_COOKIE["contador"];
    $contador++;
    fnCreateCookie("contador", $contador);
}

fnHeader();
?>

<form action="../controller/distritos_ctl.php" method="get">
    <?php

    echo '<select name="distrito" id="distrito">';

    foreach ($datos_distritos as $distrito => $poblacion) {
        if ($distrito == $_COOKIE["distrito"]) {
            echo "<option selected value='" . $distrito . "'>" . $distrito . "</option>";
        } else
            echo "<option value='" . $distrito . "'>" . $distrito . "</option>";
    }

    echo '</select>'
    ?>

    <br><br>
    <label for="todos">Mostrar todos los distritos</label>
    <input type="checkbox" name="todos" id="todos">
    <br><br>
    <input type="submit" value="Consultar">
</form>
<br><br>
<a href="menu.php">Volver</a>
<?php

fnFooter();
echo "<h3> Visitas a esta página: " . $contador . "</h3>";
?>