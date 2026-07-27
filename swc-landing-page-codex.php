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
    <link rel="stylesheet" href="https://unpkg.com/swiper@6.8.1/swiper-bundle.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="assets/js/bootstrap-modal.js"></script>
    <script src="https://unpkg.com/swiper@6.8.1/swiper-bundle.min.js"></script>

</head>

<body>
    <?php // include("./components/layout/header.php"); 
    ?>
    <?php
    if (!defined('base_url_site')) {
        define('base_url_site', 'https://www.bulkapparel.com/');
    }

    /** @var array{brand:string,brand_upper:string,site:string,email_word:string,logo_relative:string,hero_image_relative:string} $swc_shirtchamp */
    $swc_shirtchamp = array(
        'brand' => 'ShirtChamp',
        'brand_upper' => 'SHIRTCHAMP',
        'site' => 'ShirtChamp.com',
        'email_word' => 'shirtchamp',
        'logo_relative' => 'images/shirtchamp_logo_transition.png',
        'hero_image_relative' => 'assets/img/hero-image.png',
    );

    if (!function_exists('swc_landing_icon')) {
        function swc_landing_icon($name, $class = '')
        {
            $icons = array(
                'arrow-right' => '<path d="M5 12h14"></path><path d="m13 6 6 6-6 6"></path>',
                'certificate' => '<path d="M12 3 14 5.1l2.9-.4.4 2.9L19.4 9l-1.3 2.6 1.3 2.6-2.1 1.4-.4 2.9-2.9-.4L12 21l-2-2.9-2.9.4-.4-2.9-2.1-1.4 1.3-2.6L4.6 9l2.1-1.4.4-2.9 2.9.4L12 3z"></path><path d="m9.3 12 1.8 1.8 3.8-4"></path>',
                'check' => '<path d="M20 6 9 17l-5-5"></path>',
                'login-arrow' => '<path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path><path d="M10 17l5-5-5-5"></path><path d="M15 12H3"></path>',
                'clock' => '<circle cx="12" cy="12" r="9"></circle><path d="M12 7v5l3 2"></path>',
                'desktop' => '<rect x="3" y="3" width="18" height="12" rx="2"></rect><path d="M7 21h10"></path><path d="M12 15v6"></path>',
                'monitor-x' => '<rect x="3" y="3" width="18" height="12" rx="2"></rect><path d="M9 8l6 6"></path><path d="M15 8l-6 6"></path><path d="M7 21h10"></path><path d="M12 15v6"></path>',
                'envelope' => '<rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="m4 7 8 6 8-6"></path>',
                'gift' => '<path d="M20 12v8H4v-8"></path><path d="M2 8h20v4H2z"></path><path d="M12 8v12"></path><path d="M12 8H7.5a2.5 2.5 0 1 1 2-4L12 8z"></path><path d="M12 8h4.5a2.5 2.5 0 1 0-2-4L12 8z"></path>',
                'headset' => '<path d="M4 13a8 8 0 0 1 16 0"></path><path d="M4 13v4a2 2 0 0 0 2 2h1v-7H6a2 2 0 0 0-2 2"></path><path d="M20 13v4a2 2 0 0 1-2 2h-1v-7h1a2 2 0 0 1 2 2"></path><path d="M14 20h2a4 4 0 0 0 4-4"></path>',
                'message' => '<path d="M21 12a8 8 0 0 1-8 8H7l-4 2 1.5-4A8 8 0 1 1 21 12z"></path>',
                'phone' => '<path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.5 19.5 0 0 1-8.5-3.1A19 19 0 0 1 5.2 12.7 19.5 19.5 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.5 2.1L8 9.9a16 16 0 0 0 6.1 6.1l1.3-1.3a2 2 0 0 1 2.1-.5c.9.3 1.8.6 2.8.7a2 2 0 0 1 1.7 2z"></path>',
                'shirt' => '<path d="M8.5 4 12 6l3.5-2 3.2 1.6 2 4-3.2 1.6V20h-11v-8.8L3.3 9.6l2-4L8.5 4z"></path><path d="M8.5 4a3.5 3.5 0 0 0 7 0"></path>',
                'shield-check' => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path><path d="M9 12l2 2 4-4"></path>',
                'star' => '<path d="m12 2.5 2.9 6 6.6.9-4.8 4.7 1.2 6.6L12 17.5l-5.9 3.2 1.2-6.6-4.8-4.7 6.6-.9L12 2.5z"></path>',
                'tag' => '<path d="M20 10.5 13.5 4H5v8.5L11.5 19a2.1 2.1 0 0 0 3 0l5.5-5.5a2.1 2.1 0 0 0 0-3z"></path><circle cx="8.5" cy="7.5" r="1"></circle>',
                'truck' => '<path d="M3 6h11v10H3z"></path><path d="M14 10h4l3 3v3h-7z"></path><circle cx="7" cy="18" r="2"></circle><circle cx="17" cy="18" r="2"></circle>',
                'user' => '<circle cx="12" cy="7" r="4"></circle><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>',
                'user-plus' => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M19 8v6"></path><path d="M16 11h6"></path>',
            );

            $svg_class = trim('swc-icon ' . $class);
            $body = isset($icons[$name]) ? $icons[$name] : $icons['check'];

            return '<svg class="' . htmlspecialchars($svg_class, ENT_QUOTES, 'UTF-8') . '" viewBox="0 0 24 24" aria-hidden="true" focusable="false">' . $body . '</svg>';
        }
    }

    if (!function_exists('swc_compare_arrow_circle')) {
        function swc_compare_arrow_circle()
        {
            /* Material Symbols arrow — https://github.com/google/material-design-icons */
            $svg = '<svg class="swc-compare__arrow-svg" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" aria-hidden="true" focusable="false">'
                . '<path fill="currentColor" d="m14 18l-1.4-1.45L16.15 13H4v-2h12.15L12.6 7.45L14 6l6 6z"/>'
                . '</svg>';

            return '<span class="swc-compare__arrow-circle" aria-hidden="true">' . $svg . '</span>';
        }
    }
    ?>


    <style>
        .swc-landing-page {
            --swc-navy: #002868;
            --swc-blue: #0b59c3;
            --swc-blue-light: #eaf4ff;
            --swc-red: #c62032;
            --swc-gold: #f4b400;
            --swc-green: #22a559;
            --swc-green-light: #e8f5e9;
            --swc-ink: #10233f;
            --swc-muted: #52657d;
            --swc-line: #d9e2ef;
            --swc-bg: #f6f8fb;
            --swc-sky: #eaf4ff;
            --swc-mint: #eaf8ef;
            --swc-peach: #fff3e5;
            color: var(--swc-ink);
            background: #fff;
            font-family: "Roboto Condensed", Arial, Helvetica, sans-serif;
            overflow-x: hidden;
        }

        .swc-landing-page * {
            box-sizing: border-box;
        }

        .swc-landing-page a {
            color: var(--swc-navy);
            text-decoration: none;
        }

        .swc-landing-page a:hover,
        .swc-landing-page a:focus {
            color: var(--swc-blue);
            text-decoration: underline;
        }

        .swc-wrap {
            width: calc(100% - 32px);
            max-width: 1140px;
            margin: 0 auto;
        }

        .swc-icon {
            width: 24px;
            height: 24px;
            fill: none;
            stroke: currentColor;
            stroke-width: 1.9;
            stroke-linecap: round;
            stroke-linejoin: round;
            flex: 0 0 auto;
        }

        .swc-icon--star {
            fill: currentColor;
            stroke: none;
        }

        .swc-visually-hidden {
            position: absolute !important;
            width: 1px !important;
            height: 1px !important;
            padding: 0 !important;
            margin: -1px !important;
            overflow: hidden !important;
            clip: rect(0, 0, 0, 0) !important;
            white-space: nowrap !important;
            border: 0 !important;
        }

        .swc-hero {
            position: relative;
            padding: 52px 0 56px;
            background: linear-gradient(90deg, #ffffff 0%, #f9fbfe 44%, #edf5ff 100%);
            /* border-bottom: 1px solid var(--swc-line); */
        }

        .swc-hero::before {
            content: none;
        }

        .swc-hero__grid {
            display: grid;
            grid-template-columns: minmax(0, 6fr) minmax(0, 4fr);
            gap: 18px;
            align-items: center;
        }

        .swc-hero__copy {
            position: relative;
            z-index: 2;
        }

        .swc-hero__logo {
            display: block;
            width: 185px;
            height: auto;
            margin-bottom: 18px;
        }

        .swc-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin: 0 0 14px;
            color: var(--swc-red);
            font-size: 18px;
            font-weight: 800;
            text-transform: uppercase;
        }

        .swc-eyebrow .swc-icon {
            width: 18px;
            height: 18px;
        }

        .swc-hero__title {
            position: relative;
            display: inline-block;
            margin: 0 0 14px;
            color: var(--swc-navy);
            font-size: clamp(34px, 5.2vw + 1rem, 58px);
            line-height: 1.06;
            font-weight: 900;
            text-transform: uppercase;
        }

        .swc-hero__title-line {
            display: block;
            color: var(--swc-navy);
        }

        .swc-hero__title-line--red {
            color: var(--swc-red);
        }

        .swc-hero__check {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            top: -5%;
            right: -18%;
            width: 68px;
            height: 68px;
            margin: 0;
            border-radius: 50%;
            background: var(--swc-green);
            color: #fff;
            box-shadow: 0 8px 20px rgba(34, 165, 89, 0.35);
        }

        .swc-hero__check .swc-icon {
            width: 39px;
            height: 39px;
            stroke-width: 2.4;
        }

        .swc-hero__body {
            max-width: 450px;
        }

        .swc-hero__body p {
            margin: 0 0 14px;
            color: var(--swc-navy);
            font-size: 21px;
            line-height: 1.68;
        }

        .swc-hero__body strong {
            color: var(--swc-ink);
        }

        .swc-hero__actions {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 12px 16px;
            width: min(100%, 450px);
            margin-top: 24px;
        }

        .swc-hero__actions .swc-btn {
            width: 100%;
        }

        .swc-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            min-height: 48px;
            padding: 12px 22px;
            border-radius: 6px;
            background: var(--swc-navy);
            color: #fff !important;
            font-size: 20px;
            font-weight: 800;
            text-align: center;
            text-decoration: none !important;
            transition: background-color 0.16s ease, transform 0.16s ease;
        }

        .swc-btn:hover,
        .swc-btn:focus {
            background: #001d4d;
            color: #fff !important;
            transform: translateY(-1px);
        }

        .swc-btn--secondary {
            background: #fff;
            color: var(--swc-navy) !important;
            border: 1px solid rgba(0, 40, 104, 0.22);
        }

        .swc-btn--secondary:hover,
        .swc-btn--secondary:focus {
            background: var(--swc-sky);
            color: var(--swc-navy) !important;
        }

        .swc-hero__microcopy {
            width: min(100%, 450px);
            margin: 14px 0 0;
            color: var(--swc-ink);
            font-size: 20px;
            /* font-weight: 700; */
            text-align: center;
        }

        .swc-hero__visual {
            position: relative;
            z-index: 1;
            margin-left: -88px;
        }

        .swc-hero__visual--mobile {
            display: none;
        }

        @media (max-width: 1060px) {
            .swc-hero__visual--desktop {
                display: none;
            }

            .swc-hero__visual--mobile {
                display: block;
            }
        }

        .swc-hero__frame {
            position: relative;
            /* overflow: hidden; */
            /* border: 1px solid rgba(0, 40, 104, 0.12); */
            border-radius: 8px;
            /* background: #fff; */
            /* box-shadow: 0 20px 48px rgba(16, 35, 63, 0.14); */
            transform: translateX(16px);
            left: -30%;

            width: 900px;
        }

        .swc-hero__frame img {
            display: block;
            width: 100%;
            max-width: 1000px;
            height: auto;
        }

        .swc-shopper-badge {
            position: absolute;
            right: -35%;
            top: 22px;
            width: 180px;
            padding: 12px 14px;
            border-radius: 8px;
            background: #fff;
            border: 1px solid rgba(0, 40, 104, 0.14);
            box-shadow: 0 14px 34px rgba(16, 35, 63, 0.18);
            z-index: 2;
        }

        .swc-shopper-badge__stars {
            display: flex;
            gap: 0;
            color: var(--swc-gold);
            /* margin-bottom: 8px; */
        }

        .swc-shopper-badge__stars .swc-icon {
            width: 22px;
            height: 22px;
        }

        .swc-shopper-badge__title {
            margin: 0 0 7px;
            color: var(--swc-navy);
            font-size: 20px;
            line-height: 1.22;
            font-weight: 900;
            text-align: left;
        }

        .swc-shopper-badge__title span {
            display: block;
        }

        .swc-shopper-badge__title .rating-number {
            font-size: 32px;
            font-weight: 900;
            color: var(--swc-navy);
            line-height: 1.22;
        }

        .swc-shopper-badge__seal {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--swc-muted);
            font-size: 16px;
            font-weight: 800;
        }

        .swc-shopper-badge__seal .swc-icon {
            width: 20px;
            height: 20px;
            color: var(--swc-gold);
        }

        .swc-section-head {
            margin: 38px auto 26px;
            text-align: center;
        }

        .swc-section-head__inner {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .swc-section-head__inner::before,
        .swc-section-head__inner::after {
            content: "";
            flex: 1;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(0, 40, 104, 0.3), transparent);
        }

        .swc-section-head h2 {
            margin: 0;
            color: var(--swc-navy);
            font-size: 31px;
            line-height: 1.18;
            font-weight: 900;
            text-transform: uppercase;
        }

        .swc-section-head p {
            max-width: 720px;
            margin: 12px auto 0;
            color: var(--swc-muted);
            font-size: 20px;
            line-height: 1.6;
        }

        .swc-means {
            padding: 0 0 34px;
        }

        .swc-means .swiper-slide {
            width: 16.66%;
        }

        @media (max-width: 1060px) {
            .swc-means .swiper-slide {
                width: 33.33%;
            }
        }

        @media (max-width: 700px) {
            .swc-means .swiper-slide {
                width: 100%;
            }
        }

        .swc-means__swiper {
            position: relative;
            padding: 4px 2px 36px;
            margin: 0 -2px;
            overflow: hidden;
        }

        .swc-means__swiper .swiper-wrapper {
            align-items: stretch;
        }

        .swc-means__swiper .swiper-slide {
            height: auto;
            box-sizing: border-box;
        }

        .swc-means__swiper .swiper-slide .swc-means__item {
            height: 100%;
            box-sizing: border-box;
        }

        .swc-means__item {
            text-align: center;
        }

        .swc-means__pagination.swiper-pagination-bullets {
            bottom: 6px !important;
        }

        .swc-means__pagination .swiper-pagination-bullet {
            width: 9px;
            height: 9px;
            background: var(--swc-navy);
            opacity: 0.35;
        }

        .swc-means__pagination .swiper-pagination-bullet-active {
            opacity: 1;
        }

        .swc-means__icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 86px;
            height: 86px;
            margin: 0 auto 18px;
            /* border: 3px solid #d9e2ef; */
            border-radius: 50%;
            color: var(--swc-navy);
            background: #f8fbff;
            box-shadow: none;
        }

        .swc-means__icon .swc-icon {
            width: 44px;
            height: 44px;
            stroke-width: 2.2;
        }

        .swc-means__item h3 {
            min-height: 42px;
            margin: 0 0 6px;
            color: var(--swc-navy);
            font-size: 20px;
            line-height: 1.24;
            font-weight: 800;
            text-transform: uppercase;
        }

        .swc-means__item p {
            margin: 0;
            color: var(--swc-muted);
            font-size: 16px;
            line-height: 1.45;
        }

        .swc-migrate {
            padding: 4px 0 42px;
        }

        .swc-migrate__grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
        }

        .swc-migrate__box {
            min-height: 100%;
            padding: 24px;
            border-radius: 8px;
            border: 1px solid rgba(0, 40, 104, 0.12);
            display: flex;
            flex-direction: column;
            text-align: center;
        }

        .swc-migrate__box--green {
            background: var(--swc-mint);
        }

        .swc-migrate__box--blue {
            background: var(--swc-sky);
        }

        .swc-migrate__box--orange {
            background: var(--swc-peach);
        }

        .swc-migrate__icon {
            width: 64px;
            height: 64px;
            margin: 0 auto 16px;
            border-radius: 999px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--swc-green);
            color: #fff;
        }

        .swc-migrate__box--blue .swc-migrate__icon {
            background: var(--swc-navy);
        }

        .swc-migrate__box--orange .swc-migrate__icon {
            background: var(--swc-gold);
        }

        .swc-migrate__icon .swc-icon {
            width: 34px;
            height: 34px;
            stroke-width: 2.3;
            stroke: currentColor;
        }

        .swc-migrate__box h3 {
            margin: 0 0 13px;
            color: var(--swc-navy);
            font-size: 28px;
            font-weight: 700;
            line-height: 1.28;
            text-transform: uppercase;
        }

        .swc-migrate__box--orange h3 {
            color: #c2410c;
        }

        .swc-check-list {
            flex: 1;
            list-style: none;
            margin: 0 auto 18px;
            padding: 0;
            max-width: 340px;
            text-align: left;
        }

        .swc-check-list li {
            position: relative;
            margin: 0 0 9px;
            padding-left: 28px;
            color: var(--swc-ink);
            font-size: 19px;
            line-height: 1.48;
        }

        .swc-check-list li::before {
            content: "";
            position: absolute;
            left: 0;
            top: 2px;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: var(--swc-green);
        }

        .swc-check-list li::after {
            content: "";
            position: absolute;
            left: 6px;
            top: 6px;
            width: 6px;
            height: 10px;
            border: solid #fff;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }

        .swc-card-copy {
            margin: 0 0 18px;
            color: var(--swc-ink);
            font-size: 19px;
            line-height: 1.55;
            flex: 1;
        }

        .swc-card-intro {
            margin: 0 0 14px;
            color: var(--swc-ink);
            font-size: 18px;
            line-height: 1.55;
        }

        .swc-migrate__box .swc-btn {
            width: 100%;
            min-height: 44px;
            margin-top: auto;
            padding: 10px 14px;
            font-size: 18px;
            max-width: 320px;
            margin-left: auto;
            margin-right: auto;
        }

        .swc-access {
            padding: 40px 0;
            background: var(--swc-bg);
            border-top: 1px solid var(--swc-line);
            border-bottom: 1px solid var(--swc-line);
        }

        .swc-access .swc-section-head {
            margin-top: 0;
        }

        .swc-access__grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 14px;
        }

        .swc-access__step {
            padding: 20px;
            border: 1px solid rgba(0, 40, 104, 0.1);
            border-radius: 8px;
            background: #fff;
        }

        .swc-access__num {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 34px;
            height: 34px;
            margin-bottom: 12px;
            border-radius: 50%;
            background: var(--swc-navy);
            color: #fff;
            font-weight: 900;
        }

        .swc-access__step h3 {
            margin: 0 0 8px;
            color: var(--swc-navy);
            font-size: 20px;
            line-height: 1.3;
            font-weight: 900;
        }

        .swc-access__step p {
            margin: 0;
            color: var(--swc-muted);
            font-size: 19px;
            line-height: 1.5;
        }

        .swc-compare-wrap {
            padding: 42px 0 46px;
        }

        .swc-compare-wrap .swc-section-head {
            margin-top: 0;
        }

        .swc-compare {
            width: 100%;
            max-width: 100%;
            background: #fff;
            border-radius: 8px;
            border: 1px solid rgba(0, 40, 104, 0.12);
            box-shadow: 0 16px 38px rgba(16, 35, 63, 0.08);
            overflow: hidden;
        }

        .swc-compare__mobile-stack {
            display: contents;
        }

        .swc-compare__legend {
            display: none;
        }

        .swc-compare__head {
            display: grid;
            grid-template-columns: minmax(0, 1fr) auto minmax(0, 1fr);
            align-items: stretch;
        }

        .swc-compare__h {
            padding: 15px 18px;
            color: #fff;
            font-size: clamp(14px, 2.8vw, 19px);
            font-weight: 900;
            text-align: center;
            text-transform: uppercase;
        }

        .swc-compare__h--then {
            grid-column: 1;
            background: var(--swc-navy);
        }

        .swc-compare__h--now {
            grid-column: 2 / 4;
            background: #12824c;
            color: #fff;
        }

        .swc-compare__list {
            display: flex;
            flex-direction: column;
        }

        .swc-compare__row {
            display: grid;
            grid-template-columns: minmax(0, 1fr) auto minmax(0, 1fr);
            align-items: center;
            column-gap: 12px;
            border-top: 1px solid var(--swc-line);
        }

        .swc-compare__row:nth-child(even) {
            background: #f9fbfd;
        }

        .swc-compare__then,
        .swc-compare__now {
            padding: 15px 18px;
            color: var(--swc-muted);
            font-size: clamp(16px, 2.5vw, 19px);
            line-height: 1.5;
            min-width: 0;
        }

        .swc-compare__then p,
        .swc-compare__now p {
            margin: 0;
        }

        .swc-compare__row-label {
            display: none;
            font-size: 12px;
            font-weight: 900;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            margin: 0 0 8px;
        }

        .swc-compare__row-label--then {
            color: var(--swc-navy);
        }

        .swc-compare__row-label--now {
            color: #12824c;
        }

        .swc-compare__arrow-wrap {
            display: flex;
            justify-content: center;
            padding: 4px 0;
        }

        .swc-compare__arrow-circle {
            flex-shrink: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #fff;
            border: 1px solid #c5cdd8;
            color: var(--swc-navy);
            box-sizing: border-box;
        }

        .swc-compare__arrow-svg {
            display: block;
            flex-shrink: 0;
        }

        .swc-compare strong {
            color: var(--swc-ink);
        }

        @media (max-width: 640px) {

            .swc-shopper-badge {
                /* top: -5%; */
                width: 150px;
                padding: 8px 10px;
            }

            .swc-shopper-badge__stars {
                display: flex;
                gap: 0px;
                color: var(--swc-gold);
                /* margin-bottom: 8px; */
            }

            .swc-shopper-badge__stars .swc-icon {
                width: 20px;
                height: 20px;
            }

            .swc-shopper-badge__title {
                font-size: 16px;
                line-height: 1.22;
            }

            .swc-shopper-badge__title span {
                display: block;
            }

            .swc-shopper-badge__title .rating-number {
                font-size: 24px;
            }

            .swc-shopper-badge__seal {
                gap: 4px;
                font-size: 14px;
            }

            .swc-shopper-badge__seal .swc-icon {
                width: 18px;
                height: 18px;
            }

            .swc-compare {
                overflow: visible;
                border: none;
                box-shadow: none;
                background: transparent;
                border-radius: 0;
            }

            .swc-compare__legend {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                gap: 8px 14px;
                margin: 0 0 18px;
                /* padding: 12px 14px; */
                background: rgba(255, 255, 255, 0.95);
                /* border: 1px solid var(--swc-line); */
                border-radius: 10px;
                /* box-shadow: 0 2px 12px rgba(16, 35, 63, 0.06); */
                font-size: 12px;
                font-weight: 800;
                letter-spacing: 0.04em;
                text-transform: uppercase;
                color: var(--swc-ink);
                line-height: 1.35;
                text-align: center;
            }

            .swc-compare__legend-intro {
                flex-basis: 100%;
                margin: 0 0 4px;
                font-size: 14px;
                font-weight: 400;
                letter-spacing: 0;
                text-transform: none;
                color: var(--swc-muted);
            }

            .swc-compare__legend-item {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                max-width: 100%;
            }

            .swc-compare__legend-swatch {
                width: 16px;
                height: 16px;
                border-radius: 5px;
                flex-shrink: 0;
                border: 1px solid rgba(0, 40, 104, 0.12);
                box-shadow: inset 0 0 0 2px rgba(255, 255, 255, 0.65);
            }

            .swc-compare__legend-item--then .swc-compare__legend-swatch {
                background: var(--swc-mint);
                box-shadow: inset 0 0 0 2px rgba(18, 130, 76, 0.35);
            }

            .swc-compare__legend-item--now .swc-compare__legend-swatch {
                background: var(--swc-sky);
                box-shadow: inset 0 0 0 2px rgba(0, 40, 104, 0.25);
            }

            .swc-compare__legend-sep {
                color: #94a3b8;
                font-weight: 700;
                user-select: none;
            }

            .swc-compare__head {
                display: none;
            }

            .swc-compare__list {
                padding: 0 2px;
                gap: 0;
            }

            .swc-compare__row {
                display: block;
                margin: 0 0 20px;
                padding: 0;
                border: none;
                background: transparent;
                box-shadow: none;
            }

            .swc-compare__row:nth-child(even) {
                background: transparent;
            }

            .swc-compare__mobile-stack {
                display: flex;
                flex-direction: column;
                position: relative;
                align-items: stretch;
                gap: 6px;
            }

            .swc-compare__row-label {
                display: block;
            }

            .swc-compare__then,
            .swc-compare__now {
                font-size: 18px;
                /* line-height: 1.5; */
                /* font-weight: 900; */
            }

            .swc-compare__then {
                order: 1;
                margin: 0;
                padding: 18px 22px;
                text-align: center;
                background: #fff;
                border: 1px solid rgba(0, 40, 104, 0.12);
                /* background-color: var(--swc-blue-light); */
                background-color: var(--swc-mint);
                border-radius: 12px;
                color: #12824c;
                /* border-bottom: none; */
            }

            .swc-compare__arrow-wrap {
                order: 2;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 0;
                /* margin: -22px 0; */
                padding: 0;
                position: relative;
                z-index: 2;
                pointer-events: none;
            }

            .swc-compare__arrow-circle {
                width: 44px;
                height: 44px;
                border: 1px solid #b0bac8;
                box-shadow: 0 2px 8px rgba(16, 35, 63, 0.12);
            }

            .swc-compare__arrow-svg {
                width: 24px;
                height: 24px;
                transform: rotate(90deg);
            }

            .swc-compare__now {
                order: 3;
                margin: 0;
                padding: 18px 16px;
                text-align: center;
                background: #fff;
                border: 1px solid rgba(0, 40, 104, 0.12);
                /* background-color: var(--swc-green-light); */
                background-color: var(--swc-sky);
                border-radius: 12px;
                color: var(--swc-navy);
                /* border-top: none; */
            }
        }

        .swc-compare__move {
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .swc-compare__move .swc-icon {
            width: 18px;
            height: 18px;
            color: var(--swc-red);
        }

        .swc-help {
            padding: 42px 0;
            background: linear-gradient(180deg, #eaf4ff 0%, #f7fbff 100%);
        }

        .swc-help__inner {
            text-align: center;
        }

        .swc-help__inner>h2 {
            margin: 0 0 26px;
            color: var(--swc-navy);
            font-size: 30px;
            line-height: 1.25;
            font-weight: 900;
            text-transform: uppercase;
        }

        .swc-help__intro {
            margin: -12px auto 28px;
            color: var(--swc-muted);
            font-size: 20px;
            line-height: 1.5;
        }

        .swc-help__cols {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 28px 32px;
            text-align: initial;
        }

        .swc-help__col {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            gap: 16px;
            min-width: 0;
            text-align: left;
        }

        .swc-help__icon {
            flex-shrink: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;
            margin: 0;
            border-radius: 50%;
            background: var(--swc-navy);
            color: #fff;
            box-shadow: 0 4px 14px rgba(0, 40, 104, 0.22);
        }

        .swc-help__icon .swc-icon {
            width: 30px;
            height: 30px;
            stroke-width: 2.05;
        }

        .swc-help__col h3 {
            margin: 0 0 7px;
            color: var(--swc-muted);
            font-size: 18px;
            font-weight: 900;
            text-transform: uppercase;
        }

        .swc-help__col p {
            flex: 1;
            min-width: 0;
            margin: 0;
            color: var(--swc-ink);
            font-size: 20px;
            line-height: 1.45;
        }

        .swc-trust {
            padding: 12px 0;
            background: var(--swc-navy);
            color: #fff;
        }

        .swc-trust__inner {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            gap: 10px 36px;
            padding: 0 18px;
            text-align: left;
        }

        .swc-trust__main {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            max-width: min(100%, 38rem);
            color: #fff;
        }



        .swc-trust__shield {
            display: flex;
            flex-shrink: 0;
            align-items: center;
            justify-content: center;
            color: #fff;
        }

        .swc-trust__shield-icon {
            width: 22px;
            height: 22px;
            stroke-width: 2.05;
        }

        .swc-trust p {
            margin: 0;
            font-size: clamp(14px, 1.9vw, 16px);
            font-weight: 500;
            line-height: 1.35;
            letter-spacing: 0.01em;
        }

        .swc-trust a {
            color: #fff !important;
        }

        .swc-trust__rating {
            display: inline-flex;
            flex-shrink: 0;
            align-items: center;
            gap: 8px;
            font-size: 30px;
        }

        .swc-trust__rating-stars {
            display: flex;
            align-items: center;
            gap: 3px;
        }

        .swc-trust__rating-stars .swc-trust__star {
            width: 22px;
            height: 22px;
            color: #ffc107;
        }

        .swc-trust__rating-value {
            font-size: 16px;
            font-weight: 800;
            letter-spacing: 0.02em;
            line-height: 1;
        }

        @media (max-width: 1670px) {
            .swc-shopper-badge {
                right: 0;
            }
        }

        @media (max-width: 1060px) {
            .swc-hero {
                overflow-x: hidden;
            }

            .swc-hero__grid {
                grid-template-columns: 1fr;
                gap: 22px;
            }

            .swc-hero__visual {
                order: -1;
                max-width: min(100%, 680px);
                width: 100%;
                margin: 0 auto;
                position: relative;
            }

            .swc-hero__frame {
                transform: none;
                left: 0;
                width: 100%;
            }

            .swc-hero__frame img {
                max-width: 100%;
                margin: 0 auto;
            }

            .swc-shopper-badge {
                /* position: relative;
                right: auto;
                top: auto;
                left: auto;
                width: 100%;
                max-width: 300px;
                margin: 14px auto 0; */
                right: 0;
            }

            .swc-hero__copy {
                max-width: 640px;
                margin: 0 auto;
                text-align: center;
            }

            .swc-hero__title {
                display: flex;
                flex-direction: column;
                align-items: center;
                width: 100%;
                max-width: 100%;
            }

            .swc-hero__title-line {
                order: 2;
            }

            .swc-hero__check {
                position: static;
                order: 1;
                margin-bottom: 16px;
            }

            .swc-hero__body {
                max-width: 34rem;
                margin-left: auto;
                margin-right: auto;
                text-align: center;
                color: var(--swc-navy);
            }

            .swc-hero__body p {
                /* text-wrap: balance; */
            }

            .swc-hero__logo {
                margin-left: auto;
                margin-right: auto;
            }

            .swc-hero__actions {
                justify-content: center;
                margin-left: auto;
                margin-right: auto;
                width: min(100%, 28rem);
            }

            .swc-hero__microcopy {
                margin: 14px auto 0;
                width: min(100%, 28rem);
                font-size: clamp(17px, 3.8vw, 20px);
            }

            .swc-migrate__grid {
                grid-template-columns: 1fr;
            }

            .swc-access__grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .swc-help__col {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        @media (max-width: 700px) {
            .swc-wrap {
                width: calc(100% - 24px);
            }

            .swc-hero {
                padding: 30px 0 40px;
            }

            .swc-hero__grid {
                gap: 26px;
            }

            .swc-hero__title {
                font-size: clamp(32px, 8.5vw, 48px);
            }

            .swc-hero__body p {
                font-size: clamp(18px, 4.2vw, 20px);
            }

            .swc-hero__actions {
                display: grid;
                grid-template-columns: 1fr;
            }

            .swc-btn {
                width: 100%;
            }

            .swc-section-head__inner {
                gap: 10px;
            }

            .swc-section-head h2 {
                font-size: 25px;
            }

            .swc-means__item h3 {
                min-height: auto;
            }

            .swc-access__grid,
            .swc-help__cols {
                grid-template-columns: 1fr;
                max-width: 440px;
                margin-left: auto;
                margin-right: auto;
            }

            .swc-help__col {
                justify-content: flex-start;
                flex-direction: row;
            }

            .swc-trust__inner {
                justify-content: center;
                text-align: center;
            }
        }

        @media (max-width: 440px) {
            .swc-hero__title {
                font-size: clamp(28px, 9vw, 36px);
            }

            .swc-hero__check {
                width: 56px;
                height: 56px;
            }

            .swc-hero__check .swc-icon {
                width: 32px;
                height: 32px;
            }

            .swc-hero__logo {
                width: min(150px, 52vw);
            }

            .swc-hero .swc-btn {
                font-size: clamp(15px, 3.8vw, 19px);
                padding: 12px 14px;
                line-height: 1.25;
            }

            .swc-migrate__box,
            .swc-access__step {
                padding: 18px;
            }
        }
    </style>

    <main class="new-layout-fullwidth swc-landing-page">
        <section class="swc-hero" aria-labelledby="swc-hero-heading">
            <div class="swc-wrap swc-hero__grid">
                <div class="swc-hero__copy">
                    <img class="swc-hero__logo" loading="lazy" src="<?php echo htmlspecialchars(base_url_site . $swc_shirtchamp['logo_relative'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($swc_shirtchamp['site'], ENT_QUOTES, 'UTF-8'); ?>">
                    <h1 id="swc-hero-heading" class="swc-hero__title">
                        <span class="swc-hero__title-line"><?php echo htmlspecialchars($swc_shirtchamp['brand_upper'], ENT_QUOTES, 'UTF-8'); ?></span>
                        <span class="swc-hero__title-line swc-hero__title-line--red">IS NOW</span>
                        <span class="swc-hero__title-line">BULKAPPAREL</span>
                        <span class="swc-hero__check" aria-hidden="true"><?php echo swc_landing_icon('check'); ?></span>
                    </h1>

                    <div class="swc-hero__visual swc-hero__visual--mobile">
                        <div class="swc-hero__frame">
                            <img
                                loading="lazy"
                                src="<?php echo htmlspecialchars($swc_shirtchamp['hero_image_relative'], ENT_QUOTES, 'UTF-8'); ?>"
                                alt="BulkApparel on a laptop with shipping boxes"
                                width="1000"
                                height="640">
                        </div>

                        <!-- Editable Shopper Approved badge. This is intentionally separate from the hero image. -->
                        <aside class="swc-shopper-badge" aria-label="Shopper Approved customer rating">
                            <div class="swc-shopper-badge__stars" aria-hidden="true">
                                <?php echo swc_landing_icon('star', 'swc-icon--star'); ?>
                                <?php echo swc_landing_icon('star', 'swc-icon--star'); ?>
                                <?php echo swc_landing_icon('star', 'swc-icon--star'); ?>
                                <?php echo swc_landing_icon('star', 'swc-icon--star'); ?>
                                <?php echo swc_landing_icon('star', 'swc-icon--star'); ?>
                            </div>
                            <p class="swc-shopper-badge__title"><span class="rating-number">55,000+</span><span class="rating-text">5-STAR RATINGS</span></p>
                            <div class="swc-shopper-badge__seal">
                                <img src="https://www.shopperapproved.com/images/gen-shopperapproved-logo.svg" alt="Shopper Approved logo">
                            </div>
                        </aside>
                    </div>


                    <div class="swc-hero__body">
                        <p>The transition is complete! Your account, orders, and history have been successfully moved to <a href="<?php echo base_url_site; ?>">BulkApparel.com</a>.</p>
                        <p>Thank you for being part of our journey. We’re excited to serve you from here on!</p>
                    </div>
                    <div class="swc-hero__actions">
                        <a class="swc-btn" href="<?php echo base_url_site; ?>">CONTINUE SHOPPING AT BULKAPPAREL →</a>
                    </div>
                    <p class="swc-hero__microcopy">Your new home for blank apparel.</p>
                </div>

                <div class="swc-hero__visual swc-hero__visual--desktop">
                    <div class="swc-hero__frame">
                        <img
                            loading="lazy"
                            src="<?php echo htmlspecialchars($swc_shirtchamp['hero_image_relative'], ENT_QUOTES, 'UTF-8'); ?>"
                            alt="BulkApparel on a laptop with shipping boxes"
                            width="1000"
                            height="640">
                    </div>

                    <!-- Editable Shopper Approved badge. This is intentionally separate from the hero image. -->
                    <aside class="swc-shopper-badge" aria-label="Shopper Approved customer rating">
                        <div class="swc-shopper-badge__stars" aria-hidden="true">
                            <?php echo swc_landing_icon('star', 'swc-icon--star'); ?>
                            <?php echo swc_landing_icon('star', 'swc-icon--star'); ?>
                            <?php echo swc_landing_icon('star', 'swc-icon--star'); ?>
                            <?php echo swc_landing_icon('star', 'swc-icon--star'); ?>
                            <?php echo swc_landing_icon('star', 'swc-icon--star'); ?>
                        </div>
                        <p class="swc-shopper-badge__title"><span class="rating-number">55,000+</span><span class="rating-text">5-STAR RATINGS</span></p>
                        <div class="swc-shopper-badge__seal">
                            <img src="https://www.shopperapproved.com/images/gen-shopperapproved-logo.svg" alt="Shopper Approved logo">
                        </div>
                    </aside>
                </div>
            </div>
        </section>

        <div class="swc-wrap swc-section-head">
            <div class="swc-section-head__inner">
                <h2>What This Means For You</h2>
            </div>
        </div>

        <section class="swc-wrap swc-means" aria-labelledby="swc-means-title">
            <h2 id="swc-means-title" class="swc-visually-hidden">Benefits of the transition</h2>
            <div class="swiper-container swc-means__swiper" data-swc-means-swiper>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="swc-means__item">
                            <div class="swc-means__icon"><?php echo swc_landing_icon('shirt'); ?></div>
                            <h3>More Brands &amp; Deeper Inventory</h3>
                            <p>Access one of the largest selections of blank apparel and accessories.</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="swc-means__item">
                            <div class="swc-means__icon"><?php echo swc_landing_icon('tag'); ?></div>
                            <h3>Better Prices</h3>
                            <p>Lower pricing on hundreds of core items you rely on.</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="swc-means__item">
                            <div class="swc-means__icon"><?php echo swc_landing_icon('truck'); ?></div>
                            <h3>Faster Shipping</h3>
                            <p>23 warehouses mean quicker delivery across the U.S.</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="swc-means__item">
                            <div class="swc-means__icon"><?php echo swc_landing_icon('gift'); ?></div>
                            <h3>Rewards &amp; Savings</h3>
                            <p>Earn BulkBucks rewards and enjoy exclusive promotions.</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="swc-means__item">
                            <div class="swc-means__icon"><?php echo swc_landing_icon('user'); ?></div>
                            <h3>Improved Account Experience</h3>
                            <p>Track orders, save carts, and manage your account with ease.</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="swc-means__item">
                            <div class="swc-means__icon"><?php echo swc_landing_icon('headset'); ?></div>
                            <h3>Enhanced Support</h3>
                            <p>Our expanded team is here to provide fast, reliable assistance.</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination swc-means__pagination"></div>
            </div>
        </section>


        <section class="swc-wrap swc-migrate" aria-label="Account Actions">
            <div class="swc-migrate__grid">
                <article class="swc-migrate__box swc-migrate__box--green">
                    <div class="swc-migrate__icon" aria-hidden="true"><?php echo swc_landing_icon('login-arrow'); ?></div>
                    <h3>Already Have a BulkApparel Account?</h3>
                    <p class="swc-card-intro">Please log in to <br> merge your <?php echo htmlspecialchars($swc_shirtchamp['brand'], ENT_QUOTES, 'UTF-8'); ?> account.</p>
                    <ul class="swc-check-list">
                        <li>Use your existing login.</li>
                        <li>Your accounts will be merged.</li>
                        <li>All your information remains secure.</li>
                    </ul>
                    <a class="swc-btn" href="<?php echo base_url_site; ?>login">LOG IN TO MERGE ACCOUNTS →</a>
                </article>

                <article class="swc-migrate__box swc-migrate__box--blue">
                    <div class="swc-migrate__icon" aria-hidden="true"><?php echo swc_landing_icon('user-plus'); ?></div>
                    <h3>Don’t Have a BulkApparel Account?</h3>
                    <p class="swc-card-intro">Please create an account using your <?php echo htmlspecialchars($swc_shirtchamp['email_word'], ENT_QUOTES, 'UTF-8'); ?> email to view your order history.</p>
                    <ul class="swc-check-list">
                        <li>View past orders, track shipments, and reorder with ease.</li>
                        <li>All your order history will be available.</li>
                    </ul>
                    <a class="swc-btn" href="<?php echo base_url_site; ?>login#register">CREATE YOUR ACCOUNT →</a>
                </article>

                <article class="swc-migrate__box swc-migrate__box--orange">
                    <div class="swc-migrate__icon" aria-hidden="true"><?php echo swc_landing_icon('monitor-x'); ?></div>
                    <h3><?php echo htmlspecialchars($swc_shirtchamp['site'], ENT_QUOTES, 'UTF-8'); ?> Is No Longer Active</h3>
                    <p class="swc-card-copy">All shopping, account access, and support are now available only on BulkApparel.com.</p>
                    <p class="swc-card-copy">Please update your bookmarks!</p>
                </article>
            </div>
        </section>

        <section class="swc-wrap swc-compare-wrap" aria-labelledby="swc-compare-title">
            <div class="swc-section-head">
                <div class="swc-section-head__inner">
                    <h2 id="swc-compare-title">More of what you need</h2>
                </div>
            </div>

            <div class="swc-compare" role="region" aria-labelledby="swc-compare-title">
                <div class="swc-compare__legend" id="swc-compare-legend">
                    <span class="swc-compare__legend-item swc-compare__legend-item--then">
                        <span class="swc-compare__legend-swatch" aria-hidden="true"></span>
                        <span><?php echo htmlspecialchars($swc_shirtchamp['brand'], ENT_QUOTES, 'UTF-8'); ?> (then)</span>
                    </span>
                    <span class="swc-compare__legend-sep" aria-hidden="true">·</span>
                    <span class="swc-compare__legend-item swc-compare__legend-item--now">
                        <span class="swc-compare__legend-swatch" aria-hidden="true"></span>
                        <span>BulkApparel (now)</span>
                    </span>
                </div>
                <div class="swc-compare__head">
                    <div class="swc-compare__h swc-compare__h--then"><?php echo htmlspecialchars($swc_shirtchamp['brand'], ENT_QUOTES, 'UTF-8'); ?> (then)</div>
                    <div class="swc-compare__h swc-compare__h--now">BulkApparel (now)</div>
                </div>
                <div class="swc-compare__list">
                    <div class="swc-compare__row">
                        <div class="swc-compare__mobile-stack">
                            <div class="swc-compare__then">
                                <p>Limited inventory</p>
                            </div>
                            <div class="swc-compare__arrow-wrap"><?php echo swc_compare_arrow_circle(); ?></div>
                            <div class="swc-compare__now">
                                <p>Massive selection of brands &amp; styles</p>
                            </div>
                        </div>
                    </div>
                    <div class="swc-compare__row">
                        <div class="swc-compare__mobile-stack">
                            <div class="swc-compare__then">
                                <p>Fewer warehouses</p>
                            </div>
                            <div class="swc-compare__arrow-wrap"><?php echo swc_compare_arrow_circle(); ?></div>
                            <div class="swc-compare__now">
                                <p>23 warehouses = faster delivery</p>
                            </div>
                        </div>
                    </div>
                    <div class="swc-compare__row">
                        <div class="swc-compare__mobile-stack">
                            <div class="swc-compare__then">
                                <p>Basic account tools</p>
                            </div>
                            <div class="swc-compare__arrow-wrap"><?php echo swc_compare_arrow_circle(); ?></div>
                            <div class="swc-compare__now">
                                <p>Advanced dashboard &amp; order management</p>
                            </div>
                        </div>
                    </div>
                    <div class="swc-compare__row">
                        <div class="swc-compare__mobile-stack">
                            <div class="swc-compare__then">
                                <p>No rewards program</p>
                            </div>
                            <div class="swc-compare__arrow-wrap"><?php echo swc_compare_arrow_circle(); ?></div>
                            <div class="swc-compare__now">
                                <p>BulkBucks rewards &amp; exclusive discounts</p>
                            </div>
                        </div>
                    </div>
                    <div class="swc-compare__row">
                        <div class="swc-compare__mobile-stack">
                            <div class="swc-compare__then">
                                <p>Limited customer support</p>
                            </div>
                            <div class="swc-compare__arrow-wrap"><?php echo swc_compare_arrow_circle(); ?></div>
                            <div class="swc-compare__now">
                                <p>Larger support team &amp; more ways to connect</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="swc-help" aria-labelledby="swc-help-heading">
            <div class="swc-wrap swc-help__inner">
                <h2 id="swc-help-heading">NEED HELP? WE’RE HERE FOR YOU</h2>
                <p class="swc-help__intro">If you have any questions, our team is ready to assist.</p>
                <div class="swc-help__cols">
                    <div class="swc-help__col">
                        <div class="swc-help__icon"><?php echo swc_landing_icon('envelope'); ?></div>
                        <p><strong>Email:</strong><br> <a href="mailto:support@bulkapparel.com">support@bulkapparel.com</a></p>
                    </div>
                    <div class="swc-help__col">
                        <div class="swc-help__icon"><?php echo swc_landing_icon('phone'); ?></div>
                        <p><strong>Phone:</strong><br> <a href="tel:1-877-629-5110">1-877-629-5110</a></p>
                    </div>
                    <div class="swc-help__col">
                        <div class="swc-help__icon"><?php echo swc_landing_icon('message'); ?></div>
                        <p><strong>Live Chat:</strong><br> Available on <a href="<?php echo base_url_site . 'help-center'; ?>">BulkApparel.com</a> during business hours</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="swc-trust" aria-label="Customer trust">
            <div class="swc-wrap swc-trust__inner">
                <div class="swc-trust__main">
                    <span class="swc-trust__shield" aria-hidden="true"><?php echo swc_landing_icon('shield-check', 'swc-trust__shield-icon'); ?></span>
                    <p>Trusted by thousands of customers. 5-Star <a href="<?php echo 'https://www.shopperapproved.com/reviews/bulkapparel.com'; ?>">Shopper Approved</a>.</p>
                </div>
                <div class="swc-trust__rating">
                    <span class="swc-trust__rating-stars" aria-hidden="true">
                        <?php echo swc_landing_icon('star', 'swc-icon--star swc-trust__star'); ?>
                        <?php echo swc_landing_icon('star', 'swc-icon--star swc-trust__star'); ?>
                        <?php echo swc_landing_icon('star', 'swc-icon--star swc-trust__star'); ?>
                        <?php echo swc_landing_icon('star', 'swc-icon--star swc-trust__star'); ?>
                        <?php echo swc_landing_icon('star', 'swc-icon--star swc-trust__star'); ?>
                    </span>
                    <span class="swc-trust__rating-value">5.0</span>
                </div>
            </div>
        </section>
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var root = document.querySelector('[data-swc-means-swiper]');
            if (!root || typeof Swiper === 'undefined') {
                return;
            }
            new Swiper(root, {
                watchOverflow: true,
                speed: 600,
                loop: true,
                loopAdditionalSlides: 2,
                slidesPerView: 1,
                spaceBetween: 18,
                autoplay: {
                    delay: 2000,
                    disableOnInteraction: false,
                    pauseOnMouseEnter: true
                },
                breakpoints: {
                    700: {
                        slidesPerView: 3,
                        spaceBetween: 18
                    },
                    1060: {
                        slidesPerView: 6,
                        spaceBetween: 18,
                        autoplay: false,
                        loop: false
                    }
                },
                pagination: {
                    el: root.querySelector('.swc-means__pagination'),
                    clickable: true
                },
                a11y: {
                    enabled: true,
                    prevSlideMessage: 'Previous benefit',
                    nextSlideMessage: 'Next benefit',
                    paginationBulletMessage: 'Go to slide {{index}}'
                }
            });
        });
    </script>

    <?php include("./components/layout/footer.php"); ?>


</body>


</html>