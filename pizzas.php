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
            [
                'nombre'       => 'Hawaiana',
                'imagen'       => 'img/hawaiana.jpg',
                'ingredientes' => ['Salsa de tomate', 'Mozzarella', 'Jamón', 'Piña'],
                'precios'      => ['personal' => 95, 'mediana' => 130, 'familiar' => 180, 'gigante' => 225],
            ],
            [
                'nombre'       => 'Cuatro Quesos',
                'imagen'       => 'img/cuatro-quesos.jpg',
                'ingredientes' => ['Mozzarella', 'Gorgonzola', 'Parmesano', 'Provolone'],
                'precios'      => ['personal' => 100, 'mediana' => 140, 'familiar' => 190, 'gigante' => 240],
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
            [
                'nombre'       => 'Frutti di Mare',
                'imagen'       => 'img/frutti-di-mare.jpg',
                'ingredientes' => ['Salsa de tomate', 'Mariscos mixtos', 'Ajo', 'Perejil'],
                'precios'      => ['personal' => 125, 'mediana' => 170, 'familiar' => 235, 'gigante' => 300],
            ],
            [
                'nombre'       => 'Carnívora Suprema',
                'imagen'       => 'img/carnivora.jpg',
                'ingredientes' => ['Salsa de tomate', 'Mozzarella', 'Salchicha', 'Pepperoni', 'Tocino', 'Carne molida'],
                'precios'      => ['personal' => 135, 'mediana' => 180, 'familiar' => 250, 'gigante' => 315],
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
            [
                'nombre'       => 'Focaccia con Romero',
                'imagen'       => 'img/focaccia.jpg',
                'ingredientes' => ['Aceite de oliva', 'Romero', 'Sal de mar'],
                'precio'       => 75,
            ],
             [
                'nombre'       => 'Calzone de avellanas',
                'imagen'       => 'img/avellanas.jpg',
                'ingredientes' => ['Crema de avellanas con cacao', 'Avellanas picadas', 'Azúcar glass'],
                'precio'       => 75,
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
            [
                'nombre'       => 'Bebidas gaseosas',
                'imagen'       => 'img/gaseosas.jpg',
                'ingredientes' => ['Coca-Cola', 'Fanta', 'Sprite'],
                'precio'       => 25,
            ],
            [
                'nombre'       => 'Refrescos naturales',
                'imagen'       => 'img/refrescos.jpg',
                'ingredientes' => ['Limonada', 'Jamaica', 'Naranja'],
                'precio'       => 30,
            ],
        ],
    ],
];