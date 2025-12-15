<?php
    session_start();
    $imagenes = ["copas_02", "copas_03", "copas_05"];  
    $count = 0; 
    if(isset($_POST["btnCarta1"])){
        $count ++;
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Cartas</title>
</head>
<body>
    <h1>Bienvenido <?php echo $_SESSION["login"]; ?></h1>
    <form action="mostrarcartas.php" method="POST">
        <label for="carL">Cartas Levantadas: </label>
        <span>
            <?php
                echo $count;
            ?>
        </span>

        <br><br>
        <input type="submit" name="btnCarta1" value="Levantar carta 1">
        <input type="button" name="btnCarta2" value="Levantar carta 2">
        <input type="button" name="btnCarta3" value="Levantar carta 3">
        <input type="button" name="btnCarta4" value="Levantar carta 4">
        <input type="button" name="btnCarta5" value="Levantar carta 5"> 
        <input type="button" name="btnCarta6" value="Levantar carta 6">
    </form>
    <h2>Pareja:</h2>
    <form action="resultado.php" method="POST">
        <input type="submit" name="resultado" value="Comprobar">            
    </form><br>
    <?php
        $mostrarCartas = [];
        for ($i = 0; $i <= 5; $i++){
            $pos = rand(0, 5);   
            $mostrarCartas[$i] = $pos;
        }
       foreach ($mostrarCartas as $i => $bin){
            switch($pos){
                case 0:
                    $img = ($bin == $i) ? "copas_02.jpg" : "boca_abajo.JPG";
                    break;
                case 1:
                    $img = ($bin == $i) ? "copas_03.jpg" : "boca_abajo.JPG";
                    break;
                case 2:
                    $img = ($bin == $i) ? "copas_05.jpg" : "boca_abajo.JPG";
                    break;
                case 3:
                    $img = ($bin == $i) ? "copas_02.jpg" : "boca_abajo.JPG";
                    break; 
                case 4:
                    $img = ($bin == $i) ? "copas_03.jpg" : "boca_abajo.JPG";
                    break;
                case 5:
                    $img = ($bin == $i) ? "copas_05.jpg" : "boca_abajo.JPG";
                    break;
            }
            echo "<img src='$img' width='80' height='100'> ";
        }   
    ?>
</body>
</html>