<?php
    session_start();
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo $_SESSION["nombre"] ." tus notas son: "; 

        // Datos Conexion
        $hn = 'localhost';
        $db = 'bdnotas';
        $un = 'root';
        $pw = '';

        $conn = new mysqli($hn, $un, $pw, $db);
        if ($conn->connect_error) die("Error de conexión: " . $conn->connect_error);

        $sql = "
                SELECT asignatura, nota
                FROM notas
                WHERE alumno = ? ;
            ";
        $stmt = $conn->prepare($sql); 
        $stmt->bind_param("i", $_SESSION["id"]);
        $stmt->execute();

        $resultado = $stmt->get_result();

        $data = [];
        if($resultado && $resultado-> num_rows> 0){ // Comprueba que es valido y que tiene al menos un resultado
            while($row = $resultado->fetch_assoc() ){ // Devuelve la fila actual como un array asociativo
                $data[] = $row; // Guarda el valor de row en el array data
            }
        }
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
        <h3>Tu perfil es de <?php echo $_SESSION["rol"]?></h3> 

        <form method="post">
            <button type="submit" name="verMisNotas">Ver Mis Notas</button>
            <button type="submit" name="cerrarSesion">Cerrar Sesion</button>
        </form>
    <?php } ?>    

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
    ?>
        <table border="1">
            <tr>
                <th>Asignatura</th>
                <th>Nota</th>
            </tr>
            <?php foreach ($data as $row): ?>
            <tr>
                <td><?= $row['asignatura'] ?></td>
                <td><?= $row['nota'] ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php } ?>      

</body>
</html>