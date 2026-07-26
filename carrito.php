<?php

session_start();

if (!isset($_SESSION["carrito"])) {
    $_SESSION["carrito"] = [];
}

$total = 0;
$totalProductos = 0;

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>Carrito de Compras | TechStore</title>

    <link rel="stylesheet" href="CSS/styles.css">

</head>

<body>

<div class="contenedor">

    <div class="encabezado-interno">

    <h1>🛒 TechStore Online</h1>

    <p>Tecnología al mejor precio para ti</p>

</div>

<div class="titulo-pagina">

    <h2>Carrito de Compras</h2>

    <p>Revise los productos seleccionados antes de finalizar su compra.</p>

</div>

<?php

if(count($_SESSION["carrito"]) > 0){

    foreach($_SESSION["carrito"] as $producto){

        $subtotal = $producto["precio"] * $producto["cantidad"];

        $total += $subtotal;

        $totalProductos += $producto["cantidad"];

?>

    <div class="producto-carrito">

        <img
            src="<?php echo htmlspecialchars($producto["imagen"]); ?>; ?>"
            alt="<?php echo htmlspecialchars($producto["nombre"]); ?>; ?>">

        <div class="detalle-producto">

            <h3><?php echo $producto["nombre"]; ?></h3>

            <p>

                Precio:
                <strong>

                    $<?php echo number_format($producto["precio"],0,",","."); ?>

                </strong>

            </p>

            <p>

                Cantidad:
                <strong>

                    <?php echo $producto["cantidad"]; ?>

                </strong>

            </p>

            <p>

                Subtotal:
                <strong>

                    $<?php echo number_format($subtotal,0,",","."); ?>

                </strong>

            </p>

        </div>

        <a
            href="eliminar.php?id_producto=<?php echo $producto["id_producto"]; ?>"
            class="boton-eliminar">

            ❌ Eliminar

        </a>

    </div>

<?php

    }

?>

<hr>

<div class="formulario">

    <h2 class="titulo-seccion">

        Resumen del Pedido

    </h2>

    <p>

        <strong>Total de productos:</strong>

        <?php echo $totalProductos; ?>

    </p>

    <p class="precio">

        Total a pagar:
        $<?php echo number_format($total,0,",","."); ?>

    </p>

    <div class="acciones">

        <a
            href="index.php#productos"
            class="boton-carrito">

            🛍 Seguir comprando

        </a>

<a
    href="pago.php"
    class="boton-finalizar">

    💳 Continuar al pago

</a>

    </div>

<?php

}else{

?>

    <div class="formulario">

        <h2 class="titulo-seccion">

            🛒 El carrito está vacío

        </h2>

        <p class="subtitulo">

            Aún no ha agregado productos al carrito de compras.

        </p>

        <div class="acciones">

            <a
                href="index.php#productos"
                class="boton-carrito">

                🛍 Ir a comprar

            </a>

        </div>

    </div>

<?php

}

?>

</div>

</body>

</html>