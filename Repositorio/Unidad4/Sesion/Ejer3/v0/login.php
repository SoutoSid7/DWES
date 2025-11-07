<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Inicio de Sesión</title>
</head>
<body>
    <h1>Iniciar sesión</h1>
    <form action="login.php" method="post">
        <label for="usuario">Usuario:</label>
        <input id="usuario" name="usuario" type="text" placeholder="Introduce tu usuario">

        <br><label for="passwd">Contraseña:</label>
        <input id="passwd" name="passwd" type="password" placeholder="Introduce tu contraseña">

        <br><br><button type="submit" name="login">Enviar</button>
    </form>

<!--PHP-->
    <?php
        session_start();

        $hn = 'localhost';
        $db = 'bdsimon';
        $un = 'root';
        $pw = '';   

        // Conexion a Base De Datos MySQL
        require_once 'login.php';
        $conn = new mysqli($hn, $un, $pw, $db); //Orden: servidor, usuario, contraseña y base de datos
        if($conn->connect_error) die ("Fatal Error"); // Comprueba si se puede hacer la conexion

        if(isset($_POST['login'])){  // Comprueba si hay un boton que se llame login
            $nombre = $_POST['usuario'];
            $clave = $_POST['passwd'];
            
            $sql = "SELECT * FROM usuarios WHERE Nombre = '$nombre' AND Clave = '$clave'"; // Coincide con las variables de arriba
            $result  = $conn->query($sql); // Ejecuta la consulta en la BBDD y lo guarda en $result

            if($result->num_rows > 0){
                $user = $result->fetch_assoc();
                if($clave == $user['Clave']){
                    $_SESSION['loggedin'] = true;
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['Nombre'] = $user['Nombre'];
                    header("Location: inicio.php");
                    exit();
                }
            } else {
                echo "<br>Contraseña o Usuario Incorrecto";
            }
        }
        $conn->close();
    ?>
</body>
</html>
