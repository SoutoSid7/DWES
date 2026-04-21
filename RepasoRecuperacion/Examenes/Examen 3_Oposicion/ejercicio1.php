<?php
    session_start();
    if(isset($_POST["entrar"])){
        $dni = $_POST["dni"] ?? '';

        // Datos Conexion
        $hn = 'localhost';
        $db = 'oposicion';
        $un = 'root';
        $pw = '';

        $conn = new mysqli($hn, $un, $pw, $db);
        if ($conn->connect_error) die("Error de conexión: " . $conn->connect_error);

        // Buscar En Tabla Profesor
        $sql = "
                SELECT * 
                FROM profesor 
                WHERE dniP = ?;
            ";
        $stmt = $conn->prepare($sql); 
        $stmt->bind_param("s", $dni);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if($resultado -> num_rows == 1){
            $row = $resultado->fetch_assoc(); // Asocia a row un array con los datos encontrados
            $_SESSION["nombreP"] = $row['nombreP'] ?? '';
            header("Location: ejercicio2.php");
            exit;
        } else {
            echo "Error al intentar iniciar sesion";
        }

        // Buscar En Tabla Alumno
        $sql = "
                SELECT * 
                FROM alumno 
                WHERE dniA = ?;
            ";
        $stmt = $conn->prepare($sql); 
        $stmt->bind_param("s", $dni);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if($resultado -> num_rows == 1){
            $row = $resultado->fetch_assoc(); // Asocia a row un array con los datos encontrados
            $_SESSION["nombreA"] = $row['nombreA'] ?? '';
            header("Location: ejercicio3.php");
        } else {
            echo "Error al intentar iniciar sesion";
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
    <form action="ejercicio1.php" method="post" >
        <label for="dni">DNI:</label>
        <input type="text" id="dni" name="dni">

        <br><br>
        <input type="submit" name="entrar" value="Entrar"><br><br>
    </form>
</body>
</html>