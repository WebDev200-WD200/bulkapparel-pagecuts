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
// Add info-box component to includes
require_once __DIR__ . '/components/info-box.php';

// Define default data for this template, and be use when no data is passed for testing purposes 
$defaultData = [
  'email' => [
    'preview_text' => '',
  ],
  'customer' => [
    'name' => 'KIMBERELY',
    'full_name' => 'KIMBERELY LLOYD',
  ],
  'shipping_address' => [
    'name' => 'KIMBERELY LLOYD',
    'address' => '6041 Stonechase Blvd',
    'address_2' => '6042 Stonechase Blvd',
    'email' => 'kimberly@webdev200.com',
    'city' => 'Pace',
    'state' => 'FL',
    'zip' => '32571',
    'phone' => '(540) 760-6687',
    'company' => 'Bulk Apparel',
  ],
  'billing_address' => [
    'name' => 'KIMBERELY LLOYD',
    'email' => 'kimberly@webdev200.com',
    'address' => '6041 Stonechase Blvd',
    'address_2' => '',
    'city' => 'Pace',
    'state' => 'FL',
    'zip' => '32571',
    'phone' => '(540) 760-6687',
    'seller_permit' => '123456789',
  ],
  'order' => [
    'number' => 'B736752781737',
    'date' => 'Sunday, January 12',
    'order_date_short' => '01/16/25',
    'shipping_method' => 'Sunday, January 12',
    'order_date_short' => '01/16/25',
    'total_items' => 1,
    'payment_method' => 'Visa XXXX1111',
    'tracking_number' => '1Z80E16V033142087',
    'estimated_delivery' => 'January 20th, 2025',
    'delivery_date_short' => '01/20/25',
    'delivery_date' => 'Friday, January 17',
    'shipped_date' => '01/16/25',
    'out_for_delivery_date' => '01/20/25',
    'shippings' => [
      [
        'group' => 'Bulk Xpress',
        'name' => 'Ground',
        'amount' => 2.99,
        'item_count' => 4,
        'est' => '3-7 Business Days',
      ],
      [
        'group' => 'Port Warehouse',
        'name' => 'Standard Shipping',
        'amount' => 3.99,
        'item_count' => 4,
        'est' => '3-7 Business Days',
      ]
    ],

  ],
  'total_items_count' => 8,
  'group' => [
    [
      'name' => 'BulkSavings',
      "items" => [
        [
          'name' => '5000 Heavy Cotton T-Shirt',
          'quantity' => 1,
          'color' => 'White',
          'size' => 'S',
          'price' => 2.41,
          'image' => 'https://www.bulkapparel.com/image/bulk-blank-shirts/16_fm.jpg'
        ],
        [
          'name' => 'G5000 Gildan 5000 T-Shirt Youth Heavy Cotton',
          'quantity' => 50,
          'price' => 2.44,
          'color' => 'White',
          'size' => 'S',
          'image' => 'https://www.bulkapparel.com/image/bulk-blank-shirts/16_fm.jpg',
        ]
      ]
    ],
    [
      'name' => 'Port Warehouse',
      "items" => [
        [
          'name' => 'J317 Port Authority Core Soft Shell Jacket. J317',
          'quantity' => 1,
          'color' => 'Black',
          'size' => 'XS',
          'price' => 2.41,
          'image' => 'https://www.bulkapparel.com/image/sanmar-colors/search/J317_black_model_front.webp'
        ]
      ]
    ]
  ],
  'totals' => [
    'product_total' => 2.41,
    'shipping_fee' => 6.85,
    'tax' => 0.17,
    'total' => 9.43,
    'bulk_discount' => 5.00,
    'gift_certs' => ['GC1234', 'GC5678'],
    'gift_certs_amount' => 10.00,
    'coupon_discounts' => ['SAVE10', 'FREESHIP'],
    'coupon_discounts_amount' => 15.00,
    'brand_discounts' => ['BRANDCREDIT'],
    'brand_discounts_amount' => 20.00,
    'category_discounts' => ['CATDISCOUNT'],
    'category_discounts_amount' => 25.00,
    'tax' => 0.17,
    'credit_amount' => 5.00,
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
];

// Use passed data or default data
$emailData = isset($emailData) ? $emailData : $defaultData;

// Set the current status
$currentStatus = 'ordered';

// Create preview text
$previewText = empty($emailData['email']['preview_text']) ? 'Thank you for your order #' . $emailData['order']['number'] . '. Your order has been confirmed and is being processed. Estimated delivery: ' . $emailData['order']['estimated_delivery'] . '.' : $emailData['email']['preview_text'];

// Generate the email content
$emailContent = renderDocumentStart('Your Order is Confirmed!', $previewText);

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

$additionalColumns = [];

// Add order details
$shippingAddress = '
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>
        <a href="mailto:' . $emailData['shipping_address']['email'] . '" style="color: #002868; text-decoration: underline;">' . $emailData['shipping_address']['email'] . '</a>
      </td>
    </tr>
    <tr>
      <td>
        <strong>' . $emailData['shipping_address']['name'] . '</strong>
      </td>
    </tr>
    <tr>
      <td>
        ' . $emailData['shipping_address']['address'] . '
      </td>
    </tr>';

if ($emailData['shipping_address']['address_2']) {
  $shippingAddress .= '
    <tr>
      <td>
        ' . $emailData['shipping_address']['address_2'] . '
      </td>
    </tr>';
}
    
$shippingAddress .=   '<tr>
      <td>
        ' . $emailData['shipping_address']['city'] . ', ' . $emailData['shipping_address']['state'] . ', ' . $emailData['shipping_address']['zip'] . '
      </td>
    </tr>
    <tr>
      <td>
        ' . $emailData['shipping_address']['phone'] . '
      </td>
    </tr>
  </table>';


// Add order details
$billingAddress = '
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>
        <a href="mailto:' . $emailData['billing_address']['email'] . '" style="color: #002868; text-decoration: underline;">' . $emailData['billing_address']['email'] . '</a>
      </td>
    </tr>
    <tr>
      <td>
        <strong>' . $emailData['billing_address']['name'] . '</strong>
      </td>
    </tr>
    <tr>
      <td>
        ' . $emailData['billing_address']['address'] . '
      </td>
    </tr>';

if ($emailData['billing_address']['address_2']) {
  $billingAddress .= '
    <tr>
      <td>
        ' . $emailData['billing_address']['address_2'] . '
      </td>
    </tr>';
}
    
$billingAddress .=   '<tr>
      <td>
        ' . $emailData['billing_address']['city'] . ', ' . $emailData['billing_address']['state'] . ', ' . $emailData['billing_address']['zip'] . '
      </td>
    </tr>
    <tr>
      <td>
        ' . $emailData['billing_address']['phone'] . '
      </td>
    </tr>';

if(!empty($emailData['billing_address']['seller_permit'])) {
  $billingAddress .= '
    <tr>
      <td>
        ' . $emailData['billing_address']['seller_permit'] . '
      </td>
    </tr>';
};

$billingAddress .= '</table>';

$orderDate = $emailData['order']['date'];
$orderNumber = $emailData['order']['number'];

$additionalColumns[] = [
  'title' => 'Shipping Address',
  'content' => $shippingAddress
];

$additionalColumns[] = [
  'title' => 'Billing Address',
  'content' => $billingAddress
];

$additionalColumns[] = [
  'title' => 'Order Number',
  'content' => '#'.$orderNumber
];

$additionalColumns[] = [
  'title' => 'Order Date',
  'content' => $orderDate
];

// Add shipping & payment details

$shippingsData = $emailData['order']['shippings'] ?? [];

$shippingContent = '';

if (count($shippingsData) > 0) {
  $shippingContent .= '<table width="100%" border="0" cellspacing="0" cellpadding="0">';
  foreach ($shippingsData as $shipping) {
    $shippingContent .= '
    <tr>
      <td style="padding: 0 10px 5px 0;">
        <table border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>' . $shipping['group'] . ' - ' . $shipping['name'] . '</td>
          </tr>
          <tr>
            <td><small style="color: #006400;">' . $shipping['est'] . '</small></td>
          </tr>
          <tr>
            <td><small style="color: #006400;"><b>Total Items: ' . $emailData['order']['total_items'] . '</b></small></td>
          </tr>
        </table>
      </td>
    </tr>';
  }
  $shippingContent .= '</table>';
}

$paymentContent = $emailData['order']['payment_method'];

$additionalColumns[] = [
  'title' => 'Shipping',
  'content' => $shippingContent
];

$additionalColumns[] = [
  'title' => 'Payment',
  'content' => $paymentContent
];

$emailContent .= count($additionalColumns) ? renderInfoBoxRow($additionalColumns, 2) : '';


// Add items ordered
$emailContent .= '
  <!-- Items Ordered -->
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td style="padding: 0 20px;">
        <div class="section-title" style=" margin-bottom: 10px; padding-bottom: 5px; margin-top: 20px;"><span style="font-weight: bold; color: #002868; font-size:18px">Items Ordered</span>
        
        <span style="float:right;">' . $emailData['total_items_count'] . ' items</span>
        </div>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">';

$maxItems = 150;
$itemCount = 0;

foreach ($emailData['group'] as $group) {
  if (count($emailData['group']) > 1) {
    $emailContent .= '
          <tr>
            <td style="padding: 5px 0;">
              <div style="font-weight: bold; color:#445162">' . $group['name'] . '</div>
            </td>
          </tr>';
  }

  foreach ($group['items'] as $item) {
    if ($itemCount >= $maxItems) {
      break 2;
    }

    $emailContent .= '
          <tr>
            <td style="padding: 16px 0; border-top: 1px solid #eee;">
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
    $itemCount++;
  }
}

if ($itemCount >= $maxItems) {
  $emailContent .= '
          <tr>
            <td style="padding: 16px 0; text-align: center;">
              <a href="' . $baseUrl . '/orderconfirm?orderId=' . $orderNumber . '" style="background-color: #002868; color: white; padding: 12px 30px; text-decoration: none; display: inline-block; font-size: 14px; border-radius: 4px;">View More</a>
            </td>
          </tr>';
}

$emailContent .= '
        </table>
      </td>
    </tr>
  </table>';



  // Credit Amount 
$summaryColumns = [];

// Bulk Discount
$bulkDiscountAmount = $emailData['totals']['bulk_discount'] ?? 0;
$bulkDiscountTitle = 'Bulk Discount';
$bulkDiscountContent = '$' . number_format($bulkDiscountAmount, 2);

if (isset($bulkDiscountAmount) && $bulkDiscountAmount > 0) {
  $summaryColumns[] = [
    'title' => $bulkDiscountTitle,
    'content' => $bulkDiscountContent
  ];
}

// Coupon Discounts
$couponDiscountAmount = $emailData['totals']['coupon_discounts_amount'] ?? 0;
$couponDiscountTitle = 'Coupon Discounts';
$couponDiscountSub = implode(', ', $emailData['totals']['coupon_discounts'] ?? []);
$couponDiscountContent = '$' . number_format($couponDiscountAmount, 2);

if (isset($couponDiscountAmount) && $couponDiscountAmount > 0) {
  $summaryColumns[] = [
    'title' => $couponDiscountTitle,
    'sub' => $couponDiscountSub,
    'content' => $couponDiscountContent
  ];
}

// Brand Discounts
$brandDiscountAmount = $emailData['totals']['brand_discounts_amount'] ?? 0;
$brandDiscountTitle = 'Brand Discounts';
$brandDiscountSub = implode(', ', $emailData['totals']['brand_discounts'] ?? []);
$brandDiscountContent = '$' .  number_format($brandDiscountAmount, 2);

if (isset($brandDiscountAmount) && $brandDiscountAmount > 0) {
  $summaryColumns[] = [
    'title' => $brandDiscountTitle,
    'sub' => $brandDiscountSub,
    'content' => $brandDiscountContent
  ];
}

// Category Discounts
$categoryDiscountAmount = $emailData['totals']['category_discounts_amount'] ?? 0;
$categoryDiscountTitle = 'Category Discounts';
$categoryDiscountSub = implode(', ', $emailData['totals']['category_discounts'] ?? []);
$categoryDiscountContent = '$' . number_format($categoryDiscountAmount, 2);

if (isset($categoryDiscountAmount) && $categoryDiscountAmount > 0) {
  $summaryColumns[] = [
    'title' => $categoryDiscountTitle,
    'sub' => $categoryDiscountSub,
    'content' => $categoryDiscountContent
  ];
}

// Shipping breakdown
$shippingBreakdown = '';

if (count($shippingsData) > 0) {
  $shippingBreakdown .= '<table width="100%" border="0" cellspacing="0" cellpadding="0">';
  foreach ($shippingsData as $shipping) {
    $shippingBreakdown .= '
    <tr>
      <td style="padding: 5px 10px 0 0;">
        <small>
        <b> ' . $shipping['group'] . ' - ' . $shipping['name'] . '</b>
        </small>
      </td>

      <td align="end" style="padding-top: 5px;">
        <b>$' . number_format($shipping['amount'], 2) . '</b>
      </td>
    </tr>';
  }
  $shippingBreakdown .= '</table>';
}

if (isset($shippingsData) && $shippingsData > 0) {
  $summaryColumns[] = [
    'title' => 'Shipping',
    'column' => 1,
    'content' => $shippingBreakdown
  ];
}

// Tax
$taxAmount = $emailData['totals']['tax'] ?? 0;
$taxTitle = 'Tax';
$taxContent = '$' . number_format($taxAmount, 2);

if (isset($taxAmount) && $taxAmount > 0) {
  $summaryColumns[] = [
    'title' => $taxTitle,
    'content' => $taxContent
  ];
}

// Gift Certificates
$giftCertAmount = $emailData['totals']['gift_certs_amount'] ?? 0;
$giftCertTitle = 'Gift Certificates';
$giftCertsString = implode(', ', $emailData['totals']['gift_certs'] ?? []);
$giftCertContent = '$' .  number_format($giftCertAmount, 2);

if (isset($giftCertAmount) && $giftCertAmount > 0) {
  $summaryColumns[] = [
    'title' => $giftCertTitle,
    'sub' => $giftCertsString,
    'content' => $giftCertContent
  ];
}

// Credit Amount
$creditAmount = $emailData['totals']['credit_amount'] ?? 0;
$creditAmountTitle = 'Bulk Bulks';
$creditAmountContent = '$' . number_format($creditAmount, 2);

if (isset($creditAmount) && $creditAmount > 0) {
  $summaryColumns[] = [
    'title' => $creditAmountTitle,
    'content' => $creditAmountContent
  ];
}

$emailContent .= '  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:40px;"> ';

$emailContent .= '
  <tr>
    <td style="padding: 10px 20px;" width="100%" align="right">
      <table border="0" cellspacing="0" cellpadding="0" width="250px">
        <tr>
          <td align="left" style="padding: 5px 0;">Product Total</td>
          <td align="right" style="padding: 5px 0 5px 20px;">
          <b>$' . number_format($emailData['totals']['product_total'], 2) . '</b>
          </td>
        </tr> ';

foreach ($summaryColumns as $column) {

  if (isset($column['column'])) {
    $emailContent .= '
        <tr>
          <td colspan="2" style="padding: 5px 0 0 0;">' . $column['title'] . '<br>' . $column['content'] . '</td>
        </tr>';
  } else {
    $emailContent .= '
        <tr>
          <td align="left" style="padding: 5px 10px 0 0;">' . $column['title'] . (
      isset($column['sub']) ? '<br><b style="font-size: 12px;">' . $column['sub'] . '</b>' : ''
    ) . '</td>
          <td align="right" style="padding: 5px 0 5px 20px;"><b>' . $column['content'] . '</b></td>
        </tr>';
  }
}

$emailContent .= '  <tr class="total-row" style="font-weight: bold;">
          <td align="left" style="padding: 10px 0; border-top: 1px solid #eee; border-bottom: 1px solid #eee;margin-top:5px;">Total</td>
          <td align="right" style="padding: 10px 0 10px 20px; border-top: 1px solid #eee; border-bottom: 1px solid #eee; color: #002868;margin-top:5px;">$' . number_format($emailData['totals']['total'], 2) . '</td>
        </tr>
      </table>
    </td>
  </tr>';
$emailContent .= '</table>';

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
