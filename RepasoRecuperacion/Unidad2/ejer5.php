<?php
    /*  
        Crear un programa partir de 3 valores, a b y c que corresponden a los tres
        coeficientes de una ecuación de segundo grado muestre las soluciones de la
        misma La solución de la ecuación de segundo grado depende del signo de b2-4ac:
            {} si b2-4ac es negativo no hay soluciones
            {} si es nulo, hay sólo una solución -b/2a
            {} si es positivo, hay dos soluciones: (-b+sqrt(b2-4ac))/(2a) y (-b-sqrt(b2-4ac))/(2a)
    */  

    $a = 1; // 1
    $b = 4; // 4
    $c = -5; //-5

    $termino = ($b ** 2) - (4*$a*$c);
    
    if($termino < 0){
        echo "La ecuacion con: <br>
            a = " .$a
            ."<br>b = " .$b
            ."<br> c = " .$c
            ."<br> No tiene soluciones";
    }

    if($termino == 0){
        $soluc = (-$b) / (2*$a);
        echo "La ecuacion con: <br>
        a = " .$a
        ."<br>b = " .$b
        ."<br> c = " .$c
        ."<br> Es nula, su solucion es: " .$soluc;
    }

    if($termino > 0){
        $soluc1 = (-$b+sqrt($b**2 - 4*$a*$c)) / (2*$a);
        $soluc2 = (-$b-sqrt($b**2 - 4*$a*$c)) / (2*$a);

        echo "La ecuacion con: <br>
        a = " .$a
        ."<br>b = " .$b
        ."<br> c = " .$c
        ."<br> Tiene 2 soluciones:  x= " .$soluc1 ." y= " .$soluc2;
    }
?>