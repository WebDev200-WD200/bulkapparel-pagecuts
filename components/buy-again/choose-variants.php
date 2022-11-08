<?php
$colors_list = $variants['colors'];
$sizes_list = $variants['sizes'];
?>
<div class="choose-variants" data-choose-variants="<?=$id?>" style="display: none;">
    <div class="choose-variants__colors">
        <h3>Choose Colors</h3>

        <div class="choose-colors" data-color-chooser="<?=$id?>">
            <?php $default = $colors_list[0]; ?>
            <div class="choose-colors__default" data-id="<?=$default['id']?>">

                <div class="color-box">
                    <?php foreach ($default['hex'] as $item) : ?>
                        <span style="background: <?= $item ?>;"></span>
                    <?php endforeach ?>
                </div>

                <p class="name"><?= $default['color'] ?></p>

                <svg class="arrow" viewBox="0 0 16 11" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.793031 2.64023L8.39652 10.2437L16 2.64023L14.1161 0.756348L8.39652 6.47595L2.67692 0.756347L0.793031 2.64023Z" />
                </svg>


            </div>
            <ul class="choose-colors__list">
                <?php foreach ($colors_list as $color) : ?>
                    <li data-id="<?= $color['id'] ?>" class="item <?=($default['id'] == $color['id'] ? 'selected' : '') ?>" data-target-color-chooser="<?=$id?>">
                        <div class="color-box">
                            <?php foreach ($color['hex'] as $item) : ?>
                                <span style="background: <?= $item ?>;"></span>
                            <?php endforeach ?>
                        </div>

                        <p class="name"><?= $color['color'] ?></p>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>

    <div class="choose-variants__sizes">
        <h3>Quantity</h3>

        <div class="choose-sizes">

            <ul class="choose-sizes__list">
                <?php foreach ($sizes_list as $size) : ?>
                    <li class="item" data-id="<?= $size["id"] ?>">
                        <p class="size"><?= $size["size"] ?></p>
                        <p class="price"><?= formatToMoney($size["price"]) ?></p>
                        <input class="input numbersOnly" type="number" pattern="\d*" data-qty="156005" data-size="S" validate="true" min="1" data-max="0" max="156005" class="numbersOnly" maxlength="6">
                        <p class="stocks"><?= $size["stocks"] ?></p>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>


    <div class="choose-variants__action">
        <button class="btn hider" data-choose-variants="<?=$id?>">Hide</button>
        <button class="btn add-cart">+ Add to Cart</button>
    </div>
</div>