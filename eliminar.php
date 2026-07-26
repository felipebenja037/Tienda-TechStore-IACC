<?php

session_start();

if(isset($_GET["id_producto"])){

    $idProducto = (int)$_GET["id_producto"];

    if(isset($_SESSION["carrito"][$idProducto])){

        $_SESSION["carrito"][$idProducto]["cantidad"]--;

        if($_SESSION["carrito"][$idProducto]["cantidad"] <= 0){

            unset($_SESSION["carrito"][$idProducto]);

        }

    }

}

header("Location: carrito.php");

exit();

?>