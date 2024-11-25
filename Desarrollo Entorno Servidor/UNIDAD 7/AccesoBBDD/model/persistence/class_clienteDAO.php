<?php
require_once 'class_db.php';

class clienteDAO
{

    public function inserirCliente($cliente)
    {
        //$dni, $nombre, $apellido, $fechaN
        $query = "insert into cliente (dni, nombre, apellidos, fechaN) values ('" . $cliente->getDni() . "',
            '" . $cliente->getNombre() . "', '" . $cliente->getApellido() . "', '" . $cliente->getFechaN() . "');";

        $con = new db();
        $resultado = $con->consulta($query);
        $con->close();

        return $resultado;
    }

    public function eliminarCliente($id)
    {
        $query = "delete from cliente where id = '" . $id . "';";

        $con = new db();
        $resultado = $con->consulta($query);
        $con->close();

        return $resultado;
    }

    public function buscarClienteId($id)
    {
        $query = "select * from cliente where id = '" . $id . "';";

        $con = new db();
        $consulta = $con->consulta($query);
        $con->close();

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

        $con = new db();
        $consulta = $con->consulta($query);
        $con->close();

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
        //$dni, $nombre, $apellido, $fechaN

        $query = "update cliente set nombre = '" . $nombre . "', apellidos = '" . $apellido . "', fechaN = '" . $fechaN . "', dni = '" . $dni . "' where id = '" . $id . "';";

        $con = new db();
        $resultado = $con->consulta($query);
        $con->close();

        return $resultado;
    }
}
