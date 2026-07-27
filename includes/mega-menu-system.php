<?php

// if (is_file('/var/www/html/includes/functions.php')) {
//     require_once '/var/www/html/includes/functions.php';
// } elseif (is_file(__DIR__ . '/functions.php')) {
//     require_once __DIR__ . '/functions.php';
// }

/**
 * Centralized Mega Menu System
 * 
 * This file contains a config-driven mega menu architecture that allows each menu
 * to define its column layout, item types, and special behaviors through configuration
 * rather than hardcoded markup.
 * 
 * ARCHITECTURE:
 * - All menu data is stored in the $megaMenusConfig array
 * - Rendering is handled by reusable functions
 * - Layout differences come from config, not conditionals
 * 
 * REQUIRED HELPER FUNCTIONS:
 * These functions must be available in your codebase:
 * - menuProductImagePath($filename, $category = null, $size = null)
 * - menuColorImagePath($filename)
 * - brandImagePath($filename, $size = 'medium')
 * 
 * TO ADD A NEW MENU:
 * 1. Add a new entry to $megaMenusConfig with your menu key
 * 2. Define columns array with type, title, items, and any special options
 * 3. Call renderMegaMenu('your-menu-key') where needed
 * 
 * TO ADD A NEW COLUMN TYPE:
 * 1. Add the new type to renderColumn() function
 * 2. Create a render function for that type (e.g., renderColorColumn())
 * 3. Update the config schema documentation
 */

// ============================================================================
// CONFIGURATION DATA
// ============================================================================

$CATEGORY = 't-shirt';
$SIZE = 'size-35';

function menuProductImagePath( $image, $category = null, $size = null ) {
    return '/var/www/html/image/' . $image;
}

function brandImagePath( $image, $size = 'medium' ) {
    return '/var/www/html/image/' . $image;
}

function menuColorImagePath($image) {
    return '/var/www/html/image/' . $image;
}

