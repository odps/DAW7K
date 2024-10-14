<?php
function crearCookie($nombreCookie, $valorCookie) {
         setcookie($nombreCookie, $valorCookie, time() + 3600, "/");
}
?>