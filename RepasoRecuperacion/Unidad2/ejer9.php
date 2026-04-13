<?php
    /*
        Hacer un programa que genere un numero aleatorio y compruebe si es primo.
        Un número primo es un número entero que sólo es
        divisible por 1 y por sí mismo 
    */

    $num = rand(1, 1000);
    $primo=true;  
    for($i=2; $i<=$num/2; $i++){
        if($num % $i == 0){
            $primo=false;
            break;
        }
    }
    if($primo==true){
        echo"$num es primo";
    } else{
        echo "$num NO es primo";
    }
?>