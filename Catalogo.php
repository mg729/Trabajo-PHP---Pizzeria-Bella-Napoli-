<?php require_once 'pizzas.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Catálogo - Bella Napoli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!--Navbar-->
    <nav class="navbar navbar-expand-lg sticky-top bg-danger">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center fw-bold fs-4" href="index.php">
                <span><i>Bella Napoli</i></span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#menuNavegacion" aria-controls="menuNavegacion" aria-expanded="false"
                aria-label="Abrir navegación">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menuNavegacion">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li><a class="nav-link px-3" href="index.php">Inicio</a></li>
                    <li><a class="nav-link px-3" href="Catalogo.php">Catalogo</a></li>
                    <li><a class="nav-link px-3" href="#">Arma tu pizza</a></li>
                    <li><a class="nav-link px-3" href="#">Pedidos</a></li>
                    <li><a class="nav-link px-3" href="#">Sucursales y contacto</a></li>
                </ul>
            </div>
        </div>
    </nav>

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
                <div class="table-responsive">
                <?php if ($categoria['tipo'] === 'pizza'): ?>
                    <table class="table table-bordered table-hover align-middle text-center bg-white">
                        <thead class="table-danger">
                            <tr>
                                <th>Pizza</th>
                                <?php foreach ($tamanos as $clave => $etiqueta): ?>
                                    <th><?= htmlspecialchars($etiqueta) ?></th>
                                <?php endforeach; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($categoria['productos'] as $producto): ?>
                                <tr>
                                    <td class="text-start fw-semibold"><?= htmlspecialchars($producto['nombre']) ?></td>
                                    <?php foreach ($tamanos as $clave => $etiqueta): ?>
                                        <td>L<?= number_format($producto['precios'][$clave], 2) ?></td>
                                    <?php endforeach; ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <table class="table table-bordered table-hover align-middle text-center bg-white w-auto mx-auto">
                        <thead class="table-danger">
                            <tr><th>Producto</th><th>Precio</th></tr>
                        </thead>
                        <tbody>
                            <?php foreach ($categoria['productos'] as $producto): ?>
                                <tr>
                                    <td class="text-start fw-semibold"><?= htmlspecialchars($producto['nombre']) ?></td>
                                    <td>L<?= number_format($producto['precio'], 2) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
            </section>
        <?php endforeach; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>