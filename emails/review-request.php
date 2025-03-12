<?php
// Include components and config
require_once __DIR__ . '/components/header.php';
require_once __DIR__ . '/components/footer.php';
require_once __DIR__ . '/components/review-box.php';
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
       'date' => 'Sunday, January 12'
   ]
];

// Use passed data or default data
$emailData = isset($emailData) ? $emailData : $defaultData;

// Get company info from config
$companyName = getConfig('company.name');
$companyWebsite = getConfig('company.website');
$customerServiceUrl = getConfig('company.customer_service_url');
$pointsPerReview = getConfig('rewards.points_per_review');

// Generate the email content
$emailContent = renderDocumentStart('We Value Your Opinion');

// Add header with subtitle
$emailContent .= renderHeader('We Value Your Opinion<br>Get ' . $pointsPerReview . ' Points For Your Feedback!');


// Add greeting and review info
$emailContent .= '
  <!-- Greeting -->
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td class="content" style="padding: 0 20px;">
        <p class="greeting" style="font-size: 16px; margin-bottom: 10px; font-weight: bold;">Hey ' . $emailData['customer']['name'] . ',</p>
        <p>We hope you\'re loving your recent order.</p>
        <p>There are over a dozen ways to earn reward points at Bulk Apparel. The easiest? We\'ll give you ' . $pointsPerReview . ' reward points for every product review you leave. It only takes a minute—click below and start earning!</p>
      </td>
    </tr>
  </table>';

// Add review box with exact text from design
$emailContent .= renderReviewBox(
  "Get ".$pointsPerReview." Rewards Points!",
  "Leave A Review And Earn Points!",
  "Visit the item page and share your thoughts—good or bad, we value your honest feedback and won't judge. Your review also helps other shoppers make the right choice! You can redeem your points anytime for website credit!",
  "+".$pointsPerReview." POINTS PER REVIEW"
);

// Add order details
$emailContent .= '
  <!-- Order Details -->
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="order-details" style="margin-top: 20px; ">
    <tr>
      <td style="padding: 0 20px;">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="50%" valign="top">
              <div class="section-title" style="font-weight: bold; color: #002868; margin-bottom: 10px; border-bottom: 1px solid #eee; padding-bottom: 5px;">Order #</div>
              <p style="margin: 0;">
                <a href="#" style="color: #002868; text-decoration: underline;">' . $emailData['order']['number'] . '</a>
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

// Add customer service
$emailContent .= '
  <!-- Customer Service -->
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td style="padding: 20px;">
        <p>Not 100% satisfied? Contact Us and we\'ll make it right! Reply to this email or visit our <a href="' . $customerServiceUrl . '" style="color: #002868; text-decoration: underline;">customer service center</a> at ' . $companyName . '</p>
      </td>
    </tr>
  </table>';

// Add footer
$emailContent .= renderFooter();

// Close the document
$emailContent .= renderDocumentEnd();

// Output the email content
echo $emailContent;
?>

