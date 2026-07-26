<?php
session_start();

if (!isset($_SESSION["carrito"]) || count($_SESSION["carrito"]) == 0) {
    header("Location: carrito.php");
    exit;
}

$total = 0;

foreach ($_SESSION["carrito"] as $producto) {
    $total += $producto["precio"] * $producto["cantidad"];
}
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>Pago | TechStore Online</title>

    <link rel="stylesheet" href="CSS/styles.css">

</head>

<body>

<div class="contenedor">

<div class="encabezado-interno">

    <h1>🛒 TechStore Online</h1>

    <p>Tecnología al mejor precio para ti</p>

</div>

<div class="titulo-pagina">

    <h2>Pago Seguro</h2>

    <p>Complete los siguientes datos para finalizar su compra.</p>

</div>

    <form action="finalizarCompra.php" method="POST" id="formPago">

        <h2 class="titulo-seccion">Datos del Cliente</h2>

        <input type="text" name="nombre" placeholder="Nombre completo" required>

        <input type="email" name="correo" placeholder="Correo electrónico" required>

        <input type="text" name="telefono" placeholder="Teléfono" required>

        <h2 class="titulo-seccion">Dirección de Envío</h2>

        <input type="text" name="region" placeholder="Región" required>

        <input type="text" name="comuna" placeholder="Comuna" required>

        <input type="text" name="direccion" placeholder="Dirección" required>

        <input type="text" name="numero" placeholder="Número" required>

        <input type="text" name="departamento" placeholder="Departamento (Opcional)">

        <textarea
            name="observacion"
            placeholder="Observaciones para la entrega"
            rows="4"></textarea>

        <h2 class="titulo-seccion">Método de Pago</h2>

        <label>
            <input type="radio" name="metodo" value="credito" checked>
            Tarjeta de Crédito
        </label>

        <label>
            <input type="radio" name="metodo" value="debito">
            Tarjeta de Débito
        </label>

        <input
            type="text"
            id="tarjeta"
            placeholder="Número de tarjeta"
            maxlength="19"
            required>

        <input
            type="text"
            placeholder="Nombre del titular"
            required>

        <div class="fila">

            <input
                type="text"
                id="fecha"
                placeholder="MM/AA"
                maxlength="5"
                required>

            <input
                type="password"
                id="cvv"
                placeholder="CVV"
                maxlength="4"
                required>

        </div>

        <div class="formulario">

            <h2 class="titulo-seccion">Resumen del Pedido</h2>

            <p class="precio">

                Total a pagar

                <br><br>

                <strong>

                    $<?php echo number_format($total,0,",","."); ?>

                </strong>

            </p>

        </div>

        <div class="acciones">

            <a href="carrito.php" class="boton-carrito">

                ← Volver al carrito

            </a>

            <button
                type="submit"
                class="boton-finalizar">

                💳 Pagar ahora

            </button>

        </div>

    </form>

</div>

<script>

const formulario=document.getElementById("formPago");

formulario.addEventListener("submit",function(e){

    const tarjeta=document.getElementById("tarjeta").value.replace(/\s/g,'');

    const fecha=document.getElementById("fecha").value;

    const cvv=document.getElementById("cvv").value;

    if(tarjeta==""){

    alert("Ingrese el número de la tarjeta.");

    e.preventDefault();

    return;

}

if(fecha==""){

    alert("Ingrese la fecha de vencimiento.");

    e.preventDefault();

    return;

}

if(cvv==""){

    alert("Ingrese el CVV.");

    e.preventDefault();

    return;

}

    if(!/^\d{2}\/\d{2}$/.test(fecha)){

        alert("Ingrese la fecha en formato MM/AA.");

        e.preventDefault();

        return;

    }

    if(cvv.length<3){

        alert("Ingrese un CVV válido.");

        e.preventDefault();

        return;

    }

});

</script>

</body>
</html>