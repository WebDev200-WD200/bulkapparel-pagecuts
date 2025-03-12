<?php
require_once __DIR__ . '/../config.php';

function renderHeader($title) {
$companyName = getConfig('company.name');
$companyLogo = getConfig('company.logo');

// Check if companyLogo is an array and extract the URL
if (is_array($companyLogo)) {
    $companyLogo = isset($companyLogo['url']) ? $companyLogo['url'] : '';
}

$html = '
<!-- Header -->
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="header" style="padding: 50px 20px; text-align: left;">
      <img src="' . $companyLogo . '" alt="' . $companyName . '" class="logo" style="width: 180px; height: auto;" />
    </td>
  </tr>
</table>

<!-- Main Title -->
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="main-title" style="color: #002868; font-size: 24px; font-weight: bold; text-align: center; padding: 0 20px 20px 20px; font-family: \'Open Sans\', Arial, sans-serif;">
      ' . $title . '
    </td>
  </tr>
</table>';

return $html;
}
?>

