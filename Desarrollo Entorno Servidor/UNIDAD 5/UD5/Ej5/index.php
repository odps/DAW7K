<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $_SERVER["PHP_SELF"] ?></title>
    <style>
        body {
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Libro de Visitas</h1><br>
    <form action="./controller.php" method="post">
        <label for="comentario">Tu Comentario: </label><br>
        <textarea required name="comentario" id="comentario" rows="5" cols="50"></textarea><br><br>
        <label for="nombre">Tu nombre: </label><br>
        <input required type="text" name="nombre" id="nombre"><br><br>
        <label for="email">Tu e-mail: </label><br>
        <input required type="email" name="email" id="email"><br><br>
        <input type="submit" value="Enviar">
    </form>
    <h2>Comentarios</h2><br>
    <?php
    include "Comentario.php";
    echo "Comentarios <br>";
    if ($file = fopen("./comentarios.txt", "r")) {
        while ($line = fgets($file)) {
            $comentario = unserialize($line);
            if ($comentario)
                echo "<br> $comentario->nombre ($comentario->email) escrito el $comentario->fecha <br>&nbsp$comentario->comentario <br>";
        }
        fclose($file);
    } else {
        echo "Error al abrir el archivo";
    }
    ?>
</body>

</html>