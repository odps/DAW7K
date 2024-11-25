<?php
require_once '../config/config.inc.php';
require_once '../model/business/class_cliente.php';
require_once '../model/persistence/class_clienteDAO.php';
require_once '../view/printMsg.php';
require_once '../view/linkInicio.php';

$clienteDAO = new clienteDAO();

// comprobamos si la cliente existe antes de eliminarlo
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $cliente = $clienteDAO->buscarClienteId($id);
}

$msg = null;
try {

    if ($cliente != null) {
        $resultado = $clienteDAO->eliminarCliente($id);

        // el método eliminar retorna false en caso de error
        if ($resultado) {
            $msg = "Datos eliminados correctamente!!";
        }
    } else {
        $msg = "No se ha podido eliminar. El cliente no existe";
    }
} catch (Exception $e) {
    $msg = "Error al eliminar los datos .$e";
}

if ($msg != null) {
    printMsg($msg);
}

linkInicio();
