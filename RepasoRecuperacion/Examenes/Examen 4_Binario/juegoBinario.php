<?php
session_start();
$binario = [];
for($i=0; $i<=3; $i++){
    $num = rand(0,1);
    $binario[$i] = $num;
}
$_SESSION["binario"] = $binario;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Binario</title>
</head>
<body>
<h1>Adivina El Numero En Decimal</h1>
<h3>El Numero Binario: <?php echo implode("", $binario);?> <!-- .implode devuelve los 4 numeros del array como un string -->
</h3>
<form method="post">
    <label for="adivina">Adivina el número en decimal:</label>
    <input type="text" id="adivina" name="adivina" required>
    <button type="submit">Verificar</button>
</form>
<?php
if(isset($_POST["adivina"])){
    $adivina = $_POST["adivina"];
    $numero_binario = implode("", $binario);
    $numero_decimal = bindec($numero_binario);

    if($numero_decimal == $adivina){
        echo "<p>¡¡Felicidades!! Adivinaste el número en decimal correctamente.</p>";
    } else {
        echo "<p>No adivinaste. El número binario era " . $numero_binario . " y el número decimal era " . $numero_decimal . ".</p>";
    }
}
?>
</body>
</html>