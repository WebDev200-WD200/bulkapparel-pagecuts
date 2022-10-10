



<button type="button" class="btn group-more-items" data-load-more-target="<?= $props['load_more_id']; ?>">
    <div class="group-more-items__images">
        <?php
        $max_show =isset($props['max_show']) ? $props['max_show'] : 4;
        $length = count($props['items']);
        $sliced = array_slice($props['items'], 0, $max_show);

        foreach ($sliced as $item) : ?>
            <picture class="image">
                <img src="<?= $item['image']; ?>" alt="<?= $item['name'] ?>" height="40" width="40" loading="lazy">
            </picture>
        <?php endforeach; ?>

        <?php if ($length > $max_show) :
            $more_item_count = $length - $max_show;
        ?>
            <div class="image">
                <?= '+' . $more_item_count ?>
            </div>
        <?php endif ?>
    </div>
    <p class="btn group-more-items__toggle">View More</p>
</button>

<?php unset($props)?>