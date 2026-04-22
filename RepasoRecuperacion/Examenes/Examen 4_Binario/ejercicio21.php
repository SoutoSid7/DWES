<?php
    session_start();
    $_SESSION["num"] = $_POST["num"];

    //Recuperar el binario
    $binario = $_SESSION["binario"];
    $binarioN = implode("", $binario);

    $binDecimal = bindec($binarioN);

    if($_SESSION["num"] == $binDecimal){
        echo "Correcto, el numero ".$_SESSION ["num"]. " en binario es: ". $binarioN;
    } else {
        echo "<h2>Has fallado, vuelve a jugar</h2>";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio21</title>
</head>
<body>
    <br><a href="ejercicio2.php" title="Ir la página anterior">Volver</a>
</body>
</html>