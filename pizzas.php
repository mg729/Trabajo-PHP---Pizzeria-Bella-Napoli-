<?php
$tamanos = [
    'personal' => 'Personal (8")',
    'mediana'  => 'Mediana (12")',
    'familiar' => 'Familiar (16")',
    'gigante'  => 'Gigante (20")',
];

$catalogo = [

    'pizzas_clasicas' => [
        'titulo'    => 'Pizzas Clásicas',
        'tipo'      => 'pizza',
        'productos' => [
            [
                'nombre'       => 'Margarita',
                'imagen'       => 'img/margarita.jpg',
                'ingredientes' => ['Salsa de tomate', 'Mozzarella', 'Albahaca fresca'],
                'precios'      => ['personal' => 185, 'mediana' => 220, 'familiar' => 265, 'gigante' => 310],
            ],
            [
                'nombre'       => 'Pepperoni',
                'imagen'       => 'img/pepperoni.jpg',
                'ingredientes' => ['Salsa de tomate', 'Mozzarella', 'Pepperoni'],
                'precios'      => ['personal' => 195, 'mediana' => 230, 'familiar' => 280, 'gigante' => 325],
            ],
        ],
    ],

    'pizzas_gourmet' => [
        'titulo'    => 'Pizzas Gourmet de la Casa',
        'tipo'      => 'pizza',
        'productos' => [
            [
                'nombre'       => 'Prosciutto di Parma',
                'imagen'       => 'img/prosciutto.jpg',
                'ingredientes' => ['Mozzarella', 'Rúcula', 'Prosciutto di Parma', 'Parmesano'],
                'precios'      => ['personal' => 220, 'mediana' => 265, 'familiar' => 330, 'gigante' => 390],
            ],
            [
                'nombre'       => 'Trufada Napolitana',
                'imagen'       => 'img/trufada.jpg',
                'ingredientes' => ['Mozzarella', 'Crema de trufa', 'Champiñones', 'Aceite de trufa'],
                'precios'      => ['personal' => 230, 'mediana' => 275, 'familiar' => 340, 'gigante' => 405],
            ],
        ],
    ],

    'calzones_horno' => [
        'titulo'    => 'Calzones y Especialidades al Horno',
        'tipo'      => 'unico',
        'productos' => [
            [
                'nombre'       => 'Calzone de Carnes',
                'imagen'       => 'img/calzone-carnes.jpg',
                'ingredientes' => ['Carne molida', 'Jamón', 'Mozzarella'],
                'precio'       => 210,
            ],
            [
                'nombre'       => 'Calzone Vegetariano',
                'imagen'       => 'img/calzone-vegetariano.jpg',
                'ingredientes' => ['Espinaca', 'Champiñones', 'Ricota', 'Mozzarella'],
                'precio'       => 200,
            ],
        ],
    ],

    'bebidas_postres' => [
        'titulo'    => 'Bebidas y Postres Italianos',
        'tipo'      => 'unico',
        'productos' => [
            [
                'nombre'       => 'Tiramisú casero',
                'imagen'       => 'img/tiramisu.jpg',
                'ingredientes' => ['Mascarpone', 'Café espresso', 'Cacao'],
                'precio'       => 110,
            ],
            [
                'nombre'       => 'Cannoli sicilianos',
                'imagen'       => 'img/cannoli.jpg',
                'ingredientes' => ['Ricota', 'Canela', 'Pistachos'],
                'precio'       => 90,
            ],
        ],
    ],
];