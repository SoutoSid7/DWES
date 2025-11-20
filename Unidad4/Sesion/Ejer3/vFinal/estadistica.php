<?php
session_start();

// Datos de conexión
$hn = 'localhost';
$db = 'bdsimon';
$un = 'root';
$pw = '';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die("Error de conexión: " . $conn->connect_error);

// Variables para controlar que mostrar
$mostrarTabla = false;
$filtroCirculos = 4;
$filtroColores = 4;
$data = [];

// Comprobamos si el usuario envio el formulario
if (isset($_POST['filtrar'])){
    $mostrarTabla = true;
    $filtroCirculos = $_POST['numCirculos'];
    $filtroColores = $_POST['numColores'];

    // Consulta para obtener estadísticas por usuario
    $sql = "
        SELECT
            u.Codigo AS codigousu,
            u.Nombre AS nombre,
            SUM(j.acierto = 1) AS aciertos,
            SUM(j.acierto = 0) AS fallos,
            COUNT(j.codjugada) AS total
        FROM usuarios u
        JOIN jugadas j ON u.Codigo = j.codigousu
        WHERE j.numCirculos = $filtroCirculos
            AND j.numColores = $filtroColores
        GROUP BY u.Codigo, u.Nombre
        ORDER BY u.Codigo
    ";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            $data[] = $row;
        }
    }
}
$conn->close();
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Estadísticas</title>
</head>
<body>
    <h1>Simón</h1>
    <h2>Estadísticas de Jugadas</h2>

    <?php if (!$mostrarTabla): ?>
        <form action="estadistica.php" method="post">
            <label>Numero de Circulos:</label>
            <select name="numCirculos">
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
            </select> <br>

            <label>Numero de Colores:</label>
            <select name="numColores">
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
            </select>

            <br><br><input type="submit" name="filtrar" value="Ver Estadísticas">
        </form>

    <?php endif; ?>
        <table border="1"></table>
        <form action="estadistica.php" method="post">
            <br><input type="submit" value="Consultar otra dificultad">
        </form>
</body>
</html>