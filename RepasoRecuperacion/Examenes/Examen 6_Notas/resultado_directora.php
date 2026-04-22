<?php
    session_start();

    // Insertar Nota 
    if(isset($_POST["insertarNota"])){
        header("Location: insertar_notas.php");
        exit;
    }

    // Mostrar Nota 
    if(isset($_POST["mostrarNota"])){
        header("Location: mostrar_notas.php");
        exit;
    }

    // Cerrar Sesion
    if(isset($_POST["cerrarSesion"])){
        session_destroy();
        header("Location: index.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado Directora</title>
</head>
<body>
    <h1>Bienvenido</h1>
    <h3>Tu perfil es de director/a </h3>

    <form method="post">
            <button type="submit" name="insertarNota">Insertar Nota</button>
            <button type="submit" name="mostrarNota">Mostrar Nota</button>
            <button type="submit" name="cerrarSesion">Cerrar Sesion</button>
        </form>
</body>
</html>