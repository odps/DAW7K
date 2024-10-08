<?php

if (empty($_GET["num"])) {
    echo "Se debe introducir un numero";
} else {
    for ($star = "*"; strlen($star) <= $_GET["num"]; $star = $star . "*") {
        echo $star . "<br>";
    }
}

?>

<html>
<br>
<a href="index.html">Volver</a>

</html>