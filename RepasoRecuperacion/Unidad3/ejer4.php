<?php
    /*
        Crea un array con los siguientes valores: 5->1, 12->2, 13->56, x->42. Muestra el
        contenido. Cuenta el número de elementos que tiene y muéstralo por pantalla. 
    */

    $array = [
        5 => 1,
        12 => 2,
        13 => 56,
        "x" => 42
    ];

    print_r($array);
    echo "<br>";
    echo "Numero de elementos del array " .count($array);

?>