<?php

$i = 1;
$result = 0;

//While

/*
while ($i <= 50) {
    if( $i%3==0 ){
        $result += $i;
    }
    $i++;
}
*/

//Do-While
/*
do {

    if ($i % 3 == 0) {
        $result += $i;
    }
    $i++;
} while ($i <= 50);
*/

//For
for ($i = 0; $i < 50; $i++) {
    if ($i % 3 == 0) {
        $result += $i;
    }
}


//Salida en pantalla
echo 'La suma de valores divisibles entre tres es: ' . $result;
