<?php
/**
 * EmailService Class
 * 
 * A service class for handling all email operations in the BulkApparel system.
 * This class provides methods for sending various types of transactional emails
 * using the template system.
 */
class EmailService {
    /**
     * @var array Default email data
     */
    private $defaultData;
    
    /**
     * @var string Base path for email templates
     */
    private $templatePath;
    
    /**
     * @var array Valid email templates
     */
    private $validTemplates = [
        'order-confirmed',
        'order-shipped',
        'out-for-delivery',
        'order-delivered',
        'review-request'
    ];
    
    /**
     * Constructor
     * 
     * @param array $defaultData Optional default data to use for emails
     * @param string $templatePath Optional custom template path
     */
    public function __construct($defaultData = [], $templatePath = '') {
        // Load config
        require_once __DIR__ . '/config.php';
        
        // Set default data
        $this->defaultData = $defaultData;
        
        // Set template path
        $this->templatePath = $templatePath ?: __DIR__;
    }
    
    /**
     * Send an email using a specific template
     * 
     * @param string $template The template to use
     * @param string $to Recipient email address
     * @param string $subject Email subject
     * @param array $data Custom data to merge with default data
     * @param array $attachments Optional file attachments
     * @return bool Whether the email was sent successfully
     * @throws Exception If template is invalid
     */
    public function email($template, $to, $subject, $data = [], $attachments = []) {
        // Validate template
        if (!in_array($template, $this->validTemplates)) {
            throw new Exception("Invalid email template: $template");
        }
        
        // Validate email
        if (!filter_var($to, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email address: $to");
        }
        
        // Merge data
        $emailData = array_merge($this->defaultData, $data);


				// var_dump([
				// 	"template" => $template,
				// 	"to" => $to,
				// 	"subject" => $subject,
				// 	"emailData" => $emailData,
				// 	"attachments" => $attachments
				// ]);
        
        // Get the email content by including the template
        ob_start();
        include $this->templatePath . '/' . $template . '.php';
        $emailContent = ob_get_clean();
        
        // Set headers
        $companyName = getConfig('company.name');
        $companyWebsite = getConfig('company.website');
        $domain = str_replace(['http://', 'https://', 'www.'], '', $companyWebsite);
        
        $headers = [
            'MIME-Version: 1.0',
            'Content-type: text/html; charset=utf-8',
            'From: ' . $companyName . ' <noreply@' . $domain . '>',
            'Reply-To: ' . $companyName . ' <support@' . $domain . '>'
        ];
        
        // Handle attachments if any
        if (!empty($attachments)) {
            $headers = $this->addAttachments($headers, $attachments);
        }
        
        // Send the email
        $result = mail($to, $subject, $emailContent, implode("\r\n", $headers));
        
        // Log the result
        $this->logEmailSent($template, $to, $result);
        
        return $result;
    }
    
    /**
     * Send an order confirmation email
     * 
     * @param string $to Recipient email address
     * @param array $orderData Order data
     * 
     * Sample orderData structure:
     * [
     *   'customer' => [
     *     'name' => 'KIMBERELY',
     *     'full_name' => 'KIMBERELY LLOYD',
     *     'email' => 'customer@example.com',
     *     'address' => '6041 Stonechase Blvd',
     *     'city' => 'Pace',
     *     'state' => 'FL',
     *     'zip' => '32571',
     *     'phone' => '(540) 760-6687'
     *   ],
     *   'order' => [
     *     'number' => 'B736752781737',
     *     'date' => 'Sunday, January 12',
     *     'order_date_short' => '01/16/25',
     *     'shipping_method' => 'USPS',
     *     'shipping_time' => '3-7 Business Days',
     *     'total_items' => 1,
     *     'payment_method' => 'Visa XXXX1111',
     *     'tracking_number' => '1Z80E16V033142087',
     *     'estimated_delivery' => 'January 20th, 2025',
     *     'delivery_date_short' => '01/20/25',
     *     'delivery_date' => 'Friday, January 17',
     *     'shipped_date' => '01/16/25',
     *     'out_for_delivery_date' => '01/20/25',
     *     'credit_amount' => 5.00,
     *     'shippings_breakdown' => [
     *       [
     *         'shipping_group' => 'BulkSavings',
     *         'shipping_name' => 'UPS',
     *         'shipping_amount' => 2.99,
     *       ],
     *       [
     *         'shipping_group' => 'BulkSavings',
     *         'shipping_name' => 'USPS',
     *         'shipping_amount' => 3.99,
     *       ]
     *     ],
     *     'bulk_discount'=> 5.00,
     *     'gift_certs' => ['GC1234', 'GC5678'],
     *     'gift_certs_amount' => 10.00,
     *     'coupon_discounts' => ['SAVE10', 'FREESHIP'],
     *     'coupon_discounts_amount' => 15.00,
     *     'brand_discounts' => ['BRANDCREDIT'],
     *     'brand_discounts_amount' => 20.00,
     *     'category_discounts' => ['CATDISCOUNT'],
     *     'category_discounts_amount' => 25.00,
     *     'tax' => 0.17,
     *   ],
     *   'items' => [
     *     [
     *       'name' => '5000 Heavy Cotton T-Shirt',
     *       'quantity' => 1,
     *       'color' => 'White',
     *       'size' => 'S',
     *       'price' => 2.41,
     *       'image' => 'https://www.bulkapparel.com/image/bulk-blank-shirts/16_fm.jpg'
     *     ]
     *   ],
     *   'totals' => [
     *     'product_total' => 2.41,
     *     'shipping_fee' => 6.85,
     *     'tax' => 0.17,
     *     'total' => 9.43
     *   ],
     *   'suggested_items' => [
     *     [
     *       'name' => 'G5000 Gildan 5000 T-Shirt Youth Heavy Cotton',
     *       'colors_available' => 50,
     *       'price' => 2.44,
     *       'image' => 'https://www.bulkapparel.com/image/bulk-blank-shirts/16_fm.jpg',
     *       'logo' => 'https://www.bulkapparel.com/image/brand/small/35_fm.jpg?v=8302028'
     *     ],
     *     [
     *       'name' => 'Gildan 5400 Heavy Cotton Long Sleeve T-Shirt',
     *       'colors_available' => 23,
     *       'price' => 4.41,
     *       'image' => 'https://www.bulkapparel.com/image/bulk-blank-shirts/395_fm.jpg',
     *       'logo' => 'https://www.bulkapparel.com/image/brand/small/35_fm.jpg?v=8302028'
     *     ],
     *     [
     *       'name' => 'Gildan 5000L Heavy Cotton Women\'s Short Sleeve',
     *       'colors_available' => 36,
     *       'price' => 3.64,
     *       'image' => 'https://www.bulkapparel.com/image/bulk-blank-shirts/391a_fm.jpg',
     *       'logo' => 'https://www.bulkapparel.com/image/brand/small/35_fm.jpg?v=8302028'
     *     ]
     *   ],
     *   'status' => [
     *     'ordered' => true,
     *     'shipped' => false,
     *     'out_for_delivery' => false,
     *     'delivered' => false
     *   ]
     * ]
     * 
     * @return bool Whether the email was sent successfully
     */
    public function sendOrderConfirmation($to, $orderData) {
        return $this->email(
            'order-confirmed',
            $to,
            'Your Order is Confirmed!',
            $orderData
        );
    }
    
    /**
     * Send an order shipped email
     * 
     * @param string $to Recipient email address
     * @param array $orderData Order data
     * 
     * Sample orderData structure:
     * [
     *   'customer' => [
     *     'name' => 'KIMBERELY',
     *     'full_name' => 'KIMBERELY LLOYD',
     *     'email' => 'customer@example.com',
     *     'address' => '6041 Stonechase Blvd',
     *     'city' => 'Pace',
     *     'state' => 'FL',
     *     'zip' => '32571',
     *     'phone' => '(540) 760-6687'
     *   ],
     *   'order' => [
     *     'number' => 'B736752781737',
     *     'date' => 'Sunday, January 12',
     *     'order_date_short' => '01/16/25',
     *     'shipping_method' => 'USPS',
     *     'shipping_time' => '3-7 Business Days',
     *     'total_items' => 1,
     *     'payment_method' => 'Visa XXXX1111',
     *     'tracking_number' => '1Z80E16V033142087',  // Required for shipped emails
     *     'estimated_delivery' => 'January 20th, 2025',
     *     'delivery_date_short' => '01/20/25',
     *     'shipped_date' => '01/16/25',  // Required for shipped emails
     *     'items' => [...],
     *     'suggested_items' => [...],
     *     'status' => [
     *       'ordered' => true,
     *       'shipped' => true,  // Should be true for shipped emails
     *       'out_for_delivery' => false,
     *       'delivered' => false
     *     ]
     *   ]
     * ]
     * 
     * @return bool Whether the email was sent successfully
     */
    public function sendOrderShipped($to, $orderData) {
        return $this->email(
            'order-shipped',
            $to,
            'Your Order Has Been Shipped!',
            $orderData
        );
    }
    
    /**
     * Send an out for delivery email
     * 
     * @param string $to Recipient email address
     * @param array $orderData Order data
     * 
     * Sample orderData structure:
     * [
     *   'customer' => [
     *     'name' => 'KIMBERELY',
     *     'full_name' => 'KIMBERELY LLOYD',
     *     'email' => 'customer@example.com',
     *     'address' => '6041 Stonechase Blvd',
     *     'city' => 'Pace',
     *     'state' => 'FL',
     *     'zip' => '32571',
     *     'phone' => '(540) 760-6687'
     *   ],
     *   'order' => [
     *     'number' => 'B736752781737',
     *     'date' => 'Sunday, January 12',
     *     'order_date_short' => '01/16/25',
     *     'shipping_method' => 'USPS',
     *     'shipping_time' => '3-7 Business Days',
     *     'total_items' => 1,
     *     'payment_method' => 'Visa XXXX1111',
     *     'tracking_number' => '1Z80E16V033142087',  // Required for out for delivery emails
     *     'estimated_delivery' => 'January 20th, 2025',
     *     'delivery_date_short' => '01/20/25',
     *     'shipped_date' => '01/16/25',
     *     'out_for_delivery_date' => '01/20/25',  // Required for out for delivery emails
     *   ],
     *   'items' => [...],
     *   'suggested_items' => [...],
     *   'status' => [
     *     'ordered' => true,
     *     'shipped' => true,
     *     'out_for_delivery' => true,  // Should be true for out for delivery emails
     *     'delivered' => false
     *   ]
     * ]
     * 
     * @return bool Whether the email was sent successfully
     */
    public function sendOutForDelivery($to, $orderData) {
        return $this->email(
            'out-for-delivery',
            $to,
            'Your Order Is Out For Delivery!',
            $orderData
        );
    }
    
    /**
     * Send an order delivered email
     * 
     * @param string $to Recipient email address
     * @param array $orderData Order data
     * 
     * Sample orderData structure:
     * [
     *   'customer' => [
     *     'name' => 'KIMBERELY',
     *     'full_name' => 'KIMBERELY LLOYD',
     *     'email' => 'customer@example.com',
     *     'address' => '6041 Stonechase Blvd',
     *     'city' => 'Pace',
     *     'state' => 'FL',
     *     'zip' => '32571',
     *     'phone' => '(540) 760-6687'
     *   ],
     *   'order' => [
     *     'number' => 'B736752781737',
     *     'date' => 'Sunday, January 12',
     *     'order_date_short' => '01/16/25',
     *     'shipping_method' => 'USPS',
     *     'shipping_time' => '3-7 Business Days',
     *     'total_items' => 1,
     *     'payment_method' => 'Visa XXXX1111',
     *     'tracking_number' => '1Z80E16V033142087',
     *     'estimated_delivery' => 'January 20th, 2025',
     *     'delivery_date_short' => '01/20/25',
     *     'delivery_date' => 'Friday, January 17',  // Required for delivered emails
     *     'shipped_date' => '01/16/25',
     *     'out_for_delivery_date' => '01/20/25',
     *   ],
     *   'items' => [...],
     *   'suggested_items' => [...],
     *   'status' => [
     *     'ordered' => true,
     *     'shipped' => true,
     *     'out_for_delivery' => true,
     *     'delivered' => true  // Should be true for delivered emails
     *   ]
     * ]
     * 
     * @return bool Whether the email was sent successfully
     */
    public function sendOrderDelivered($to, $orderData) {
        return $this->email(
            'order-delivered',
            $to,
            'Your Order Was Delivered!',
            $orderData
        );
    }
    
    /**
     * Send a review request email
     * 
     * @param string $to Recipient email address
     * @param array $orderData Order data
     * 
     * Sample orderData structure:
     * [
     *   'customer' => [
     *     'name' => 'KIMBERELY',
     *     'full_name' => 'KIMBERELY LLOYD',
     *     'email' => 'customer@example.com',
     *     'address' => '6041 Stonechase Blvd',
     *     'city' => 'Pace',
     *     'state' => 'FL',
     *     'zip' => '32571',
     *     'phone' => '(540) 760-6687'
     *   ],
     *   'order' => [
     *     'number' => 'B736752781737',
     *     'date' => 'Sunday, January 12',
     *     'order_date_short' => '01/16/25',
     *   ],
     *   'items' => [
     *     [
     *       'name' => '5000 Heavy Cotton T-Shirt',
     *       'quantity' => 1,
     *       'color' => 'White',
     *       'size' => 'S',
     *       'price' => 2.41,
     *       'image' => 'https://www.bulkapparel.com/image/bulk-blank-shirts/16_fm.jpg'
     *     ]
     *   ],
     *   'status' => [
     *     'ordered' => true,
     *     'shipped' => true,
     *     'out_for_delivery' => true,
     *     'delivered' => true  // Should be true for review request emails
     *   ]
     * ]
     * 
     * @return bool Whether the email was sent successfully
     */
    public function sendReviewRequest($to, $orderData) {
        return $this->email(
            'review-request',
            $to,
            'We Value Your Opinion',
            $orderData
        );
    }
    
    /**
     * Add attachments to email headers
     * 
     * @param array $headers Existing headers
     * @param array $attachments Attachments to add
     * @return array Updated headers
     */
    private function addAttachments($headers, $attachments) {
        // Generate a boundary string
        $boundary = md5(time());
        
        // Update content type header
        $headers[1] = 'Content-Type: multipart/mixed; boundary="' . $boundary . '"';
        
        // Return updated headers
        return $headers;
    }
    
    /**
     * Log email sending result
     * 
     * @param string $template Template used
     * @param string $to Recipient
     * @param bool $result Whether sending was successful
     */
    private function logEmailSent($template, $to, $result) {
        $logMessage = date('Y-m-d H:i:s') . " - Template: $template, To: $to, Result: " . ($result ? 'Success' : 'Failed') . "\n";
        
        // Create logs directory if it doesn't exist
        $logDir = __DIR__ . '/logs';
        if (!file_exists($logDir)) {
            mkdir($logDir, 0755, true);
        }
        
        // Append to log file
        file_put_contents(
            $logDir . '/email.log',
            $logMessage,
            FILE_APPEND
        );
    }
}
?>

