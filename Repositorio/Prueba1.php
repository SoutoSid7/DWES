<?php
// Ejemplo 1
    echo "Ejemplo 1<br>";
    $paper[] = "Copier";
    $paper[] = "Inkjet";
    $paper[] = "Laser";
    $paper[] = "Photo";
    
    print_r($paper); 
    echo "<br>";
    var_dump($paper);

    $longuitud = count($paper);
    echo "<br>$longuitud";

// Ejemplo 2
    echo "<br><br>Ejemplo 2<br>";
    $paper['copier'] = "Copier & Multipurpose";
    $paper['inkjet'] = "Inkjet Printer";
    $paper['laser'] = "Laser Printer";
    $paper['photo'] = "Photographic Paper";

    echo $paper['inkjet'];
    echo "<br>";
    var_dump ($paper['photo']);

// Ejemplo 3
    echo "<br><br>Ejemplo 3<br>";
    $paper = array("Copier", "Inkjet", "Laser", "Photo");
    foreach($paper as $indice => $valor)
    {
        echo "$indice: $valor<br>";
    }

// Ejemplo 4
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

    
    foreach($personas as $indice => $valor)
    {
        echo"Persona " .($indice + 1) .":<br>";
        foreach($valor as $clave => $dato){
            echo"$clave: $dato<br>";
        }
        echo "<br>";
    }
                
?>