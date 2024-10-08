    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>form_distritos</title>
    </head>

    <body>
        <form action="distritos_ctl.php" method="get">
            <?php
            include "datos_distritos.php";
            $nombre = $_GET["nombre"];
            $apellido = $_GET["apellido"];

            echo "<h1>Bienvenido " . $nombre . " " . $apellido . " 👋😄</h1>";

            echo '<select name="distrito" id="distrito">';

            foreach ($datos_distritos as $distrito => $poblacion) {
                if ($distrito == "Patraix") {
                    echo "<option selected value='" . $distrito . "'>" . $distrito . "</option>";
                } else
                    echo "<option value='" . $distrito . "'>" . $distrito . "</option>";
            }


            echo '</select>'
            ?>
            <br><br>
            <label for="todos">Mostrar todos los distritos</label>
            <input type="checkbox" name="todos" id="todos">
            <input type="hidden" name="nombre" value="<?php echo $nombre ?>">
            <input type="hidden" name="apellido" value="<?php echo $apellido ?>">
            <br><br>
            <input type="submit" value="Consultar">
        </form>
        <br><br>
        <a href="index.html">Volver</a>


    </body>

    </html>