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
                <?php foreach ($group['items'] as $item) { ?>
                    <?php $product = $item;
                    include('cart-group-item.php') ?>
                <?php } ?>
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