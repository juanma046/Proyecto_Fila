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
    $id_usu = $_POST['ID_USUARIO'];
    $time = $_POST['TIEMPO'];
    $id_juego = $_POST['ID_JUEGO'];

    //Preparo una sentencia para obtener los datos que quiero de la BD
    $sql = "SELECT * FROM usuarios WHERE ID_USUARIO LIKE $id_usu";
    //La ejecuto y guardo el resultado en $resultado2
    $resultado2 = $mysqli->query($sql);

    //Se prepara la sentencia SQL
    $sql = "INSERT INTO proyecto_actividadjuegos (ID_USUARIO,TIEMPO,ID_JUEGO) VALUES('$id_usu','$time','$id_juego')";

    //Se ejecuta la sentencia y se guarda el resultado en $resulado
    $resultado = $mysqli->query($sql);

    while ($fila = $resultado2->fetch_assoc()) {
        $sql = "UPDATE usuarios SET tiempo_total=$fila[tiempo_total]+$time WHERE ID_USUARIO = $id_usu";
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