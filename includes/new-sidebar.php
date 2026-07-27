<?php

/**
 * Mobile navbar sidebar – data and markup.
 * Menu and filter content are driven by the variables below.
 */

// ——— Quick Filters (pipe-separated tags in the sidebar)
$sidebar_quick_filters = [
    'Next Level',
    'Polyester Shirts',
    'Bulk Hoodies',
    'Crewnecks',
    'Sweatpants',
    'Long Sleeves',
    'Zip Hoodies',
    'Shaka',
    'Gildan',
    'Mens T-Shirts',
    'Comfort Colors',
    'Port & Company',
    'Bella + Canvas',
    'Sport-Tek',
    'District',
    'Shorts',
];


// ——— Main navigation menu (categories with optional image, link, and mega menu key for submenu)
// When mega_key is set, the chevron toggles the submenu rendered via renderMegaMenu($mega_key).
$sidebar_nav_menu = [
    ['name' => 'T-Shirts',   'image' => 'https://www.bulkapparel.com/images/menu/mobile/png/cotton-100.png',   'link' => '/tshirts',       'mega_key' => 'tshirts'],
    ['name' => 'Sweatshirts', 'image' => 'https://www.bulkapparel.com/images/menu/mobile/png/hooded.png', 'link' => '/sweatshirts',   'mega_key' => 'sweatshirts'],
    ['name' => 'Polos',      'image' => 'https://www.bulkapparel.com/images/menu/mobile/png/athletics1.png',     'link' => '/polos',         'mega_key' => 'polos'],
    ['name' => 'Womens',     'image' => 'https://www.bulkapparel.com/images/menu/mobile/png/dressshirts.png',    'link' => '/womens',       'mega_key' => 'women'],
    ['name' => 'Kids',       'image' => 'https://www.bulkapparel.com/images/menu/mobile/png/sweatshirts.png',      'link' => '/kids',         'mega_key' => 'youth'],
    ['name' => 'Activewear', 'image' => 'https://www.bulkapparel.com/images/menu/mobile/png/ath-tanktops.png', 'link' => '/activewear',  'mega_key' => 'activewear'],
    ['name' => 'Outerwear',  'image' => 'https://www.bulkapparel.com/images/menu/mobile/png/dressshirts1.png', 'link' => '/outerwear',   'mega_key' => 'outerwear'],
    ['name' => 'Hats',       'image' => 'https://www.bulkapparel.com/images/menu/mobile/png/headwear.png',      'link' => '/hats',         'mega_key' => 'headwear'],
    ['name' => 'Bags',       'image' => 'https://www.bulkapparel.com/images/menu/mobile/png/bag-totes.png',      'link' => '/bags',         'mega_key' => 'bags'],
    ['name' => 'Accessories', 'image' => '',                                       'link' => '/accessories', 'mega_key' => 'accessories'],
    ['name' => 'More',       'image' => '',                                       'link' => '/more',    'renderHtml' => ''],
    ['name' => 'Shop Brands', 'image' => '',                                       'link' => '/brands', 'renderHtml' => ''],
    ['name' => 'Shop By Colors', 'image' => '',                                       'link' => '/colors', 'mega_key' => 'colors'],
];

// ——— Other copy (optional overrides)
$sidebar_filter_label   = 'Filter';
$sidebar_search_placeholder = 'Search Products, Brands';
$sidebar_help_center_label  = 'Help Center';
$sidebar_free_shipping_text = 'Free Shipping Over $79.00';
$sidebar_quick_filters_heading = 'Quick Filters';
$sidebar_logo_text_primary   = 'bulk';   // first part of logo (no underline)
$sidebar_logo_text_secondary = 'apparel'; // gets red underline
$sidebar_logo_text_com       = '.com';
$sidebar_chevron_right_url   = 'https://www.bulkapparel.com/images/new/chevron-right.svg?v=1122022114';
?>

