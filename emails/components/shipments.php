<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/shipment-item-regular.php';
require_once __DIR__ . '/shipment-item-dtf.php';

/**
 * Resolve a product/image URL for email clients.
 *
 * @param string $url
 * @param string $baseUrl
 * @return string
 */
function resolveShipmentImageUrl($url, $baseUrl = '') {
    if ($url === '' || $url === null) {
        return '';
    }

    if (preg_match('#^https?://#i', $url)) {
        return $url;
    }

    $baseUrl = rtrim($baseUrl ?: (string) getConfig('base_url'), '/');
    return $baseUrl . '/' . ltrim($url, '/');
}

/**
 * @param array $item
 * @param string $type
 * @param bool $showDivider
 * @return string
 */
function renderShipmentItemByType($item, $type, $showDivider = true) {
    if (($type === 'dtf')) {
        return renderShipmentItemDtf($item, $showDivider);
    }

    return renderShipmentItemRegular($item, $showDivider);
}

/**
 * Remaining-count badge. Collapsed inline mode shows "View N More" (linked).
 *
 * @param int $remaining
 * @param bool $asInline Whether to render as overlapping inline-block (View More row)
 * @param int $zIndex
 * @param bool $isLast
 * @param string $viewMoreUrl
 * @return string
 */
function renderShipmentRemainingBadge($remaining, $asInline = false, $zIndex = 1, $isLast = true, $viewMoreUrl = '#') {
    if ($remaining <= 0) {
        return '';
    }

    $remaining = (int) $remaining;
    $viewMoreUrl = htmlspecialchars($viewMoreUrl ?: '#');

    if ($asInline) {
        return '
                    <div style="position: relative; display: inline-block; width: auto; height: 40px; overflow: visible; vertical-align: top; z-index: ' . (int) $zIndex . '; margin-left: 4px;">
                      <a href="' . $viewMoreUrl . '" target="_blank" style="display: inline-block; height: 40px; line-height: 40px; padding: 0 12px; border: 1px solid #ECECEC; border-radius: 20px; background-color: #ffffff; font-family: Arial, Helvetica, sans-serif; font-size: 11px; font-weight: bold; color: #001f5b; text-align: center; text-decoration: none; white-space: nowrap;">
                        View ' . $remaining . ' More
                      </a>
                    </div>';
    }

    return '
                <td valign="middle" align="center" style="padding: 0 4px;">
                  <table role="presentation" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td align="center" valign="middle" width="40" height="40" style="width: 40px; height: 40px; border: 1px solid #ECECEC; border-radius: 50%; background-color: #ffffff; font-family: Arial, Helvetica, sans-serif; font-size: 11px; font-weight: bold; color: #001f5b; text-align: center; line-height: 40px;">
                        +' . $remaining . '
                      </td>
                    </tr>
                  </table>
                </td>';
}

/**
 * Overlapping circular thumbnail for the collapsed View More row.
 *
 * @param array $item
 * @param string $type
 * @param int $zIndex
 * @param bool $isLast
 * @return string
 */
function renderShipmentPreviewThumbnail($item, $type = 'regular', $zIndex = 1, $isLast = false) {
    $image = htmlspecialchars($item['image'] ?? '');
    $name = $item['name'] ?? 'Product';
    $size = htmlspecialchars($item['size'] ?? '');
    $wrapperWidth = $isLast ? '40px' : '28px';
    $wrapperHeight = ($type === 'regular' && $size !== '') ? '62px' : '40px';

    $alt = ($type === 'regular' && $size !== '')
        ? htmlspecialchars('Product available in ' . $item['size'])
        : htmlspecialchars($name);

    $sizeLabel = '';
    if ($type === 'regular' && $size !== '') {
        $sizeLabel = '
                        <div style="width: 40px; padding-top: 4px; text-align: center; font-family: Arial, Helvetica, sans-serif; font-size: 11px; line-height: 14px; font-weight: bold; color: #001f5b;">
                          <span style="display: inline-block; padding: 1px 6px; background-color: #ffffff; border: 1px solid #ECECEC; border-radius: 10px;">
                            ' . $size . '
                          </span>
                        </div>';
    }

    return '
                    <div style="position: relative; display: inline-block; width: ' . $wrapperWidth . '; height: ' . $wrapperHeight . '; overflow: visible; vertical-align: top; z-index: ' . (int) $zIndex . ';">
                      <div style="width: 40px;">
                        <img src="' . $image . '" width="40" height="40" alt="' . $alt . '" border="0" style="width: 40px; height: 40px; border: 1px solid #ECECEC; border-radius: 50%; display: block;">
                        ' . $sizeLabel . '
                      </div>
                    </div>';
}

/**
 * Collapsed footer: overlapping preview thumbnails + "View N More" badge.
 *
 * @param array $previewItems
 * @param int $remainingAfterPreview
 * @param string $viewMoreUrl
 * @param string $type
 * @return string
 */
