<?php
require_once '../config/config.inc.php';
require_once '../model/business/class_cuenta.php';
require_once '../model/persistence/class_cuentaDAO.php';
require_once '../model/business/class_cliente.php';
require_once '../model/persistence/class_clienteDAO.php';
require_once '../view/linkInicio.php';


$cuentaDAO = new cuentaDAO();
$clienteDAO = new clienteDAO();
$arrayClientes = $clienteDAO->verClientes();


$msg = null;

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $cuenta = $cuentaDAO->buscarId($id);
}


if (isset($_REQUEST['submit'])) {

    $codigo = $_REQUEST['codigo'];
    $saldo = $_REQUEST['saldo'];
    $cliente = $_REQUEST['cliente'];

    try {

        if ($cuenta != null) {
            $resultado = $cuentaDAO->editar($id, $codigo, $saldo, $cliente);

            if ($resultado) {
                $msg = "Datos editados correctamente!!";
            }
        } else {
            $msg = "No se ha podido editar. La cuenta no existe";
        }
    } catch (Exception $e) {
        $msg = "Error al editar los datos .$e";
    }
}

if ($msg != null) {
    echo $msg;
} else {
    require_once '../view/form_edit_cuenta.php';
}

linkInicio();
