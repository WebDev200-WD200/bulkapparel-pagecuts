<?php
/**
 * Renders the shipping address block for order status emails.
 *
 * @param array $customer Customer data with full_name, address, city, state, zip, phone, email
 * @return string
 */
function renderShippingAddress($customer) {
    $fullName = htmlspecialchars($customer['full_name'] ?? '');
    $address = htmlspecialchars($customer['address'] ?? '');
    $city = htmlspecialchars($customer['city'] ?? '');
    $state = htmlspecialchars($customer['state'] ?? '');
    $zip = htmlspecialchars($customer['zip'] ?? '');
    $phone = htmlspecialchars($customer['phone'] ?? '');
    $email = htmlspecialchars($customer['email'] ?? '');

    return '
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td style="padding: 0 20px 20px 20px;">
        <div class="section-title" style="font-weight: bold; color: #002868; margin-bottom: 10px; border-bottom: 1px solid #eee; padding-bottom: 5px; font-family: \'Open Sans\', Arial, sans-serif;">Shipping Address</div>
        <p style="margin: 0; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; color: #333333; line-height: 1.6;">
          <strong>' . $fullName . '</strong><br />
          ' . $address . '<br />
          ' . $city . ', ' . $state . ', ' . $zip . '<br />
          ' . $phone . '<br />
          <a href="mailto:' . $email . '" style="color: #002868; text-decoration: underline;">' . $email . '</a>
        </p>
      </td>
    </tr>
  </table>';
}
