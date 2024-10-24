<p>
	<?php
	foreach ($errores as $error) {
		echo "<br>Error: " . $error . "<br>";
	}
	?>
</p>

<form ACTION="controller2.php" METHOD="POST">
	<p>Nombre: <input TYPE="text" name="nombre"></p>
	<p>
		<input type="radio" name="dado" value="1"> 1 Dado<br>
		<input type="radio" name="dado" value="2"> 2 Dados<br>
		<input type="radio" name="dado" value="3"> 3 Dados<br><br>
	</p>
	<input type="checkbox" name="imagenes"> Quiero mostrar imágenes<br><br>
	<input TYPE="submit" name="bAceptar" VALUE="Jugar">
	<input TYPE="submit" name="results" VALUE="Mostrar Resultados">
	<input TYPE="submit" name="reset" VALUE="Resetear">
</form>