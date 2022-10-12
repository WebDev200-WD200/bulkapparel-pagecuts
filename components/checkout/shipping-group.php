<div class="shipping-group">
    <div class="shipping-group__header">
        <div class="shipping-group__title">
            <h3>Items from <span class="error--text"><?= $shipping_group['group_name'] ?></span></h3>
        </div>
    </div>

    <div class="shipping-group__body">
        <?php $shipping_options = $shipping_group['shipping_options'];
        include('includes/checkout/shipping-group-options.php') ?>

        <?php
        $group_name=$shipping_group['group_name'];
        $group_list = $shipping_group['items'];
        include('includes/checkout/shipping-group-list.php')
         ?>
    </div>


</div>