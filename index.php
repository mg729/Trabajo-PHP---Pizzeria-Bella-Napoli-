<?php
//Pizzas insignias del dia
$pizzas = [
    [
        "nombre" => "Pizza margarita",
        "imagen" => "https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.hogarmania.com%2Farchivos%2F202303%2Fpizza-margarita-portada-848x477x80xX.jpg&f=1&nofb=1&ipt=c91360068d38e6380d03f93765f899d3d9ddc2fc839653ee90170cb731be79d4&ipo=images",
        "ingredientes" => "Salsa pomodoro, mozzarella fresco, albahaca y aceite de oliva.",
        "precio" => 83.32,
        "badge" => "2x1 Martes",
        "color_badge" => "danger",
    ],
    [
        "nombre" => "Pizza pepperoni",
        "imagen" => "https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fassets.afcdn.com%2Frecipe%2F20190319%2F89655_w3072h2304c1cx3680cy2456.jpg&f=1&nofb=1&ipt=faba779b0fbfbb35b03c66df3c18609209967ff1f6f1b258733b2fcf27fa6ccb&ipo=images",
        "ingredientes" => "Salsa pomodoro, mozzarella fresco, albahaca y aceite de oliva.",
        "precio" => 162.32,
        "badge" => "Favorita del chef",
        "color_badge" => "warning text-dark",
    ],
    [
        "nombre" => "Pizza Suprema",
        "imagen" => "https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fimg.freepik.com%2Ffotos-premium%2Fpizza-suprema-tradicional-aislado-sobre-fondo-blanco_590796-1929.jpg%3Fw%3D2000&f=1&nofb=1&ipt=b875ee383b341745670a5dee7fb4489de59b68021f0ee14dcf7daec5838b53ac&ipo=images",
        "ingredientes" => "Pepperoni, chile verde y champiñones.",
        "precio" => 120.74,
        "badge" => "Popular",
        "color_badge" => "success",
    ]
];

//Promociones
$promociones = [
    [
        "titulo" => "2x1 los Martes",
        "descripcion" => "Pide una pizza de pepperoni y lleva otra gratis todos los martes.",
        "badge" => "Martes",
        "color_badge" => "danger",
        "icono" => "bi-calendar-check",
    ],
    [
        "titulo" => "10% de descuento",
        "descripcion" => "Ordena 3 o mas pizzas y el descuento se aplica automaticamente.",
        "badge" => "Volumen",
        "color_badge" => "success",
        "icono" => "bi-percent",
    ],
    [
        "titulo" => "Delivery a L. 45.00",
        "descripcion" => "Recibe tu pizza caliente en la puerta de tu casa.",
        "badge" => "Envio",
        "color_badge" => "warning text-dark",
        "icono" => "bi-bicycle",
    ],
];


$testimonios = [
    [
        "nombre" => "Carlos M.",
        "ciudad" => "Tegucigalpa",
        "comentario" => "La mejor pizza al horno de leña que he probado en Honduras. La masa es perfecta.",
        "estrellas" => 5,
    ],
    [
        "nombre" => "Ana R.",
        "ciudad" => "San Pedro Sula",
        "comentario" => "Pedí a domicilio y llegó caliente y a tiempo. Ya es nuestra pizzería de los viernes.",
        "estrellas" => 5,
    ],
    [
        "nombre" => "Luis P.",
        "ciudad" => "La Ceiba",
        "comentario" => "Armé mi propia pizza y quedó increíble. Los ingredientes se sienten frescos.",
        "estrellas" => 4,
    ],
];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.2/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon">
</head>

