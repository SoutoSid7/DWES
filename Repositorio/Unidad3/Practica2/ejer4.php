<?php
    $matriz = [];
    for($i = 0; $i <4; $i++){
        for($j = 0; $j <4; $j++){
            $matriz[$i][$j] = rand(1,100);
        }
    }

    echo "Matriz 4x4<br>";
    for($i = 0; $i <4; $i++){
        for($j = 0; $j <4; $j++){
          //echo str_pad($matriz[$i][$j], 4, " ", STR_PAD_LEFT);
            echo $matriz[$i][$j] ."\n";
        }
        echo "<br>";
    }
?>