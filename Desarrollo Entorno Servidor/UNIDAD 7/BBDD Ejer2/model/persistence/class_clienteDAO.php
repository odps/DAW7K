<?php
require_once 'class_db.php';

class clienteDAO extends db
{
    public function inserirCliente($cliente)
    {
        $fechaN = $cliente->getFechaN()->format('Y-m-d');

        $query = "INSERT INTO cliente (dni, nombre, apellidos, fechaN) VALUES ('" . $cliente->getDni() . "',
        '" . $cliente->getNombre() . "', '" . $cliente->getApellido() . "', '" . $fechaN . "');";

        $resultado = $this->consulta($query);
        $this->close();

        return $resultado;
    }

    public function eliminarCliente($id)
    {
        $query = "DELETE FROM cliente WHERE id = '" . $id . "';";

        $resultado = $this->consulta($query);
        $this->close();

        return $resultado;
    }

    public function buscarClienteId($id)
    {
        $query = "SELECT * FROM cliente WHERE id = '" . $id . "';";

        $consulta = $this->consulta($query);
        $this->close();

        $row = $consulta->fetch_object();

        if (isset($row)) {
            $cliente = new Cliente($row->dni, $row->nombre, $row->apellidos, $row->fechaN);
            $cliente->setId($row->id);

            return $cliente;
        }
    }

    public function verClientes()
    {
        $query = "SELECT * FROM cliente;";

        $consulta = $this->consulta($query);
        $this->close();

        $arrayClientes = array();
        foreach ($consulta as $row) {
            $cliente = new Cliente($row['dni'], $row['nombre'], $row['apellidos'], $row['fechaN']);
            $cliente->setId($row['id']);
            array_push($arrayClientes, $cliente);
        }

        return $arrayClientes;
    }

    public function editarCliente($id, $dni, $nombre, $apellido, $fechaN)
    {
        $query = "UPDATE cliente SET nombre = '" . $nombre . "', apellidos = '" . $apellido . "', fechaN = '" . $fechaN . "', dni = '" . $dni . "' WHERE id = '" . $id . "';";

        $resultado = $this->consulta($query);
        $this->close();

        return $resultado;
    }
}