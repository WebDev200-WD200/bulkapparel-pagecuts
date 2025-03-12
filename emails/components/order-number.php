<?php
function renderOrderNumber($emailData) {
    $order = $emailData['order'];
    
    $html = '
    <!-- Order Number -->
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td class="order-number" style="color: #006400; font-size: 18px; font-weight: bold; padding: 20px;">
          Order #' . $order['number'] . '
        </td>
      </tr>
    </table>';
    
    return $html;
}
?>