$megaMenusConfig = [

    /**
     * T-SHIRTS MENU
     * Standard layout with image+text, text-only, color split, and brand columns
     */
    'tshirts' => [
        'title' => 'T-Shirts',
        'to' => '/tshirts',
        'containerClass' => 'mega-menu__col5',
        'columns' => [
            [
                'type' => 'image-text',
                'title' => 'Shop by Style',
                'titleLink' => '/tshirts',
                'items' => [
                    [
                        'image' => menuProductImagePath("16_fl.jpg"),
                        'title' => 'Short Sleeves',
                        'to' => '/tshirts-shortsleeves'
                    ],
                    [
                        'image' => menuProductImagePath("94_fl.jpg"),
                        'title' => 'Long Sleeves',
                        'to' => '/tshirts-longsleeves'
                    ],
                    [
                        'image' => menuProductImagePath("10705_fl.jpg"),
                        'title' => 'Three-Quarter Sleeve',
                        'to' => '/tshirts-threequartersleeve'
                    ],
                    [
                        'image' => menuProductImagePath("3216_fl.jpg"),
                        'title' => 'Tank-Tops',
                        'to' => '/tshirts-tanktops'
                    ],
                    [
                        'image' => menuProductImagePath("10689_fl.jpg"),
                        'title' => 'V-Necks',
                        'to' => '/tshirts-vneck'
                    ],
                    [
                        'image' => menuProductImagePath("3102_fl.jpg"),
                        'title' => 'Crop Tops',
                        'to' => '/tshirts-croptops'
                    ],
                    [
                        'image' => menuProductImagePath("155_fl.jpg"),
                        'title' => 'Pockets',
                        'to' => '/tshirts-pockets'
                    ],
                    [
                        'image' => menuProductImagePath("21_fl.jpg"),
                        'title' => 'Activewear',
                        'to' => '/tshirts-activewear'
                    ],
                    [
                        'image' => menuProductImagePath("7340_fl.jpg"),
                        'title' => 'Safety',
                        'to' => '/tshirts-safety'
                    ],
                    [
                        'image' => menuProductImagePath("10829_fl.jpg"),
                        'title' => 'USA Made',
                        'to' => '/tshirts-usamade'
                    ],
                    [
                        'image' => menuProductImagePath("33_fl.jpg"),
                        'title' => 'View All T-Shirts',
                        'to' => '/tshirts',
                        'className' => 'shop-all',
                        'viewAll' => true
                    ]
                ],
                'options' => [
                    'hideLastChild' => true,
                    'width' => '25%'
                ]
            ],
            [
                'type' => 'image-text',
                'title' => 'Shop By Fit',
                'titleLink' => '/tshirts',
                'items' => [
                    [
                        'image' => menuProductImagePath("9440_fl.jpg"),
                        'title' => 'Mens',
                        'to' => '/tshirts-mens'
                    ],
                    [
                        'image' => menuProductImagePath("2115_fl.jpg"),
                        'title' => 'Womens',
                        'to' => '/tshirts-womens'
                    ],
                    [
                        'image' => menuProductImagePath("8168_fl.jpg"),
                        'title' => 'Unisex',
                        'to' => '/tshirts-unisex'
                    ],
                    [
                        'image' => menuProductImagePath("2485_fl.jpg"),
                        'title' => 'Youth',
                        'to' => '/tshirts-youth'
                    ],
                    [
                        'image' => menuProductImagePath("2573_fl.jpg"),
                        'title' => 'Infants & Toddlers',
                        'to' => '/tshirts-infantstoddlers'
                    ],
                    [
                        'title' => 'Shop All Fit',
                        'to' => '/tshirts',
                        'className' => 'shop-all',
                        'viewAll' => true
                    ]
                ],
                'options' => [
                    'width' => '25%'
                ]
            ],
            [
                'type' => 'text-only',
                'title' => 'Shop by Fabric',
                'titleLink' => '/tshirts',
                'items' => [
                    [
                        'title' => 'Blends',
                        'to' => '/tshirts?fabrics=blends'
                    ],
                    [
                        'title' => 'Cotton - 100%',
                        'to' => '/tshirts?fabrics=cotton100'
                    ],
                    [
                        'title' => 'Eco-Friendly',
                        'to' => '/tshirts?fabrics=ecofriendly'
                    ],
                    [
                        'title' => 'Performance',
                        'to' => '/tshirts?fabrics=performance'
                    ],
                    [
                        'title' => 'Polyester',
                        'to' => '/tshirts?fabrics=polyester'
                    ],
                    [
                        'title' => 'Shop All Fabric',
                        'to' => '/tshirts',
                        'className' => 'shop-all'
                    ]
                ],
                'options' => [
                    'width' => '25%'
                ]
            ],
            [
                'type' => 'color-split',
                'title' => 'Shop by Color',
                'titleLink' => '/shop-by-color',
                'items' => [
                    [
                        'title' => 'Whites',
                        'image' => menuColorImagePath("7229_fm.jpg"),
                        'to' => colorFamilyUrls('tshirts')['Whites']['to']
                    ],
                    [
                        'title' => 'Blacks',
                        'image' => menuColorImagePath("6418_fm.jpg"),
                        'to' => colorFamilyUrls('tshirts')['Blacks']['to']
                    ],
                    [
                        'title' => 'Greys',
                        'image' => menuColorImagePath("8520_fm.jpg"),
                        'to' => colorFamilyUrls('tshirts')['Greys']['to']
                    ],
                    [
                        'title' => 'Heathers',
                        'image' => menuColorImagePath("13386_fm.jpg"),
                        'to' => colorFamilyUrls('tshirts')['Heather']['to']
                    ],
                    [
                        'title' => 'Neutrals',
                        'image' => menuColorImagePath("8756_fm.jpg"),
                        'to' => colorFamilyUrls('tshirts')['Neutrals']['to']
                    ],
                    [
                        'title' => 'Hi-Vis',
                        'image' => menuColorImagePath("6532_fm.jpg"),
                        'to' => colorFamilyUrls('tshirts')['HiVis']['to']
                    ],
                    [
                        'title' => 'Camo',
                        'image' => menuColorImagePath("29157_fm.jpg"),
                        'to' => colorFamilyUrls('tshirts')['Camouflage']['to']
                    ],
                    [
                        'title' => 'Tie-Dye',
                        'image' => menuColorImagePath("15161_fm.jpg"),
                        'to' => colorFamilyUrls('tshirts')['Tie-Dye']['to']
                    ],
                    [
                        'title' => 'Blues',
                        'image' => menuColorImagePath("8373_fm.jpg"),
                        'to' => colorFamilyUrls('tshirts')['Blues']['to']
                    ],
                    [
                        'title' => 'Greens',
                        'image' => menuColorImagePath("8523_fm.jpg"),
                        'to' => colorFamilyUrls('tshirts')['Greens']['to']
                    ],
                    [
                        'title' => 'Oranges',
                        'image' => menuColorImagePath("6609_fm.jpg"),
                        'to' => colorFamilyUrls('tshirts')['Oranges']['to']
                    ],
                    [
                        'title' => 'Reds',
                        'image' => menuColorImagePath("5744_fm.jpg"),
                        'to' => colorFamilyUrls('tshirts')['Reds']['to']
                    ],
                    [
                        'title' => 'Browns',
                        'image' => menuColorImagePath("10061_fm.jpg"),
                        'to' => colorFamilyUrls('tshirts')['Browns']['to']
                    ],
                    [
                        'title' => 'Purples',
                        'image' => menuColorImagePath("6662_fm.jpg"),
                        'to' => colorFamilyUrls('tshirts')['Purples']['to']
                    ],
                    [
                        'title' => 'Pinks',
                        'image' => menuColorImagePath("8203_fm.jpg"),
                        'to' => colorFamilyUrls('tshirts')['Pinks']['to']
                    ],
                    [
                        'title' => 'Yellows',
                        'image' => menuColorImagePath("8977_fm.jpg"),
                        'to' => colorFamilyUrls('tshirts')['Yellows']['to']
                    ]
                ],
                'options' => [
                    'width' => '25%',
                    'shopAllLink' => [
                        'text' => 'Shop All Colors',
                        'to' => '/shop-by-color'
                    ]
                ]
            ],
            [
                'type' => 'brand-grid',
                'title' => 'Shop by Brands',
                'titleLink' => '/brands',
                'items' => [
                    [
                        'image' => brandImagePath("35_fm.jpg", 'large'),
                        'title' => 'Gildan',
                        'to' => '/tshirts?brand=gildan'
                    ],
                    [
                        'image' => brandImagePath("123_fm.jpg", 'large'),
                        'title' => 'Next Level',
                        'to' => '/tshirts?brand=next-level'
                    ],
                    [
                        'image' => brandImagePath("8_fm.jpg", 'large'),
                        'title' => 'Comfort Colors',
                        'to' => '/tshirts?brand=comfort-colors'
                    ],
                    [
                        'image' => brandImagePath("5_fm.jpg", 'large'),
                        'title' => 'Bella + Canvas',
                        'to' => '/tshirts?brand=bella-canvas'
                    ],
                    [
                        'image' => brandImagePath("23_fm.jpg", 'large'),
                        'title' => 'Jerzees',
                        'to' => '/tshirts?brand=jerzees'
                    ]
                ],
                'options' => [
                    'shopAllLink' => [
                        'text' => 'Shop All Brands',
                        'to' => '/brands'
                    ],
                    'alignCenter' => true
                ]
            ]
        ]
    ],

    /**
     * OUTERWEAR/JACKETS MENU
     * Example of nested columns (one column containing two sub-columns)
     */
    'outerwear' => [
        'title' => 'Outerwear',
        'to' => '/outerwear',
        'containerClass' => 'mega-menu__col6',
        'columns' => [
            [
                'type' => 'image-text',
                'title' => 'Shop by Style',
                'titleLink' => '/outerwear',
                'items' => [
                    [
                        'image' => menuProductImagePath("69358_omf_fl.jpg", 'outerwear'),
                        'title' => 'Full Zips',
                        'to' => '/outerwear-fullzips'
                    ],
                    [
                        'image' => menuProductImagePath("97344_omf_fl.jpg", 'outerwear'),
                        'title' => 'Quarter-Zips',
                        'to' => '/outerwear-quarterzips'
                    ],
                    [
                        'image' => menuProductImagePath("3324_fl.jpg", 'outerwear'),
                        'title' => 'Water Resistant',
                        'to' => '/outerwear-waterresistant'
                    ],
                    [
                        'image' => menuProductImagePath("52994_omf_fl.jpg", 'outerwear'),
                        'title' => 'Windbreakers',
                        'to' => '/outerwear-windbreakers'
                    ],
                    [
                        'image' => menuProductImagePath("96673_omf_fl.jpg", 'outerwear'),
                        'title' => 'Puffers',
                        'to' => '/outerwear-puffers'
                    ],
                    [
                        'image' => menuProductImagePath("85824_omf_fl.jpg", 'outerwear'),
                        'title' => 'Packables',
                        'to' => '/outerwear-packables'
                    ],
                    [
                        'image' => menuProductImagePath("10664_fl.jpg", 'outerwear'),
                        'title' => 'Soft Shell',
                        'to' => '/outerwear-softshell'
                    ],
                    [
                        'image' => menuProductImagePath("24419_omf_fl.jpg", 'outerwear'),
                        'title' => 'Hooded',
                        'to' => '/outerwear-hoodies'
                    ],
                    [
                        'image' => menuProductImagePath("88382_omf_fl.jpg", 'outerwear'),
                        'title' => 'Cuffed / Cuff',
                        'to' => '/outerwear-cuffedcuffs'
                    ],
                    [
                        'title' => 'View All Outerwear',
                        'to' => '/outerwear',
                        'viewAll' => true
                    ]
                ],
                'options' => [
                    'hideLastChild' => true
                ]
            ],
            [
                'type' => 'image-text',
                'title' => 'Shop by Category',
                'titleLink' => '/outerwear',
                'items' => [
                    [
                        'image' => menuProductImagePath("91399_omf_fl.jpg", 'outerwear'),
                        'title' => 'Jackets',
                        'to' => '/outerwear-jackets'
                    ],
                    [
                        'image' => menuProductImagePath("68075_oms_fl.jpg", 'outerwear'),
                        'title' => 'Vests',
                        'to' => '/outerwear-vests'
                    ],
                    [
                        'image' => menuProductImagePath("68044_omf_fl.jpg", 'outerwear'),
                        'title' => 'Fleece',
                        'to' => '/outerwear-fleece'
                    ],
                    [
                        'image' => menuProductImagePath("96342_omf_fl.jpg", 'outerwear'),
                        'title' => 'Pullovers',
                        'to' => '/outerwear-pullovers'
                    ],
                    [
                        'image' => menuProductImagePath("11789_fl.jpg", 'outerwear'),
                        'title' => 'Headwear',
                        'to' => '/outerwear-headwear'
                    ],
                    [
                        'image' => menuProductImagePath("2436_fm.jpg", 'outerwear'),
                        'title' => 'Workwear',
                        'to' => '/outerwear-workwear'
                    ],
                    [
                        'image' => menuProductImagePath("10187_fl.jpg", 'outerwear'),
                        'title' => 'Activewear',
                        'to' => '/outerwear-activewear'
                    ],
                    [
                        'image' => menuProductImagePath("4454_fl.jpg", 'outerwear'),
                        'title' => 'High-Viz',
                        'to' => '/outerwear-highvisibility'
                    ],
                    [
                        'image' => menuProductImagePath("6331_fl.jpg", 'outerwear'),
                        'title' => 'Accessories',
                        'to' => '/outerwear-accessories'
                    ],
                    [
                        'title' => 'Shop All Category',
                        'to' => '/outerwear',
                        'className' => 'shop-all',
                        'viewAll' => true
                    ]
                ]
            ],
            [
                'type' => 'image-text',
                'title' => 'Shop By Fit',
                'titleLink' => '/outerwear',
                'items' => [
                    [
                        'image' => menuProductImagePath("8967_fl.jpg", 'outerwear'),
                        'title' => 'Mens',
                        'to' => '/outerwear-mens'
                    ],
                    [
                        'image' => menuProductImagePath("89315_omf_fl.jpg", 'outerwear'),
                        'title' => 'Womens',
                        'to' => '/outerwear-womens'
                    ],
                    [
                        'image' => menuProductImagePath("75316_omf_fl.jpg", 'outerwear'),
                        'title' => 'Unisex',
                        'to' => '/outerwear-unisex'
                    ],
                    [
                        'image' => menuProductImagePath("77180_omf_fl.jpg", 'outerwear'),
                        'title' => 'Youth',
                        'to' => '/outerwear-youth'
                    ],
                    [
                        'title' => 'Shop All Fit',
                        'to' => '/outerwear',
                        'className' => 'shop-all',
                        'viewAll' => true
                    ]
                ]
            ],
            [
                'type' => 'text-only',
                'title' => 'Shop by Fabric',
                'titleLink' => '/outerwear',
                'items' => [
                    [
                        'title' => 'Cotton - 100%',
                        'to' => '/outerwear?fabrics=cotton100'
                    ],
                    [
                        'title' => 'Nylon',
                        'to' => '/outerwear?fabrics=nylon'
                    ],
                    [
                        'title' => 'Performance',
                        'to' => '/outerwear?fabrics=performance'
                    ],
                    [
                        'title' => 'Polyester',
                        'to' => '/outerwear?fabrics=polyester'
                    ]
                ],
                'options' => [
                    'shopAllLink' => [
                        'text' => 'Shop All Fabric',
                        'to' => '/outerwear'
                    ]
                ]
            ],
            [
                'type' => 'color-split',
                'title' => 'Shop by Color',
                'titleLink' => '/shop-by-color',
                'items' => [
                    [
                        'title' => 'Blacks',
                        'image' => menuColorImagePath("6418_fm.jpg"),
                        'to' => colorFamilyUrls('outerwear')['Blacks']['to']
                    ],
                    [
                        'title' => 'Greys',
                        'image' => menuColorImagePath("8520_fm.jpg"),
                        'to' => colorFamilyUrls('outerwear')['Greys']['to']
                    ],
                    [
                        'title' => 'Neutrals',
                        'image' => menuColorImagePath("8756_fm.jpg"),
                        'to' => colorFamilyUrls('outerwear')['Neutrals']['to']
                    ],
                    [
                        'title' => 'Hi-Vis',
                        'image' => menuColorImagePath("6532_fm.jpg"),
                        'to' => colorFamilyUrls('outerwear')['HiVis']['to']
                    ],
                    [
                        'title' => 'Camo',
                        'image' => menuColorImagePath("29157_fm.jpg"),
                        'to' => colorFamilyUrls('outerwear')['Camouflage']['to']
                    ],
                    [
                        'title' => 'Tie-Dye',
                        'image' => menuColorImagePath("15161_fm.jpg"),
                        'to' => colorFamilyUrls('outerwear')['Tie-Dye']['to']
                    ],
                    [
                        'title' => 'Greens',
                        'image' => menuColorImagePath("8523_fm.jpg"),
                        'to' => colorFamilyUrls('outerwear')['Greens']['to']
                    ],
                    [
                        'title' => 'Oranges',
                        'image' => menuColorImagePath("6609_fm.jpg"),
                        'to' => colorFamilyUrls('outerwear')['Oranges']['to']
                    ],
                    [
                        'title' => 'Reds',
                        'image' => menuColorImagePath("5744_fm.jpg"),
                        'to' => colorFamilyUrls('outerwear')['Reds']['to']
                    ],
                    [
                        'title' => 'Browns',
                        'image' => menuColorImagePath("10061_fm.jpg"),
                        'to' => colorFamilyUrls('outerwear')['Browns']['to']
                    ],
                    [
                        'title' => 'Purples',
                        'image' => menuColorImagePath("6662_fm.jpg"),
                        'to' => colorFamilyUrls('outerwear')['Purples']['to']
                    ],
                    [
                        'title' => 'Pinks',
                        'image' => menuColorImagePath("8203_fm.jpg"),
                        'to' => colorFamilyUrls('outerwear')['Pinks']['to']
                    ]
                ],
                'options' => [
                    'twoColumns' => true,
                    'shopAllLink' => [
                        'text' => 'Shop All Colors',
                        'to' => '/shop-by-color'
                    ]
                ]
            ],
            [
                'type' => 'brand-grid',
                'title' => 'Shop by Brands',
                'titleLink' => '/brands',
                'items' => [
                    [
                        'image' => brandImagePath("31_fm.jpg", 'medium'),
                        'title' => 'Adidas',
                        'to' => '/outerwear?brand=adidas'
                    ],
                    [
                        'image' => brandImagePath("38_fm.jpg", 'medium'),
                        'title' => 'Independent',
                        'to' => '/outerwear?brand=independent-trading-co'
                    ],
                    [
                        'image' => brandImagePath("149_fm.jpg", 'medium'),
                        'title' => 'Columbia',
                        'to' => '/outerwear?brand=columbia'
                    ],
                    [
                        'image' => brandImagePath("36_fm.jpg", 'medium'),
                        'title' => 'Dri-Duck',
                        'to' => '/outerwear?brand=dri-duck'
                    ],
                    [
                        'image' => brandImagePath("22_fm.jpg", 'medium'),
                        'title' => 'Augusta',
                        'to' => '/outerwear?brand=augusta-sportswear'
                    ],
                    [
                        'image' => brandImagePath("30_fm.jpg", 'medium'),
                        'title' => 'Weatherproof',
                        'to' => '/outerwear?brand=weatherproof'
                    ],
                    [
                        'image' => brandImagePath("120_fm.jpg", 'medium'),
                        'title' => 'Burnside',
                        'to' => '/outerwear?brand=burnside'
                    ]
                ],
                'options' => [
                    'shopAllLink' => [
                        'text' => 'Shop All Brands',
                        'to' => '/brands'
                    ],
                    'alignCenter' => true
                ]
            ]
        ]
    ],

    /**
     * HEADWEAR/HATS MENU
     * Example with larger images and different styling
     */
    'headwear' => [
        'title' => 'Hats',
        'to' => '/headwear',
        'containerClass' => 'mega-menu__col6',
        'columns' => [
            [
                'type' => 'image-text',
                'title' => 'Shop by Style',
                'titleLink' => '/headwear',
                'items' => [
                    [
                        'image' => menuProductImagePath("62936_d_fm.jpg", 'headwear'),
                        'title' => 'Five-Panel',
                        'to' => '/headwear-fivepanel'
                    ],
                    [
                        'image' => menuProductImagePath("71430_d_fl.jpg", 'headwear'),
                        'title' => 'Six-Panel',
                        'to' => '/headwear-sixpanel'
                    ],
                    [
                        'image' => menuProductImagePath("29425_fm.jpg", 'headwear'),
                        'title' => 'Snapbacks',
                        'to' => '/headwear-snapback'
                    ],
                    [
                        'image' => menuProductImagePath("95360_f_fl.jpg", 'headwear'),
                        'title' => 'Buckets',
                        'to' => '/headwear-bucket'
                    ],
                    [
                        'image' => menuProductImagePath("70989_d_fm.jpg", 'headwear'),
                        'title' => 'Structured',
                        'to' => '/headwear-structured'
                    ],
                    [
                        'image' => menuProductImagePath("27796_d_fl.jpg", 'headwear'),
                        'title' => 'Unstructured',
                        'to' => '/headwear-unstructured'
                    ],
                    [
                        'image' => menuProductImagePath("71079_d_fl.jpg", 'headwear'),
                        'title' => 'Adjustable',
                        'to' => '/headwear-adjustable'
                    ],
                    [
                        'image' => menuProductImagePath("84655_d_fm.jpg", 'headwear'),
                        'title' => 'Fitted',
                        'to' => '/headwear-fitted'
                    ],
                    [
                        'image' => menuProductImagePath("43370_f_fl.jpg", 'headwear'),
                        'title' => 'Knit',
                        'to' => '/headwear-knit'
                    ],
                    [
                        'image' => menuProductImagePath("95382_d_fm.jpg", 'headwear'),
                        'title' => 'Truckers',
                        'to' => '/headwear-truckers'
                    ],
                    [
                        'image' => menuProductImagePath("100648_d_fl.jpg", 'headwear'),
                        'title' => 'Rope',
                        'to' => '/headwear-rope'
                    ],
                    [
                        'title' => 'View All Headwear',
                        'to' => '/headwear',
                        'viewAll' => true
                    ]
                ],
                'options' => [
                    'hideLastChild' => true,
                    'listClass' => 'last-list-none'
                ]
            ],
            [
                'type' => 'image-text',
                'title' => 'Shop by Category',
                'titleLink' => '/headwear',
                'items' => [
                    [
                        'image' => menuProductImagePath("96447_f_fl.jpg", 'headwear'),
                        'title' => 'Beanies',
                        'to' => '/headwear-beanies'
                    ],
                    [
                        'image' => menuProductImagePath("20614_f_fl.jpg", 'headwear'),
                        'title' => 'Visors',
                        'to' => '/headwear-visor'
                    ],
                    [
                        'image' => menuProductImagePath("82320_d_fl.jpg", 'headwear'),
                        'title' => 'Flat Bills',
                        'to' => '/headwear-flatbills'
                    ],
                    [
                        'image' => menuProductImagePath("20491_d_fm.jpg", 'headwear'),
                        'title' => 'Low Profile',
                        'to' => '/headwear-lowprofiles'
                    ],
                    [
                        'image' => menuProductImagePath("81957_d_fm.jpg", 'headwear'),
                        'title' => 'Mid Profile',
                        'to' => '/headwear-midprofiles'
                    ],
                    [
                        'image' => menuProductImagePath("44995_d_fm.jpg", 'headwear'),
                        'title' => 'High Profile',
                        'to' => '/headwear-highprofiles'
                    ],
                    [
                        'image' => menuProductImagePath("33652_d_fl.jpg", 'headwear'),
                        'title' => 'Safety',
                        'to' => '/headwear-safety'
                    ],
                    [
                        'image' => menuProductImagePath("100639_d_fl.jpg", 'headwear'),
                        'title' => 'Activewear',
                        'to' => '/headwear-activewear'
                    ],
                    [
                        'title' => 'View All Headwear',
                        'to' => '/headwear',
                        'viewAll' => true
                    ]
                ],
                'options' => [
                    'hideLastChild' => true,
                    'headerHidden' => true
                ]
            ],
            [
                'type' => 'image-text',
                'title' => 'Shop By Fit',
                'titleLink' => '/headwear',
                'items' => [
                    [
                        'image' => menuProductImagePath("65241_d_fl.jpg", 'headwear'),
                        'title' => 'Mens',
                        'to' => '/headwear-mens'
                    ],
                    [
                        'image' => menuProductImagePath("29583_d_fm.jpg", 'headwear'),
                        'title' => 'Womens',
                        'to' => '/headwear-womens'
                    ],
                    [
                        'image' => menuProductImagePath("10032_fl.jpg", 'headwear'),
                        'title' => 'Unisex',
                        'to' => '/headwear-unisex'
                    ],
                    [
                        'image' => menuProductImagePath("28032_d_fl.jpg", 'headwear'),
                        'title' => 'Youth',
                        'to' => '/headwear-youth'
                    ],
                    [
                        'title' => 'Shop All Fit',
                        'to' => '/headwear',
                        'className' => 'shop-all',
                        'viewAll' => true
                    ]
                ]
            ],
            [
                'type' => 'text-only',
                'title' => 'Shop by Fabric',
                'titleLink' => '/headwear',
                'items' => [
                    [
                        'title' => 'Blends',
                        'to' => '/headwear?fabrics=blends'
                    ],
                    [
                        'title' => 'Cotton - 100%',
                        'to' => '/headwear?fabrics=cotton100'
                    ],
                    [
                        'title' => 'Mesh',
                        'to' => '/headwear?fabrics=mesh'
                    ],
                    [
                        'title' => 'Performance',
                        'to' => '/headwear?fabrics=performance'
                    ],
                    [
                        'title' => 'Polyester',
                        'to' => '/headwear?fabrics=polyester'
                    ]
                ],
                'options' => [
                    'shopAllLink' => [
                        'text' => 'Shop All Fabric',
                        'to' => '/headwear'
                    ]
                ]
            ],
            [
                'type' => 'color-split',
                'title' => 'Shop by Color',
                'titleLink' => '/shop-by-color',
                'items' => [
                    [
                        'title' => 'Blacks',
                        'image' => menuColorImagePath("6418_fm.jpg"),
                        'to' => colorFamilyUrls('headwear')['Blacks']['to']
                    ],
                    [
                        'title' => 'Greys',
                        'image' => menuColorImagePath("8520_fm.jpg"),
                        'to' => colorFamilyUrls('headwear')['Greys']['to']
                    ],
                    [
                        'title' => 'Neutrals',
                        'image' => menuColorImagePath("8756_fm.jpg"),
                        'to' => colorFamilyUrls('headwear')['Neutrals']['to']
                    ],
                    [
                        'title' => 'Hi-Vis',
                        'image' => menuColorImagePath("6532_fm.jpg"),
                        'to' => colorFamilyUrls('headwear')['HiVis']['to']
                    ],
                    [
                        'title' => 'Camo',
                        'image' => menuColorImagePath("29157_fm.jpg"),
                        'to' => colorFamilyUrls('headwear')['Camouflage']['to']
                    ],
                    [
                        'title' => 'Tie-Dye',
                        'image' => menuColorImagePath("15161_fm.jpg"),
                        'to' => colorFamilyUrls('headwear')['Tie-Dye']['to']
                    ],
                    [
                        'title' => 'Blues',
                        'image' => menuColorImagePath("8373_fm.jpg"),
                        'to' => colorFamilyUrls('headwear')['Blues']['to']
                    ],
                    [
                        'title' => 'Greens',
                        'image' => menuColorImagePath("8523_fm.jpg"),
                        'to' => colorFamilyUrls('headwear')['Greens']['to']
                    ],
                    [
                        'title' => 'Oranges',
                        'image' => menuColorImagePath("6609_fm.jpg"),
                        'to' => colorFamilyUrls('headwear')['Oranges']['to']
                    ],
                    [
                        'title' => 'Reds',
                        'image' => menuColorImagePath("5744_fm.jpg"),
                        'to' => colorFamilyUrls('headwear')['Reds']['to']
                    ],
                    [
                        'title' => 'Browns',
                        'image' => menuColorImagePath("10061_fm.jpg"),
                        'to' => colorFamilyUrls('headwear')['Browns']['to']
                    ],
                    [
                        'title' => 'Purples',
                        'image' => menuColorImagePath("6662_fm.jpg"),
                        'to' => colorFamilyUrls('headwear')['Purples']['to']
                    ],
                    [
                        'title' => 'Pinks',
                        'image' => menuColorImagePath("8203_fm.jpg"),
                        'to' => colorFamilyUrls('headwear')['Pinks']['to']
                    ],
                    [
                        'title' => 'Yellows',
                        'image' => menuColorImagePath("8977_fm.jpg"),
                        'to' => colorFamilyUrls('headwear')['Yellows']['to']
                    ]
                ]
            ],
            'options' => [
                'twoColumns' => true,
                'shopAllLink' => [
                    'text' => 'Shop All Colors',
                    'to' => '/shop-by-color'
                ]
            ]
        ],
        [
            'type' => 'brand-grid',
            'title' => 'Shop by Brands',
            'titleLink' => '/brands',
            'items' => [
                [
                    'image' => brandImagePath("70_fm.jpg", 'medium'),
                    'title' => 'Valucap',
                    'to' => '/headwear?brand=valucap'
                ],
                [
                    'image' => brandImagePath("71_fm.jpg", 'medium'),
                    'title' => 'YP Classic',
                    'to' => '/headwear?brand=yp-classics'
                ],
                [
                    'image' => brandImagePath("31_fm.jpg", 'medium'),
                    'title' => 'Adidas',
                    'to' => '/headwear?brand=adidas'
                ],
                [
                    'image' => brandImagePath("36_fm.jpg", 'medium'),
                    'title' => 'Dri-Duck',
                    'to' => '/headwear?brand=dri-duck'
                ],
                [
                    'image' => brandImagePath("58_fm.jpg", 'medium'),
                    'title' => 'Flexfit',
                    'to' => '/headwear?brand=flexfit'
                ],
                [
                    'image' => brandImagePath("138_fm.jpg", 'medium'),
                    'title' => 'Richardson',
                    'to' => '/headwear?brand=richardson'
                ],
                [
                    'image' => brandImagePath("75_fm.jpg", 'medium'),
                    'title' => 'Imperial',
                    'to' => '/headwear?brand=imperial'
                ],
                [
                    'image' => brandImagePath("47_fm.jpg", 'medium'),
                    'title' => 'Sportsman',
                    'to' => '/headwear?brand=sportsman'
                ]
            ],
            'options' => [
                'shopAllLink' => [
                    'text' => 'Shop All Brands',
                    'to' => '/brands'
                ],
                'alignCenter' => true
            ]
        ]
    ],

    /**
     * POLOS MENU
     */
    'polos' => [
        'title' => 'Polos',
        'to' => '/polos',
        'containerClass' => 'mega-menu__col5',
        'columns' => [
            [
                'type' => 'image-text',
                'title' => 'Shop by Style',
                'titleLink' => '/polos',
                'items' => [
                    [
                        'image' => menuProductImagePath("78774_omf_fl.jpg", 'polo'),
                        'title' => 'Short Sleeves',
                        'to' => '/polos-shortsleeves'
                    ],
                    [
                        'image' => menuProductImagePath("258_fl.jpg", 'polo'),
                        'title' => 'Long Sleeves',
                        'to' => '/polos-longsleeves'
                    ],
                    [
                        'image' => menuProductImagePath("99351_omf_fl.jpg", 'polo'),
                        'title' => 'Performance',
                        'to' => '/polos-performance'
                    ],
                    [
                        'image' => menuProductImagePath("222_fl.jpg", 'polo'),
                        'title' => 'Jersey',
                        'to' => '/polos-jersey'
                    ],
                    [
                        'image' => menuProductImagePath("11345_fl.jpg", 'polo'),
                        'title' => 'Pique',
                        'to' => '/polos-pique'
                    ],
                    [
                        'image' => menuProductImagePath("237_fl.jpg", 'polo'),
                        'title' => 'Pockets',
                        'to' => '/polos-pockets'
                    ],
                    [
                        'image' => menuProductImagePath("51690_omf_fl.jpg", 'polo'),
                        'title' => 'Uniforms',
                        'to' => '/polos-uniforms'
                    ],
                    [
                        'image' => menuProductImagePath("74620_omf_fl.jpg", 'polo'),
                        'title' => 'View All Polos',
                        'to' => '/polos',
                        'viewAll' => true
                    ]
                ],
                'options' => [
                    'hideLastChild' => true,
                    'width' => '25%'
                ]
            ],
            [
                'type' => 'image-text',
                'title' => 'Shop By Fit',
                'titleLink' => '/polos',
                'items' => [
                    [
                        'image' => menuProductImagePath("10468_fl.jpg", 'polo'),
                        'title' => 'Mens',
                        'to' => '/polos-mens'
                    ],
                    [
                        'image' => menuProductImagePath("10550_fl.jpg", 'polo'),
                        'title' => 'Womens',
                        'to' => '/polos-womens'
                    ],
                    [
                        'image' => menuProductImagePath("100814_oms_fl.jpg", 'polo'),
                        'title' => 'Unisex',
                        'to' => '/polos-unisex'
                    ],
                    [
                        'image' => menuProductImagePath("32380_omf_fl.jpg", 'polo'),
                        'title' => 'Youth',
                        'to' => '/polos-youth'
                    ],
                    [
                        'title' => 'Shop All Fit',
                        'to' => '/polos',
                        'className' => 'shop-all',
                        'viewAll' => true
                    ]
                ],
                'options' => [
                    'width' => '25%'
                ]
            ],
            [
                'type' => 'text-only',
                'title' => 'Shop by Fabric',
                'titleLink' => '/polos',
                'items' => [
                    [
                        'title' => 'Blends',
                        'to' => '/polos?fabrics=blends'
                    ],
                    [
                        'title' => 'Cotton - Over 50%',
                        'to' => '/polos?fabrics=cottonover50'
                    ],
                    [
                        'title' => 'Eco-Friendly',
                        'to' => '/polos?fabrics=ecofriendly'
                    ],
                    [
                        'title' => 'Performance',
                        'to' => '/polos?fabrics=performance'
                    ],
                    [
                        'title' => 'Polyester',
                        'to' => '/polos?fabrics=polyester'
                    ],
                    [
                        'title' => 'Shop All Fabric',
                        'to' => '/polos',
                        'className' => 'shop-all'
                    ]
                ],
                'options' => [
                    'width' => '25%'
                ]
            ],
            [
                'type' => 'color-split',
                'title' => 'Shop by Color',
                'titleLink' => '/shop-by-color',
                'items' => [
                    [
                        'title' => 'Blacks',
                        'image' => menuColorImagePath("6418_fm.jpg"),
                        'to' => colorFamilyUrls('polos')['Blacks']['to']
                    ],
                    [
                        'title' => 'Greys',
                        'image' => menuColorImagePath("8520_fm.jpg"),
                        'to' => colorFamilyUrls('polos')['Greys']['to']
                    ],
                    [
                        'title' => 'Hi-Vis',
                        'image' => menuColorImagePath("6532_fm.jpg"),
                        'to' => colorFamilyUrls('polos')['HiVis']['to']
                    ],
                    [
                        'title' => 'Tie-Dye',
                        'image' => menuColorImagePath("15161_fm.jpg"),
                        'to' => colorFamilyUrls('polos')['Tie-Dye']['to']
                    ],
                    [
                        'title' => 'Blues',
                        'image' => menuColorImagePath("8373_fm.jpg"),
                        'to' => colorFamilyUrls('polos')['Blues']['to']
                    ],
                    [
                        'title' => 'Greens',
                        'image' => menuColorImagePath("8523_fm.jpg"),
                        'to' => colorFamilyUrls('polos')['Greens']['to']
                    ],
                    [
                        'title' => 'Oranges',
                        'image' => menuColorImagePath("6609_fm.jpg"),
                        'to' => colorFamilyUrls('polos')['Oranges']['to']
                    ],
                    [
                        'title' => 'Reds',
                        'image' => menuColorImagePath("5744_fm.jpg"),
                        'to' => colorFamilyUrls('polos')['Reds']['to']
                    ],
                    [
                        'title' => 'Purples',
                        'image' => menuColorImagePath("6662_fm.jpg"),
                        'to' => colorFamilyUrls('polos')['Purples']['to']
                    ],
                    [
                        'title' => 'Pinks',
                        'image' => menuColorImagePath("8203_fm.jpg"),
                        'to' => colorFamilyUrls('polos')['Pinks']['to']
                    ],
                    [
                        'title' => 'Yellows',
                        'image' => menuColorImagePath("8977_fm.jpg"),
                        'to' => colorFamilyUrls('polos')['Yellows']['to']
                    ]

                ],
                'options' => [
                    'width' => '25%',
                    'shopAllLink' => [
                        'text' => 'Shop All Colors',
                        'to' => '/shop-by-color'
                    ]
                ]
            ],
            [
                'type' => 'brand-grid',
                'title' => 'Shop by Brands',
                'titleLink' => '/brands',
                'items' => [
                    [
                        'image' => brandImagePath("35_fm.jpg", "medium"),
                        'title' => 'Gildan',
                        'to' => '/polos?brand=gildan'
                    ],
                    [
                        'image' => brandImagePath("1_fm.jpg", "medium"),
                        'title' => 'Hanes',
                        'to' => '/polos?brand=hanes'
                    ],
                    [
                        'image' => brandImagePath("31_fm.jpg", "medium"),
                        'title' => 'Adidas',
                        'to' => '/polos?brand=adidas'
                    ],
                    [
                        'image' => brandImagePath("194_fm.jpg", "medium"),
                        'title' => 'Paragon',
                        'to' => '/polos?brand=paragon'
                    ],
                    [
                        'image' => brandImagePath("23_fm.jpg", "medium"),
                        'title' => 'Jerzees',
                        'to' => '/polos?brand=jerzees'
                    ]
                ],
                'options' => [
                    'shopAllLink' => [
                        'text' => 'Shop All Brands',
                        'to' => '/brands'
                    ],
                    'alignCenter' => true
                ]
            ]
        ]
    ],

    /**
     * SWEATSHIRTS MENU
     */
    'sweatshirts' => [
        'title' => 'Sweatshirts',
        'to' => '/sweatshirts',
        'containerClass' => 'mega-menu__col5',
        'columns' => [
            [
                'type' => 'image-text',
                'title' => 'Shop by Style',
                'titleLink' => '/sweatshirts',
                'items' => [
                    [
                        'image' => menuProductImagePath("372_fl.jpg", 'sweatshirt'),
                        'title' => 'Crewnecks',
                        'to' => '/sweatshirts-crewneckcollar'
                    ],
                    [
                        'image' => menuProductImagePath("395_fl.jpg", 'sweatshirt'),
                        'title' => 'Hoodies',
                        'to' => '/bulk-hoodies-wholesale'
                    ],
                    [
                        'image' => menuProductImagePath("100797_omf_fl.jpg", 'sweatshirt'),
                        'title' => 'Pullovers',
                        'to' => '/sweatshirts-pullovers'
                    ],
                    [
                        'image' => menuProductImagePath("2708_fl.jpg", 'sweatshirt'),
                        'title' => 'Quarter-Zips',
                        'to' => '/sweatshirts-quarterzips'
                    ],
                    [
                        'image' => menuProductImagePath("1616_fl.jpg", 'sweatshirt'),
                        'title' => 'Full-Zips',
                        'to' => '/sweatshirts-fullzips'
                    ],
                    [
                        'image' => menuProductImagePath("29114_omf_fl.jpg", 'sweatshirt'),
                        'title' => 'Activewear',
                        'to' => '/sweatshirts-activewear'
                    ],
                    [
                        'image' => menuProductImagePath("399_fl.jpg", 'sweatshirt'),
                        'title' => 'Pockets',
                        'to' => '/sweatshirts-pockets'
                    ],
                    [
                        'image' => menuProductImagePath("106731_omf_fl.jpg", 'sweatshirt'),
                        'title' => 'View All Sweatshirts',
                        'to' => '/sweatshirts',
                        'viewAll' => true
                    ]
                ],
                'options' => [
                    'hideLastChild' => true,
                    'width' => '25%'
                ]
            ],
            [
                'type' => 'image-text',
                'title' => 'Shop By Fit',
                'titleLink' => '/sweatshirts',
                'items' => [
                    [
                        'image' => menuProductImagePath("3946_fl.jpg", 'sweatshirt'),
                        'title' => 'Mens',
                        'to' => '/sweatshirts-mens'
                    ],
                    [
                        'image' => menuProductImagePath("79622_omf_fl.jpg", 'sweatshirt'),
                        'title' => 'Womens',
                        'to' => '/sweatshirts-womens'
                    ],
                    [
                        'image' => menuProductImagePath("9352_fl.jpg", 'sweatshirt'),
                        'title' => 'Unisex',
                        'to' => '/sweatshirts-unisex'
                    ],
                    [
                        'image' => menuProductImagePath("97532_omf_fl.jpg", 'sweatshirt'),
                        'title' => 'Youth',
                        'to' => '/sweatshirts-youth'
                    ],
                    [
                        'image' => menuProductImagePath("559_fl.jpg", 'sweatshirt'),
                        'title' => 'Infants & Toddlers',
                        'to' => '/sweatshirts-infantstoddlers'
                    ],
                    [
                        'title' => 'Shop All Fit',
                        'to' => '/sweatshirts',
                        'className' => 'shop-all',
                        'viewAll' => true
                    ]
                ],
                'options' => [
                    'width' => '25%'
                ]
            ],
            [
                'type' => 'text-only',
                'title' => 'Shop by Fabric',
                'titleLink' => '/sweatshirts',
                'items' => [
                    [
                        'title' => 'Blends',
                        'to' => '/sweatshirts?fabrics=blends'
                    ],
                    [
                        'title' => 'Cotton - Ringspun',
                        'to' => '/sweatshirts?fabrics=cottonringspun'
                    ],
                    [
                        'title' => 'Eco-Friendly',
                        'to' => '/sweatshirts?fabrics=ecofriendly'
                    ],
                    [
                        'title' => 'Performance',
                        'to' => '/sweatshirts?fabrics=performance'
                    ],
                    [
                        'title' => 'Polyester',
                        'to' => '/sweatshirts?fabrics=polyester'
                    ],
                    [
                        'title' => 'Shop All Fabric',
                        'to' => '/sweatshirts',
                        'className' => 'shop-all'
                    ]
                ],
                'options' => [
                    'width' => '25%'
                ]
            ],
            [
                'type' => 'color-split',
                'title' => 'Shop by Color',
                'titleLink' => '/shop-by-color',
                'items' => [
                    [
                        'title' => 'Whites',
                        'image' => menuColorImagePath("7229_fm.jpg"),
                        'to' => colorFamilyUrls('sweatshirts')['Whites']['to']
                    ],
                    [
                        'title' => 'Blacks',
                        'image' => menuColorImagePath("6418_fm.jpg"),
                        'to' => colorFamilyUrls('sweatshirts')['Blacks']['to']
                    ],
                    [
                        'title' => 'Greys',
                        'image' => menuColorImagePath("8520_fm.jpg"),
                        'to' => colorFamilyUrls('sweatshirts')['Greys']['to']
                    ],
                    [
                        'title' => 'Heathers',
                        'image' => menuColorImagePath("13386_fm.jpg"),
                        'to' => colorFamilyUrls('sweatshirts')['Heather']['to']
                    ],
                    [
                        'title' => 'Neutrals',
                        'image' => menuColorImagePath("8756_fm.jpg"),
                        'to' => colorFamilyUrls('sweatshirts')['Neutrals']['to']
                    ],
                    [
                        'title' => 'Hi-Vis',
                        'image' => menuColorImagePath("6532_fm.jpg"),
                        'to' => colorFamilyUrls('sweatshirts')['HiVis']['to']
                    ],
                    [
                        'title' => 'Camo',
                        'image' => menuColorImagePath("29157_fm.jpg"),
                        'to' => colorFamilyUrls('sweatshirts')['Camouflage']['to']
                    ],
                    [
                        'title' => 'Tie-Dye',
                        'image' => menuColorImagePath("15161_fm.jpg"),
                        'to' => colorFamilyUrls('sweatshirts')['Tie-Dye']['to']
                    ],
                    [
                        'title' => 'Blues',
                        'image' => menuColorImagePath("8373_fm.jpg"),
                        'to' => colorFamilyUrls('sweatshirts')['Blues']['to']
                    ],
                    [
                        'title' => 'Greens',
                        'image' => menuColorImagePath("8523_fm.jpg"),
                        'to' => colorFamilyUrls('sweatshirts')['Greens']['to']
                    ],
                    [
                        'title' => 'Oranges',
                        'image' => menuColorImagePath("6609_fm.jpg"),
                        'to' => colorFamilyUrls('sweatshirts')['Oranges']['to']
                    ],
                    [
                        'title' => 'Reds',
                        'image' => menuColorImagePath("5744_fm.jpg"),
                        'to' => colorFamilyUrls('sweatshirts')['Reds']['to']
                    ],
                    [
                        'title' => 'Browns',
                        'image' => menuColorImagePath("10061_fm.jpg"),
                        'to' => colorFamilyUrls('sweatshirts')['Browns']['to']
                    ],
                    [
                        'title' => 'Purples',
                        'image' => menuColorImagePath("6662_fm.jpg"),
                        'to' => colorFamilyUrls('sweatshirts')['Purples']['to']
                    ],
                    [
                        'title' => 'Pinks',
                        'image' => menuColorImagePath("8203_fm.jpg"),
                        'to' => colorFamilyUrls('sweatshirts')['Pinks']['to']
                    ],
                    [
                        'title' => 'Yellows',
                        'image' => menuColorImagePath("8977_fm.jpg"),
                        'to' => colorFamilyUrls('sweatshirts')['Yellows']['to']
                    ]

                ],
                'options' => [
                    'width' => '25%',
                    'shopAllLink' => [
                        'text' => 'Shop All Colors',
                        'to' => '/shop-by-color'
                    ]
                ]
            ],
            [
                'type' => 'brand-grid',
                'title' => 'Shop by Brands',
                'titleLink' => '/brands',
                'items' => [
                    [
                        'image' => brandImagePath("35_fm.jpg", 'medium'),
                        'title' => 'Gildan',
                        'to' => '/sweatshirts?brand=gildan'
                    ],
                    [
                        'image' => brandImagePath("1_fm.jpg", 'medium'),
                        'title' => 'Hanes',
                        'to' => '/sweatshirts?brand=hanes'
                    ],
                    [
                        'image' => brandImagePath("38_fm.jpg", 'medium'),
                        'title' => 'Independent Trading Co.',
                        'to' => '/sweatshirts?brand=independent-trading-co'
                    ],
                    [
                        'image' => brandImagePath("5_fm.jpg", 'medium'),
                        'title' => 'Bella + Canvas',
                        'to' => '/sweatshirts?brand=bella-canvas'
                    ],
                    [
                        'image' => brandImagePath("23_fm.jpg", 'medium'),
                        'title' => 'Jerzees',
                        'to' => '/sweatshirts?brand=jerzees'
                    ],
                    [
                        'image' => brandImagePath("123_fm.jpg", 'medium'),
                        'title' => 'Next Level',
                        'to' => '/sweatshirts?brand=next-level'
                    ]
                ],
                'options' => [
                    'shopAllLink' => [
                        'text' => 'Shop All Brands',
                        'to' => '/brands'
                    ],
                    'alignCenter' => true
                ]
            ]
        ]
    ],

    /**
     * ACTIVEWEAR MENU
     */
    'activewear' => [
        'title' => 'Activewear',
        'to' => '/activewear',
        'containerClass' => 'mega-menu__col6',
        'columns' => [
            [
                'type' => 'image-text',
                'title' => 'Shop by Style',
                'titleLink' => '/activewear',
                'items' => [
                    [
                        'image' => menuProductImagePath("159_fl.jpg", 'activewear'),
                        'title' => 'Short Sleeves',
                        'to' => '/activewear-shortsleeves'
                    ],
                    [
                        'image' => menuProductImagePath("2484_fl.jpg", 'activewear'),
                        'title' => 'Long Sleeves',
                        'to' => '/activewear-longsleeves'
                    ],
                    [
                        'image' => menuProductImagePath("80523_omf_fl.jpg", 'activewear'),
                        'title' => 'Three-Quarter Sleeves',
                        'to' => '/activewear-threequartersleeve'
                    ],
                    [
                        'image' => menuProductImagePath("7989_fl.jpg", 'activewear'),
                        'title' => 'Sleeveless',
                        'to' => '/activewear-sleeveless'
                    ],
                    [
                        'image' => menuProductImagePath("4481_fl.jpg", 'activewear'),
                        'title' => 'Pullovers',
                        'to' => '/activewear-pullovers'
                    ],
                    [
                        'image' => menuProductImagePath("4981_fl.jpg", 'activewear'),
                        'title' => 'Shorts',
                        'to' => '/activewear-shorts'
                    ],
                    [
                        'image' => menuProductImagePath("4479_fl.jpg", 'activewear'),
                        'title' => 'Sweatpants',
                        'to' => '/activewear-sweatpants'
                    ],
                    [
                        'image' => menuProductImagePath("146_fl.jpg", 'activewear'),
                        'title' => 'Performance',
                        'to' => '/activewear-performance'
                    ],
                    [
                        'title' => 'View All Activewear',
                        'to' => '/activewear',
                        'viewAll' => true
                    ]
                ],
                'options' => [
                    'hideLastChild' => true
                ]
            ],
            [
                'type' => 'image-text',
                'title' => 'Shop by Category',
                'titleLink' => '/activewear',
                'items' => [
                    [
                        'image' => menuProductImagePath("2714_fl.jpg", 'activewear'),
                        'title' => 'T-Shirts',
                        'to' => '/activewear-tshirts'
                    ],
                    [
                        'image' => menuProductImagePath("404_fl.jpg", 'activewear'),
                        'title' => 'Sweatshirts',
                        'to' => '/activewear-sweatshirts'
                    ],
                    [
                        'image' => menuProductImagePath("99349_oms_fl.jpg", 'activewear'),
                        'title' => 'Polos',
                        'to' => '/activewear-polos'
                    ],
                    [
                        'image' => menuProductImagePath("2883_fl.jpg", 'activewear'),
                        'title' => 'Outerwear',
                        'to' => '/activewear-outerwear'
                    ],
                    [
                        'image' => menuProductImagePath("4980_fl.jpg", 'activewear'),
                        'title' => 'Bottoms',
                        'to' => '/activewear-bottoms'
                    ],
                    [
                        'image' => menuProductImagePath("4552_fl.jpg", 'activewear'),
                        'title' => 'Tank Tops',
                        'to' => '/activewear-tanktops'
                    ],
                    [
                        'image' => menuProductImagePath("25568_f_fl.jpg", 'activewear'),
                        'title' => 'Headwear',
                        'to' => '/activewear-headwear'
                    ],
                    [
                        'image' => menuProductImagePath("94597_f_fl.jpg", 'activewear'),
                        'title' => 'Bags',
                        'to' => '/activewear-bags'
                    ],
                    [
                        'image' => menuProductImagePath("52342_b_fl.jpg", 'activewear'),
                        'title' => 'Accessories',
                        'to' => '/activewear-accessories'
                    ],
                    [
                        'title' => 'Shop All Category',
                        'to' => '/activewear',
                        'className' => 'shop-all',
                        'viewAll' => true
                    ]
                ]
            ],
            [
                'type' => 'image-text',
                'title' => 'Shop By Fit',
                'titleLink' => '/activewear',
                'items' => [
                    [
                        'image' => menuProductImagePath("1892_fl.jpg", 'activewear'),
                        'title' => 'Mens',
                        'to' => '/activewear-mens'
                    ],
                    [
                        'image' => menuProductImagePath("145_fl.jpg", 'activewear'),
                        'title' => 'Womens',
                        'to' => '/activewear-womens'
                    ],
                    [
                        'image' => menuProductImagePath("2691_fl.jpg", 'activewear'),
                        'title' => 'Unisex',
                        'to' => '/activewear-unisex'
                    ],
                    [
                        'image' => menuProductImagePath("525_fl.jpg", 'activewear'),
                        'title' => 'Youth',
                        'to' => '/activewear-youth'
                    ],
                    [
                        'title' => 'Shop All Fit',
                        'to' => '/activewear',
                        'className' => 'shop-all',
                        'viewAll' => true
                    ]
                ]
            ],
            [
                'type' => 'text-only',
                'title' => 'Shop by Fabric',
                'titleLink' => '/activewear',
                'items' => [
                    [
                        'title' => 'Blends',
                        'to' => '/activewear?fabrics=blends'
                    ],
                    [
                        'title' => 'Cotton - Over 50%',
                        'to' => '/activewear?fabrics=cottonover50'
                    ],
                    [
                        'title' => 'Eco-Friendly',
                        'to' => '/activewear?fabrics=ecofriendly'
                    ],
                    [
                        'title' => 'Performance',
                        'to' => '/activewear?fabrics=performance'
                    ],
                    [
                        'title' => 'Polyester',
                        'to' => '/activewear?fabrics=polyester'
                    ]
                ],
                'options' => [
                    'shopAllLink' => [
                        'text' => 'Shop All Fabric',
                        'to' => '/activewear'
                    ]
                ]
            ],
            [
                'type' => 'color-split',
                'title' => 'Shop by Color',
                'titleLink' => '/shop-by-color',
                'items' => [
                    [
                        'title' => 'Blacks',
                        'image' => menuColorImagePath("6418_fm.jpg"),
                        'to' => colorFamilyUrls('activewear')['Blacks']['to']
                    ],
                    [
                        'title' => 'Greys',
                        'image' => menuColorImagePath("8520_fm.jpg"),
                        'to' => colorFamilyUrls('activewear')['Greys']['to']
                    ],
                    [
                        'title' => 'Neutrals',
                        'image' => menuColorImagePath("8756_fm.jpg"),
                        'to' => colorFamilyUrls('activewear')['Neutrals']['to']
                    ],
                    [
                        'title' => 'Hi-Vis',
                        'image' => menuColorImagePath("6532_fm.jpg"),
                        'to' => colorFamilyUrls('activewear')['HiVis']['to']
                    ],
                    [
                        'title' => 'Camo',
                        'image' => menuColorImagePath("29157_fm.jpg"),
                        'to' => colorFamilyUrls('activewear')['Camouflage']['to']
                    ],
                    [
                        'title' => 'Tie-Dye',
                        'image' => menuColorImagePath("15161_fm.jpg"),
                        'to' => colorFamilyUrls('activewear')['Tie-Dye']['to']
                    ],
                    [
                        'title' => 'Blues',
                        'image' => menuColorImagePath("8373_fm.jpg"),
                        'to' => colorFamilyUrls('activewear')['Blues']['to']
                    ],
                    [
                        'title' => 'Greens',
                        'image' => menuColorImagePath("8523_fm.jpg"),
                        'to' => colorFamilyUrls('activewear')['Greens']['to']
                    ],
                    [
                        'title' => 'Oranges',
                        'image' => menuColorImagePath("6609_fm.jpg"),
                        'to' => colorFamilyUrls('activewear')['Oranges']['to']
                    ],
                    [
                        'title' => 'Reds',
                        'image' => menuColorImagePath("5744_fm.jpg"),
                        'to' => colorFamilyUrls('activewear')['Reds']['to']
                    ],
                    [
                        'title' => 'Browns',
                        'image' => menuColorImagePath("10061_fm.jpg"),
                        'to' => colorFamilyUrls('activewear')['Browns']['to']
                    ],
                    [
                        'title' => 'Purples',
                        'image' => menuColorImagePath("6662_fm.jpg"),
                        'to' => colorFamilyUrls('activewear')['Purples']['to']
                    ],
                    [
                        'title' => 'Pinks',
                        'image' => menuColorImagePath("8203_fm.jpg"),
                        'to' => colorFamilyUrls('activewear')['Pinks']['to']
                    ],
                    [
                        'title' => 'Yellows',
                        'image' => menuColorImagePath("8977_fm.jpg"),
                        'to' => colorFamilyUrls('activewear')['Yellows']['to']
                    ]
                ],
                'options' => [
                    'twoColumns' => true,
                    'shopAllLink' => [
                        'text' => 'Shop All Colors',
                        'to' => '/shop-by-color'
                    ]
                ]
            ],
            [
                'type' => 'brand-grid',
                'title' => 'Shop by Brands',
                'titleLink' => '/brands',
                'items' => [
                    [
                        'image' => brandImagePath("31_fm.jpg", 'medium'),
                        'title' => 'Adidas',
                        'to' => '/activewear?brand=adidas'
                    ],
                    [
                        'image' => brandImagePath("107_fm.jpg", 'medium'),
                        'title' => 'C2 Sport',
                        'to' => '/activewear?brand=c2-sport'
                    ],
                    [
                        'image' => brandImagePath("41_fm.jpg", 'medium'),
                        'title' => 'Badger',
                        'to' => '/activewear?brand=badger'
                    ],
                    [
                        'image' => brandImagePath("22_fm.jpg", 'medium'),
                        'title' => 'Agusta',
                        'to' => '/activewear?brand=augusta-sportswear'
                    ],
                    [
                        'image' => brandImagePath("146_fm.jpg", 'medium'),
                        'title' => 'Russell Athletic',
                        'to' => '/activewear?brand=russell-athletic'
                    ],
                    [
                        'image' => brandImagePath("35_fm.jpg", 'medium'),
                        'title' => 'Gildan',
                        'to' => '/activewear?brand=gildan'
                    ],
                    [
                        'image' => brandImagePath("23_fm.jpg", 'medium'),
                        'title' => 'Jerzees',
                        'to' => '/activewear?brand=jerzees'
                    ],
                    [
                        'image' => brandImagePath("38_fm.jpg", 'medium'),
                        'title' => 'Independent Trading Co',
                        'to' => '/activewear?brand=independent-trading-co'
                    ],
                    [
                        'image' => brandImagePath("81_fm.jpg", 'medium'),
                        'title' => 'Champion',
                        'to' => '/activewear?brand=champion'
                    ]
                ],
                'options' => [
                    'shopAllLink' => [
                        'text' => 'Shop All Brands',
                        'to' => '/brands'
                    ],
                    'alignCenter' => true
                ]
            ]
        ]
    ],

    /**
     * YOUTH MENU
     */
    'youth' => [
        'title' => 'Kids',
        'to' => '/youth',
        'containerClass' => 'mega-menu__col6',
        'columns' => [
            [
                'type' => 'image-text',
                'title' => 'Shop by Style',
                'titleLink' => '/youth',
                'items' => [
                    [
                        'image' => menuProductImagePath("10628_fl.jpg", 'kids'),
                        'title' => 'Short Sleeves',
                        'to' => '/youth-shortsleeves'
                    ],
                    [
                        'image' => menuProductImagePath("1943_fl.jpg", 'kids'),
                        'title' => 'Long Sleeves',
                        'to' => '/youth-longsleeves'
                    ],
                    [
                        'image' => menuProductImagePath("2990_fl.jpg", 'kids'),
                        'title' => 'Three-Quarter Sleeves',
                        'to' => '/youth-threequartersleeve'
                    ],
                    [
                        'image' => menuProductImagePath("8817_fl.jpg", 'kids'),
                        'title' => 'Tank Tops',
                        'to' => '/youth-tanktops'
                    ],
                    [
                        'image' => menuProductImagePath("575_fl.jpg", 'kids'),
                        'title' => 'Sweatpants',
                        'to' => '/youth-sweatpants'
                    ],
                    [
                        'image' => menuProductImagePath("4981_fl.jpg", 'kids'),
                        'title' => 'Shorts',
                        'to' => '/youth-shorts'
                    ],
                    [
                        'image' => menuProductImagePath("571_fl.jpg", 'kids'),
                        'title' => 'Sweaters',
                        'to' => '/youth-pullovers'
                    ],
                    [
                        'image' => menuProductImagePath("557_fl.jpg", 'kids'),
                        'title' => 'Hoodies',
                        'to' => '/youth-hoodies'
                    ],
                    [
                        'image' => menuProductImagePath("96539_oms_fl.jpg", 'kids'),
                        'title' => 'View All Kids',
                        'to' => '/youth',
                        'viewAll' => true
                    ]
                ],
                'options' => [
                    'hideLastChild' => true
                ]
            ],
            [
                'type' => 'image-text',
                'title' => 'Shop by Category',
                'titleLink' => '/youth',
                'items' => [
                    [
                        'image' => menuProductImagePath("544_fl.jpg", 'kids'),
                        'title' => 'T-Shirts',
                        'to' => '/youth-tshirts'
                    ],
                    [
                        'image' => menuProductImagePath("3928_fl.jpg", 'kids'),
                        'title' => 'Sweatshirts',
                        'to' => '/youth-sweatshirts'
                    ],
                    [
                        'image' => menuProductImagePath("10539_fl.jpg", 'kids'),
                        'title' => 'Polos',
                        'to' => '/youth-polos'
                    ],
                    [
                        'image' => menuProductImagePath("2485_fl.jpg", 'kids'),
                        'title' => 'Activewear',
                        'to' => '/youth-activewear'
                    ],
                    [
                        'image' => menuProductImagePath("2637_fl.jpg", 'kids'),
                        'title' => 'Outerwear',
                        'to' => '/youth-outerwear'
                    ],
                    [
                        'image' => menuProductImagePath("10288_fl.jpg", 'kids'),
                        'title' => 'Headwear',
                        'to' => '/youth-headwear'
                    ],
                    [
                        'image' => menuProductImagePath("11135_fm.jpg", 'kids'),
                        'title' => 'Bottoms',
                        'to' => '/youth-bottoms'
                    ],
                    [
                        'image' => menuProductImagePath("3874_fl.jpg", 'kids'),
                        'title' => 'Onesies',
                        'to' => '/youth-infantstoddlers-onesies'
                    ],
                    [
                        'image' => menuProductImagePath("1506_fl.jpg", 'kids'),
                        'title' => 'Accessories',
                        'to' => '/youth-accessories'
                    ],
                    [
                        'title' => 'Shop All Category',
                        'to' => '/youth',
                        'className' => 'shop-all',
                        'viewAll' => true
                    ]
                ]
            ],
            [
                'type' => 'image-text',
                'title' => 'Shop By Fit',
                'titleLink' => '/youth',
                'items' => [
                    [
                        'image' => menuProductImagePath("2565_fl.jpg", 'kids'),
                        'title' => 'Youth',
                        'to' => '/youth'
                    ],
                    [
                        'image' => menuProductImagePath("96961_omf_fl.jpg", 'kids'),
                        'title' => 'Infants & Toddlers',
                        'to' => '/infantstoddlers'
                    ],
                    [
                        'title' => 'Shop All Fit',
                        'to' => '/youth',
                        'className' => 'shop-all',
                        'viewAll' => true
                    ]
                ]
            ],
            [
                'type' => 'text-only',
                'title' => 'Shop by Fabric',
                'titleLink' => '/youth',
                'items' => [
                    [
                        'title' => 'Blends',
                        'to' => '/youth?fabrics=blends'
                    ],
                    [
                        'title' => 'Cotton - Ringspun',
                        'to' => '/youth?fabrics=cottonringspun'
                    ],
                    [
                        'title' => 'Jersey',
                        'to' => '/youth?fabrics=jersey'
                    ],
                    [
                        'title' => 'Performance',
                        'to' => '/youth?fabrics=performance'
                    ],
                    [
                        'title' => 'Polyester',
                        'to' => '/youth?fabrics=polyester'
                    ]
                ],
                'options' => [
                    'shopAllLink' => [
                        'text' => 'Shop All Fabric',
                        'to' => '/youth'
                    ]
                ]
            ],
            [
                'type' => 'color-split',
                'title' => 'Shop by Color',
                'titleLink' => '/shop-by-color',
                'items' => [
                    [
                        'title' => 'Blacks',
                        'image' => menuColorImagePath("6418_fm.jpg"),
                        'to' => colorFamilyUrls('youth')['Blacks']['to']
                    ],
                    [
                        'title' => 'Greys',
                        'image' => menuColorImagePath("8520_fm.jpg"),
                        'to' => colorFamilyUrls('youth')['Greys']['to']
                    ],
                    [
                        'title' => 'Heathers',
                        'image' => menuColorImagePath("13386_fm.jpg"),
                        'to' => colorFamilyUrls('youth')['Heather']['to']
                    ],
                    [
                        'title' => 'Neutrals',
                        'image' => menuColorImagePath("8756_fm.jpg"),
                        'to' => colorFamilyUrls('youth')['Neutrals']['to']
                    ],
                    [
                        'title' => 'Hi-Vis',
                        'image' => menuColorImagePath("6532_fm.jpg"),
                        'to' => colorFamilyUrls('youth')['HiVis']['to']
                    ],
                    [
                        'title' => 'Camo',
                        'image' => menuColorImagePath("29157_fm.jpg"),
                        'to' => colorFamilyUrls('youth')['Camouflage']['to']
                    ],
                    [
                        'title' => 'Tie-Dye',
                        'image' => menuColorImagePath("15161_fm.jpg"),
                        'to' => colorFamilyUrls('youth')['Tie-Dye']['to']
                    ],
                    [
                        'title' => 'Blues',
                        'image' => menuColorImagePath("8373_fm.jpg"),
                        'to' => colorFamilyUrls('youth')['Blues']['to']
                    ],
                    [
                        'title' => 'Greens',
                        'image' => menuColorImagePath("8523_fm.jpg"),
                        'to' => colorFamilyUrls('youth')['Greens']['to']
                    ],
                    [
                        'title' => 'Oranges',
                        'image' => menuColorImagePath("6609_fm.jpg"),
                        'to' => colorFamilyUrls('youth')['Oranges']['to']
                    ],
                    [
                        'title' => 'Reds',
                        'image' => menuColorImagePath("5744_fm.jpg"),
                        'to' => colorFamilyUrls('youth')['Reds']['to']
                    ],
                    [
                        'title' => 'Browns',
                        'image' => menuColorImagePath("10061_fm.jpg"),
                        'to' => colorFamilyUrls('youth')['Browns']['to']
                    ],
                    [
                        'title' => 'Purples',
                        'image' => menuColorImagePath("6662_fm.jpg"),
                        'to' => colorFamilyUrls('youth')['Purples']['to']
                    ],
                    [
                        'title' => 'Pinks',
                        'image' => menuColorImagePath("8203_fm.jpg"),
                        'to' => colorFamilyUrls('youth')['Pinks']['to']
                    ],
                    [
                        'title' => 'Yellows',
                        'image' => menuColorImagePath("8977_fm.jpg"),
                        'to' => colorFamilyUrls('youth')['Yellows']['to']
                    ]
                ],
                'options' => [
                    'twoColumns' => true,
                    'shopAllLink' => [
                        'text' => 'Shop All Colors',
                        'to' => '/shop-by-color'
                    ]
                ]
            ],
            [
                'type' => 'brand-grid',
                'title' => 'Shop by Brands',
                'titleLink' => '/brands',
                'items' => [
                    [
                        'image' => brandImagePath("67_fm.jpg", 'medium'),
                        'title' => 'Rabit Skins',
                        'to' => '/youth?brand=rabbit-skins'
                    ],
                    [
                        'image' => brandImagePath("35_fm.jpg", 'medium'),
                        'title' => 'Gildan',
                        'to' => '/youth?brand=gildan'
                    ],
                    [
                        'image' => brandImagePath("5_fm.jpg", 'medium'),
                        'title' => 'Bella + Canvas',
                        'to' => '/youth?brand=bella-canvas'
                    ],
                    [
                        'image' => brandImagePath("123_fm.jpg", 'medium'),
                        'title' => 'Next Level',
                        'to' => '/youth?brand=next-level'
                    ],
                    [
                        'image' => "/image/brand/medium/23_fm.jpg",
                        'title' => 'Jerzees',
                        'to' => '/youth?brand=jerzees'
                    ],
                    [
                        'image' => brandImagePath("1_fm.jpg", 'medium'),
                        'title' => 'Hanes',
                        'to' => '/youth?brand=hanes'
                    ],
                    [
                        'image' => brandImagePath("41_fm.jpg", 'medium'),
                        'title' => 'Badger',
                        'to' => '/youth?brand=badger'
                    ],
                    [
                        'image' => brandImagePath("54_fm.jpg", 'medium'),
                        'title' => 'Code Five',
                        'to' => '/youth?brand=code-five'
                    ],
                    [
                        'image' => brandImagePath("38_fm.jpg", 'medium'),
                        'title' => 'Independent',
                        'to' => '/youth?brand=independent-trading-co'
                    ]
                ],
                'options' => [
                    'shopAllLink' => [
                        'text' => 'Shop All Brands',
                        'to' => '/brands'
                    ],
                    'alignCenter' => true
                ]
            ]
        ]
    ],

    /**
     * WOMEN MENU
     */
    'women' => [
        'title' => 'Womens',
        'to' => '/womens',
        'containerClass' => 'mega-menu__col5',
        'columns' => [
            [
                'type' => 'image-text',
                'title' => 'Shop by Style',
                'titleLink' => '/womens',
                'items' => [
                    [
                        'image' => menuProductImagePath("809_fl.jpg", 'women'),
                        'title' => 'Short Sleeves',
                        'to' => '/womens-shortsleeves'
                    ],
                    [
                        'image' => menuProductImagePath("10568_fl.jpg", 'women'),
                        'title' => 'Long Sleeves',
                        'to' => '/womens-longsleeves'
                    ],
                    [
                        'image' => menuProductImagePath("10689_fl.jpg", 'women'),
                        'title' => 'V-Necks',
                        'to' => '/womens-vneck'
                    ],
                    [
                        'image' => menuProductImagePath("3246_fl.jpg", 'women'),
                        'title' => 'Tank Tops',
                        'to' => '/womens-tanktops'
                    ],
                    [
                        'image' => menuProductImagePath("3102_fl.jpg", 'women'),
                        'title' => 'Crop Tops',
                        'to' => '/womens-croptops'
                    ],
                    [
                        'image' => menuProductImagePath("109213_oms_fl.jpg", 'women'),
                        'title' => 'Spiritwear',
                        'to' => '/womens-spiritwear'
                    ],
                    [
                        'image' => menuProductImagePath("11071_fl.jpg", 'women'),
                        'title' => 'Pullovers',
                        'to' => '/womens-pullovers'
                    ],
                    [
                        'image' => menuProductImagePath("79648_omf_fl.jpg", 'women'),
                        'title' => 'Hoodies',
                        'to' => '/womens-hoodies'
                    ],
                    [
                        'image' => menuProductImagePath("11144_fl.jpg", 'women'),
                        'title' => 'Loungewear',
                        'to' => '/womens-loungewear'
                    ],
                    [
                        'image' => menuProductImagePath("9741_fl.jpg", 'women'),
                        'title' => 'View All Women',
                        'to' => '/womens',
                        'viewAll' => true
                    ]
                ],
                'options' => [
                    'hideLastChild' => true
                ]
            ],
            [
                'type' => 'image-text',
                'title' => 'Shop by Category',
                'titleLink' => '/womens',
                'items' => [
                    [
                        'image' => menuProductImagePath("2115_fl.jpg", 'women'),
                        'title' => 'T-Shirts',
                        'to' => '/womens-tshirts'
                    ],
                    [
                        'image' => menuProductImagePath("7789_fl.jpg", 'women'),
                        'title' => 'Sweatshirts',
                        'to' => '/womens-sweatshirts'
                    ],
                    [
                        'image' => menuProductImagePath("10540_fl.jpg", 'women'),
                        'title' => 'Polos',
                        'to' => '/womens-polos'
                    ],
                    [
                        'image' => menuProductImagePath("6408_fl.jpg", 'women'),
                        'title' => 'Dress Shirts',
                        'to' => '/womens-dressshirts'
                    ],
                    [
                        'image' => menuProductImagePath("9141_fl.jpg", 'women'),
                        'title' => 'Activewear',
                        'to' => '/womens-activewear'
                    ],
                    [
                        'image' => menuProductImagePath("10187_fl.jpg", 'women'),
                        'title' => 'Outerwear',
                        'to' => '/womens-outerwear'
                    ],
                    [
                        'image' => menuProductImagePath("10470_fl.jpg", 'women'),
                        'title' => 'Headwear',
                        'to' => '/womens-headwear'
                    ],
                    [
                        'image' => menuProductImagePath("9667_fl.jpg", 'women'),
                        'title' => 'Bottoms',
                        'to' => '/womens-bottoms'
                    ],
                    [
                        'image' => menuProductImagePath("94594_f_fl.jpg", 'women'),
                        'title' => 'Accessories',
                        'to' => '/womens-accessories'
                    ],
                    [
                        'image' => menuProductImagePath("8530_fl.jpg", 'women'),
                        'title' => 'Fashion',
                        'to' => '/womens-fashion'
                    ],
                    [
                        'title' => 'Shop All Category',
                        'to' => '/womens',
                        'className' => 'shop-all',
                        'viewAll' => true
                    ]
                ]
            ],
            [
                'type' => 'text-only',
                'title' => 'Shop By Fabric',
                'titleLink' => '/womens',
                'items' => [
                    [
                        'title' => 'Blends',
                        'to' => '/womens?fabrics=blends'
                    ],
                    [
                        'title' => 'Cotton - Ringspun',
                        'to' => '/womens?fabrics=cottonringspun'
                    ],
                    [
                        'title' => 'Eco-Friendly',
                        'to' => '/womens?fabrics=ecofriendly'
                    ],
                    [
                        'title' => 'Performance',
                        'to' => '/womens?fabrics=performance'
                    ],
                    [
                        'title' => 'Polyester',
                        'to' => '/womens?fabrics=polyester'
                    ]
                ],
                'options' => [
                    'shopAllLink' => [
                        'text' => 'Shop All Fabric',
                        'to' => '/womens'
                    ]
                ]
            ],
            [
                'type' => 'color-split',
                'title' => 'Shop by Color',
                'titleLink' => '/shop-by-color',
                'items' => [
                    [
                        'title' => 'Blacks',
                        'image' => menuColorImagePath("6418_fm.jpg"),
                        'to' => colorFamilyUrls('womens')['Blacks']['to']
                    ],
                    [
                        'title' => 'Greys',
                        'image' => menuColorImagePath("8520_fm.jpg"),
                        'to' => colorFamilyUrls('womens')['Greys']['to']
                    ],
                    [
                        'title' => 'Heathers',
                        'image' => menuColorImagePath("13386_fm.jpg"),
                        'to' => colorFamilyUrls('womens')['Heather']['to']
                    ],
                    [
                        'title' => 'Neutrals',
                        'image' => menuColorImagePath("8756_fm.jpg"),
                        'to' => colorFamilyUrls('womens')['Neutrals']['to']
                    ],
                    [
                        'title' => 'Hi-Vis',
                        'image' => menuColorImagePath("6532_fm.jpg"),
                        'to' => colorFamilyUrls('womens')['HiVis']['to']
                    ],
                    [
                        'title' => 'Camo',
                        'image' => menuColorImagePath("29157_fm.jpg"),
                        'to' => colorFamilyUrls('womens')['Camouflage']['to']
                    ],
                    [
                        'title' => 'Tie-Dye',
                        'image' => menuColorImagePath("15161_fm.jpg"),
                        'to' => colorFamilyUrls('womens')['Tie-Dye']['to']
                    ],
                    [
                        'title' => 'Blues',
                        'image' => menuColorImagePath("8373_fm.jpg"),
                        'to' => colorFamilyUrls('womens')['Blues']['to']
                    ],
                    [
                        'title' => 'Greens',
                        'image' => menuColorImagePath("8523_fm.jpg"),
                        'to' => colorFamilyUrls('womens')['Greens']['to']
                    ],
                    [
                        'title' => 'Oranges',
                        'image' => menuColorImagePath("6609_fm.jpg"),
                        'to' => colorFamilyUrls('womens')['Oranges']['to']
                    ],
                    [
                        'title' => 'Reds',
                        'image' => menuColorImagePath("5744_fm.jpg"),
                        'to' => colorFamilyUrls('womens')['Reds']['to']
                    ],
                    [
                        'title' => 'Browns',
                        'image' => menuColorImagePath("10061_fm.jpg"),
                        'to' => colorFamilyUrls('womens')['Browns']['to']
                    ],
                    [
                        'title' => 'Purples',
                        'image' => menuColorImagePath("6662_fm.jpg"),
                        'to' => colorFamilyUrls('womens')['Purples']['to']
                    ],
                    [
                        'title' => 'Pinks',
                        'image' => menuColorImagePath("8203_fm.jpg"),
                        'to' => colorFamilyUrls('womens')['Pinks']['to']
                    ],
                    [
                        'title' => 'Yellows',
                        'image' => menuColorImagePath("8977_fm.jpg"),
                        'to' => colorFamilyUrls('womens')['Yellows']['to']
                    ]
                ],
                'options' => [
                    'twoColumns' => true,
                    'shopAllLink' => [
                        'text' => 'Shop All Colors',
                        'to' => '/shop-by-color'
                    ]
                ]
            ],
            [
                'type' => 'brand-grid',
                'title' => 'Shop by Brands',
                'titleLink' => '/brands',
                'items' => [
                    [
                        'image' => brandImagePath("5_fm.jpg", 'medium'),
                        'title' => 'Bella + Canvas',
                        'to' => '/womens?brand=bella-canvas'
                    ],
                    [
                        'image' => brandImagePath("123_fm.jpg", 'medium'),
                        'title' => 'Next Level',
                        'to' => '/womens?brand=next-level'
                    ],
                    [
                        'image' => brandImagePath("102_fm.jpg", 'medium'),
                        'title' => 'Boxercraft',
                        'to' => '/womens?brand=boxercraft'
                    ],
                    [
                        'image' => brandImagePath("38_fm.jpg", 'medium'),
                        'title' => 'Independent',
                        'to' => '/womens?brand=independent-trading-co'
                    ],
                    [
                        'image' => brandImagePath("35_fm.jpg", 'medium'),
                        'title' => 'Gildan',
                        'to' => '/womens?brand=gildan'
                    ],
                    [
                        'image' => brandImagePath("1_fm.jpg", 'medium'),
                        'title' => 'Hanes',
                        'to' => '/womens?brand=hanes'
                    ],
                    [
                        'image' => brandImagePath("31_fm.jpg", 'medium'),
                        'title' => 'Adidas',
                        'to' => '/womens?brand=adidas'
                    ],
                    [
                        'image' => brandImagePath("17_fm.jpg", 'medium'),
                        'title' => 'J.America',
                        'to' => '/womens?brand=j-america'
                    ]
                ],
                'options' => [
                    'shopAllLink' => [
                        'text' => 'Shop All Brands',
                        'to' => '/brands'
                    ],
                    'alignCenter' => true
                ]
            ]
        ]
    ],

    /**
     * BAGS MENU
     * Special layout with chunked style columns
     */
    'bags' => [
        'title' => 'Bags',
        'to' => '/bags',
        'containerClass' => 'new-menu',
        'columns' => [
            [
                'type' => 'image-text-chunked',
                'title' => 'Shop by Style',
                'titleLink' => '/bags',
                'items' => [
                    [
                        'image' => menuProductImagePath("bag-tote.webp", 'bags', ''),
                        'title' => 'Totes',
                        'to' => '/totesbags'
                    ],
                    [
                        'image' => menuProductImagePath("bag-backpacks.webp", 'bags', ''),
                        'title' => 'Backpacks',
                        'to' => '/backpacks'
                    ],
                    [
                        'image' => menuProductImagePath("bag-cinch.webp", 'bags', ''),
                        'title' => 'Cinch',
                        'to' => '/totesbags-cinch'
                    ],
                    [
                        'image' => menuProductImagePath("bag-drawstrings.webp", 'bags', ''),
                        'title' => 'Drawstrings',
                        'to' => '/totesbags-drawstrings'
                    ],
                    [
                        'image' => menuProductImagePath("bag-duffel.webp", 'bags', ''),
                        'title' => 'Duffel Bags',
                        'to' => '/duffels'
                    ],
                    [
                        'image' => menuProductImagePath("bag-travel.webp", 'bags', ''),
                        'title' => 'Travel Bags',
                        'to' => '/travel-bags'
                    ],
                    [
                        'image' => menuProductImagePath("bag-messenger.webp", 'bags', ''),
                        'title' => 'Messenger Bags',
                        'to' => '/messenger-bags'
                    ],
                    [
                        'image' => menuProductImagePath("bag-cooler.webp", 'bags', ''),
                        'title' => 'Cooler',
                        'to' => '/coolers'
                    ],
                    [
                        'image' => menuProductImagePath("bag-hip.webp", 'bags', ''),
                        'title' => 'Crossback / Hip Packs',
                        'to' => '/hip-packs'
                    ],
                    [
                        'image' => menuProductImagePath("laptop-holders.webp", 'bags', ''),
                        'title' => 'Laptop/Tablet Holders',
                        'to' => '/laptop-tablet-holders'
                    ],
                    [
                        'image' => menuProductImagePath("gusset.webp", 'bags', ''),
                        'title' => 'Gusset',
                        'to' => '/gusset'
                    ],
                    [
                        'image' => menuProductImagePath("pockets.webp", 'bags', ''),
                        'title' => 'Pockets',
                        'to' => '/bags-pockets'
                    ],
                    [
                        'image' => menuProductImagePath("zipper-pockets.webp", 'bags', ''),
                        'title' => 'Zipper Pockets',
                        'to' => '/zipper-pockets'
                    ],
                    [
                        'title' => 'View All Bags',
                        'to' => '/bags',
                        'viewAll' => true
                    ]
                ],
                'options' => [
                    'chunks' => 3,
                    'bigImages' => true,
                    'imageHeight' => 54,
                    'imageWidth' => 67
                ]
            ],
            [
                'type' => 'color-split',
                'title' => 'Shop by Color',
                'titleLink' => '/shop-by-color',
                'items' => [
                    [
                        'title' => 'Whites',
                        'image' => menuColorImagePath("7229_fm.jpg"),
                        'to' => colorFamilyUrls('bags')['Whites']['to']
                    ],
                    [
                        'title' => 'Blacks',
                        'image' => menuColorImagePath("6418_fm.jpg"),
                        'to' => colorFamilyUrls('bags')['Blacks']['to']
                    ],
                    [
                        'title' => 'Neutrals',
                        'image' => menuColorImagePath("8756_fm.jpg"),
                        'to' => colorFamilyUrls('bags')['Neutrals']['to']
                    ],
                    [
                        'title' => 'Blues',
                        'image' => menuColorImagePath("8373_fm.jpg"),
                        'to' => colorFamilyUrls('bags')['Blues']['to']
                    ],
                    [
                        'title' => 'Greens',
                        'image' => menuColorImagePath("8523_fm.jpg"),
                        'to' => colorFamilyUrls('bags')['Greens']['to']
                    ],
                    [
                        'title' => 'Oranges',
                        'image' => menuColorImagePath("6609_fm.jpg"),
                        'to' => colorFamilyUrls('bags')['Oranges']['to']
                    ],
                    [
                        'title' => 'Reds',
                        'image' => menuColorImagePath("5744_fm.jpg"),
                        'to' => colorFamilyUrls('bags')['Reds']['to']
                    ],
                    [
                        'title' => 'Browns',
                        'image' => menuColorImagePath("10061_fm.jpg"),
                        'to' => colorFamilyUrls('bags')['Browns']['to']
                    ],
                    [
                        'title' => 'Purples',
                        'image' => menuColorImagePath("6662_fm.jpg"),
                        'to' => colorFamilyUrls('bags')['Purples']['to']
                    ],
                    [
                        'title' => 'Pinks',
                        'image' => menuColorImagePath("8203_fm.jpg"),
                        'to' => colorFamilyUrls('bags')['Pinks']['to']
                    ],
                    [
                        'title' => 'Yellows',
                        'image' => menuColorImagePath("8977_fm.jpg"),
                        'to' => colorFamilyUrls('bags')['Yellows']['to']
                    ]
                ],
                'options' => [
                    'twoColumns' => true,
                    'shopAllLink' => [
                        'text' => 'Shop All Colors',
                        'to' => '/shop-by-color'
                    ]
                ]
            ],
            [
                'type' => 'brand-grid',
                'title' => 'Shop by Brands',
                'titleLink' => '/brands',
                'items' => [
                    [
                        'image' => brandImagePath("portauthorityheader.jpg", 'medium'),
                        'title' => 'Port Authority',
                        'to' => '/bags?brand=port-authority'
                    ],
                    [
                        'image' => brandImagePath("95_fm.jpg", 'medium'),
                        'title' => 'Liberty Bag',
                        'to' => '/bags?brand=liberty-bags'
                    ],
                    [
                        'image' => brandImagePath("127_fm.jpg", 'medium'),
                        'title' => 'Oad',
                        'to' => '/bags?brand=oad'
                    ],
                    [
                        'image' => brandImagePath("137_fm.jpg", 'medium'),
                        'title' => 'Qtees',
                        'to' => '/bags?brand=q-tees'
                    ],
                    [
                        'image' => brandImagePath("36_fm.jpg", 'medium'),
                        'title' => 'Dri-Duck',
                        'to' => '/bags?brand=dri-duck'
                    ],
                    [
                        'image' => brandImagePath("bg.jpg", 'medium'),
                        'title' => 'BadgeEdge',
                        'to' => '/bags?brand=bagedge'
                    ],
                    [
                        'image' => brandImagePath("ec.jpg", 'medium'),
                        'title' => 'Econscious',
                        'to' => '/bags?brand=econscious'
                    ],
                    [
                        'image' => brandImagePath("sporttekheader.jpg", 'medium'),
                        'title' => 'Sport-Tek',
                        'to' => '/bags?brand=sport-tek'
                    ]
                ],
                'options' => [
                    'shopAllLink' => [
                        'text' => 'Shop All Brands',
                        'to' => '/brands'
                    ]
                ]
            ]
        ]
    ],

    /**
     * ACCESSORIES MENU
     * Multiple style columns
     */
    'accessories' => [
        'title' => 'Accessories',
        'to' => '/accessories',
        'containerClass' => 'mega-menu__col6',
        'columns' => [
            [
                'type' => 'image-text',
                'title' => 'Shop by Style',
                'titleLink' => '/accessories',
                'items' => [
                    [
                        'image' => menuProductImagePath("34298_f_fl.jpg", 'accessories', 'size-54'),
                        'title' => 'Aprons',
                        'to' => '/aprons'
                    ],
                    [
                        'image' => menuProductImagePath("43363_f_fl.jpg", 'accessories', 'size-54'),
                        'title' => 'Beanies',
                        'to' => '/beanies'
                    ],
                    [
                        'image' => menuProductImagePath("39242_fl.jpg", 'accessories', 'size-54'),
                        'title' => 'Bibs',
                        'to' => '/bibs'
                    ],
                    [
                        'image' => menuProductImagePath("86723_f_fl.jpg", 'accessories', 'size-54'),
                        'title' => 'Blankets',
                        'to' => '/blankets'
                    ]
                ],
                'options' => [
                    'bigImages' => true,
                    'imageHeight' => 54,
                    'imageWidth' => 67
                ]
            ],
            [
                'type' => 'image-text',
                'title' => 'Shop by Style',
                'titleLink' => '/accessories',
                'items' => [
                    [
                        'image' => menuProductImagePath("93969_f_fl.jpg", 'accessories', 'size-54'),
                        'title' => 'Camouflage',
                        'to' => '/camouflage'
                    ],
                    [
                        'image' => menuProductImagePath("93875_f_fl.jpg", 'accessories', 'size-54'),
                        'title' => 'Face Coverings',
                        'to' => '/facemasks'
                    ],
                    [
                        'image' => menuProductImagePath("82311_f_fl.jpg", 'accessories', 'size-54'),
                        'title' => 'Hats',
                        'to' => '/headwear'
                    ],
                    [
                        'image' => menuProductImagePath("45780_f_fl.jpg", 'accessories', 'size-54'),
                        'title' => 'Onesies',
                        'to' => '/onesies'
                    ]
                ],
                'options' => [
                    'headerHidden' => true,
                    'bigImages' => true,
                    'imageHeight' => 54,
                    'imageWidth' => 67
                ]
            ],
            [
                'type' => 'image-text',
                'title' => 'Shop by Style',
                'titleLink' => '/accessories',
                'items' => [
                    [
                        'image' => menuProductImagePath("25863_f_fl.jpg", 'accessories', 'size-54'),
                        'title' => 'Scarves',
                        'to' => '/scarfscarves'
                    ],
                    [
                        'image' => menuProductImagePath("2547_fm.jpg", 'accessories', 'size-54'),
                        'title' => 'Towels',
                        'to' => '/towels'
                    ],
                    [
                        'title' => 'View All Accessories',
                        'to' => '/accessories',
                        'viewAll' => true
                    ]
                ],
                'options' => [
                    'headerHidden' => true,
                    'hideLastChild' => true,
                    'bigImages' => true,
                    'imageHeight' => 62,
                    'imageWidth' => 50
                ]
            ],
            [
                'type' => 'color-split',
                'title' => 'Shop by Color',
                'titleLink' => '/shop-by-color',
                'items' => [
                    [
                        'title' => 'Blacks',
                        'image' => menuColorImagePath("6418_fm.jpg"),
                        'to' => colorFamilyUrls('accessories')['Blacks']['to']
                    ],
                    [
                        'title' => 'Greys',
                        'image' => menuColorImagePath("8520_fm.jpg"),
                        'to' => colorFamilyUrls('accessories')['Greys']['to']
                    ],
                    [
                        'title' => 'Blues',
                        'image' => menuColorImagePath("8373_fm.jpg"),
                        'to' => colorFamilyUrls('accessories')['Blues']['to']
                    ],
                    [
                        'title' => 'Greens',
                        'image' => menuColorImagePath("8523_fm.jpg"),
                        'to' => colorFamilyUrls('accessories')['Greens']['to']
                    ],
                    [
                        'title' => 'Oranges',
                        'image' => menuColorImagePath("6609_fm.jpg"),
                        'to' => colorFamilyUrls('accessories')['Oranges']['to']
                    ],
                    [
                        'title' => 'Reds',
                        'image' => menuColorImagePath("5744_fm.jpg"),
                        'to' => colorFamilyUrls('accessories')['Reds']['to']
                    ],
                    [
                        'title' => 'Browns',
                        'image' => menuColorImagePath("10061_fm.jpg"),
                        'to' => colorFamilyUrls('accessories')['Browns']['to']
                    ],
                    [
                        'title' => 'Purples',
                        'image' => menuColorImagePath("6662_fm.jpg"),
                        'to' => colorFamilyUrls('accessories')['Purples']['to']
                    ],
                    [
                        'title' => 'Pinks',
                        'image' => menuColorImagePath("8203_fm.jpg"),
                        'to' => colorFamilyUrls('accessories')['Pinks']['to']
                    ],
                    [
                        'title' => 'Yellows',
                        'image' => menuColorImagePath("8977_fm.jpg"),
                        'to' => colorFamilyUrls('accessories')['Yellows']['to']
                    ],
                    [
                        'title' => 'Camo',
                        'image' => menuColorImagePath("29157_fm.jpg"),
                        'to' => colorFamilyUrls('accessories')['Camouflage']['to']
                    ],
                    [
                        'title' => 'Tie-Dye',
                        'image' => menuColorImagePath("15161_fm.jpg"),
                        'to' => colorFamilyUrls('accessories')['Tie-Dye']['to']
                    ]
                ],
                'options' => [
                    'width' => '28%',
                    'shopAllLink' => [
                        'text' => 'Shop All Colors',
                        'to' => '/shop-by-color'
                    ]
                ]
            ],
            [
                'type' => 'brand-grid',
                'title' => 'Shop by Brands',
                'titleLink' => '/brands',
                'items' => [
                    [
                        'image' => brandImagePath("115_fm.jpg", 'medium'),
                        'title' => 'The Towel Carmen',
                        'to' => '/accessories?brand=carmel-towel-company'
                    ],
                    [
                        'image' => brandImagePath("36_fm.jpg", 'medium'),
                        'title' => 'Dri-Duck',
                        'to' => '/accessories?brand=dri-duck'
                    ],
                    [
                        'image' => brandImagePath("142_fm.jpg", 'medium'),
                        'title' => 'Alpine Fleece',
                        'to' => '/accessories?brand=alpine-fleece'
                    ],
                    [
                        'image' => brandImagePath("95_fm.jpg", 'medium'),
                        'title' => 'Liberty Bag',
                        'to' => '/accessories?brand=liberty-bags'
                    ],
                    [
                        'image' => brandImagePath("127_fm.jpg", 'medium'),
                        'title' => 'Oad',
                        'to' => '/accessories?brand=oad'
                    ],
                    [
                        'image' => brandImagePath("137_fm.jpg", 'medium'),
                        'title' => 'Qtees',
                        'to' => '/accessories?brand=q-tees'
                    ],
                    [
                        'image' => brandImagePath("47_fm.jpg", 'medium'),
                        'title' => 'Sportsman',
                        'to' => '/accessories?brand=sportsman'
                    ],
                    [
                        'image' => brandImagePath("70_fm.jpg", 'medium'),
                        'title' => 'Outdoor Cap',
                        'to' => '/accessories?brand=valucap'
                    ]
                ],
                'options' => [
                    'shopAllLink' => [
                        'text' => 'Shop All Brands',
                        'to' => '/brands'
                    ]
                ]
            ]
        ]
    ],


    'more' => [
        'title' => 'More',
        'to' => '/loungewear',
        'containerClass' => 'mega-menu__col5',
        'items' =>  [
            [
                "title" => "Onesies",
                "to" => "/onesies",
                "image" => menuProductImagePath("7853_fm.jpg", $CATEGORY, $SIZE),
            ],
            [
                "title" => "Thumbholes",
                "to" => "/thumbholes",
                "image" => menuProductImagePath("96605_omf_fm.jpg", $CATEGORY, $SIZE),
            ],
            [
                "title" => "Packables",
                "to" => "/packables",
                "image" => menuProductImagePath("7378_fm.jpg", $CATEGORY, $SIZE),
            ],
            [
                "title" => "Raglans",
                "to" => "/raglans",
                "image" => menuProductImagePath("101146_omf_fm.jpg", $CATEGORY, $SIZE),
            ],

            [
                "title" => "Eco-Friendly",
                "to" => "/ecofriendly",
                "image" => menuProductImagePath("143_fm.jpg", $CATEGORY, $SIZE),

            ],
            [
                "title" => "Crop Tops",
                "to" => "/croptops", // Start - New Menu Bar - CL - 6252025
                "image" => menuProductImagePath("93455_omf_fm.jpg", $CATEGORY, $SIZE),
            ],
            [
                "title" => "V-Necks",
                "to" => "/vneck",
                "image" => menuProductImagePath("3228_fm.jpg", $CATEGORY, $SIZE),
            ],
            [
                "title" => "Loungewear",
                "to" => "/loungewear", // Start - New Menu Bar - CL - 6252025
                "image" => menuProductImagePath("103339_f_fm.jpg", $CATEGORY, $SIZE),
            ],
            [
                "title" => "Workwear",
                "to" => "/workwear",
                "image" => menuProductImagePath("51935_f_fm.jpg", $CATEGORY, $SIZE),
            ],
            [
                "title" => "Dress Shirts",
                "to" => "/dressshirts",
                "image" => menuProductImagePath("98370_f_fm.jpg", $CATEGORY, $SIZE),
            ],

            [
                "title" => "Tagless",
                "to" => "/tagless",
                "image" => menuProductImagePath("10531_fm.jpg", $CATEGORY, $SIZE),
            ],

            [
                "title" => "Tear Away",
                "to" => "/tearaway",
                "image" => menuProductImagePath("369_fm.jpg", $CATEGORY, $SIZE),
            ],
            [
                "title" => "USA Made",
                "to" => "/usamade",
                "image" => menuProductImagePath("10803_fm.jpg", $CATEGORY, $SIZE),
            ],
            [
                "title" => "Fashion",
                "to" => "/fashion",
                "image" => menuProductImagePath("3227_fm.jpg", $CATEGORY, $SIZE),
            ],
            [
                "title" => "T-Shirts",
                "to" => "/tshirts",
                "image" => menuProductImagePath("16_fm.jpg", $CATEGORY, $SIZE),
            ],
            [
                "title" => "Sweatshirts",
                "to" => "/sweatshirts",
                "image" => menuProductImagePath("393_fm.jpg", $CATEGORY, $SIZE),
            ],
            [
                "title" => "Polos",
                "to" => "/polos",
                "image" => menuProductImagePath("7682_fm.jpg", $CATEGORY, $SIZE),
            ],
            [
                "title" => "Activewear",
                "to" => "/activewear",
                "image" => menuProductImagePath("35718_omf_fm.jpg", $CATEGORY, $SIZE),
            ],
            [
                "title" => "Outerwear",
                "to" => "/outerwear",
                "image" => menuProductImagePath("3324_fm.jpg", $CATEGORY, $SIZE),
            ],
            [
                "title" => "Headwear",
                "to" => "/headwear",
                "image" => menuProductImagePath("10450_fm.jpg", $CATEGORY, $SIZE),
            ],
            [
                "title" => "Accessories",
                "to" => "/accessories",
                "image" => menuProductImagePath("3388_fm.jpg", $CATEGORY, $SIZE),
            ],

            [
                "title" => "High Visibility",
                "to" => "/highvisibility",
                "image" => menuProductImagePath("6532_fm.png", $CATEGORY, $SIZE),
            ],
            // End - Color Icon Fixes - LS - 9/18/2025
            [
                "title" => "Neon",
                "to" => "/neons",
                "image" => menuProductImagePath("1036985.png", $CATEGORY, $SIZE),
            ],
            // Start - Color Icon Fixes - LS - 9/18/2025
            [
                "title" => "Camouflage",
                "to" => "/camouflage",
                "image" => menuProductImagePath("29157_fm.png", $CATEGORY, $SIZE),
            ],
            [
                "title" => "Tie Dye",
                "to" => "/tiedyed",
                "image" => menuProductImagePath("15161_fm.png", $CATEGORY, $SIZE),
            ],
            // End - Color Icon Fixes - LS - 9/18/2025
            [
                "title" => "Prints & Patterns",
                "to" => "/its-all-about-prints-and-patterns",
                "image" => menuProductImagePath("19980.png", $CATEGORY, $SIZE),
            ],

            [
                "title" => "BulkApparel Sales",
                "to" => "/sales"
            ],
            [
                "title" => "Shop Under $5",
                "to" => "/shop-under-5-dollars"
            ],
            [
                "title" => "New Arrivals",
                "to" => "/new"
            ],

            [
                "title" => "Influencer Program",
                "to" => "/influencer-program-form"
            ],
            [
                "title" => "BulkApparel Blogs",
                "to" => "https://blog.bulkapparel.com/"
            ],
        ]
    ],

    'colors' => [
        'title' => 'Outerwear',
        'to' => '/outerwear',
        'containerClass' => 'mega-menu__col6',
        'columns' => [
            [
                'type' => 'color-text',
                'title' => 'Whites',
                'titleLink' => colorFamilyUrls()['Whites']['to'],
                'group' => 1,
                'items' => [
                    [
                        "title" => "White",
                        "to" => "/styles?colorgroup=79",
                        "colors" => "#fff",
                    ],
                    [
                        "title" => "PFD White",
                        "to" => "/styles?colorgroup=56",
                        "colors" => "#eeedeb",
                    ],
                ],
            ],

            [
                'type' => 'color-text',
                'title' => 'Blacks',
                'titleLink' => colorFamilyUrls()['Blacks']['to'],
                'group' => 1,
                'items' => [
                    [
                        "title" => "Black",
                        "to" => "/styles?colorgroup=8",
                        "colors" => "#000",
                    ],
                    // Start - Shop by colors - LS - 9/12/2025
                    [
                        "title" => "Jet Black",
                        "to" => "/styles?colorgroup=8",
                        "colors" => "#2a2a2a",
                    ],
                ],
            ],

            [
                'type' => 'color-text',
                'title' => 'Blues',
                'titleLink' => colorFamilyUrls()['Blues']['to'],
                'group' => 2,
                'items' => [
                    [
                        "title" => "Blue",
                        "to" => "/styles?colorgroup=70",
                        "colors" => "#7695cb",
                    ],
                    [
                        "title" => "Carolina Blue",
                        "to" => "/styles?colorgroup=15",
                        "colors" => "#3a5065",
                    ],
                    // Start - Shop by colors - LS - 9/12/2025
                    [
                        "title" => "Indigo Blue",
                        "to" => "/styles?colorgroup=35",
                        "colors" => "#5f6f86",
                    ],
                    // End - Shop by colors - LS - 9/12/2025
                    [
                        "title" => "Iris Blue",
                        "to" => "/styles?colorgroup=36",
                        "colors" => "#4e73a0",
                    ],
                    [
                        "title" => "Light Blue",
                        "to" => "/styles?colorgroup=43",
                        "colors" => "#9cb8ce",
                    ],
                    [
                        "title" => "Metro Blue",
                        "to" => "/styles?colorgroup=47",
                        "colors" => "#2a3e70",
                    ],
                    [
                        "title" => "Navy",
                        "to" => "/styles?colorgroup=50",
                        "colors" => "#121429",
                    ],
                    // Start - Shop by colors - LS - 9/12/2025
                    [
                        "title" => "Oceana",
                        "to" => "/styles?colorgroup=51",
                        "colors" => "#649197",
                    ],
                    // End - Shop by colors - LS - 9/12/2025
                    [
                        "title" => "Royal",
                        "to" => "/styles?colorgroup=62",
                        "colors" => "#1e61a7",
                    ],
                    [
                        "title" => "Sapphire",
                        "to" => "/styles?colorgroup=68",
                        "colors" => "#007eb1",
                    ],
                    [
                        "title" => "Sky",
                        "to" => "/styles?colorgroup=43",
                        "colors" => "#85c7df",
                    ],
                    [
                        "title" => "Stone Blue",
                        "to" => "/styles?colorgroup=72",
                        "colors" => "#7e97b1",
                    ],
                ],
            ],

            [
                'type' => 'color-text',
                'title' => 'Greens',
                'titleLink' => colorFamilyUrls()['Greens']['to'],
                'group' => 3,
                'items' => [
                    [
                        "title" => "Green",
                        "to" => "/styles?colorgroup=40",
                        "colors" => "#008000",
                    ],
                    [
                        "title" => "Forest",
                        "to" => "/styles?colorgroup=25",
                        "colors" => "#10271d",
                    ],
                    [
                        "title" => "Irish Green",
                        "to" => "/styles?colorgroup=37",
                        "colors" => "#009b57",
                    ],
                    [
                        "title" => "Jade Dome",
                        "to" => "/styles?colorgroup=38",
                        "colors" => "#008083",

                    ],
                    [
                        "title" => "Kelly",
                        "to" => "/styles?colorgroup=40",
                        "colors" => "#009266",
                    ],
                    [
                        "title" => "Kiwi",
                        "to" => "/styles?colorgroup=45",
                        "colors" => "#94aa6c",
                    ],
                    [
                        "title" => "Lime",
                        "to" => "/styles?colorgroup=45",
                        "colors" => "#94aa6c",
                    ],
                    [
                        "title" => "Military",
                        "to" => "/styles?colorgroup=48",
                        "colors" => "#56513d",
                    ],
                    [
                        "title" => "Mint",
                        "to" => "/styles?colorgroup=58",
                        "colors" => "#8fd6ab",
                    ],
                    [
                        "title" => "Pistachio",
                        "to" => "/styles?colorgroup=58",
                        "colors" => "#bdca9e",
                    ],
                    [
                        "title" => "Sage",
                        "to" => "/styles?colorgroup=48",
                        "colors" => "#aeb89f",
                    ],
                ],
            ],

            [
                'type' => 'color-text',
                'title' => 'Oranges',
                'group' => 4,
                'titleLink' => colorFamilyUrls()['Oranges']['to'],
                'items' => [
                    [
                        "title" => "Orange",
                        "to" => "/styles?colorgroup=53",
                        "colors" => "#ec7229",
                    ],
                    [
                        "title" => "Gold",
                        "to" => "/styles?colorgroup=53",
                        "colors" => "#fab22a",
                    ],
                    [
                        "title" => "Salmon",
                        "to" => "/styles?colorgroup=66",
                        "colors" => "#f96652",
                    ],
                    [
                        "title" => "Tangerine",
                        "to" => "/styles?colorgroup=74",
                        "colors" => "#f5853b",
                    ],
                    [
                        "title" => "Texas Orange",
                        "to" => "/styles?colorgroup=75",
                        "colors" => "#a85a34",
                    ],
                ],
            ],

            [
                'type' => 'color-text',
                'title' => 'Reds',
                'titleLink' => colorFamilyUrls()['Reds']['to'],
                'group' => 4,
                'items' => [
                    [
                        "title" => "Red",
                        "to" => "/styles?colorgroup=61",
                        "colors" => "#dc1929",
                    ],
                    [
                        "title" => "Cardinal",
                        "to" => "/styles?colorgroup=14",
                        "colors" => "#970f23",
                    ],
                    [
                        "title" => "Maroon",
                        "to" => "/styles?colorgroup=46",
                        "colors" => "#4f1222",
                    ],
                    [
                        "title" => "Paprika",
                        "to" => "/styles?colorgroup=61",
                        "colors" => "#ea4043",
                    ],
                ],
            ],

            [
                'type' => 'color-text',
                'title' => 'Pinks',
                'group' => 5,
                'titleLink' => colorFamilyUrls()['Pinks']['to'],

                'items' => [
                    [
                        "title" => "Pink",
                        "to" => "/styles?colorgroup=44",
                        "colors" => "#FFC0CB",
                    ],
                    [
                        "title" => "Azalea",
                        "to" => "/styles?colorgroup=7",
                        "colors" => "#de90a8",
                    ],
                    [
                        "title" => "Heliconia",
                        "to" => "/styles?colorgroup=32",
                        "colors" => "#dd3777",
                    ],
                    [
                        "title" => "Light Pink",
                        "to" => "/styles?colorgroup=44",
                        "colors" => "#fcdbe4",
                    ],
                    [
                        "title" => "Mauve",
                        "to" => "/styles?colorgroup=44",
                        "colors" => "#c28285",
                    ],
                ],
            ],

            [
                'type' => 'color-text',
                'title' => 'Yellows',
                'group' => 5,
                'titleLink' => colorFamilyUrls()['Yellows']['to'],
                'items' => [
                    [
                        "title" => "Yellow",
                        "to" => "/styles?colorgroup=21+80",
                        "colors" => "#faea84",
                    ],
                    [
                        "title" => "Daisy",
                        "to" => "/styles?colorgroup=21",
                        "colors" => "#f7df75",
                    ],
                    [
                        "title" => "Yellow Haze",
                        "to" => "/styles?colorgroup=80",
                        "colors" => "#fedaa0",
                    ],
                ],
            ],


            [
                'type' => 'color-text',
                'title' => 'Browns',
                'titleLink' => colorFamilyUrls()['Browns']['to'],
                'group' => 6,
                'items' => [
                    [
                        "title" => "Brown",
                        "to" => "/styles?colorgroup=81",
                        "colors" => "#8d5c40",
                    ],
                    [
                        "title" => "Chestnut",
                        "to" => "/styles?colorgroup=82",
                        "colors" => "#68463c",
                    ],
                    [
                        "title" => "Dark Chocolate",
                        "to" => "/styles?colorgroup=83",
                        "colors" => "#473231",
                    ],
                    [
                        "title" => "Khaki",
                        "to" => "/styles?colorgroup=84",
                        "colors" => "#9a8779",
                    ],
                    [
                        "title" => "Sand",
                        "to" => "/styles?colorgroup=85",
                        "colors" => "#c8b79b",
                    ],
                ],
            ],
            [
                'type' => 'color-text',
                'title' => 'Purples',
                'titleLink' => colorFamilyUrls()['Purples']['to'],
                'group' => 6,
                'items' => [
                    [
                        "title" => "Purple",
                        "to" => "/styles?colorgroup=54",
                        "colors" => "#4c3b6f",
                    ],
                    [
                        "title" => "Orchid",
                        "to" => "/styles?colorgroup=60",
                        "colors" => "#bfa8d6",
                    ],
                    [
                        "title" => "Violet",
                        "to" => "/styles?colorgroup=78",
                        "colors" => "#9093c6",
                    ],
                ],
            ],
            [
                'type' => 'color-text',
                'title' => 'Greys',
                'titleLink' => colorFamilyUrls()['Greys']['to'],
                'group' => 7,
                'items' => [
                    [
                        "title" => "Ash",
                        "to" => "/styles?colorgroup=4",
                        "colors" => "#cfc9c9",
                    ],
                    [
                        "title" => "Charcoal",
                        "to" => "/styles?colorgroup=17",
                        "colors" => "#52494a",
                    ],
                    [
                        "title" => "Gravel",
                        "to" => "/styles?colorgroup=59",
                        "colors" => "#888b8d",
                    ],
                    [
                        "title" => "Silver",
                        "to" => "/styles?colorgroup=84",
                        "colors" => "#b5b1b2",
                    ],
                    [
                        "title" => "Sports Grey",
                        "to" => "/styles?colorgroup=71",
                        "colors" => "#b0acad",
                    ],
                ],
            ],
            [
                'type' => 'color-text',
                'title' => 'Heather',
                'titleLink' => colorFamilyUrls()['Heather']['to'],
                'group' => 7,
                'items' => [
                    [
                        "title" => "All Heathers",
                        "to" => "/styles?colorgroup=71",
                        "image" => "/includes/menu-items/images/colors/13386_fm.jpg",
                        "colors" => "#b0acad",
                    ],
                ],
            ],

            [
                'type' => 'color-text',
                'title' => 'Hi-Vis',
                'titleLink' => colorFamilyUrls()['HiVis']['to'],
                'group' => 7,
                'items' => [
                    [
                        "title" => "High Visibility",
                        "to" => colorFamilyUrls()['HiVis']['to'],
                        "className" => "hi-vi",
                        "image" => "/includes/menu-items/images/colors/6532_fm.jpg",
                        "colors" => "#fff",
                    ],
                ],
            ],
            [
                'type' => 'color-text',
                'title' => 'Safety',
                'titleLink' => colorFamilyUrls()['Safety']['to'],
                'group' => 8,
                'items' => [
                    [
                        "title" => "Safety Green",
                        "to" => "/styles?colorgroup=64",
                        "colors" => "#e0fe62",
                    ],
                    [
                        "title" => "Safety Orange",
                        "to" => "/styles?colorgroup=65",
                        "colors" => "#ff5a01",
                    ],
                    [
                        "title" => "Safety Pink",
                        "to" => "/styles?colorgroup=7",
                        "colors" => "#f175a6",
                    ],
                    [
                        "title" => "Safety Yellow",
                        "to" => "/styles?colorgroup=85",
                        "colors" => "#d2fd18",
                    ],
                ],
            ],
            [
                'type' => 'color-text',
                'title' => 'Neons',
                'titleLink' => colorFamilyUrls()['Neons']['to'],
                'group' => 8,
                'items' => [
                    [
                        "title" => "Neon Green",
                        "to" => "/styles?colorgroup=45",
                        "colors" => "#0BFB5A",
                    ],
                    [
                        "title" => "Neon Orange",
                        "to" => "/styles?colorgroup=53",
                        "colors" => "#f54c23",
                    ],
                    [
                        "title" => "Neon Pink",
                        "to" => "/styles?colorgroup=32",
                        "colors" => "#dc3482",
                    ],
                    [
                        "title" => "Neon Yellow",
                        "to" => "/styles?colorgroup=85",
                        "colors" => "#d0d862",
                    ],
                ],
            ],
            [
                'type' => 'color-text',
                'title' => 'Neutrals',
                'titleLink' => colorFamilyUrls()['Neutrals']['to'],
                'group' => 9,
                'items' => [
                    [
                        "title" => "Natural",
                        "to" => "/styles?colorgroup=49",
                        "colors" => "#ede0cf",
                    ],
                    [
                        "title" => "PFD White",
                        "to" => "/styles?colorgroup=56",
                        "colors" => "#eeedec",
                    ],
                    [
                        "title" => "Brown",
                        "to" => "/styles?colorgroup=22",
                        "colors" => "#8d5c40",
                    ],
                    [
                        "title" => "White",
                        "to" => "/styles?colorgroup=79",
                        "colors" => "#fff",
                    ],
                    [
                        "title" => "Black",
                        "to" => "/styles?colorgroup=8",
                        "colors" => "#000",
                    ],
                    [
                        "title" => "Tan",
                        "to" => "/styles?colorgroup=88",
                        "colors" => "#cab9a5",
                    ],
                ],
            ],

            [
                'type' => 'color-text',
                'title' => 'Camouflage',
                'titleLink' => colorFamilyUrls()['Camouflage']['to'],
                'group' => 9,
                'items' => [
                    [
                        "title" => "Camouflage",
                        "to" => "/styles?colorgroup=87",
                        "className" => "camouflage-color",
                        "image" => "/includes/menu-items/images/colors/29157_fm.jpg",
                        "colors" => "#3a4925",
                    ],
                ],
            ],
            [
                'type' => 'color-text',
                'title' => 'Tie-Dye',
                'titleLink' => colorFamilyUrls()['Tie-Dye']['to'],
                'group' => 9,
                'items' => [
                    [
                        "title" => "Tie-Dye",
                        "to" => colorFamilyUrls()['Tie-Dye']['to'],
                        "className" => "tie-Dye-color",
                        "image" => "/includes/menu-items/images/colors/15161_fm.jpg",
                        "colors" => "#fff",
                    ],
                ],
            ],
        ]
    ]
];



