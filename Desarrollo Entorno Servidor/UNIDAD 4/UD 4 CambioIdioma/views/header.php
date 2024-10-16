<?php
function fnHeader()
{
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lenguajes</title>
    </head>
    <style>
        body {
            text-align: center;
        }
    </style>

    <body>
        <header>
            <?php
            $lang = isset($_COOKIE['lang']) ? $_COOKIE['lang'] : "";
            switch ($lang) {
                case "es":
                    echo "<a href='./index.php'>Indice</a><br>";
                    echo "<a href='./content.php'>Contenido</a>";
                    break;
                case "en":
                    echo "<a href='./index.php'>Index</a><br>";
                    echo "<a href='./content.php'>Content</a>";
                    break;
                default:
                    echo "<a href='./index.php'>Indice</a><br>";
                    echo "<a href='./content.php'>Contingut</a>";
                    break;
            }
            ?>
        </header>
    <?php
}
