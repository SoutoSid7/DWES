<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio1</title>
</head>
<body>

    <?php
        session_start();
        if(isset($_POST["boton"])){
            $dniA = $_POST["dni"] ?? '';
            $dniP = $_POST["dni"] ?? '';

            // Datos de Conexion 
            $hn = 'localhost';
            $db = 'oposicion';
            $un = 'root';
            $pw = '';

            $conn = new mysqli($hn, $un, $pw, $db);
            if ($conn->connect_error) die("Error de conexión: " . $conn->connect_error);

            $sql = "SELECT * FROM alumno WHERE dniA = ? 
                    OR 
                    SELECT * FROM profesor WHERE dniP = ?;";
            $stmt = $conn->prepare($sql);
            $stmt-> bind_param("ss", $dniA, $dniP);
            $stmt->execute();
            $resultado = $stmt->get_result();

            if($resultado->num_rows == 1){
                $_SESSION["nombre"] = $nombre;
                header("Location: ejercicio3.php");
                exit;
            }

        }
    ?>

    <form action="ejercicio1.php" method="post">
        <label for="dni">DNI: </label>
        <input type="text" id="dni" name="dni">

        <br><br>
        <input type="submit" name="boton" value="Entrar">
    </form>
</body>
</html>