/**
 * Returns an array of color family links for menus.
 *
 * @param string $slug Base path or slug, defaults to 'styles'.
 * @return array List of color family associative arrays.
 */
function colorFamilyUrls($slug = 'styles')
{
    // Define color families and correct any mistakes in title-to-colorfamily mapping
    $colorFamilies = [
        'Whites',
        'Blacks',
        'Blues',
        'Greens',
        'Oranges',
        'Reds',
        'Pinks',
        'Yellows',
        'Browns',
        'Purples',
        'Greys',
        'Heather',
        'Camouflage',
        'Neutrals',
    ];

    // Build array with color name as the key for each color family
    $result = [
        'Neons' => [
            'title' => 'Neons',
            'to' => "/$slug?colorgroup=45+53+32+85",
        ],
        'Safety' => [
            'title' => 'Safety',
            'to' => "/$slug?colorgroup=64+65+7+85",
        ],
        'HiVis' => [
            'title' => 'HiVis',
            'to' => "/$slug?fitid=highvisibility",
        ],
        'Tie-Dye' => [
            'title' => 'Tie-Dye',
            'to' => "/$slug?fitid=tiedyed",
        ],
    ];
    foreach ($colorFamilies as $family) {
        $encodedFamily = urlencode($family);
        $result[$family] = [
            'title' => $family,
            'to' => "/$slug?colorfamily={$encodedFamily}",
        ];
    }

    

    return $result;
}

