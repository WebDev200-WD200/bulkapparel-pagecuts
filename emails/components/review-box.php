<?php
require_once __DIR__ . '/../config.php';

function renderReviewBox($buttonText = "Start Your Review", $title = "Leave A Review And Earn Points!", $content = "", $pointsText = "+20 POINTS PER REVIEW") {
  $pointsPerReview = getConfig('rewards.points_per_review');
  $companyWebsite = getConfig('company.website');
  $baseUrl = getConfig('base_url');
  
  // Default content if none provided
  if (empty($content)) {
    $content = 'Enjoying your recent purchase? Visit the item page and share your thoughts by leaving a review. Whether it\'s good or bad, we value your honest feedback and won\'t judge. Plus, you\'ll earn ' . $pointsPerReview . ' points just for sharing! Redeem your points anytime for website credit.';
  }
  
  $html = '
  <!-- Review Box -->
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>
        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color: #d4e3fe;">
          <tr>
            <td style="text-align: center; padding: 40px 20px;">
              <img src="' . $baseUrl . '/emails/images/review-icon.png" alt="Review Stars" style="width: 100px; height: auto;" />
              <h2 style="margin: 0 0 15px 0; color: #002868; font-size: 24px; font-family: \'Open Sans\', Arial, sans-serif; font-weight: 700;">' . $title . '</h2>
              <p style="margin: 0 auto 20px auto; color: #333333; font-size: 14px; line-height: 1.6; font-family: \'Open Sans\', Arial, sans-serif; max-width: 500px;">' . $content . '</p>
              <div style="margin: 0 0 25px 0; color: #7cb342; font-size: 20px; font-weight: bold; font-family: \'Open Sans\', Arial, sans-serif;">' . $pointsText . '</div>
              <a href="' . $companyWebsite . '/reviews" class="button" style="background-color: #002868; color: white; padding: 15px 40px; text-decoration: none; display: inline-block; font-family: \'Open Sans\', Arial, sans-serif; font-size: 16px;">' . $buttonText . '</a>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>';
  
  return $html;
}
?>

