<?php $viewMoreTemplate = isset($viewMore) ? "data-view-more='$id' style='display:none;'" : "" ?>

<li class="ordered-variant" data-gtin="<?= $data['id'] ?>" <?= $viewMoreTemplate ?>>
    <div class="ordered-variant__info">
        <div class="color-box">
            <?php foreach ($data['hex'] as $color) : ?>
                <span style="background-color: <?= $color ?>"></span>
            <?php endforeach ?>
        </div>

        <p class="text">
            <span class="name"><?= $data['color'] ?> Antique Red </span>
            <span class="hypen">-</span>
            <span class="size"><?= $data['size'] ?></span>

            <span class="added-to-cart" title="Added 3">
                (<span class="added">Added</span> <span>3</span>)
            </span>
        </p>

    </div>

    <div class="ordered-variant__action">
        <p class="price"><?= formatToMoney($data['price']); ?></p>

        <div class="bond">
            <button class="btn buy-again-btn" data-target-buy-again="<?= $data['id'] ?>">
                + Add
            </button>

            <p class="buy-again-added">
                QTY: <span class="quantity">3</span> ✓
            </p>

            <div class="buy-again-quantity" style="display:none;" data-buy-again="<?= $data['id'] ?>">
                <div class="row no-gutters">
                    <div class="col-12 product-name">
                        G500 Gildan
                    </div>
                    <div class="col-12 product-info">
                        <div class="color-box">
                            <?php foreach ($data['hex'] as $color) : ?>
                                <span style="background-color: <?= $color ?>"></span>
                            <?php endforeach ?>
                        </div>
                        <p> <span class="name"><?= $data['color'] ?> Red Blue Pink </span>
                            <span class="hypen">-</span>
                            <span class="size"><?= $data['size'] ?></span>
                        </p>
                    </div>

                    <div class="d-flex col-3">
                        <p class="buy-again-quantity__label">Qty</p>
                    </div>
                    <div class="buy-again-quantity__input col-9">
                        <?php template('components/quantity-editor.php', [
                            "data" => [
                                "sku" => "",
                                "gtin" => $data['id'],
                                "qty" => 0,
                            ]
                        ]) ?>
                    </div>

                    <div class="col-3">
                    </div>
                    <div class="col-9">
                        <button class="btn buy-again-quantity__button">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>