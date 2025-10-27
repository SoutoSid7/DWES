<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simon Dice</title>
</head>
<body>
    <h1>Simón</h1>
    <?php
        session_start();
        require_once 'pintarCirculos.php';

        pintarCirculos ("black", "black", "black", "black"); // pinta los circulos de negro en la funcion 

        
    ?>

    <p>Pulsa los Botones en el Orden Correcto: </p>
    <form action="jugar.php" method="post">
        <button type="submit" name="red" style ="background-color:red; color:white; width:75px; height:35px; border-radius: 2px">ROJO</button>
        <button type="submit" name="blue" style ="background-color:blue; color:white; width:75px; height:35px; border-radius: 2px">AZUL</button>
        <button type="submit" name="yellow" style ="background-color:yellow; color:black; width:80px; height:35px; border-radius: 2px">AMARILLO</button>
        <button type="submit" name="green" style ="background-color:green; color:white; width:75px; height:35px; border-radius: 2px">VERDE</button>
    </form>
</body>
</html>