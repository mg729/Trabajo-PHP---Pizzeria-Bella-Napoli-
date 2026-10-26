<?php
session_start();

$masas = [
    "Tradicional italiana"    => 0,
    "Delgada / Crocante"      => 0,
    "Orilla rellena de queso" => 30 
];

$salsas = ["Pomodoro clásica", "Salsa blanca Alfredo", "Pesto genovés", "Barbacoa dulce"];
$quesos = ["Mozzarella fresco", "Queso parmesano reggiano", "Queso provolone"];
$ingredientes = [
    "Pepperoni"              => 25,
    "Jamón de pavo"          => 20,
    "Champiñones frescos"    => 15,
    "Pimientos morrones"     => 10,
    "Aceitunas negras"       => 12,
    "Albahaca fresca"        => 8,
    "Tocineta ahumada"       => 30,
    "Carne molida artesanal" => 35
];


$masa    = "";
$salsa   = "";
$queso   = "";
$extras  = [];
$errores = [];
$resumen = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $masa  = htmlspecialchars($_POST["masa"]  ?? "", ENT_QUOTES, "UTF-8");
    $salsa = htmlspecialchars($_POST["salsa"] ?? "", ENT_QUOTES, "UTF-8");
    $queso = htmlspecialchars($_POST["queso"] ?? "", ENT_QUOTES, "UTF-8");

    $extras_recibidos = $_POST["extras"] ?? [];
    foreach ($extras_recibidos as $extra) {
        $extras[] = htmlspecialchars($extra, ENT_QUOTES, "UTF-8");
    }

    if ($masa == "" || !array_key_exists($masa, $masas)) {
        $errores[] = "Debes seleccionar un tipo de masa.";
    }
    if ($salsa == "" || !in_array($salsa, $salsas)) {
        $errores[] = "Debes seleccionar una salsa base.";
    }
    if ($queso == "" || !in_array($queso, $quesos)) {
        $errores[] = "Debes seleccionar un queso principal.";
    }
    foreach ($extras as $extra) {
        if (!array_key_exists($extra, $ingredientes)) {
            $errores[] = "Ingrediente no válido: " . $extra;
        }
    }

    if (count($errores) == 0) {
        $recargo_masa = $masas[$masa];

        $recargo_extras = 0;
        foreach ($extras as $extra) {
            $recargo_extras += $ingredientes[$extra];
        }

        $resumen = [
            "masa"           => $masa,
            "salsa"          => $salsa,
            "queso"          => $queso,
            "extras"         => $extras,
            "recargo_masa"   => $recargo_masa,
            "recargo_extras" => $recargo_extras,
            "total_recargos" => $recargo_masa + $recargo_extras
        ];

        $_SESSION["pizza_personalizada"] = $resumen;
    }
}
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
                    <li class="nav-item"><a class="nav-link px-3 fw-bold" href="pedidos.php">Pedidos</a></li>
                    <li class="nav-item"><a class="nav-link px-3 fw-bold" href="sucursales.php">Sucursales y contacto</a></li>
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
                    <?php if (count($errores) > 0) { ?>
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                <?php foreach ($errores as $error) { ?>
                                    <li><?= $error ?></li>
                                <?php } ?>
                            </ul>
                        </div>
                    <?php } ?>
                    <form method="POST" action="arma_pizza.php">
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
                        <div class="card shadow-sm border-0 mb-4">
                            <div class="card-header bg-white fw-bold py-3">
                                <i class="bi bi-2-circle-fill text-danger me-2"></i>Elige tu salsa base
                            </div>
                            <div class="card-body">
                                <select name="salsa" class="form-select">
                                    <option value="">-- Selecciona una salsa --</option>
                                    <?php foreach ($salsas as $nombre) { ?>
                                        <option value="<?= $nombre ?>" <?= ($salsa == $nombre) ? "selected" : "" ?>>
                                            <?= $nombre ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="card shadow-sm border-0 mb-4">
                            <div class="card-header bg-white fw-bold py-3">
                                <i class="bi bi-3-circle-fill text-danger me-2"></i>Elige tu queso principal
                            </div>
                            <div class="card-body">
                                <div class="list-group">
                                    <?php foreach ($quesos as $nombre) { ?>
                                        <label class="list-group-item">
                                            <input class="form-check-input me-2" type="radio" name="queso"
                                                value="<?= $nombre ?>" <?= ($queso == $nombre) ? "checked" : "" ?>>
                                            <?= $nombre ?>
                                        </label>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="card shadow-sm border-0 mb-4">
                            <div class="card-header bg-white fw-bold py-3">
                                <i class="bi bi-4-circle-fill text-danger me-2"></i>Ingredientes adicionales
                                <small class="text-muted fw-normal">(puedes elegir varios)</small>
                            </div>
                            <div class="card-body">
                                <div class="row g-2">
                                    <?php foreach ($ingredientes as $nombre => $precio) { ?>
                                        <div class="col-md-6">
                                            <label class="list-group-item d-flex justify-content-between align-items-center rounded">
                                                <span>
                                                    <input class="form-check-input me-2" type="checkbox" name="extras[]"
                                                        value="<?= $nombre ?>" <?= in_array($nombre, $extras) ? "checked" : "" ?>>
                                                    <?= $nombre ?>
                                                </span>
                                                <span class="badge bg-warning text-dark">+ L. <?= number_format($precio, 2) ?></span>
                                            </label>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="d-grid gap-2 d-md-flex">
                            <button type="submit" class="btn btn-danger btn-lg px-4 shadow rounded-4">
                                <i class="bi bi-check-circle me-2"></i>Armar mi pizza
                            </button>
                            <a href="arma_pizza.php" class="btn btn-outline-dark btn-lg px-4 rounded-4">
                                <i class="bi bi-arrow-counterclockwise me-2"></i>Limpiar
                            </a>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="card shadow-sm border-0 sticky-lg-top" style="top: 90px;">
                        <div class="card-header bg-danger text-white fw-bold py-3">
                            <i class="bi bi-receipt me-2"></i>Tu pizza
                        </div>
                        <div class="card-body">
                            <?php if ($resumen == null) { ?>
                                <p class="text-muted mb-0">Cuando envíes tu pizza, aquí verás el resumen y el total de recargos.</p>
                            <?php } else { ?>
                                <p class="mb-1"><strong>Masa:</strong> <?= $resumen["masa"] ?>
                                    (+ L. <?= number_format($resumen["recargo_masa"], 2) ?>)</p>
                                <p class="mb-1"><strong>Salsa:</strong> <?= $resumen["salsa"] ?></p>
                                <p class="mb-2"><strong>Queso:</strong> <?= $resumen["queso"] ?></p>
                                <p class="mb-1"><strong>Ingredientes adicionales:</strong></p>
                                <?php if (count($resumen["extras"]) == 0) { ?>
                                    <p class="text-muted">Ninguno</p>
                                <?php } else { ?>
                                    <ul class="list-unstyled">
                                        <?php foreach ($resumen["extras"] as $extra) { ?>
                                            <li><i class="bi bi-check2 text-success me-1"></i><?= $extra ?>
                                                - L. <?= number_format($ingredientes[$extra], 2) ?></li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                                <hr>
                                <p class="fs-5 fw-bold text-danger mb-0">
                                    Total de recargos: L. <?= number_format($resumen["total_recargos"], 2) ?>
                                </p>
                            <?php } ?>
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