// ============================================================================
// RENDERING FUNCTIONS
// ============================================================================

/**
 * Main renderer function - renders a complete mega menu
 * 
 * @param string $menuKey The key from $megaMenusConfig
 * @return string HTML output
 */
function renderMegaMenu($menuKey)
{
    global $megaMenusConfig;

    if (!isset($megaMenusConfig[$menuKey])) {
        return "<!-- Menu '{$menuKey}' not found -->";
    }

    $config = $megaMenusConfig[$menuKey];
    $containerClass = isset($config['containerClass']) ? $config['containerClass'] : 'mega-menu__col5';



    if ($menuKey === 'colors') {
        return renderColorsMenu($config['columns']);
    }


    $columns = $config['columns'] ?? [];
    if (empty($columns)) {
        return '';
    }
    $html = '<div class="mega-menu">';
    $html .= '<div class="new-menu ' . htmlspecialchars($containerClass) . '">';

    foreach ($columns as $column) {
        $html .= renderColumn($column);
    }
    $html .= '</div>'; // .new-menu
    $html .= '</div>'; // .mega-menu

    return $html;
}


function renderRegularMenu($columns) {}


function renderColorsMenu($columns)
{


    $html = '
    <div class="mega-menu">
        <div class="new-menu new-menu--shopbycolor" style="flex-wrap: wrap;">
            <div class="new-menu__col new-menu__header mb-0" style="width: 100%;display:flex">
                <p class="new-menu__color-header">Select a color. each matching shade is now shown for each style.</p>
                <a class="shop-color-view-more" href="/shop-by-color">View All Colors</a>
            </div>
    ';



    $groupedColumns = [
        // [
        //     'type' => 'color-text',
        //     'title' => '',
        //     'titleLink' => '',
        //     'items' => [
        //         [
        //             'title' => $column['title'],
        //             'titleLink' => $column['titleLink'],
        //         ],
        //         [
        //             'title' => $item['title'],
        //             'color' => $item['color'],
        //             'to' => $item['to'],
        //         ],
        //         ...
        //         [
        //             'title' => $column['title'],
        //             'titleLink' => $column['titleLink'],
        //         ],
        //     ],
        // ]
    ];
    foreach ($columns as $column) {
        $group = $column['group'] ?? 0;
        $groupedColumns[$group][] = $column;
    }


    $finalColumns = [];

    foreach ($groupedColumns as $group => $columns) {

        $temp = [];

        foreach ($columns as $column) {
            $temp[] = [
                'title' => $column['title'],
                'titleLink' => $column['titleLink'] ?? null,
            ];

            foreach ($column['items'] as $item) {
                $temp[] = [
                    'title' => $item['title'],
                    'colors' => $item['colors'],
                    'to' => $item['to'],
                    'image' => $item['image'] ?? null,
                ];
            }
        }

        $finalColumns[] = [
            'type' => 'color-text',
            'title' => '',
            'titleLink' => '',
            'items' => $temp,
        ];
    }


    // echo '<pre>';
    // print_r($finalColumns);
    // echo '</pre>';
    // exit;

    foreach ($finalColumns as $column) {
        $html .= renderColumn($column);
    }

    return $html;
}

