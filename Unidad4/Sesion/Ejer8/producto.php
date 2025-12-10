<?php
    session_start();
    $nombre = $_SESSION["nombre"];

    $productos = [] 

    if(isset($_POST["btnMonitor"])){
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto</title>
</head>
<body>
    <h3>Bienvenido, <?php echo $nombre; ?> </h3>
    <table border="1">
        <tr>
            <th>Producto</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th></th>
        </tr>

        <tr>
            <td>Monitor</td>
            <td>22 pulgadas</td>
            <td>210€</td>
            <td>
                <form action="producto.php" method="POST">
                    <input type="hidden" name="producto" value="monitor">
                    <button type="submit" name="btnMonitor">Añadir al carrito</button>
                </form>
            </td>
        </tr>

        <tr>
            <td>Movil</td>
            <td>4g</td>
            <td>300€</td>
            <td>
                <form action="producto.php" method="POST">
                    <input type="hidden" name="producto" value="movil">
                    <button type="submit" name="btnMovil">Añadir al carrito</button>
                </form>
            </td>
        </tr>

        <tr>
            <td>Mp4</td>
            <td>20gb</td>
            <td>13€</td>
            <td>
                <form action="producto.php" method="POST">
                    <input type="hidden" name="producto" value="mp4">
                    <button type="submit" name="btnMp4">Añadir al carrito</button>
                </form>
            </td>
        </tr>

        <tr>
            <td>Raton</td>
            <td>6000 dpi</td>
            <td>20€</td>
            <td>
                <form action="producto.php" method="POST">
                    <input type="hidden" name="producto" value="raton">
                    <button type="submit" name="btnRaton">Añadir al carrito</button>
                </form>
            </td>
        </tr>

        <tr>
            <td>Alfombrilla</td>
            <td>Negra</td>
            <td>30€</td>
            <td>
                <form action="producto.php" method="POST">
                    <input type="hidden" name="producto" value="alfombrilla">
                    <button type="submit" name="btnAlfombrilla">Añadir al carrito</button>
                </form>
            </td>
        </tr>

        <tr>
            <td>Usb</td>
            <td>2gb</td>
            <td>5€</td>
            <td>
                <form action="producto.php" method="POST">
                    <input type="hidden" name="producto" value="usb">
                    <button type="submit" name="btnUsb">Añadir al carrito</button>
                </form>
            </td>
        </tr>
    </table>

    <h3>Carrito</h3>
</body>
</html>
