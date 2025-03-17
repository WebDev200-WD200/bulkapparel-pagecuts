<?php
require_once __DIR__ . '/../config.php';

function renderSuggestedItems($suggestedItems, $title = "Suggested Items", $description = "While you wait, check out some customer favourites:", $buttonText = "Explore More") {
  $companyWebsite = getConfig('company.website');
  
  // Check if suggestedItems is an array and not empty
  if (!is_array($suggestedItems) || empty($suggestedItems)) {
      return ''; // Return empty string if no items
  }
  
  $html = '
  <!-- Suggested Items -->
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
          <td style="padding: 0 20px;">
              <div style="font-family: \'Open Sans\', Arial, sans-serif; font-weight: bold; color: #002868; font-size: 18px; margin-bottom: 8px;">' . htmlspecialchars($title) . '</div>
              <div style="font-family: \'Open Sans\', Arial, sans-serif; color: #666666; font-size: 14px; margin-bottom: 20px;">' . htmlspecialchars($description) . '</div>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>';
          
  foreach ($suggestedItems as $item) {
      // Get values with defaults if keys don't exist
      $name = isset($item['name']) ? $item['name'] : 'Product Name';
      $colors = isset($item['colors_available']) ? $item['colors_available'] : 0;
      $price = isset($item['price']) ? $item['price'] : 0.00;
      $image = isset($item['image']) ? $item['image'] : '/placeholder.svg?height=150&width=150';
      $logo = isset($item['logo']) ? $item['logo'] : 'https://www.bulkapparel.com/image/brand/small/35_fm.jpg?v=8302028';
      
      $html .= '
          <td width="33.33%" style="vertical-align: top; border: 1px solid #e5e5e5;">
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                      <td style="padding-bottom: 10px;">
                          <img src="' . htmlspecialchars($image) . '" alt="' . htmlspecialchars($name) . '" style="width: 100%; display: block;" />
                      </td>
                  </tr>
                  <tr>
                      <td style="padding: 0 5px;">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                  <td width="50" style="vertical-align: top;">
                                      <img src="' . htmlspecialchars($logo) . '" alt="Gildan" style="width: 45px; height: auto;" />
                                  </td>
                                  <td style="vertical-align: top; font-family: \'Open Sans\', Arial, sans-serif; font-size: 13px; color: #333333; line-height: 1.3;">
                                      ' . htmlspecialchars($name) . '
                                  </td>
                              </tr>
                          </table>
                      </td>
                  </tr>
                  <tr>
                      <td style="padding: 8px 5px 0 5px;">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                  <td style="font-family: \'Open Sans\', Arial, sans-serif; font-size: 12px; color: #666666;">
                                      Available in <br/> <b>' . htmlspecialchars($colors) . '</b> Colors
                                  </td>

                                   <td style="padding-top: 4px; text-align: right;">
                                      <span style="font-family: \'Open Sans\', Arial, sans-serif; font-size: 12px; color: #666666;">Starting at </span> <br/>
                                      <span style="font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; color: #ff0000; font-weight: bold;">$' . number_format($price, 2) . '</span>
                                  </td>
                              </tr>
                          </table>
                      </td>
                  </tr>
              </table>
          </td>';
  }
          
  $html .= '
                  </tr>
              </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top: 30px;">
                  <tr>
                      <td align="center">
                          <a href="' . htmlspecialchars($companyWebsite) . '" class="button" style="background-color: #002868; color: white; padding: 12px 30px; text-decoration: none; display: inline-block; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; border-radius: 4px;">' . htmlspecialchars($buttonText) . '</a>
                      </td>
                  </tr>
              </table>
          </td>
      </tr>
  </table>';
  
  return $html;
}
?>

