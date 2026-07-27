<?php
require_once __DIR__ . '/progress-bar.php';

/**
 * Human-readable status label for a shipment stage.
 *
 * @param string $currentStatus
 * @return string
 */
function getShipmentStatusLabel($currentStatus) {
    $labels = [
        'ordered' => 'Ordered',
        'shipped' => 'Shipped',
        'out_for_delivery' => 'On The Way',
        'delivered' => 'Delivered',
        'processing' => 'Processing',
    ];

    return $labels[$currentStatus] ?? 'Shipped';
}

/**
 * @param array $shipment
 * @return bool
 */
function isShipmentTrackable($shipment) {
    if (array_key_exists('is_trackable', $shipment)) {
        return (bool) $shipment['is_trackable'];
    }

    return !empty($shipment['tracking_number']);
}

/**
 * Whether this shipment has carrier details for external tracking.
 *
 * @param array $shipment
 * @return bool
 */
function hasExternalCarrierTracking($shipment) {
    return !empty($shipment['carrier']) && !empty($shipment['tracking_number']);
}

/**
 * Shared grey shipment card wrapper.
 *
 * @param string $innerHtml
 * @return string
 */
function renderShipmentCard($innerHtml) {
    return '
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td style="padding: 0 20px 15px 20px;">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color: #F2F4F7; border: 1px solid #e5e5e5;">
          <tr>
            <td style="padding: 15px;">
              ' . $innerHtml . '
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>';
}

/**
 * Tracking number header row (matches trackable shipments).
 *
 * @param string $trackingNumber
 * @param string $trackingUrl
 * @param bool $linked
 * @return string
 */
function renderShipmentTrackingHeader($trackingNumber, $trackingUrl = '#', $linked = true) {
    $trackingNumber = htmlspecialchars($trackingNumber);
    $trackingUrl = htmlspecialchars($trackingUrl);
    $wrapperStyle = 'margin: 0; font-family: \'Open Sans\', Arial, sans-serif; font-size: 18px; font-weight: bold; line-height: 1.4; text-align: center;';
    $labelStyle = 'color: #000000;';
    $numberLinkStyle = 'color: #002868; text-decoration: underline;';
    $numberMutedStyle = 'color: #666666; text-decoration: underline;';

    $numberHtml = $linked
        ? '<a href="' . $trackingUrl . '" style="' . $numberLinkStyle . '">' . $trackingNumber . '</a>'
        : '<span style="' . $numberMutedStyle . '">' . $trackingNumber . '</span>';

    return '
              <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom: 15px;">
                <tr>
                  <td align="center" style="text-align: center;">
                    <p style="' . $wrapperStyle . '"><span style="' . $labelStyle . '">Tracking Number </span>' . $numberHtml . '</p>
                  </td>
                </tr>
              </table>';
}

/**
 * Inline Track button linking to shipment tracking_url.
 *
 * @param string $trackingUrl
 * @param bool $show
 * @return string
 */
function shouldShowShipmentTrackButton($trackingUrl, $trackingNumber = '') {
    return !empty($trackingNumber) && !empty($trackingUrl) && $trackingUrl !== '#';
}

function renderTrackButtonHtml($trackingUrl, $show = true) {
    if (!$show || empty($trackingUrl) || $trackingUrl === '#') {
        return '';
    }

    $trackingUrl = htmlspecialchars($trackingUrl);

    return '<a href="' . $trackingUrl . '" target="_blank" style="background-color: #002868; color: #ffffff; padding: 10px 28px; text-decoration: none; display: inline-block; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; font-weight: bold; border-radius: 4px;">Track</a>';
}

/**
 * Right column cell with Track button aligned to the bottom.
 *
 * @param string $trackingUrl
 * @param bool $showTrack
 * @return string
 */
function renderShipmentTableTrackColumn($trackingUrl, $showTrack) {
    $trackButton = renderTrackButtonHtml($trackingUrl, $showTrack);

    if (!$trackButton) {
        return '<td width="30%" valign="top" style="padding-left: 10px;">&nbsp;</td>';
    }

    return '
                  <td width="30%" valign="bottom" align="right" style="padding-left: 10px;">
                    ' . $trackButton . '
                  </td>';
}

/**
 * Carrier details table for non-trackable shipments (matches delivery details layout).
 *
 * @param string $carrier
 * @param string $trackingUrl
 * @param bool $showTrack
 * @return string
 */
function renderShipmentCarrierDetails($carrier, $trackingUrl = '', $showTrack = false) {
    $carrier = htmlspecialchars($carrier ?: '—');
    $sectionTitleStyle = 'font-family: \'Open Sans\', Arial, sans-serif; font-weight: bold; color: #002868; font-size: 14px; margin-bottom: 8px; border-bottom: 1px solid #ddd; padding-bottom: 5px;';
    $bodyStyle = 'margin: 0; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; color: #333333;';
    $trackColumn = renderShipmentTableTrackColumn($trackingUrl, $showTrack);

    return '
              <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top: 10px;">
                <tr>
                  <td width="70%" valign="top" style="padding-right: 10px;">
                    <div style="' . $sectionTitleStyle . '">Carrier</div>
                    <p style="' . $bodyStyle . ' font-weight: bold;">' . $carrier . '</p>
                  </td>
                  ' . $trackColumn . '
                </tr>
              </table>';
}