function renderShipmentCollapsedMore($previewItems, $remainingAfterPreview, $viewMoreUrl, $type = 'regular') {
    if (empty($previewItems) && $remainingAfterPreview <= 0) {
        return '';
    }

    $thumbsHtml = '';
    $previewCount = count($previewItems);
    $hasRemainingBadge = $remainingAfterPreview > 0;

    foreach ($previewItems as $index => $item) {
        $isLastThumb = ($index === $previewCount - 1) && !$hasRemainingBadge;
        $thumbsHtml .= renderShipmentPreviewThumbnail($item, $type, $index + 1, $isLastThumb);
    }

    if ($hasRemainingBadge) {
        $thumbsHtml .= renderShipmentRemainingBadge(
            $remainingAfterPreview,
            true,
            $previewCount + 1,
            true,
            $viewMoreUrl
        );
    }

    return '
              <table role="presentation" align="center" border="0" cellspacing="0" cellpadding="0" style="margin: 4px auto 0 auto; border-collapse: collapse;">
                <tr>
                  <td valign="top" align="center" style="padding: 8px 0; font-size: 0; line-height: 0; white-space: nowrap; vertical-align: top;">
                    ' . $thumbsHtml . '
                  </td>
                </tr>
              </table>';
}

/**
 * Expanded footer: remaining +N badge only.
 *
 * @param int $remaining
 * @return string
 */
function renderShipmentExpandedRemaining($remaining) {
    if ($remaining <= 0) {
        return '';
    }

    return '
              <table role="presentation" width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top: 4px;">
                <tr>
                  <td align="left">
                    <table role="presentation" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        ' . renderShipmentRemainingBadge($remaining) . '
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>';
}

/**
 * True when tracking is not ready yet (no tracking number, or status is Pending).
 *
 * @param array $shipment
 * @return bool
 */
function isShipmentAwaitingTracking($shipment) {
    $status = strtolower(trim((string) ($shipment['status'] ?? $shipment['status_label'] ?? '')));
    if ($status === 'pending') {
        return true;
    }

    return trim((string) ($shipment['tracking_number'] ?? '')) === '';
}

/**
 * Placeholder shown when a shipment has no tracking / is Pending (no products).
 *
 * @param array $shipment
 * @param array $config
 * @return string
 */
function renderShipmentAwaitingTrackingPlaceholder($shipment = [], $config = []) {
    $message = $shipment['pending_message']
        ?? $config['pending_tracking_message']
        ?? 'Tracking will be available soon';

    return '
              <table role="presentation" width="100%" border="0" cellspacing="0" cellpadding="0" style="margin: 8px 0 12px 0;">
                <tr>
                  <td align="center" style="padding: 24px 12px; font-family: \'Open Sans\', Arial, Helvetica, sans-serif; font-size: 14px; color: #666666; line-height: 1.5; text-align: center;">
                    ' . htmlspecialchars($message) . '
                  </td>
                </tr>
              </table>';
}

/**
 * Shipment card header: title, item count, optional type label, tracking link.
 *
 * @param array $shipment
 * @param int $totalItems
 * @param string $type
 * @param bool $awaitingTracking
 * @return string
 */
function renderShipmentSectionHeader($shipment, $totalItems, $type = 'regular', $awaitingTracking = false) {
    $number = (int) ($shipment['number'] ?? 1);
    $trackingNumber = htmlspecialchars($shipment['tracking_number'] ?? '');
    $trackingUrl = htmlspecialchars($shipment['tracking_url'] ?? '#');
    $typeLabel = $shipment['type_label'] ?? ($type === 'dtf' ? 'DTF' : '');

    if ($awaitingTracking) {
        $metaHtml = $typeLabel !== '' ? htmlspecialchars($typeLabel) : '';
    } else {
        $itemLabel = $totalItems === 1 ? '1 Item' : $totalItems . ' Items';
        $metaHtml = htmlspecialchars($itemLabel);
        if ($typeLabel !== '') {
            $metaHtml .= ' <span style="color: #000000;">&middot;</span> ' . htmlspecialchars($typeLabel);
        }
    }

    $trackingHtml = '';
    if (!$awaitingTracking && $trackingNumber !== '') {
        $trackingHtml = '
                <td align="right" valign="top" style="font-family: \'Open Sans\', Arial, Helvetica, sans-serif; white-space: nowrap;">
                  <a href="' . $trackingUrl . '" target="_blank" style="font-size: 16px; font-weight: bold; color: #002868; text-decoration: none;">
                    ' . $trackingNumber . ' <span style="font-size: 14px;">&#8250;</span>
                  </a>
                </td>';
    }

    $metaRow = $metaHtml !== ''
        ? '<div style="font-size: 12px; color: #44414f; line-height: 1.3;">' . $metaHtml . '</div>'
        : '';

    return '
              <table role="presentation" width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom: 15px;">
                <tr>
                  <td valign="top" style="font-family: \'Open Sans\', Arial, Helvetica, sans-serif;">
                    <div style="font-size: 18px; font-weight: bold; color: #282828; line-height: 1.3; margin: 0 0 4px 0;">Shipment #' . $number . '</div>
                    ' . $metaRow . '
                  </td>
                  ' . $trackingHtml . '
                </tr>
              </table>';
}

