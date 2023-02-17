<?php

$desktopImage = cardProductImage($product, 'search');
$desktopImage = cardProductImage($product);
$link = base_url_site . $product['slug'];
?>

<div class="card--product-buy-again">
    <a href="<?=$link?>">
        <picture class="card--product-buy-again__image">
            <source srcset="<?= $desktopImage['src']; ?>" media="(max-width: 600px)" width="<?= $desktopImage['height']; ?>" height="<?= $desktopImage['height']; ?>">
            <img src="<?= $desktopImage['src']; ?>" loading=" lazy" width="<?= $desktopImage['height']; ?>" height="<?= $desktopImage['height']; ?>" width="<?= $desktopImage['height']; ?>" height="<?= $desktopImage['height']; ?>">
        </picture>
    </a>

    
    <div class="card--product-buy-again__info">

        <div class="card--product-buy-again__header">
            <a href="<?=$link?>" class="title">
                <?= $product['customTitle'] ?>
            </a>
    
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
    
            <button class="btn add-to-cart" data-id="<?=$product['styleID']?>">

                <?php template('includes/icons.php', [
                    "name" => "add-to-cart"
                ]) ?>

                Add
            </button>
        </div>
    </div>
</div>