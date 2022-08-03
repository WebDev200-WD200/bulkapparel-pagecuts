<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/new-cart.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <!-- <link rel="stylesheet" href="./css/themes/themes.min.css"> -->
    <!-- Hallooween theme -->
    <!-- <link rel="stylesheet" href="./css/themes/halloween-theme.min.css"> -->

    <!-- Thanks giving theme-->
    <!-- <link id="theme" rel="stylesheet" href="./css/themes/christmas-theme.css"> -->

    <!-- New year theme-->
    <!-- <link id="theme" rel="stylesheet" href="./css/themes/new-year.theme.css"> -->
    <!-- New year theme-->

    <!-- <link id="theme" rel="stylesheet" href="./css/themes/valentines.theme.css"> -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300&display=swap" rel="stylesheet">
</head>

<body>
    <?php include('./components/layout/header.php') ?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <main>


        <?php
        // remove this after
        define('base_site_url', 'https://sl7.bulkapparel.com/');

        function formatToMoney($value, $format = true)
        {
            return '$' . ($format ? number_format($value, 2) : $value);
        }

        $cart_data = [
            "destination" => [
                'location' => 'Lawton',
                'zip_code' => "73505",
            ],

            "group" => [
                [
                    "id" => "1",
                    "name" => "Alphabroader",
                    "earlist_delivery" => "Monday, August 2, 2022",
                    "shippings" => [
                        [
                            "date" => "Friday, July 29",
                            "description" => "Fastest $9.95 Flat rate",
                            "price" => 9.95,
                            "selected" => true
                        ],
                        [
                            "date" => "Monday, August 1",
                            "description" => "Fastest $9.95 Flat rate",
                            "price" => 9.95,
                            "selected" => false
                        ]
                    ],
                    "items" => [
                        [
                            'title' => 'Gildan 5000 Heavy Cotton T-Shirt in bulk',
                            'image' => "16813_f_fm.jpg",
                            'price' => 1.67,
                            'quantity' => 5,
                            'size' => 'L',
                            'color' => [
                                'hex' => '#000',
                                "name" => "White"
                            ]

                        ],
                        [
                            'title' => 'Gildan 5000 Heavy Cotton T-Shirt in bulk',
                            'image' => "16813_f_fm.jpg",
                            'price' => 1.67,
                            'quantity' => 5,
                            'size' => 'S',
                            'color' => [
                                'hex' => '#000',
                                "name" => "White"
                            ]

                        ]
                    ],
                    "summary" => [
                        "retail_savings" => [
                            "before" => 52.00,
                            "after" => 23.00
                        ],
                        "total_items" => 5,
                        "subtotal" => 3.34,
                        "shipping_fee" => 0,
                        "sale_discount" => -0.17,
                        "sub_order_total" => 3.34
                    ]

                ],
                [
                    "id" => "2",
                    "name" => "SNS",
                    "earlist_delivery" => "Tuesday, August 3, 2022",
                    "shippings" => [
                        [
                            "date" => "Friday, July 29",
                            "description" => "Fastest $9.95 Flat rate",
                            "price" => 9.95,
                            "selected" => true
                        ],
                        [
                            "date" => "Tuesday, August 3",
                            "description" => "Fastest $9.95 Flat rate",
                            "price" => 9.95,
                            "selected" => false
                        ]
                    ],
                    "items" => [
                        [
                            'title' => 'Gildan 5000 Heavy Cotton T-Shirt in bulk',
                            'image' => "16813_f_fm.jpg",
                            'price' => 1.67,
                            'quantity' => 5,
                            'size' => 'L',
                            'color' => [
                                'hex' => '#000',
                                "name" => "White"
                            ]

                        ],
                        [
                            'title' => 'Gildan 5000 Heavy Cotton T-Shirt in bulk',
                            'image' => "16813_f_fm.jpg",
                            'price' => 1.67,
                            'quantity' => 5,
                            'size' => 'S',
                            'color' => [
                                'hex' => '#000',
                                "name" => "White"
                            ]

                        ]
                    ],
                    "summary" => [
                        "retail_savings" => [
                            "before" => 52.00,
                            "after" => 23.00
                        ],
                        "total_items" => 5,
                        "subtotal" => 3.34,
                        "shipping_fee" => 0,
                        "sale_discount" => -0.17,
                        "sub_order_total" => 3.34
                    ]

                ]
            ]
        ]
        ?>

        <div class="container">
            <div class="new-cart">
                <div class="new-cart-list">
                    <?php include('./components/cart/cart-group.php') ?>
                </div>
                <div class="new-cart-sidebar">
                    <?php include('./components/cart/cart-destination.php') ?>
                </div>
            </div>
        </div>
    </main>

    <?php include('./components/layout/footer.php') ?>
    <script src="assets/js/cart.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.4/jspdf.plugin.autotable.min.js"></script> -->
</body>


</html>