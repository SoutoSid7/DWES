<?php
    /*
        Hacer un algoritmo que llene una matriz de 10x10 con valores aleatorios y
        determine la posición [fila, columna] del número mayor almacenado en la matriz.
    */

    $matriz = [];
    $mayor = 0;
    $filaMayor = 0;
    $columnaMayor = 0;

    for($i=0; $i<10; $i++){
        for($j=0; $j<10; $j++){
            $matriz[$i][$j] = mt_rand(1,100);

            if($matriz[$i][$j] > $mayor){
                $mayor = $matriz[$i][$j];
                $filaMayor = $i;
                $columnaMayor = $j;
            }
        }
    }

    echo "Numero mayor " .$mayor ."<br>";
    echo "Posicion: [" .$filaMayor .", " .$columnaMayor ."]";

?>