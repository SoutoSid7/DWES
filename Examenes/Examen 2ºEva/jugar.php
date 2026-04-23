<?php
    session_start();

    $puntos = 0;
    $_SESSION["puntos"] = $puntos;

    // Imagenes
    $img = ["img/fruta0", "img/fruta1", "img/fruta2", "img/fruta3"];
    
    if (!isset($_SESSION["frutas"])) {
        $aleatorio = array_merge($img, $img, $img);
        shuffle($aleatorio);
        $_SESSION["frutas"] = $aleatorio;
    }
    $aleatorio = $_SESSION["frutas"];


    // Contador
    if(!isset($_SESSION["cont"])){
        $_SESSION["cont"] = 0;
    }
    if(isset($_POST["girarMaquina"])){
        $_SESSION["cont"]++;
    }   

    // Cobrar
    if(isset($_POST["cobrar"])){
        header("Location: resultado.php");
        exit;
    }
    
    // Cerrar Sesion
    if(isset($_POST["cerrarSesion"])){
        session_destroy();
        header("Location: entrada.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugar</title>
</head>
<body>
    <h1>Bienvenido, <?php echo $_SESSION["usuario"];?> </h1>
    <h3>Puntos ganados en esta partida: <?php echo $_SESSION["puntos"]; ?></h3>
    <h3>Tiradas: <?php echo $_SESSION["cont"]; ?></h3>

    <?php
        if ($_SERVER["REQUEST_METHOD"] != "POST") {
            for($i=1; $i<=3; $i++){
                echo "<img src='img/cubierta.png' width='150' height='150'> ";
            }
        }
        
        if(isset($_POST["girarMaquina"])){
            shuffle($aleatorio);
            for($i=1; $i<=3; $i++){
                echo "<img src='" . $aleatorio[$i] . ".png' alt='Carta' width='150' height='150'>";
            }
        }
    ?>

    <form action="jugar.php" method="POST">
        <button type="submit" name="girarMaquina">Girar Maquina</button>
        <button type="submit" name="cobrar">Cobrar/Actualizar Puntos</button>
        <button type="submit" name="cerrarSesion">Cerrar Sesion</button>
    </form>
</body>
</html>

