<?php
// Company information configuration
$_config = [
    // Start - Abandoned Cart Email - LS - for dev only 2/4/2026
    'base_url' => 'https://5dev1459water.bulkapparel.com/',
    // End - Abandoned Cart Email - LS - 2/4/2026
    'company' => [
        'name' => 'BulkApparel.com',
        // Start - Abandoned Cart Email - LS - for dev only - 2/4/2026
        'logo' => 'https://5dev1459water.bulkapparel.com/emails/images/email-logo-no-com.png',
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
        'no-tracking-email' => [
            'email_status_no_tracking_toggle',
            'email_status_no_tracking_title',
            'email_status_no_tracking_body',
        ],
        'order-status' => [
            'email_order_status_title',
            'email_order_status_body',
        ],
    ]
    // End - Bulkapparel Order emails adjustments - CL - 5152026
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
?>

