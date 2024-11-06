<!--IMPORTANTE
No ejecutes este fichero directamente. Se carga desde EjemploSubidaSencillo.php con un include
-->

<?php foreach ($errores as $error) {
	echo $error . "<br>";
}
?>
<html>
<h1>Subida de ficheros</h1>
<form method="post" action="" enctype="multipart/form-data">
	<label for="nombre">Nombre: </label>
	<input required type="text" name="nombre" id="nombre"> <br>
	<label for="edad">Edad: </label>
	<input required type="number" name="edad" id="edad" min="0" max="99"><br>
	<label for="imagen">Imagen: </label>
	<input required type="file" name="imagen" id="imagen" /><br>
	<input type="submit" name="bAceptar" value="Aceptar" />
</form>

<form action="lista.php" method="post">
	<br><input type="submit" value="Ver lista">
</form>

</html>