<?php 
    session_start();
    $usuario = $_SESSION["usuario"]; 

    // Datos de conexión
    $hn = 'localhost';
    $db = 'jeroglifico';
    $un = 'jugador';
    $pw = '';

    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die("Error de conexión: " . $conn->connect_error);
    
    // Jugadores Acertantes NUMERO
    $sqlNumAciertos = "SELECT COUNT(*) AS acertantes
            FROM respuestas r
            JOIN solucion s ON r.fecha = s.fecha
            WHERE r.fecha = CURDATE()
                AND r.respuesta = s.solucion;
            ";
    $acertantes = $conn->query($sqlNumAciertos);
    $filaAciertos = $acertantes->fetch_assoc();
    $num_acertantes = $filaAciertos['acertantes'] ?? 0;

    // Jugadores Acertantes NOMBRE & HORA
    $sqlNombreAcertantes = "SELECT j.nombre, r.hora
            FROM respuestas r
            JOIN jugador j ON r.login = j.login
            JOIN solucion s ON r.fecha = s.fecha
            WHERE r.fecha = CURDATE()
                AND r.respuesta = s.solucion
            ORDER BY r.hora;
            ";
    $nombreAciertos = $conn->query($sqlNombreAcertantes);

    // Jugadores Fallan NOMBRE & HORA
    $sqlNombreFallo = "SELECT j.nombre, r.hora
            FROM respuestas r
            JOIN jugador j ON r.login = j.login
            JOIN solucion s ON r.fehca = s.fecha
            WHERE r.fecha = CUERDATE()
                AND r.respuesta <> s.solucion
            ORDER BY r.hora;";
    $fallos = $conn->query($sqlNombreFallo)
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
    <h3>Numero de jugadores acertantes: <?php echo $num_acertantes; ?> </h3>
</body>
</html>