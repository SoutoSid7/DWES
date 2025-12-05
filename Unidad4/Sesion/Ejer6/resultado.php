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
</body>
</html>