<?php
include "./views/header.php";
include "./views/footer.php";
include "./controller/libCookies.php";

fnHeader();
$lang = fnGetCookie("lang");

switch ($lang) {
    case "va":
        echo "<h1>Contingunt en Valenciá</h1>";
        break;
    case "es":
        echo "<h1>Contenido en Castellano</h1>";
        break;
    case "en":
        echo "<h1>Content in English</h1>";
        break;
}

if (!empty($_COOKIE)) {
    $idioma = [
        'va' => 'Esborrar cookies',
        'es' => 'Borrar cookies',
        'en' => 'Delete cookies'
    ];

    echo "<a href='./controller/borrarCookies.php'>$idioma[$lang]</a>";
}

fnFooter();
