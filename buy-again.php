<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/buy-again.css">
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
    <?php include('includes/functions.php') ?>
    <?php include('./components/layout/header.php') ?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <main>
        <?php
        $data = [
            [
                "id" => "unique-1111111",
                "name" => "G500 Gildan T-Shirt 5000 Heavy Cotton 5.3oz",
                "image" => "16_fm.jpg",
                "price" => 2.19,
                "ordered_variants" => [
                    [
                        "id" => "gtin-111111",
                        "color" => "Antique Red",
                        "hex" => ["#D25168"],
                        "size" => "L",
                        "price" => 1.77,
                    ],
                    [
                        "id" => "gtin-2222222",
                        "color" => "Dark Gray",
                        "hex" => ["#4D4D52"],
                        "size" => "L",
                        "price" => 1.77,
                    ],
                    [
                        "id" => "gtin-3333333",
                        "color" => "Pink",
                        "hex" => ["#FFC0CB"],
                        "size" => "L",
                        "price" => 1.77,
                    ],
                    [
                        "id" => "gtin-444444444",
                        "color" => "Violet",
                        "hex" => ["#EE82EE"],
                        "size" => "L",
                        "price" => 1.77,
                    ],
                    [
                        "id" => "gtin-111111",
                        "color" => "Hello Pink",
                        "hex" => ["#D25168"],
                        "size" => "L",
                        "price" => 1.77,
                    ],
                    [
                        "id" => "gtin-2222222",
                        "color" => "Dark Gray",
                        "hex" => ["#4D4D52"],
                        "size" => "L",
                        "price" => 1.77,
                    ],
                    [
                        "id" => "gtin-3333333",
                        "color" => "Pink",
                        "hex" => ["#FFC0CB"],
                        "size" => "L",
                        "price" => 1.77,
                    ],
                    [
                        "id" => "gtin-444444444",
                        "color" => "Violet",
                        "hex" => ["#EE82EE"],
                        "size" => "L",
                        "price" => 1.77,
                    ],
                ],
                "more_colors_sizes" => [
                    "colors" => [
                        [
                            "id" => 1,
                            "color" => "Antique Red",
                            "hex" => ["#D25168"],
                        ],
                        [
                            "id" => 1,
                            "color" => "Antique Red",
                            "hex" => ["#D25168"],
                        ],
                        [
                            "id" => 1,
                            "color" => "Antique Red",
                            "hex" => ["#D25168"],
                        ],
                        [
                            "id" => 1,
                            "color" => "Antique Red",
                            "hex" => ["#D25168"],
                        ],
                        [
                            "id" => 1,
                            "color" => "Antique Red",
                            "hex" => ["#D25168"],
                        ],

                    ],
                    "sizes" => [
                        [
                            "id" => 1,
                            "size" => "S",
                            "price" => formatToMoney(2.19),
                            "stocks" => 216533
                        ],
                        [
                            "id" => 2,
                            "size" => "M",
                            "price" => formatToMoney(2.19),
                            "stocks" => 216533
                        ],
                        [
                            "id" => 3,
                            "size" => "L",
                            "price" => formatToMoney(2.19),
                            "stocks" => 216533
                        ],
                        [
                            "id" => 4,
                            "size" => "XL",
                            "price" => formatToMoney(2.19),
                            "stocks" => 216533
                        ],
                        [
                            "id" => 5,
                            "size" => "2XL",
                            "price" => formatToMoney(2.19),
                            "stocks" => 216533
                        ]
                    ]
                ]
            ]
        ];

        $selectFilters = [
            [
                "name" => "Lastest Orders",
                "value" => "lao",
                "selected" => true
            ],
            [
                "name" => "Most Purchased",
                "value" => "mop",
            ],
            [
                "name" => "Lowest Price",
                "value" => "lop",
            ]
        ];
        ?>

        <div class="container">
            <div class="buy-again">
                <div class="buy-again__header">
                    <h2 class="color--primary">Buy it Again</h2>
                    <?php template('./components/buy-again/filter-selects.php', ["items" => $selectFilters]); ?>
                </div>

                <div class="buy-again__list">
                    <?php template('./components/buy-again/buy-again-list.php', ['items' => $data]); ?>
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