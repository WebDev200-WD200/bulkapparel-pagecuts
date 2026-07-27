<?php
/**
 * Regular Items Shipment Email
 * Figma: Tracking Information — Compact (node 8215:9010)
 */
require_once __DIR__ . '/components/header.php';
require_once __DIR__ . '/components/footer.php';
require_once __DIR__ . '/components/order-number.php';
require_once __DIR__ . '/components/suggested-items.php';
require_once __DIR__ . '/components/thank-you.php';
require_once __DIR__ . '/components/document-start.php';
require_once __DIR__ . '/components/shipping-address.php';
require_once __DIR__ . '/components/shipments.php';
require_once __DIR__ . '/config.php';

// ---------------------------------------------------------------------------
// Shipment display configuration (render-time; no client-side toggle)
// Set 'expanded' => true to preview the expanded state (10 items + +N).
// ---------------------------------------------------------------------------
$shipmentConfig = [
    'initial_visible_items' => 4,
    'expanded_visible_items' => 10,
    'thumbnail_preview_items' => 10,
    'expanded' => false,
];

// Dummy View More destination — replace with hosted order/shipment details URL
$viewMoreUrl = 'https://www.bulkapparel.com/tracking'; // Dummy / placeholder URL

// Seed products used to generate a large dummy shipment list
$regularSeedProducts = [
    [
        'name' => '5000 Heavy Cotton T-Shirt',
        'image' => 'https://www.bulkapparel.com/image/bulk-blank-shirts/16_fm.jpg',
        'color' => 'White',
        'color_hex' => '#FFFFFF',
        'size' => 'XL',
        'quantity' => 1,
        'sku' => 'G500-WHT-XL',
        'product_url' => 'https://www.bulkapparel.com/',
    ],
    [
        'name' => '5000 Heavy Cotton T-Shirt',
        'image' => 'https://www.bulkapparel.com/image/bulk-blank-shirts/16_fm.jpg',
        'color' => 'Black',
        'color_hex' => '#000000',
        'size' => 'L',
        'quantity' => 2,
        'sku' => 'G500-BLK-L',
        'product_url' => 'https://www.bulkapparel.com/',
    ],
    [
        'name' => '5000 Heavy Cotton T-Shirt',
        'image' => 'https://www.bulkapparel.com/image/bulk-blank-shirts/395_fm.jpg',
        'color' => 'Ash',
        'color_hex' => '#B2BEB5',
        'size' => 'M',
        'quantity' => 1,
        'sku' => 'G500-ASH-M',
        'product_url' => 'https://www.bulkapparel.com/',
    ],
    [
        'name' => '5000 Heavy Cotton T-Shirt',
        'image' => 'https://www.bulkapparel.com/image/bulk-blank-shirts/391a_fm.jpg',
        'color' => 'Athletic Cardinal',
        'color_hex' => '#8B0000',
        'size' => 'S',
        'quantity' => 3,
        'sku' => 'G500-CRD-S',
        'product_url' => 'https://www.bulkapparel.com/',
    ],
    [
        'name' => 'Bella + Canvas 3001 Jersey T-Shirt',
        'image' => 'https://www.bulkapparel.com/image/bulk-blank-shirts/391a_fm.jpg',
        'color' => 'Navy',
        'color_hex' => '#001F3F',
        'size' => 'L',
        'quantity' => 1,
        'sku' => 'BC3001-NVY-L',
        'product_url' => 'https://www.bulkapparel.com/',
    ],
];

$sizes = ['S', 'M', 'L', 'XL', '2XL'];
$colors = [
    ['name' => 'White', 'hex' => '#FFFFFF'],
    ['name' => 'Black', 'hex' => '#000000'],
    ['name' => 'Ash', 'hex' => '#B2BEB5'],
    ['name' => 'Navy', 'hex' => '#001F3F'],
    ['name' => 'Red', 'hex' => '#C41E3A'],
    ['name' => 'Royal', 'hex' => '#4169E1'],
];

// Build 33 items for shipment #1 so expanded can show 10 + 23 remaining
$shipmentOneItems = [];
for ($i = 0; $i < 33; $i++) {
    $seed = $regularSeedProducts[$i % count($regularSeedProducts)];
    $color = $colors[$i % count($colors)];
    $size = $sizes[$i % count($sizes)];
    $shipmentOneItems[] = array_merge($seed, [
        'color' => $color['name'],
        'color_hex' => $color['hex'],
        'size' => $size,
        'quantity' => ($i % 3) + 1,
        'sku' => $seed['sku'] . '-' . ($i + 1),
    ]);
}

$shipmentTwoItems = [
    array_merge($regularSeedProducts[0], ['size' => 'XL', 'color' => 'White', 'quantity' => 1]),
    array_merge($regularSeedProducts[1], ['size' => 'L', 'color' => 'Black', 'quantity' => 1]),
    array_merge($regularSeedProducts[2], ['size' => 'M', 'color' => 'Ash', 'quantity' => 2]),
];

