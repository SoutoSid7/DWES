<?php
    echo "Datos de la Reserva<br>";
    echo "Nombre: " .htmlspecialchars($_POST["nombre"]);
    echo "<br>Apellidos: " .htmlspecialchars($_POST["apellidos"]);
    echo "<br>Correo Electronico: " .htmlspecialchars($_POST["email"]);
    echo "<br>Telefono: " .htmlspecialchars($_POST["telefono"]);

?>