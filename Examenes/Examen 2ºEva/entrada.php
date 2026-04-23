<?php
    session_start();   
    require_once 'db.php';

    $error = "";

    if (isset($_POST['entrar'])) {
        $login = $_POST['usuario'] ?? '';
        $clave = $_POST['contrasena'] ?? '';

        // Consulta parametrizada para validar el usuario
        $sql = "
                SELECT nombre, login, clave 
                FROM jugadores 
                WHERE login = ? 
                    AND clave = ?
            ";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $login, $clave);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if($resultado -> num_rows == 1){
            $row = $resultado->fetch_assoc();

            $_SESSION["usuario"] = $row['nombre'] ?? '';
            $_SESSION["login"] = $_POST["usuario"] ?? '';
            $_SESSION["clave"] = $_POST["contrasena"] ?? '';

            header("Location: jugar.php");
            exit;
        } else {
            $error = "Credenciales incorrectas. Inténtalo de nuevo.";
        }
    }
?>


<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión - TRAGAPERRAS</title>
    <style>
        .error { color: red; font-weight: bold; }
        form { border: 1px solid #000; padding: 20px; width: 300px; }
    </style>
</head>
<body>
    <h1>Iniciar sesión</h1>
    
    <?php if ($error): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>

    <form action="entrada.php" method="post">
        <div>
            <label for="usuario">Usuario:</label><br>
            <input type="text" id="usuario" name="usuario" required>
        </div>
        <br>
        <div>
            <label for="contrasena">Contraseña:</label><br>
            <input type="password" id="contrasena" name="contrasena" required>
        </div>
        <br>
        <input type="submit" name="entrar" value="entrar">
    </form>
</body>
</html>