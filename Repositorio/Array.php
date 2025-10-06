<?php
// Ejemplo 1
    echo "<br><br>Ejemplo 4<br>";
    
    $personas = array(
                $persona1 = array(
                    'Nombre' => "Yolanda",
                    'Apellido1' => "Iglesias",
                    'Apellido2' => "Suarez"
                ),
                $persona2 = array(
                    'Nombre' => "Funko",
                    'Apellido1' => "Bomba",
                    'Apellido2' => "Amago"
                )
    );

    foreach($personas as $indice => $valor) //$valor = valor de un array de una persona completa
    {
        echo"Persona " .($indice + 1) .":<br>";
        foreach($valor as $clave => $dato){ // $valor = persona1, $clave = 'Nombre', 'Apellido1'..., $dato = 'Yolanda', 'Iglesias'
            echo"$clave: $dato<br>";
        }
        echo "<br>";
    }

// Ejemplo 2


?>