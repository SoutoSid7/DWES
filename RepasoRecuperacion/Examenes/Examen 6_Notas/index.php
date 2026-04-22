<?php   
    session_start();

    if(isset($_POST["entrar"])){
        $usuario = $_POST["usuario"];
        $clave = $_POST["clave"];

        // Datos Conexion
        $hn = 'localhost';
        $db = 'bdnotas';
        $un = 'root';
        $pw = '';

        $conn = new mysqli($hn, $un, $pw, $db);
        if ($conn->connect_error) die("Error de conexión: " . $conn->connect_error);

        // Buscar Usuario y Clave 
        $sql = "
            SELECT u.*, a.nombre, a.apellidos
            FROM usuarios u
            LEFT JOIN alumnos a ON u.id = a.id
            WHERE u.usuario = ? 
                AND u.password = ?;
        ";
        $stmt = $conn->prepare($sql); 
        $stmt->bind_param("ss", $usuario, $clave);
        $stmt->execute();
        $resultado = $stmt->get_result();

        // Comprobar si es Alumno o Directora
        if($resultado -> num_rows == 1){
            $row = $resultado->fetch_assoc(); // Asocia a row un array con los datos encontrados
            $_SESSION["nombre"] = $row['nombre'] ?? '';

            if($row['rol'] == "alumno"){
                header("Location:resultado_alumno.php");
                exit;
            } else {
                header("Location:resultado_directora.php");
            }
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
    <title>Login</title>
</head>
<body>
    <h1>Iniciar Sesion</h1>
    <form method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario">
        <br>
        <label for="clave">Contraseña:</label>
        <input type="password" id="clave" name="clave">

        <br><br>
        <input type="submit" name="entrar" value="entrar"><br><br> 
    </form>
</body>
</html>