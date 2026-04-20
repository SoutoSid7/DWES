<?php
    session_start();

    // Datos Conexion
    $hn = 'localhost';
    $db = 'jeroglifico';
    $un = 'root';
    $pw = '';

    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die("Error de conexión: " . $conn->connect_error);

    // Mostrar Jugadores Acertados Hoy
    $sql = "
            SELECT login, hora
            FROM respuestas 
            WHERE fecha = CURDATE();
        ";
    $stmt = $conn->prepare($sql); 
    $stmt->execute();
    $resultado = $stmt->get_result();

    $data = [];
    $aciertos = 0;
    if($resultado && $resultado-> num_rows > 0){
        while($row = $resultado->fetch_assoc()){
            $data[] = $row;
            $aciertos ++;
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
    <h1>Fecha <?php echo date("d-m-Y"); ?></h1>

    <h2>Jugadores Acertantes: <?php echo $aciertos; ?></h2>
    <table border="1">
        <tr>
            <th>Login</th>
            <th>Hora</th>
        </tr>
        <?php foreach ($data as $row): ?>
        <tr>
            <td><?= $row['login'] ?></td>
            <td><?= $row['hora'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>