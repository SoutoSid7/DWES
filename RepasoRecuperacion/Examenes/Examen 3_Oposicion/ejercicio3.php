<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>
        Alumno: <?php echo $_SESSION["dni"];?>    
        Nombre: <?php echo $_SESSION["nombreA"]; ?>
    </h3>

    <form action="ejercicio3.php" method="post" >
        <label for="dni">DNI:</label>
        <input type="text" name="dni" value="<?php echo $_SESSION['dni']; ?>" readonly>
        <br>
        <label for="codCurso">Cod Curso:</label>
        <input type="text" id="codCurso" name="codCurso">
        <br>
        <label for="pruebaA">Prueba A:</label>
        <input type="number" id="pruebaA" name="pruebaA">
        <br>
        <label for="pruebaB">Prueba B:</label>
        <input type="number" id="pruebaB" name="pruebaB">
        <br>
        <label for="tipo">Tipo:</label>
        <input type="text" id="tipo" name="tipo">
        <br>
        <label for="inscripcion">Inscripcion:</label>
        <input type="text" id="inscripcion" name="inscripcion">

        <br><br>
        <input type="submit" name="entrar" value="Guardar"><br><br>
    </form>

</body>
</html>