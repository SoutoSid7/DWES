<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
</head>
<body>
    <h1>Agenda</h1>
    <?php
        session_start();
        echo "Hola " .$_SESSION["nombre"] ." cuantos contactos deseas grabar?";
        echo "<br>Puedes grabar entre 1 y 5. Por cada pulsacion en INCREMENTAR grabaras un usario mas. ";
        echo "<br>Cuando el número sea el deseado pulsa GRABAR<br><br>";

        $img[0] = './imagenes/OIP0.jfif'; 
        $img[1] = './imagenes/OIP1.jfif'; 
        $img[2] = './imagenes/OIP2.jfif'; 
        $img[3] = './imagenes/OIP3.jfif'; 
        $img[4] = './imagenes/OIP4.jfif'; 
        $i = rand(0,4);

        echo '<img src="' . $img[$i] . '" alt="Descripción de la imagen" width="100" height="100">';

        if(isset($_POST["incrementar"])){
            if($_SESSION["contador"] < 5){
                $_SESSION["contador"]++;
            }
        }

        for ($i = 0; $i < $_SESSION["contador"]; $i++){
            $indice = rand(0,4);
            echo '<img src="' . $img[$indice] . '" alt="Descripción de la imagen" width="100" height="100">';
        }

    ?>
    <br><br>
    <input type="submit" name="incrementar" value="INCREMENTAR">
    <input type="submit" name="grabar" value="GRABAR"> 
</body>
</html>