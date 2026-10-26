<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['accion'] ?? '') === 'vaciar') {
    unset($_SESSION['pedidos']);
    header('Location: sucursales.php?vaciado=1');
    exit;
}

$sucursales = [
    [
        'nombre'    => 'Tegucigalpa',
        'barrio'    => 'Bulevar Morazán',
        'direccion' => 'Blvd. Morazán, Tegucigalpa, Honduras',
        'telefono'  => '+504 2222-3333',
        'email'     => 'tegucigalpa@bellanapoli.hn',
        'imagen'    => 'https://images.restaurantfurniture.net/dpr_1.0,f_auto,q_auto,w_1125/rfnet/media/wysiwyg/guides/aurelios-pizza-1.jpg',
    ],
    [
        'nombre'    => 'San Pedro Sula',
        'barrio'    => 'Barrio Guamilito',
        'direccion' => 'Barrio Guamilito, San Pedro Sula, Cortés, Honduras',
        'telefono'  => '+504 2550-1010',
        'email'     => 'sanpedro@bellanapoli.hn',
        'imagen'    => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTfNimNW5Wol1dAZ2CmSVevJ_qCYWmNTc473bnEm3Lx6TQAeWeFU35HliB8&s=10',
    ],
    [
        'nombre'    => 'La Ceiba',
        'barrio'    => 'Centro',
        'direccion' => 'Centro, La Ceiba, Atlántida, Honduras',
        'telefono'  => '+504 2440-2020',
        'email'     => 'laceiba@bellanapoli.hn',
        'imagen'    => 'https://i.pinimg.com/736x/8d/28/42/8d2842e5aac00ece6c03b21e5e693a79.jpg',
    ],
    [
        'nombre'    => 'Comayagua',
        'barrio'    => 'Cabañas',
        'direccion' => 'Centro, Comayagua, Comayagua, Honduras',
        'telefono'  => '+504 2750-3010',
        'email'     => 'comayagua@bellanapoli.hn',
        'imagen'    => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ24JfCSNRklvrwaZmnEiLrm2jg1cNNupBT9PebXk2nzPekDUA2DFSKFAmf&s=10',
    ],
    [
        'nombre'    => 'Choluteca',
        'barrio'    => 'Centro',
        'direccion' => 'Centro, Choluteca, Choluteca, Honduras',
        'telefono'  => '+504 2823-9012',
        'email'     => 'choluteca@bellanapoli.hn',
        'imagen'    => 'https://sdg-migration-id.s3.amazonaws.com/ippolito-fleitz-group-white-monkey-pizza-lab-bar-leipzig-germany-bar-and-kitchen-area-0717.jpg',
    ],
];

$horarios = [
    'Lunes a Jueves: 11:00 a.m. - 9:00 p.m.',
    'Viernes y Sábado: 11:00 a.m. - 11:00 p.m.',
    'Domingo: 12:00 p.m. - 8:00 p.m.',
];


if (!isset($_SESSION['pedidos_inicializados'])) {
    $_SESSION['pedidos'] = [
        [
            'folio'    => 1001,
            'cliente'  => 'María Fernanda López',
            'telefono' => '+504 9876-5432',
            'pizzas'   => ['Margherita (Grande) x1', 'Pepperoni (Mediana) x2'],
            'total'    => 745.00,
            'estado'   => 'Entregado',
        ],
        [
            'folio'    => 1002,
            'cliente'  => 'Carlos Andrés Mejía',
            'telefono' => '+504 9542-1187',
            'pizzas'   => ['Hawaiana (Familiar) x1'],
            'total'    => 420.50,
            'estado'   => 'En preparación',
        ],
        [
            'folio'    => 1003,
            'cliente'  => 'Sofía Villatoro',
            'telefono' => '+504 3311-7720',
            'pizzas'   => ['Cuatro Quesos (Grande) x1', 'Vegetariana (Mediana) x1'],
            'total'    => 880.00,
            'estado'   => 'Pendiente',
        ],
        [
            'folio'    => 1004,
            'cliente'  => 'José Luis Euceda',
            'telefono' => '+504 8899-0234',
            'pizzas'   => ['Napolitana (Personal) x3'],
            'total'    => 510.00,
            'estado'   => 'Cancelado',
        ],
        [
            'folio'    => 1005,
            'cliente'  => 'Ana Gabriela Reyes',
            'telefono' => '+504 9421-6653',
            'pizzas'   => ['Pepperoni (Familiar) x1', 'Mexicana (Grande) x1'],
            'total'    => 1085.75,
            'estado'   => 'Pendiente',
        ],
    ];
    $_SESSION['pedidos_inicializados'] = true;
}


$pedidos  = $_SESSION['pedidos'] ?? [];
$vaciado  = isset($_GET['vaciado']);

$badgesEstado = [
    'Pendiente'      => 'bg-warning text-dark',
    'En preparación' => 'bg-info text-dark',
    'Entregado'      => 'bg-success',
    'Cancelado'      => 'bg-danger',
];

