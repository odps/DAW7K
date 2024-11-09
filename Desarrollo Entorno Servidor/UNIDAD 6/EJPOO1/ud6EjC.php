<?php

class Empleado
{
    private $nombre;
    private $apellido;
    private $sueldo;

    public function __construct(string $nombre, string $apellido, int $sueldo = 1000)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->sueldo = $sueldo;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function getSueldo()
    {
        return $this->sueldo;
    }

    public function getNombreCompleto()
    {
        return $this->nombre . ' ' . $this->apellido;
    }

    public function debePagar()
    {
        return ($this->sueldo > 3333) ? true : false;
    }

}

$empleado = new Empleado('Juan', 'Perez');
echo $empleado->getNombreCompleto() . '<br>';
echo $empleado->getSueldo() . '<br>';

$empleado2 = new Empleado('Pedro', 'Gomez', 4000);
echo $empleado2->getNombreCompleto() . '<br>';
echo $empleado2->getSueldo() . '<br>';
