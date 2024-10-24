<?php
include("libs/bGeneral.php");
//INICIO MODIFICACIONES PARA FICHERO
include "../Ej3/index.php";


cabecera();
echo "<h1>Hola! " . $_GET["nombre"] . "</h1>";
$user = [];
$pc = [];
$numTiradas = $_GET["dado"];
$totalUser = 0;
$totalPC = 0;

for ($i = 0; $i < $numTiradas; $i++) {
    $user[$i] = tiradaDado();
    $pc[$i] = tiradaDado();
    $totalUser += $user[$i];
    $totalPC += $pc[$i];
}

echo "<h2>Tiradas del usuario:</h2>";
for ($i = 0; $i < $numTiradas; $i++) {
    if ($_GET["imagenes"]) {
        echo "<img src='./imgs/" . $user[$i] . ".png'>";
    } else
        echo "<p>Tirada " . ($i + 1) . ": " . $user[$i] . "</p>";
}


echo "<h2>Tiradas del ordenador:</h2>";
for ($i = 0; $i < $numTiradas; $i++) {
    if ($_GET["imagenes"]) {
        echo "<img src='./imgs/" . $pc[$i] . ".png'>";
    } else
        echo "<p>Tirada " . ($i + 1) . ": " . $pc[$i] . "</p>";
}

echo "<h2>Resultado:</h2>";
if ($totalUser > $totalPC) {
    echo "<p>Has ganado!</p>";
    cuentaVisitas("./counterPlayer.txt");
} elseif ($totalUser < $totalPC) {
    echo "<p>Has perdido!</p>";
    cuentaVisitas("./counterPC.txt");
} else {
    echo "<p>Has empatado!</p>";
}

echo "<a href='controller2.php'>Volver a jugar</a>";

pie();


function tiradaDado()
{
    $dado = rand(1, 6);
    return $dado;
}
