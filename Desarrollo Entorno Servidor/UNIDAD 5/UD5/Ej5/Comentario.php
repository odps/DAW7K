<?php

class Comentario
{
    public $comentario;
    public $nombre;
    public $email;
    public $fecha;

    public function __construct($comentario, $nombre, $email)
    {
        $this->comentario = $comentario;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->fecha =
            date("d-m-Y H:i", time());;
    }
}
