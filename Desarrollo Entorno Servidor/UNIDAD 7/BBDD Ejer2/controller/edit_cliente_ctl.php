<?php
require_once '../config/config.inc.php';
require_once '../model/business/class_cliente.php';
require_once '../model/persistence/class_clienteDAO.php';
require_once '../view/linkInicio.php';


$clienteDAO = new clienteDAO();
$msg = null;

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $cliente = $clienteDAO->buscarClienteId($id);
}


if (isset($_REQUEST['submit'])) {

    $dni = $_REQUEST['dni'];
    $nombre = $_REQUEST['nombre'];
    $apellido = $_REQUEST['apellido'];
    $fechaN = $_REQUEST['fechaN'];

    try {

        if ($cliente != null) {
            $resultado = $clienteDAO->editarCliente($id, $dni, $nombre, $apellido, $fechaN);

            if ($resultado) {
                $msg = "Datos editados correctamente!!";
            }
        } else {
            $msg = "No se ha podido editar. La cliente no existe";
        }
    } catch (Exception $e) {
        $msg = "Error al editar los datos .$e";
    }
}

if ($msg != null) {
    echo $msg;
} else {
    require_once '../view/form_edit_cliente.php';
}

linkInicio();
