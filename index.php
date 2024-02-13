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

echo "<h1>Torneo IAW</h1>";

echo "<table border='1'>";
echo "<tr>";
    echo "<th>Nombre</th>";
    echo "<th>Partidas</th>";
    echo "<th>Puntos</th>";
echo "</tr>";

while($fila = $resultado->fetch_assoc()){
    echo "<tr>";
        echo "<td><a href='partidas.php?id_participante=$fila[id_participante]'>$fila[nombre]</a></td>";
        echo "<td>$fila[partidas]</td>";
        echo "<td>$fila[puntos]</td>";
    echo "</tr>";
}
echo "</table>";

    $mysqli->close();
?>
    <p><a href="registrar1.php">Registrar partida</a> <a href="resetear.php">Resetear torneo</a></p>

</body>

</html>


</body>
</html>