<div id="mobile-sidebar" class="mobile-sidebar is-open" aria-hidden="true">
    <div class="mobile-sidebar__backdrop" id="mobile-sidebar-backdrop"></div>
    <div class="mobile-sidebar__panel">
        <header class="mobile-sidebar__header">
            <button type="button" class="mobile-sidebar__close" id="mobile-sidebar-close" aria-label="Close menu">
                <span class="mobile-sidebar__close-x">×</span>
            </button>
            <a href="/" class="mobile-sidebar__logo">
                <span class="mobile-sidebar__logo-main"><?php echo htmlspecialchars($sidebar_logo_text_primary); ?></span><span class="mobile-sidebar__logo-apparel"><?php echo htmlspecialchars($sidebar_logo_text_secondary); ?></span>
                <span class="mobile-sidebar__logo-com"><?php echo htmlspecialchars($sidebar_logo_text_com); ?></span>
            </a>
        </header>

        <div class="mobile-sidebar__container">
            <button type="button" class="mobile-sidebar__filter-btn">
                <span class="mobile-sidebar__filter-label"><?php echo htmlspecialchars($sidebar_filter_label); ?></span>
                <span class="mobile-sidebar__filter-icon" aria-hidden="true">
                    <svg width="24" height="18" viewBox="0 0 24 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 4h20M2 9h20M2 14h20" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                        <circle cx="6" cy="4" r="2.5" fill="currentColor" />
                        <circle cx="18" cy="14" r="2.5" fill="currentColor" />
                    </svg>
                </span>
            </button>

            <div class="mobile-sidebar__promos">
                <a href="/help" class="mobile-sidebar__promo">
                    <span class="mobile-sidebar__promo-icon mobile-sidebar__promo-icon--help">?</span>
                    <span class="mobile-sidebar__promo-text"><?php echo htmlspecialchars($sidebar_help_center_label); ?></span>
                </a>
                <a href="/shipping" class="mobile-sidebar__promo">
                    <span class="mobile-sidebar__promo-icon mobile-sidebar__promo-icon--truck">FREE</span>
                    <span class="mobile-sidebar__promo-text"><?php echo htmlspecialchars($sidebar_free_shipping_text); ?></span>
                </a>
            </div>

            <div class="mobile-sidebar__search-wrap">
                <input type="search" class="mobile-sidebar__search-inp" placeholder="<?php echo htmlspecialchars($sidebar_search_placeholder); ?>" aria-label="Search products and brands">
                <span class="mobile-sidebar__search-chevron" aria-hidden="true">▼</span>
                <span class="mobile-sidebar__search-icon" aria-hidden="true">⌕</span>
            </div>

            <section class="mobile-sidebar__quick-filters mobile-sidebar__quick-filters--open" id="mobile-sidebar-quick-filters">
                <h2 class="mobile-sidebar__quick-filters-title">
                    <span class="mobile-sidebar__quick-filters-title-text"><?php echo htmlspecialchars($sidebar_quick_filters_heading); ?></span>
                    <span class="mobile-sidebar__quick-filters-line"></span>
                    <button type="button" class="mobile-sidebar__quick-filters-chevron-btn" aria-expanded="false" aria-controls="mobile-sidebar-quick-filters-list" aria-label="Toggle Quick Filters">
                        <img src="<?php echo htmlspecialchars($sidebar_chevron_right_url); ?>" alt="" class="mobile-sidebar__chevron" width="24" height="24" aria-hidden="true">
                    </button>
                </h2>
                <div id="mobile-sidebar-quick-filters-list" class="mobile-sidebar__quick-filters-list">
                    <?php foreach ($sidebar_quick_filters as $filter) : ?>
                        <a href="?filter=<?php echo urlencode($filter); ?>" class="mobile-sidebar__quick-filter-tag"><?php echo htmlspecialchars($filter); ?></a>
                    <?php endforeach; ?>
                </div>
            </section>

            <nav class="mobile-sidebar__nav" aria-label="Product categories">
                <ul class="mobile-sidebar__nav-list">
                    <?php
                    $sidebar_has_mega = function_exists('renderMegaMenu');
                    foreach ($sidebar_nav_menu as $item) :
                        $has_submenu = $sidebar_has_mega && !empty($item['mega_key']);
                    ?>
                        <li class="mobile-sidebar__nav-item<?php echo $has_submenu ? ' mobile-sidebar__nav-item--has-submenu' : ''; ?>">
                            <div class="mobile-sidebar__nav-row">
                                <?php if (!empty($item['image'])) : ?>
                                    <span class="mobile-sidebar__nav-img-wrap">
                                        <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="" class="mobile-sidebar__nav-img" loading="lazy">
                                    </span>
                                <?php endif; ?>
                                <span class="mobile-sidebar__nav-content">
                                    <a href="<?php echo htmlspecialchars($item['link']); ?>" class="mobile-sidebar__nav-link"><?php echo htmlspecialchars($item['name']); ?></a>
                                    <?php if ($has_submenu) : ?>
                                        <button type="button" class="mobile-sidebar__nav-chevron-btn" data-mega-key="<?php echo htmlspecialchars($item['mega_key']); ?>" aria-expanded="false" aria-controls="mobile-sidebar-submenu-<?php echo htmlspecialchars($item['mega_key']); ?>" aria-label="Toggle <?php echo htmlspecialchars($item['name']); ?> submenu">
                                            <img src="<?php echo htmlspecialchars($sidebar_chevron_right_url); ?>" alt="" class="mobile-sidebar__nav-arrow" width="24" height="24" aria-hidden="true">
                                        </button>
                                    <?php else : ?>
                                        <a href="<?php echo htmlspecialchars($item['link']); ?>" class="mobile-sidebar__nav-arrow-link">
                                            <img src="<?php echo htmlspecialchars($sidebar_chevron_right_url); ?>" alt="" class="mobile-sidebar__nav-arrow" width="24" height="24" aria-hidden="true">
                                        </a>
                                    <?php endif; ?>
                                </span>
                            </div>
                            <?php if ($has_submenu) : ?>
                                <div id="mobile-sidebar-submenu-<?php echo htmlspecialchars($item['mega_key']); ?>" class="mobile-sidebar__submenu" hidden>

                                    <?php if (!empty($item['renderHtml'])) : ?>
                                        <?php echo $item['renderHtml']; ?>
                                    <?php else : ?>
                                        <div class="mobile-sidebar__submenu-inner">
                                            <?php echo renderMegaMenu($item['mega_key']); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </div>
    </div>
