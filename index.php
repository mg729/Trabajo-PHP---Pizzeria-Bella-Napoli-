<?php
//Pizzas insignias del dia
$pizzas = [
    [
        "nombre" => "Pizza margarita",
        "imagen" => "",
        "ingredientes" => "Salsa pomodoro, mozzarella fresco, albahaca y aceite de oliva.",
        "precio" => 83.32,
        "badge" => "2x1 Martes",
        "color_badge" => "danger",
    ],
    [
        "nombre" => "Pizza margarita",
        "imagen" => "",
        "ingredientes" => "Salsa pomodoro, mozzarella fresco, albahaca y aceite de oliva.",
        "precio" => 83.32,
        "badge" => "2x1 Martes",
        "color_badge" => "danger",
    ],
    [
        "nombre" => "Pizza margarita",
        "imagen" => "",
        "ingredientes" => "Salsa pomodoro, mozzarella fresco, albahaca y aceite de oliva.",
        "precio" => 83.32,
        "badge" => "2x1 Martes",
        "color_badge" => "danger",
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
                <span><i>Bella Napoli</i></span>
            </a>
            <!--btn hamburguesa-->
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#menuNavegacion" aria-controls="menuNavegacion" aria-expanded="false"
                aria-label="Abrir navegación">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!--menu desplegable-->
            <div class="collapse navbar-collapse" id="menuNavegacion">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li><a class="nav-link px-3" href="index.php">Inicio</a></li>
                    <li><a class="nav-link px-3" href="">Catalogo</a></li>
                    <li><a class="nav-link px-3" href="">Arma tu pizza</a></li>
                    <li><a class="nav-link px-3" href="">Pedidos</a></li>
                    <li><a class="nav-link px-3" href="">Sucursales y contacto</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!--Hero-->
    <header class="bg-gradient text-black mt-4">
        <div class="container">
            <div class="row align-items-center g-4">

                <!--Txt-->
                <div class="col-lg-6 text-center text-lg-start">
                    <span class="badge bg-danger fs-6 mb-3">Horno de leña desde 1967</span>
                    <h1 class="display-3 fw-bold"> Bella<span class="text-warning">Napolli</span></h1>
                    <p class="lead ">Autentica pizza italiana horneada con leña, usando los ingredientes mas frescos y
                        la receta tradicional que cautiva los paladares en todo Honduras.</p>
                    <div class="d-grip gap-3 d-sm-flex justify-content-sm-center justify-content-lg-start">
                        <a class="btn btn-danger btn-lg px-4 shadow border-3 rounded-4" href="armar_pizza.php">¡Arma tu
                            Pizza!</a>
                        <a class="btn btn-outline-dark btn-lg px-4 rounded-4" href="Catalogo.php">Ver menu</a>
                    </div>
                </div>

                <!--Img-->
                <div class="col-lg-6 text-center">
                    <img class="img-fluid rounded-4 shadow-lg"
                        src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fimages.pexels.com%2Fphotos%2F31450871%2Fpexels-photo-31450871.jpeg%3Fcs%3Dsrgb%26dl%3Dpexels-pedrofurtadoo-31450871.jpg%26fm%3Djpg&f=1&nofb=1&ipt=7f6ea179b82ec760664922787467459e7b72deed0dbea18c1b13ad410239b73f&ipo=images"
                        alt="pizza Hero">
                </div>

            </div>
        </div>
    </header>

    <!--Pizzas Insignias: plantilla de las cards-->
    <section class="py-5 bg-dark">
        <article class="container">
            <div class=" text-white text-center mb-5">
                <h2 class="fw-bold mb-1">Pizzas Insignias del Dia</h2>
                <p class="text-muted">Las seleccionadas de hoy ¡Solo para ti!</p>
            </div>
        </article>

        <article class="row row-cols-1 row-cols-md-3 g-4">
            <!-- plantilla card -->
            <div class="col">
                
                <div class="card h-100 shadow-md border-1">
                    <span class="badge ">
                        <!---->
                    </span>
                    <div class="ratio ratio-4x3">
                        <!---->
                        <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.hogarmania.com%2Farchivos%2F202303%2Fpizza-margarita-portada-848x477x80xX.jpg&f=1&nofb=1&ipt=c91360068d38e6380d03f93765f899d3d9ddc2fc839653ee90170cb731be79d4&ipo=images" alt="pizza-card">
                    </div>

                    <div class="card-body d-flex flex-column">
                        <h3 class="card-title h5 fw-bold">
                            Titulo
                        </h3>
                        <p class="card-text text-muted">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, atque!
                        </p>
                        <p class="fs-5 fw-semibold text-danger mt-auto mb-3">
                            Precio
                        </p>
                        <a class="btn btn-outline-danger" href="Catalogo.php">Ver el catalogo</a>
                    </div>
                    
                </div>
            </div>
        </article>
    </section>

    <!--Promociones-->

    <!--Historias y tesmimonios-->

    <!--footer-->


    <!--Js Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>

</body>

</html>