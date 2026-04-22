<?php
    session_start();
    require_once 'pintarCirculos.php';

    $colores = ["red", "blue", "yellow", "green"];
    // Pone en cada col1 un color aleatorio de colores
    $col1 = $colores[array_rand($colores)];
    $col2 = $colores[array_rand($colores)];
    $col3 = $colores[array_rand($colores)];
    $col4 = $colores[array_rand($colores)];

    // Se guarda en solucion
    $solucion = [$col1, $col2, $col3, $col4];
    $_SESSION["solucion"] = $solucion;

    $_SESSION["intentos"] = []; // reinicia la secuencia del jugador
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
    <h1>Simon</h1>
    <h3>Hola <?php echo $_SESSION["usuario"];?>, memoriza la combinacion</h3>

    <!-- Llamada a la Funcion pintarCirculos -->
    <?php pintarCirculos($col1, $col2, $col3, $col4); ?>

    <!--Boton Vamos a Jugar-->
    <form  action="jugar.php" method="post">
        <br><input type="submit" value="VAMOS A JUGAR">
    </form>
</body>
</html>