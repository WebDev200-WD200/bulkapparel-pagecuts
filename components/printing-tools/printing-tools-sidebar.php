<ul class="new-design-sidebar__parent">
    <?php foreach ($pages as $page) : ?>

        <li class="active">
            <a href="<?= $page['slug'] ?>">
                <h3> <?= $page['name'] ?> </h3>
            </a>
            <ul class="new-design-sidebar__submenu">
                <?php foreach ($page['sub_pages'] as $sub_page): ?>
                    <li><a href="<?= $sub_page['slug'] ?>">
                            <?= $sub_page['name'] ?>
                        </a>
                    </li>
                <?php endforeach ?>
            </ul>
        </li>
    <?php endforeach ?>
</ul>