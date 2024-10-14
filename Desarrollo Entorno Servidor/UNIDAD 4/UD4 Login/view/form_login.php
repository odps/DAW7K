<?php
// Incluimos el header
include 'header.php';
?>

<h3>Login con Cookies</h3>

<form action="../controller/login_ctl.php" method="post">
    <?php
    $userValue = '';
    if (isset($_COOKIE['user'])) {
        $userValue = $_COOKIE['user'];
    }
    //echo $_COOKIE['user'];
    echo 'Usuario: <input type="text" name="user" placeholder="nombre de usuario" value="' . $userValue . '" /><br />';
    ?>
    Password <input type="password" name="password" placeholder="contraseña" /><br />
    <?php
    echo 'Recordar Usuario: <input type="checkbox"' . (isset($_COOKIE['user']) ? "checked" : "") . ' name="rec_user"><br />';
    ?>
    <input type="submit" value="Enviar" />
</form>

<?php
// Incluimos el footer
include 'footer.php';
?>