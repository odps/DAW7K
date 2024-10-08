<?php
include("./libs/bGeneral.php");
cabecera();
echo "<h1>Hola! " . $_GET["nombre"] . " tu edad es: " . $_GET["edad"] . "</h1>";
pie();
