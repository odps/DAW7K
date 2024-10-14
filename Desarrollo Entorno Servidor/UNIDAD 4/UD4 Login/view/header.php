<?php
session_start();
?>
<html>

<head>
    <title>LoginCookie</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php
    if (isset($_SESSION["sesion"])) {
        echo "<h1>usuario: " . (isset($_SESSION["sesion"]) ? $_SESSION["sesion"] : "") . "</h1>";
        echo "<a href='../controller/logout_ctl.php'>Logout</a>";
    }
    ?>