<body>
    <!--Navbar-->
    <!--NOTA: El color del navbar es rojo, solo es temporal. Cualquier cambio mencionarlo :) -->
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


    <header class="bg-gradient text-black my-5">
        <div class="container">
            <div class="row align-items-center g-4">

               
                <div class="col-lg-6 text-center text-lg-start">
                    <span class="badge bg-danger fs-6 mb-3">Horno de leña desde 1967</span>
                    <h1 class="display-3 fw-bold"> Bella<span class="text-warning">Napolli</span></h1>
                    <p class="lead ">Autentica pizza italiana horneada con leña, usando los ingredientes mas frescos y
                        la receta tradicional que cautiva los paladares en todo Honduras.</p>
                    <div class="d-grip gap-3 d-sm-flex justify-content-sm-center justify-content-lg-start">
                        <a class="btn btn-danger btn-lg px-4 shadow border-3 rounded-4" href="arma_pizza.php">¡Arma tu
                            Pizza!</a>
                        <a class="btn btn-outline-dark btn-lg px-4 rounded-4" href="Catalogo.php">Ver menu</a>
                    </div>
                </div>

                <div class="col-lg-6 text-center">
                    <img class="img-fluid rounded-4 shadow-lg"
                        src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fimages.pexels.com%2Fphotos%2F31450871%2Fpexels-photo-31450871.jpeg%3Fcs%3Dsrgb%26dl%3Dpexels-pedrofurtadoo-31450871.jpg%26fm%3Djpg&f=1&nofb=1&ipt=7f6ea179b82ec760664922787467459e7b72deed0dbea18c1b13ad410239b73f&ipo=images"
                        alt="pizza Hero">
                </div>

            </div>
        </div>
    </header>


    <section class="bg-dark py-5 my-5">
        <article class="container">
            <div class=" text-white text-center mb-5">
                <h2 class="fw-bold mb-1">Pizzas Insignias del Dia</h2>
                <p class="text-white">Las seleccionadas de hoy ¡Solo para ti!</p>
            </div>
        </article>

        <article class="row row-cols-1 row-cols-md-3 g-4 mx-2">
            <?php foreach ($pizzas as $pizza): ?>
            <div class="col">
                <div class="card h-100 shadow-md border-1">


                    <span class="badge bg-<?= htmlspecialchars($pizza['color_badge'], ENT_QUOTES, 'UTF-8') ?>  position-absolute top-0 end-0 m-3 z-1">
                        <?= htmlspecialchars($pizza['badge'], ENT_QUOTES, 'UTF-8') ?>
                    </span>

                    <div class="ratio ratio-4x3">
                        <img class="card-img-top object-fit-cover" src="<?= htmlspecialchars($pizza['imagen'], ENT_QUOTES, 'UTF-8') ?>" alt="pizza-card">
                    </div>

                    <div class="card-body d-flex flex-column">
                        <h3 class="card-title h5 fw-bold">
                            <?= htmlspecialchars($pizza['nombre'], ENT_QUOTES, 'UTF-8') ?>
                        </h3>
                        <p class="card-text text-muted">
                            <?= htmlspecialchars($pizza['ingredientes'], ENT_QUOTES, 'UTF-8') ?>
                        </p>
                        <p class="fs-5 fw-semibold text-danger mt-auto mb-3">
                            Desde L. <?= number_format($pizza['precio'], 2)?>
                        </p>
                        <a class="btn btn-outline-danger" href="Catalogo.php">Ver el catalogo</a>
                    </div>
                    
                </div>
            </div>
            <?php endforeach; ?>
        </article>
    </section>

    <section class="bg-light py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-1">Promociones Disponibles</h2>
                <p class="text-muted">Aprovecha estas ofertas de Bella Napoli</p>
            </div>

            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php foreach ($promociones as $promo): ?>
                <div class="col">
                    <div class="card h-100 text-center shadow-sm border-0">
                        <div class="card-body d-flex flex-column align-items-center">
                            <i class="bi <?= htmlspecialchars($promo['icono'], ENT_QUOTES, 'UTF-8') ?> display-4 text-danger mb-3"></i>
                            <span class="badge bg-<?= htmlspecialchars($promo['color_badge'], ENT_QUOTES, 'UTF-8') ?> mb-2">
                                <?= htmlspecialchars($promo['badge'], ENT_QUOTES, 'UTF-8') ?>
                            </span>
                            <h3 class="h5 fw-bold">
                                <?= htmlspecialchars($promo['titulo'], ENT_QUOTES, 'UTF-8') ?>
                            </h3>
                            <p class="card-text text-muted mb-0">
                                <?= htmlspecialchars($promo['descripcion'], ENT_QUOTES, 'UTF-8') ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>


    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-1">Mira lo que dicen nuestros Clientes</h2>
                <p class="text-muted">Clientes satisfechos en todo Honduras.</p>
            </div>

            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php foreach ($testimonios as $t): ?>
                <div class="col">
                    <div class="card h-100 shadow-sm border-1">
                        <div class="card-body d-flex flex-column">
                            <div class="mb-3">
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <i class="bi <?= $i <= $t['estrellas'] ? 'bi-star-fill text-warning' : 'bi-star text-warning' ?>"></i>
                                <?php endfor; ?>
                            </div>

                            <p class="card-text fst-italic flex-grow-1">
                                “<?= htmlspecialchars($t['comentario'], ENT_QUOTES, 'UTF-8') ?>”
                            </p>
                            <div class="d-flex align-items-center mt-3">
                                <i class="bi bi-person-circle fs-2 text-danger me-2"></i>
                                <div>
                                    <p class="fw-bold mb-0">
                                        <?= htmlspecialchars($t['nombre'], ENT_QUOTES, 'UTF-8') ?>
                                    </p>
                                    <small class="text-muted">
                                        <?= htmlspecialchars($t['ciudad'], ENT_QUOTES, 'UTF-8') ?>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
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
                        <a class="text-white" href="faceebook.com" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                        <a class="text-white" href="instragram.com" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                        <a class="text-white" href="tiktok.com" aria-label="TikTok"><i class="bi bi-tiktok"></i></a>
                        <a class="text-white" href="whatsapp.com" aria-label="WhatsApp"><i class="bi bi-whatsapp"></i></a>
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