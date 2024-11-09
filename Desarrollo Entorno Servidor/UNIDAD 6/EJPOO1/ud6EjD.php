<?php

class Empleado
{
    private $nombre;
    private $apellido;
    private $sueldo;
    private const SUELDO_TOPE = 3333;

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
        return ($this->sueldo > self::SUELDO_TOPE) ? true : false;
    }

}

$empleado = new Empleado('Juan', 'Perez', 4000);
echo $empleado->getNombreCompleto() . '<br>';
echo ($empleado->debePagar()) ? 'Debe pagar impuestos' : 'No debe pagar impuestos';