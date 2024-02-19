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

    //Preparo una sentencia para obtener los datos que quiero de la BD
    $sql = "SELECT * FROM usuarios WHERE id_usuario LIKE $id_usu";
    //La ejecuto y guardo el resultado en $resultado2
    $resultado2 = $mysqli->query($sql);

    //Se prepara la sentencia SQL
    $sql = "INSERT INTO proyecto_actividadjuegos (id_usuario,tiempo,id_juego) VALUES('$id_usu','$time','$id_juego')";

    //Se ejecuta la sentencia y se guarda el resultado en $resulado
    $resultado = $mysqli->query($sql);

    while ($fila = $resultado2->fetch_assoc()) {
        $sql = "UPDATE usuarios SET n_partidas=$fila[n_partidas]+1, tiempo_total=$fila[tiempo_total]+$time WHERE id_usuario = $id_usu";
    }
    $resultado2 = $mysqli->query($sql);

    //Si se se han guardado los registros se vuelve al index
    if ($resultado > 0) {
        $mysqli->close();
        header("Location:index.php");

        // Si no se ha guardado los registros mostramos un mensaje de error
    } else {
        $mysqli->close();
        echo "<div class='alert alert-danger' role='alert'>Ha habido un error al añadir la partida</div>";
        echo "<a href='añadir_partida.php'>Regresar</a>";
    }

    ?>

</body>

</html>