<?php
include "./libs/bGeneral.php";
include "./Usuario.php";

cabecera('Success');
echo "<p>Nombre: " . $_GET['nombre'] . "</p>";
echo "<p>Edad: " . $_GET['edad'] . "</p>";
echo "<img src='./imagenes/" . $_GET['imagen'] . "'></img>";

$usuario = new Usuario($_GET['nombre'], $_GET['edad'], $_GET['imagen']);

if ($archivo = fopen("usuarios.txt", "a")) {
    fwrite($archivo, serialize($usuario) . PHP_EOL);
    fclose($archivo);
    echo "<p>Se ha guardado correctamente la información</p>";
} else {
    echo "<p>No se ha podido guardar la información</p>";
}
echo "<br><br><a href='./EjemploSubida.php'>Volver</a>";
pie();
