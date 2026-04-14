<?php
    /*
        Implementa un array asociativo con los siguientes valores:
             Muestra los valores del array en una tabla, has de mostrar el índice y el valor
            asociado.
             Elimina el estadio asociado al Real Madrid.
             Vuelve a mostrar los valores para comprobar que el valor ha sido eliminado, esta
            vez en una lista numerada
    */  

    $estadios_futbol = [
        "barcelona" => "camp nou",
        "real madrid" => "santiago bernabeu",
        "valencia" => "mestalla",
        "real sociedad" => "anoeta"
    ];

    foreach($estadios_futbol as $i => $valor){ // Para cada estadio, dame su ciudad y su nombre
        echo "Ciudad: " .$i ." Estadio: " .$valor ."<br>";
    }

?>