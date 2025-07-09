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
  'email' => [
    'preview_text' => '',
  ],
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
    'shipped' => true,
    'out_for_delivery' => false,
    'delivered' => false
  ]
];

// Use passed data or default data
$emailData = isset($emailData) ? $emailData : $defaultData;

// Set the current status
$currentStatus = 'shipped';

// Get company info from config
$companyName = getConfig('company.name');
$companyWebsite = getConfig('company.website');
$customerServiceUrl = getConfig('company.customer_service_url');
$baseUrl = getConfig('base_url');

// Create preview text
$previewText = empty($emailData['email']['preview_text']) ? 'Great news! Your order #' . $emailData['order']['number'] . ' has been shipped. Track your package with tracking number ' . $emailData['order']['tracking_number'] . '. Estimated delivery: ' . $emailData['order']['estimated_delivery'] . '.' : $emailData['email']['preview_text'];

// Generate the email content
$emailContent = renderDocumentStart('Your Order Has Been Shipped!', $previewText);

// Add header
$emailContent .= renderHeader('Your Order Has Been Shipped!');

// Add progress bar
$emailContent .= renderProgressBar($emailData, $currentStatus);

// Add order number
$emailContent .= renderOrderNumber($emailData);

// Add greeting and shipping info
$emailContent .= '
  <!-- Greeting -->
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td class="content" style="padding: 0 20px;">
        <p class="greeting" style="font-size: 16px; margin-bottom: 10px; font-weight: bold;">Hey ' . $emailData['customer']['name'] . ',</p>
        <p>Here is your order tracking information.</p>
        <p>Your order may be delivered in multiple shipments on separate days.</p>
      </td>
    </tr>
  </table>';

// Add shipping details
$emailContent .= '
  <!-- Shipping Details -->
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td style="padding: 0 20px;">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="50%" valign="top">
              <div class="section-title" style="font-weight: bold; color: #002868; margin-bottom: 10px; border-bottom: 1px solid #eee; padding-bottom: 5px;">Shipping Address</div>
              <p style="margin: 0;">
                <strong>' . $emailData['customer']['full_name'] . '</strong><br />
                ' . $emailData['customer']['address'] . '<br />
                ' . $emailData['customer']['city'] . ', ' . $emailData['customer']['state'] . ', ' . $emailData['customer']['zip'] . '<br />
                <a href="mailto:' . $emailData['customer']['email'] . '" style="color: #002868; text-decoration: underline;">' . $emailData['customer']['email'] . '</a>
              </p>
            </td>
            <td width="50%" valign="top">
              <div class="section-title" style="font-weight: bold; color: #002868; margin-bottom: 10px; border-bottom: 1px solid #eee; padding-bottom: 5px;">Estimated Delivery Date</div>
              <p style="margin: 0;">' . $emailData['order']['estimated_delivery'] . '</p>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>';

// Add tracking information
$emailContent .= '
  <!-- Tracking Information -->
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td style="padding: 20px;">
        <div class="tracking-box" style="background-color: #f5f5f5; padding: 10px; margin: 10px 0; border: 1px solid #e5e5e5;">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="50%" style="font-weight: bold;">Tracking Number</td>
              <td width="50%"><a href="#" style="color: #002868; text-decoration: underline;font-weight:bold;">' . $emailData['order']['tracking_number'] . '</a></td>
            </tr>
          </table>
        </div>
        <p>If you have any questions or concerns please reply to this email or visit our <a href="' . $customerServiceUrl . '" style="color: #002868; text-decoration: underline;">customer service center</a> at ' . $companyName . '</p>
        <p>Thank you for your business.</p>
      </td>
    </tr>
  </table>';

// Add suggested items
$emailContent .= renderSuggestedItems($emailData['suggested_items'], "Suggested Items", "While you wait, check out some customer favourites:", "Browse Similar Items");

// Add thank you
$emailContent .= renderThankYou();

// Add footer
$emailContent .= renderFooter();

// Close the document
$emailContent .= renderDocumentEnd();

// Output the email content
echo $emailContent;
