<?php
echo "<h1>Frases introducidas 📚</h1><br><br>";
if (isset($_SESSION['frasesConocidas'])) {
    $frasesConocidas = fnGetSessionSerialized("frasesConocidas");
    foreach ($frasesConocidas as $frase) {
        echo "<p>$frase</p>";
    }
} else {
    echo "<p>No hay frases introducidas.</p>";
}
