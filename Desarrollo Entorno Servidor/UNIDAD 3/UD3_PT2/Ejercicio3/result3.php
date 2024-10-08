<?php
include("libs/bGeneral.php");
$nombre = recoge("nombre");
$provincia = recoge("provincia");
$premium = recoge("premium");
$aficiones = unserialize($_GET["aficiones"]);
$imgs = ["img/capi1.gif", "img/duck1.gif", "img/php1.gif"];

cabecera();
echo "<h1>Hola $nombre</h1>";
echo "<h2>Tu provincia es: $provincia</h2>";
echo $premium ? "<h2>Tu tipo de usuario es: Premium</h2>" : "<h2>Tu tipo de usuario es: Normal</h2>";
echo "<h2>Tus aficiones son: </h2>";
foreach ($aficiones as $aficion) {
    echo "<h4>$aficion</h4>";
}

echo "<img src=" . $imgs[rand(0, 2)] . ">";

pie();
