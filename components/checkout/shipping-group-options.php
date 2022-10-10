<div class="shipping-group__options">
    <div class="row">
        <?php foreach ($shipping_options as $option) :

            $activeClass = $option['selected'] ? 'ship-option-active' : '';
            $checkedAttr = $option['selected'] ? 'checked' : '';

        ?>
            <div class="col-12">
                <div class="ship-option <?= $activeClass ?>">
                    <input type="radio" id="shipping_option_<?= $option['id'] ?>" name="shipping_method" value="<?= $option['id'] ?>" data-amount="<?= $option['amount'] ?>" <?= $checkedAttr ?> data-title="<?= $option['name'] ?>">
                    <label for="shipping_option_{$option['id']}">
                        <div class="ship-option__main">
                            <div class="ship-option__title">
                                <div class="image-container">
                                    <img src="<?= $option['image'] ?>" loading="lazy">
                                </div>
                                <h3><?= $option['name'] ?><span></span>
                                </h3>


                                <button type="button" class="btn ship-option__more">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M13 9h-2V7h2m0 10h-2v-6h2m-1-9A10 10 0 002 12a10 10 0 0010 10 10 10 0 0010-10A10 10 0 0012 2z" />
                                    </svg>
                                </button>
                            </div>
                            <p>
                                <span class="ship-option__amount">
                                    <?= $option['amount'] ?>
                                </span>
                                <span class="ship-option__estimated">
                                    - <?= $option['estimated_delivery'] ?>
                                </span>

                            </p>
                        </div>
                    </label>
                    <!-- New cart and Checkout updates | switch position WL 7/19/2021 -->
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>