<?php
require_once __DIR__ . '/../config.php';

function renderThankYou() {
  $companyName = getConfig('company.name');
  $companyWebsite = getConfig('company.website');
  
  $html = '
  <!-- Thank You -->
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td style="padding: 20px; text-align: left;">
        <p style="font-weight: bold; margin: 0;">Thank you for shopping with us!</p>
        <p style="font-weight: bold; margin: 0;"><a href="' . $companyWebsite . '" style="color: #002868; text-decoration: underline;">' . $companyName . '</a> Team</p>
      </td>
    </tr>
  </table>';
  
  return $html;
}
?>

