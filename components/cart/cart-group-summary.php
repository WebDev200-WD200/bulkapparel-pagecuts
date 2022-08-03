<?php

$retail_savings_before = $summary['retail_savings']['before'];
$retail_savings_after = $summary['retail_savings']['after'];
$total_items = $summary['total_items'];
$subtotal = $summary['subtotal'];
$shipping_fee = $summary['shipping_fee'];
$sale_discount = $summary['sale_discount'];
$sub_order_total = $summary['sub_order_total'];



?>

<div class="cart-group-summary">
    <table>
        <tr class="retail-savings">
            <td class="title">
                Retail Savings
            </td>
            <td class="value">
                <span class="text-secondary before">(<?= formatToMoney($retail_savings_before); ?>)</span>
                <span class="after">
                    <?= formatToMoney($retail_savings_after); ?>
                </span>
            </td>
        </tr>
        <tr class="subtotal">
            <td class="title">
                Subtotal <span>(<?= $total_items; ?> items)</span>
            </td>
            <td class="value">
                <?= formatToMoney($subtotal); ?>
            </td>
        </tr>
        <tr class="shipping-fee">
            <td class="title">
                Shipping Fee

                <?php if ($shipping_fee <=0) {; ?>
                    <span class="free">Free</span>
                <?php }; ?>
            </td>
            <td class="value">
                <?= formatToMoney($shipping_fee); ?>
            </td>
        </tr>
        <tr class="sale-discount">
            <td class="title">
                Sale Discount
            </td>
            <td class="value">
                <?= formatToMoney($sub_order_total); ?>
            </td>
        </tr>
        <tr class="sub-order-total">
            <td class="title">
                Sub-Order Total
            </td>
            <td class="value">
                <?= formatToMoney($sub_order_total); ?>
            </td>
        </tr>
    </table>
</div>