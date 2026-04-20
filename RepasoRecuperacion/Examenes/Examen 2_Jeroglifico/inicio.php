<?php
    session_start();

    if(isset($_POST["enviar"])){
        $usuario = $_SESSION["usuario"];
        $solucion = $_POST["sol"] ?? '';

        // Datos Conexion
        $hn = 'localhost';
        $db = 'jeroglifico';
        $un = 'root';
        $pw = '';

        $conn = new mysqli($hn, $un, $pw, $db);
        if ($conn->connect_error) die("Error de conexión: " . $conn->connect_error);

        $sql = "
                INSERT INTO respuestas(fecha, login, hora, respuesta) 
                VALUES (CURDATE(), ?, CURTIME(), ?);
            ";
        $stmt = $conn->prepare($sql); 
        $stmt->bind_param("ss", $usuario, $solucion);
        $stmt->execute();
    }

    if(isset($_POST["puntos"])){
        header("Location: puntos.php");
        exit;
    }


    if(isset($_POST["resultados"])){
        header("Location: resultado.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
    <h1>Bienvenido, <?php echo $_SESSION["usuario"];?> </h1>

    <img src="./img/20240216.jpg" width=500px>

    <form action="inicio.php" method="post">
        <label for="sol">Solucion al jeroglífico: </label>
        <input type="text" id="sol" name="sol">

        <br><br>
        <input type="submit" name="enviar" value="Enviar"><br><br>
        <input type="submit" name="puntos" value="Ver puntos por jugador"><br><br>
        <input type="submit" name="resultados" value="Resultados del dia">
    </form>

</body>
</html>