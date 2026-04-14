<?php
    /*
        Implementa un array asociativo con los siguientes valores:
             Muestra los valores del array en una tabla, has de mostrar el índice y el valor
            asociado.
    */  

    $estadios_futbol = [
        "barcelona" => "camp nou",
        "real madrid" => "santiago bernabeu",
        "valencia" => "mestalla",
        "real sociedad" => "anoeta"
    ];

    foreach($estadios_futbol as $i => $valor){ // El array estadios_futbol, guarda en la variable $i la ciudad y en la varaible $valor el estadio
        echo "Ciudad: " .$i ." Estadio: " .$valor ."<br>";
    }

?>