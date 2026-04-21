<?php
    session_start();

    if(isset($_POST["guardar"])){
        $dni = $_SESSION["dni"] ?? '';        
        $codCurso = $_POST["codCurso"] ?? '';
        $pruebaA = $_POST["pruebaA"] ?? ''; // Para guardarlo en sesion $_SESSION["pruebaA"] = $pruebaA
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
        
        // Codigo Curso Comprobar
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

        // Crear Matricula
        $fecha = date("Y-m-d", strtotime($inscripcion));

        $sqlMatricula = "
                INSERT INTO matricula(dnialumno, codcurso, pruebaA, pruebaB, tipo, inscripcion) 
                VALUES (?, ?, ?, ?, ?, ?);
        ";
        $stmt = $conn->prepare($sqlMatricula);
        $stmt-> bind_param("ssssss", $dni, $codCurso, $pruebaA, $pruebaB, $tipo, $inscripcion);
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
    <title>Document</title>
</head>
<body>
    <h3>
        Alumno: <?php echo $_SESSION["dni"];?>    
        Nombre: <?php echo $_SESSION["nombreA"]; ?>
    </h3>

    <form action="ejercicio3.php" method="post" >
        <label for="dni">DNI:</label>
        <span>
            <?php
                echo $_SESSION["dni"];
            ?>
        </span>
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
        <input type="date" id="inscripcion" name="inscripcion">

        <br><br>
        <input type="submit" name="guardar" value="Guardar"><br><br>
    </form>

</body>
</html>