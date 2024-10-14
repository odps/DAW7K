<?php
//session_start();
include "./libs/libCookies.php";

if (isset($_SESSION['frasesConocidas'])) {
    $frasesConocidas = fnGetSessionSerialized("frasesConocidas");
} else {
    $frasesConocidas = [];
}

if (isset($_POST['frase'])) {
    $frase = fnClean($_POST['frase']);
    array_push($frasesConocidas, $frase);
    fnCreateSessionSerialized("frasesConocidas", $frasesConocidas);
    header("Location: ../view/form.php");
}
