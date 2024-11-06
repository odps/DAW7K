<?php
/*
* En este ejemplo vemos como llegan los datos al servidor y como los procesamos
* Partiendo de este código más adelante generaremos una función que recogerá y validará
* el fichero adjunto.
* Para facilitarlo tenemos un formulario que sólo tiene un campo fichero
*/
include('./libs/bGeneral.php');
// Cargamos cabecera html
cabecera('ejemplo.php');
$errores = [];

/**
 * Carpeta para ubicación definitiva. Ruta relativa al fichero actual.
 * Tiene que estar creada esta carpeta, sino da error
 * */

$dir = "./imagenes";
/**
 * Tamaño máximo aceptado, si queremos que sea inferior al configurado en php.ini
 **/
$max_file_size = "51200000";
/**
 * Creamos una lista de extensiones permitidas, por seguridad es lo más válido.
 */
$extensionesValidas = array(
    "jpg",
    "png",
    "gif"
);
/**
 * Si no hemos pulsado el botón aceptar => cargamos el formulario
 **/

if (!isset($_REQUEST['bAceptar'])) {

    include("formEjemploSubida.php");
} else {
    /*
     * Comprobamos si existe $_FILES["imagen"] y ha habido un error al subirlo. Si ha habido algún error al subir no será necesario
     * comprobar nada más.
     */
    if (!isset($_FILES['imagen'])) {
        $errores["imagen"] = "Error en la imagen";
    } else {

        if (($_FILES['imagen']['error'] != 0)) {
            switch ($_FILES['imagen']['error']) {
                case 1:
                    $errores["imagen"] = "UPLOAD_ERR_INI_SIZE. Fichero demasiado grande";
                    break;
                case 2:
                    $errores["imagen"] = "UPLOAD_ERR_FORM_SIZE. El fichero es demasiado grande";
                    break;
                case 3:
                    $errores["imagen"] = "UPLOAD_ERR_PARTIAL. El fichero no se ha podido subir entero";
                    break;
                case 4:
                    $errores["imagen"] = "UPLOAD_ERR_NO_FILE. No se ha podido subir el fichero";
                    break;
                case 6:
                    $errores["imagen"] = "UPLOAD_ERR_NO_TMP_DIR. Falta carpeta temporal<br>";
                case 7:
                    $errores["imagen"] = "UPLOAD_ERR_CANT_WRITE. No se ha podido escribir en el disco<br>";

                default:
                    $errores["imagen"] = 'Error indeterminado.';
            }
        } else {
            /**
             * Guardamos el nombre original del fichero
             **/
            $nombreArchivo = $_FILES['imagen']['name'];
            /*
             * Guardamos nombre del fichero en el servidor
            */
            $directorioTemp = $_FILES['imagen']['tmp_name'];
            /*
             * Calculamos el tamaño del fichero
            */
            $tamanyoFile = filesize($directorioTemp);
            /*
            * Extraemos la extensión del fichero, desde el último punto. Si hubiese doble extensión, no lo
            * tendría en cuenta.
            */
            $extension = strtolower(pathinfo($nombreArchivo, PATHINFO_EXTENSION));

            /*
            * Comprobamos la extensión del archivo dentro de la lista que hemos definido al principio
            */
            if (!in_array($extension, $extensionesValidas)) {
                $errores["imagen"] = "La extensión del archivo no es válida";
            }
            /*
            * Comprobamos el tamaño del archivo
            */
            if ($tamanyoFile > $max_file_size) {
                $errores["imagen"] = "La imagen debe de tener un tamaño inferior a 50 kb";
            }

            /*
            * Si no ha habido errores, almacenamos el archivo en ubicación definitiva si no hay errores
            */
            if (empty($errores)) {
                /**
                 * Tenemos que buscar un nombre único para guardar el fichero de manera definitiva
                 * Añadimos microtime() al nombre del fichero si ya existe un archivo guardado con ese nombre.
                 * */
                $nombreArchivo = is_file($dir . DIRECTORY_SEPARATOR . $nombreArchivo) ? time() . $nombreArchivo : $nombreArchivo;
                $nombreCompleto = $dir . DIRECTORY_SEPARATOR . $nombreArchivo;
                /**
                 * Movemos el fichero a la ubicación definitiva.
                 * */
                if (!move_uploaded_file($directorioTemp, $nombreCompleto)) {
                    $errores["imagen"] = "Ha habido un error al subir el fichero";
                } else {
                    header("Location: ./controller.php?imagen=$nombreArchivo&nombre=$_REQUEST[nombre]&edad=$_REQUEST[edad]");
                }
            }
        }
    }
    /**
     * Si hay errores volvemos a mostrar el formulario con los errores
     */
}
if (!empty($errores)) {
    include("formEjemploSubida.php");
}










?>
</body>

</html>