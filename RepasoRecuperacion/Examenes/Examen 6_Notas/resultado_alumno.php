<?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo $_SESSION["nombre"] ." tus notas son: "; 
        
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
    <title>Resultado Alumno</title>
</head>
<body>
    <?php
        // SOLO mostramos el formulario si NO se ha enviado todavía
        if ($_SERVER["REQUEST_METHOD"] != "POST") {
        ?>
        <h1>Bienvenido <?php echo $_SESSION["nombre"]?></h1>
        <h3>Tu perfil es de alumno/a</h3> 

        <form method="post">
            <button type="submit" name="verMisNotas">Ver Mis Notas</button>
            <button type="submit" name="cerrarSesion">Cerrar Sesion</button>
        </form>
    <?php } ?>
</body>
</html>