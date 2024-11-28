<?php
require_once 'class_db.php';

class cuentaDAO
{

	public function inserir($cuenta)
	{

		$query = "insert into cuenta (codigo, saldo, cliente) values ('" . $cuenta->getCodigo() . "',
			'" . $cuenta->getSaldo() . "', '" . $cuenta->getCliente() . "');";

		$con = new db();
		$resultado = $con->consulta($query);
		$con->close();

		return $resultado;
	}

	public function eliminar($id)
	{

		$query = "delete from cuenta where id = '" . $id . "';";

		$con = new db();
		$resultado = $con->consulta($query);
		$con->close();

		return $resultado;
	}

	public function buscarId($id)
	{

		$query = "select * from cuenta where id = '" . $id . "';";

		$con = new db();
		$consulta = $con->consulta($query);
		$con->close();

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

		$con = new db();
		$consulta = $con->consulta($query);
		$con->close();

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

		$query = "update cuenta set codigo = '" . $codigo . "', saldo = '" . $saldo . "', cliente = '" . $cliente . "' where id = '" . $id . "';";


		$con = new db();
		$resultado = $con->consulta($query);
		$con->close();

		return $resultado;
	}
}
