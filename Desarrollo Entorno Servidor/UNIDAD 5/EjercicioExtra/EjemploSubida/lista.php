<?php
include "./libs/bGeneral.php";
include "./Usuario.php";

cabecera('Lista');

if ($archivo = fopen("usuarios.txt", "r")) {
    while (!feof($archivo)) {
        $linea = fgets($archivo);
        $usuario = unserialize($linea);
        if ($usuario == null) {
            continue;
        }
        echo "<p>Nombre: " . $usuario->nombre . "</p>";
        echo "<p>Edad: " . $usuario->edad . "</p>";
        echo "<img src='./imagenes/" . $usuario->imagen . "'></img>";
        echo "<hr>";
    }
    fclose($archivo);
}
echo "<br><br><a href='./EjemploSubida.php'>Volver</a>";
pie();
