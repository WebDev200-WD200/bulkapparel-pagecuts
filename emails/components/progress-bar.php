<?php
function renderProgressBar($emailData, $currentStatus) {
   $order = $emailData['order'];
   
   // Determine which progress image to use based on status
   $progressImage = '';
   switch ($currentStatus) {
       case 'ordered':
           $progressImage = '/emails/images/order-confirmed-progress.png';
           break;
       case 'shipped':
           $progressImage = '/emails/images/order-shipped-progress.png';
           break;
       case 'out_for_delivery':
           $progressImage = '/emails/images/out-for-delivery-progress.png';
           break;
       case 'delivered':
           $progressImage = '/emails/images/order-delivered-progress.png';
           break;
       default:
           $progressImage = '/emails/images/order-confirmed-progress.png';    
   }
   
   // Prepare styles for each status based on current status
   $orderedStyle = 'font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; color: #002868; margin-bottom: 2px;' . ($currentStatus == 'ordered' ? ' font-weight: bold;' : '');
   $shippedStyle = 'font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; color: #002868; margin-bottom: 2px;' . ($currentStatus == 'shipped' ? ' font-weight: bold;' : '');
   $onTheWayStyle = 'font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; color: #002868; margin-bottom: 2px;' . ($currentStatus == 'out_for_delivery' ? ' font-weight: bold;' : '');
   $deliveredStyle = 'font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; color: #002868; margin-bottom: 2px;' . ($currentStatus == 'delivered' ? ' font-weight: bold;' : '');
   
   $dateStyle = 'font-family: \'Open Sans\', Arial, sans-serif; font-size: 12px; color: #666666;';
   
   $html = '
   <!-- Progress Bar -->
   <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom: 20px;">
     <tr>
       <td style="padding: 10px 20px;">
         <img src="' . $progressImage . '" alt="Order Progress" style="width: 100%; max-width: 600px; height: auto;" />
       </td>
     </tr>
     <tr>
       <td style="padding: 0 20px;">
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
           <tr>
             <td width="25%" align="center" valign="top" style="padding-top: 5px;">
               <div style="' . $orderedStyle . '">Ordered</div>
               <div style="' . $dateStyle . '">' . $order['order_date_short'] . '</div>
             </td>
             <td width="25%" align="center" valign="top" style="padding-top: 5px;">
               <div style="' . $shippedStyle . '">Shipped</div>';
   
   if ($currentStatus != 'ordered') {
       $html .= '<div style="' . $dateStyle . '">' . $order['shipped_date'] . '</div>';
   }
   
   $html .= '
             </td>
             <td width="25%" align="center" valign="top" style="padding-top: 5px;">
               <div style="' . $onTheWayStyle . '">On The Way</div>';
   
   if ($currentStatus == 'out_for_delivery' || $currentStatus == 'delivered') {
       $html .= '<div style="' . $dateStyle . '">' . $order['out_for_delivery_date'] . '</div>';
   }
   
   $html .= '
             </td>
             <td width="25%" align="center" valign="top" style="padding-top: 5px;">
               <div style="' . $deliveredStyle . '">Delivered</div>';
   
   if ($currentStatus != 'delivered') {
       $html .= '<div style="' . $dateStyle . '">ETA: ' . $order['delivery_date_short'] . '</div>';
   } else {
       $html .= '<div style="' . $dateStyle . '">' . $order['delivery_date_short'] . '</div>';
   }
   
   $html .= '
             </td>
           </tr>
         </table>
       </td>
     </tr>
   </table>';
   
   return $html;
}
?>

