<?php
    session_start();

    // Contador Cartas Levantadas
    if(!isset($_SESSION["contador"])){
        $_SESSION["contador"] = 0;
    }

    // Guardar Carta Lenvantada
    if(isset($_POST["carta"])){
        $_SESSION["levantada"] = $_POST["carta"];
        $_SESSION["contador"]++;
    }

    // Combinacion Aleatoria        
    if(!isset($_SESSION["conjunto"])){
        $cartas = ["copas_02.jpg","copas_03.jpg", "copas_05.jpg"];
        $conjunto = array_merge($cartas, $cartas);
        shuffle($conjunto);
        $_SESSION["conjunto"] = $conjunto;
    }
    $mostrarCartas = $_SESSION["conjunto"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Cartas</title>
</head>
<body>
    <h1>Bienvenid@ <?php echo $_SESSION["login"]; ?></h1>
    <form action="mostrarcartas.php" method="POST">
        <label for="carL">Cartas Levantadas: </label>
        <span>
            <?php echo $_SESSION["contador"]; ?>
        </span>

        <br><br>
        <?php
            // Boton interactivo
            for($i = 0; $i < 6; $i++){
                echo "<button type='submit' name='carta' value='$i'>Levantar Carta " .($i+1)."</button>";
            }
        ?>
    </form>

    <h2>Pareja:</h2>
    <form action="resultado.php" method="POST">
        <input type="number" name="n1" max="6" required>
        <input type="number" name="n2" max="6" required>
        <input type="submit" name="resultado" value="Comprobar">            
    </form><br>

    <?php
        for($i = 0; $i < 6; $i++){
            $img = "boca_abajo.jpg";

            if(isset($_SESSION["levantada"]) && $_SESSION["levantada"] == $i){
                $img = $mostrarCartas[$i];
            }
            echo "<img src='$img' width='80' height='100'> "; 
        }
    ?>
</body>
</html>