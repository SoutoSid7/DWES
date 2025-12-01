<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio2</title>
</head>
<body>
    <?php
        session_start();
        echo "<h4>PROFESOR </h4>" .$_SESSION["nombre"] ."<h4>NOMBRE </h4>";
    ?>
</body>
</html>