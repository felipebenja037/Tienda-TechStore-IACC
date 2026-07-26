<?php

session_start();

$nombre       = $_POST["nombre"] ?? "";
$correo       = $_POST["correo"] ?? "";
$telefono     = $_POST["telefono"] ?? "";
$region       = $_POST["region"] ?? "";
$comuna       = $_POST["comuna"] ?? "";
$direccion    = $_POST["direccion"] ?? "";
$numero       = $_POST["numero"] ?? "";
$departamento = $_POST["departamento"] ?? "";
$observacion  = $_POST["observacion"] ?? "";

$_SESSION["carrito"] = [];

?>

<!DOCTYPE html>

<html lang="es">

<head>

<meta charset="UTF-8">

<link rel="stylesheet" href="CSS/styles.css">

<title>Compra Finalizada</title>

</head>

<body>

<div class="encabezado-interno">

    <h1>🛒 TechStore Online</h1>

    <p>Tecnología al mejor precio para ti</p>

</div>

<div class="mensaje">

 <h1>✅ Compra confirmada</h1>

 <h3>Estado del pedido</h3>

<p>
    🟢 Pedido registrado correctamente.
</p>

<p>
    Su pedido será preparado para su despacho y posteriormente enviado a la dirección registrada.
</p>

<p>

Gracias por comprar en

<strong>TechStore Online</strong>

</p>

<p>

Su pago fue procesado correctamente.

</p>

<hr>

<h3>Datos del Cliente</h3>

<p>

<strong>Nombre:</strong>

<?php echo htmlspecialchars($nombre); ?>

</p>

<p>

<strong>Correo:</strong>

<?php echo htmlspecialchars($correo); ?>

</p>

<p>

<strong>Teléfono:</strong>

<?php echo htmlspecialchars($telefono); ?>

</p>

<hr>

<h3>Dirección de Envío</h3>

<p>

<?php

echo htmlspecialchars($direccion)." Nº ".htmlspecialchars($numero);

if($departamento!=""){

    echo " Depto. ".htmlspecialchars($departamento);

}

?>

</p>

<p>

<?php

echo htmlspecialchars($comuna).", ".htmlspecialchars($region);

?>

</p>

<?php if($observacion!=""){ ?>

<p>

<strong>Observaciones:</strong>

<?php echo htmlspecialchars($observacion); ?>

</p>

<?php } ?>

<hr>

<p>

📅 <strong>Fecha:</strong>

<?php echo date("d/m/Y"); ?>

</p>

<p>

🧾 <strong>Estado:</strong>

Pago aprobado

</p>

<br>

<a href="index.php" class="boton-carrito">

🛍 Seguir comprando

</a>

</div>

</body>

</html>