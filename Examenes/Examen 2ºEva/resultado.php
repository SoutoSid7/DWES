<?php
    session_start();
    require_once "db.php";

    $tiradas = $_SESSION["cont"];
    $login = $_SESSION["login"];
    $clave = $_SESSION["clave"];
    $nombre = $_SESSION["usuario"];

    // Insertar Num Tiradas
    $sqlInsert = "
            UPDATE jugadores
            SET extra = extra + ?
            WHERE login = ? AND clave = ?;

        ";
    $stmt = $conn->prepare($sqlInsert);
    $stmt->bind_param("iss", $tiradas, $login, $clave);
    $stmt->execute();
    $resultado = $stmt->get_result();

    $_SESSION["cont"] = 0; // Reinicia el contador a 0

    if($stmt-> affected_rows == 1){
        echo "Se actualizo correctamente la puntuacion de Tiradas(extra)";
    }

    // Mostrar datos
    $sql = "
            SELECT nombre, puntos, extra
            FROM jugadores;
        ";
    
    $stmt2 = $conn->prepare($sql);
    $stmt2->execute();

    $resultado = $stmt2->get_result();

    $data = [];
    if($resultado && $resultado-> num_rows > 0){
        while($row = $resultado->fetch_assoc()){
            $data[] = $row;
        }
    }

    // Volver a Jugar
    if(isset($_POST["voler"])){
        header("Location: jugar.php");
        exit;
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
    <h1>Bienvenido, <?php echo $_SESSION["usuario"];?> </h1>
    <p>Se han acumulado <?php echo $tiradas; ?> tiradas a tu historial</p>

    <h3>Puntos por jugador</h3>
    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Puntos</th>
            <th>Extra (Tiradas)</th>
        </tr>
        <?php foreach ($data as $row): ?>
        <tr>
            <td><?= $row['nombre'] ?></td>
            <td><?= $row['puntos'] ?></td>
            <td><?= $row['extra'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <br>
    <form action="resultado.php" method="POST">
        <button type="submit" name="voler">Volver A Jugar</button>
    </form>
</body>
</html>