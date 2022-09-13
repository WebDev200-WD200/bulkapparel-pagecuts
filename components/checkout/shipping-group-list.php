<ul class="shipping-group__list shipping-group-list">

    <?php foreach ($group_list as $group_item) : ?>
        <li class="shipping-group-list__item">
            <div class="shipping-group-list__info">
                <a class="shipping-group-list__image" href="<?= $group_item['to'] ?>">
                    <picture>
                        <source srcset="<?=base_site_url . '/image/thumbnail-m/' . $group_item['image'] ?>" media="(max-width: 768px)">
                        <img src="<?=base_site_url . '/image/thumbnail/' . $group_item['image'] ?>" alt="" height="50" width="40">
                    </picture>
                </a>

                <div class="shipping-group-list__product">
                    <div class="row">
                        <div class="col-12">
                            <a class="shipping-group-list__title" href="">
                                <h4><?= $group_item['name'] ?></h4>
                            </a>
                        </div>

                        <div class="col-12 d-flex">
                            <p class="shipping-group-list__others">
                                <span class="name"><b>Color:</b></span>
                                <span class="value"><?= $group_item['color'] ?></span>
                            </p>
                            <p class="shipping-group-list__others">
                                <span class="name"><b>Size:</b></span>
                                <span class="value"><?= $group_item['size'] ?></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shipping-group-list__summary">
                <div class="shipping-group-list__summary-item price">
                    <p class="name">Price</p>
                    <p class="value">$<?= $group_item['price'] ?></p>
                </div>

                <div class="shipping-group-list__summary-item quantity">
                    <p class="name">Quantity</p>
                    <p class="value"><?= $group_item['quantity'] ?></p>
                </div>

                <div class="shipping-group-list__summary-item total">
                    <p class="name">Total</p>
                    <p class="value">$<?= $group_item['total'] ?></p>
                </div>

            </div>
        </li>

    <?php endforeach ?>
</ul>