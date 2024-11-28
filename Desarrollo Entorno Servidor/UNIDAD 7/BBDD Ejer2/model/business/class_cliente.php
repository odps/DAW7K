<?php

class Cliente
{
    public $id;
    public $dni;
    public $nombre;
    public $apellido;
    public $fechaN;

    public function __construct($dni, $nombre, $apellido, $fechaN)
    {
        $this->setId(null);
        $this->setdni($dni);
        $this->setNombre($nombre);
        $this->setApellido($apellido);
        $this->setFechaN($fechaN);
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setDni($dni)
    {
        $this->dni = $dni;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function setFechaN($fechaN)
    {
        if (!$fechaN instanceof DateTime) {
            $fechaN = new DateTime($fechaN);
        }
        $this->fechaN = $fechaN;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDni()
    {
        return $this->dni;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function getNombreApellido()
    {
        return $this->getNombre() . " " . $this->getApellido();
    }

    public function getFechaN()
    {
        return $this->fechaN;
    }
}
