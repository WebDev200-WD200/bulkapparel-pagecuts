<div class="buy-again-card" data-id="<?= $data["id"] ?>">
    <div class="buy-again-card__main">
        <picture class="buy-again-card__image">
            <source srcset="<?= newProductImagePath($data['image'], "thumbnail-m"); ?>" media="(max-width: 480px)">
            <img class="image" src="<?= newProductImagePath($data['image'], "thumbnail"); ?>" alt="" loading="true">
        </picture>

        <div class="buy-again-card__info">
            <a href="#" class="title"><?= $data['name']; ?></a>
            <p class="start-at">
                Starting at <span class="price"><?= formatToMoney($data['price']); ?></span>
            </p>
        </div>
    </div>
    <div class="buy-again-card__list">
        <ul class="buy-again-card__ordered">
            <?php
            $shown_items = array_splice($data['ordered_variants'], 0, $max_ordered_items);
            $remained_items = $data['ordered_variants'];
            ?>

            <?php foreach ($shown_items as $item) : ?>
                <?php template('components/buy-again/ordered-variant-item.php', [
                    "data" => $item,
                    "id" => $data['id']
                ]) ?>
            <?php endforeach ?>


            <?php foreach ($remained_items as $item) : ?>
                <?php template('components/buy-again/ordered-variant-item.php', [
                    "data" => $item,
                    "viewMore" => true,
                    "id" => $data['id']
                ]) ?>
            <?php endforeach ?>

        </ul>

        <?php template('components/buy-again/choose-variants.php', [
            "id" => $data['id'],
            "variants" => $data['variants']
        ]) ?>

        <div class="buy-again-card__action">
            <?php if ($remained_items) :
                $remained_text = "View " . count($remained_items) . " More Ordered Variants";
            ?>
                <button class="btn order-variants-btn" class="btn" data-toggled="0" data-remained-text="<?= $remained_text ?>" data-target-view-more="<?= $data['id'] ?>"><?= $remained_text ?></a>
                <?php endif ?>
                <button class="btn view-all-btn" data-target-choose-variants="<?= $data['id'] ?>" class="btn">View All Colors and Sizes</a>
        </div>


        <div class="buy-again-card__loading" style="display: none;">
            <svg xmlns="http://www.w3.org/2000/svg" style="shape-rendering:auto" width="40" height="40" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                <circle cx="50" cy="50" fill="none" stroke="#002868" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
                    <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1" />
                </circle>
            </svg>
        </div>
    </div>
</div>