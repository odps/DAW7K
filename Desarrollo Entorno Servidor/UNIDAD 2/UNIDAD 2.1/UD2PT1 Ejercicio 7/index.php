<?php

$cursos = array("DAW", "DAM", "ASIR");
$frase = "Los ciclos de informatica son: ";

foreach($cursos as $x){
$frase = $frase . $x . ",";
}
$frase[strlen($frase)-1]=".";
echo $frase;
?>

