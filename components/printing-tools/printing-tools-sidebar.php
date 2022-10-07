<ul class="printing-tools-sidebar" id="printingToolSidebar">
    <?php foreach ($pages as $page) : ?>

        <li class="printing-tools-sidebar-menu <?= $current_page_parent['slug'] == $page['slug'] ? 'active open' : ''; ?>">
            <div class="printing-tools-sidebar-menu__header">
                <a class="printing-tools-sidebar-menu__title" href="<?= generatePrintingUrl($page['slug']) ?>">
                    <?= $page['name'] ?>
                </a>

                <button class="btn btn-menu-opener">
                    <svg viewbox="0 0 8 13" fill="#000" xmlns="http://www.w3.org/2000/svg">
                        <path d="m2.39 12.111 5.608-5.612L2.385.89.996 2.28 5.218 6.5.999 10.722 2.39 12.11Z" />
                    </svg>
                </button>
            </div>

            <ul class="printing-tools-sidebar-menu__submenu">
                <?php foreach ($page['sub_pages'] as $sub_page) : ?>
                    <li class="<?= $current_slug == $sub_page['slug'] ? 'active' : ''; ?>"><a href="<?= generatePrintingUrl($sub_page['slug']) ?>">
                            <?= $sub_page['name'] ?>
                        </a>
                    </li>
                <?php endforeach ?>
            </ul>
        </li>
    <?php endforeach ?>
</ul>

<div class="backdrop" id="printingToolSidebarBackdrop">

</div>

