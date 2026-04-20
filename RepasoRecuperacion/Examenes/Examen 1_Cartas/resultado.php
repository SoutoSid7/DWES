<?php
    session_start();

    $n1 = $_POST["n1"];
    $n2 = $_POST["n2"];
    $cartas = $_SESSION["cartas"];
    $cont = $_SESSION["cont"];
    $login = $_SESSION["login"];

    // Datos Conexion
    $hn = 'localhost';
    $db = 'cartas';
    $un = 'root';
    $pw = '';

    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die("Error de conexión: " . $conn->connect_error);

    // Comprobar Numero Usario
        if($cartas[$n1 - 1] === $cartas[$n2 -1]){
            $acierto = "Aciertos posiciones " .$n1 ." y " .$n2 ." despues de " .$cont ." intentos";
            $sql = "
                UPDATE jugador
                SET puntos = puntos + 1,
                    extra = extra + ?
                WHERE login = ?;
            ";
            
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("is", $cont, $login);
            $stmt->execute();

            $_SESSION["cont"] = 0; // Reinicia el contador a 0
        } else {
            $fallo = "Fallo posiciones " .$n1 ." y " .$n2 ." despues de " .$cont ." intentos";
            $sql = "
                UPDATE jugador
                SET puntos = puntos - 1,
                    extra = extra + ?
                WHERE login = ?;
            ";
            
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("is", $cont, $login);
            $stmt->execute();

            $_SESSION["cont"] = 0; // Reinicia el contador a 0
        }
    
    // Mostrar datos
    $sql = "
            SELECT nombre, puntos, extra
            FROM jugador;
    ";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $resultado = $stmt->get_result();

    $data = [];
    if($resultado && $resultado-> num_rows > 0){
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
    <title>Resultado</title>
</head>
<body>
    <h1>Bienvenid@ <?php echo $_SESSION['login'] ?></h1>

    <h2><?php if(isset($acierto)){
            echo $acierto;
        }?>
    </h2>
    <h2><?php if(isset($fallo)){
            echo $fallo;
        }?>
    </h2>
    
    <h2>Puntos por jugador</h2>
    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Puntos</th>
            <th>Extra</th>
        </tr>
        <?php foreach ($data as $row): ?>
        <tr>
            <td><?= $row['nombre'] ?></td>
            <td><?= $row['puntos'] ?></td>
            <td><?= $row['extra'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>