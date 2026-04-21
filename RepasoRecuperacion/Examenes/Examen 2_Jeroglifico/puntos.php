<?php
    session_start(); 

    // Datos Conexion
    $hn = 'localhost';
    $db = 'jeroglifico';
    $un = 'root';
    $pw = '';

    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die("Error de conexión: " . $conn->connect_error);

    $sql = "
            SELECT login, puntos
            FROM jugador
            ORDER BY puntos DESC;
        ";
    $stmt = $conn->prepare($sql); 
    $stmt->execute();
    $resultado = $stmt->get_result();

    $data = [];
    if($resultado && $resultado-> num_rows> 0){ // Comprueba que es valido y que tiene al menos un resultado
        while($row = $resultado->fetch_assoc() ){ // Devuelve la fila actual como un array asociativo
            $data[] = $row; // Guarda el valor de row en el array data
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Puntos</title>
</head>
<body>
    <h1>Puntos Por Jugador</h1>
    <table border="1">
        <tr>
            <th>Login</th>
            <th>Puntos</th>
        </tr>
        <?php foreach ($data as $row): ?>
        <tr>
            <td><?= $row['login'] ?></td>
            <td><?= $row['puntos'] ?></td>
            <td>
                <?php 
                    $max = 200;
                    $porcentaje = ($row['puntos'] / $max) * 100;
                ?>
                <div style="width:300px; border:1px solid #555;">
                    <div style="
                        width: <?php echo $porcentaje; ?>%;
                        height: 30px;
                        background: #72c5eb;">
                    </div>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>