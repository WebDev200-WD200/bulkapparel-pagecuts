<div class="buy-again-card" data-id="<?=$data["id"]?>">
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
        ])?>

        <div class="buy-again-card__action">
            <?php if ($remained_items) :
                $remained_text = "View ".count($remained_items)." More Ordered Variants";
                ?>
                <button class="btn order-variants-btn" class="btn" data-toggled="0" data-remained-text="<?=$remained_text?>" data-target-view-more="<?=$data['id']?>"><?=$remained_text?></a>
            <?php endif ?>
        <button class="btn view-all-btn" data-target-choose-variants="<?=$data['id']?>" class="btn">View All Colors and Sizes</a>
        </div>
    </div>
</div>