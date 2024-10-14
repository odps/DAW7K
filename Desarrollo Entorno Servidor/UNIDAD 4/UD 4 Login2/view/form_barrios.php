<?php
include "header.php";
include "footer.php";
include "../controller/datos_barrios.php";

fnHeader();
?>
<form action="../controller/barrios_ctl.php" method="get">

    <?php
    echo '<select name="barrio" id="barrio">';

    echo "<option value='todos' selected> Mostrar todos</option>";

    foreach ($datos_patraix as $key => $value) {
        $nombre_barrio = $value[0];
        echo "<option value='" . $key . "'>" . $nombre_barrio . "</option>";
    }

    echo '</select>'
    ?>
    <br><br>
    <input type="submit" value="Consultar">
</form>
<br><br>
<a href='../view/menu.php'>Volver</a>

<?php
fnFooter();
