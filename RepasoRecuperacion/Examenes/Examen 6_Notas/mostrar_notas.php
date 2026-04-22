<?php
session_start();

if (!isset($_SESSION["rol"]) || $_SESSION["rol"] != "directora") {
    echo "Usted no es director, no puede ver las notas de los alumnos";
    exit;
}

// Datos conexión
$hn = 'localhost';
$db = 'BDNOTAS';
$un = 'root';
$pw = '';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$conn->set_charset("utf8");

// Consulta para mostrar las notas en formato matriz
$sql = "
    SELECT 
        a.id,
        a.nombre,
        a.apellidos,

        MAX(CASE WHEN n.asignatura = 'Fisica' THEN n.nota END) AS Fisica,
        MAX(CASE WHEN n.asignatura = 'Historia' THEN n.nota END) AS Historia,
        MAX(CASE WHEN n.asignatura = 'Ingles' THEN n.nota END) AS Ingles,
        MAX(CASE WHEN n.asignatura = 'Lengua' THEN n.nota END) AS Lengua,
        MAX(CASE WHEN n.asignatura = 'Matematicas' THEN n.nota END) AS Matematicas,
        MAX(CASE WHEN n.asignatura = 'Religion' THEN n.nota END) AS Religion
        /**
         * ¿Esta fila es de la asignatura Religión?
         *** Si la respuesta es sí → devuelve la nota
         *** Si es no → devuelve NULL
         * AS Religion Le pone nombre a la columna:
        */

    FROM alumnos a
    LEFT JOIN notas n ON a.id = n.alumno
    GROUP BY a.id, a.nombre, a.apellidos
    ORDER BY a.apellidos, a.nombre
";

$resultado = $conn->query($sql);

$data = [];
if ($resultado && $resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $data[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Notas</title>
</head>
<body>
    <div class="contenedor">
        <h1>Notas de los alumnos</h1>
        <table>
            <tr>
                <th>Alumno</th>
                <th>Fisica</th>
                <th>Historia</th>
                <th>Ingles</th>
                <th>Lengua</th>
                <th>Matematicas</th>
                <th>Religion</th>
            </tr>

            <?php foreach ($data as $row): ?>
                <tr>
                    <td><?php htmlspecialchars($row['apellidos'] . ", " . $row['nombre']) ?></td>
                    <td><?php ($row['Fisica'] !== null) ? $row['Fisica'] : '-' ?></td>
                    <td><?php ($row['Historia'] !== null) ? $row['Historia'] : '-' ?></td>
                    <td><?php ($row['Ingles'] !== null) ? $row['Ingles'] : '-' ?></td>
                    <td><?php ($row['Lengua'] !== null) ? $row['Lengua'] : '-' ?></td>
                    <td><?php ($row['Matematicas'] !== null) ? $row['Matematicas'] : '-' ?></td>
                    <td><?php ($row['Religion'] !== null) ? $row['Religion'] : '-' ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <a class="volver" href="index.php">Volver</a>
    </div>
</body>
</html>