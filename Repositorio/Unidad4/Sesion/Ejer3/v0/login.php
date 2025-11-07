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

        <br><br><button type="submit">Enviar</button>
    </form>

<!--PHP-->
    <?php
        $hn = 'localhost';
        $db = 'bdsimon';
        $un = 'root';
        $pw = '';   
        // Conexion a Base De Datos MySQL
        require_once 'login.php';
        $conn = new mysqli($hn, $un, $pw, $db); //Orden: servidor, usuario, contraseña y base de datos
        if($conn->connect_error) die ("Fatal Error"); // Comprueba si se puede hacer la conexion

    ?>

<!--SELECT * FROM usuarios WHERE Nombre = "$_POST[usuario]" AND Clave = "$_POST[passwd]"-->
</body>
</html>