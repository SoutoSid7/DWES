<?php
    /*
        Determinar la cantidad de dinero que recibirá un trabajador por concepto de las
        horas extras trabajadas en una empresa, sabiendo que cuando las horas de
        trabajo exceden de 40, el resto se consideran horas extras y que estas se pagan al
        doble de una hora normal cuando no exceden de 8; si las horas extras exceden de
        8 se pagan las primeras 8 al doble de lo que se pagan las horas normales y el resto
        al triple.
    */
    
    $horas = 50;
    $precioHora = 10;

    if($horas <= 40){
        $cant = $horas * $precioHora;
        echo "La cantidad de dinero por " .$horas ." es de " .$cant;
    }

    if(($horas > 40) & ($horas <= 48)){
        $precioExtra = $horas - 40;
        $cant = (40 * $precioHora) + ($precioExtra * ($precioHora * 2));
        echo "La cantidad de dinero por " .$horas ." es de " .$cant;
    }

    if($horas > 48){
        $precioExtra = 8;
        $precioTriple = $horas - 48;
        $cant = (40 * $precioHora) + ($precioExtra * ($precioHora * 2)) + ($precioTriple * ($precioHora * 3));
        echo "La cantidad de dinero por " .$horas ." horas es de " .$cant;
    }
?>