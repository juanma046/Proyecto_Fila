<?php
	require 'conexion.php';
    $idget=$_GET['ID_USUARIO'];
    $sql= "SELECT * FROM usuarios";
	$sql2= "SELECT NOMBRE FROM usuarios WHERE $idget=ID_USUARIO";

    $resultado= $mysqli->query($sql);
	$nombre= $mysqli->query($sql2);
?>

<!doctype html>
<html lang="es">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		
		<title>Proyecto Actividad Juegos</title>
	</head>
	<body>

		<div class="container">
			<div class="row">
				<?php 
				while($fila = $nombre->fetch_assoc()){
				echo "<h1>Partidas de $fila[NOMBRE]</h1>";
				}
				?>
			</div>
			
			<div class="row">
				<div class="col-md-8">
					<!-- Completar atributos de form -->
					<form action="añadir_partida2.php" id="registro" name="registro" autocomplete="off" method="post">
                    <div class="form-group">
						<div class="form-group">
							<!-- Tiempo jugado  -->
							<label for="formControlInput" class="form-label">Tiempo jugado(h)</label>
							<input type="number" class="form-control" id="formControlInput" name="TIEMPO">
						</div>
						
						<div class="form-group">
							<!-- Juegos -->
							<label for="formControlInput" class="form-label">Juegos</label>
							<select class="form-control" id="formControlInput" name="ID_JUEGO">
								<option value="1">Bloodborne</option>
								<option value="2">Fortnite</option>
                                <option value="3">Persona 3 Reload</option>
								<option value="4">F1 2024</option>
							</select>
						</div>
						
						<div class="form-group">
							<!-- Registrar -->
							<button type="submit" class="btn btn-primary">Registrar</button>
						</div>
						<?php 
						echo "<input type='hidden' value='$idget' name='ID_USUARIO'>";
						?>
					</form>
				</div>
			</div>
		</div>
		
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="js/jquery-3.4.1.min.js" ></script>
		<script src="js/bootstrap.min.js" ></script>
	</body>
</html>
