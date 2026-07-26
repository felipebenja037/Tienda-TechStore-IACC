<?php

session_start();

require_once "productos/productos.php";

if (!isset($_SESSION["carrito"])) {
    $_SESSION["carrito"] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $idProducto = (int) $_POST["id_producto"];

    if (isset($productos[$idProducto])) {

        $producto = $productos[$idProducto];

        $id = $producto["id_producto"];

        if (isset($_SESSION["carrito"][$id])) {

            $_SESSION["carrito"][$id]["cantidad"]++;

        } else {

            $_SESSION["carrito"][$id] = [
                "id_producto" => $producto["id_producto"],
                "nombre"      => $producto["nombre"],
                "descripcion" => $producto["descripcion"],
                "precio"      => $producto["precio"],
                "imagen"      => $producto["imagen"],
                "cantidad"    => 1
            ];

        }
    }
}

header("Location: index.php#productos");
exit();