<?php

$mobileImage = cardProductImage($product, 'search');
$desktopImage = cardProductImage($product);

?>

<div class="card--product-buy-again">
    <picture class="card--product-buy-again__image">
        <source srcset="<?= $mobileImage['src']; ?> media=" (max-width: 480px)" width="<?= $mobileImage['height']; ?>" height="<?= $mobileImage['height']; ?>">
        <img src="<?= $desktopImage['src']; ?>" loading=" lazy" width="<?= $desktopImage['height']; ?>" height="<?= $desktopImage['height']; ?>">
    </picture>

    
    <div class="card--product-buy-again__info">

        <div class="card--product-buy-again__header">
            <div class="title">
                <?= $product['customTitle'] ?>
            </div>
    
            <div class="short-title">
                <?= $product['brandName'] ?> <?= $product['styleName'] ?>
            </div>
    
            <div class="price">
                <?= formatToMoney($product['pPrice']) ?>
            </div>
        </div>
    
        <div class="card--product-buy-again__middle">
            <div class="colors">
                <?= $product['pTotalColors'] ?> Colors
            </div>
    
            <div class="price">
                <?= formatToMoney($product['pPrice']) ?>
            </div>
        </div>
    
        <div class="card--product-buy-again__footer">
            <div class="bought-count">
                Bought 3 times
            </div>
    
            <button class="btn add-to-cart">

                <?php template('includes/icons.php', [
                    "name" => "add-to-cart"
                ]) ?>

                Add
            </button>
        </div>
    </div>
</div>