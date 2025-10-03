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

?>