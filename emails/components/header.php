<?php

function renderHeader($title)
{
  $companyName = getConfig('company.name');
  $companyLogo = getConfig('company.logo');
  $baseUrl = getConfig('base_url');
  // Check if companyLogo is an array and extract the URL
  if (is_array($companyLogo)) {
    $companyLogo = isset($companyLogo['url']) ? $companyLogo['url'] : '';
  }

  $html = '
<table style="border-collapse:collapse;width:100%;">
  <tr>
    <td style="width:100%; text-align:center; padding:30px 0 0 0;">
      <a href="' . $baseUrl . '/" style="display:inline-block; margin:0 auto;">
        <img 
          width="480" 
          height="89" 
          src="' . $companyLogo . '" 
          alt="Bulkapparel Logo"
          style="width:480px; height:89px; max-height:89px; min-height:89px;"
        >
      </a>
    </td>
  </tr>
</table>

<!-- Navigation block -->
<table style="position:relative; z-index:2; border-collapse:collapse;">
  <tr>
    <td style="text-align:center; padding:0 30px 30px 30px;">
      <table style="position:relative; z-index:2; border-collapse:collapse;">
        <tr>
          <td>
            <a href="' . $baseUrl . '" 
               style="color:#000; text-decoration:none; font-size:16px; text-transform:uppercase; padding:0 13.3px; margin:0 auto; white-space:nowrap;">
              Shop
            </a>
          </td>
          <td>
            <a href="' . $baseUrl . '/customer-service" 
               style="color:#000; text-decoration:none; font-size:16px; text-transform:uppercase; padding:0 13.3px; margin:0 auto; white-space:nowrap;">
              FAQ
            </a>
          </td>
          <td>
            <a href="' . $baseUrl . '/tracking" 
               style="color:#000; text-decoration:none; font-size:16px; text-transform:uppercase; padding:0 13.3px; margin:0 auto; white-space:nowrap;">
              Tracking
            </a>
          </td>
          <td>
            <a href="' . $baseUrl . '/returns" 
               style="color:#000; text-decoration:none; font-size:16px; text-transform:uppercase; padding:0 13.3px; margin:0 auto; white-space:nowrap;">
              Returns
            </a>
          </td>
          <td>
            <a href="https://blog.bulkapparel.com/" 
               style="color:#000; text-decoration:none; font-size:16px; text-transform:uppercase; padding:0 13.3px; margin:0 auto; white-space:nowrap;">
              Blogs
            </a>
          </td>
          <td>
            <a href="' . $baseUrl . '/" 
               style="display:inline-block; text-align:right; padding:0 !important; width:100px;">
              <img 
                width="100" 
                height="37" 
                src="https://mcusercontent.com/30a5cd6624e6806da8c4b670e/images/b88583ec-afa4-ddb4-8d39-32528bf8a7e2.png" 
                alt="Bulkapparel Logo" 
                style="width:100px; margin-left:auto;"
              >
            </a>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="main-title" style="color: #002868; font-size: 24px; font-weight: bold; text-align: center; padding: 0 20px 20px 20px; font-family: \'Open Sans\', Arial, sans-serif;">
      ' . $title . '
    </td>
  </tr>
</table>

';

  return $html;
}
