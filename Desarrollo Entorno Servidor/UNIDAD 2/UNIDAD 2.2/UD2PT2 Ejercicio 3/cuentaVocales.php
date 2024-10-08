<?php

function cuentaVocales($frase) {

    $fraseMinus = str_replace(" ","",strtolower($frase));
    $fraseMatchAll = preg_match_all(("/[aáàeéèiíìoóòuúù]/"),$fraseMinus);

    return $fraseMatchAll;
  }