<?php

define('base_url_site', '/bulkapparel-pagecuts/printing-tools.php?slug=');
$current_slug = $_GET['slug'];

function generatePrintingUrl($slug) {
    return base_url_site . $slug;
}

$pages = [
    [
        "name" => "Alstyle",
        "slug" => "alstyle-screen-preview",
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

    ],
    [
        "name" => "jerzees",
        "slug" => "jerzees-resource-center",
        "sub_pages" => [
            [
                "name" => "Take Advantage of Texture",
                "slug" => "resources-take-advantage-of-texture"
            ],
            [
                "name" => "Getting Back to Basic",
                "slug" => "resource-getting-back-to-basic"
            ],
            [
                "name" => "secret printing on 50/50 shirts",
                "slug" => "resources-secret-printing-on-50-50-shirts"
            ],
            [
                "name" => "print- riendly artwork",
                "slug" => "resources-print-friendly-artwork"
            ],
            [
                "name" => "maintaining ink formula logs",
                "slug" => "resources-maintaining-ink-formula-logs"
            ]
        ],
    ]
];

$pages_list = [];
$pages_length = -1;
$page_pos = 0;
$current_page = null;
$current_page_parent = null; 

function pageValues($item, $parent = null)
{
    global $pages_list, $pages_length, $page_pos, $current_slug, $current_page, $current_page_parent;

    array_push(
        $pages_list,
        [
            'name' => $item['name'],
            'slug' => $item['slug'],
            'parent_slug' => $parent && $parent['slug']
        ]
    );

    $pages_length++;

    if ($item['slug'] == $current_slug) {
        $page_pos = $pages_length;
        $current_page = $item;
        $current_page_parent = $parent;
    };
}

foreach ($pages as $item) {
    pageValues($item, $item);
    foreach ($item['sub_pages'] as $sub_pages) {
        pageValues($sub_pages, $item);
    }
}

if ($page_pos >= 0) {
   

    if ($page_pos > 0) {
        $prev_page = $pages_list[$page_pos - 1];
    }

    if ($page_pos < $pages_length) {
        $next_page = $pages_list[$page_pos + 1];
    }
}
?>


<div class="printing-tools__wrapper">
    <div class="printing-tools__sidebar">
        <?php $pages = $pages;
        include('printing-tools-sidebar.php') ?>
    </div>

    <div class="printing-tools__main">
        <div class="printing-tools__menu">
            <?php include('printing-tools-menu.php') ?>
        </div>

        <div class="printing-tools__breadcrumb">
            <?php include('printing-tools-breadcrumb.php') ?>
        </div>

        <div class="printing-tools__content">
            <?php include('printing-tools-content.php') ?>
        </div>

        <div class="printing-tools__pagination">
            <?php $pages = $pages;
            include('printing-tools-pagination.php') ?>
        </div>
    </div>
</div>


<script>
    var printingToolSidebar = $('#printingToolSidebar');


    printingToolSidebar.find('.btn-menu-opener').on('click', function() {
        $(this).parent().parent().toggleClass('open');
    })


    var printingToolSidebarBackdrop = $('#printingToolSidebarBackdrop')
    var printingToolsBurgerBtn = $('#printingToolsBurger')


    function togglePritingSidebar() {
        printingToolSidebarBackdrop.toggleClass('open')
        printingToolSidebar.toggleClass('open')

    }

    printingToolsBurgerBtn.on('click', function() {
        togglePritingSidebar();
    })

    printingToolSidebarBackdrop.on('click', function() {
        togglePritingSidebar();
    })
</script>