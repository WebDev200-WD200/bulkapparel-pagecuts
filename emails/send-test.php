<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 0); // Don't display errors to the client

// Include the EmailService class
require_once 'EmailService.php';

// Get the template to send
$template = isset($_GET['template']) ? $_GET['template'] : '';
$email = isset($_GET['email']) ? $_GET['email'] : '';

// Validate template
$validTemplates = ['order-confirmed', 'order-shipped', 'out-for-delivery', 'order-delivered', 'review-request'];
if (!in_array($template, $validTemplates)) {
    echo json_encode(['success' => false, 'message' => 'Invalid template']);
    exit;
}

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Invalid email address']);
    exit;
}

// Create an instance of the EmailService
$emailService = new EmailService();

// Set content type to JSON
header('Content-Type: application/json');

// Send email based on template
$result = false;

try {
    switch ($template) {
        case 'order-confirmed':
            $data = [
                'customer' => [
                    'name' => 'KIMBERELY',
                    'full_name' => 'KIMBERELY LLOYD',
                    'email' => $email,
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
                    'estimated_delivery' => 'January 20th, 2025',
                    'delivery_date_short' => '01/20/25'
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
            $result = $emailService->sendOrderConfirmation($email, $data);
            break;
            
        case 'order-shipped':
            $data = [
                'customer' => [
                    'name' => 'KIMBERELY',
                    'full_name' => 'KIMBERELY LLOYD',
                    'email' => $email,
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
                    'shipped_date' => '01/16/25'
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
            $result = $emailService->sendOrderShipped($email, $data);
            break;
            
        case 'out-for-delivery':
            $data = [
                'customer' => [
                    'name' => 'KIMBERELY',
                    'full_name' => 'KIMBERELY LLOYD',
                    'email' => $email,
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
                    'out_for_delivery' => true,
                    'delivered' => false
                ]
            ];
            $result = $emailService->sendOutForDelivery($email, $data);
            break;
            
        case 'order-delivered':
            $data = [
                'customer' => [
                    'name' => 'KIMBERELY',
                    'full_name' => 'KIMBERELY LLOYD',
                    'email' => $email,
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
            $result = $emailService->sendOrderDelivered($email, $data);
            break;
            
        case 'review-request':
            $data = [
                'customer' => [
                    'name' => 'KIMBERELY',
                    'full_name' => 'KIMBERELY LLOYD',
                    'email' => $email,
                    'address' => '6041 Stonechase Blvd',
                    'city' => 'Pace',
                    'state' => 'FL',
                    'zip' => '32571',
                    'phone' => '(540) 760-6687'
                ],
                'order' => [
                    'number' => 'B736752781737',
                    'date' => 'Sunday, January 12',
                    'order_date_short' => '01/16/25'
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
                'status' => [
                    'ordered' => true,
                    'shipped' => true,
                    'out_for_delivery' => true,
                    'delivered' => true
                ]
            ];
            $result = $emailService->sendReviewRequest($email, $data);
            break;
    }
    
    // Return the result
    echo json_encode(['success' => $result, 'message' => $result ? 'Email sent successfully' : 'Failed to send email']);
} catch (Exception $e) {
    // Log the error to a file
    error_log('Email error: ' . $e->getMessage());
    
    // Return error as JSON
    echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
}
?>

