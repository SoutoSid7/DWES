<?php
session_start();
include("conexion.php");

$sql = "SELECT u.codigo, u.nombre, COUNT(j.acierto) AS numaciertos
        FROM usuarios u
        LEFT JOIN jugadas j ON u.codigo = j.codigousu AND j.acierto = 1
        GROUP BY u.codigo, u.nombre";

$resultado = $conexion->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Estadística</title>
</head>
<body>
    <h1>SIMÓN</h1>
    <h2><?php echo $_SESSION['usuario']; ?>, los resultados son:</h2>

    <table border="1">
        <tr>
            <th>Código usuario</th>
            <th>Nombre</th>
            <th>Número aciertos</th>
            <th>Gráfica</th>
        </tr>

        <?php while($fila = $resultado->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $fila['codigo']; ?></td>
            <td><?php echo $fila['nombre']; ?></td>
            <td><?php echo $fila['numaciertos']; ?></td>
            <td>
                <div style="background-color:blue; height:20px; width:<?php echo $fila['numaciertos'] * 10; ?>px;"></div>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>