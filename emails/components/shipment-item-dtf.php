<?php
/**
 * Renders a single DTF transfer shipment line item.
 *
 * @param array $item
 * @param bool $showDivider
 * @return string
 */
function renderShipmentItemDtf($item, $showDivider = true) {
    $name = htmlspecialchars($item['name'] ?? 'DTF Transfers by Size');
    $image = htmlspecialchars($item['image'] ?? '');
    $quantity = htmlspecialchars((string) ($item['quantity'] ?? 1));
    $transferSize = htmlspecialchars($item['transfer_size'] ?? ($item['transfer'] ?? ''));
    $variant = htmlspecialchars($item['variant'] ?? 'Standard');
    $productUrl = htmlspecialchars($item['product_url'] ?? '#');

    $nameHtml = $productUrl && $productUrl !== '#'
        ? '<a href="' . $productUrl . '" target="_blank" style="color: #000000; text-decoration: none; font-weight: bold;">' . $name . '</a>'
        : '<span style="color: #000000; font-weight: bold;">' . $name . '</span>';

    $borderStyle = $showDivider
        ? 'border-bottom: 1px solid #ececec; padding: 0 0 12px 0;'
        : 'padding: 0;';

    return '
              <table role="presentation" width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom: 12px;">
                <tr>
                  <td style="' . $borderStyle . '">
                    <table role="presentation" width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="42" valign="middle" style="width: 42px; padding-right: 10px;">
                          <img src="' . $image . '" alt="' . $name . '" width="32" height="40" border="0" style="display: block; width: 32px; height: 40px; border: 1px solid #ECECEC; object-fit: cover;">
                        </td>
                        <td valign="middle" style="font-family: \'Open Sans\', Arial, Helvetica, sans-serif;">
                          <div style="font-size: 16px; line-height: 1.3; margin: 0 0 2px 0;">' . $nameHtml . '</div>
                          <div style="font-size: 11px; line-height: 1.4; color: #303030;">
                            <span style="white-space: nowrap;">Quantity: <strong>' . $quantity . '</strong></span>
                            &nbsp;&nbsp;&nbsp;
                            <span style="white-space: nowrap;">Transfer: <strong>' . $transferSize . '</strong></span>
                            &nbsp;&nbsp;&nbsp;
                            <span style="white-space: nowrap;">Variant: <strong>' . $variant . '</strong></span>
                          </div>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>';
}
?>
