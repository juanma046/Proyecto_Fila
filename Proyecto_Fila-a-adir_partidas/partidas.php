<?php
require 'conexion.php';
$nombre=$_GET['NOMBRE'];
$idget=$_GET['ID_USUARIO'];
$sql = "SELECT * FROM partidas where ID_USUARIO=$idget";
$sql2 = "SELECT * FROM usuarios";
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
        <?php
		echo "<h1>Partidas del usuario $nombre</h1>"
		?>
            </div>
		<br>

		<div class="row">
			<?php 
			echo "<a class='btn btn-primary' href='añadir_partida.php?ID_USUARIO=$idget'>Añadir nueva partida</a>";
			?>
		</div>
		<br>
		<br>

		<table id="tabla" class="display" style="width:100%">
			<thead>
				<tr>
					<th>Numero del juego</th>
					<th>Tiempo (horas)</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php
				while ($fila = $resultado->fetch_assoc()) {
					$sql2= "SELECT NOMBRE FROM JUEGOS WHERE ID_JUEGO=$fila[ID_JUEGO]";
					$resultado2=$mysqli->query($sql2);
					$fila2 = $resultado2->fetch_assoc();
					echo "<tr>";
					echo "<td>$fila2[NOMBRE]</td>";
					echo "<td>$fila[TIEMPO]</td>";
					echo "<td><a class='btn btn-danger' href='eliminar.php?ID_JUEGO=$fila[ID_JUEGO]&ID_USUARIO=$fila[ID_USUARIO]&TIEMPO=$fila[TIEMPO]&ID_PARTIDA=$fila[ID_PARTIDA]'>Eliminar</td>";
					echo "</tr>";
				}
				$mysqli->close();
				?>
			</tbody>
		</table>
		<br>
        <a class='btn btn-danger' href='index.php'>Volver</a>
	</div>
	</div>


</body>

</html>