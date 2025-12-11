<?php
session_start();
?>

<html>
<body>
    <h1>Juego de los dados</h1>
    <form action="jugar.php" method="post">
        <label for="numero de dados">Cuantos dados quieres lanzar?:</label><br>
        <input type="number" name="dados"><br><br>

        <input type="submit" name="submit" value="Lanzar">
    </form>
</body>