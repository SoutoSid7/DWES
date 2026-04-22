<?php
    session_start();
    require_once 'pintarCirculos.php';

    $mostrar = ["black", "black", "black", "black"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugar</title>
</head>
<body>
    <h1>Simon</h1>
    <h3><?php echo $_SESSION["usuario"];?> pulsa los botones en el orden correspondiente</h3>

    <?php pintarCirculos($mostrar[0], $mostrar[1], $mostrar[2], $mostrar[3]); ?>
</body>
</html>