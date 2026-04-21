<?php
    session_start();
    $dni = $_SESSION["dni"] ?? '';

    // Datos Conexion
    $hn = 'localhost';
    $db = 'oposicion';
    $un = 'root';
    $pw = '';

    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die("Error de conexión: " . $conn->connect_error);

    // Modulo Curso Impartido
    $sql = "
            SELECT * 
            FROM curso
            WHERE profesor = ?;
        ";
    $stmt = $conn->prepare($sql); 
    $stmt->bind_param("s", $dni);
    $stmt->execute();
    $resultado = $stmt->get_result();

    $data = [];
    if($resultado && $resultado-> num_rows> 0){ // Comprueba que es valido y que tiene al menos un resultado
        while($row = $resultado->fetch_assoc() ){ // Devuelve la fila actual como un array asociativo
            $data[] = $row; // Guarda el valor de row en el array data
        }
    }

    // Total Numeros Horas
    $sql = "
            SELECT SUM(numhoras) AS totalHoras 
            FROM curso
            WHERE profesor = ?;
        ";
    $stmt = $conn->prepare($sql); 
    $stmt->bind_param("s", $dni);
    $stmt->execute();
    $resultado = $stmt->get_result();

    $totalHoras = 0;
    // Obtiene una fila del resultado; si existe, guarda el valor de totalHoras en la variable
    if($row = $resultado->fetch_assoc()){ // obtiene UNA fila del resultado de la consulta y la devuelve como un array asociativo
        $totalHoras = $row["totalHoras"];
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
        Profesor: <?php echo $_SESSION["dni"];?>    
        Nombre: <?php echo $_SESSION["nombreP"]; ?>
    </h3>

    <table border="1">
        <tr>
            <th>codigoCurso</th>
            <th>nombreCurso</th>
            <th>maxAlumnos</th>
            <th>fechaIni</th>
            <th>fechaFin</th>
            <th>numHoras</th>
            <th>profesor</th>
        </tr>
        <?php foreach ($data as $row): ?>
        <tr>
            <td><?= $row['codigocurso'] ?></td>
            <td><?= $row['nombrecurso'] ?></td>
            <td><?= $row['maxalumnos'] ?></td>
            <td><?= $row['fechaini'] ?></td>
            <td><?= $row['fechafin'] ?></td>
            <td><?= $row['numhoras'] ?></td>
            <td><?= $row['profesor'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h4>Total Horas Impartidas: <?php echo $totalHoras; ?></h4>

</body>
</html>