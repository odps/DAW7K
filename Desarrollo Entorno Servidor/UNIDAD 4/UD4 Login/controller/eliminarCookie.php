<?php
function eliminarCookie($nombreCookie) {
	if (isset($_COOKIE[$nombreCookie])) {
         setcookie($nombreCookie, "", time() - 3600, "/");
	}
}
?>