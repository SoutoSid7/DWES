<?php
session_start(); // Siempre al principio

// 1. Comprobar si el usuario está autentificado
// Si no ha iniciado sesión, lo echamos a login.php
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

// 2. Conexión a la Base de Datos
$hn = 'localhost';
$db = 'bdsimon';
$un = 'root';
$pw = '';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die("Fatal Error de Conexión");

// 3. La consulta SQL para el ranking
$sql = "SELECT
            u.Nombre AS Usuario,
            COUNT(j.codjugada) AS TotalJugadas,
            SUM(j.acierto) AS TotalAciertos,
            ROUND((SUM(j.acierto) * 100.0) / COUNT(j.codjugada), 2) AS PorcentajeAcierto
        FROM 
            jugadas j
        INNER JOIN 
            usuarios u ON j.codigousu = u.Codigo
        GROUP BY 
            u.Nombre
        ORDER BY 
            PorcentajeAcierto DESC";

$result = $conn->query($sql); // Ejecuta la consulta

?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Estadísticas</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 80%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .nav-links { margin-top: 20px; }
        .nav-links a { margin-right: 15px; }
    </style>
</head>
<body>

    <h1>📈 Ranking y Estadísticas</h1>

    <?php
    // 4. Mostrar la tabla HTML con los resultados
    if ($result && $result->num_rows > 0) {
        echo "<table>";
        echo "<thead>
                <tr>
                    <th>Usuario</th>
                    <th>Total Jugadas</th>
                    <th>Total Aciertos</th>
                    <th>Porcentaje Acierto (%)</th>
                </tr>
              </thead>";
        echo "<tbody>";

        // Iteramos sobre cada fila (cada usuario)
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['Usuario']) . "</td>";
            echo "<td>" . $row['TotalJugadas'] . "</td>";
            echo "<td>" . $row['TotalAciertos'] . "</td>";
            echo "<td>" . $row['PorcentajeAcierto'] . "%</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p>Todavía no hay jugadas registradas para mostrar.</p>";
    }

    // 5. Cerrar la conexión
    $conn->close();
    ?>

    <div class="nav-links">
        <a href="inicio.php">Volver al inicio</a>
        <a href="login.php">Cambiar usuario</a>
    </div>

</body>
</html>     