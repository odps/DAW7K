<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
</head>

<body>
<form action="../controller/create_clientes_ctl.php" method='post'>
    <table border='1' cellpadding='2' cellspacing='2'>
        <tr>
            <td>Cliente DNI</td>
            <td><input type='text' name='dni' size='50'/></td>
        </tr>
        <tr>
            <td>Nombre</td>
            <td><input type='text' name='nombre' size='50'/></td>
        </tr>
        <tr>
            <td>Apellido</td>
            <td><input type='text' name='apellido' size='50'/></td>
        </tr>
        <tr>
            <td>Fecha de Nacimiento</td>
            <td><input type='date' name='fechaN' size='50' value="<?php echo (new DateTime())->format('Y-m-d'); ?>"/>
            </td>
        </tr>
    </table>
    <br/>
    <input type='submit' name='submit' value='Envia'/>
</form>
</body>

</html>