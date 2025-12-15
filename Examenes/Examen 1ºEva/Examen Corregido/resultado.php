<?php
    session_start();

    // Datos de conexión
    $hn = 'localhost';
    $db = 'cartas';
    $un = 'root';
    $pw = '';

    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die("Error de conexión: " . $conn->connect_error);

    $sql = "
            SELECT nombre, puntos, extra
            FROM jugador;
            ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $resultado = $stmt->get_result();

    $data = [];
    if($resultado && $resultado-> num_rows > 0){
        while($row = $resultado->fetch_assoc()){
            $data[] = $row;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
</head>
<body>
    <h1>Bienvenido <?php echo $_SESSION["login"]; ?></h1>
    <h2>Puntos por jugador</h2>
    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Puntos</th>
            <th>Extra</th>
        </tr>
        <?php foreach ($data as $row): ?>
        <tr>
            <td><?= $row['nombre'] ?></td>
            <td><?= $row['puntos'] ?></td>
            <td><?= $row['extra'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>