<?php
// Ejemplo 1
    echo "Ejemplo 1<br>";
    
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
    echo "<br><br>Ejemplo 2<br>";

    $gente = array(
        array(
            'Familia' => 'Los Simpson',
            'Padre' => 'Homer',
            'Madre' => 'Marge',
            'Hijos' => array('Bart', 'Lisa', 'Maggie')
        ),
        array(
            'Familia' => 'Los Griffin',
            'Padre' => 'Peter',
            'Madre' => 'Lois',
            'Hijos' => array('Chris', 'Meg', 'Stewie')
        )
    );

    foreach($gente as $indice => $valor){
        echo"Familia " .($indice + 1) .":<br>"; 
        foreach($valor as $clave => $dato){
            if(is_array($dato)){
                echo "$clave" .": ";
                foreach ($dato as $hijo) { 
                    echo "$hijo ";
                }
                echo "<br>";
            } else {
                echo "$clave: $dato<br>";
            }
        }
        echo "<br>";
    };

?>