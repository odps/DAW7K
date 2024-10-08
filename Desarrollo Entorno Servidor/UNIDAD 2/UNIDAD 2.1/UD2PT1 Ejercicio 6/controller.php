<?php

if (!empty($_GET["num"])) {

    $max = $_GET["num"];
    $min = 1;
    $star = "*";

    for ($i = 1; $i <= $max; $i++) {

        for ($j = 0; $j < $max - $min; $j++) {
            echo "&nbsp&nbsp";
        }
        for ($k = 0; $k < $min; $k++) {
            echo $star . "&nbsp&nbsp";
        }

        $min++;
        echo "</br>";
    }
} else
    echo "Error"
?>
<html>
<br>
<a href="index.html">Volver</a>

</html>