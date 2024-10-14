<?php
function validarUserPassword($a, $b)
{
    // En este array están las contraseñas indexadas con el usuario (como si fuese una BBDD)
    $usuarios = [
        'daw' => '123',
        'iesabastos' => '1234',
        'admin' => 'admin'
    ];
    // Si el valor de la casilla indexada con el nombre del usuario (el password real)
    // es igual que el password introducido retorna true, si no; false
    if ($usuarios[$a] == $b) {
        $ok = true;
    } else {
        $ok = false;
    }
    return $ok;
}
