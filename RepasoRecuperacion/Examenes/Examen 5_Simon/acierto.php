<?php
    session_start();
    include("conexion.php");
    include("pintarCirculos.php");

    if(!isset($_SESSION['usuario'])){
        header("Location: index.php");
        exit;
    }

    $idusuario = $_SESSION['idusuario'];
    $conexion->query("INSERT INTO jugadas (codigousu, acierto) VALUES ($idusuario, 1)");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acierto</title>
</head>
<body>
    <h1>SIMÓN</h1>
    <h2><?php echo $_SESSION['usuario']; ?> enhorabuena, has acertado</h2>

    <?php
    pintar_circulos(
        $_SESSION['combinacion'][0],
        $_SESSION['combinacion'][1],
        $_SESSION['combinacion'][2],
        $_SESSION['combinacion'][3]
    );
    ?>

    <p>Se ha guardado en la base de datos</p>
    <a href="estadistica.php">Volver a jugar / Estadística</a>
</body>
</html>