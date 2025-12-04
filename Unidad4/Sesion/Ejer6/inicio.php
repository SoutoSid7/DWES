<?php
    session_start();
    if(isset($_POST["enviar"])){
        $nombre = $_POST["sol"] ?? '';

        // Datos de conexión
        $hn = 'localhost';
        $db = 'jeroglifico';
        $un = 'jugador';
        $pw = '';

        $conn = new mysqli($hn, $un, $pw, $db);
        if ($conn->connect_error) die("Error de conexión: " . $conn->connect_error);

        $sql = "SELECT * FROM jugador WHERE nombre = ? AND clave = ?;";
        $stmt = $conn->prepare($sql); 
        $stmt->bind_param("ss", $nombre, $clave);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if($resultado->num_rows == 1){
            $_SESSION["usuario"] = $nombre;
            header("Location: inicio.php");
            exit;
        } else {
            echo "Credenciales Incorrectas. Intentelo de nuevo";
        }

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
    <h1>Bienvenido, <?php echo $_SESSION["usuario"]; ?></h1>

    <img src="./imagenes/20240216.jpg" width=500px>

    <form action="inicio.php" method="post">
        <label for="sol">Solucion al jeroglifico: </label>
        <input type="text" id="sol" name="sol">

        <br><br>
        <input type="submit" name="enviar" value="Enviar"><br><br>
        <input type="submit" name="puntos" value="Ver puntos por jugador"><br><br>
        <input type="submit" name="resultados" value="Resultados del dia">
    </form>
</body>
</html>