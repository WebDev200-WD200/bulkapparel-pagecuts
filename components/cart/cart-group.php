<?php foreach ($cart_data['group'] as $group) { ?>
    <div class="cart-group text-primary" id="<?= 'group' . $group['id'] ?>">
        <div class="cart-group__header">
            <div class="cart-group__title">
                <p class="title">Ships from <span class="error--text font-weight-bold"><?= $group['name'] ?></span></h3>
                <p class="count">
                    <span class="font-weight-bold"><?= count($group['items']) ?></span> Items
                </p>
            </div>

            <div class="cart-group__delivery ml-auto text-right">
                <p class="title">Earlist Delivery</p>
                <h3 class="value font-weight-bold primary--text"><?= $group['earlist_delivery'] ?></h3>
            </div>
        </div>

        <div class="cart-group__body">
            <div class="cart-group__list">
                <?php
                $shownItems = array_splice($group['items'], 0, 5);
                foreach ($shownItems as $item) {
                    $product = $item;
                    include('cart-group-item.php');
                }
                ?>

                <?php if (!empty($group['items'])) :
                    
                    $load_more_id = 'load-more-'.$group['id'];
                    
                    ?>
                    <?php foreach ($group['items'] as $item) { ?>
                        <?php 
                        $product = $item;
                        $load_more_group_id = $load_more_id;
                        include('cart-group-item.php') ?>
                    <?php } ?>

                    <button type="button" class="btn group-more-items" data-load-more-target="<?=$load_more_id?>">
                        <div class="group-more-items__images" style="opacity: 1;">
                            <picture class="image">
                                <img src="https://dev8888.bulkapparel.com/image/thumbnail-m/16_fm.jpg" alt="G500 Gildan T-Shirt 5000 Heavy Cotton 5.3" height="40" width="40" loading="lazy">
                            </picture>
                            <picture class="image">
                                <img src="https://dev8888.bulkapparel.com/image/thumbnail-m/16_fm.jpg" alt="G500 Gildan T-Shirt 5000 Heavy Cotton 5.3" height="40" width="40" loading="lazy">
                            </picture>
                            <picture class="image">
                                <img src="https://dev8888.bulkapparel.com/image/thumbnail-m/16_fm.jpg" alt="G500 Gildan T-Shirt 5000 Heavy Cotton 5.3" height="40" width="40" loading="lazy">
                            </picture>
                            <div class="image">
                                3+
                            </div>
                        </div>
                        <p class="btn group-more-items__toggle">View More</p>
                    </button>

                <?php endif; ?>
            </div>

            <div class="cart-group__summary">
                <?php
                $shippings = $group['shippings'];
                include('cart-group-shipping.php') ?>


                <?php
                $summary = $group['summary'];
                include('cart-group-summary.php') ?>
            </div>
        </div>
    </div>
<?php }; ?>



<script>
    $('.group-more-items').on('click', function() {
        var groupMoreItemsId = $(this).data('load-more-target');
        $(this).toggleClass('shown');
        $('[data-load-more-group='+groupMoreItemsId+']').toggle();
        $('.group-more-items__images').toggle();
        $('.group-more-items__toggle').text($(this).hasClass('shown') ? 'View Less' : 'View More');
    })
</script>