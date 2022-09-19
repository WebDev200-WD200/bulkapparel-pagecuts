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
        "class" => 'shipping',
        "is_collapsable" => true,
        "breakdown" => [
            [
                "name" => "Group 1",
                "value" => 23.00
            ],
            [
                "name" => "Group 2",
                "value" => 23.00
            ],
            [
                "name" => "Group 3",
                "value" => 23.00
            ]
        ]
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
            <?php foreach ($order_summary as $item) : ?>
                <tr class="<?= $item['class']; ?> <?= isset($item['is_discount']) && $item['is_discount'] ? 'is_discount' : ''; ?>">
                    <td class="text">
                        <p class="title">
                            <span class="name">
                                <?= $item['name'] ?>
                            </span>

                            <?php if (isset($item['code'])) : ?>
                                - <span class="code"><?= $item['code'] ?></span>
                            <?php endif ?>

                            <?php if (isset($item['is_free'])) : ?>
                                <span class="tag-free">Free</span>
                            <?php endif ?>
                        </p>

                        <?php if (isset($item['is_removable'])) : ?>
                            <button class="btn btn-remove">Remove</button>
                        <?php endif ?>
                    </td>
                    <td class="value">
                        <div class="value-wrapper">
                            <span class="value-main">
                                <?= SYMBOL . number_format($item['value'], 2, '.', '') ?>
                            </span>
                            <?php if (isset($item['is_collapsable'])) : ?>
                                <button class="btn btn-collapsable" data-target="<?= $item['class'] ?>">
                                    <svg viewbox="0 0 16 11" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.94.939L8 5.879 3.061.939.94 3.061 8 10.121l7.062-7.06L12.94.939z" fill="#000" />
                                    </svg>
                                </button>
                            <?php endif ?>
                        </div>
                    </td>
                </tr>
                <?php if (isset($item['is_collapsable'])) : ?>
                    <tr>
                        <td colspan="2" class="collapase" data-collapse-id="<?= $item['class'] ?>">
                            <div class="collapase__wrapper">
                                <table class="order-summary__table order-summary__table--small">
                                    
                                    <?php foreach($item['breakdown'] as $item_breakdown): ?>
                                        <tr>
                                            <td class="text">
                                                <p class="title">
                                                    <span class="name">
                                                        <?= $item_breakdown['name'] ?>
                                                    </span>
                                                </p>
                                            </td>
                                            <td class="value">
                                                <div class="value-wrapper">
                                                    <span class="value-main">
                                                        <?= SYMBOL . number_format($item_breakdown['value'], 2, '.', '') ?>
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </table>
                            </div>
                        </td>
                    </tr>
                <?php endif ?>
            <?php endforeach ?>
        </table>

    </div>
</div>


<script>
    $('.btn-collapsable').on('click', function () { 
        var target = $(this).attr('data-target');
        var targetEl = $('.collapase[data-collapse-id="'+target+'"]');
        $(this).toggleClass('open')

        console.log(targetEl)
        targetEl.find('.collapase__wrapper').toggleClass('open');
    })
</script>