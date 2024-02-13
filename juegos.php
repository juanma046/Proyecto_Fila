<?php
    require 'conexion.php';

    $sql = "SELECT * FROM juegos";

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
		
		<title>Proyecto Hombre Gaming / JUEGAZOS</title>
		
		<script>
			$(document).ready( function () {
				$('#tabla').DataTable();
			} );
		</script>
</head>
<body>
    <div class="container">
<?php

echo "<h1>JUEGAZOS</h1>";

echo "<table id='tabla' class='display' style='width:100%'>";
echo "<tr>";
    echo "<th>Nombre</th>";
echo "</tr>";

while($fila = $resultado->fetch_assoc()){
    echo "<tr>";
        //echo "<td><a href='.php?ID_USUARIO=$fila[ID_USUARIO]&NOMBRE=$fila[NOMBRE]'>$fila[NOMBRE]</a></td>";
        echo "<td>$fila[NOMBRE]</td>";
    echo "</tr>";
}
echo "</table>";

    $mysqli->close();
?>
<br>
<a class='btn btn-danger' href='index.php'>Volver</a>
</div>

</body>

</html>


</body>
</html>
