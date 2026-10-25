<?php require_once 'pizzas.php'; ?>
<!DOCTYPE html>
<html lang="es">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menú - Pizzería</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head> 
    <body class="bg-light">
     <div class="container py-4">
    <h1 class="text-center mb-5 fw-bold">Nuestro Menú</h1>

    <?php foreach ($catalogo as $categoria): ?>
        <section class="mb-5">
            <h2 class="border-bottom border-danger border-3 pb-2 mb-4">
                <?= htmlspecialchars($categoria['titulo']) ?>
            </h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4 mb-4">
                <?php foreach ($categoria['productos'] as $producto): ?>
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            <img src="<?= htmlspecialchars($producto['imagen']) ?>"
                                 class="card-img-top"
                                 style="height: 160px; object-fit: cover;"
                                 alt="<?= htmlspecialchars($producto['nombre']) ?>">
                            <div class="card-body">
                                <h3 class="card-title h5"><?= htmlspecialchars($producto['nombre']) ?></h3>
                                <ul class="list-unstyled small text-muted mb-0">
                                    <?php foreach ($producto['ingredientes'] as $ingrediente): ?>
                                        <li>• <?= htmlspecialchars($ingrediente) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>  
            
        </section> 
       <?php endforeach; ?>
    </div> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
