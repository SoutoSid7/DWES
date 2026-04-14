<?php
    /*
        Construir una calculadora, se ha de resolver con dos script, el primero muestra el
        formulario y el segundo el resultado. Al pulsar el botón ENVIAR se mostrará la suma
        de los valores introducidos en las cajas de texto.
    */

    // isset comprueba si las variables existen y no son nulas
    if(isset($_POST["num1"]) && isset($_POST["num2"])){
        // guarda los valores enviados en variables 
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        
        $suma = $num1 + $num2;

        echo "La suma de $num1 + $num2 = $suma";
    } else { // si las variables no existen, es decir si no se ejecuto 
        echo <<<_END
        <form action="ejer1.php" method="post">   
            <label for="num1">Numero 1</label>
            <input type="num" id="num1" name="num1" placeholder="Ingresa el Numero 1:" required>

            <label for="num2">Numero 2</label>
            <input type="num" id="num2" name="num2" placeholder="Ingresa el Numero 2: " required>

            <button type="submit">Enviar</button>
        </form>
    _END;
    }
?>