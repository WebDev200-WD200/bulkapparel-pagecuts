<?php
// Include components and config
require_once __DIR__ . '/components/header.php';
require_once __DIR__ . '/components/footer.php';
require_once __DIR__ . '/components/progress-bar.php';
require_once __DIR__ . '/components/order-number.php';
require_once __DIR__ . '/components/suggested-items.php';
require_once __DIR__ . '/components/thank-you.php';
require_once __DIR__ . '/components/document-start.php';
require_once __DIR__ . '/config.php';

// Define default data for this template
$defaultData = [
  'customer' => [
    'name' => 'KIMBERELY',
    'full_name' => 'KIMBERELY LLOYD',
    'email' => 'customer@example.com',
    'address' => '6041 Stonechase Blvd',
    'city' => 'Pace',
    'state' => 'FL',
    'zip' => '32571',
    'phone' => '(540) 760-6687'
  ],
  'order' => [
    'number' => 'B736752781737',
    'date' => 'Sunday, January 12',
    'order_date_short' => '01/16/25',
    'shipping_method' => 'Sunday, January 12',
    'order_date_short' => '01/16/25',
    'shipping_method' => 'USPS',
    'shipping_time' => '3-7 Business Days',
    'total_items' => 1,
    'payment_method' => 'Visa XXXX1111',
    'tracking_number' => '1Z80E16V033142087',
    'estimated_delivery' => 'January 20th, 2025',
    'delivery_date_short' => '01/20/25',
    'delivery_date' => 'Friday, January 17',
    'shipped_date' => '01/16/25',
    'out_for_delivery_date' => '01/20/25'
  ],
  'items' => [
    [
      'name' => '5000 Heavy Cotton T-Shirt',
      'quantity' => 1,
      'color' => 'White',
      'size' => 'S',
      'price' => 2.41,
      'image' => 'https://www.bulkapparel.com/image/bulk-blank-shirts/16_fm.jpg'
    ]
  ],
  'totals' => [
    'product_total' => 2.41,
    'shipping_fee' => 6.85,
    'tax' => 0.17,
    'total' => 9.43
  ],
  'suggested_items' => [
    [
      'name' => 'G5000 Gildan 5000 T-Shirt Youth Heavy Cotton',
      'colors_available' => 50,
      'price' => 2.44,
      'image' => 'https://www.bulkapparel.com/image/bulk-blank-shirts/16_fm.jpg',
      'logo' => 'https://www.bulkapparel.com/image/brand/small/35_fm.jpg?v=8302028'
    ],
    [
      'name' => 'Gildan 5400 Heavy Cotton Long Sleeve T-Shirt',
      'colors_available' => 23,
      'price' => 4.41,
      'image' => 'https://www.bulkapparel.com/image/bulk-blank-shirts/395_fm.jpg',
      'logo' => 'https://www.bulkapparel.com/image/brand/small/35_fm.jpg?v=8302028'
    ],
    [
      'name' => 'Gildan 5000L Heavy Cotton Women\'s Short Sleeve',
      'colors_available' => 36,
      'price' => 3.64,
      'image' => 'https://www.bulkapparel.com/image/bulk-blank-shirts/391a_fm.jpg',
      'logo' => 'https://www.bulkapparel.com/image/brand/small/35_fm.jpg?v=8302028'
    ]
  ],
  'status' => [
    'ordered' => true,
    'shipped' => false,
    'out_for_delivery' => false,
    'delivered' => false
  ]
];

// Use passed data or default data
$emailData = isset($emailData) ? $emailData : $defaultData;

// Set the current status
$currentStatus = 'ordered';

// Generate the email content
$emailContent = renderDocumentStart('Your Order is Confirmed!');

// Add header
$emailContent .= renderHeader('Your Order is Confirmed!');

// Add progress bar
$emailContent .= renderProgressBar($emailData, $currentStatus);

// Add order number
$emailContent .= renderOrderNumber($emailData);

// Get company info from config
$companyName = getConfig('company.name');
$companyWebsite = getConfig('company.website');
$customerServiceUrl = getConfig('company.customer_service_url');
$baseUrl = getConfig('base_url');

// Add greeting and order summary
$emailContent .= '
  <!-- Greeting -->
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td class="content" style="padding: 0 20px;">
        <p class="greeting" style="font-size: 16px; margin-bottom: 10px; font-weight: bold;">Hey ' . $emailData['customer']['name'] . ',</p>
        <p>Thank you for shopping with <a href="' . $companyWebsite . '" style="color: #002868; text-decoration: underline;">' . $companyName . '</a>! Here is your order summary.</p>
      </td>
    </tr>
  </table>';