/**
 * Renders a single column based on its type
 * 
 * @param array $column Column configuration
 * @return string HTML output
 */
function renderColumn($column)
{
    $type = $column['type'] ?? 'image-text';
    $title = $column['title'] ?? '';
    $options = $column['options'] ?? [];
    $width = $options['width'] ?? null;

    $widthStyle = $width ? ' style="width: ' . htmlspecialchars($width) . ';"' : '';

    // Determine column wrapper class
    $colClass = 'new-menu__col';
    if ($type === 'color-split') {
        $colClass .= ' new-menu__col-base';
        if (isset($options['twoColumns'])) {
            $colClass .= ' new-menu__two-colums';
        }
    } elseif ($type === 'brand-grid') {
        $colClass .= ' new-menu__col-brand';
        if (isset($options['alignCenter'])) {
            $colClass .= ' align-center';
        }
    } elseif ($type === 'color-text') {
        $colClass .= ' new-menu__col-wide';
    }

    $html = '<div class="' . $colClass . '"' . $widthStyle . '>';

    // Render based on column type
    switch ($type) {
        case 'image-text':
        case 'image-text-chunked':
            $html .= renderImageTextColumn($column);
            break;
        case 'text-only':
            $html .= renderTextOnlyColumn($column);
            break;
        case 'color-split':
            $html .= renderColorSplitColumn($column);
            break;
        case 'brand-grid':
            $html .= renderBrandGridColumn($column);
            break;
        case 'color-text':
            $html .= renderColorTextColumn($column);
            break;
        default:
            $html .= "<!-- Unknown column type: {$type} -->";
    }

    $html .= '</div>';

    return $html;
}


