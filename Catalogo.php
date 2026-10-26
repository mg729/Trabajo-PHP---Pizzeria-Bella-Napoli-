<?php require_once 'pizzas.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Catálogo - Bella Napoli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.2/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon">
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
                    <li class="nav-item"><a class="nav-link px-3 fw-bold" href="index.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link px-3 fw-bold" href="Catalogo.php">Catalogo</a></li>
                    <li class="nav-item"><a class="nav-link px-3 fw-bold" href="arma_pizza.php">Arma tu pizza</a></li>
                    <li class="nav-item"><a class="nav-link px-3 fw-bold" href="pedidos.php">Pedidos</a></li>
                    <li class="nav-item"><a class="nav-link px-3 fw-bold" href="">Sucursales y contacto</a></li>
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
    <footer class="bg-dark text-white pt-5 pb-3">
        <div class="container">
            <div class="row g-4">

                
                <div class="col-12 col-md-6 col-lg-3">
                    <h3 class="fw-bold fst-italic mb-3">Bella<span class="text-warning">Napoli</span></h3>
                    <p class="text-white-50 mb-0">
                        Autentica pizza italiana horneada con leña, usando los ingredientes mas frescos y la receta tradicional que cautiva los paladares en todo Honduras.
                    </p>
                </div>

              
                <div class="col-12 col-md-6 col-lg-3">
                    <h4 class="h6 text-uppercase fw-bold text-warning mb-3">Horarios de cocina</h4>
                    <ul class="list-unstyled text-white-50 mb-0">
                        <li class="mb-2"><i class="bi bi-clock me-2"></i>Lunes a Jueves: 11:00 a.m. - 9:00 p.m.</li>
                        <li class="mb-2"><i class="bi bi-clock me-2"></i>Viernes y Sábado: 11:00 a.m. - 11:00 p.m.</li>
                        <li><i class="bi bi-clock me-2"></i>Domingo: 12:00 p.m. - 8:00 p.m.</li>
                    </ul>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <h4 class="h6 text-uppercase fw-bold text-warning mb-3">Contacto</h4>
                    <ul class="list-unstyled text-white-50 mb-0">
                        <li class="mb-2"><i class="bi bi-geo-alt-fill me-2"></i>Blvd. Morazán, Tegucigalpa, Honduras</li>
                        <li class="mb-2"><i class="bi bi-telephone-fill me-2"></i>+504 2222-3333</li>
                        <li><i class="bi bi-envelope-fill me-2"></i>contacto@bellanapoli.hn</li>
                    </ul>
                </div>

          
                <div class="col-12 col-md-6 col-lg-3">
                    <h4 class="h6 text-uppercase fw-bold text-warning mb-3">Siguenos</h4>
                    <div class="d-flex gap-3 fs-3">
                        <a class="text-white" href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                        <a class="text-white" href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                        <a class="text-white" href="#" aria-label="TikTok"><i class="bi bi-tiktok"></i></a>
                        <a class="text-white" href="#" aria-label="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                    </div>
                </div>

            </div>

           
            <hr class="border-secondary my-4">
            <p class="text-center text-white-50 small mb-0">
                &copy; 2026 Pizzeria <i>Bella Napoli</i>. Todos los derechos reservados.
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>