<?php
$order_summary = [
    "subtotal" => [
        "name" => "Subtotal",
        "value" => 269.00,
        "class" => 'subtotal'
    ],
    "brand_code" => [
        "is_discount" => true,
        "name" => "Brand Code",
        "code" => "test10",
        "value" => -14.90,
        "is_removable" => true,
        "class" => 'brand_code'
    ],
    "category_code" => [
        "is_discount" => true,
        "name" => "Category Code",
        "code" => "cat10",
        "value" => -26.92,
        "is_removable" => true,
        "class" => 'category_code'
    ],
    "coupon_code" => [
        "is_discount" => true,
        "name" => "Coupon Code",
        "code" => "XRYTCDSE32",
        "value" => -20.92,
        "is_removable" => true,
        "class" => 'coupon_code'
    ],
    "shipping" => [
        "name" => "Shipping",
        "value" => 0.00,
        "is_free" => true,
        "class" => 'shipping'
    ],
    "gift_certificate" => [
        "is_discount" => true,
        "name" => "Gift Certificate",
        "code" => "QB1JTXT6YWU8",
        "value" => -26.92,
        "is_removable" => true,
        "class" => 'gift_certificate'
    ],
    "total" => [
        "name" => "Total",
        "value" => 177.38,
        "class" => 'total'
    ],
]

?>

<div class="new-cart-section order-summary">
    <div class="new-cart-section__header">
        <h2>Order Summary</h3>
    </div>

    <div class="new-cart-section__content">
        <table class="order-summary__table">
            <?php foreach($order_summary as $item): ?> 
                <tr class="<?=$item['class'];?> <?=isset($item['is_discount']) && $item['is_discount'] ? 'is_discount': '';?>">
                    <td class="text">
                        <p class="title">
                            <span class="name">
                                <?=$item['name']?>
                            </span>

                            <?php if(isset($item['code'])): ?>
                                -  <span class="code"><?= $item['code']?></span>
                            <?php endif ?>

                            <?php if(isset($item['is_free'])): ?>
                                <span class="tag-free">Free</span>
                            <?php endif ?>
                        </p>

                        <?php if(isset($item['is_removable'])): ?>
                            <button class="btn btn-remove">Remove</button>
                        <?php endif ?>
                    </td>
                    <td class="value">
                        <?=SYMBOL. number_format($item['value'], 2, '.', '') ?>
                    </td>
                </tr>
            <?php endforeach ?> 
        </table>

    </div>
</div>
