<?php
// Company information configuration
$config = [
    'base_url' => 'http://127.0.0.1:5500',
    'company' => [
        'name' => 'BulkApparel.com',
        'logo' => 'https://www.bulkapparel.com/images/logo.png',
        'address' => '1001 Brickell Bay Drive Suite 2700C Miami, FL 33131',
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
    ]
];

// Function to get config value
function getConfig($key, $default = null) {
    global $config;
    
    // Split the key by dots to access nested arrays
    $keys = explode('.', $key);
    $value = $config;
    
    foreach ($keys as $k) {
        if (!isset($value[$k])) {
            return $default;
        }
        $value = $value[$k];
    }
    
    return $value;
}
?>

