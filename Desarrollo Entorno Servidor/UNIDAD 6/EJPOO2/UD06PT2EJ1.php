<?php

class Persona
{
    protected $nombre;
    protected $apellido;
    protected $edad;

    public function __construct(string $nombre, string $apellido, string $edad = '18')
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->edad = $edad;
    }

    protected function getNombre()
    {
        return $this->nombre;
    }

    protected function getApellido()
    {
        return $this->apellido;
    }

    protected function getEdad()
    {
        return $this->edad;
    }

    protected function getNombreCompleto()
    {
        return $this->nombre . ' ' . $this->apellido;
    }

    protected function setEdad(string $edad)
    {
        if (intval($edad) > 0) {
            $this->edad = $edad;
        }
    }
}

class Empleado extends Persona
{

    private $sueldo;
    private $numeros = [];
    public static $SUELDO_TOPE = 3333;

    public function __construct(string $nombre, string $apellido, string $edad, int $sueldo = 1000)
    {
        parent::__construct($nombre, $apellido, $edad);
        $this->sueldo = $sueldo;

    }

    public function getSueldo()
    {
        return $this->sueldo;
    }

    public function addNumero($numero)
    {
        $this->numeros[] = $numero;
    }

    public function getNumeros()
    {
        return $this->numeros;
    }


    public function debePagar()
    {
        return ($this->sueldo > self::$SUELDO_TOPE && (intval($this->edad) >= 21)) ? true : false;
    }

    public function muestraDatos()
    {

        echo '<p>Nombre: ' . $this->getNombreCompleto() . '<br>' . 'Sueldo: ' . $this->getSueldo() . '<br>' . 'Edad: ' . $this->getEdad() . '<br>' . 'Debe pagar impuestos: ' . ($this->debePagar() ? 'Sí' : 'No') . '<br></p>';

        echo 'Numeros:<ol>';
        foreach ($this->numeros as $numero) {
            echo '<li>' . $numero . '</li>';
        }
        echo '</ol>';
    }
}

/*PRUEBAS*/

$empleado1 = new Empleado('Juan', 'Perez', 33, 4000);
$empleado1->addNumero(5);
$empleado1->addNumero(3);
$empleado1->muestraDatos();