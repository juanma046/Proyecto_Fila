<!doctype html>
<html lang="es">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		
		<title>Proyecto fila</title>
	</head>
	<body>
		<?php
		  //Establezco conexión 
		  require 'conexion.php';

		  //Obtengo los datos introducidos en el formulario anterior
		  $id = $_GET['ID_USUARIO'];
		  $time = $_GET['TIEMPO'];
		  $id_juego = $_GET['ID_JUEGO'];
		  $id_partida = $_GET['ID_PARTIDA'];

		  $sql= "SELECT * FROM partidas WHERE ID_USUARIO LIKE $id";
		  $resultado2= $mysqli->query($sql);
		 
	  
		  //Se prepara la sentencia SQL
		  $sql = "DELETE FROM partidas WHERE ID_PARTIDA=$id_partida";

		  //Se ejecuta la sentencia y se guarda el resultado en $resulado
		  $resultado = $mysqli->query($sql);

		  $sql= "SELECT * FROM usuarios WHERE ID_USUARIO=$id";
		  $resultadoTiempo = $mysqli->query($sql);

		  while($fila = $resultadoTiempo->fetch_assoc()){
			$sql = "UPDATE usuarios SET TIEMPO_TOTAL=$fila[TIEMPO_TOTAL]-$time WHERE ID_USUARIO = $id";
		  }
		  $resultado2= $mysqli->query($sql);

		  if($resultado > 0){
			header("Location:index.php");
		  }else{
			echo "<div class='alert alert-danger' role='alert'>Ha habido un error al eliminar la partida</div>";
			echo '<a href="index.php"><button type="button" class="btn btn-primary">Regresar</button></a>';
		  }
			
			
		?>

	</body>
</html>