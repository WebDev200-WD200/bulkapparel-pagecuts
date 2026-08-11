<?php
/**
 * Renders the stock-alert request product row (image + name + color + out-of-stock sizes).
 *
 * @param array $item
 * @return string
 */
function renderStockAlertItem($item) {
    $name = htmlspecialchars($item['name'] ?? 'Product');
    $image = htmlspecialchars($item['image'] ?? '');
    $color = htmlspecialchars($item['color'] ?? '');
    $productUrl = htmlspecialchars($item['product_url'] ?? $item['link'] ?? '#');

    $sizes = $item['sizes'] ?? '';
    if (is_array($sizes)) {
        $sizes = implode(', ', $sizes);
    }
    $sizes = htmlspecialchars((string) $sizes);

    $nameHtml = $productUrl && $productUrl !== '#'
        ? '<a href="' . $productUrl . '" target="_blank" style="display: block; font-family: \'Open Sans\', Arial, sans-serif; font-weight: 600; margin: 0 0 10px 0; font-size: 18px; color: #3e3e3e; text-decoration: none; line-height: 1.3;">' . $name . '</a>'
        : '<span style="display: block; font-family: \'Open Sans\', Arial, sans-serif; font-weight: 600; margin: 0 0 10px 0; font-size: 18px; color: #3e3e3e; line-height: 1.3;">' . $name . '</span>';

    return '
  <!-- Stock alert request item -->
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td style="padding: 0 20px 10px 20px;">
        <div style="font-family: \'Open Sans\', Arial, sans-serif; font-weight: bold; color: #002868; font-size: 18px; margin-bottom: 16px;">Your request details</div>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="130" valign="top" style="width: 130px; padding-right: 15px;">
              <img src="' . $image . '" alt="' . $name . '" width="130" height="150" border="0" style="display: block; width: 130px; max-width: 130px; height: 150px; max-height: 150px; border-radius: 3px; object-fit: cover;">
            </td>
            <td valign="top" style="font-family: \'Open Sans\', Arial, sans-serif;">
              ' . $nameHtml . '
              <div style="display: block; color: #7d7d7d; font-size: 15px; margin-bottom: 4px; line-height: 1.4;">
                <span style="margin-right: 4px;">Color:</span>
                <b style="color: #000000;">' . $color . '</b>
              </div>
              <div style="display: block; color: #7d7d7d; font-size: 15px; margin-bottom: 2px; line-height: 1.4;">
                <span style="margin-right: 4px; color: #ff0000;">Out of stock size:</span>
                <b style="color: #000000;">' . $sizes . '</b>
              </div>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>';
}
?>
