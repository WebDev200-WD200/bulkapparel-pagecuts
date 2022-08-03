<div class="cart-shipping">
    <p class="cart-shipping__title text-secondary">
        Pick Shipping Speed
    </p>

    <ul>
        <?php foreach ($shippings as $idx => $shipping) {

            $shippingName = 'shipping-'.$group['id'];
            $shippingId = $shippingName.'-' . $idx;

        ?>
            <li>
                <div class="cart-shipping-item">
                    <div class="cart-shipping-item__toggle">
                        <input type="radio" checked="<?= $shipping['selected'] ?>" name="<?=$shippingName?>" id="<?= $shippingId ?>">

                        <label for="<?= $shippingId ?>"></label>
                    </div>

                    <div class="cart-shipping-item__body">
                        <h4 class="cart-shipping-item__title"><?= $shipping['date'] ?></h4>
                        <p class="cart-shipping-item__description text-secondary">
                            <?= $shipping['description'] ?>
                        </p>
                    </div>
                </div>
            </li>
        <?php } ?>
    </ul>


</div>