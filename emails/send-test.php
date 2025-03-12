<?php
// Include config
require_once 'config.php';

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

// Set email subject based on template
$subjects = [
  'order-confirmed' => 'Your Order is Confirmed!',
  'order-shipped' => 'Your Order Has Been Shipped!',
  'out-for-delivery' => 'Your Order Is Out For Delivery!',
  'order-delivered' => 'Your Order Was Delivered!',
  'review-request' => 'We Value Your Opinion'
];

// Function to send an email using the specified template
function sendEmail($template, $to, $subject) {
  // Get the email content by including the template
  ob_start();
  include $template . '.php';
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
  
  // Send the email
  return mail($to, $subject, $emailContent, implode("\r\n", $headers));
}

// Send the test email
$result = sendEmail($template, $email, $subjects[$template]);

// Return the result
echo json_encode(['success' => $result, 'message' => $result ? 'Email sent successfully' : 'Failed to send email']);
?>

