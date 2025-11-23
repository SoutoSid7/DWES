<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
</head>
<body>
    <h1>AGENDA</h1>
    <?php
        session_start();
        echo "Hola " .$_SESSION["nombre"] ." cuantos contactos deseas grabar?";
        echo "<br>Puedes grabar entre 1 y 5. Por cada pulsacion en INCREMENTAR grabaras un usario mas. ";
        echo "<br>Cuando el número sea el deseado pulsa GRABAR";

        $img[0] = './imagenes/OIP0.jfif'; 
        $img[1] = './imagenes/OIP1.jfif'; 
        $img[2] = './imagenes/OIP2.jfif'; 
        $img[3] = './imagenes/OIP3.jfif'; 
        $img[4] = './imagenes/OIP4.jfif'; 

        $i = rand(0,4);

        echo "<br>$i";
    ?>
</body>
</html>