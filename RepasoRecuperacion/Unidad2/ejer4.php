<?php
    $num1 = random_int(1,10);
    $num2 = random_int(1,10);

    if($num1 > $num2){
        echo "El numero " .$num1 ." es mayor que " .$num2 ."<br>";
        if($num1 % 2 == 0){
            echo "El numero " .$num1 ." es par";
        } else {
            echo "El numero " .$num1 ." es impar";
        }
    } else {
        echo "El numero " .$num2 ." es mayor que " .$num1 ."<br>";
        if($num2 % 2 == 0){
            echo "El numero " .$num2 ." es par";
        } else {
            echo "El numero " .$num2 ." es impar";
        }
    }
?>