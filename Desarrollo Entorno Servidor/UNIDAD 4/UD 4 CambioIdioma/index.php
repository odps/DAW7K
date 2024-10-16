<?php
include "./views/header.php";
include "./views/footer.php";

fnHeader();
?>
<?php

$idioma = [
    'va' => 'Selecció d\'idioma amb cookies',
    'es' => 'Selección de idioma con cookies',
    'en' => 'Language selection with cookies'
];

$title = isset($_COOKIE['lang']) ? $idioma[$_COOKIE['lang']] : 'Selecció d\'idioma amb cookies';

?>
<h1>
    <?php echo $title; ?>
</h1>
<form action="./controller/index_ctl.php" method="post">
    <select name="lang" id="">
        <option value="va" <?php echo (isset($_COOKIE['lang']) && $_COOKIE['lang'] == 'va') ? 'selected' : ''; ?>>Valencià</option>
        <option value="es" <?php echo (isset($_COOKIE['lang']) && $_COOKIE['lang'] == 'es') ? 'selected' : ''; ?>>Castellano</option>
        <option value="en" <?php echo (isset($_COOKIE['lang']) && $_COOKIE['lang'] == 'en') ? 'selected' : ''; ?>>English</option>
    </select>
    <input type="submit" value="<?php
                                echo isset($_COOKIE['lang']) ? ($_COOKIE['lang'] == 'en' ? 'Send' : 'Enviar') : 'Enviar';
                                ?>">
</form>
<?php
fnFooter();
