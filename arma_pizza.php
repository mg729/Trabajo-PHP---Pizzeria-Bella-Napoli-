<?php
$masas = [
    "Tradicional italiana"    => 0,
    "Delgada / Crocante"      => 0,
    "Orilla rellena de queso" => 30
];

$masa = "";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arma tu Pizza</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.2/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon">
</head>
<body>
    <nav class="navbar navbar-expand-lg sticky-top bg-danger">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center fw-bold fs-4" href="index.php">
                <span class="text-white"><i>Bella<span class="text-warning">Napoli</span></i></span>
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
                    <li class="nav-item"><a class="nav-link px-3 fw-bold" href="">Pedidos</a></li>
                    <li class="nav-item"><a class="nav-link px-3 fw-bold" href="">Sucursales y contacto</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="my-5">
        <div class="container text-center">
            <span class="badge bg-danger fs-6 mb-3">Personaliza tu pedido</span>
            <h1 class="display-4 fw-bold">Arma tu <span class="text-warning">Pizza</span></h1>
            <p class="lead">Elige tu masa, tu salsa, tu queso y los ingredientes que más te gusten.</p>
        </div>
    </header>
    <section class="bg-light py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8">
                    <form method="POST" action="armar_pizza.php">
                        <div class="card shadow-sm border-0 mb-4">
                            <div class="card-header bg-white fw-bold py-3">
                                <i class="bi bi-1-circle-fill text-danger me-2"></i>Elige tu masa
                            </div>
                            <div class="card-body">
                                <div class="list-group">
                                    <?php foreach ($masas as $nombre => $recargo) { ?>
                                        <label class="list-group-item d-flex justify-content-between align-items-center">
                                            <span>
                                                <input class="form-check-input me-2" type="radio" name="masa"
                                                    value="<?= $nombre ?>" <?= ($masa == $nombre) ? "checked" : "" ?>>
                                                <?= $nombre ?>
                                            </span>
                                            <?php if ($recargo > 0) { ?>
                                                <span class="badge bg-warning text-dark">+ L. <?= number_format($recargo, 2) ?></span>
                                            <?php } ?>
                                        </label>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="card shadow-sm border-0 sticky-lg-top" style="top: 90px;">
                        <div class="card-header bg-danger text-white fw-bold py-3">
                            <i class="bi bi-receipt me-2"></i>Tu pizza
                        </div>
                        <div class="card-body">
                            <p class="text-muted mb-0">Aquí aparecerá el resumen de tu pizza.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>

</body>

</html>