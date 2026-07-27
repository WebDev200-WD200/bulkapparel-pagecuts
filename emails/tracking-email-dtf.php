<?php
/**
 * DTF Shipment Email
 * Figma: DTF — Tracking Information — Compact (node 8290:17218)
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

$dtfSeedProducts = [
    [
        'name' => 'DTF Transfers by Size',
        'image' => 'https://www.bulkapparel.com/image/bulk-blank-shirts/16_fm.jpg',
        'file_name' => 'bulkapparel-logo.png',
        'transfer_size' => '3.34" x 4.17"',
        'variant' => 'Standard',
        'quantity' => 1,
        'sku' => 'DTF-STD-001',
        'product_url' => 'https://www.bulkapparel.com/dtf-transfers-size/dtf-standard',
    ],
    [
        'name' => 'DTF Transfers by Size',
        'image' => 'https://www.bulkapparel.com/image/bulk-blank-shirts/395_fm.jpg',
        'file_name' => 'team-crest.png',
        'transfer_size' => '5.00" x 6.25"',
        'variant' => 'Standard',
        'quantity' => 2,
        'sku' => 'DTF-STD-002',
        'product_url' => 'https://www.bulkapparel.com/dtf-transfers-size/dtf-standard',
    ],
    [
        'name' => 'DTF Transfers by Size',
        'image' => 'https://www.bulkapparel.com/image/bulk-blank-shirts/391a_fm.jpg',
        'file_name' => 'event-badge.png',
        'transfer_size' => '8.00" x 10.00"',
        'variant' => 'Gang Sheet',
        'quantity' => 1,
        'sku' => 'DTF-GS-003',
        'product_url' => 'https://www.bulkapparel.com/dtf-transfers-size/dtf-standard',
    ],
    [
        'name' => 'DTF Transfers by Size',
        'image' => 'https://www.bulkapparel.com/image/bulk-blank-shirts/16_fm.jpg',
        'file_name' => 'custom-print.png',
        'transfer_size' => '2.50" x 2.50"',
        'variant' => 'Standard',
        'quantity' => 5,
        'sku' => 'DTF-STD-004',
        'product_url' => 'https://www.bulkapparel.com/dtf-transfers-size/dtf-standard',
    ],
];

$transferSizes = [
    '3.34" x 4.17"',
    '4.00" x 5.00"',
    '5.00" x 6.25"',
    '8.00" x 10.00"',
    '10.00" x 12.00"',
];
$variants = ['Standard', 'Standard', 'Gang Sheet', 'Standard'];
$fileNames = [
    'bulkapparel-logo.png',
    'team-crest.png',
    'event-badge.png',
    'custom-print.png',
    'season-graphic.png',
];

// Build 33 DTF items so expanded can show 10 + 23 remaining
$dtfItems = [];
for ($i = 0; $i < 33; $i++) {
    $seed = $dtfSeedProducts[$i % count($dtfSeedProducts)];
    $dtfItems[] = array_merge($seed, [
        'transfer_size' => $transferSizes[$i % count($transferSizes)],
        'variant' => $variants[$i % count($variants)],
        'file_name' => $fileNames[$i % count($fileNames)],
        'quantity' => ($i % 4) + 1,
        'sku' => 'DTF-' . str_pad((string) ($i + 1), 3, '0', STR_PAD_LEFT),
    ]);
}

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
            'type_label' => 'DTF',
            'items' => $dtfItems,
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
    : 'Here is your DTF shipment tracking information for order #' . $orderNumber . '.';

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
    'type' => 'dtf',
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
