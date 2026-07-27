<?php
/**
 * Renders the order number row.
 *
 * @param array $emailData
 * @param string $align Text alignment: center (default), left, or right
 * @return string
 */
function renderOrderNumber($emailData, $align = 'center') {
    $order = $emailData['order'];
    $align = strtolower((string) $align);
    if (!in_array($align, ['center', 'left', 'right'], true)) {
        $align = 'center';
    }

    $html = '
    <!-- Order Number -->
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td class="order-number" align="' . $align . '" style="color: #006400; font-size: 22px; font-weight: bold; padding: 0 20px 20px 20px; text-align: ' . $align . '; font-family: \'Open Sans\', Arial, sans-serif;">
          Order #' . $order['number'] . '
        </td>
      </tr>
    </table>';

    return $html;
}
?>
