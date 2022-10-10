<div class="shipping-group-item">
    <a class="shipping-group-item__image" href="<?= $props['to'] ?>">
        <picture>
            <source srcset="<?= base_site_url . '/image/thumbnail-m/' . $props['image'] ?>" media="(max-width: 768px)">
            <img src="<?= base_site_url . '/image/thumbnail/' . $props['image'] ?>" alt="" height="50" width="40">
        </picture>
    </a>

    <div class="shipping-group-item__info">
        <div class="shipping-group-item__product">
            <a class="shipping-group-item__title" href="">
                <?= $props['name'] ?>
            </a>
        </div>

        <div class="shipping-group-item__summary">
            <div class="shipping-group-item__summary-info">
                <p class="color">
                    <span class="name">Color:</span>
                    <span class="value"><?= $props['color'] ?></span>
                </p>
                <p class="size">
                    <span class="name">Size:</span>
                    <span class="value"><?= $props['size'] ?></span>
                </p>
            </div>

            <div class="shipping-group-item__summary-item">
                <p class="price">
                    <span class="name">Price</span>
                    <span class="value">$<?= $props['price'] ?></span>
                </p>
                <p class="quantity">
                    <span class="name">Quantity</span>
                    <span class="value"><?= $props['quantity'] ?></span>
                </p>
                <p class="total">
                    <span class="name">Total</span>
                    <span class="value">$<?= $props['total'] ?></span>
                </p>
            </div>
        </div>
    </div>

</div>