<?php
session_start();
// Incluimos el header
include 'header.php';
?>
<?php
echo "<h1>Bienvenido " . (isset($_SESSION["sesion"]) ? $_SESSION["sesion"] : "") . "</h1>";
?>
<h2>Has hecho login correcto</h2>
<a href="../index.php">Volver</a>

<?php
// Incluimos el footer
include 'footer.php';
?>