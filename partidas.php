<?php
require 'conexion.php';
$sql = "SELECT * FROM partidas";
$resultado = $mysqli->query($sql);
?>

<!doctype html>
<html lang="es">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/jquery.dataTables.min.css">

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>

	<title>Club Deportivo La Venta</title>

	<script>
		$(document).ready( function () {
			$('#tabla').DataTable();
		} );
	</script>


</head>

<body>
	<div class="container">
		<div class="row">
			<h1>Partidas</h1>
		</div>
		<br>

		<div class="row">
		<a class='btn btn-primary' href='registrar.php'>Registrar</a>
		</div>
		<br>
		<br>

		<table id="tabla" class="display" style="width:100%">
			<thead>
				<tr>
					<th>Numero de Partida</th>
					<th>Numero del usuario</th>
					<th>Numero del juego</th>
					<th>Tiempo (horas)</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php
				while ($fila = $resultado->fetch_assoc()) {
					echo "<tr>";
					echo "<td>$fila[ID_PARTIDA]</td>";
					echo "<td>$fila[ID_USUARIO]</td>";
					echo "<td>$fila[ID_JUEGO]</td>";
					echo "<td>$fila[TIEMPO]</td>";
					echo "<td><a class='btn btn-danger' href='eliminar.php?id=$fila[ID_PARTIDA]'>Eliminar</td>";
					echo "</tr>";
				}
				$mysqli->close();
				?>
			</tbody>
		</table>

	</div>
	</div>


</body>

</html>