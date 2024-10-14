<?php
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Practica 1 - UD3</title>
</head>

<body>
  <h1>DATOS DEMOGRAFICOS</h1>
  <form action="./controller/validar_ctl.php" method="post">
    <input
      type="text"
      name="dni"
      placeholder="Introduce tu DNI"
      required /><br />
    <input type="text" name="nombre" placeholder="Nombre" /><br />
    <input type="text" name="apellido" placeholder="Apellido" /><br />
    <button type="submit">Enviar</button>
  </form>
</body>
<?php

if (!empty($_COOKIE))
  echo "<a href='./controller/borrarCookies.php'>Borrar cookies</a>";
?>

</html>