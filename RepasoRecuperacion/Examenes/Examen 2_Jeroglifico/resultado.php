<?php
    session_start();

    // Datos Conexion
    $hn = 'localhost';
    $db = 'jeroglifico';
    $un = 'root';
    $pw = '';

    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die("Error de conexión: " . $conn->connect_error);

    // Comprobar Si Respuesta Es = A Respuesta BBDD
    $sql = "
            SELECT solucion
            FROM solucion
            WHERE fecha = CURDATE();
        ";
    $stmt = $conn->prepare($sql); 
    $stmt->execute();
    $resultado = $stmt->get_result();

    // Si existe una fila en el resultado, guárdala en $fila y usa su campo solucion
    if($fila = $resultado->fetch_assoc()){
        $solHoy = $fila['solucion'];
    }

    // Mostrar Jugadores Acertados Hoy
    $sql2 = "
            SELECT login, hora
            FROM respuestas 
            WHERE fecha = CURDATE()
                AND respuesta = ?;
        ";
    $stmt = $conn->prepare($sql2); 
    $stmt->bind_param("s", $solHoy);
    $stmt->execute();
    $resultado2 = $stmt->get_result();

    $data = [];
    $aciertos = 0;
    if($resultado2 && $resultado2-> num_rows > 0){
        while($row = $resultado2->fetch_assoc()){
            $data[] = $row;
            $aciertos ++;
        }
    }

    // Mostrar Jugadores Fallados Hoy
    $sqlFallos = "
    /* Dame todos los usuarios que han respondido hoy y cuya respuesta NO es igual a la solución de hoy */
            SELECT login, hora, respuesta
            FROM respuestas
            WHERE fecha = CURDATE()
            AND respuesta <> ( /*la respuesta del usuario es distinta a la solución correcta*/
                SELECT solucion
                FROM solucion
                WHERE fecha = CURDATE()
                LIMIT 1
            );
        ";
    $stmt = $conn->prepare($sqlFallos); 
    $stmt->execute();
    $resultadoFallos = $stmt->get_result();

    $dataFallos = [];

    if($resultadoFallos && $resultadoFallos-> num_rows > 0){
        while($row = $resultadoFallos->fetch_assoc()){
            $dataFallos[] = $row;
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

    <h2>Jugadores Que Han Fallado</h2>
    <table border="1">
        <tr>
            <th>Login</th>
            <th>Hora</th>
        </tr>
        <?php foreach ($dataFallos as $row): ?>
        <tr>
            <td><?= $row['login'] ?></td>
            <td><?= $row['hora'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>