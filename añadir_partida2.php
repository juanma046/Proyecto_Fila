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
			 require 'conexion.php';

			 //Obtengo los datos introducidos en el formulario anterior
			 $id_usu = $_POST['id_usuario'];
			 $time = $_POST['tiempo'];
			 $id_juego = $_POST['id_juego'];

			 //Se prepara la sentencia SQL
			 $sql = "INSERT INTO proyecto_actividadjuegos (id_usuario,tiempo,id_juego) VALUES('$id_usu','$time','$id_juego')";
		 
			 //Se ejecuta la sentencia y se guarda el resultado en $resulado
			 $resultado = $mysqli->query($sql);
		 
			 if($resultado > 0){
	
				 echo "<div class='alert alert-primary' role='alert'>La partida ha sido añadida correctamente </div>";
				 
			 }else{
				 echo "<div class='alert alert-danger' role='alert'>Ha habido un error al añadir la partida</div>";
			 }
		 
			 echo '<a href="index.php"><button type="button" class="btn btn-primary">Regresar</button></a>';
			
		?>

	</body>
</html>