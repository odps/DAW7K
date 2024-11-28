<?php
require_once 'class_db.php';

class cuentaDAO extends db
{
    public function inserir($cuenta)
    {
        $query = "INSERT INTO cuenta (codigo, saldo, cliente) VALUES ('" . $cuenta->getCodigo() . "',
            '" . $cuenta->getSaldo() . "', '" . $cuenta->getCliente() . "');";

        $resultado = $this->consulta($query);
        $this->close();

        return $resultado;
    }

    public function eliminar($id)
    {
        $query = "DELETE FROM cuenta WHERE id = '" . $id . "';";

        $resultado = $this->consulta($query);
        $this->close();

        return $resultado;
    }

    public function buscarId($id)
    {
        $query = "SELECT * FROM cuenta WHERE id = '" . $id . "';";

        $consulta = $this->consulta($query);
        $this->close();

        $row = $consulta->fetch_object();

        if (isset($row)) {
            $cuenta = new cuenta($row->codigo, $row->saldo, $row->cliente);
            $cuenta->setId($row->id);

            return $cuenta;
        }
    }

    public function verCuentas()
    {
        $query = "SELECT * FROM cuenta;";

        $consulta = $this->consulta($query);
        $this->close();

        $arrayCuentas = array();
        foreach ($consulta as $row) {
            $cuenta = new cuenta($row["codigo"], $row["saldo"], $row["cliente"]);
            $cuenta->setId($row["id"]);
            array_push($arrayCuentas, $cuenta);
        }

        return $arrayCuentas;
    }

    public function editar(int $id, string $codigo, int $saldo, int $cliente)
    {
        $query = "UPDATE cuenta SET codigo = '" . $codigo . "', saldo = '" . $saldo . "', cliente = '" . $cliente . "' WHERE id = '" . $id . "';";

        $resultado = $this->consulta($query);
        $this->close();

        return $resultado;
    }
}