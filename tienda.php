<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Maceteros y Jardinería</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .custom-card {
            height: 650px; /* Aumentamos la altura */
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .custom-card img {
            width: 100%;
            height: 300px; /* Ajustamos la altura de la imagen */
            object-fit: cover; /* Aseguramos que la imagen cubra completamente el espacio */
        }

        .card-header-title { 
            text-align: center; 
            font-size: 1em; /* Hacemos la letra más pequeña */ 
            font-weight: bold;
        }

        .card-content {
            text-align: center;
            padding: 15px;
            overflow-y: auto; /* Añadimos scroll vertical si el contenido es muy largo */
        }

        .container {
            max-width: 1200px; /* Limitar el ancho del contenedor principal */
        }

        .row {
            justify-content: center; /* Centramos las tarjetas dentro de la fila */
        }
    </style>
</head>
<body>
    <?php
    include_once "encabezado.php";
    include_once "funciones.php";
    $productos = obtenerProductos();
    ?>

    <div class="container mt-4">
        <div id="carouselExampleSlidesOnly" class="carousel slide mb-4" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/banner.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/banner1.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/banner2.png" class="d-block w-100" alt="...">
                </div>
            </div>
        </div>
        <h2 class="is-size-2 text-center">Tienda</h2>
        <div class="row">
            <?php foreach ($productos as $producto) { ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 d-flex align-items-stretch">
                    <div class="card custom-card">
                        <header class="card-header">
                            <p class="card-header-title">
                                <?php echo $producto->nombre ?>
                            </p>
                        </header>
                        <div>
                            <!-- Aquí irá la imagen del producto -->
                            <img src="img/<?php echo $producto->nombre; ?>.png" alt="Imagen de <?php echo $producto->nombre; ?>">
                        </div>
                        <div class="card-content">
                            <div class="content">
                                <?php echo $producto->descripcion ?>
                            </div>
                            <h1 class="is-size-3">$<?php echo number_format($producto->precio, 2) ?></h1>
                            <?php if (productoYaEstaEnCarrito($producto->id)) { ?>
                                <form action="eliminar_del_carrito.php" method="post">
                                    <input type="hidden" name="id_producto" value="<?php echo $producto->id ?>">
                                    <span class="button is-success">
                                        <i class="fa fa-check"></i>&nbsp;En el carrito
                                    </span>
                                    <button class="button is-danger">
                                        <i class="fa fa-trash-o"></i>&nbsp;Quitar
                                    </button>
                                </form>
                            <?php } else { ?>
                                <form action="agregar_al_carrito.php" method="post">
                                    <input type="hidden" name="id_producto" value="<?php echo $producto->id ?>">
                                    <button class="button is-primary">
                                        <i class="fa fa-cart-plus"></i>&nbsp;Agregar al carrito
                                    </button>
                                </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
