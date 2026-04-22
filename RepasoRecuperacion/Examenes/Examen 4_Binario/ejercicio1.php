<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<h2>Resultados: </h2>";

        for($i = 0; $i < 3; $i++){
            for($j = 0; $j < 2; $j++){

                $valor = $_POST['E_'.$i.'_'.$j];

                if(is_numeric($valor) && $valor >= 1 && $valor <= 100){
                    $binario = decbin($valor);

                    echo "Binario: $binario <br>";
                } else {
                    echo "Valor no válido: $valor <br>";
                }
            }
        }
        echo '<br><a href="">Volver</a>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
    <?php
    // SOLO mostramos el formulario si NO se ha enviado todavía
    if ($_SERVER["REQUEST_METHOD"] != "POST") {
    ?>
        <form method="post">
            <?php
                for($i = 0; $i < 3; $i++){
                    echo "<br>";
                    for($j = 0; $j < 2; $j++){
                        // Numero 0.0
                        echo "E.$i.$j";
                        // El input
                        echo '<input type="text" name="E_'.$i.'_'.$j.'">';
                    }
                }
            ?>
            
            <br>
            <button type="submit">Calcular</button>
        </form>
    <?php } ?>

</body>
</html>