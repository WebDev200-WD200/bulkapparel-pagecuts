<?php

$buyAgainItems = json_decode(file_get_contents('data/bestsellers.json'), true);

function cardProductImage($product, $size = "bulk-blank-shirts")
{

    $finalImage = $product['styleImage'];

    if ($product['styleImage'] == "") {
        $finalImage = $product['pModelImage'];
    }

    $sizes = productImageSize($size);
    $src = newProductImagePath($finalImage, $size);

    return [
        "src" => $src,
        "height" => $sizes['height'],
        "width" => $sizes['width'],
    ];
}

?>

<div class="buy-again-section">
    <div class="buy-again-section__header">
        <h3 class="title">Buy It Again!!</h3>

        <a class="see-more-item" href="">
            See More Items

            <?php template('includes/icons.php', [
                "name" => "chevron-left"
            ]) ?>
        </a>
    </div>
    <div class="buy-again-section__list">
        <!-- Slider main container -->
        <div class="swiper buy-again-section-swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <?php foreach ($buyAgainItems as $item) : ?>
                    <div class="swiper-slide">
                        <?php template('components/buy-again-section/card-product-buy-again.php', [
                            "product" => $item
                        ]); ?>
                    </div>
                <?php endforeach ?>
                <!-- Slides -->
            </div>
            <div class="btn buy-again-section-swiper__prev">
                <?php template('includes/icons.php', [
                    "name" => "chevron-left"
                ]) ?>
            </div>
            <div class="btn buy-again-section-swiper__next">
                <?php template('includes/icons.php', [
                    "name" => "chevron-left"
                ]) ?>
            </div>
        </div>
    </div>

</div>

<?php include_once('select-variant-modal.php'); ?>
<?php include_once('buy-again-section-script.php')?>