/**
 * Render one shipment card (header + items + collapsed/expanded footer).
 *
 * @param array $shipment
 * @param string $type
 * @param array $config
 * @param string $viewMoreUrl
 * @return string
 */
function renderShipmentSection($shipment, $type, $config, $viewMoreUrl) {
    $awaitingTracking = isShipmentAwaitingTracking($shipment);
    $items = (!$awaitingTracking && isset($shipment['items']) && is_array($shipment['items']))
        ? $shipment['items']
        : [];
    $totalItems = count($items);

    if ($awaitingTracking) {
        return '
  <table role="presentation" width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom: 24px;">
    <tr>
      <td style="padding: 0 20px;">
        <table role="presentation" width="100%" border="0" cellspacing="0" cellpadding="0" style="border: 1px solid #ececec;">
          <tr>
            <td style="padding: 12px 15px 6px 15px;">
              ' . renderShipmentSectionHeader($shipment, $totalItems, $type, true) . '
              ' . renderShipmentAwaitingTrackingPlaceholder($shipment, $config) . '
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>';
    }

    $expanded = !empty($config['expanded']);
    $initialVisible = max(0, (int) ($config['initial_visible_items'] ?? 4));
    $thumbnailPreview = max(0, (int) ($config['thumbnail_preview_items'] ?? 10));

    $visibleCount = $expanded ? $totalItems : $initialVisible;
    $visibleCount = min($visibleCount, $totalItems);
    $visibleItems = array_slice($items, 0, $visibleCount);
    $hiddenItems = array_slice($items, $visibleCount);
    $hiddenCount = count($hiddenItems);

    $itemsHtml = '';
    $visibleTotal = count($visibleItems);
    foreach ($visibleItems as $index => $item) {
        $isLastVisible = ($index === $visibleTotal - 1);
        $itemsHtml .= renderShipmentItemByType($item, $type, !$isLastVisible);
    }

    $footerHtml = '';
    if (!$expanded && $hiddenCount > 0) {
        $previewItems = array_slice($hiddenItems, 0, $thumbnailPreview);
        $remainingAfterPreview = max(0, $hiddenCount - count($previewItems));
        $footerHtml = renderShipmentCollapsedMore($previewItems, $remainingAfterPreview, $viewMoreUrl, $type);
    }

    return '
  <table role="presentation" width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom: 24px;">
    <tr>
      <td style="padding: 0 20px;">
        <table role="presentation" width="100%" border="0" cellspacing="0" cellpadding="0" style="border: 1px solid #ececec;">
          <tr>
            <td style="padding: 12px 15px 6px 15px;">
              ' . renderShipmentSectionHeader($shipment, $totalItems, $type, false) . '
              ' . $itemsHtml . '
              ' . $footerHtml . '
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>';
}

/**
 * Render one or more shipment sections for regular or DTF emails.
 *
 * Options:
 * - type: 'regular' | 'dtf'
 * - shipments: list of shipment arrays (preferred)
 * - items: convenience single-shipment items array
 * - config: display limits / expanded flag
 * - view_more_url: destination for the View More link
 *
 * @param array $options
 * @return string
 */
function renderShipments($options = []) {
    $type = ($options['type'] ?? 'regular') === 'dtf' ? 'dtf' : 'regular';
    $config = isset($options['config']) && is_array($options['config']) ? $options['config'] : [];
    $viewMoreUrl = $options['view_more_url'] ?? '#';

    $shipments = [];
    if (!empty($options['shipments']) && is_array($options['shipments'])) {
        $shipments = $options['shipments'];
    } elseif (!empty($options['items']) && is_array($options['items'])) {
        $shipments[] = [
            'number' => $options['number'] ?? 1,
            'tracking_number' => $options['tracking_number'] ?? '',
            'tracking_url' => $options['tracking_url'] ?? '#',
            'type_label' => $options['type_label'] ?? ($type === 'dtf' ? 'DTF' : ''),
            'items' => $options['items'],
        ];
    }

    if (empty($shipments)) {
        return '';
    }

    $baseUrl = rtrim((string) getConfig('base_url'), '/');
    $html = '<!-- Shipments -->';

    foreach ($shipments as $index => $shipment) {
        if (empty($shipment['number'])) {
            $shipment['number'] = $index + 1;
        }

        if (!empty($shipment['items']) && is_array($shipment['items'])) {
            foreach ($shipment['items'] as $itemIndex => $item) {
                if (!empty($item['image'])) {
                    $shipment['items'][$itemIndex]['image'] = resolveShipmentImageUrl($item['image'], $baseUrl);
                }
            }
        }

        $html .= renderShipmentSection($shipment, $type, $config, $viewMoreUrl);
    }

    return $html;
}
?>