function renderColumnTitle($titleConfig, $columnOptions)
{
    $title = $titleConfig['title'] ?? '';
    $titleLink = $titleConfig['titleLink'] ?? null;
    $options = $columnOptions ?? [];
    $html = '';

    if (!isset($options['headerHidden'])) {
        if ($titleLink) {
            $html .= '<a href="' . htmlspecialchars($titleLink) . '" class="new-menu__header">' . htmlspecialchars($title) . '</a>';
        } else {
            $html .= '<p class="new-menu__header">' . htmlspecialchars($title) . '</p>';
        }
    } else {
        // Check if we need special visibility style (for accessories)
        if ($options['headerHidden'] === 'visibility') {
            if ($titleLink) {
                $html .= '<a href="' . htmlspecialchars($titleLink) . '" style="visibility:none;opacity:0" class="remove-mobile new-menu__header">' . htmlspecialchars($title) . '</a>';
            } else {
                $html .= '<p style="visibility:none;opacity:0" class="remove-mobile new-menu__header">' . htmlspecialchars($title) . '</p>';
            }
        } else {
            if ($titleLink) {
                $html .= '<a href="' . htmlspecialchars($titleLink) . '" style="opacity:0;visibility:hidden" class="new-menu__header remove-mobile">' . htmlspecialchars($title) . '</a>';
            } else {
                $html .= '<p style="opacity:0;visibility:hidden" class="new-menu__header remove-mobile">' . htmlspecialchars($title) . '</p>';
            }
        }
    }

    return $html;
}


