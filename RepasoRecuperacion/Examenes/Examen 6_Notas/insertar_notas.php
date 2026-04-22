<?php
    session_start(); 

    if(isset($_POST["insertar"])){
        $id = $_POST["id"];
        $asig = $_POST["asignatura"];
        $nota = $_POST["nota"];

        // Datos Conexion
        $hn = 'localhost';
        $db = 'bdnotas';
        $un = 'root';
        $pw = '';

        $conn = new mysqli($hn, $un, $pw, $db);
        if ($conn->connect_error) die("Error de conexión: " . $conn->connect_error);

        // Comprobar es directora
        if($_SESSION["rol"] != "directora"){
            echo "Usted no es director, no puede insertar";
        }else {
            // Comprobar SI exsite en usuarios
            $sqlUser = "
                SELECT * 
                FROM usuarios
                WHERE id = ?;
            ";
            $stmtUser = $conn->prepare($sqlUser); 
            $stmtUser->bind_param("i", $id);
            $stmtUser->execute();
            $resultadoUser = $stmtUser->get_result();

            // Comprobar SI exsite en alumnos
            $sqlAlum = "
            SELECT * 
            FROM alumnos
            WHERE id = ?;
            ";
            $stmtAlum = $conn->prepare($sqlAlum); 
            $stmtAlum->bind_param("i", $id);
            $stmtAlum->execute();
            $resultadoAlum = $stmtAlum->get_result();

            // Mensajes de error
            if($resultadoUser-> num_rows == 0 && $resultadoAlum-> num_rows == 0){
                echo "El alumno NO existe en la tabla alumnos y tampoco en usuarios";
            } elseif($resultadoAlum-> num_rows == 0){
                echo "El alumno NO existe en la tabla alumnos";
            } elseif($resultadoUser-> num_rows == 0){
                echo "El alumno NO existe en la tabla usuarios";
            } else { // SI todo OK INSERT
                $sqlNota = "
                    INSERT INTO notas(alumno, asignatura, fecha, nota) 
                    VALUES (?, ?, CURDATE(),?);
                ";

                $stmtNota = $conn->prepare($sqlNota); 
                $stmtNota->bind_param("isi", $id, $asig, $nota);
                $stmtNota->execute();

                if($stmtNota-> affected_rows == 1){
                    echo "Nota insertada correctamente";
                }

            }    
        }
    }

    if(isset($_POST["volver"])){
        header("Location: resultado_directora.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Notas</title>
</head>
<body>
    <h1>Insertar Notas</h1>
    <form method="post">
        <label for="id">Id Del Alumno:</label>
        <input type="number" id="id" name="id">
        <br>
        <label for="asignatura">Asignatura:</label>
        <input type="text" id="asignatura" name="asignatura">
        <br>
        <label for="nota">Nota (0-10):</label>
        <input type="number" id="nota" name="nota" min=0 max=10>

        <br><br>
        <button type="submit" name="insertar">Insertar Nota</button>
        <button type="submit" name="volver">Volver</button>
    </form>
</body>
</html>