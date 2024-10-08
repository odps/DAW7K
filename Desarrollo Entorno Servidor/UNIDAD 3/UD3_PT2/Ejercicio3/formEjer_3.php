<p>
	<?php

	foreach ($errores as $error) {
		echo "<br>Error: " . $error . "<br>";
	}
	?>
</p>
<form ACTION="" METHOD="POST">
	<p>Nombre: <input TYPE="text" name="nombre"></p>
	<p>
		<?php
		pintaRadio($provincias, "provincias");
		?>
	</p>
	<p>
		<?php

		pintaCheck($aficiones, "aficiones");
		?>
	</p>
	<input type="checkbox" name="premium"> Quiero ser premium.<br><br>
	<input TYPE="submit" name="Clear" VALUE="Limpiar">
	<input TYPE="submit" name="bAceptar" VALUE="Enviar">
</form>