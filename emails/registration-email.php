<?php
/**
 * Registration Email (Welcome Email)
 *
 * Migrated from welcome_email_template.php / do_signup.php
 * Subject: Thank you for joining BulkApparel.com
 */
require_once __DIR__ . '/components/header.php';
require_once __DIR__ . '/components/footer.php';
require_once __DIR__ . '/components/document-start.php';
require_once __DIR__ . '/config.php';

$defaultData = [
  'email' => [
    'preview_text' => 'Thank you for joining BulkApparel.com — exclusive discounts, trending styles, and more await.',
  ],
  'customer' => [
    'email' => 'customer@example.com',
  ],
];

$emailData = isset($emailData) ? $emailData : $defaultData;

$companyWebsite = rtrim(getConfig('company.website'), '/');
// Welcome creative assets still live on production CDN paths

$previewText = !empty($emailData['email']['preview_text'])
  ? $emailData['email']['preview_text']
  : 'Thank you for joining BulkApparel.com — exclusive discounts, trending styles, and more await.';

$emailContent = renderDocumentStart('Thank You For Joining', $previewText);

// Logo + nav only — title is rendered below the welcome hero
$emailContent .= renderHeader('Thank You For Joining', [
  'showTitle' => false,
]);

$emailContent .= '
  <!-- Welcome hero -->
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="center" style="padding: 0; font-size: 0; line-height: 0;">
        <a href="' . $companyWebsite . '" style="display: block; text-decoration: none;">
          <img src="/images/email/welcome/welcome_gif.gif" width="600" height="300" alt="Welcome" style="display: block; width: 100%; max-width: 600px; height: auto; border: 0;">
        </a>
      </td>
    </tr>
  </table>

  <!-- Thank you heading -->
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="center" style="padding: 20px 20px 24px 20px;">
        <h2 style="margin: 0; padding: 0; line-height: 1.2; font-family: Arial, Helvetica, sans-serif; text-transform: uppercase; font-weight: bold; font-size: 30px; color: #013068;">
          Thank You For Joining
        </h2>
      </td>
    </tr>
  </table>

  <!-- Benefits + volume discounts -->
  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
    <tr>
      <td width="50%" valign="top" style="width: 50%; padding: 0; font-size: 0; line-height: 0;">
        <a href="' . $companyWebsite . '/fleece/bella-canvas-3729-unisex-sponge-fleece-pullover-sweatshirt" style="display: block; text-decoration: none;">
          <img src="/discount_1.jpg" width="300" height="215" alt="We are happy to call you one of BulkApparel\'s Best" style="display: block; width: 100%; max-width: 300px; height: auto; border: 0;">
        </a>
      </td>
      <td width="50%" valign="middle" align="center" style="width: 50%; background-color: #04316A; color: #ffffff; font-size: 14px; padding: 5px; font-family: \'Open Sans\', Arial, sans-serif;">
        <div style="border: 4px solid #ffffff; padding: 15px 10px; box-sizing: border-box;">
          <h4 style="margin: 0 0 6px 0; padding: 0; font-size: 14px; font-weight: bold; color: #ffffff;">We are happy to call you one of BulkApparel\'s best!</h4>
          <p style="margin: 0; padding: 0; font-size: 13px; color: #ffffff;">By signing up for an account you now have access to...</p>
          <div style="margin-top: 10px; font-size: 12px; font-weight: 600; text-transform: uppercase; color: #ffffff;">
            <p style="margin: 0; padding: 0;">*EXCLUSIVE DISCOUNTS</p>
            <p style="margin: 0; padding: 0;">*TRENDING STYLES</p>
            <p style="margin: 0; padding: 0;">*FASHION TIPS</p>
            <p style="margin: 0; padding: 0;">*DIY GUIDES</p>
          </div>
        </div>
      </td>
    </tr>
    <tr>
      <td width="50%" valign="middle" align="center" style="width: 50%; background-color: #343434; color: #ffffff; font-size: 14px; padding: 10px; font-family: \'Open Sans\', Arial, sans-serif;">
        <div style="border: 4px solid #ffffff; padding: 15px 10px; box-sizing: border-box;">
          <h2 style="margin: 0; padding: 0; font-size: 22px; font-weight: bold; color: #ffffff;">Volume Discounts</h2>
          <p style="margin: 0; padding: 0; font-size: 13px; color: #ffffff;">Starting From</p>
          <div style="margin-top: 10px; font-size: 12px; color: #ffffff;">
            <p style="margin: 0; padding: 0;">Save 5% over $250</p>
            <p style="margin: 0; padding: 0;">Save 7% over $500</p>
            <p style="margin: 0; padding: 0;">Save 10% over $1,000</p>
            <p style="margin: 0; padding: 0;">Save 12% over $2,500</p>
            <p style="margin: 0; padding: 0;">Save 14% over $5,000</p>
          </div>
        </div>
      </td>
      <td width="50%" valign="top" style="width: 50%; padding: 0; font-size: 0; line-height: 0;">
        <a href="' . $companyWebsite . '/tshirts/bella-canvas-3001-t-shirt-unisex-short-sleeve" style="display: block; text-decoration: none;">
          <img src="/discount_2.jpg" width="300" height="215" alt="Volume Discounts" style="display: block; width: 100%; max-width: 300px; height: auto; border: 0;">
        </a>
      </td>
    </tr>
  </table>

  <!-- Shop now CTA -->
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="center" style="padding: 20px 0 0 0;">
        <a href="' . $companyWebsite . '" style="display: inline-block; text-decoration: none;">
          <img src="/Shop_Now.jpg" width="270" height="90" alt="Shop Now" style="display: block; width: 270px; max-width: 100%; height: auto; border: 0;">
        </a>
      </td>
    </tr>
    <tr>
      <td align="center" style="padding: 0; font-size: 0; line-height: 0;">
        <a href="' . $companyWebsite . '" style="display: block; text-decoration: none;">
          <img src="/Welcome_Email_2.jpg" width="600" height="849" alt="Shop Now" style="display: block; width: 100%; max-width: 600px; height: auto; border: 0;">
        </a>
      </td>
    </tr>
  </table>
';

$emailContent .= renderFooter();
$emailContent .= renderDocumentEnd();

echo $emailContent;
