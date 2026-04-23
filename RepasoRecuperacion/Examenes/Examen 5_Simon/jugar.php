<?php
session_start();
include("pintarCirculos.php");

if(!isset($_SESSION['usuario'])){
    header("Location: index.php");
    exit;
}

if(!isset($_SESSION['jugada'])){
    $_SESSION['jugada'] = [];
}

if(isset($_POST['color'])){
    $_SESSION['jugada'][] = $_POST['color'];
}

$circulos = ["black", "black", "black", "black"];

for($i=0; $i<count($_SESSION['jugada']); $i++){
    $circulos[$i] = $_SESSION['jugada'][$i];
}

if(count($_SESSION['jugada']) == 4){
    if($_SESSION['jugada'] == $_SESSION['combinacion']){
        header("Location: acierto.php");
        exit;
    } else {
        header("Location: fallo.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Jugar Simón</title>
</head>
<body>
    <h1>SIMÓN</h1>
    <h2><?php echo $_SESSION['usuario']; ?> pulsa los botones en el orden correspondiente</h2>

    <?php
    pintar_circulos($circulos[0], $circulos[1], $circulos[2], $circulos[3]);
    ?>

    <br><br>

    <form method="post" action="" style="display:inline;">
        <button type="submit" name="color" value="red">ROJO</button>
    </form>

    <form method="post" action="" style="display:inline;">
        <button type="submit" name="color" value="blue">AZUL</button>
    </form>

    <form method="post" action="" style="display:inline;">
        <button type="submit" name="color" value="yellow">AMARILLO</button>
    </form>

    <form method="post" action="" style="display:inline;">
        <button type="submit" name="color" value="green">VERDE</button>
    </form>
</body>
</html>