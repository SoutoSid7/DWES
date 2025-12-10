<?php
    session_start();
    echo "<br>ALUMNO:    " .$_SESSION["dni"] ." NOMBRE:  " .$_SESSION["nombre"] ."<br>";

    if(isset($_POST["boton"])){
        $dni = $_SESSION["dni"] ?? '';
        $codCurso = $_POST["codCurso"] ?? '';
        $pruebaA = $_POST["pruebaA"] ?? '';
        $pruebaB = $_POST["pruebaB"] ?? '';
        $tipo = $_POST["tipo"] ?? '';
        $inscripcion = $_POST["inscripcion"] ?? '';

        // Datos de Conexion
        $hn = 'localhost';
        $db = 'oposicion';
        $un = 'root';
        $pw = '';

        $conn = new mysqli($hn, $un, $pw, $db);
        if ($conn->connect_error) die("Error de conexión: " . $conn->connect_error);

        $sqlCodCurso = "
                        SELECT * 
                        FROM curso
                        WHERE codigocurso = ?;
                        ";

        $stmt = $conn->prepare($sqlCodCurso);
        $stmt-> bind_param("i", $codCurso);
        $stmt->execute();
    
        $resultado = $stmt->get_result();

        if($resultado->num_rows == 0){
            echo("El curso no existe");
        }

        $sqlMatricula = "
                        INSERT INTO matricula (dnialumno, codcurso, pruebaA, pruebaB, tipo, inscripcion)
                        VALUES (?, ?, ?, ?, ?, ?);
                        ";

        // Convertir Fecha
        $fecha = date("Y-m-d", strtotime($inscripcion));

        $stmt = $conn->prepare($sqlMatricula); 
        $stmt->bind_param("siiiss", $dni, $codCurso, $pruebaA, $pruebaB, $tipo, $fecha);
        $stmt->execute();

        if($stmt->affected_rows > 0){
            echo "La matricula del alumno " .$dni ." en el curso " .$codCurso ." se ha realizado correctamente"; 
        } else {
            echo "Fatal ERROR";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio3</title>
</head>
<body>
    <br><br>
    <form action="ejercicio3.php" method="post">
        <label for="nombre">DNI: </label>
        <span>
            <?php
                echo $_SESSION["dni"];
            ?>
        </span>

        <br><br>
        <label for="codCurso">COD CURSO: </label>
        <input type="number" id="codCurso" name="codCurso">  

        <br><br>
        <label for="pruebaA">PRUEBA A: </label>
        <input type="number" id="pruebaA" name="pruebaA">

        <br><br>
        <label for="pruebaB">PRUEBA B: </label>
        <input type="number" id="pruebaB" name="pruebaB">

        <br><br>
        <label for="tipo">TIPO: </label>
        <input type="text" id="tipo" name="tipo">
    
        <br><br>
        <label for="inscripcion">INSCRIPCIÓN: </label>
        <input type="date" id="inscripcion" name="inscripcion"> 

        <br><br>
        <input type="submit" name="boton" value="GUARDAR">
    </form>
</body>
</html>