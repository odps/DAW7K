<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>

<body>
    <form action="edit_cuenta_ctl.php" method='post'>
        <h1>Edicion de <?php echo $cuenta->codigo ?></h1>
        <table border='1' cellpadding='2' cellspacing='2'>
            <tr>
                <td>ID</td>
                <td>
                    <input readonly type='text' name='id' size='50' value="<?php echo $cuenta->id ?>" />
                </td>
            </tr>
            <tr>
                <td>Codigo</td>
                <td><input type='text' name='codigo' size='50' value="<?php echo $cuenta->codigo ?>" /></td>
            </tr>
            <tr>
                <td>Saldo</td>
                <td><input type='number' name='saldo' size='50' value="<?php echo $cuenta->saldo ?>" /></td>
            </tr>
            <tr>
                <td>Cliente</td>
                <td>
                    <select name="cliente">
                        <?php foreach ($arrayClientes as $clientes) {
                            if($cuenta->getId() == $_REQUEST['id'] && $cuenta->getCliente() == $clientes->getId()){
                                echo "<option selected value='$clientes->id'>" . $cuenta->getNombreApellidoCliente() . "</option>";
                                continue;
                            }
                            echo "<option value='$clientes->id'>" . $clientes->getNombreApellido() . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
        </table><br />
        <input type='submit' name='submit' value='Editar' />
    </form>
</body>

</html>