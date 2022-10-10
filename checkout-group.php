<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/checkout-shipping-group.css">
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

    <?php
    define('base_site_url', 'https://sl7sl7.bulkapparel.com/');
    define('SYMBOL', '$');

    function newProductImagePath($image, $type = 'bulk-blank-shirts')
    {
        $newImagePaths = [
            'thumbnail-m' => 'thumbnail-m',
            'thumbnail' => 'thumbnail',
            'search' => 'search',
            'popular-items' => 'popular-items',
            'bulk-blank-shirts' => 'bulk-blank-shirts',
            'fashion-wear-m' => 'fashion-wear-m',
            'fashion-wear' => 'fashion-wear',
            'high-reso' => 'high-reso',
            'alpha-thumbnail-m' => 'alpha-colors/thumbnail-m', // 'alpha-image/thumbnail-m',
            'alpha-thumbnail' => 'alpha-colors/thumbnail', //'alpha-image/thumbnail',
            'alpha-search' => 'alpha-colors/search', //'alpha-image/search',
            'alpha-wholesale' => 'alpha-colors/popular-items', //'alpha-image/wholesale',
            'alpha-bulk-blank-shirts' => 'alpha-colors/bulk-blank-shirts', //'alpha-image/bulk-blank-shirts',
            'alpha-blank-shirts-wholesale-m' => 'alpha-colors/fashion-wear-m', //'alpha-image/blank-shirts-wholesale-m',
            'alpha-blank-shirts-wholesale' => 'alpha-colors/fashion-wear', //'alpha-image/blank-shirts-wholesale',
            'alpha-high-reso' => 'alpha-colors/high-reso', //'alpha-image/high-reso'
            // Start - possibly discuss about adding zoom tool to pdetail PC only - CL - 3/1/2022
        ];
        $filename = str_replace(['Images/Color/', 'Images/Style/'], '',  $image);
        return base_url_site . 'image/' . $newImagePaths[$type] . '/' . $filename;
    };

    $shipping_groups = [
        [
            "group_name" => "Group 1",
            "items" =>  [
                [
                    "name" => "G500 Gildan T-Shirt 5000 Heavy Cotton 5.3",
                    'styleName' => "G500",
                    "brand" => "Gildan",
                    "image" => "16_fm.jpg",
                    "price" => 1.67,
                    "quantity" => 2,
                    "total" => 3.34,
                    "size" => "S",
                    "color" => "White", "to" => ""
                ],
                [
                    "name" => "G200 Gildan T-Shirt 2000 Heavy Cotton 5.3",
                    'styleName' => "G200",
                    "brand" => "Gildan",
                    "image" => "39_fm.jpg",
                    "price" => 1.67,
                    "quantity" => 2,
                    "total" => 3.34,
                    "size" => "S",
                    "color" => "White", "to" => ""
                ],
                [
                    "name" => "Team 365 TT11 Mens Zone Performance T-Shirt",
                    'styleName' => "TT11",
                    "brand" => "Team 365",
                    "image" => "395_fm.jpg",
                    "price" => 8.00,
                    "quantity" => 2,
                    "total" => 3.34,
                    "size" => "S",
                    "color" => "White", "to" => ""
                ],
                [
                    "name" => "Core 365 88181 Mens Origin Performance Piqu Polo",
                    'styleName' => "88181",
                    "brand" => "Core 365",
                    "image" => "88181_8y_p.jpg",
                    "price" => 18.00,
                    "quantity" => 2,
                    "total" => 3.34,
                    "size" => "S",
                    "color" => "White", "to" => ""
                ],
                [
                    "name" => "Hanes P170 Ecosmart Hooded Sweatshirt",
                    'styleName' => "P170",
                    "brand" => "Hanes",
                    "image" => "391a_fm.jpg",
                    "price" => 10.49,
                    "quantity" => 2,
                    "total" => 3.34,
                    "size" => "S",
                    "color" => "White", "to" => ""
                ],
                [
                    "name" => "Threadfast Apparel 320H Unisex Ultimate Fleece Pullover Hooded Sweatshirt",
                    'styleName' => "320H",
                    "brand" => "Threadfast",
                    "image" => "320h_20_p.jpg",
                    "price" => 10.49,
                    "quantity" => 2,
                    "total" => 3.34,
                    "size" => "S",
                    "color" => "White", "to" => ""

                ],
                [
                    "name" => "Just Hoods By AWDis JHA001 Mens 8020 Midweight College Hooded Sweatshirt",
                    'styleName' => "320H",
                    "brand" => "Justhoods",
                    "image" => "jha001_33_p.jpg",
                    "price" => 10.49,
                    "quantity" => 2,
                    "total" => 3.34,
                    "size" => "S",
                    "color" => "White", "to" => ""
                ],
            ],
            "shipping_options" => [
                [
                    "selected" => true,
                    "id" => "surepost",
                    "estimated_delivery" => "Monday 10/05",
                    "name" => "USPS",
                    "amount" => "FREE",
                    "title" => "Surepost (usually 2-6 days)",
                    "description" => "Surepost (usually 2-6 days)",
                    "image" => base_site_url . "images/" . "surepost-logo.jpg",
                    "description_image" => base_site_url . "images/" . "surepost-logo.jpg"
                ],
                [
                    "selected" => false,
                    "id" => "ground",
                    "estimated_delivery" => "Monday 10/05",
                    "name" => "UPS Ground or FedEx",
                    "amount" => '$8.95',
                    "title" => "Ground Shipping estimated (1 to 3 days) FREE Over $99",
                    "description" => "Fastest Option (usually 1-3 days) Free over $99. Your order will Ship UPS or Fedex Ground or Local Ground carrier for fast delivery. This is an estimated delivery date based on past delivery with Ground shipping.",
                    "image" => base_site_url . "images/" . "surepost-logo.jpg",
                    "description_image" => base_site_url . "images/" . "surepost-logo.jpg"
                ],
                [
                    "selected" => false,
                    "id" => "ground",
                    "estimated_delivery" => "Monday 10/06",
                    "name" => "UPS Ground or FedEx",
                    "amount" => '$9.00',
                    "title" => "Ground Shipping estimated (1 to 3 days) FREE Over $99",
                    "description" => "Fastest Option (usually 1-3 days) Free over $99. Your order will Ship UPS or Fedex Ground or Local Ground carrier for fast delivery. This is an estimated delivery date based on past delivery with Ground shipping.",
                    "image" => base_site_url . "images/" . "surepost-logo.jpg",
                    "description_image" => base_site_url . "images/" . "surepost-logo.jpg"
                ]
            ]
        ],

        [
            "group_name" => "Group 2",
            "items" =>  [
                [
                    "name" => "G500 Gildan T-Shirt 5000 Heavy Cotton 5.3",
                    'styleName' => "G500",
                    "brand" => "Gildan",
                    "image" => "16_fm.jpg",
                    "price" => 1.67,
                    "quantity" => 2,
                    "total" => 3.34,
                    "size" => "S",
                    "color" => "White", "to" => ""
                ],
                [
                    "name" => "G200 Gildan T-Shirt 2000 Heavy Cotton 5.3",
                    'styleName' => "G200",
                    "brand" => "Gildan",
                    "image" => "39_fm.jpg",
                    "price" => 1.67,
                    "quantity" => 2,
                    "total" => 3.34,
                    "size" => "S",
                    "color" => "White", "to" => ""
                ],
                [
                    "name" => "Team 365 TT11 Mens Zone Performance T-Shirt",
                    'styleName' => "TT11",
                    "brand" => "Team 365",
                    "image" => "395_fm.jpg",
                    "price" => 8.00,
                    "quantity" => 2,
                    "total" => 3.34,
                    "size" => "S",
                    "color" => "White", "to" => ""
                ],
                [
                    "name" => "Core 365 88181 Mens Origin Performance Piqu Polo",
                    'styleName' => "88181",
                    "brand" => "Core 365",
                    "image" => "88181_8y_p.jpg",
                    "price" => 18.00,
                    "quantity" => 2,
                    "total" => 3.34,
                    "size" => "S",
                    "color" => "White", "to" => ""
                ],
                [
                    "name" => "Hanes P170 Ecosmart Hooded Sweatshirt",
                    'styleName' => "P170",
                    "brand" => "Hanes",
                    "image" => "391a_fm.jpg",
                    "price" => 10.49,
                    "quantity" => 2,
                    "total" => 3.34,
                    "size" => "S",
                    "color" => "White", "to" => ""
                ],
                [
                    "name" => "Threadfast Apparel 320H Unisex Ultimate Fleece Pullover Hooded Sweatshirt",
                    'styleName' => "320H",
                    "brand" => "Threadfast",
                    "image" => "320h_20_p.jpg",
                    "price" => 10.49,
                    "quantity" => 2,
                    "total" => 3.34,
                    "size" => "S",
                    "color" => "White", "to" => ""

                ],
                [
                    "name" => "Just Hoods By AWDis JHA001 Mens 8020 Midweight College Hooded Sweatshirt",
                    'styleName' => "320H",
                    "brand" => "Justhoods",
                    "image" => "jha001_33_p.jpg",
                    "price" => 10.49,
                    "quantity" => 2,
                    "total" => 3.34,
                    "size" => "S",
                    "color" => "White", "to" => ""
                ],
            ],
            "shipping_options" => [
                [
                    "selected" => true,
                    "id" => "surepost",
                    "estimated_delivery" => "Monday 10/05",
                    "name" => "USPS",
                    "amount" => "FREE",
                    "title" => "Surepost (usually 2-6 days)",
                    "description" => "Surepost (usually 2-6 days)",
                    "image" => base_site_url . "images/" . "surepost-logo.jpg",
                    "description_image" => base_site_url . "images/" . "surepost-logo.jpg"
                ],
                [
                    "selected" => false,
                    "id" => "ground",
                    "estimated_delivery" => "Monday 10/05",
                    "name" => "UPS Ground or FedEx",
                    "amount" => '$8.95',
                    "title" => "Ground Shipping estimated (1 to 3 days) FREE Over $99",
                    "description" => "Fastest Option (usually 1-3 days) Free over $99. Your order will Ship UPS or Fedex Ground or Local Ground carrier for fast delivery. This is an estimated delivery date based on past delivery with Ground shipping.",
                    "image" => base_site_url . "images/" . "surepost-logo.jpg",
                    "description_image" => base_site_url . "images/" . "surepost-logo.jpg"
                ],
                [
                    "selected" => false,
                    "id" => "ground",
                    "estimated_delivery" => "Monday 10/06",
                    "name" => "UPS Ground or FedEx",
                    "amount" => '$9.00',
                    "title" => "Ground Shipping estimated (1 to 3 days) FREE Over $99",
                    "description" => "Fastest Option (usually 1-3 days) Free over $99. Your order will Ship UPS or Fedex Ground or Local Ground carrier for fast delivery. This is an estimated delivery date based on past delivery with Ground shipping.",
                    "image" => base_site_url . "images/" . "surepost-logo.jpg",
                    "description_image" => base_site_url . "images/" . "surepost-logo.jpg"
                ]
            ]
        ]
    ];


    function shippingSummaryText($items)
    {
        $max_show = 2;
        $length = count($items);
        $sliced = array_slice($items, 0, $max_show);
        $text = [];


        foreach ($sliced as $item) {
            array_push($text, $item['brand'] . ' ' . $item['styleName']);
        }

        $final_text = join(',', $text);

        if ($length > $max_show) {
            $more_item_count = $length - $max_show;

            $final_text = "$final_text and $more_item_count more.";
        }

        return $final_text;
    };



    ?>

    <main>
        <div class="container mt-5">
            <?php foreach ($shipping_groups as $item) : ?>
                <?php $shipping_group = $item;
                include('./components/checkout/shipping-group.php') ?>
            <?php endforeach ?>
        </div>
    </main>

    <?php include('./components/layout/footer.php') ?>
    <script src="assets/js/cart.js"></script>


    <script>
        $(".shipping-group-toggle").on('click', function() {
            var parent = $(this).closest('.shipping-group');
            var self = $(this);
            var listEl = parent.find('.shipping-group-list');
            var headerEl = parent.find('.shipping-group-images, .shipping-group-text');
            if ($(this).hasClass('more')) {
                self.text('View').removeClass('more');
                listEl.hide();
                headerEl.css('opacity', 1);
            } else {
                self.text('Hide').addClass('more')
                listEl.show();
                headerEl.css('opacity', 0);
            }
        })
    </script>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.4/jspdf.plugin.autotable.min.js"></script> -->
</body>


</html>