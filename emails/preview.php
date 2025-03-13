<?php
// Include data
require_once __DIR__ . '/config.php';

// Make sure the components directory exists
if (!file_exists(__DIR__ . '/components')) {
   mkdir(__DIR__ . '/components', 0755, true);
}

// List of available templates
$templates = [
   'order-confirmed' => 'Order Confirmed',
   'order-shipped' => 'Order Shipped',
   'out-for-delivery' => 'Out For Delivery',
   'order-delivered' => 'Order Delivered',
   'review-request' => 'Review Request'
];

// Get the template to preview from URL parameter only
$template = isset($_GET['template']) && array_key_exists($_GET['template'], $templates) 
    ? $_GET['template'] 
    : 'order-confirmed';

// If this is an AJAX request, just return the template content
if (isset($_GET['ajax']) && $_GET['ajax'] == 'true') {
    include $template . '.php';
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Template Preview</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 300px;
            background-color: #002868;
            color: white;
            position: fixed;
            height: 100vh;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            z-index: 100;
        }
        .sidebar h1 {
            margin: 0;
            font-size: 24px;
            padding: 20px;
        }
        .template-selector {
            padding: 0 10px;
            margin-bottom: 0;
        }
        .template-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .template-link {
            display: block;
            padding: 12px 20px;
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: all 0.2s;
            border-left: 3px solid transparent;
            margin-bottom: 5px;
        }
        .template-link:hover {
            color: white;
            background-color: rgba(255, 255, 255, 0.1);
        }
        .template-link.active {
            color: white;
            border-left-color: white;
            background-color: rgba(255, 255, 255, 0.1);
        }
        .preview-actions {
            margin-top: auto;
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .preview-actions button {
            padding: 12px;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            width: 100%;
        }
        .preview-actions .print {
            background-color: #4CAF50;
        }
        .preview-actions .print:hover {
            background-color: #3e8e41;
        }
        .preview-actions .send {
            background-color: #1e88e5;
        }
        .preview-actions .send:hover {
            background-color: #1565c0;
        }
        .main-content {
            margin-left: 300px;
            padding: 20px;
            flex-grow: 1;
            box-sizing: border-box;
            width: calc(100% - 300px);
        }
        .preview-header {
            background-color: white;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .preview-header h2 {
            margin: 0;
            color: #002868;
        }
        .preview-content {
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            height: calc(100vh - 140px);
            overflow: hidden;
        }
        .preview-frame {
            width: 100%;
            height: 100%;
            border: none;
        }
        .template-info {
            color: #666;
            font-size: 14px;
        }
        .loading {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            font-size: 18px;
            color: #666;
        }
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            .main-content {
                margin-left: 0;
                width: 100%;
            }
            body {
                flex-direction: column;
            }
        }
        .template-link {
            display: block;
            padding: 10px;
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.2s;
        }
        .template-link:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }
        .template-link.active {
            background-color: white;
            color: #002868;
            font-weight: bold;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="sidebar">
        <h1>Email Template Preview</h1>
        
        <div class="template-selector">
            <ul class="template-list">
                <?php foreach ($templates as $key => $name): ?>
                    <li>
                        <a href="?template=<?php echo $key; ?>" 
                           class="template-link <?php echo ($template == $key) ? 'active' : ''; ?>"
                           data-template="<?php echo $key; ?>">
                            <?php echo $name; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        
        <div class="preview-actions">
            <button class="print" onclick="printEmail()">Print Email</button>
            <button class="send" onclick="sendTestEmail()">Send Test Email</button>
        </div>
    </div>
    
    <div class="main-content">
        <div class="preview-header">
            <h2>Previewing: <span id="preview-title"><?php echo $templates[$template]; ?></span></h2>
            <div class="template-info">
                Template: <span id="template-file"><?php echo $template; ?></span>.php
            </div>
        </div>
        
        <div class="preview-content">
            <div id="loading" class="loading">Loading template...</div>
            <iframe id="preview-frame" class="preview-frame" style="display: none;"></iframe>
        </div>
    </div>

    <script>
        // Function to load template content
        function loadTemplate(templateName) {
            const $iframe = $('#preview-frame');
            const $loading = $('#loading');
            const $previewTitle = $('#preview-title');
            const $templateFile = $('#template-file');
            
            // Show loading indicator
            $loading.show();
            $iframe.hide();
            
            // Update UI elements
            $templateFile.text(templateName);
            
            // Find the template title from the link text
            const $activeLink = $(`.template-link[data-template="${templateName}"]`);
            if ($activeLink.length) {
                $previewTitle.text($activeLink.text().trim());
                
                // Update active state on links
                $('.template-link').removeClass('active');
                $activeLink.addClass('active');
            }
            
            // Load template content into iframe
            $iframe.on('load', function() {
                $loading.hide();
                $iframe.show();
            });
            
            $iframe.on('error', function() {
                $loading.html('Error loading template. Please try again.');
                console.error('Failed to load template');
            });
            
            // Load the template with ajax=true parameter to get just the content
            $iframe.attr('src', templateName + '.php?ajax=true');
        }
        
        // Initial load
        $(document).ready(function() {
            // Get template from URL
            const urlParams = new URLSearchParams(window.location.search);
            const template = urlParams.get('template') || 'order-confirmed';
            
            loadTemplate(template);
            
            // Add click event listeners to all template links
            $('.template-link').on('click', function(e) {
                e.preventDefault();
                const templateName = $(this).data('template');
                
                // Update URL with the new template parameter
                const url = new URL(window.location.href);
                url.searchParams.set('template', templateName);
                window.location.href = url.toString();
            });
        });
        
        // Print the email
        function printEmail() {
            const $iframe = $('#preview-frame');
            if ($iframe[0].contentWindow) {
                $iframe[0].contentWindow.print();
            } else {
                alert('Cannot print: iframe not loaded properly');
            }
        }
        
        // Send a test email
        function sendTestEmail() {
            const $activeTemplate = $('.template-link.active');
            if (!$activeTemplate.length) return;
            
            const template = $activeTemplate.data('template');
            const email = prompt('Enter email address to send test to:', 'test@example.com');
            
            if (email) {
                $.ajax({
                    url: 'send-test.php',
                    data: { template: template, email: email },
                    dataType: 'json',
                    success: function(data) {
                        if (data.success) {
                            alert('Email sent successfully to ' + email);
                        } else {
                            alert('Failed to send email: ' + data.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('Error sending email: ' + error);
                    }
                });
            }
        }
    </script>
</body>
</html>

