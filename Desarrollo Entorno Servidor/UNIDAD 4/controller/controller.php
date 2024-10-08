<?php
include "./libs/libCookies.php";

if (isset($_COOKIE['frasesConocidas'])) {
    $frasesConocidas = fnGetCookieSerialized("frasesConocidas");
} else {
    $frasesConocidas = [];
}

if (isset($_POST['frase'])) {
    $frase = fnClean($_POST['frase']);
    array_push($frasesConocidas, $frase);
    fnCreateCookieSerialized("frasesConocidas", $frasesConocidas);
    header("Location: ../view/form.php");
}
