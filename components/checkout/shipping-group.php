<div class="shipping-group">
    <div class="shipping-group__header">
        <div class="shipping-group__title">
            <h3>Items from <span class="error--text"><?=$shipping_group['group_name']?></span></h3>
        </div>
        <div class="shipping-group__summary shipping-group-summary">
            <div class="shipping-group-summary__images">
                <?php foreach ($shipping_group['items'] as $item) : ?>
                    <picture class="image">
                        <source srcset="<?=base_site_url . '/image/thumbnail-m/' . $item['image'] ?>" media="(max-width: 768px)">
                        <img src="<?=base_site_url . '/image/thumbnail/' . $item['image'] ?>" alt="" height="40" width="40">
                    </picture>
                <?php endforeach; ?>
            </div>

            <p class="shipping-group-summary__text">
                <span><?= shippingSummaryText($shipping_group['items']) ?></span>
            </p>

            <button class="btn shipping-group-summary__toggle">
                View
            </button>
        </div>
    </div>

    <?php $group_list = $shipping_group['items']; include('shipping-group-list.php')?>
</div>