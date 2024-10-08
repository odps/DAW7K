<?php

function cuentaVocales($frase) {
    $fraseAnalizada = '';
    $fraseMinus = str_replace(" ","",strtolower($frase));

    for ($i=0; $i <= strlen($frase); $i++) { 
        if (preg_match(("/[aáàäeéèëiíìïoóòöuúùü]/"), $fraseMinus[$i])) {
            $fraseAnalizada .= $frase[$i];
        }
    }

    return strlen($fraseAnalizada);
  }