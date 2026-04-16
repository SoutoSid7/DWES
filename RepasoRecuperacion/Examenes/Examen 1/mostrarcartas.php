<?php
    session_start();
    $imagenes = ["copas_02", "copas_03", "copas_05"];

    $totalCartas = 6; // num cartas para el boton dinamico

    if(!isset($_SESSION["cont"])){ // Porque si no cada vez que le damos al boton de Levantar Carta $i se reinicia el contador
        $_SESSION["cont"] = 0;
    }

    if(isset($_POST["levantar"])){
        $_SESSION["cont"]++;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Levantar Cartas</title>
</head>
<body>
    <h1>Bienvenid@ <?php echo $_SESSION["login"]; ?></h1>

    <form action="mostrarcartas.php" method="POST">
        <label for="carLev">Cartas Levantadas: </label>
        <span>
            <?php
                echo $_SESSION["cont"];
            ?>
        </span>

        <br><br>
        <?php for($i = 1; $i <= $totalCartas; $i++):?> <!-- : -> Abre el bloque del for cuando mezclas PHP con HTML -->
            <button type="submit" name="levantar" value="<?php echo $i; ?>"> <!-- Pone como valor del botón el número actual de $i -->
                Levantar Carta <?php echo $i; ?>
            </button>
        <?php endfor; ?>
    </form>

    <form action="resultado.php" method="POST">
        <br><br>
        <label>Pareja:</label>
        <input type="text" name="n1" min="1" max="6">
        <input type="text" name="n2" min="1" max="6">
        <input type="submit" name="resultado" value="Comprobar">         
    </form>

    <?php
        for($i=0; $i<=6; $i++){
            echo "<img src='boca_abajo.jpg' width='80' height='100'>";
        }
    ?>

</body>
</html>



