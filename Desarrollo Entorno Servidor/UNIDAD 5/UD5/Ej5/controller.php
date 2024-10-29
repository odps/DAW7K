<?php
include "Comentario.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $frase = htmlspecialchars($_POST["comentario"]);
    $nombre = htmlspecialchars($_POST["nombre"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $comentario = new Comentario($frase, $nombre, $email);
    echo "Comentario enviado <br>";
    echo "<br> " . $comentario->comentario . "<br>" . $comentario->nombre . "<br>" . $comentario->email . "<br>" . $comentario->fecha . "<br>";

    if ($file = fopen("./comentarios.txt", "a+")) {
        fwrite($file, serialize($comentario) . PHP_EOL);
        fclose($file);
        echo "Comentario guardado correctamente";
    } else {
        echo "Error al abrir el archivo";
    }
}
?>
<br>
<a href="index.php">Volver</a>