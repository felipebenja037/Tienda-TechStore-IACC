<?php

session_start();

require_once "productos/productos.php";

if(!isset($_SESSION["carrito"])){

    $_SESSION["carrito"] = [];

}

?>

<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>TechStore Online</title>

    <link rel="stylesheet" href="CSS/styles.css">

</head>

<body>

<div class="contenedor">

<!--==================================
ENCABEZADO
===================================-->

<header class="encabezado">

    <div class="encabezado-contenido">

        <a href="carrito.php" class="boton-carrito">

            🛒 Carrito
            (<?php echo array_sum(array_column($_SESSION["carrito"],"cantidad")); ?>)

        </a>

    </div>

</header>

<!--==================================
CATÁLOGO DE PRODUCTOS
===================================-->

<section class="catalogo">

    <h2
        class="titulo-seccion"
        id="productos">

        🛍 Productos Destacados

    </h2>

    <p class="subtitulo">

        Descubre nuestra selección de productos tecnológicos.

    </p>

<div class="productos">

<?php

foreach ($productos as $producto) {

?>

    <div class="producto">

        <img
            src="<?php echo $producto["imagen"]; ?>"
            alt="<?php echo $producto["nombre"]; ?>">

        <h3>

            <?php echo $producto["nombre"]; ?>

        </h3>

        <p>

            <?php echo $producto["descripcion"]; ?>

        </p>

        <p class="precio">

            $<?php echo number_format($producto["precio"],0,",","."); ?>

        </p>

        <form
            action="agregar.php"
            method="POST">

        <input
        type="hidden"
        name="id_producto"
        value="<?php echo $producto["id_producto"]; ?>">

            <button
                type="submit">

                🛒 Agregar al carrito

            </button>

        </form>

    </div>

<?php

}

?>

</div>

<footer class="footer">

    <p>

        © 2026 TechStore Online | Trabajo semana 8 IACC.

    </p>

</footer>

</body>

</html>