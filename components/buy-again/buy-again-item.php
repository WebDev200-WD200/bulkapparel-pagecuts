

<div class="buy-again-card">
    <div class="buy-again-card__main">
        <picture class="buy-again-card__image">
            <source srcset="<?=newProductImagePath($data['image'], "thumbnail-m");?>" media="(max-width: 480px)">
            <img class="image" src="<?=newProductImagePath($data['image'], "thumbnail");?>" alt="" loading="true">
        </picture>

        <div class="buy-again-card__info">
            <h3 class="title"><?=$data['name'];?></h3>
            <p class="start-at">
                Starting at <span class="price"><?=formatToMoney($data['price']);?></span>
            </p>
        </div>
    </div>
    <div class="buy-again-card__list">
        <ul class="buy-again-card__ordered">
         <?php
            $shown_items = array_splice($data['ordered_variants'], 0, $max_ordered_items);
            $remained_items = $data['ordered_variants'];
            ?> 

            <?php foreach($shown_items as $item): ?>
                <?php template('components/buy-again/ordered-variant-item.php', [
                    "data" => $item,
                    "id" => $data['id']
                ])?>
            <?php endforeach?>
            
            
            <?php foreach($remained_items as $item): ?>
                <?php template('components/buy-again/ordered-variant-item.php', [
                    "data" => $item,
                    "viewMore" => true,
                    "id" => $data['id']
                ])?>
            <?php endforeach ?>
            
        </ul>


        <?php if($remained_items): ?>
            <button class="btn order-variants-btn" class="btn" >View <?=count($remained_items)?> More Ordered Variants</a>
        <?php endif ?>
        <button class="btn view-all-btn" class="btn" >View All Colors and Sizes</a>
    </div>
</div>