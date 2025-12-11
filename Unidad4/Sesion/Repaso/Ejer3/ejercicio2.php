<?php
    session_start();

    // Datos de Conexion
    $hn = 'localhost';
    $db = 'oposicion';
    $un = 'root';
    $pw = '';

    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die("Error de conexión: " . $conn->connect_error);

    $sql = "
            SELECT c.codigocurso, c.nombrecurso, c.maxalumnos, c.fechaini, c.fechafin, c.numhoras, c.profesor
            FROM curso c
            WHERE c.profesor = ?;
            ";

    $stmt = $conn->prepare($sql);
    $stmt-> bind_param("s", $dni);
    $stmt->execute();

    $resultado = $stmt->get_result();

    $data = [];
    if($resultado && $resultado->num_rows > 0){
        while($row = $resultado->fetch_assoc()){
            $data[] = $row;
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
    <p>PROFESOR <?php echo $_SESSION["dni"]; ?> NOMBRE <?php echo $_SESSION["nombre"]?></p>
</body>
</html>