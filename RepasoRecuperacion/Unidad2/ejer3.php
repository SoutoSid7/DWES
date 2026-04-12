<?php 
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