</div>



<script>
    (function() {
        var sidebar = document.getElementById('mobile-sidebar');
        var backdrop = document.getElementById('mobile-sidebar-backdrop');
        var closeBtn = document.getElementById('mobile-sidebar-close');
        var burgerBtn = document.getElementById('burger-btn');

        function openSidebar() {
            if (sidebar) {
                sidebar.classList.add('is-open');
                sidebar.setAttribute('aria-hidden', 'false');
                document.body.style.overflow = 'hidden';
            }
        }

        function closeSidebar() {
            if (sidebar) {
                sidebar.classList.remove('is-open');
                sidebar.setAttribute('aria-hidden', 'true');
                document.body.style.overflow = '';
            }
        }

        window.openSidebar = openSidebar;
        window.closeSidebar = closeSidebar;
        window.isSidebarOpen = function() {
            return sidebar && sidebar.classList.contains('is-open');
        };

        if (burgerBtn) burgerBtn.addEventListener('click', window.openSidebar);
        if (closeBtn) closeBtn.addEventListener('click', window.closeSidebar);
        if (backdrop) backdrop.addEventListener('click', window.closeSidebar);

        // Toggle submenu when nav chevron button is clicked
        document.querySelectorAll('.mobile-sidebar__nav-chevron-btn').forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                var key = btn.getAttribute('data-mega-key');
                var submenu = key && document.getElementById('mobile-sidebar-submenu-' + key);
                var item = btn.closest('.mobile-sidebar__nav-item');
                var isOpen = item && item.classList.contains('mobile-sidebar__nav-item--submenu-open');

                // Close any other open submenus (accordion)
                document.querySelectorAll('.mobile-sidebar__nav-item--submenu-open').forEach(function(openItem) {
                    if (openItem !== item) {
                        openItem.classList.remove('mobile-sidebar__nav-item--submenu-open');
                        var otherBtn = openItem.querySelector('.mobile-sidebar__nav-chevron-btn');
                        var otherId = otherBtn && otherBtn.getAttribute('aria-controls');
                        var otherPanel = otherId && document.getElementById(otherId);
                        if (otherPanel) {
                            otherPanel.hidden = true;
                            otherBtn.setAttribute('aria-expanded', 'false');
                        }
                    }
                });

                if (submenu) {
                    if (isOpen) {
                        submenu.hidden = true;
                        btn.setAttribute('aria-expanded', 'false');
                        if (item) item.classList.remove('mobile-sidebar__nav-item--submenu-open');
                    } else {
                        submenu.hidden = false;
                        btn.setAttribute('aria-expanded', 'true');
                        if (item) item.classList.add('mobile-sidebar__nav-item--submenu-open');
                    }
                }
            });
        });

        // Toggle Quick Filters list when chevron button is clicked (same behavior as menu items)
        var quickFiltersBtn = document.querySelector('.mobile-sidebar__quick-filters-chevron-btn');
        var quickFiltersSection = document.getElementById('mobile-sidebar-quick-filters');
        var quickFiltersList = document.getElementById('mobile-sidebar-quick-filters-list');
        if (quickFiltersBtn && quickFiltersList && quickFiltersSection) {
            quickFiltersBtn.addEventListener('click', function() {
                var isOpen = quickFiltersList.hidden === false;
                if (isOpen) {
                    quickFiltersList.hidden = true;
                    quickFiltersBtn.setAttribute('aria-expanded', 'false');
                    quickFiltersSection.classList.remove('mobile-sidebar__quick-filters--open');
                } else {
                    quickFiltersList.hidden = false;
                    quickFiltersBtn.setAttribute('aria-expanded', 'true');
                    quickFiltersSection.classList.add('mobile-sidebar__quick-filters--open');
                }
            });
        }
    })();
</script>