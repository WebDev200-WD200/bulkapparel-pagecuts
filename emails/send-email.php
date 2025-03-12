<?php
// Include data
require_once 'email-data.php';

/**
 * Function to send an email using the specified template
 * 
 * @param string $template The template file to use (without .php extension)
 * @param array $emailData The email data to use
 * @param string $to The recipient email address
 * @param string $subject The email subject
 * @return bool Whether the email was sent successfully
 */
function sendEmail($template, $emailData, $to, $subject) {
    // Update status in email data based on selected template
    if ($template == 'order-confirmed') {
        $emailData['status'] = [
            'ordered' => true,
            'shipped' => false,
            'out_for_delivery' => false,
            'delivered' => false
        ];
    } elseif ($template == 'order-shipped') {
        $emailData['status'] = [
            'ordered' => true,
            'shipped' => true,
            'out_for_delivery' => false,
            'delivered' => false
        ];
    } elseif ($template == 'out-for-delivery') {
        $emailData['status'] = [
            'ordered' => true,
            'shipped' => true,
            'out_for_delivery' => true,
            'delivered' => false
        ];
    } elseif ($template == 'order-delivered' || $template == 'review-request') {
        $emailData['status'] = [
            'ordered' => true,
            'shipped' => true,
            'out_for_delivery' => true,
            'delivered' => true
        ];
    }
    
    // Get the email content by including the template
    ob_start();
    include $template . '.php';
    $emailContent = ob_get_clean();
    
    // Set headers
    $headers = [
        'MIME-Version: 1.0',
        'Content-type: text/html; charset=utf-8',
        'From: ' . $emailData['company']['name'] . ' <noreply@' . str_replace(['http://', 'https://', 'www.'], '', $emailData['company']['website']) . '>',
        'Reply-To: ' . $emailData['company']['name'] . ' <support@' . str_replace(['http://', 'https://', 'www.'], '', $emailData['company']['website']) . '>'
    ];
    
    // Send the email
    return mail($to, $subject, $emailContent, implode("\r\n", $headers));
}

// Example usage:
// sendEmail('order-confirmed', $emailData, $emailData['customer']['email'], 'Your Order is Confirmed!');
// sendEmail('order-shipped', $emailData, $emailData['customer']['email'], 'Your Order Has Been Shipped!');
// sendEmail('out-for-delivery', $emailData, $emailData['customer']['email'], 'Your Order Is Out For Delivery!');
// sendEmail('order-delivered', $emailData, $emailData['customer']['email'], 'Your Order Was Delivered!');
// sendEmail('review-request', $emailData, $emailData['customer']['email'], 'We Value Your Opinion');

// For testing, you can output the email content directly:
// include 'order-confirmed.php';
?>

