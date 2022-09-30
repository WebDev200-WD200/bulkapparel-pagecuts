<div class="cart-shipping">
    <p class="cart-shipping__title text-secondary">
        Pick Shipping Speed
    </p>

    <ul>
        <?php foreach ($shippings as $idx => $shipping) {

            $shippingName = 'shipping-' . $group['id'];
            $shippingId = $shippingName . '-' . $idx;

        ?>
            <li>
                <div class="cart-shipping-item">
                    <div class="cart-shipping-item__toggle">
                        <input type="radio" checked="<?= $shipping['selected'] ?>" name="<?= $shippingName ?>" id="<?= $shippingId ?>">

                        <label for="<?= $shippingId ?>"></label>
                    </div>

                    <div class="cart-shipping-item__body">
                        <div class="cart-shipping-item__header">
                            <img src="https://300dev.bulkapparel.com/images/surepost-logo.jpg" alt="" class="cart-shipping-item__image">

                            <h4 class="cart-shipping-item__title">
                                <?= $shipping['date'] ?>
                            </h4>

                            <button type="button" class="btn cart-shipping-item__info">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M13 9h-2V7h2m0 10h-2v-6h2m-1-9A10 10 0 002 12a10 10 0 0010 10 10 10 0 0010-10A10 10 0 0012 2z"></path>
                                </svg>
                            </button>
                        </div>
                        <p class="cart-shipping-item__description text-secondary">
                            <?= $shipping['description'] ?>
                        </p>
                    </div>
                </div>
            </li>
        <?php } ?>
    </ul>


</div>