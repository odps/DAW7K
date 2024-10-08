    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>form_barrios</title>
    </head>

    <body>
        <form action="barrios_ctl.php" method="get">

            <?php
            include "datos_barrios.php";
            $nombre = $_GET["nombre"];
            $apellido = $_GET["apellido"];

            echo "<h1>Bienvenido " . $nombre . " " . $apellido . " 👋😄</h1>";

            echo '<select name="barrio" id="barrio">';

            echo "<option value='todos' selected> Mostrar todos</option>";

            foreach ($datos_patraix as $key => $value) {
                $nombre_barrio = $value[0];
                echo "<option value='" . $key . "'>" . $nombre_barrio . "</option>";
            }

            echo '</select>'
            ?>

            <input type="hidden" name="nombre" value="<?php echo $nombre ?>">
            <input type="hidden" name="apellido" value="<?php echo $apellido ?>">
            <br><br>
            <input type="submit" value="Consultar">
        </form>
        <br><br>
        <a href="index.html">Volver</a>


    </body>

    </html>