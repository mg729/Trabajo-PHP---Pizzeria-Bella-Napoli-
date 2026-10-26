<?php

session_start();
require_once 'pizzas.php';


$productos = [];
foreach ($catalogo as $categoria){
    foreach ($categoria["productos"] as $p){
    $p["tipo"] = $categoria["tipo"]; //precio por tamn
    $productos[$p["nombre"]] = $p;
    }
}

$modalidades = [
    'restaurante' => 'Para comer en restaurante',
    'pickup'      => 'Para llevar (Pick-Up)',
    'delivery'    => 'Envio a domicilio (Delivery)',
];

$pagos = [
    'efectivo' => 'Efectivo',
    'tarjeta'  => 'Tarjeta de credito / debito',
    'ach'      => 'Transferencia ACH',
];

$errores=[]; 
$factura=null;
$datos = [
    'nombre' => '', 'rtn' => '', 'telefono' => '', 'correo' => '',
    'direccion' => '', 'pizza' => '', 'tamano' => '', 'cantidad' => '1',
    'modalidad' => '', 'pago' => '', 'personalizacion' => '', 'recargo' => '0',
];


if($_SERVER["REQUEST_METHOD"] === "POST"){


    foreach($datos as $campo => $valor){
        $datos[$campo] = htmlspecialchars(trim($_POST[$campo] ?? ''), ENT_QUOTES, "UTF-8");
    }

    //VALIDACIONES
    if(mb_strlen($datos["nombre"]) < 5){$errores[] = "Nombre y apellido se encuentran vacios.";}

    if(!preg_match("/^\d{14}$/", $datos["rtn"])){$errores[] = "RTN no cumple los 14 caracteres.";}

    if(!preg_match("/^\d{8}$/",  $datos["telefono"])){$errores[] = "Numero incompleto. Debe cumplir los 8 caracteres.";}

    if(!filter_var($datos["correo"], FILTER_VALIDATE_EMAIL)){$errores[] = "Correo invalido.";}

    if($datos["direccion"] ===  ""){$errores[]= "Direccion de entrega obligatorio.";}

    $producto = $productos[$datos["pizza"]] ?? null;
    if($producto ==null){
        $errores[] = "Selecciona un producto.";
    }elseif ($producto["tipo"] === "pizza" && !isset($tamanos[$datos["tamano"]])){
        $errores[] = "Selecciona el tamaño de la pizza.";
    }

    $cantidad = filter_var($datos["cantidad"], FILTER_VALIDATE_INT);
    if($cantidad === false || $cantidad <=0){
        $errores[] = "Solo numeros positivos.";
    }
    elseif(!is_numeric($datos["recargo"] || $datos["recargo"] <0) ){$errores[] = "Recargo por ingredientes invalido.";}
    elseif(!isset($modalidades[$datos["modalidad"]])){
        $errores[] ="Selecciona una modalidad de entrega";
    }
    elseif(!isset($pagos[$datos])){$errores[]="Selecciones un metodo de pago.";}


}

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



    <main class="container my-5">
        <div class="text-center mb-4">
            <h1 class="fw-bold">Confirmar tu <span class="text-danger">pedido</span></h1>
            <p class="text-muted">Completa los datos para terminar tu pedido.</p>
        </div>

     
        <?php foreach($errores as $error): ?>
            <div class="alert alert-danger" role="alert">
                <i class ="bi bi-exclamation-triangle-fill me-2"><?= $error ?></i>
            </div>
        <?php endforeach; ?>

        <?php if($factura): ?>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-header bg-success text-white fw-bold d-flex justify-content-between">
                            <span><i class="bi bi-receipt me-2"> Factura digital</i></span>
                            <span><?= $factura["folio"] ?></span>
                        </div>
                        <div class="card-body">
                            <p class="mb-1"><strong>Fecha:</strong> <?= $factura["fecha"] ?></p>
                            <p class="mb-1"><strong>Cliente:</strong> <?= $factura["cliente"] ?></p>
                            <p class="mb-1"><strong>RTN:</strong> <?= $factura["rtn"] ?></p>
                            <p class="mb-1"><strong>Telefono:</strong> <?= $factura["telefono"] ?></p>
                            <p class="mb-1"><strong>Entrega:</strong> <?= $factura["modalidad"] ?></p>
                            <p class="mb-1"><strong>Pago:</strong> <?= $factura["pago"] ?></p>

                            <!--Tabla-->
                            <table class="table table-sm align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Detalle</th>
                                        <th class="text-end">Precio unid.</th>
                                        <th class="text-end">Importe</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> <?= $factura["detalle"] ?> </td>
                                        <td class="text-end">L. <?= number_format($factura["precio_unitario"] + $factura["recargo"], 2) ?></td>
                                        <td class="text-end">L. <?= number_format($factura["subtotal"], 2) ?></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2" class="text-end">Subtotal</td>
                                        <td class="text-end">
                                            L. <?= number_format($factura["subtotal"], 2) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-end">Descuento <span class="text-muted">(10% por 3 o mas)</span></td>
                                        <td class="text-end">
                                            L. <?= number_format($factura["descuento"], 2) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-end">ISV <span class="text-muted">(15%)</span></td>
                                        <td class="text-end">
                                            L. <?= number_format($factura["isv"], 2) ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-end">Delivery</td>
                                        <td class="text-end">
                                            L. <?= number_format($factura["delivery"], 2) ?>
                                        </td>
                                    </tr>
                                    <tr class="table-danger fw-bold">
                                        <td colspan="2" class="text-end">Total A Pagar</td>
                                        <td class="text-end">
                                            L. <?= number_format($factura["total"], 2) ?>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>

                            <!--Botones-->
                            <a class="btn btn-outline-success mx-2" href="pedidos.php">Realizar otro pedido</a>
                            <a class="btn btn-outline-danger" href="#">Ver panel de ordenes</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <form class="mx-auto" method="POST" action="pedidos.php" style="max-width: 800px;">
        
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-danger text-white fw-bold">
                    <i class="bi bi-person-fill me-2"></i>Información del cliente
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Nombre y apellido</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" minlength="5"
                                maxlength="15" placeholder="Ej. Maria Lopez" required>
                        </div>
                        <div class="col-md-6">
                            <label for="rtn" class="form-label">RTN</label>
                            <input type="text" class="form-control" id="rtn" name="rtn" inputmode="numeric"
                                maxlength="14" pattern="\d{14}" placeholder="14 digitos" required>
                        </div>
                        <div class="col-md-6">
                            <label for="telefono" class="form-label">Telefono</label>
                            <input type="tel" class="form-control" id="telefono" name="telefono" inputmode="numeric"
                                maxlength="8" pattern="\d{8}" placeholder="8 digitos" required>
                        </div>
                        <div class="col-md-6">
                            <label for="correo" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" id="correo" name="correo"
                                placeholder="correo@ejemplo.com" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-danger text-white fw-bold">
                    <i class="bi bi-truck me-2"></i>Entrega y pago
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="direccion" class="form-label">Direccion y punto de referencia</label>
                        <textarea class="form-control" id="direccion" name="direccion" rows="3"
                            placeholder="Colonia, calle, casa y punto de referencia"
                            style="max-height: 100px; min-height: 100px;" required></textarea>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <p class="form-label mb-2">Modalidad de entrega</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="modalidad" id="mod1"
                                    value="restaurante" required>
                                <label class="form-check-label" for="mod1">Para comer en restaurante</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="modalidad" id="mod2" value="pickup">
                                <label class="form-check-label" for="mod2">Para llevar (Pick-Up)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="modalidad" id="mod3"
                                    value="delivery">
                                <label class="form-check-label" for="mod3">
                                    Envio a domicilio (Delivery) <span class="badge bg-warning text-dark">+ L.
                                        45.00</span>
                                </label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <p class="form-label mb-2">Metodo de pago</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pago" id="pago1" value="efectivo"
                                    required>
                                <label class="form-check-label" for="pago1">Efectivo</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pago" id="pago2" value="tarjeta">
                                <label class="form-check-label" for="pago2">Tarjeta de credito / debito</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pago" id="pago3" value="ach">
                                <label class="form-check-label" for="pago3">Transferencia ACH</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-danger text-white fw-bold">
                    <i class="bi bi-basket-fill me-2"></i>Tu pedido
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-5">
                            <label for="pizza" class="form-label">Pizza</label>
                            <select class="form-select" id="pizza" name="pizza" required>
                                <option value="" selected disabled>Selecciona una pizza</option>
                                <?php foreach ($pizzas as $p): ?>
                                <option value="<?= htmlspecialchars($p, ENT_QUOTES, 'UTF-8') ?>">
                                    <?= htmlspecialchars($p, ENT_QUOTES, 'UTF-8') ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="tamano" class="form-label">Tamaño</label>
                            <select class="form-select" id="tamano" name="tamano" required>
                                <option value="" selected disabled>Selecciona un tamaño</option>
                                <?php foreach ($tamanos as $clave => $texto): ?>
                                <option value="<?= $clave ?>">
                                    <?= $texto ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="cantidad" class="form-label">Cantidad</label>
                            <input type="number" class="form-control" id="cantidad" name="cantidad" min="1" value="1" max="100"
                                required>
                        </div>
                        <div class="col-12">
                            <label for="personalizacion" class="form-label">
                                Personalizacion <span class="text-muted">(opcional)</span>
                            </label>
                            <textarea class="form-control" id="personalizacion" name="personalizacion" rows="3"
                                placeholder="Ej. masa delgada, extra queso..." maxlength="280"
                                style="max-height: 90px; min-height: 90px;"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="d-grid">
                <button type="submit" class="btn btn-danger btn-lg">
                    <i class="bi bi-check-circle-fill me-2"></i>Confirmar pedido
                </button>
            </div>

        </form>
    </main>
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