<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/shop-all-colors-page.css">
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
    <link id="theme" rel="stylesheet" href="./css/themes/independence-day.theme.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300&display=swap" rel="stylesheet">
</head>

<body>
    <?php

    include('./components/layout/header.php') ?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <main>
        <div class="browse-by-color-page shop-all-colors-page">
            <div class="container browse-by-color-page__container">
                <div class="browse-by-color-page__row row">
                    <div class="browse-by-color-page__sidebar col-md-3">
                        <div class="invisble-closing-button"> </div>
                        <ul class="choose-brand-list">
                            <li class="choose-brand-list__item">
                                <a href="Alstyle-Colors.php" class="choose-brand-list__link  is-active" data-brand-code="ALS" data-brand-id="brand_7">Shop by Color</a>
                            </li>
                            <li class="choose-brand-list__item">
                                <a href="American-Apparel-Colors.php" class="choose-brand-list__subheader" data-brand-code="AA" data-brand-id="brand_8">Other Colors</a>
                            </li>
                            <li class="choose-brand-list__item">
                                <a href="Comfort-Colors.php" class="choose-brand-list__link" data-brand-code="CC" data-brand-id="brand_9">Comfort</a>
                            </li>
                            <li class="choose-brand-list__item">
                                <a href="Gildan-Colors.php" class="choose-brand-list__link " data-brand-id="brand_6">Gildan</a>
                            </li>
                            <li class="choose-brand-list__item">
                                <a href="javascript:void(0)" class="btn--color-list-close"> Close </a>
                            </li>
                        </ul>

                    </div>
                    <div class="browse-by-color-page__content col-md-9">
                        <nav class="browse-by-color-page__breadcrumps" aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item"><a href="Alstyle-Colors.php">Shop by color</a></li>
                            </ul>
                        </nav>
                        <div class="browse-by-color-page__title">
                            <h1>More Colors. More Style. More Possibilities</h1>
                            <a href="javascript:void(0);" class="btn--brand-list"><svg viewbox="0 0 21 21" fill="#fff" xmlns="http://www.w3.org/2000/svg"><path d="M5.32 14.257a1 1 0 100 2 1 1 0 000-2zm12.06-4l1.23-1.23a3 3 0 000-4.24l-2.83-2.82a3 3 0 00-4.24 0l-1.22 1.23a3 3 0 00-3-2.94h-4a3 3 0 00-3 3v14a3 3 0 003 3h14a3 3 0 003-3v-4a3 3 0 00-2.94-3zm-9.06 7a1 1 0 01-1 1h-4a1 1 0 01-1-1v-14a1 1 0 011-1h4a1 1 0 011 1v14zm2-11.24l2.64-2.64a1 1 0 011.41 0l2.83 2.88a1 1 0 010 1.41l-2.88 2.88-4 3.95v-8.48zm8 11.24a1 1 0 01-1 1h-7.18c.103-.297.16-.607.17-.92l5.08-5.08h1.93a1 1 0 011 1v4z" /></svg> </a>
                        </div>

                        <div class="browse-by-color-page__description">
                            <p>Select a color below to see all of the products available in that palette. We have sport shirts, t-shirts, fleece, hats and bags in coordinating colors. Seeing them together makes it easy to outfit the entire group.</p>
                        </div>
                        <?php


                        $colors = [
                            [
                                "name" => "Blues",
                                "hex" => "#7695cb",
                                "group" => "blues",

                            ],
                            [
                                "name" => "Carolina Blue",
                                "hex" => "#3a5065",
                                "group" => "blues",

                            ],
                            [
                                "name" => "Iris",
                                "hex" => "#4e73a0",
                                "group" => "blues",

                            ],
                            [
                                "name" => "Light Blue",
                                "hex" => "#9cb8ce",
                                "group" => "blues",

                            ],
                            [
                                "name" => "Metro Blue",
                                "hex" => "#2a3e70",
                                "group" => "blues",

                            ],
                            [
                                "name" => "Navy",
                                "hex" => "#121429",
                                "group" => "blues",

                            ],
                            [
                                "name" => "Oceana",
                                "hex" => "#649099",
                                "group" => "blues",

                            ],
                            [
                                "name" => "Royal",
                                "hex" => "#1e61a7",
                                "group" => "blues",

                            ],
                            [
                                "name" => "Sapphire",
                                "hex" => "#007eb1",
                                "group" => "blues",

                            ],
                            [
                                "name" => "Sky",
                                "hex" => "#85c7df",
                                "group" => "blues",

                            ],
                            [
                                "name" => "Stone Blue",
                                "hex" => "#7e97b1",
                                "group" => "blues",

                            ],
                            [
                                "name" => "Green",
                                "hex" => "#008000",
                                "group" => "greens",

                            ],
                            [
                                "name" => "Forest",
                                "hex" => "#10271d",
                                "group" => "greens",

                            ],
                            [
                                "name" => "Irish",
                                "hex" => "#009d59",
                                "group" => "greens",

                            ],
                            [
                                "name" => "Jade Dome",
                                "hex" => "#109790",
                                "group" => "greens",

                            ],
                            [
                                "name" => "Kelly",
                                "hex" => "#009266",
                                "group" => "greens",

                            ],
                            [
                                "name" => "Kiwi",
                                "hex" => "#94aa6c",
                                "group" => "greens",

                            ],
                            [
                                "name" => "Lime",
                                "hex" => "#aad387",
                                "group" => "greens",

                            ],
                            [
                                "name" => "Military",
                                "hex" => "#56513d",
                                "group" => "greens",

                            ],
                            [
                                "name" => "Mint",
                                "hex" => "#8fd6ab",
                                "group" => "greens",

                            ],
                            [
                                "name" => "Pistachio",
                                "hex" => "#bdca9e",
                                "group" => "greens",

                            ],
                            [
                                "name" => "Safety",
                                "hex" => "#c5da7d",
                                "group" => "greens",

                            ],
                            [
                                "name" => "Sage",
                                "hex" => "#aeb89f",
                                "group" => "greens",

                            ],
                            [
                                "name" => "Gold",
                                "hex" => "#fab22a",
                                "group" => "oranges",

                            ],
                            [
                                "name" => "Orange",
                                "hex" => "#ec7229",
                                "group" => "oranges",

                            ],
                            [
                                "name" => "Safety Orange",
                                "hex" => "#f98122",
                                "group" => "oranges",

                            ],
                            [
                                "name" => "Salmon",
                                "hex" => "#efaf93",
                                "group" => "oranges",

                            ],
                            [
                                "name" => "Tangerine",
                                "hex" => "#f5853b",
                                "group" => "oranges",

                            ],
                            [
                                "name" => "Texas Orange",
                                "hex" => "#a85a34",
                                "group" => "oranges",

                            ],
                            [
                                "name" => "Cardinal Red",
                                "hex" => "#970f23",
                                "group" => "reds",

                            ],
                            [
                                "name" => "Maroon",
                                "hex" => "#4f1222",
                                "group" => "reds",

                            ],
                            [
                                "name" => "Paprika",
                                "hex" => "#ea4043",
                                "group" => "reds",

                            ],
                            [
                                "name" => "Red",
                                "hex" => "#dc1929",
                                "group" => "reds",

                            ],
                            [
                                "name" => "Brown",
                                "hex" => "#8d5c40",
                                "group" => "browns",

                            ],
                            [
                                "name" => "Chestnut",
                                "hex" => "#68463c",
                                "group" => "browns",

                            ],
                            [
                                "name" => "Dark Choc.",
                                "hex" => "#473231",
                                "group" => "browns",

                            ],
                            [
                                "name" => "Khaki",
                                "hex" => "#9a8779",
                                "group" => "browns",

                            ],
                            [
                                "name" => "Sand",
                                "hex" => "#c8b79b",
                                "group" => "browns",

                            ],
                            [
                                "name" => "Orchid",
                                "hex" => "#bfa8d6",
                                "group" => "purples",

                            ],
                            [
                                "name" => "Purple",
                                "hex" => "#4c3b6f",
                                "group" => "purples",

                            ],
                            [
                                "name" => "Violet",
                                "hex" => "#9093c6",
                                "group" => "purples",

                            ],
                            [
                                "name" => "Ash",
                                "hex" => "#cfc9c9",
                                "group" => "greys",

                            ],
                            [
                                "name" => "Black",
                                "hex" => "#010101",
                                "group" => "greys",

                            ],
                            [
                                "name" => "Charcoal",
                                "hex" => "#52494a",
                                "group" => "greys",

                            ],
                            [
                                "name" => "Gravel",
                                "hex" => "#888b8d",
                                "group" => "greys",

                            ],
                            [
                                "name" => "Silver",
                                "hex" => "#b5b1b2",
                                "group" => "greys",

                            ],
                            [
                                "name" => "Sport Grey",
                                "hex" => "#b0acad",
                                "group" => "greys",

                            ],
                            [
                                "name" => "Pink",
                                "hex" => "#faea84",
                                "group" => "pinks",

                            ],
                            [
                                "name" => "Azalea",
                                "hex" => "#de90a8",
                                "group" => "pinks",

                            ],
                            [
                                "name" => "Heliconia",
                                "hex" => "#dd3777",
                                "group" => "pinks",

                            ],
                            [
                                "name" => "Light Pink",
                                "hex" => "#fcdbe4",
                                "group" => "pinks",

                            ],
                            [
                                "name" => "Mauve",
                                "hex" => "#c28285",
                                "group" => "pinks",

                            ],
                            [
                                "name" => "Yellow",
                                "hex" => "#faea84",
                                "group" => "yellows",

                            ],
                            [
                                "name" => "Daisy",
                                "hex" => "#f7df75",
                                "group" => "yellows",

                            ],
                            [
                                "name" => "Safety Yellow",
                                "hex" => "#d2fd18",
                                "group" => "yellows",

                            ],
                            [
                                "name" => "Vegas Gold",
                                "hex" => "#d3a454",
                                "group" => "yellows",

                            ],
                            [
                                "name" => "Yellow Haze",
                                "hex" => "#fedaa0",
                                "group" => "yellows",

                            ],
                            [
                                "name" => "Natural",
                                "hex" => "#ede0cf",
                                "group" => "neautrals",

                            ],
                            [
                                "name" => "PFD White",
                                "hex" => "#eeedeb",
                                "group" => "neautrals",

                            ],
                            [
                                "name" => "White",
                                "hex" => "#ffffff",
                                "group" => "neautrals",

                            ]
                        ];


                        $groupColors = [];

                        array_map(function ($item) {
                            global $groupColors;

                            $colorgroup = $item['group'];

                            if (array_key_exists($colorgroup, $groupColors)) {
                                $old_items = $groupColors[$colorgroup]['items'];

                                $groupColors[$colorgroup]['items'] = array_merge($old_items, [$item]);
                            } else {
                                $groupColors[$colorgroup] = [
                                    'name' => $colorgroup,
                                    'items' => [$item]
                                ];
                            }
                        }, $colors);

                        ?>



                        <div class="shop-all-colors-list">
                            <?php foreach ($groupColors as $key => $group) : ?>
                                <div class="shop-all-colors-item">
                                    <div class="shop-all-colors-item__header">
                                        <h3><?= $group['name'] ?></h3>
                                    </div>

                                    <div class="shop-all-colors-item__colors">
                                        <ul>
                                            <?php foreach ($group['items'] as $key => $item) : ?>
                                                <li>
                                                    <a class="shop-all-colors-box" href="https://dev8888.bulkapparel.com/styles?color=<?= $item['name'] ?>">
                                                        <div class="shop-all-colors-box__color" style="background-color: <?= $item['hex'] ?>;">

                                                        </div>
                                                        <p class="shop-all-colors-box__name">
                                                            <?= $item['name'] ?>
                                                        </p>
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script type="text/javascript">
        $(".btn--brand-list").click(function(){
            $(".browse-by-color-page").addClass('browse-by-color-page--open');
            $(".choose-brand-list").addClass('choose-brand-list--open');
        });
        $(".btn--color-list-close,.invisble-closing-button").click(function(){
            $(".browse-by-color-page").removeClass('browse-by-color-page--open');
            $(".choose-brand-list--open").removeClass('choose-brand-list--open');
        });
    </script>


    <?php include('./components/layout/footer.php') ?>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.4/jspdf.plugin.autotable.min.js"></script> -->
</body>


</html>