$defaultData = [
    'email' => [
        'preview_text' => '',
        'intro_lines' => [
            'Here is your order tracking information',
            'Your order may be delivered in multiple shipments on separate days.',
        ],
    ],
    'customer' => [
        'name' => 'Kimberely',
        'full_name' => 'KIMBERELY LLOYD',
        'email' => 'customer@example.com',
        'address' => '6041 Stonechase Blvd',
        'city' => 'Pace',
        'state' => 'FL',
        'zip' => '32571',
        'phone' => '(540) 760-6687',
    ],
    'order' => [
        'number' => 'B1234556667',
    ],
    'shipments' => [
        [
            'number' => 1,
            'tracking_number' => '#20200323000533',
            'tracking_url' => 'https://www.ups.com/track?tracknum=20200323000533',
            'items' => $shipmentOneItems,
        ],
        [
            'number' => 2,
            'tracking_number' => '20200323000533',
            'tracking_url' => 'https://www.ups.com/track?tracknum=20200323000533',
            'items' => $shipmentTwoItems,
        ],
    ],
    'suggested_items' => [
        [
            'name' => 'G500 Gildan T-Shirt Heavy Cotton',
            'colors_available' => 50,
            'price' => 2.44,
            'image' => 'https://www.bulkapparel.com/image/bulk-blank-shirts/16_fm.jpg',
            'logo' => 'https://www.bulkapparel.com/image/brand/small/35_fm.jpg?v=8302028',
        ],
        [
            'name' => 'Bella + Canvas 3001 Unisex Jersey T-Shirt',
            'colors_available' => 36,
            'price' => 3.64,
            'image' => 'https://www.bulkapparel.com/image/bulk-blank-shirts/391a_fm.jpg',
            'logo' => 'https://www.bulkapparel.com/image/brand/small/35_fm.jpg?v=8302028',
        ],
        [
            'name' => 'Gildan 5400 Heavy Cotton Long Sleeve T-Shirt',
            'colors_available' => 23,
            'price' => 4.41,
            'image' => 'https://www.bulkapparel.com/image/bulk-blank-shirts/395_fm.jpg',
            'logo' => 'https://www.bulkapparel.com/image/brand/small/35_fm.jpg?v=8302028',
        ],
    ],
];

$emailData = isset($emailData) ? $emailData : $defaultData;

$companyName = getConfig('company.name');
$customerServiceUrl = getConfig('company.customer_service_url');
$orderNumber = $emailData['order']['number'] ?? '';

$previewText = !empty($emailData['email']['preview_text'])
    ? $emailData['email']['preview_text']
    : 'Here is your order tracking information for order #' . $orderNumber . '. Your order may arrive in multiple shipments.';

$introLines = $emailData['email']['intro_lines'] ?? [
    'Here is your order tracking information',
    'Your order may be delivered in multiple shipments on separate days.',
];

$emailContent = renderDocumentStart('Tracking Information', $previewText);
$emailContent .= renderHeader('Tracking Information');
$emailContent .= renderOrderNumber($emailData, 'left');

$emailContent .= '
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td class="content" style="padding: 0 20px 20px 20px;">
        <p class="greeting" style="font-size: 16px; margin: 0 0 10px 0; font-weight: bold; font-family: \'Open Sans\', Arial, sans-serif;">Hey ' . htmlspecialchars($emailData['customer']['name']) . ',</p>
        <p style="font-family: \'Open Sans\', Arial, sans-serif; font-size: 16px; color: #000000; line-height: 1.5; margin: 0 0 4px 0;">' . htmlspecialchars($introLines[0]) . '</p>
        <p style="font-family: \'Open Sans\', Arial, sans-serif; font-size: 16px; color: #000000; line-height: 1.5; margin: 0;">' . htmlspecialchars($introLines[1] ?? '') . '</p>
      </td>
    </tr>
  </table>';

$emailContent .= renderShippingAddress($emailData['customer']);

$emailContent .= renderShipments([
    'type' => 'regular',
    'shipments' => $emailData['shipments'] ?? [],
    'config' => $shipmentConfig,
    'view_more_url' => $viewMoreUrl,
]);

$emailContent .= '
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td style="padding: 0 20px 20px 20px;">
        <p style="font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; color: #333333; line-height: 1.5; margin: 0;">If you have any questions or concerns please reply to this email or visit our <a href="' . htmlspecialchars($customerServiceUrl) . '" style="color: #002868; text-decoration: underline;">customer service center</a> at ' . htmlspecialchars($companyName) . '</p>
      </td>
    </tr>
  </table>';

$emailContent .= renderSuggestedItems(
    $emailData['suggested_items'] ?? [],
    'Need Blank Apparel?',
    '',
    'Browse Customer Favorites'
);

$emailContent .= renderThankYou();
$emailContent .= renderFooter();
$emailContent .= renderDocumentEnd();

echo $emailContent;
