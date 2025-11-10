<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simon</title>
</head>
<body>
    <h1>Simón</h1>
    <?php
        session_start();
        require_once 'pintarCirculos.php';

        // Datos de la Sesion
        $hn = 'localhost';
        $db = 'bdsimon';
        $un = 'root';
        $pw = ''; 

        $solucion = $_SESSION["solucion"];
        $intentos = $_SESSION["intentos"] ?? [];

        $sql="INSERT INTO jugadas (codigousu,acierto) VALUES ('$codusu',1)";
    ?>

    <p>La secuencia correcta es:</p>
    <?php 
        pintarCirculos($solucion[0], $solucion[1], $solucion[2], $solucion[3]);
    ?>

    <p>Tu secuencia fue:</p>
    <?php 
        pintarCirculos($intentos[0], $intentos[1], $intentos[2], $intentos[3]);
    ?>

    <form action="inicio.php" method="post"><input type="submit" value="Volver a jugar">
    </form>

    <form action="estadistica.php" method="post"><input type="submit" value="Ver estadisticas">
    </form>
    
</body>
</html>