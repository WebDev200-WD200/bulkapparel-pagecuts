<?php
function renderOrderNumber($emailData) {
    $order = $emailData['order'];
    
    $html = '
    <!-- Order Number -->
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td class="order-number" align="center" style="color: #006400; font-size: 22px; font-weight: bold; padding: 0 20px 20px 20px; text-align: center; font-family: \'Open Sans\', Arial, sans-serif;">
          Order #' . $order['number'] . '
        </td>
      </tr>
    </table>';
    
    return $html;
}
?>