$totalGeneral = 0;
foreach ($pedidos as $p) {
    $totalGeneral += (float)($p['total'] ?? 0);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sucursales y contacto - Bella Napoli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.2/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon">
</head>
<body class="bg-light">


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

    <div class="container py-4">
        <h1 class="text-center mb-5 fw-bold">Sucursales y Contacto</h1>

        <?php if ($vaciado): ?>
            <div class="alert alert-success text-center" role="alert">
                Los pedidos de la sesión fueron vaciados.
            </div>
        <?php endif; ?>

      
        <section class="mb-5">
            <h2 class="border-bottom border-danger border-3 pb-2 mb-4">Nuestras sucursales</h2>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                <?php foreach ($sucursales as $s): ?>
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            <img src="<?= htmlspecialchars($s['imagen']) ?>"
                                 class="card-img-top"
                                 style="height: 160px; object-fit: cover;"
                                 alt="Sucursal <?= htmlspecialchars($s['nombre']) ?>">
                            <div class="card-body">
                                <h3 class="card-title h5 fw-bold"><?= htmlspecialchars($s['nombre']) ?></h3>
                                <p class="text-danger fw-semibold small mb-3"><?= htmlspecialchars($s['barrio']) ?></p>
                                <ul class="list-unstyled small mb-0">
                                    <li class="mb-2"><i class="bi bi-geo-alt-fill text-danger me-2"></i><?= htmlspecialchars($s['direccion']) ?></li>
                                    <li class="mb-2"><i class="bi bi-telephone-fill text-danger me-2"></i><?= htmlspecialchars($s['telefono']) ?></li>
                                    <li><i class="bi bi-envelope-fill text-danger me-2"></i><?= htmlspecialchars($s['email']) ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

       
        <section class="mb-5">
            <h2 class="border-bottom border-danger border-3 pb-2 mb-4">Horarios y contacto</h2>
            <div class="row g-4">
                <div class="col-12 col-md-6">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h3 class="card-title h5 fw-bold mb-3">Horarios del restaurante</h3>
                            <ul class="list-unstyled mb-0">
                                <?php foreach ($horarios as $h): ?>
                                    <li class="mb-2"><i class="bi bi-clock text-danger me-2"></i><?= htmlspecialchars($h) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h3 class="card-title h5 fw-bold mb-3">Contacto general</h3>
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2"><i class="bi bi-telephone-fill text-danger me-2"></i>+504 2222-3333</li>
                                <li class="mb-2"><i class="bi bi-envelope-fill text-danger me-2"></i>contacto@bellanapoli.hn</li>
                                <li><i class="bi bi-whatsapp text-danger me-2"></i>+504 9999-0000</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

     
        <section class="mb-5">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 border-bottom border-danger border-3 pb-2 mb-4">
                <h2 class="mb-0">Panel de órdenes en sesión</h2>
                <?php if (!empty($pedidos)): ?>
                    <span class="badge bg-dark fs-6">Total de pedidos: <?= count($pedidos) ?></span>
                <?php endif; ?>
            </div>

            <?php if (empty($pedidos)): ?>
                <div class="alert alert-warning d-flex align-items-center gap-2" role="alert">
                    <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle-fill"></i> Sin pedidos</span>
                    <span>No hay pedidos registrados durante esta navegación.</span>
                </div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle bg-white">
                        <thead class="table-danger text-center">
                            <tr>
                                <th>Folio</th>
                                <th>Cliente</th>
                                <th>Teléfono</th>
                                <th>Detalle de pizzas</th>
                                <th>Total (L)</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pedidos as $pedido): ?>
                                <?php
                                    $detalle = $pedido['pizzas'] ?? [];
                                    if (is_array($detalle)) {
                                        $detalle = implode(', ', $detalle);
                                    }
                                    $estado = $pedido['estado'] ?? 'Pendiente';
                                    $claseBadge = $badgesEstado[$estado] ?? 'bg-secondary';
                                ?>
                                <tr>
                                    <td class="text-center fw-semibold">#<?= htmlspecialchars((string)($pedido['folio'] ?? '-')) ?></td>
                                    <td><?= htmlspecialchars($pedido['cliente'] ?? '-') ?></td>
                                    <td class="text-center"><?= htmlspecialchars($pedido['telefono'] ?? '-') ?></td>
                                    <td class="small"><?= htmlspecialchars($detalle ?: '-') ?></td>
                                    <td class="text-end">L<?= number_format((float)($pedido['total'] ?? 0), 2) ?></td>
                                    <td class="text-center">
                                        <span class="badge <?= $claseBadge ?>"><?= htmlspecialchars($estado) ?></span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot class="table-light fw-bold">
                            <tr>
                                <td colspan="4" class="text-end">Total general</td>
                                <td class="text-end">L<?= number_format($totalGeneral, 2) ?></td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            <?php endif; ?>

            <form method="post" action="sucursales.php" class="mt-3 text-end"
                  onsubmit="return confirm('¿Seguro que deseas vaciar los pedidos de la sesión?');">
                <input type="hidden" name="accion" value="vaciar">
                <button type="submit" class="btn btn-outline-danger fw-semibold"
                        <?= empty($pedidos) ? 'disabled' : '' ?>>
                    <i class="bi bi-trash3 me-1"></i>Vaciar / Reiniciar sesión
                </button>
            </form>
        </section>
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