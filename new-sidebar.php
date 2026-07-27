<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="scss/new-sidebar.css">
    <!-- <link rel="stylesheet" href="./css/themes/themes.min.css"> -->
    <!-- Hallooween theme -->
    <!-- <link rel="stylesheet" href="./css/themes/halloween-theme.min.css"> -->

    <!-- Thanks giving theme-->
    <!-- <link id="theme" rel="stylesheet" href="./css/themes/christmas-theme.css"> -->

    <!-- New year theme-->
    <!-- <link id="theme" rel="stylesheet" href="./css/themes/new-year.theme.css"> -->
    <!-- New year theme-->

    <!-- <link id="theme" rel="stylesheet" href="./css/themes/valentines.theme.css"> -->
    <!-- <link id="theme" rel="stylesheet" href="./css/themes/independence-day.theme.css"> -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300&display=swap" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="assets/js/bootstrap-modal.js"></script>

</head>

<body>
    <?php // include('./components/layout/header.php') ?>

    <?php
    if (file_exists(__DIR__ . '/includes/mega-menu-system.php')) {
        require_once __DIR__ . '/includes/mega-menu-system.php';
    }
    include('includes/new-sidebar.php');
    ?>


    <button type="button" id="burger-btn" class="burger-btn">
        Hamburger
        <span></span>
        <span></span>   
    </button>

    <?php include('./components/layout/footer.php') ?>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.4/jspdf.plugin.autotable.min.js"></script> -->
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
</body>


</html>