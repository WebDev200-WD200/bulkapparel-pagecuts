<ul class="shipping-group__list shipping-group-list">
    <?php
    $shownItems = array_splice($group_list, 0, 4); ?>

    <?php foreach ($shownItems as $item) : ?>
        <li class="shipping-group-list__item" data-gtin="<?= $group_item['gtin'] ?>">
            <?php $props = $item;
            include('components/checkout/shipping-group-item.php'); ?>
        </li>
    <?php endforeach ?>

    <?php if (!empty($group_list)) :
        $load_more_id = 'load-more-' . $group_name;
    ?>

        <?php foreach ($group_list as $item) { ?>
            <?php
            $props = $item;
            $load_more_group_id = $load_more_id;
            ?>
            <li class="shipping-group-list__item" <?= isset($load_more_group_id) ? "data-load-more-group='$load_more_group_id' style='display:none;'" : ""; ?> data-gtin="<?= $group_item['gtin'] ?>">
                <?php $props = $item;
                include('components/checkout/shipping-group-item.php'); ?>
            </li>

        <?php } ?>

        <?php $props = [

            "load_more_id" => $load_more_id,
            "max_show" => 4,
            "items" => array_map(function ($item) {
                return [
                    ...$item,
                    "image" => base_site_url . 'image/bulk-blank-shirts/' . $item['image']
                ];
            }, $group_list)

        ];
        include('components/cart-checkout/group-more-items.php');
        ?>


    <?php endif; ?>




</ul>