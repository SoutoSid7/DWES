<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
</head>
<body>
    <h1>Agenda</h1>
    <?php
        session_start();
        // Datos De Conexión
        $hn = 'localhost';
        $db = 'agenda';
        $un = 'root';
        $pw = '';

        $conn = new mysqli($hn, $un, $pw, $db);
        if ($conn->connect_error) die("Error de conexión: " . $conn->connect_error);

        echo "Hola " .$_SESSION["nombre"];

        ?>
        <form method="post">
            <?php
                // Formularios Segun Numero De Incrementos
                for($i = 0; $i < $_SESSION["contador"]; $i++){
                    echo '<form method="post">';
                    echo '<h3>Contacto' . ($i + 1) . '</h3>';
                    echo 'Nombre: <input type="text" name="nombre_' . $i . '"<br>';
                    echo 'Email: <input type="email" name="email' .$i . '"<br>';
                    echo 'Teléfono: <input type="text" name="telefono_' . $i . '"<br>';
                    echo '</form>';
                }
            ?>
            <br>
            <input type="submit" name="grabar" value="Grabar">
        </form>
</body>
</html>