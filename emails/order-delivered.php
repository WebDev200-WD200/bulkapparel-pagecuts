<?php
// Include components and config
require_once __DIR__ . '/components/header.php';
require_once __DIR__ . '/components/footer.php';
require_once __DIR__ . '/components/progress-bar.php';
require_once __DIR__ . '/components/order-number.php';
require_once __DIR__ . '/components/review-box.php';
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
  'status' => [
    'ordered' => true,
    'shipped' => true,
    'out_for_delivery' => true,
    'delivered' => true
  ]
];

// Use passed data or default data
$emailData = isset($emailData) ? $emailData : $defaultData;

// Set the current status
$currentStatus = 'delivered';

// Get company info from config
$companyName = getConfig('company.name');
$companyWebsite = getConfig('company.website');
$customerServiceUrl = getConfig('company.customer_service_url');
$pointsPerReview = getConfig('rewards.points_per_review');

// Create preview text
$previewText = empty($emailData['email']['preview_text']) ? 'Your order #' . $emailData['order']['number'] . ' has been delivered! We hope you love your purchase. Leave a review and earn reward points!' : $emailData['email']['preview_text'];

// Generate the email content
$emailContent = renderDocumentStart('Your Order Was Delivered!', $previewText);

// Add header
$emailContent .= renderHeader('Your Order Was Delivered!');

// Add progress bar
$emailContent .= renderProgressBar($emailData, $currentStatus);

// Add order number
$emailContent .= renderOrderNumber($emailData);

// Add greeting and delivery info
$emailContent .= '
  <!-- Greeting -->
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td class="content" style="padding: 0 20px;">
        <p class="greeting" style="font-size: 16px; margin-bottom: 10px; font-weight: bold;">Hey ' . $emailData['customer']['name'] . ',</p>
        <p>Great news, your order was delivered! See below for more details.</p>
        <p>We hope you\'re loving your new purchase!</p>
      </td>
    </tr>
  </table>';

// Add delivery details
$emailContent .= '
  <!-- Delivery Details -->
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
              <div class="section-title" style="font-weight: bold; color: #002868; margin-bottom: 10px; border-bottom: 1px solid #eee; padding-bottom: 5px;">Date Delivered</div>
              <p style="margin: 0;">' . $emailData['order']['delivery_date'] . '</p>
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
      <td style="padding: 0 20px;">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="50%" valign="top">
              <div class="section-title" style="font-weight: bold; color: #002868; margin-bottom: 10px; margin-top: 20px; border-bottom: 1px solid #eee; padding-bottom: 5px;">Tracking Number</div>
              <p style="margin: 0;">
                <a href="#" style="color: #002868; text-decoration: underline;">' . $emailData['order']['tracking_number'] . '</a>
              </p>
            </td>
            <td width="50%" valign="top">
              <div class="section-title" style="font-weight: bold; color: #002868; margin-bottom: 10px; margin-top: 20px; border-bottom: 1px solid #eee; padding-bottom: 5px;">Order Date</div>
              <p style="margin: 0;">' . $emailData['order']['date'] . '</p>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>';

$emailContent .= '
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td style="padding: 20px;">
        <p>If you have any questions or concerns please reply to this email or visit our <a href="' . $customerServiceUrl . '" style="color: #002868; text-decoration: underline;">customer service center</a> at ' . $companyName . '</p>
      </td>
    </tr>
  </table>';

// Add review box with same design but slightly modified text for delivered context
$emailContent .= renderReviewBox(
  "Get " . $pointsPerReview . " Rewards Points!",
  "Leave A Review And Earn Points!",
  "Enjoying your recent purchase? Visit the item page and share your thoughts by leaving a review. Whether it’s good or bad, we value your honest feedback and won’t judge. Plus, you’ll earn " . $pointsPerReview . " points just for sharing! Redeem your points anytime for website credit.",
  "+" . $pointsPerReview . " POINTS PER REVIEW"
);

// Add thank you
$emailContent .= renderThankYou();

// Add footer
$emailContent .= renderFooter();

// Close the document
$emailContent .= renderDocumentEnd();

// Output the email content
echo $emailContent;
