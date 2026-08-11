<?php
// Include data
// $valid_username = 'admin';
// $valid_password = 'W3bd3v200!';

// // Check if the user has sent HTTP Authorization headers
// if (
//     !isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) ||
//     $_SERVER['PHP_AUTH_USER'] !== $valid_username || $_SERVER['PHP_AUTH_PW'] !== $valid_password
// ) {

//     // Send headers to force browser login prompt
//     header('WWW-Authenticate: Basic realm="Restricted Area"');
//     header('HTTP/1.0 401 Unauthorized');
//     echo 'Authentication required.';
//     exit;
// }

// require_once '/var/www/html/includes/functions.php';
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
    'on-the-way' => 'On The Way',
    'order-delivered' => 'Order Delivered',
    'review-request' => 'Review Request',
    'registration-email' => 'Registration Email',
    'stock-alert-signup' => 'Stock Alert Signup',
    'bulk-bucks-redeemed' => 'Bulk Bucks Redeemed',
    'no-tracking-email' => 'No Tracking Info', // Start - Bulkapparel Order emails adjustments - CL - 1282026
    // Start - Gangsheet Integration Feature Updates - LS - 2/3/2026
    'abandon-cart-email' => 'Abandon Cart',
    // Start - Gangsheet Integration Feature Updates - LS - 2/3/2026
     // Start - Gangsheet Integration - Guest Uploaded Designs - LS - 7/14/2026
     'dtf-uploaded-design-access-email' => 'DTF Uploaded Design Access',
     // End - Gangsheet Integration - Guest Uploaded Designs - LS - 7/14/2026
    'order-status' => 'Order Status (Combined)',
    'tracking-email-regular' => 'Tracking Information (Regular Items)',
    'tracking-email-dtf' => 'Tracking Information (DTF)',
];

// Get the template to preview from URL parameter only
$template = isset($_GET['template']) && array_key_exists($_GET['template'], $templates)
    ? $_GET['template']
    : 'bulk-bucks-redeemed';

// If this is an AJAX request, just return the template content
if (isset($_GET['ajax']) && $_GET['ajax'] == 'true') {
    include $template . '.php';
    exit;
}

$adminSettingFields = getConfig('admin_settings.' . $template, []);
if (!is_array($adminSettingFields)) {
    $adminSettingFields = [];
}

$includedAtConfig = getConfig('included_at.' . $template, []);
if (!is_array($includedAtConfig)) {
    $includedAtConfig = [];
}

$templateIncludeLocations = [];
foreach ($includedAtConfig as $path => $line) {
    $path = trim((string) $path);
    $line = trim((string) $line);
    if ($path === '') {
        continue;
    }
    $templateIncludeLocations[] = [
        'path' => $path,
        'line' => $line !== '' ? $line : '—',
    ];
}

// JSON endpoint so the settings drawer can refresh when switching templates
if (isset($_GET['settings_json']) && $_GET['settings_json'] == 'true') {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode([
        'template' => $template,
        'admin_setting_fields' => array_values($adminSettingFields),
        'included_at' => $templateIncludeLocations,
    ]);
    exit;
}

