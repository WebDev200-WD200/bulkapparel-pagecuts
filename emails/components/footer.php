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
    $baseUrl = getConfig('base_url');
    
    $html = '
    <!-- Footer -->
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="max-width: 600px; margin: 0 auto;">
        <tr>
            <td class="mail-footer" style="background: linear-gradient(to bottom right, #043169, #1557ab); color: #fff; text-align: center; padding: 30px 20px; width: 100%;">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="max-width: 560px; margin: 0 auto;">
                    <tr>
                        <td>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td class="email-links__container">
                                        <table style="width: 100%; margin: 0 auto;" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td class="email-links__wrapper" style="padding: 0 5px; width: 25%;">
                                                    <a href="' . $trackingUrl . '" class="email-links__link">
                                                        <img src="' . $baseUrl . '/emails/images/track-order-icon.png" alt="Track order" style="width: 100%; max-width: 100px;">
                                                    </a>
                                                </td>
                                                <td class="email-links__wrapper" style="padding: 0 5px; width: 25%;">
                                                    <a href="' . $returnsUrl . '" class="email-links__link">
                                                        <img src="' . $baseUrl . '/emails/images/return-icon.png" alt="Return" style="width: 100%; max-width: 100px;">
                                                    </a>
                                                </td>
                                                <td class="email-links__wrapper" style="padding: 0 5px; width: 25%;">
                                                    <a href="' . $customerServiceUrl . '" class="email-links__link">
                                                        <img src="' . $baseUrl . '/emails/images/contact-icon.png" alt="Contact" style="width: 100%; max-width: 100px;">
                                                    </a>
                                                </td>
                                                <td class="email-links__wrapper" style="padding: 0 5px; width: 25%;">
                                                    <a href="' . $blogUrl . '" class="email-links__link">
                                                        <img src="' . $baseUrl . '/emails/images/blog-icon.png" alt="Blog" style="width: 100%; max-width: 100px;">
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="mail-footer__image" style="width: 100%; padding-top: 20px;">
                            <a href="' . $companyWebsite . '">
                                <img src="' . $baseUrl . '/emails/images/invest-bulk.png" alt="Invest in yourself, buy in bulk" style="width: 100%; max-width: 498px; padding-bottom: 24px; border-bottom: 2px solid #fff !important; background: transparent;">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="mail-footer__header" style="padding: 15px 0 16px 0; font-size: 15px; color: #fff; background: transparent;">
                            <p style="margin: 0; margin-bottom: 10px; color: #fff; background: transparent; text-transform: uppercase;">Follow our social media</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="mail-footer__socials" style="text-align: center;">
                            <table style="width: 280px; margin: 0 auto;" border="0" cellspacing="0" cellpadding="0" align="center">
                                <tr>
                                    <td class="mail-footer__socials-item" style="width: 56px;">
                                        <a href="' . $facebook . '" style="display: block;">
                                            <img src="' . $baseUrl . '/emails/images/facebook-icon.png" alt="Facebook" style="width: 46px; margin-right: 0; margin-left: -5px;">
                                        </a>
                                    </td>
                                    <td class="mail-footer__socials-item" style="width: 56px;">
                                        <a href="' . $instagram . '" style="display: block;">
                                            <img src="' . $baseUrl . '/emails/images/instagram-icon.png" alt="Instagram" style="width: 46px; margin-right: 0; margin-left: -5px;">
                                        </a>
                                    </td>
                                    <td class="mail-footer__socials-item" style="width: 56px;">
                                        <a href="' . $twitter . '" style="display: block;">
                                            <img src="' . $baseUrl . '/emails/images/twitter-icon.png" alt="Twitter" style="width: 46px; margin-right: 0; margin-left: -5px;">
                                        </a>
                                    </td>
                                    <td class="mail-footer__socials-item" style="width: 56px;">
                                        <a href="' . $tiktok . '" style="display: block;">
                                            <img src="' . $baseUrl . '/emails/images/tiktok-icon.png" alt="Tiktok" style="width: 46px; margin-right: 0; margin-left: -5px;">
                                        </a>
                                    </td>
                                    <td class="mail-footer__socials-item" style="width: 56px;">
                                        <a href="' . $youtube . '" style="display: block;">
                                            <img src="' . $baseUrl . '/emails/images/youtube.png" alt="Youtube" style="width: 46px; margin-right: 0; margin-left: -5px;">
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="mail-footer__bottom" style="padding: 15px 20px 0 20px; font-size: 14px;">
                            <p style="margin: 0; line-height: 1.8; color: #fff !important; background: transparent;">' . $companyName . ' ' . $companyAddress . '</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>';
    
    return $html;
}
?>

