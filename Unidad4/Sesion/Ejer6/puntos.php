<?php
    session_start();
    
    // Datos de conexión
    $hn = 'localhost';
    $db = 'jeroglifico';
    $un = 'jugador';
    $pw = '';

    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die("Error de conexión: " . $conn->connect_error);

    // Sumar Punto 
    $sql = "UPDATE jugador j
            JOIN respuestas r ON j.login = r.login
            JOIN solucion s ON r.fecha = s.fecha
            SET j.puntos = j.puntos + 1
            WHERE r.fecha = CURDATE()
                AND r.respuesta = s.solucion;
            ";
    $punto = $conn->query($sql);

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
</body>
</html>