// $adminSettings = adminSettings($adminSettingFields);
$adminSettings = [];
if (!is_array($adminSettings)) {
    $adminSettings = [];
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

        .preview-actions .open-preview-tab {
            background: transparent;
            color: rgba(255, 255, 255, 0.75);
            border: 1px solid rgba(255, 255, 255, 0.35);
            font-weight: normal;
            padding: 8px 12px;
            font-size: 13px;
        }

        .preview-actions .open-preview-tab:hover {
            background: rgba(255, 255, 255, 0.08);
            color: #fff;
            border-color: rgba(255, 255, 255, 0.55);
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
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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

        /* Right drawer: admin settings (default open) */
        .admin-settings-drawer {
            position: fixed;
            top: 0;
            right: 0;
            width: min(440px, 94vw);
            height: 100vh;
            background: #fafbfc;
            box-shadow: -8px 0 28px rgba(0, 0, 0, 0.14);
            z-index: 250;
            display: flex;
            flex-direction: row;
            transition: transform 0.28s ease;
            border-left: 1px solid #d8dee4;
        }

        .admin-settings-drawer.is-closed {
            transform: translateX(calc(100% - 48px));
        }

        /* Left sash stays in the visible strip when collapsed */
        .admin-settings-drawer-sash {
            flex: 0 0 48px;
            background: #001a4a;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 16px 0;
            box-sizing: border-box;
            border-right: 1px solid rgba(255, 255, 255, 0.12);
        }

        .admin-settings-drawer-sash-label {
            writing-mode: vertical-rl;
            transform: rotate(180deg);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.55);
            margin: 0 0 14px;
            user-select: none;
        }

        .admin-settings-drawer-toggle {
            flex-shrink: 0;
            width: 36px;
            min-height: 72px;
            border: none;
            border-radius: 6px;
            background: rgba(255, 255, 255, 0.12);
            color: #fff;
            cursor: pointer;
            font-size: 20px;
            line-height: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.2s;
            margin-top: auto;
            margin-bottom: auto;
        }

        .admin-settings-drawer-toggle:hover {
            background: rgba(255, 255, 255, 0.24);
        }

        .admin-settings-drawer-main {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
        }

        .admin-settings-drawer-header {
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            padding: 14px 16px;
            background: #002868;
            color: #fff;
        }

        .admin-settings-drawer-header h3 {
            margin: 0;
            font-size: 15px;
            font-weight: 700;
        }

        .admin-settings-drawer-body {
            flex: 1;
            overflow: auto;
            padding: 12px 14px 20px;
        }

        .admin-settings-empty {
            margin: 0;
            color: #666;
            font-size: 14px;
        }

        .admin-settings-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
            background: #fff;
            border-radius: 6px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.06);
        }

        .admin-settings-table th,
        .admin-settings-table td {
            border: 1px solid #e8ecf0;
            padding: 8px 10px;
            vertical-align: top;
            text-align: left;
        }

        .admin-settings-table th {
            background: #eef2f7;
            color: #002868;
            font-weight: 700;
        }

        .admin-settings-table .col-key {
            width: 38%;
            word-break: break-word;
        }

        .admin-settings-table .col-key code {
            font-size: 11px;
            color: #1a237e;
        }

        .admin-settings-table .col-val {
            word-break: break-word;
            max-width: 0;
        }

        .admin-settings-val-scroll {
            max-height: 160px;
            overflow: auto;
            white-space: pre-wrap;
            font-family: Consolas, Monaco, 'Courier New', monospace;
            font-size: 11px;
            line-height: 1.45;
            color: #333;
        }

        .admin-settings-badge {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.03em;
        }

        .admin-settings-badge.on {
            background: #e8f5e9;
            color: #1b5e20;
        }

        .admin-settings-badge.off {
            background: #ffebee;
            color: #b71c1c;
        }

        .admin-settings-meta {
            margin: 0 0 12px;
            font-size: 12px;
            color: #555;
        }

        .admin-settings-section {
            margin-top: 22px;
        }

        .admin-settings-section-title {
            margin: 0 0 8px;
            font-size: 13px;
            font-weight: 700;
            color: #002868;
        }

        .admin-settings-table .col-path {
            width: 68%;
            word-break: break-all;
        }

        .admin-settings-table .col-line {
            width: 32%;
            white-space: nowrap;
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
            <button type="button" class="open-preview-tab" id="open-iframe-url" onclick="openPreviewInNewTab()">Open preview at New Tab</button>
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

    <aside id="admin-settings-drawer" class="admin-settings-drawer" role="complementary" aria-label="Admin settings used for this preview">
        <div class="admin-settings-drawer-sash">
            <p class="admin-settings-drawer-sash-label">Settings</p>
            <button type="button" id="admin-settings-drawer-toggle" class="admin-settings-drawer-toggle" aria-expanded="true" title="Hide panel">›</button>
        </div>
        <div class="admin-settings-drawer-main">
        <div class="admin-settings-drawer-header">
            <h3>Admin settings</h3>
        </div>
        <div class="admin-settings-drawer-body">
            <p class="admin-settings-meta">Values loaded from <code>ci_admin_settings</code> for template <strong id="settings-template-name"><?php echo htmlspecialchars($template, ENT_QUOTES, 'UTF-8'); ?></strong>.</p>
            <div id="admin-settings-values-block">
            <?php if (empty($adminSettings)): ?>
                <p class="admin-settings-empty">No admin settings were returned for this template.</p>
            <?php else: ?>
                <table class="admin-settings-table">
                    <thead>
                        <tr>
                            <th class="col-key">Column</th>
                            <th class="col-val">Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($adminSettings as $colKey => $colVal): ?>
                            <?php
                            $colKeyStr = (string) $colKey;
                            $isToggleKey = stripos($colKeyStr, 'toggle') !== false;
                            $valNorm = is_scalar($colVal) ? (string) $colVal : json_encode($colVal);
                            $isBinaryToggle = $isToggleKey && ($valNorm === '0' || $valNorm === '1');
                            ?>
                            <tr>
                                <td class="col-key"><code><?php echo htmlspecialchars($colKeyStr, ENT_QUOTES, 'UTF-8'); ?></code></td>
                                <td class="col-val">
                                    <?php if ($isBinaryToggle): ?>
                                        <span class="admin-settings-badge <?php echo $valNorm === '1' ? 'on' : 'off'; ?>"><?php echo $valNorm === '1' ? 'On' : 'Off'; ?></span>
                                    <?php elseif (is_scalar($colVal)): ?>
                                        <div class="admin-settings-val-scroll"><?php echo htmlspecialchars($valNorm, ENT_QUOTES, 'UTF-8'); ?></div>
                                    <?php else: ?>
                                        <div class="admin-settings-val-scroll"><?php echo htmlspecialchars(json_encode($colVal, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE), ENT_QUOTES, 'UTF-8'); ?></div>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
            </div>

            <div class="admin-settings-section">
                <h4 class="admin-settings-section-title">Include/Called at</h4>
                <p class="admin-settings-meta">From <code>config.php</code> &rarr; <code>included_at.<?php echo htmlspecialchars($template, ENT_QUOTES, 'UTF-8'); ?></code>.</p>
                <div id="included-at-block">
                <?php if (empty($templateIncludeLocations)): ?>
                    <p class="admin-settings-empty">No <code>included_at</code> entries configured for this template.</p>
                <?php else: ?>
                    <table class="admin-settings-table">
                        <thead>
                            <tr>
                                <th class="col-path">Path</th>
                                <th class="col-line">Line</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($templateIncludeLocations as $location): ?>
                                <tr>
                                    <td class="col-path"><code><?php echo htmlspecialchars($location['path'], ENT_QUOTES, 'UTF-8'); ?></code></td>
                                    <td class="col-line"><?php echo htmlspecialchars($location['line'], ENT_QUOTES, 'UTF-8'); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
                </div>
            </div>
        </div>
        </div>
    </aside>

    <script>
        function escapeHtml(value) {
            return String(value)
                .replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;')
                .replace(/'/g, '&#39;');
        }

        function renderIncludedAt(locations) {
            if (!locations || !locations.length) {
                return '<p class="admin-settings-empty">No <code>included_at</code> entries configured for this template.</p>';
            }

            let rows = '';
            locations.forEach(function(location) {
                rows += '<tr>'
                    + '<td class="col-path"><code>' + escapeHtml(location.path) + '</code></td>'
                    + '<td class="col-line">' + escapeHtml(location.line) + '</td>'
                    + '</tr>';
            });

            return ''
                + '<table class="admin-settings-table">'
                + '<thead><tr><th class="col-path">Path</th><th class="col-line">Line</th></tr></thead>'
                + '<tbody>' + rows + '</tbody>'
                + '</table>';
        }

        function refreshSettingsPanel(templateName) {
            return $.ajax({
                url: 'preview.php',
                data: {
                    template: templateName,
                    settings_json: 'true'
                },
                dataType: 'json'
            }).done(function(data) {
                $('#settings-template-name').text(data.template || templateName);
                $('.admin-settings-section .admin-settings-meta').html(
                    'From <code>config.php</code> &rarr; <code>included_at.' + escapeHtml(data.template || templateName) + '</code>.'
                );
                $('#included-at-block').html(renderIncludedAt(data.included_at || []));
            }).fail(function() {
                console.error('Failed to load settings for template:', templateName);
            });
        }

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
            $iframe.off('load.error');
            $iframe.on('load', function() {
                $loading.hide();
                $iframe.show();
            });

            $iframe.on('error', function() {
                $loading.html('Error loading template. Please try again.');
                console.error('Failed to load template');
            });

            // Load the template with ajax=true parameter to get just the content
            const previewUrl = templateName + '.php?ajax=true';
            $iframe.attr('src', previewUrl);
            $('#open-iframe-url').data('preview-url', previewUrl);

            // Keep Include/Called at in sync with selected template
            refreshSettingsPanel(templateName);
        }

        // Admin settings drawer (default open)
        $(document).ready(function() {
            const $drawer = $('#admin-settings-drawer');
            const $toggle = $('#admin-settings-drawer-toggle');

            function setDrawerOpen(open) {
                $drawer.toggleClass('is-closed', !open);
                $toggle.attr('aria-expanded', open ? 'true' : 'false');
                $toggle.attr('title', open ? 'Hide panel' : 'Show panel');
                /* › pushes panel right (hide); ‹ brings it back (show) */
                $toggle.text(open ? '›' : '‹');
            }

            $toggle.on('click', function() {
                setDrawerOpen($drawer.hasClass('is-closed'));
            });

            // Optional: start closed if ?settings=0
            const urlParamsInit = new URLSearchParams(window.location.search);
            if (urlParamsInit.get('settings') === '0') {
                setDrawerOpen(false);
            }
        });

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

                // Update URL without full reload; preview + settings refresh together
                const url = new URL(window.location.href);
                url.searchParams.set('template', templateName);
                window.history.pushState({ template: templateName }, '', url.toString());

                loadTemplate(templateName);
            });

            window.addEventListener('popstate', function() {
                const params = new URLSearchParams(window.location.search);
                loadTemplate(params.get('template') || 'order-confirmed');
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
            const email = prompt('Enter email address to send test to:', 'christian@webdev200.com');

            if (email) {
                $.ajax({
                    url: 'send-test.php',
                    data: {
                        template: template,
                        email: email
                    },
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

        // Open the same URL the preview iframe loads (fallback when iframe fails)
        function openPreviewInNewTab() {
            const $iframe = $('#preview-frame');
            const url = $iframe.attr('src') || $('#open-iframe-url').data('preview-url');

            if (!url) {
                alert('No preview URL loaded yet.');
                return;
            }

            window.open(url, '_blank', 'noopener,noreferrer');
        }
    </script>
</body>

</html>