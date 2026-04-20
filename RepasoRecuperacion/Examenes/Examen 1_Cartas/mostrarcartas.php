<?php
    session_start();
    $aleatorio1 = ["img/copas_02", "img/copas_03", "img/copas_05"];
    $aleatorio2 = ["img/copas_02", "img/copas_03", "img/copas_05"];

    if (!isset($_SESSION["cartas"])) { // Si no existe la sesion cartas
        $img = array_merge($aleatorio1, $aleatorio2); // Junta arrays
        shuffle($img); // Mezcla arrays
        $_SESSION["cartas"] = $img; // Guarda ese array en la sesión
    }
    $img = $_SESSION["cartas"]; // Recupera el tablero guardado

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
        <?php endfor; 
            $cartaLevantada = isset($_POST["levantar"]) ? (int)$_POST["levantar"] : 0; 
            /*
            *   Si sí existe, hace esto: 
            *   Coge el valor (por ejemplo "4")
            *   Lo convierte a número entero con (int)
            *   Lo guarda en $cartaLevantada
            *   Si no es 0
            */
        ?>
    </form>

    <form action="resultado.php" method="POST">
        <br><br>
        <label>Pareja:</label>
        <input type="number" name="n1" max="6" required>
        <input type="number" name="n2" max="6" required>
        <input type="submit" name="resultado" value="Comprobar">     
        
    </form>
    <br>
    <?php
        for($i=1; $i<=$totalCartas; $i++){
            if($cartaLevantada == $i){
                echo "<img src='" . $img[$i - 1] . ".jpg' alt='Carta' width='80' height='100'>";
            } else {
                echo "<img src='img/boca_abajo.jpg' width='80' height='100'> ";
            }
        }
    ?>
</body>
</html>



