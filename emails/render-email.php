<?php
/**
 * Render email HTML API
 *
 * Same templates as send-test.php, but returns rendered HTML and accepts data.
 *
 * Query / body params:
 *   template  (required)  Template key, e.g. tracking-email-regular
 *   format    (optional)  html (default) | json
 *   data      (optional)  Email payload. Omit to use template dummy defaults.
 *
 * Ways to pass data:
 *   1. POST JSON: { "template": "...", "data": { ... } }
 *   2. POST JSON with template in query: ?template=...  body = email data object
 *   3. POST form field `data` as a JSON string
 *
 * Examples:
 *   GET  /emails/render-email.php?template=tracking-email-regular
 *   GET  /emails/render-email.php?template=tracking-email-dtf&format=json
 *   POST /emails/render-email.php?template=tracking-email-regular
 *        Content-Type: application/json
 *        {
 *          "customer": { "name": "Kimberely", ... },
 *          "order": { "number": "B123" },
 *          "shipments": [ ... ]
 *        }
 */

error_reporting(E_ALL);
ini_set('display_errors', 0);

require_once __DIR__ . '/EmailService.php';

/**
 * @return array{template:string,data:array,format:string}
 */
function readRenderEmailRequest() {
    $payload = [
        'template' => '',
        'data' => [],
        'format' => 'html',
    ];

    $json = null;
    $raw = file_get_contents('php://input');
    if ($raw !== false && trim($raw) !== '') {
        $decoded = json_decode($raw, true);
        if (is_array($decoded)) {
            $json = $decoded;
        }
    }

    $payload['template'] = (string) (
        $_GET['template']
        ?? $_POST['template']
        ?? ($json['template'] ?? '')
    );

    $payload['format'] = strtolower((string) (
        $_GET['format']
        ?? $_POST['format']
        ?? ($json['format'] ?? 'html')
    ));
    if ($payload['format'] !== 'json') {
        $payload['format'] = 'html';
    }

    if (isset($json['data']) && is_array($json['data'])) {
        $payload['data'] = $json['data'];
    } elseif (isset($json['emailData']) && is_array($json['emailData'])) {
        $payload['data'] = $json['emailData'];
    } elseif (is_array($json)) {
        $reserved = ['template' => true, 'format' => true, 'email' => true, 'data' => true, 'emailData' => true];
        $data = [];
        foreach ($json as $key => $value) {
            if (!isset($reserved[$key])) {
                $data[$key] = $value;
            }
        }

        $looksLikeEmailData = isset($data['customer'])
            || isset($data['order'])
            || isset($data['shipments'])
            || isset($data['items'])
            || isset($data['suggested_items'])
            || isset($data['status']);

        if ($looksLikeEmailData || (!empty($_GET['template']) && !empty($data))) {
            $payload['data'] = $data;
        }
    }

    if (empty($payload['data']) && isset($_POST['data'])) {
        if (is_array($_POST['data'])) {
            $payload['data'] = $_POST['data'];
        } elseif (is_string($_POST['data']) && $_POST['data'] !== '') {
            $decoded = json_decode($_POST['data'], true);
            if (is_array($decoded)) {
                $payload['data'] = $decoded;
            }
        }
    }

    $payload['template'] = trim($payload['template']);
    if (!is_array($payload['data'])) {
        $payload['data'] = [];
    }

    return $payload;
}

/**
 * @param string $message
 * @param int $code
 * @param string $format
 * @param array $extra
 */
function respondRenderEmailError($message, $code = 400, $format = 'html', $extra = []) {
    http_response_code($code);

    if ($format === 'json') {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(array_merge([
            'success' => false,
            'message' => $message,
        ], $extra));
    } else {
        header('Content-Type: text/plain; charset=utf-8');
        echo $message;
    }

    exit;
}

$request = [
    'template' => '',
    'data' => [],
    'format' => 'html',
];

try {
    $request = readRenderEmailRequest();
    $template = $request['template'];
    $data = $request['data'];
    $format = $request['format'];

    $emailService = new EmailService();
    $validTemplates = $emailService->getValidTemplates();

    if ($template === '') {
        respondRenderEmailError(
            'Missing template parameter. Valid templates: ' . implode(', ', $validTemplates),
            400,
            $format,
            ['valid_templates' => $validTemplates]
        );
    }

    if (!in_array($template, $validTemplates, true)) {
        respondRenderEmailError(
            'Invalid template: ' . $template,
            400,
            $format,
            ['valid_templates' => $validTemplates]
        );
    }

    $html = $emailService->render($template, $data);

    if ($format === 'json') {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode([
            'success' => true,
            'template' => $template,
            'html' => $html,
        ]);
        exit;
    }

    header('Content-Type: text/html; charset=utf-8');
    echo $html;
} catch (Exception $e) {
    respondRenderEmailError(
        'Error: ' . $e->getMessage(),
        500,
        $request['format'] ?? 'html'
    );
}
