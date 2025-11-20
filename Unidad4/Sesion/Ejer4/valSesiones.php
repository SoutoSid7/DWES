<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validacion de Formularios</title>
</head>
<body>
    <h1>Validacion de Formularios</h1>
    <form action="valSesiones.php" method="post">
        <label for="nombre">Nombre: </label>
        <input type="text" id="nombre" name="nombre" required pattern="[A-za-z\s]+" title="Solo se admiten letras">

        <br><br>
        <label for="passwd">Contraseña: </label>
        <input type="password" id="passwd" name="passwd">

        <br><br>
        <label for="email">E-mail: </label>
        <input type="text" id="email" name="email">

        <br><br>
        <label for="website">Web Site: </label>
        <input type="text" id="website" name="website">

        <br><br>
        <label for="comentario">Comentario: </label>
        <textarea id="comentario" name="comentario" rows="4" cols="50" placeholder="Escribe tu comentario aquí..." ></textarea>
    
        <br><br>
        <label for="genero">Genero: </label>
        <input type="radio" id="masculino" name="genero" value="Masculino">Masculino
        <input type="radio" id="femenino" name="genero" value="Femenino">Femenino

        <br><br>
        <input type="submit" name="boton" value="Enviar">
    </form>

    <?php
        if(isset($_POST["boton"])){   // Hasta que no se envia no aparecen los datos
            echo "<h2>Tu información</h2>";
            $nombre = $_POST["nombre"] ? $_POST["nombre"] : '';
            $email = $_POST["email"];
            $website = $_POST["website"];
            $comentario = $_POST["comentario"];
            $genero = isset($_POST ["genero"]) ? $_POST ["genero"] : '';

            echo "<strong>Nombre: </strong>" .$nombre;
            echo "<strong><br>E-mail: </strong>" .$email;
            echo "<strong><br>Web Site: </strong>" .$website;
            echo "<strong><br>Comentario: </strong>" .$comentario;
            echo "<strong><br>Genero: </strong>" .$genero;

            include_once 'funcion_validarEmail.php';
            include_once 'funcion_validarUrl.php';
            if(!validar_email($email)){
                echo "<br>Email no valido";
            }
            if(!validar_url($website)){
                echo "<br>URL no valida";
            }
        }

        // Guardar en BBDD
        // Datos de conexión
        $hn = 'localhost';
        $db = 'bdusuario';
        $un = 'root';
        $pw = '';

        $conn = new mysqli($hn, $un, $pw, $db);
        if ($conn->connect_error) die("Error de conexión: " . $conn->connect_error);



    ?>  
</body>
</html>