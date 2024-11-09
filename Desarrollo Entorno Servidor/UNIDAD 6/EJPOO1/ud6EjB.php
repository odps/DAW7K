<?php


class Empleado
{
    private $nombre;
    private $apellido;
    private $sueldo;
    private $telefonos = [];

    public function __construct($nombre, $apellido, $sueldo)
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

    public function setNombre(string $nombre)
    {
        $this->nombre = $nombre;
    }

    public function setApellido(string $apellido)
    {
        $this->apellido = $apellido;
    }

    public function setSueldo(float $sueldo)
    {
        $this->sueldo = $sueldo;
    }

    public function getNombreCompleto()
    {
        return $this->nombre . ' ' . $this->apellido;
    }

    public function debePagar()
    {
        return this->sueldo > 3333 ? true : false;
    }

    public function anadirTelefono($telefono): void
    {
        $this->telefonos[] = $telefono;
    }

    public function getTelefonos(): string
    {
        return implode(', ', $this->telefonos);
    }

    public function vaciarTelefonos(): void
    {
        $this->telefonos = [];
    }

}

$empleado = new Empleado('Juan', 'Perez', 1000);
$empleado->anadirTelefono('123456789');
$empleado->anadirTelefono('987654321');
echo $empleado->getTelefonos();
