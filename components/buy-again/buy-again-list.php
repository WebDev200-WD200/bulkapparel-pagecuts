<?php 
$MAX_ORDERED_ITEMS = 4;
?>
<div class="buy-again-list">
    <?php foreach ($items as $item) : ?>
        <?php template('components/buy-again/buy-again-item.php', 
            [
                'data' => $item, 
                'max_ordered_items' => $MAX_ORDERED_ITEMS
            ]); 
        ?>
    <?php endforeach ?>
</div>