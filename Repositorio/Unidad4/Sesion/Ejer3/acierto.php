<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simon</title>
</head>
<body>
    <h1>Simon</h1>
    <h3>Enhorabuena, has ganado</h3>
    <?php
        session_start();
        require_once 'pintarCirculos.php';

        $solucion = $_SESSION["solucion"];
        pintarCirculos($solucion[0], $solucion[1], $solucion[2], $solucion[3]);
    ?>
    <form 
        action="inicio.php" method="post"><input type="submit" value="Volver a jugar">
    </form>
</body>
</html>