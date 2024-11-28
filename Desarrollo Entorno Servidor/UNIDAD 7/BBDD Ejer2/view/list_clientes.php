		<table border="1">
		    <tr>
		        <th>Clientes: </h3>
		        </th>
		    </tr>
		    <?php
            foreach ($arrayClientes as $cliente) {

            ?>
		        <tr>
		            <td><b>Cliente num: </td>
		            <td><?php echo $cliente->getId(); ?></td>
		            <td>
		                <a href="../controller/delete_cliente_ctl.php?id=<?php echo $cliente->getId() ?>">Eliminar</a>
		                <br>
		                <a href="../controller/edit_cliente_ctl.php?id=<?php echo $cliente->getId() ?>">Editar</a>
		            </td>

		        </tr>
		        <tr>
		            <td>DNI: </td>
		            <td><?php echo $cliente->getDni(); ?></td>
		        </tr>
		        <tr>
		            <td>Nombre: </td>
		            <td><?php echo $cliente->getNombre() . " " . $cliente->getApellido(); ?></td>
		        </tr>
		        <tr>
		            <td>Fecha Nacimiento: </td>
		            <td> <?php echo $cliente->getFechaN()->format('d-m-Y'); ?></td>
		        </tr>
		    <?php
            }
            ?>
		</table>