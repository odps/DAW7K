<?php
include "./header.php";
include "./footer.php";

fnCabecera();
echo "<h1>Introducir una frase 👇</h1><br><br>";

echo "<form action='../controller/controller.php' method='POST'>";

echo "<label for='frase'>Frase: </label>";
echo "<input type='text' name='frase' id='frase' required>";

echo "<input type='submit' value='Enviar'><br>";

echo "</form><br>";

echo "<a href='../index.php'>Volver</a>";
fnFooter();

