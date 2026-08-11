<?php
// Company information configuration
$_config = [
    // Start - Abandoned Cart Email - LS - for dev only 2/4/2026
    'base_url' => 'http://localhost:5500/',
    // End - Abandoned Cart Email - LS - 2/4/2026
    'company' => [
        'name' => 'BulkApparel.com',
        // Start - Abandoned Cart Email - LS - for dev only - 2/4/2026
        'logo' => 'http://localhost:5500/emails/images/email-logo-no-com.png',
        // End - Abandoned Cart Email - LS - 2/4/2026
        'address' => '2244 Faraday Avenue #102 Carlsbad, CA, 92008',
        'website' => 'https://bulkapparel.com',
        'customer_service_url' => 'https://bulkapparel.com/customer-service',
        'tracking_url' => 'https://www.bulkapparel.com/tracking',
        'returns_url' => 'https://www.bulkapparel.com/returns',
        'blog_url' => 'https://blog.bulkapparel.com',
        'social_media' => [
            'facebook' => 'https://www.facebook.com/BulkApparel/',
            'instagram' => 'https://www.instagram.com/bulkapparel/',
            'twitter' => 'https://twitter.com/bulkapparel/',
            'tiktok' => 'https://www.tiktok.com/@bulkapparel',
            'youtube' => 'https://www.youtube.com/bulkapparel'
        ]
    ],
    'image_version' => '862026',
    'rewards' => [
        'points_per_review' => 20
    ],

    // Start - Bulkapparel Order emails adjustments - CL - 5152026
    'admin_settings' => [
        'abandon-cart-email' => [
            'abandoned_max_interval',
            'abandoned_min_interval',
            'abandoned_cart_amount',
            'abandoned_max_cart_items',
            'email_abandoned_title_returning',
            'email_abandoned_title_first_order',
            'email_abandoned_body_returning',
            'email_abandoned_body_first_order',
        ],
        'order-confirmed' => [
            'email_status_confirmed_toggle',
            'email_status_confirmed_title',
            'email_status_confirmed_body',
        ],
        'order-shipped' => [
            'email_status_shipped_toggle',
            'email_status_shipped_title',
            'email_status_shipped_body',
        ],
        'out-for-delivery' => [
            'email_status_ofd_toggle',
            'email_status_ofd_title',
            'email_status_ofd_body',
        ],
        'on-the-way' => [
            'email_status_otw_toggle',
            'email_status_otw_title',
            'email_status_otw_body',
        ],
        'order-delivered' => [
            'email_status_delivered_toggle',
            'email_status_delivered_title',
            'email_status_delivered_body',
        ],
        'review-request' => [
            'email_status_review_toggle',
            'email_status_review_title',
            'email_status_review_body',
        ],
        'registration-email' => [],
        'stock-alert-signup' => [],
        'no-tracking-email' => [
            'email_status_no_tracking_toggle',
            'email_status_no_tracking_title',
            'email_status_no_tracking_body',
        ],
        'order-status' => [
            'email_order_status_title',
            'email_order_status_body',
        ],
    ],
    // End - Bulkapparel Order emails adjustments - CL - 5152026

    // Where each email template is included/called in production.
    // Format: 'template-key' => [ '/path/to/file.php' => 'start-end' ]
    'included_at' => [
        'abandon-cart-email' => [
            '/var/www/html/cron/abandon-cart.php' => '88-120',
        ],
        'order-confirmed' => [
            '/var/www/html/home.php' => '132-145',
        ],
        'order-shipped' => [
            '/var/www/html/home.php' => '210-238',
        ],
        'out-for-delivery' => [
            '/var/www/html/home.php' => '260-288',
        ],
        'on-the-way' => [
            '/var/www/html/tracking/update.php' => '55-78',
        ],
        'order-delivered' => [
            '/var/www/html/home.php' => '310-340',
        ],
        'review-request' => [
            '/var/www/html/cron/review-request.php' => '40-65',
        ],
        'registration-email' => [
            '/var/www/html/email/do_signup.php' => '93-125',
            '/var/www/html/email/confirmordercreateaccount.php' => '139-143',
            '/var/www/html/email/addcustomeraddressinfo.php' => '271-275',
        ],
        'stock-alert-signup' => [
            '/var/www/html/email/saveemailstockalerts.php' => '101-119',
        ],
        'no-tracking-email' => [
            '/var/www/html/orders/notify.php' => '90-115',
        ],
        'order-status' => [
            '/var/www/html/orders/status-email.php' => '22-48',
        ],
        'tracking-email-regular' => [
            '/var/www/html/orders/tracking-email.php' => '15-42',
        ],
        'tracking-email-dtf' => [
            '/var/www/html/orders/tracking-email-dtf.php' => '15-42',
        ],
        'bulk-bucks-redeemed' => [
            '/var/www/html/rewards/redeem.php' => '100-125',
        ],
        'dtf-uploaded-design-access-email' => [
            '/var/www/html/dtf/guest-access.php' => '70-95',
        ],
    ],
];

// Function to get config value
function getConfig($key, $default = null) {
    global $_config;
    
    // Split the key by dots to access nested arrays
    $keys = explode('.', $key);
    $value = $_config;
    
    foreach ($keys as $k) {
        if (!isset($value[$k])) {
            return $default;
        }
        $value = $value[$k];
    }
    
    return $value;
}

function getEmailImageUrl($image) {
    global $_config;
    return $_config['base_url'] . '/emails/images/' . $image . '?v=' . $_config['image_version'];
}
?>
