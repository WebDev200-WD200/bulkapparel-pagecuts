<?php
require_once __DIR__ . '/../config.php';

function renderFooter() {
    $companyName = getConfig('company.name');
    $companyAddress = getConfig('company.address');
    $companyWebsite = getConfig('company.website');
    $trackingUrl = getConfig('company.tracking_url');
    $returnsUrl = getConfig('company.returns_url');
    $customerServiceUrl = getConfig('company.customer_service_url');
    $blogUrl = getConfig('company.blog_url');
    $facebook = getConfig('company.social_media.facebook');
    $instagram = getConfig('company.social_media.instagram');
    $twitter = getConfig('company.social_media.twitter');
    $tiktok = getConfig('company.social_media.tiktok');
    $youtube = getConfig('company.social_media.youtube');
    $baseUrl = rtrim(getConfig('base_url'), '/');

    // DTF banner destinations — no confirmed URLs in the email config/components.
    // Replace these placeholders with the live DTF product page URLs when available.
    $dtfTransferUrl =  $baseUrl .'/dtf-transfers'; // Placeholder: DTF Transfers landing page URL
    $dtfTransferBySizeUrl = $baseUrl .'/dtf-transfers-by-size/dtf-standard'; // Placeholder: Transfers by Size page URL
    $dtfUploadGangSheetUrl = $baseUrl .'/dtf-gang-sheet-uploads/gang-standard'; // Placeholder: Upload a Gang Sheet page URL
    $dtfBuildGangSheetUrl = $baseUrl .'/dtf-gang-sheets'; // Placeholder: Build a Gang Sheet page URL

    $footerImg = $baseUrl . '/emails/images/footer';
    $dtfImg = $baseUrl . '/emails/images/dtf-banner';
    $socialImg = $baseUrl . '/emails/images';

    // Match Figma address layout: company + street, then city/state/zip
    $addressParts = preg_split('/\s+(?=Carlsbad,)/', $companyAddress, 2);
    $addressLine1 = $companyName . (isset($addressParts[0]) ? ' ' . $addressParts[0] : '');
    $addressLine2 = isset($addressParts[1]) ? $addressParts[1] : '';

    $html = '
    <!--[if !mso]><!-->
    <style type="text/css">
      .mail-footer,
      .mail-footer td {
        background-color: #002868 !important;
        color: #ffffff !important;
      }
      @media (prefers-color-scheme: dark) {
        .mail-footer,
        .mail-footer td {
          background-color: #002868 !important;
          color: #ffffff !important;
        }
      }
      [data-ogsc] .mail-footer,
      [data-ogsc] .mail-footer td,
      [data-ogsb] .mail-footer,
      [data-ogsb] .mail-footer td {
        background-color: #002868 !important;
        color: #ffffff !important;
      }
      @media only screen and (max-width: 600px) {
        .email-footer-wrap,
        .email-footer-inner,
        .footer-dtf-table {
          width: 100% !important;
          max-width: 100% !important;
          min-width: 0 !important;
        }
        .footer-dtf-cell {
          display: block !important;
          width: 100% !important;
          max-width: 100% !important;
        }
        .footer-dtf-cell img {
          width: 100% !important;
          max-width: 100% !important;
          height: auto !important;
        }
        .footer-stack-col {
          display: block !important;
          width: 100% !important;
          max-width: 100% !important;
          padding-left: 0 !important;
          padding-right: 0 !important;
        }
        .footer-nav-item {
          display: inline-block !important;
          width: 48% !important;
          max-width: 48% !important;
        }
        .footer-invest-col {
          border-left: 0 !important;
          padding-top: 14px !important;
        }
        .footer-center-mobile {
          text-align: center !important;
        }
        .footer-social-table,
        .footer-address-table {
          margin: 0 auto !important;
          float: none !important;
        }
        .footer-address-pad {
          padding-top: 16px !important;
        }
      }
    </style>
    <!--<![endif]-->

    <!-- Email Footer -->
    <table role="presentation" class="email-footer-wrap" width="100%" border="0" cellspacing="0" cellpadding="0" style="width: 100%; max-width: 600px; min-width: 0; margin: 0 auto;">

        <!-- DTF Banner Section -->
        <tr>
            <td align="center" style="padding: 0; font-size: 0; line-height: 0;">
                <table role="presentation" class="footer-dtf-table" width="100%" border="0" cellspacing="0" cellpadding="0" style="width: 100%; max-width: 600px; min-width: 0;">
                    <tr>
                        <td class="footer-dtf-cell" width="225" valign="top" style="width: 37.5%; max-width: 225px; padding: 0; font-size: 0; line-height: 0;">
                            <a href="' . $dtfTransferUrl . '" target="_blank" style="text-decoration: none; border: 0;">
                                <img src="' . $dtfImg . '/dtf-transfer.jpg" alt="Need Custom Prints? DTF Transfers — No Minimums, Vibrant Colors, Easy to Apply" width="225" border="0" style="display: block; width: 100%; max-width: 100%; height: auto; border: 0; outline: none; text-decoration: none;">
                            </a>
                        </td>
                        <td class="footer-dtf-cell" width="125" valign="top" style="width: 20.833%; max-width: 125px; padding: 0; font-size: 0; line-height: 0;">
                            <a href="' . $dtfTransferBySizeUrl . '" target="_blank" style="text-decoration: none; border: 0;">
                                <img src="' . $dtfImg . '/transfer-by-size.jpg" alt="Transfers by Size — Upload designs in any size" width="125" border="0" style="display: block; width: 100%; max-width: 100%; height: auto; border: 0; outline: none; text-decoration: none;">
                            </a>
                        </td>
                        <td class="footer-dtf-cell" width="125" valign="top" style="width: 20.833%; max-width: 125px; padding: 0; font-size: 0; line-height: 0;">
                            <a href="' . $dtfUploadGangSheetUrl . '" target="_blank" style="text-decoration: none; border: 0;">
                                <img src="' . $dtfImg . '/upload-gang-sheet.jpg" alt="Upload a Gang Sheet — Upload your print-ready sheet" width="125" border="0" style="display: block; width: 100%; max-width: 100%; height: auto; border: 0; outline: none; text-decoration: none;">
                            </a>
                        </td>
                        <td class="footer-dtf-cell" width="125" valign="top" style="width: 20.833%; max-width: 125px; padding: 0; font-size: 0; line-height: 0;">
                            <a href="' . $dtfBuildGangSheetUrl . '" target="_blank" style="text-decoration: none; border: 0;">
                                <img src="' . $dtfImg . '/build-gang-sheet.jpg" alt="Build a Gang Sheet — Arrange designs and save space" width="125" border="0" style="display: block; width: 100%; max-width: 100%; height: auto; border: 0; outline: none; text-decoration: none;">
                            </a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <!-- Main Footer -->
        <tr>
            <td class="mail-footer" bgcolor="#002868" style="background-color: #002868 !important; color: #ffffff !important; padding: 18px 16px 16px 16px; width: 100%;">
                <table role="presentation" class="email-footer-inner" width="100%" border="0" cellspacing="0" cellpadding="0" style="width: 100%; max-width: 568px; min-width: 0; margin: 0 auto;">

                    <!-- Nav links + Invest graphic -->
                    <tr>
                        <td style="padding: 0 0 14px 0;">
                            <table role="presentation" width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td class="footer-stack-col footer-center-mobile" width="48%" valign="middle" style="width: 48%; padding: 0;">
                                        <table role="presentation" width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td class="footer-nav-item" width="25%" align="center" valign="middle" style="width: 25%; padding: 0 0px;">
                                                    <a href="' . $trackingUrl . '" target="_blank" style="text-decoration: none; border: 0;">
                                                        <img src="' . $footerImg . '/track-order.png" alt="Track Order" width="64" border="0" style="display: block; width: 64px; max-width: 100%; height: auto; margin: 0 auto; border: 0; outline: none;">
                                                    </a>
                                                </td>
                                                <td class="footer-nav-item" width="25%" align="center" valign="middle" style="width: 25%; padding: 0 0px;">
                                                    <a href="' . $returnsUrl . '" target="_blank" style="text-decoration: none; border: 0;">
                                                        <img src="' . $footerImg . '/return.png" alt="Return" width="64" border="0" style="display: block; width: 64px; max-width: 100%; height: auto; margin: 0 auto; border: 0; outline: none;">
                                                    </a>
                                                </td>
                                                <td class="footer-nav-item" width="25%" align="center" valign="middle" style="width: 25%; padding: 0 0px;">
                                                    <a href="' . $customerServiceUrl . '" target="_blank" style="text-decoration: none; border: 0;">
                                                        <img src="' . $footerImg . '/contact.png" alt="Contact" width="64" border="0" style="display: block; width: 64px; max-width: 100%; height: auto; margin: 0 auto; border: 0; outline: none;">
                                                    </a>
                                                </td>
                                                <td class="footer-nav-item" width="25%" align="center" valign="middle" style="width: 25%; padding: 0 0px;">
                                                    <a href="' . $blogUrl . '" target="_blank" style="text-decoration: none; border: 0;">
                                                        <img src="' . $footerImg . '/blog.png" alt="Blog" width="64" border="0" style="display: block; width: 64px; max-width: 100%; height: auto; margin: 0 auto; border: 0; outline: none;">
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td class="footer-stack-col footer-center-mobile footer-invest-col" width="52%" valign="middle" style="width: 52%; padding: 0 0 0 14px; border-left: 1px solid #7482A5;">
                                        <a href="' . $companyWebsite . '" target="_blank" style="text-decoration: none; border: 0;">
                                            <img src="' . $footerImg . '/invest-in-yourself-buy-in-bulk.png" alt="Invest in Yourself, Buy in Bulk" width="280" border="0" style="display: block; width: 100%; max-width: 280px; height: auto; border: 0; outline: none; margin: 0 auto;">
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Horizontal divider -->
                    <tr>
                        <td style="padding: 0; font-size: 0; line-height: 0;">
                            <table role="presentation" width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td height="1" bgcolor="#7482A5" style="height: 1px; line-height: 1px; font-size: 0; background-color: #7482A5;">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Social links + Address section -->
                    <tr>
                        <td style="padding: 14px 0 0 0;">
                            <table role="presentation" width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td class="footer-stack-col footer-center-mobile" width="52%" valign="middle" style="width: 52%; padding: 0;">
                                        <table role="presentation" class="footer-social-table" border="0" cellspacing="0" cellpadding="0" align="left">
                                            <tr>
                                                <td valign="middle" style="padding: 0 10px 0 0; font-family: \'Open Sans\', Arial, Helvetica, sans-serif; font-size: 12px; letter-spacing: 0.5px; color: #ffffff; white-space: nowrap; text-transform: uppercase;">
                                                    Follow Us
                                                </td>
                                                <td valign="middle" style="padding: 0 4px;">
                                                    <a href="' . $facebook . '" target="_blank" style="display: block; text-decoration: none; border: 0;">
                                                        <img src="' . $socialImg . '/facebook-icon.png" alt="Facebook" width=32" height=32" border="0" style="display: block; width:32px; height:32px; border: 0; outline: none;">
                                                    </a>
                                                </td>
                                                <td valign="middle" style="padding: 0 4px;">
                                                    <a href="' . $instagram . '" target="_blank" style="display: block; text-decoration: none; border: 0;">
                                                        <img src="' . $socialImg . '/instagram-icon.png" alt="Instagram" width=32" height=32" border="0" style="display: block; width:32px; height:32px; border: 0; outline: none;">
                                                    </a>
                                                </td>
                                                <td valign="middle" style="padding: 0 4px;">
                                                    <a href="' . $twitter . '" target="_blank" style="display: block; text-decoration: none; border: 0;">
                                                        <img src="' . $socialImg . '/twitter-icon.png" alt="Twitter" width=32" height=32" border="0" style="display: block; width:32px; height:32px; border: 0; outline: none;">
                                                    </a>
                                                </td>
                                                <td valign="middle" style="padding: 0 4px;">
                                                    <a href="' . $tiktok . '" target="_blank" style="display: block; text-decoration: none; border: 0;">
                                                        <img src="' . $socialImg . '/tiktok-icon.png" alt="TikTok" width=32" height=32" border="0" style="display: block; width:32px; height:32px; border: 0; outline: none;">
                                                    </a>
                                                </td>
                                                <td valign="middle" style="padding: 0 0 0 4px;">
                                                    <a href="' . $youtube . '" target="_blank" style="display: block; text-decoration: none; border: 0;">
                                                        <img src="' . $socialImg . '/youtube.png" alt="YouTube" width=32" height=32" border="0" style="display: block; width:32px; height:32px; border: 0; outline: none;">
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td class="footer-stack-col footer-center-mobile footer-address-pad" width="48%" valign="middle" align="right" style="width: 48%; padding: 0;">
                                        <table role="presentation" class="footer-address-table" border="0" cellspacing="0" cellpadding="0" align="right">
                                            <tr>
                                                <td valign="top" style="padding: 2px 8px 0 0;">
                                                    <img src="' . $footerImg . '/location.png" alt="" width="28" height="28" border="0" style="display: block; width: 28px; height: 28px; border: 0; outline: none;">
                                                </td>
                                                <td valign="middle" align="left" style="font-family: \'Open Sans\', Arial, Helvetica, sans-serif; font-size: 11px; line-height: 1.45; color: #ffffff; text-align: left;">
                                                    ' . $addressLine1 . '<br>
                                                    ' . $addressLine2 . '
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>';

    return $html;
}
?>
