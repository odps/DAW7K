<?php

if (is_file("counterPlayer.txt") && is_file("counterPC.txt")) {
    $counterPlayer = fopen("counterPlayer.txt", "r+");
    fwrite($counterPlayer, 0);
    fclose($counterPlayer);

    $counterPC = fopen("counterPC.txt", "r+");
    fwrite($counterPC, 0);
    fclose($counterPC);

    echo "Se han borrado los resultados.<br><a href='./formEjer_2.php'>Volver</a>";
} else {
    echo "No se han encontrado los ficheros";
}
