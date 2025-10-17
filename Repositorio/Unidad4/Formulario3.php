<!--Formulario Dinamico-->
<!--
    '' no interpreta variables
    "" si interpreta variables
-->
<html>
    <form action="Formulario3.php" method ="post">
        <?php
            // isset comprueba si las variables existen y no son nulas
            if(isset($_POST['num'])){
                $numeros = $_POST['num'];
                foreach($numeros as $index => $valor){
                    echo "Numero ".($index+1) . ": " .$valor ."<br>";
                }
            } else {
                for($i = 1; $i <=10; $i++){
                    echo '<label for="num' . $i . '">Número ' . $i . ':</label>';
                    echo '<input type="number" id="num' . $i . '" name="num[]" placeholder="Ingresa el Número :" required><br>';
                                                                //name="num[]" array de valores que se almacenan en $_POST['num']
                }
            }
        ?>
        <input type="submit" value="Enviar">
    </form>
</html>