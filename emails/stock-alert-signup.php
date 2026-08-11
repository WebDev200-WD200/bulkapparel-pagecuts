<?php
/**
 * Stock Alert Signup Email (Notify Me confirmation)
 *
 * Migrated from outofstock_email_template.php / saveemailstockalerts.php
 * Subject: BulkApparel.com - Stock notification signup
 */
require_once __DIR__ . '/components/header.php';
require_once __DIR__ . '/components/footer.php';
require_once __DIR__ . '/components/document-start.php';
require_once __DIR__ . '/components/stock-alert-item.php';
require_once __DIR__ . '/components/suggested-items.php';
require_once __DIR__ . '/components/thank-you.php';
require_once __DIR__ . '/config.php';

$defaultData = [
  'email' => [
    'preview_text' => 'We will notify you as soon as your item is back in stock.',
  ],
  'item' => [
    'name' => 'Gildan 5000 Heavy Cotton T-Shirt',
    'product_url' => 'https://www.bulkapparel.com/tshirts/gildan-5000-heavy-cotton-t-shirt?color=WHITE',
    'image' => 'https://www.bulkapparel.com/image/bulk-blank-shirts/16_fm.jpg',
    'color' => 'White',
    'sizes' => 'S, M, L',
  ],
  'suggested_items' => [
    [
      'name' => 'G5000 Gildan 5000 T-Shirt Youth Heavy Cotton',
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
      'name' => 'Gildan 5000L Heavy Cotton Women\'s Short Sleeve',
      'colors_available' => 36,
      'price' => 3.64,
      'image' => 'https://www.bulkapparel.com/image/bulk-blank-shirts/391a_fm.jpg',
      'logo' => 'https://www.bulkapparel.com/image/brand/small/35_fm.jpg?v=8302028',
    ],
  ],
];

$emailData = isset($emailData) ? $emailData : $defaultData;

$companyName = getConfig('company.name');
$companyWebsite = getConfig('company.website');
$customerServiceUrl = getConfig('company.customer_service_url');

$documentTitle = 'Stock notification signup';
$previewText = !empty($emailData['email']['preview_text'])
  ? $emailData['email']['preview_text']
  : 'We will notify you as soon as your item is back in stock.';

$emailContent = renderDocumentStart($documentTitle, $previewText);
$emailContent .= renderHeader(
  'We will notify you as soon as your item is back in stock.<br>Thank you for using our inventory request notification.',
  ['titleAlign' => 'left']
);

$emailContent .= renderStockAlertItem($emailData['item'] ?? []);

$emailContent .= '
  <!-- Follow-up message -->
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td style="padding: 20px; font-family: \'Open Sans\', Arial, sans-serif; font-size: 16px; color: #202124; line-height: 1.5;">
        <p style="margin: 0 0 12px 0; color: #000000;">
          Our system will send you another email as soon as stock is available.<br>
          If you have any questions please reply to this email.
        </p>
        <p style="margin: 0; color: #000000;">
          Thank you for being a <a href="' . htmlspecialchars($companyWebsite) . '" style="font-weight: 700; color: #002868; text-decoration: none;">' . htmlspecialchars(strtolower(str_replace('.com', '', $companyName)) . '.com') . '</a> customer!
        </p>
      </td>
    </tr>
  </table>';

$emailContent .= renderSuggestedItems(
  $emailData['suggested_items'] ?? [],
  'Recommended items from other customers',
  '',
  'Explore More'
);

$emailContent .= renderThankYou();
$emailContent .= renderFooter();
$emailContent .= renderDocumentEnd();

echo $emailContent;
