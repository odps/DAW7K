<?php

if (is_file("counterPlayer.txt") && is_file("counterPC.txt")) {
    $counterPlayer = fopen("counterPlayer.txt", "r+");
    echo "Jugador: " . fgets($counterPlayer) . "<br>";
    fclose($counterPlayer);

    $counterPC = fopen("counterPC.txt", "r+");
    echo "PC: " . fgets($counterPC);
    fclose($counterPC);

    echo "<br><a href='./formEjer_2.php'>Volver</a>";
} else {
    echo "No se han encontrado los ficheros";
}
