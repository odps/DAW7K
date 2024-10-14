<?php
session_start();
include "./view/footer.php";
include "./view/header.php";
include "./controller/libs/libCookies.php";

fnCabecera();
echo "<h1>Bienvenido 👋</h1><br><br>";
echo "<a href='./view/form.php'>Introducir una frase.</a><br>";
echo "<a href='./view/introducida.php'>Ver frases introducidas.</a><br>";

if (isset($_SESSION["frasesConocidas"])) {
    echo "<p>Frases introducidas: "  . count(fnGetSessionSerialized("frasesConocidas")) . "</p>";
} else {
    echo "<p>Frases introducidas: 0</p>";
}
fnFooter();
