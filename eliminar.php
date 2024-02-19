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

		  $sql= "SELECT * FROM partidas WHERE ID_USUARIO LIKE $id";
		  $resultado2= $mysqli->query($sql);
		 
	  
		  //Se prepara la sentencia SQL
		  $sql = "DELETE FROM partidas WHERE ID_USUARIO=$id and ID_JUEGO=$id_juego";

		  //Se ejecuta la sentencia y se guarda el resultado en $resulado
		  $resultado = $mysqli->query($sql);

		  while($fila = $resultado->fetch_assoc()){
			$sql="UPDATE usuarios SET TIEMPO_TOTAL=$fila[TIEMPO_TOTAL]-$time WHERE ID_USUARIO = $id";
		  }
		  $resultado2= $mysqli->query($sql);

		  if($resultado > 0){
			echo "<div class='alert alert-primary' role='alert'>La partida ha sido eliminada correctamente</div>";
			  
		  }else{
			echo "<div class='alert alert-danger' role='alert'>Ha habido un error al eliminar la partida</div>";
		  }
	  
		  echo '<a href="index.php"><button type="button" class="btn btn-primary">Regresar</button></a>';
			
			
		?>

	</body>
</html>