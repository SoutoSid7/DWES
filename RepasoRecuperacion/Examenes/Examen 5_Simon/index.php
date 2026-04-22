<?php
    session_start();

    if(isset($_POST["entrar"])){
        $usuario = $_POST["usuario"] ?? '';
        $clave = $_POST["clave"] ?? '';

        // Datos Conexion
        $hn = 'localhost';
        $db = 'bdsimon';
        $un = 'root';
        $pw = '';

        $conn = new mysqli($hn, $un, $pw, $db);
        if ($conn->connect_error) die("Error de conexión: " . $conn->connect_error);

        // Buscar Usuario y Clave
        $sql = "
            SELECT * 
            FROM usuarios
            WHERE  nombre = ? AND clave = ?;
        ";
        $stmt = $conn->prepare($sql); 
        $stmt->bind_param("ss", $usuario, $clave);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if($resultado -> num_rows == 1){
            $_SESSION["usuario"] = $usuario;
            header("Location: inicio.php");
            exit;
        } else {
            echo "Error en usuario y/o contraseña";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simon</title>
</head>
<body>
    <h1>Vamos A Jugar Al Simon!!!!</h1>
    <form action="index.php" method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario">

        <label for="clave">Clave:</label>
        <input type="password" id="clave" name="clave">

        <br><br>
        <input type="submit" name="entrar" value="entrar"><br><br>
    </form>
</body>
</html>