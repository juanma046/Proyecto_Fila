<?php
    require 'conexion.php';

    $sql = "SELECT * FROM usuarios";

    $resultado = $mysqli->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

echo "<h1>Jugadores</h1>";

echo "<table border='1'>";
echo "<tr>";
    echo "<th>Nombre</th>";
    echo "<th>DNI</th>";
echo "</tr>";

while($fila = $resultado->fetch_assoc()){
    echo "<tr>";
        echo "<td><a href='partidas.php?ID_USUARIO=$fila[ID_USUARIO]'>$fila[NOMBRE]</a></td>";
        echo "<td>$fila[DNI]</td>";
    echo "</tr>";
}
echo "</table>";

    $mysqli->close();
?>
    <p><a href="registrar1.php">Registrar partida</a>

</body>

</html>


</body>
</html>
