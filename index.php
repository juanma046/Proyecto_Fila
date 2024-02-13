<?php
    require 'conexion.php';

    $sql = "SELECT * FROM usuarios";

    $resultado = $mysqli->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" src="estilos.css" type="text/css">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/jquery.dataTables.min.css">
		
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="js/jquery-3.4.1.min.js" ></script>
		<script src="js/bootstrap.min.js" ></script>
		<script src="js/jquery.dataTables.min.js" ></script>
		
		<title>Proyecto Hombre Gaming</title>
		
		<script>
			$(document).ready( function () {
				$('#tabla').DataTable();
			} );
		</script>
</head>
<body>
    <div class="container">
<?php

echo "<h1>Jugadores</h1>";

echo "<table id='tabla' class='display' style='width:100%'>";
echo "<tr>";
    echo "<th>Nombre</th>";
    echo "<th>DNI</th>";
echo "</tr>";

while($fila = $resultado->fetch_assoc()){
    echo "<tr>";
        echo "<td><a href='partidas.php?ID_USUARIO=$fila[ID_USUARIO]&NOMBRE=$fila[NOMBRE]'>$fila[NOMBRE]</a></td>";
        echo "<td>$fila[DNI]</td>";
    echo "</tr>";
}
echo "</table>";

    $mysqli->close();
?>

</div>
</body>

</html>


</body>
</html>
