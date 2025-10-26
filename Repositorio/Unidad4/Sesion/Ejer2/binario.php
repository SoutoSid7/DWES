<?php
    session_start();
    $_SESSION["num"] = $_POST["num"] ;
    echo "El numero introducido fue: " .$_SESSION["num"] ."<br>";

    // Recupera el binario desde la sesion
    $binario = $_SESSION["binario"];
    $binarioN = implode("", $binario);

    $decimal = bindec($binarioN); // convierte el binario a decimal 

    if($_SESSION["num"] == $decimal){
        echo "Correcto";
    } else{
        echo "Incorrecto";
    }

?>