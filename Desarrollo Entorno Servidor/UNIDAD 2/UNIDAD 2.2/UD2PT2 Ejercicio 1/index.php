<?php

$frase = "Esta cadena contiene ? vocales";
$fraseAnalizada = '';
$fraseMinus = str_replace(" ","",strtolower($frase));

//Utilizando preg_match()

for ($i=0; $i <= strlen($frase); $i++) { 
    if (preg_match(("/[aáàäeéèëiíìïoóòöuúùü]/"), $fraseMinus[$i])) {
        $fraseAnalizada .= $frase[$i];
    }
}

echo "Hay ".strlen($fraseAnalizada)." vocales en: \"{$frase}\"";


//Utilizando preg_match_all()

$fraseMatchAll = preg_match_all(("/[aáàeéèiíìoóòuúù]/"),$fraseMinus);

echo "<br>Utilizando preg_match_all hay: ".$fraseMatchAll." vocales <br>";