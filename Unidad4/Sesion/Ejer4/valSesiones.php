<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validacion de Formularios</title>
</head>
<body>
    <h1>Validacion de Formularios</h1>
    <form action="valSesiones.php">
        <label for="nombre">Nombre: </label>
        <input type="text" id="nombre" name="nombre">

        <br><br>
        <label for="email">E-mail: </label>
        <input type="text" id="email" name="email">

        <br><br>
        <label for="email">Web Site: </label>
        <input type="text" id="website" name="website">

        <br><br>
        <label for="comentario">Comentario: </label>
        <textarea id="comentario" name="comentario" rows="4" cols="50" placeholder="Escribe tu comentario aquí..." ></textarea>
    
        <br><br>
        <label for="genero">Genero: </label>
        <input type="radio" id="masculino" name="genero" value="Masculino">Masculino
        <input type="radio" id="femenino" name="genero" value="Femenino">Femenino

        <br><br>
        <input type="submit" value="Enviar">
    </form>

    <h2>Tu información</h2>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            $nombre = $_GET["nombre"] ? $_GET["nombre"] : '';
            $email = $_GET["email"];
            $comentario = $_GET["comentario"];
            $genero = isset($_GET["genero"]) ? $_GET["genero"] : '';

            echo "<strong>Nombre: </strong>" .$nombre;
            echo "<strong><br>E-mail: </strong>" .$email;
            echo "<strong><br>Comentario: </strong>" .$comentario;
            echo "<strong><br>Genero: </strong>" .$genero;
        }
    ?>  
</body>
</html>