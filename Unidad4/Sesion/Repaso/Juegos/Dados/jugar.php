<?php
    session_start();
    if (!isset($_POST['dados'])) {
        echo "Error: No se han recibido los datos del formulario.";
        exit;
    }else if ($_POST['dados']<1|| $_POST['dados']>5){
        echo "Error:Introduce un numero entre 1 y 5";   
    }

    $dados=$_POST['dados'];
    echo "resultado";
    for ($i=0;$i < $dados;$i++ ){
        $valor=rand(1,6); 
        echo "dado ".($i+1)." : $valor<br>";
    }
?>
<br><br>
<a href="formulario.php">Volver al formulario.</a>