// Add order details
$emailContent .= '
  <!-- Order Details -->
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td style="padding: 0 20px;">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="50%" valign="top">
              <div class="section-title" style="font-weight: bold; color: #002868; margin-bottom: 10px; border-bottom: 1px solid #eee; padding-bottom: 5px;">Shipping Address</div>
              <p style="margin: 0;">
                <a href="mailto:' . $emailData['customer']['email'] . '" style="color: #002868; text-decoration: underline;">' . $emailData['customer']['email'] . '</a><br />
                <strong>' . $emailData['customer']['full_name'] . '</strong><br />
                ' . $emailData['customer']['address'] . '<br />
                ' . $emailData['customer']['city'] . ', ' . $emailData['customer']['state'] . ', ' . $emailData['customer']['zip'] . '<br />
                ' . $emailData['customer']['phone'] . '
              </p>
            </td>
            <td width="50%" valign="top">
              <div class="section-title" style="font-weight: bold; color: #002868; margin-bottom: 10px; border-bottom: 1px solid #eee; padding-bottom: 5px;">Order Date</div>
              <p style="margin: 0;">' . $emailData['order']['date'] . '</p>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>';

// Add shipping & payment
$emailContent .= '
  <!-- Shipping & Payment -->
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td style="padding: 0 20px;">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="50%" valign="top">
              <div class="section-title" style="font-weight: bold; color: #002868; margin-bottom: 10px; margin-top: 20px; border-bottom: 1px solid #eee; padding-bottom: 5px;">Shipping</div>
              <p style="margin: 0;">
                ' . $emailData['order']['shipping_method'] . '<br />
                <small style="color: #006400;">' . $emailData['order']['shipping_time'] . '<br />
                Total Items: ' . $emailData['order']['total_items'] . '</small>
              </p>
            </td>
            <td width="50%" valign="top">
              <div class="section-title" style="font-weight: bold; color: #002868; margin-bottom: 10px; margin-top: 20px; border-bottom: 1px solid #eee; padding-bottom: 5px;">Payment</div>
              <p style="margin: 0;">' . $emailData['order']['payment_method'] . '</p>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>';

// Add items ordered
$emailContent .= '
  <!-- Items Ordered -->
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td style="padding: 0 20px;">
        <div class="section-title" style=" margin-bottom: 10px; border-bottom: 1px solid #eee; padding-bottom: 5px; margin-top: 40px;"><span style="font-weight: bold; color: #002868;">Items Ordered</span>
        
        <span style="float:right;">' . count($emailData['items']) . ' items</span>
        </div>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">';

foreach ($emailData['items'] as $item) {
  $emailContent .= '
          <tr>
            <td style="padding-bottom: 10px; border-bottom: 1px solid #eee;">
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="80" valign="top">
                    <img src="' . $item['image'] . '" alt="' . htmlspecialchars($item['name']) . '" style="width: 80px; height: auto; border: 1px solid #eee;" />
                  </td>
                  <td valign="top" style="padding-left: 10px;">
                    <div style="font-weight: bold;">' . $item['name'] . '</div>
                    <div>Quantity: <b>' . $item['quantity'] . '</b></div>
                    <div>Color: <b>' . $item['color'] . '</b></div>
                    <div>Size: <b>' . $item['size'] . '</b></div>
                  </td>
                  <td width="80" valign="top" align="right">
                    <div style="font-weight: bold;">$' . number_format($item['price'], 2) . '</div>
                  </td>
                </tr>
              </table>
            </td>
          </tr>';
}

$emailContent .= '
        </table>
      </td>
    </tr>
  </table>';

$emailContent .= '  <table width="100%" border="0" cellspacing="0" cellpadding="0"> 
  <tr>';

$emailContent .= '
            <td></td>
            <td style="padding: 10px 20px;" width="250px">
              <table border="0" cellspacing="0" cellpadding="0" width="100%">
                <tr>
                  <td align="left" style="padding: 5px 0;">Product Total</td>
                  <td align="right" style="padding: 5px 0 5px 20px;">$' . number_format($emailData['totals']['product_total'], 2) . '</td>
                </tr>
                <tr>
                  <td align="left" style="padding: 5px 0;">Shipping Fee</td>
                  <td align="right" style="padding: 5px 0 5px 20px;">$' . number_format($emailData['totals']['shipping_fee'], 2) . '</td>
                </tr>
                <tr>
                  <td align="left" style="padding: 5px 0;">Tax</td>
                  <td align="right" style="padding: 5px 0 5px 20px;">$' . number_format($emailData['totals']['tax'], 2) . '</td>
                </tr>
                <tr class="total-row" style="font-weight: bold;">
                  <td align="left" style="padding: 10px 0; border-top: 1px solid #eee;">Total</td>
                  <td align="right" style="padding: 10px 0 10px 20px; border-top: 1px solid #eee; color: #002868;">$' . number_format($emailData['totals']['total'], 2) . '</td>
                </tr>
              </table>
            </td>
          ';
$emailContent .= '</tr>  </table>';

// Add suggested items
$emailContent .= renderSuggestedItems($emailData['suggested_items'], "Suggested Items", "Love what you ordered? You might also like these:");

// Add thank you
$emailContent .= renderThankYou();

// Add footer
$emailContent .= renderFooter();

// Close the document
$emailContent .= renderDocumentEnd();

// Output the email content
echo $emailContent;
