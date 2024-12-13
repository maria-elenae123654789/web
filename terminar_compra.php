<?php
include_once "funciones.php";
$productos = obtenerProductosEnCarrito();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista del Pedido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-4">Lista del Pedido</h2>
        <ul class="list-group mb-4">
            <?php foreach ($productos as $producto) { ?>
                <li class="list-group-item">
                    <?php echo $producto->nombre; ?> - $<?php echo number_format($producto->precio, 2); ?>
                </li>
            <?php } ?>
        </ul>
        <div class="d-flex justify-content-between">
            <a href="vaciar_carrito.php" class="btn btn-secondary">Volver</a>
            <a href="https://wa.me/51982778567?text=¡Hola!%20Estoy%20interesado%20en%20completar%20mi%20compra.%20¿%20Cuál%20es%20el%20siguiente%20paso%20?%20🌿🛒" target="_blank" class="btn btn-primary">Continuar con la compra</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
