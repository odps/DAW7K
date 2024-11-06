<?php

class Usuario
{
    public $nombre;
    public $edad;
    public $imagen;

    public function __construct($nombre, $edad, $imagen)
    {
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->imagen = $imagen;
    }
}
