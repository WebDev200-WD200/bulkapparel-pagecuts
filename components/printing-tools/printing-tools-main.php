<?php

$pages = [
    [
        "name" => "Alstyle",
        "slug" => "alstyle-screen-printing",
        "sub_pages" => [
            [
                "name" => "Screen Printing",
                "slug" => "alstyle-screen-printing"
            ],
            [
                "name" => "Foil Comfort",
                "slug" => "alstyle-foil-comfort"
            ],
            [
                "name" => "Heat Transfer",
                "slug" => "alstyle-heat-transfer"
            ],
            [
                "name" => "Embroidery",
                "slug" => "alstyle-embroidery"
            ],
            [
                "name" => "Direct to Garment",
                "slug" => "alstyle-direct-to-garment"
            ]
        ],

    ]

]


?>


<div class="printing-tools">
    <div class="printing-tools__sidebar">
        <?php $pages = $pages; include('printing-tools-sidebar.php') ?>
    </div>

    <div class="printing-tools__main">
    </div>
</div>