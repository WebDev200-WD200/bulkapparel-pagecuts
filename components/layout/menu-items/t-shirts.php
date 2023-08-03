<?php
$shopByStyle = [
    [
        "image" => "https://300dev.bulkapparel.com/image//bulk-blank-shirts/10722_fm.jpg",
        "title" => "Short-Sleeve",
        "to" => "/tshirts-mens-shortsleeves"
    ],
    [
        "image" => "https://300dev.bulkapparel.com/image//bulk-blank-shirts/135_fm.jpg",
        "title" => "Long-Sleeve",
        "to" => "/longsleeves-tshirts"
    ],
    [
        "image" => "https://300dev.bulkapparel.com/image//bulk-blank-shirts/6534_fm.jpg",
        "title" => "Three-Quarter Sleeve",
        "to" => "/styles?q=three+quarter"
    ],
    [
        "image" => "https://300dev.bulkapparel.com/image//bulk-blank-shirts/3180_fm.jpg",
        "title" => "Tank-Tops",
        "to" => "/tshirts-tanktops"
    ],
    [
        "image" => "https://300dev.bulkapparel.com/image//bulk-blank-shirts/3461_fm.jpg",
        "title" => "V-Neck",
        "to" => "/tshirts-vneck"
    ],
    [
        "image" => "https://www.bulkapparel.com/image/bulk-blank-shirts/145_fm.jpg",
        "title" => "Activewear",
        "to" => "/tshirts-cottonover50-athletics"
    ],
    [
        "image" => "https://300dev.bulkapparel.com/image//bulk-blank-shirts/16_fm.jpg",
        "title" => "View All T-Shirts",
        "to" => "/tshirts"
    ],
];


$shopByGender = [
    [
        "image" => "https://300dev.bulkapparel.com/image//bulk-blank-shirts/16_fm.jpg",
        "title" => "Men & Unisex",
        "to" => "/tshirts?sfid=mens"
    ],
    [
        "image" => "https://300dev.bulkapparel.com/image//bulk-blank-shirts/3898_fm.jpg",
        "title" => "Womens",
        "to" => "/tshirts?sfid=womens"
    ],
    [
        "image" => "https://300dev.bulkapparel.com/image//bulk-blank-shirts/540_fm.jpg",
        "title" => "Youth",
        "to" => "/tshirts?sfid=youth"
    ],
    [
        "image" => "https://300dev.bulkapparel.com/image//bulk-blank-shirts/6167_fm.jpg",
        "title" => "Infant & Toddlers",
        "to" => "/tshirts?sfid=youth"
    ],
];

$shopByCategory = [
    [
        "title" => "New Arrivals",
        "to" => "/new-arrivals"
    ],
    [
        "title" => "Best Sellers",
        "to" => "/best-sellers"
    ],
    [
        "title" => "Sale",
        "to" => "/sale"
    ],
    [
        "title" => "Closeouts",
        "to" => "/closeouts"
    ],
];

$shopByCustomMethod = [
    [
        "title" => "Direct to Garment",
        "to" => "/"
    ],
    [
        "title" => "Embroidery",
        "to" => "/"
    ],
    [
        "title" => "Heat Transfer Vinyl",
        "to" => "/"
    ],
    [
        "title" => "Screen Printing",
        "to" => "/"
    ],
    [
        "title" => "Sublimation",
        "to" => "/"
    ],
    [
        "title" => "Tie Dye",
        "to" => "/"
    ],
];

$shopByColor = [
    [
        "title" => "White",
        "to" => "/"
    ],
    [
        "title" => "Gray",
        "to" => "/"
    ],
    [
        "title" => "Black",
        "to" => "/"
    ],
    [
        "title" => "Heathers",
        "to" => "/"
    ],
    [
        "title" => "Saferty",
        "to" => "/"
    ],
    [
        "title" => "Camo",
        "to" => "/"
    ],
    [
        "title" => "Neon",
        "to" => "/"
    ],
    [
        "title" => "Tie-Dye",
        "to" => "/"
    ],

];