function renderColorTextColumn($column)
{
    $html = '';

    // Handle hidden header (for headwear category column and accessories)
    $html .= '<ul>';

    foreach ($column['items'] as $item) {

        if ($item['titleLink'] ?? null) {
            $html .= '<li class="mt-2 mb-1">';
            $html .= renderColumnTitle([
                'title' => $item['title'],
                'titleLink' => $item['titleLink'] ?? null
            ], []);
            $html .= '</li>';
        } else {
            $html .= renderColorTextItem($item, $item['title'] ?? '', $item['to'] ?? '');
        }
    }

    $html .= '</ul>';
    return $html;
}





function renderColorTextItem($item, $title, $options)
{
    $title = $item['title'] ?? '';
    $url = $item['to'] ?? '#';
    $colors = $item['colors'] ?? null;
    $image = $item['image'] ?? null;
    $className = $item['className'] ?? '';


    $html = '<li>';
    $html .= '<a href="' . htmlspecialchars($url) . '" title="' . htmlspecialchars($title) . '" class="shop-by-color">';
    $html .= '<div class="shop-by-color__box" style="background-color: ' . htmlspecialchars($colors) . ';">';
    if ($image) {
        $html .= '<img height="100%" width="100%" style="width: 100%;height: 100%; object-fit: cover;" src="' . htmlspecialchars($image) . '" loading="lazy" />';
    }
    $html .= '</div>';
    $html .= '<p>' . htmlspecialchars($title) . '</p>';
    $html .= '</a>';
    $html .= '</li>';

    return $html;
}


