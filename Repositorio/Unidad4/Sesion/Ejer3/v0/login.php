<?php
    $hn = 'localhost';
    $db = 'bdsimon';
    $un = 'root';
    $pw = '';   

    // Conexion a Base De Datos MySQL
    require_once 'login.php';
    $conn = new mysqli($hn, $un, $pw, $db); //Orden: servidor, usuario, contraseña y base de datos
    if($conn->connect_error) die ("Fatal Error"); // Comprueba si se puede hacer la conexion
?>