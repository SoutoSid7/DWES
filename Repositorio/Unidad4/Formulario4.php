<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario 4</title>
</head>
<body>
<!--HTML-->
    <form action = "Formulario4.php" method = "post">
        <!--Nombre-->
            <label for="nombre">Nombre:</label>
            <input type ="text" name="nombre"><br>
        <!--Apellidos-->
            <label for="apellidos">Apelldios:</label>
            <input type ="text" name="apellidos"><br>
        <!--Edad-->
            <label for="edad">Edad:</label>
            <input type ="number" name="edad" id="edad" min="0" max="110"><br>
        <!--Profesion-->
            <label for="profesion">Profesion:</label>
            <select name="profesion" id="profesion">
                <option value="" selected disabled>--Seleccione una Opcion--</option>
                <option value="informatico">Informatico</option>
                <option value="medico">Medico</option>
                <option value="policia">Policia</option>
                <option value="bombero">Bombero</option>
                <option value="mecanico">Mecanico</option>
            </select><br>
        <!--Sexo-->
            <label for="sexo">Sexo:</label>
            <input type ="radio" name="hombre" >Hombre
            <input type="radio" name="mujer">Mujer<br>
    <!--Navegador Usado-->
            <label for="navegador">Navegador Usado:</label>
            <input type="checkbox" name="chrome" value="1">Chrome
            <input type="checkbox" name="safari" value="1">Safari
            <input type="checkbox" name="opera" value="1">Opera<br>
    <!--Enviar-->
        <input type="submit" value="Enviar">
    </form>

<!--PHP-->
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            echo "<h2>Datos Introducidos: </h2>";
            echo "Nombre: " .$_POST["nombre"] ."<br>";
            echo "Apellidos: " .$_POST["apellidos"] ."<br>";
            echo "Edad: " .$_POST["edad"] ."<br>";
            echo "Profesion: " .$_POST["profesion"] ."<br>";
            echo "Sexo: " .$_POST["sexo"] ."<br>";
            echo "Navegador Usado: " .$_POST["navegador"] ."<br>";
        }
    ?>

</body>
</html>