/**
 * Renders an image + text column
 * 
 * @param array $column Column configuration
 * @return string HTML output
 */
function renderImageTextColumn($column)
{
    $title = $column['title'] ?? '';
    $items = $column['items'] ?? [];
    $options = $column['options'] ?? [];
    $type = $column['type'] ?? 'image-text';

    // Handle chunked layout (for bags)
    if ($type === 'image-text-chunked' && isset($options['chunks'])) {
        return renderImageTextChunkedColumn($column);
    }

    $listClass = 'items-with-image';
    if (isset($options['hideLastChild'])) {
        $listClass .= ' last-child-display-none';
    }
    if (isset($options['listClass'])) {
        $listClass .= ' ' . $options['listClass'];
    }
    if (isset($options['bigImages'])) {
        $listClass .= ' items-with-image--big';
    }

    $html = '';

    // Handle hidden header (for headwear category column and accessories)
    $html .= renderColumnTitle([
        'title' => $title,
        'titleLink' => $column['titleLink'] ?? null
    ], $options);

    $html .= '<ul class="' . $listClass . '">';

    foreach ($items as $item) {
        $html .= renderImageTextItem($item, $title, $options);
    }

    $html .= '</ul>';

    return $html;
}

/**
 * Renders a chunked image + text column (for bags menu)
 */
function renderImageTextChunkedColumn($column)
{
    $title = $column['title'] ?? '';
    $items = $column['items'] ?? [];
    $options = $column['options'] ?? [];
    $chunks = $options['chunks'] ?? 3;

    $html = '<div class="new-menu__col row" style="width:auto">';
    $html .= '<div class="col-12">';


    $html .= renderColumnTitle([
        'title' => $title,
        'titleLink' => $column['titleLink'] ?? null 
    ], $options);

    $html .= '</div>';

    $groups = array_chunk($items, ceil(count($items) / $chunks));

    foreach ($groups as $idx => $chunk) {
        $html .= '<div class="col-12 col-lg-4">';
        $html .= '<ul class="items-with-image items-with-image--big">';

        foreach ($chunk as $item) {
            $html .= renderImageTextItem($item, $title, $options);
        }

        $html .= '</ul>';
        $html .= '</div>';
    }

    $html .= '</div>';

    return $html;
}

/**
 * Renders a single image + text item
 * 
 * @param array $item Item data
 * @param string $sectionTitle For alt/title attributes
 * @return string HTML output
 */
function renderImageTextItem($item, $sectionTitle = '', $options = [])
{
    $title = $item['title'] ?? '';
    $url = $item['to'] ?? '#';
    $image = $item['image'] ?? null;
    $className = $item['className'] ?? '';
    $viewAll = isset($item['viewAll']) && $item['viewAll'];

    if ($viewAll) {
        $className .= ' shop-all';
    }
    $className = trim($className);

    $classAttr = $className ? ' class="' . htmlspecialchars($className) . '"' : '';
    $altText = $sectionTitle ? htmlspecialchars($sectionTitle . ' ' . $title) : htmlspecialchars($title);

    // Handle big images option
    $imageHeight = isset($options['imageHeight']) ? $options['imageHeight'] : 43;
    $imageWidth = isset($options['imageWidth']) ? $options['imageWidth'] : 35;

    $html = '<li>';
    $html .= '<a href="' . htmlspecialchars($url) . '"' . $classAttr . '>';

    if ($image && !$viewAll) {
        $html .= '<img height="' . $imageHeight . '" width="' . $imageWidth . '" alt="' . $altText . '" title="' . htmlspecialchars($title) . '" src="' . htmlspecialchars($image) . '" loading="lazy" />';
    }

    $pClass = $viewAll ? ' class="ml-0 mt-0"' : '';
    $html .= '<p' . $pClass . '>' . htmlspecialchars($title) . '</p>';
    $html .= '</a>';
    $html .= '</li>';

    return $html;
}

/**
 * Renders a text-only column
 * 
 * @param array $column Column configuration
 * @return string HTML output
 */
function renderTextOnlyColumn($column)
{
    $title = $column['title'] ?? '';
    $items = $column['items'] ?? [];
    $options = $column['options'] ?? [];
    $titleLink = $column['titleLink'] ?? null;

    $html = '<div>';
    if ($titleLink) {
        $html .= '<a href="' . htmlspecialchars($titleLink) . '" class="new-menu__header">' . htmlspecialchars($title) . '</a>';
    } else {
        $html .= '<p class="new-menu__header">' . htmlspecialchars($title) . '</p>';
    }
    $html .= '<ul class="items-with-text">';

    foreach ($items as $item) {
        $html .= renderTextOnlyItem($item);
    }

    // Add "Shop All" link if specified
    if (isset($options['shopAllLink'])) {
        $html .= '<li class="shop-all">';
        $html .= '<a href="' . htmlspecialchars($options['shopAllLink']['to']) . '">';
        $html .= '<b>' . htmlspecialchars($options['shopAllLink']['text']) . '</b>';
        $html .= '</a>';
        $html .= '</li>';
    }

    $html .= '</ul>';
    $html .= '</div>';

    return $html;
}

/**
 * Renders a single text-only item
 * 
 * @param array $item Item data
 * @return string HTML output
 */
function renderTextOnlyItem($item)
{
    $title = $item['title'] ?? '';
    $url = $item['to'] ?? '#';
    $className = $item['className'] ?? '';

    $classAttr = $className ? ' class="' . htmlspecialchars($className) . '"' : '';

    $html = '<li' . $classAttr . '>';
    $html .= '<a href="' . htmlspecialchars($url) . '">';
    $html .= '<p>' . htmlspecialchars($title) . '</p>';
    $html .= '</a>';
    $html .= '</li>';

    return $html;
}

/**
 * Renders a color split column (two sub-columns)
 * 
 * @param array $column Column configuration
 * @return string HTML output
 */
function renderColorSplitColumn($column)
{
    $title = $column['title'] ?? '';
    $items = $column['items'] ?? [];
    $options = $column['options'] ?? [];
    $titleLink = $column['titleLink'] ?? null;

    $html = '<div class="row color-cols">';
    if ($titleLink) {
        $html .= '<a href="' . htmlspecialchars($titleLink) . '" class="new-menu__header">' . htmlspecialchars($title) . '</a>';
    } else {
        $html .= '<p class="new-menu__header">' . htmlspecialchars($title) . '</p>';
    }

    // Always auto-split items into two columns
    $groups = array_chunk($items, ceil(count($items) / 2));

    foreach ($groups as $idx => $chunk) {
        $html .= '<div class="col-md-6" style="padding-left:0;">';
        $html .= '<ul class="items-with-text">';
        foreach ($chunk as $item) {
            $html .= renderColorItem($item);
        }
        $html .= '</ul>';
        $html .= '</div>';
    }

    // Add "Shop All Colors" link if specified
    if (isset($options['shopAllLink'])) {
        $html .= '<div class="col-md-12">';
        $html .= '<div class="shop-all">';
        $html .= '<a href="' . htmlspecialchars($options['shopAllLink']['to']) . '">';
        $html .= '<b>' . htmlspecialchars($options['shopAllLink']['text']) . '</b>';
        $html .= '</a>';
        $html .= '</div>';
        $html .= '</div>';
    }

    $html .= '</div>'; // .row.color-cols

    return $html;
}

/**
 * Renders a single color item (text + image on right)
 * 
 * @param array $item Item data
 * @return string HTML output
 */
function renderColorItem($item)
{
    $title = $item['title'] ?? '';
    $url = $item['to'] ?? '#';
    $image = $item['image'] ?? null;

    $html = '<li style="margin-bottom:5px">';
    $html .= '<a href="' . htmlspecialchars($url) . '" style="display:flex;align-items:center">';
    $html .= '<p>' . htmlspecialchars($title) . '</p>';

    if ($image) {
        $html .= '<img height="25px" width="35px" alt="Shop by Color ' . htmlspecialchars($title) . '" title="' . htmlspecialchars($title) . '" src="' . htmlspecialchars($image) . '" loading="lazy" />';
    }

    $html .= '</a>';
    $html .= '</li>';

    return $html;
}

/**
 * Renders a brand grid column (image-only)
 * 
 * @param array $column Column configuration
 * @return string HTML output
 */
function renderBrandGridColumn($column)
{
    $title = $column['title'] ?? '';
    $items = $column['items'] ?? [];
    $options = $column['options'] ?? [];
    $titleLink = $column['titleLink'] ?? null;

    $html = '<div>';
    if ($titleLink) {
        $html .= '<a href="' . htmlspecialchars($titleLink) . '" class="new-menu__header">' . htmlspecialchars($title) . '</a>';
    } else {
        $html .= '<p class="new-menu__header">' . htmlspecialchars($title) . '</p>';
    }
    $html .= '<ul class="items-only-image">';

    foreach ($items as $item) {
        $html .= renderBrandItem($item);
    }

    // Add "Shop All Brands" link if specified
    if (isset($options['shopAllLink'])) {
        $html .= '<li class="shop-all">';
        $html .= '<a href="' . htmlspecialchars($options['shopAllLink']['to']) . '">';
        $html .= '<b>' . htmlspecialchars($options['shopAllLink']['text']) . '</b>';
        $html .= '</a>';
        $html .= '</li>';
    }

    $html .= '</ul>';
    $html .= '</div>';

    return $html;
}

/**
 * Renders a single brand item (image-only)
 * 
 * @param array $item Item data
 * @return string HTML output
 */
function renderBrandItem($item)
{
    $title = $item['title'] ?? '';
    $url = $item['to'] ?? '#';
    $image = $item['image'] ?? null;

    if (!$image) {
        return '';
    }

    $html = '<li>';
    $html .= '<a href="' . htmlspecialchars($url) . '" title="' . htmlspecialchars($title) . '">';
    $html .= '<img src="' . htmlspecialchars($image) . '" alt="Shop by Brands ' . htmlspecialchars($title) . '" title="' . htmlspecialchars($title) . '" loading="lazy" />';
    $html .= '</a>';
    $html .= '</li>';

    return $html;
}

// ============================================================================
// USAGE EXAMPLES
// ============================================================================

/*
 * TO USE THIS SYSTEM:
 * 
 * 1. Include this file:
 *    require_once 'mega-menu-system.php';
 * 
 * 2. Render a menu:
 *    echo renderMegaMenu('tshirts');
 *    echo renderMegaMenu('outerwear');
 *    echo renderMegaMenu('headwear');
 * 
 * 3. TO ADD A NEW MENU:
 *    - Add a new entry to $megaMenusConfig array
 *    - Define columns with appropriate types
 *    - Call renderMegaMenu('your-menu-key')
 * 
 * 4. TO ADD A NEW COLUMN TYPE:
 *    - Add case to renderColumn() switch statement
 *    - Create render function (e.g., renderCustomColumn())
 *    - Update config schema documentation
 * 
 * COLUMN TYPES AVAILABLE:
 * - 'image-text': Image + text list (Shop by Style, Shop by Fit)
 * - 'text-only': Text-only list (Shop by Fabric)
 * - 'color-split': Two-column color list with images on right
 * - 'brand-grid': Image-only grid (brand logos)
 * 
 * OPTIONS AVAILABLE PER COLUMN:
 * - 'width': CSS width (e.g., '25%')
 * - 'hideLastChild': Add 'last-child-display-none' class
 * - 'listClass': Additional CSS class for list
 * - 'headerHidden': Hide header on mobile
 * - 'shopAllLink': Add "Shop All" link at bottom
 * - 'twoColumns': For color columns, use two-column layout
 * - 'alignCenter': Center-align content (for brand grids)
 */
