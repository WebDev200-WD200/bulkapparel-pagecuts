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
            <?php $name = 'chevron-left';
            include('components/icons.php'); ?>
        </a>
    </div>
    <div class="buy-again-section__list">
        <!-- Slider main container -->
        <div class="swiper buy-again-section-swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <?php foreach ($buyAgainItems as $item) : ?>
                    <div class="swiper-slide">
                        <?php template('components/card-product-buy-again.php', [
                            "product" => $item
                        ]); ?>
                    </div>
                <?php endforeach ?>
                <!-- Slides -->
            </div>
            <div class="swiper-button-prev buy-again-section-swiper__prev"></div>
            <div class="swiper-button-next buy-again-section-swiper__next"></div>

        </div>


    </div>

</div>


<script>
    const swiper = new Swiper('.swiper', {
        // Optional parameters

        slidesPerView: 8.5,

        // If we need pagination
        pagination: {
            el: '.swiper-pagination',
        },

        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        // And if we need scrollbar
        scrollbar: {
            el: '.swiper-scrollbar',
        },
    });
</script>