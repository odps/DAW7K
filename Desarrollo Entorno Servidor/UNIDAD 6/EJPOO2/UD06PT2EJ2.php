<?php

class Persona
{
    protected string $nombre;
    protected string $apellido;
    protected int $edad;

    public function __construct(string $nombre, string $apellido, int $edad)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->edad = $edad;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function getEdad()
    {
        return $this->edad;
    }

    public function getNombreCompleto()
    {
        return $this->nombre . ' ' . $this->apellido;
    }

    public function setNombre(string $nombre)
    {
        $this->nombre = $nombre;
    }

    public function setApellido(string $apellido)
    {
        $this->apellido = $apellido;
    }

    public function setEdad(int $edad)
    {
        $this->edad = $edad;
    }
}

abstract class Trabajador extends Persona
{
    private array $telefonos = [];
    public static int $SUELDO_TOPE = 3333;

    public function addTelefono(int $telefono)
    {
        $this->telefonos[] = $telefono;
    }

    public function getTelefonos()
    {
        return $this->telefonos;
    }

    abstract public function calcularSueldo();

    abstract public function debePagarImpuestos();
}

class Empleado extends Trabajador
{
    private int $horasTrabajadas;
    private int $precioPorHora;

    public function __construct(string $nombre, string $apellido, int $edad, int $horasTrabajadas, int $precioPorHora)
    {
        parent::__construct($nombre, $apellido, $edad);
        $this->horasTrabajadas = $horasTrabajadas;
        $this->precioPorHora = $precioPorHora;
    }

    public function setHorasTrabajadas(int $horas)
    {
        $this->horasTrabajadas = $horas;
    }

    public function setPrecioHora(int $precio)
    {
        $this->precioPorHora = $precio;
    }

    public function getHorasTrabajadas()
    {
        return $this->horasTrabajadas;
    }

    public function getPrecioHora()
    {
        return $this->precioPorHora;
    }

    public function calcularSueldo()
    {
        return $this->horasTrabajadas * $this->precioPorHora;
    }

    public function debePagarImpuestos()
    {
        return ($this->edad >= 21 && $this->calcularSueldo() > self::$SUELDO_TOPE);
    }
}

class Gerente extends Trabajador
{
    private int $salario;

    public function __construct(string $nombre, string $apellido, int $edad, int $salario)
    {
        parent::__construct($nombre, $apellido, $edad);
        $this->salario = $salario;
    }

    public function getSalario()
    {
        return $this->salario;
    }

    public function setSalario(int $salario)
    {
        $this->salario = $salario;
    }

    public function calcularSueldo()
    {
        return $this->salario + ($this->salario * ($this->edad / 100));
    }

    public function debePagarImpuestos()
    {
        return ($this->edad >= 21 && $this->calcularSueldo() > self::$SUELDO_TOPE);
    }
}

/*PRUEBAS*/

$empleado = new Empleado('Juan', 'Perez', 25, 40, 10);
$empleado->addTelefono(123456789);
$empleado->addTelefono(987654321);
echo 'Nombre completo: ' . $empleado->getNombreCompleto() . '<br>';
echo 'Edad: ' . $empleado->getEdad() . '<br>';
echo 'Sueldo: ' . $empleado->calcularSueldo() . '<br>';
echo 'Debe pagar impuestos: ' . ($empleado->debePagarImpuestos() ? 'Sí' : 'No') . '<br>';
echo 'Teléfonos: ' . implode(', ', $empleado->getTelefonos()) . '<br>';

echo '<br>';

$gerente = new Gerente('Pedro', 'Gomez', 33, 5000);
$gerente->addTelefono(123456789);
$gerente->addTelefono(987654321);
echo 'Nombre completo: ' . $gerente->getNombreCompleto() . '<br>';
echo 'Edad: ' . $gerente->getEdad() . '<br>';
echo 'Sueldo: ' . $gerente->calcularSueldo() . '<br>';
echo 'Debe pagar impuestos: ' . ($gerente->debePagarImpuestos() ? 'Sí' : 'No') . '<br>';
echo 'Teléfonos: ' . implode(', ', $gerente->getTelefonos()) . '<br>';

