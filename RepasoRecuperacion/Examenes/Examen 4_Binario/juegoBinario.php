<?php
    session_start();

    $binario = [];
    for($i=0; $i<=3; $i++){
        $num = rand(0,1);
        $binario[$i] = $num;
    }
    $_SESSION["binario"] = $binario;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Binario</title>
</head>
<body>
    <h1>Adivina El Numero En Decimal</h1>
    <h3>El Numero Binario: <?php echo implode("", $binario);?></h3> <!-- .implode devuelve los 4 numeros del array como un string -->
</body>
</html>