$shopByBrands = [
    [
        "image" => "https://300dev.bulkapparel.com/image/brand/large/35_fm.jpg",
        "title" => "Gildan",
        "to" => "/gildan"
    ],
    [
        "image" => "https://300dev.bulkapparel.com/image/brand/large/5_fm.jpg",
        "title" => "Bella + Canvas",
        "to" => "/bella-canvas"
    ],
    [
        "image" => "https://300dev.bulkapparel.com/image/brand/medium/23_fm.jpg",
        "title" => "Jer",
        "to" => "/"
    ],
    [
        "image" => "https://300dev.bulkapparel.com/image/brand/large/1_fm.png",
        "title" => "Hanes",
        "to" => "/hanes"
    ],
    [
        "image" => "https://300dev.bulkapparel.com/image/brand/large/123_fm.jpg",
        "title" => "Next Level",
        "to" => "/next-level"
    ],
    [
        "image" => "https://300dev.bulkapparel.com/image/brand/large/9_fm.jpg",
        "title" => "Fruit of the Loom",
        "to" => "/fruit-of-the-loom"
    ],
    [
        "image" => "https://300dev.bulkapparel.com/image/brand/large/8_fm.jpg",
        "title" => "Comfort Colors",
        "to" => "/comfort-colors"
    ],
    [
        "image" => "https://300dev.bulkapparel.com/image/brand/large/51_fm.jpg",
        "title" => "Alternative  ",
        "to" => "/alternative"
    ],
    [
        "image" => "https://300dev.bulkapparel.com/image/brand/medium/201_fm.jpg",
        "title" => "Tultex",
        "to" => "/tultex"
    ],

]

?>

<div class="mega-menu">

    <div class="new-menu">
        <div class="new-menu__col-wide">
            <h2>Shop by Style</h2>


            <ul class="items-with-image">
                <?php foreach ($shopByStyle as $item) : ?>
                    <li>
                        <a href="<?= $item['to'] ?>">
                            <img src="<?= $item['image'] ?>" />

                            <p><?= $item['title'] ?></p>
                        </a>
                    </li>

                <?php endforeach ?>
            </ul>
        </div>
        <div class="new-menu__col-wide">
            <h2>Shop by Gender</h2>

            <ul class="items-with-image">
                <?php foreach ($shopByGender as $item) : ?>
                    <li>
                        <a href="<?= $item['to'] ?>">
                            <img src="<?= $item['image'] ?>" />

                            <p><?= $item['title'] ?></p>
                        </a>
                    </li>

                <?php endforeach ?>
            </ul>
        </div>
        <div class="new-menu__col-wide">
            <div class="row">
                <div class="col-12">
                    <h2>Shop by Category</h2>

                    <ul class="items-with-text">
                        <?php foreach ($shopByCategory as $item) : ?>
                            <li>
                                <a href="<?= $item['to'] ?>">
                                    <p><?= $item['title'] ?></p>
                                </a>
                            </li>

                        <?php endforeach ?>
                    </ul>
                </div>

                <div class="col-12 mt-2">
                    <h2>Shop by Custom Method</h2>

                    <ul class="items-with-text">
                        <?php foreach ($shopByCustomMethod as $item) : ?>
                            <li>
                                <a href="<?= $item['to'] ?>">
                                    <p><?= $item['title'] ?></p>
                                </a>
                            </li>

                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="new-menu__col-base">
            <div class="row">
                <div class="col-12">
                    <h2>Shop by Color</h2>

                    <ul class="items-with-text">
                        <?php foreach ($shopByColor as $item) : ?>
                            <li>
                                <a href="<?= $item['to'] ?>">
                                    <p><?= $item['title'] ?></p>
                                </a>
                            </li>

                        <?php endforeach ?>
                        <li>
                            <a href="/brands"><b>Shop All Colors</b></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="new-menu__col-thin align-center">
            <div class="row">
                <div class="col-12">
                    <h2>Shop by Brands</h2>

                    <ul class="items-only-image">
                        <?php foreach ($shopByBrands as $item) : ?>
                            <li>
                                <a href="<?= $item['to'] ?>" title="<?= $item['title'] ?>">
                                    <img src="<?= $item['image'] ?>" alt="<?= $item['title'] ?>" />
                                </a>
                            </li>
                        <?php endforeach ?>
                        <li>
                            <a href="/brands"><b>Shop All Brands</b></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>