/**
 * Estimated delivery and status row (matches trackable shipments).
 *
 * @param string $estimatedDelivery
 * @param string $statusLabel
 * @return string
 */
function renderShipmentDeliveryDetails($estimatedDelivery, $statusLabel, $trackingUrl = '', $showTrack = false) {
    $estimatedDelivery = htmlspecialchars($estimatedDelivery);
    $statusLabel = htmlspecialchars($statusLabel);
    $sectionTitleStyle = 'font-family: \'Open Sans\', Arial, sans-serif; font-weight: bold; color: #002868; font-size: 14px; margin-bottom: 8px; border-bottom: 1px solid #ddd; padding-bottom: 5px;';
    $bodyStyle = 'margin: 0; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; color: #333333;';
    $trackColumn = renderShipmentTableTrackColumn($trackingUrl, $showTrack);

    return '
              <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top: 10px;">
                <tr>
                  <td width="35%" valign="top" style="padding-right: 10px;">
                    <div style="' . $sectionTitleStyle . '">Estimated Delivery Date</div>
                    <p style="' . $bodyStyle . '">' . $estimatedDelivery . '</p>
                  </td>
                  <td width="35%" valign="top" style="padding-left: 10px; padding-right: 10px;">
                    <div style="' . $sectionTitleStyle . '">Status</div>
                    <p style="' . $bodyStyle . ' font-weight: bold;">' . $statusLabel . '</p>
                  </td>
                  ' . $trackColumn . '
                </tr>
              </table>';
}

/**
 * Renders a shipment box when in-app tracking is unavailable.
 *
 * @param array $shipment
 * @return string
 */
function renderUntrackableShipment($shipment) {
    $textStyle = 'font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; color: #333333; line-height: 1.5;';
    $hasCarrierTracking = hasExternalCarrierTracking($shipment);
    $carrier = $shipment['carrier'] ?? '';

    if ($hasCarrierTracking) {
        $introPrimary = $shipment['message']
            ?? 'This package has left our warehouse and is on its way to you. Updates are not shown in our order tracker for this shipment yet.';
        $introSecondary = $shipment['message_secondary']
            ?? 'You can check delivery progress anytime using the details below.';
    } else {
        $introPrimary = $shipment['message']
            ?? 'This part of your order is still being prepared at our facility.';
        $introSecondary = $shipment['message_secondary']
            ?? 'We will email you again once it ships and tracking details are ready to view.';
    }

    $introPrimary = htmlspecialchars($introPrimary);
    $introSecondary = htmlspecialchars($introSecondary);

    $messageBlock = '
              <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom: 20px;">
                <tr>
                  <td style="' . $textStyle . '">
                    <p style="margin: 0 0 10px 0;">' . $introPrimary . '</p>
                    <p style="margin: 0;">' . $introSecondary . '</p>
                  </td>
                </tr>
              </table>';

    $trackingUrl = $shipment['tracking_url'] ?? '';
    $trackingNumber = $shipment['tracking_number'] ?? '';
    $showTrack = shouldShowShipmentTrackButton($trackingUrl, $trackingNumber);

    $inner = renderShipmentTrackingHeader(
            $hasCarrierTracking ? $trackingNumber : 'Not available yet',
            $trackingUrl ?: '#',
            $hasCarrierTracking
        )
        . $messageBlock
        . renderShipmentCarrierDetails($carrier, $trackingUrl, $showTrack);

    return renderShipmentCard($inner);
}

/**
 * Renders a single shipment tracking box (progress bar + delivery details).
 *
 * @param array $shipment Shipment data
 * @return string
 */
function renderTrackingShipment($shipment) {
    if (!isShipmentTrackable($shipment)) {
        return renderUntrackableShipment($shipment);
    }

    $currentStatus = $shipment['current_status'] ?? 'shipped';
    $trackingNumber = $shipment['tracking_number'] ?? '';
    $trackingUrl = $shipment['tracking_url'] ?? '#';
    $estimatedDelivery = $shipment['estimated_delivery'] ?? '';
    $statusLabel = $shipment['status_label'] ?? getShipmentStatusLabel($currentStatus);

    $progressData = [
        'order' => [
            'order_date_short' => $shipment['order_date_short'] ?? '',
            'shipped_date' => $shipment['shipped_date'] ?? '',
            'out_for_delivery_date' => $shipment['out_for_delivery_date'] ?? '',
            'delivery_date_short' => $shipment['delivery_date_short'] ?? '',
        ],
    ];

    $showTrack = shouldShowShipmentTrackButton($trackingUrl, $trackingNumber);

    $inner = renderShipmentTrackingHeader($trackingNumber, $trackingUrl, true)
        . renderProgressBar($progressData, $currentStatus)
        . renderShipmentDeliveryDetails($estimatedDelivery, $statusLabel, $trackingUrl, $showTrack);

    return renderShipmentCard($inner);
}

/**
 * Renders all shipment tracking boxes for a consolidated order status email.
 *
 * @param array $shipments
 * @return string
 */
function renderTrackingShipments($shipments) {
    if (!is_array($shipments) || empty($shipments)) {
        return '';
    }

    $html = '';
    foreach ($shipments as $shipment) {
        $html .= renderTrackingShipment($shipment);
    }

    return $html;
}
