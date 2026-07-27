<?php
// Consolidated order status email — multiple shipments in one message
require_once __DIR__ . '/components/header.php';
require_once __DIR__ . '/components/footer.php';
require_once __DIR__ . '/components/order-number.php';
require_once __DIR__ . '/components/suggested-items.php';
require_once __DIR__ . '/components/thank-you.php';
require_once __DIR__ . '/components/document-start.php';
require_once __DIR__ . '/components/shipping-address.php';
require_once __DIR__ . '/components/tracking-shipment.php';
require_once __DIR__ . '/config.php';

$defaultData = [
  'email' => [
    'preview_text' => '',
    'intro' => 'Great news! Parts of your order are out for delivery and will be arriving soon. Keep an eye out for your deliveries below.',
  ],
  'customer' => [
    'name' => 'John',
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
      'tracking_number' => '#20200323000533',
      'tracking_url' => 'https://www.ups.com/track?tracknum=20200323000533',
      'current_status' => 'out_for_delivery',
      'status_label' => 'On The Way',
      'estimated_delivery' => 'January 20th, 2026',
      'order_date_short' => '01/10/23',
      'shipped_date' => '01/16/23',
      'out_for_delivery_date' => '01/20/23',
      'delivery_date_short' => '01/20/23',
    ],
    [
      'tracking_number' => '#202003230111111',
      'tracking_url' => 'https://www.ups.com/track?tracknum=202003230111111',
      'current_status' => 'delivered',
      'status_label' => 'Delivered',
      'estimated_delivery' => 'January 21st, 2026',
      'order_date_short' => '01/10/23',
      'shipped_date' => '01/16/23',
      'out_for_delivery_date' => '01/18/23',
      'delivery_date_short' => '01/19/23',
    ],
    [
      'is_trackable' => false,
      'carrier' => 'UPS',
      'tracking_number' => '1Z80E16V033142087',
      'tracking_url' => 'https://www.ups.com/track?tracknum=1Z80E16V033142087',
      'current_status' => 'shipped',
      'status_label' => 'In Transit',
      'estimated_delivery' => 'January 22nd, 2026',
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
      'name' => 'Gildan 5400 Heavy Cotton Long Sleeve T-Shirt',
      'colors_available' => 23,
      'price' => 4.41,
      'image' => 'https://www.bulkapparel.com/image/bulk-blank-shirts/395_fm.jpg',
      'logo' => 'https://www.bulkapparel.com/image/brand/small/35_fm.jpg?v=8302028',
    ],
    [
      'name' => 'Bella + Canvas 3001 Unisex Jersey T-Shirt',
      'colors_available' => 36,
      'price' => 3.64,
      'image' => 'https://www.bulkapparel.com/image/bulk-blank-shirts/391a_fm.jpg',
      'logo' => 'https://www.bulkapparel.com/image/brand/small/35_fm.jpg?v=8302028',
    ],
  ],
];

$emailData = isset($emailData) ? $emailData : $defaultData;

// Back-compat: build shipments from single-tracking order data
if (empty($emailData['shipments']) && !empty($emailData['order']['tracking_number'])) {
  $order = $emailData['order'];
  $status = $emailData['status'] ?? [];
  $currentStatus = 'shipped';
  if (!empty($status['delivered'])) {
    $currentStatus = 'delivered';
  } elseif (!empty($status['out_for_delivery'])) {
    $currentStatus = 'out_for_delivery';
  } elseif (!empty($status['shipped'])) {
    $currentStatus = 'shipped';
  } elseif (!empty($status['ordered'])) {
    $currentStatus = 'ordered';
  }

  $emailData['shipments'] = [[
    'tracking_number' => $order['tracking_number'],
    'tracking_url' => $order['tracking_url'] ?? '#',
    'current_status' => $currentStatus,
    'estimated_delivery' => $order['estimated_delivery'] ?? '',
    'order_date_short' => $order['order_date_short'] ?? '',
    'shipped_date' => $order['shipped_date'] ?? '',
    'out_for_delivery_date' => $order['out_for_delivery_date'] ?? '',
    'delivery_date_short' => $order['delivery_date_short'] ?? '',
  ]];
}

$companyName = getConfig('company.name');
$customerServiceUrl = getConfig('company.customer_service_url');

$orderNumber = $emailData['order']['number'] ?? '';
$previewText = !empty($emailData['email']['preview_text'])
  ? $emailData['email']['preview_text']
  : 'Your order #' . $orderNumber . ' has shipping updates. View tracking details for all shipments in one place.';

$introMessage = $emailData['email']['intro']
  ?? 'Great news! Parts of your order are out for delivery and will be arriving soon. Keep an eye out for your deliveries below.';

$emailContent = renderDocumentStart('Your Order Status', $previewText);
$emailContent .= renderHeader('Your Order Status');
$emailContent .= renderOrderNumber($emailData);

$emailContent .= '
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td class="content" style="padding: 0 20px 20px 20px;">
        <p class="greeting" style="font-size: 16px; margin-bottom: 10px; font-weight: bold; font-family: \'Open Sans\', Arial, sans-serif;">Hey ' . htmlspecialchars($emailData['customer']['name']) . ',</p>
        <p style="font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; color: #333333; line-height: 1.5; margin: 0;">' . htmlspecialchars($introMessage) . '</p>
      </td>
    </tr>
  </table>';

$emailContent .= renderShippingAddress($emailData['customer']);
$emailContent .= renderTrackingShipments($emailData['shipments'] ?? []);

$emailContent .= '
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td style="padding: 0 20px 20px 20px;">
        <p style="font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; color: #333333; line-height: 1.5; margin: 0 0 10px 0;">If you have any questions or concerns please reply to this email or visit our <a href="' . htmlspecialchars($customerServiceUrl) . '" style="color: #002868; text-decoration: underline;">customer service center</a> at ' . htmlspecialchars($companyName) . '</p>
        <p style="font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; color: #333333; margin: 0;">Thank you for your business.</p>
      </td>
    </tr>
  </table>';

$suggestedItems = $emailData['suggested_items'] ?? [];
$emailContent .= renderSuggestedItems(
  $suggestedItems,
  'Suggested Items',
  'While you wait, check out some customer favourites:',
  'Browse Similar Items'
);

$emailContent .= renderThankYou();
$emailContent .= renderFooter();
$emailContent .= renderDocumentEnd();

echo $emailContent;
