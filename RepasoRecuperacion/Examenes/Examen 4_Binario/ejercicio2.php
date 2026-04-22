<?php
    session_start();
    $binario = [];
    for($i = 0; $i <= 3; $i++){
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
    <title>Ejercicio2</title>
</head>
<body>
    <h1>Adivina el numero en decimal</h1>
    <h3>El numero en binario es: <?php echo implode("", $binario); ?></h3> <!-- .implode devuelve los 4 numeros del array como un string -->

    <?php
    /**
     * Recorre un array de 4 valores (tipo binario: 0 o 1).
     * Según la posición, asigna una imagen distinta.
     * Según el valor (0 o 1), decide:
     *    Mostrar un rombo específico
     *    O una imagen negra (Negri.JPG)
     * EJ: $binario = 1010 Muestra case0, case2
     */
        foreach($binario as $i => $bin){
            switch($i){
                case 0:
                    $img = ($bin == 1) ? "Imagenes/Rombo8.jpg" : "Imagenes/Negri.JPG";
                    break;
                case 1:
                    $img = ($bin == 1) ? "Imagenes/Rombo4.jpg" : "Imagenes/Negri.JPG";
                    break;
                case 2:
                    $img = ($bin == 1) ? "Imagenes/Rombo2.jpg" : "Imagenes/Negri.JPG";
                    break;
                case 3:
                    $img = ($bin == 1) ? "Imagenes/Rombo1.jpg" : "Imagenes/Negri.JPG";
                    break;
            }
            echo "<img src='$img' width='80' height='100'> ";
        }
    ?>

    <form action="ejercicio21.php" method="post">
        <label for="num">Adivina el número en decimal:</label>
        <input type="number" id="num" name="num" required>
        <button type="submit">Verificar</button>
    </form>

</body>
</html>