<div class="printing-tools-pagination">
    <?php if (isset($prev_page)) : ?>
        <div class="printing-tools-pagination__prev">
            <div class="printing-tools-pagination__title">
                <span class="icon">
                    <svg width="6" height="10" fill="#000" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.5.5 0 5l4.5 4.5 1.115-1.115L2.23 5l3.385-3.385L4.5.5Z" />
                    </svg>
                </span>
                Previous
            </div>
            <a href="<?= generatePrintingUrl($prev_page['slug']); ?>" class="btn btn-printing-nav btn-printing-nav--prev">
                <?= $prev_page['name'] ?>
            </a>
        </div>
    <?php endif ?>

    <?php if (isset($next_page)) : ?>
        <div class="printing-tools-pagination__next">
            <div class="printing-tools-pagination__title">
                Next
                <span class="icon">
                    <svg width="6" height="10" fill="#000" style="transform: rotate(180deg);" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.5.5 0 5l4.5 4.5 1.115-1.115L2.23 5l3.385-3.385L4.5.5Z" />
                    </svg>
                </span>
            </div>
            <a href="<?= generatePrintingUrl($next_page['slug']) ?>" class="btn btn-printing-nav btn-printing-nav--next">
                <?= $next_page['name'] ?>
            </a>
        </div>
    <?php endif ?>
</div>