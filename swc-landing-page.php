<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShirtChamp is now BulkApparel</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">

    <?php const base_url_site = "https://www.bulkapparel.com/"; ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="assets/js/bootstrap-modal.js"></script>

    <style>
        /* SWC transition landing — scoped inline styles */
        .swc-landing {
            --swc-navy: #002868;
            --swc-red: #c41e3a;
            --swc-red-dark: #a01830;
            --swc-green-check: #22a559;
            --swc-mint: #e8f5e9;
            --swc-sky: #e3f2fd;
            --swc-peach: #fff3e0;
            --swc-text: #0f2947;
            --swc-muted: #4a5f78;
            font-family: "Roboto Condensed", system-ui, -apple-system, sans-serif;
            color: var(--swc-text);
        }

        .swc-landing * { box-sizing: border-box; }

        .swc-landing main {
            overflow-x: hidden;
        }

        /* ----- Hero ----- */
        .swc-hero {
            background: linear-gradient(135deg, #eef2f7 0%, #f7f9fc 40%, #ffffff 100%);
            padding: 2.25rem 0 2.75rem;
            position: relative;
        }

        .swc-hero__grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            align-items: center;
            max-width: 1140px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .swc-hero__brand img {
            height: auto;
            max-width: 180px;
            margin-bottom: 1rem;
        }

        .swc-hero__title {
            font-size: clamp(1.35rem, 2.8vw, 2rem);
            font-weight: 800;
            line-height: 1.15;
            text-transform: uppercase;
            letter-spacing: 0.02em;
            margin: 0 0 1.25rem;
            display: flex;
            flex-wrap: wrap;
            align-items: flex-start;
            gap: 0.5rem 0.75rem;
        }

        .swc-hero__title .swc-t-navy { color: var(--swc-navy); }
        .swc-hero__title .swc-t-red { color: var(--swc-red); }

        .swc-hero__check {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 52px;
            height: 52px;
            border-radius: 50%;
            background: var(--swc-green-check);
            color: #fff;
            font-size: 1.5rem;
            flex-shrink: 0;
            box-shadow: 0 8px 20px rgba(34, 165, 89, 0.35);
        }

        .swc-hero__body p {
            font-size: 1.05rem;
            line-height: 1.65;
            color: var(--swc-text);
            margin-bottom: 1rem;
        }

        .swc-hero__body a.ba-link {
            color: var(--swc-navy);
            font-weight: 600;
        }

        .swc-cta {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            width: 100%;
            max-width: 420px;
            padding: 14px 22px;
            margin-top: 0.5rem;
            background: linear-gradient(180deg, #1a3d8f 0%, var(--swc-navy) 100%);
            color: #fff !important;
            font-weight: 700;
            font-size: 1.05rem;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            text-decoration: none;
            border-radius: 6px;
            border: none;
            transition: filter 0.15s ease, transform 0.15s ease;
        }

        .swc-cta:hover {
            filter: brightness(1.08);
            color: #fff !important;
        }

        .swc-hero__sub {
            margin-top: 0.85rem;
            font-size: 0.95rem;
            color: #2563eb;
            font-weight: 500;
        }

        .swc-hero__visual {
            position: relative;
            min-height: 200px;
        }

        .swc-hero__visual img {
            width: 100%;
            height: auto;
            display: block;
            border-radius: 12px;
            box-shadow: 0 20px 50px rgba(15, 41, 71, 0.12);
        }

        /* Editable Shopper Approved widget (not part of hero image) */
        .swc-shopper-badge {
            position: absolute;
            top: 12px;
            right: 12px;
            max-width: 220px;
            padding: 14px 16px;
            border-radius: 12px;
            background: linear-gradient(160deg, #dbeafe 0%, #ffffff 55%, #f8fafc 100%);
            border: 1px solid rgba(0, 40, 104, 0.12);
            box-shadow: 0 12px 32px rgba(15, 41, 71, 0.15);
            z-index: 2;
        }

        .swc-shopper-badge__stars {
            color: #e6b422;
            font-size: 0.95rem;
            letter-spacing: 2px;
            margin-bottom: 6px;
        }

        .swc-shopper-badge__title {
            font-size: 0.95rem;
            font-weight: 800;
            color: var(--swc-navy);
            line-height: 1.2;
            margin: 0 0 8px;
            text-transform: uppercase;
            letter-spacing: 0.02em;
        }

        .swc-shopper-badge__seal {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--swc-muted);
        }

        .swc-shopper-badge__seal i {
            color: #e6b422;
            font-size: 1.25rem;
        }

        @media (max-width: 991px) {
            .swc-hero__grid {
                grid-template-columns: 1fr;
            }
            .swc-hero__visual {
                order: -1;
            }
            .swc-shopper-badge {
                top: 16px;
                right: 16px;
            }
        }

        @media (max-width: 576px) {
            .swc-hero__check {
                width: 44px;
                height: 44px;
                font-size: 1.2rem;
            }
            .swc-shopper-badge {
                max-width: 200px;
                padding: 12px;
            }
        }

        /* ----- Section title with lines ----- */
        .swc-section-head {
            text-align: center;
            margin: 2.5rem auto 2rem;
            max-width: 1140px;
            padding: 0 15px;
        }

        .swc-section-head__inner {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .swc-section-head__inner::before,
        .swc-section-head__inner::after {
            content: "";
            flex: 1;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(0, 40, 104, 0.25), transparent);
        }

        .swc-section-head h2 {
            margin: 0;
            font-size: clamp(1.15rem, 2.5vw, 1.5rem);
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: var(--swc-navy);
            white-space: nowrap;
        }

        @media (max-width: 480px) {
            .swc-section-head h2 { white-space: normal; text-align: center; }
        }

        /* ----- Icon grid ----- */
        .swc-means {
            padding: 0 0 2.5rem;
            max-width: 1140px;
            margin: 0 auto;
            padding-left: 15px;
            padding-right: 15px;
        }

        .swc-means__grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 1.25rem 1rem;
        }

        .swc-means__item {
            text-align: center;
        }

        .swc-means__icon {
            width: 72px;
            height: 72px;
            margin: 0 auto 12px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fff;
            border: none;
            color: var(--swc-navy);
            font-size: 1.65rem;
        }

        .swc-means__item h3 {
            font-size: 0.95rem;
            font-weight: 700;
            color: var(--swc-navy);
            margin: 0 0 6px;
            line-height: 1.25;
        }

        .swc-means__item p {
            font-size: 0.85rem;
            line-height: 1.45;
            color: var(--swc-muted);
            margin: 0;
        }

        @media (max-width: 991px) {
            .swc-means__grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 576px) {
            .swc-means__grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        /* ----- Migration boxes ----- */
        .swc-migrate {
            padding: 0 15px 3rem;
            max-width: 1140px;
            margin: 0 auto;
        }

        .swc-migrate__grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.25rem;
        }

        .swc-migrate__box {
            border-radius: 14px;
            padding: 1.5rem 1.35rem;
            height: 100%;
            display: flex;
            flex-direction: column;
            text-align: center;
        }

        .swc-migrate__box--green { background: var(--swc-mint); border: 1px solid rgba(34, 165, 89, 0.2); }
        .swc-migrate__box--blue { background: var(--swc-sky); border: 1px solid rgba(25, 118, 210, 0.2); }
        .swc-migrate__box--orange { background: var(--swc-peach); border: 1px solid rgba(230, 126, 34, 0.25); }

        .swc-migrate__icon {
            font-size: 2rem;
            line-height: 1;
            color: var(--swc-navy);
            margin-bottom: 0.9rem;
        }

        .swc-migrate__box--orange .swc-migrate__icon {
            color: #ea580c;
        }

        .swc-migrate__box h3 {
            font-size: 0.95rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.03em;
            color: var(--swc-navy);
            margin: 0 0 1rem;
            line-height: 1.3;
        }

        .swc-migrate__box--orange h3 {
            color: #c2410c;
        }

        .swc-migrate__list {
            list-style: none;
            margin: 0 auto 1.25rem;
            padding: 0;
            flex: 1;
            text-align: left;
            max-width: 330px;
        }

        .swc-migrate__list li {
            position: relative;
            padding-left: 1.35rem;
            margin-bottom: 0.5rem;
            font-size: 0.92rem;
            line-height: 1.45;
            color: var(--swc-text);
        }

        .swc-migrate__list li::before {
            content: "\f00c";
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            position: absolute;
            left: 0;
            color: var(--swc-green-check);
            font-size: 0.85rem;
            top: 2px;
        }

        .swc-migrate__btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.35rem;
            width: 100%;
            max-width: 280px;
            padding: 11px 16px;
            background: linear-gradient(180deg, #1a3d8f 0%, var(--swc-navy) 100%);
            color: #fff !important;
            font-weight: 700;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.03em;
            text-decoration: none;
            border-radius: 6px;
            margin-top: auto;
            margin-left: auto;
            margin-right: auto;
        }

        .swc-migrate__btn:hover { filter: brightness(1.07); color: #fff !important; }

        .swc-migrate__note {
            font-size: 0.9rem;
            line-height: 1.55;
            color: var(--swc-text);
            margin: 0;
        }

        @media (max-width: 991px) {
            .swc-migrate__grid {
                grid-template-columns: 1fr;
            }
        }

        /* ----- Comparison table ----- */
        .swc-compare-wrap {
            padding: 0 15px 3rem;
            max-width: 900px;
            margin: 0 auto;
        }

        .swc-compare-wrap .swc-section-head {
            margin-top: 0;
        }

        .swc-compare {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 16px 40px rgba(15, 41, 71, 0.08);
            border: 1px solid rgba(0, 40, 104, 0.1);
        }

        .swc-compare th {
            padding: 14px 16px;
            font-size: 0.85rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            color: #fff;
            text-align: center;
        }

        .swc-compare th.swc-compare__then {
            background: var(--swc-navy);
        }

        .swc-compare th.swc-compare__now {
            background: var(--swc-red);
            box-shadow: inset 0 4px 0 0 #86efac;
        }

        .swc-compare td {
            padding: 14px 16px;
            font-size: 0.95rem;
            vertical-align: middle;
            border-bottom: 1px solid rgba(0, 40, 104, 0.08);
            text-align: center;
        }

        .swc-compare td .swc-compare__arrow {
            display: inline-block;
            margin: 0 0.35rem;
            color: #94a3b8;
            font-size: 0.8rem;
        }

        .swc-compare tr:nth-child(even) td {
            background: #f8fafc;
        }

        .swc-compare tr:last-child td {
            border-bottom: none;
        }

        .swc-landing .visually-hidden {
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

        @media (max-width: 576px) {
            .swc-compare th,
            .swc-compare td {
                padding: 10px 8px;
                font-size: 0.8rem;
            }
            .swc-compare thead {
                display: none;
            }
            .swc-compare tbody tr {
                display: block;
                margin-bottom: 1rem;
                border: 1px solid rgba(0, 40, 104, 0.12);
                border-radius: 10px;
                overflow: hidden;
            }
            .swc-compare tbody td {
                display: block;
                width: 100% !important;
                text-align: left;
                border-bottom: 1px solid rgba(0, 40, 104, 0.08);
            }
            .swc-compare tbody td:last-child {
                border-bottom: none;
            }
            .swc-compare tbody td::before {
                display: block;
                font-size: 0.7rem;
                font-weight: 800;
                text-transform: uppercase;
                letter-spacing: 0.05em;
                margin-bottom: 4px;
                color: #64748b;
            }
            .swc-compare tbody td:nth-child(1)::before {
                content: "ShirtChamp (then)";
            }
            .swc-compare tbody td:nth-child(2)::before {
                content: "BulkApparel (now)";
            }
        }

        /* ----- Help ----- */
        .swc-help {
            padding: 2.5rem 15px;
            background: linear-gradient(180deg, #e8f4fc 0%, #f0f7ff 100%);
        }

        .swc-help__inner {
            max-width: 1000px;
            margin: 0 auto;
            text-align: center;
        }

        .swc-help__inner > h2 {
            font-size: clamp(1.1rem, 2.2vw, 1.45rem);
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: var(--swc-navy);
            margin: 0 0 2rem;
        }

        .swc-help__cols {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
            text-align: center;
        }

        .swc-help__col i {
            font-size: 1.75rem;
            color: var(--swc-navy);
            margin-bottom: 10px;
        }

        .swc-help__col h3 {
            font-size: 0.8rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: var(--swc-muted);
            margin: 0 0 8px;
        }

        .swc-help__col p,
        .swc-help__col a {
            font-size: 0.95rem;
            margin: 0;
            color: var(--swc-text);
        }

        .swc-help__col a {
            font-weight: 600;
            color: var(--swc-navy);
        }

        @media (max-width: 768px) {
            .swc-help__cols {
                grid-template-columns: 1fr;
                gap: 1.75rem;
            }
        }

        /* ----- Trust footer strip ----- */
        .swc-trust {
            background: var(--swc-navy);
            color: #fff;
            padding: 1rem 15px;
        }

        .swc-trust__inner {
            max-width: 1140px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .swc-trust__text {
            font-size: 0.95rem;
            margin: 0;
        }

        .swc-trust__rating {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 700;
        }

        .swc-trust__rating .stars {
            color: #e6b422;
            letter-spacing: 3px;
        }

        @media (max-width: 576px) {
            .swc-trust__inner {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>
</head>

<body class="swc-landing">
    <?php include('./components/layout/header.php') ?>

    <main class="new-layout-fullwidth about-us-page">
        <!-- Hero -->
        <section class="swc-hero" aria-labelledby="swc-hero-heading">
            <div class="swc-hero__grid">
                <div class="swc-hero__copy">
                    <div class="swc-hero__brand">
                        <img loading="lazy" src="<?php echo base_url_site . 'images/shirtchamp_logo_transition.png'; ?>" alt="ShirtChamp.com">
                    </div>
                    <h1 id="swc-hero-heading" class="swc-hero__title">
                        <span class="swc-t-navy">ShirtChamp</span>
                        <span class="swc-t-red">is now fully</span>
                        <span class="swc-t-navy">part of BulkApparel</span>
                        <span class="swc-hero__check" aria-hidden="true"><i class="fa-solid fa-check"></i></span>
                    </h1>
                    <div class="swc-hero__body">
                        <p>We're excited that ShirtChamp is officially part of <a class="ba-link" href="https://www.bulkapparel.com">BulkApparel.com</a> — giving you one place for more inventory, sharper pricing, and faster shipping.</p>
                        <p>To keep things simple, ShirtChamp customer accounts move to BulkApparel on <strong>March 31, 2026</strong>. Same brands you trust; a bigger platform built for how you buy blanks.</p>
                    </div>
                    <a href="https://www.bulkapparel.com/" class="swc-cta">Continue shopping at BulkApparel <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
                    <p class="swc-hero__sub">Your new home for blank apparel.</p>
                </div>
                <div class="swc-hero__visual">
                    <img
                        loading="lazy"
                        src="https://www.bulkapparel.com/images/about-us/small_about-us-image.png"
                        alt="BulkApparel on a laptop with shipping boxes"
                        width="560"
                        height="360">
                    <aside class="swc-shopper-badge" aria-label="Customer ratings">
                        <div class="swc-shopper-badge__stars" aria-hidden="true">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                        </div>
                        <p class="swc-shopper-badge__title">55,000+ 5-star ratings</p>
                        <div class="swc-shopper-badge__seal">
                            <i class="fa-solid fa-certificate" aria-hidden="true"></i>
                            <span>Shopper Approved</span>
                        </div>
                    </aside>
                </div>
            </div>
        </section>

        <!-- What this means -->
        <header class="swc-section-head">
            <div class="swc-section-head__inner">
                <h2>What this means for you</h2>
            </div>
        </header>
        <section class="swc-means" aria-labelledby="swc-means-title">
            <h2 id="swc-means-title" class="visually-hidden">Benefits of the transition</h2>
            <div class="swc-means__grid">
                <div class="swc-means__item">
                    <div class="swc-means__icon"><i class="fa-solid fa-shirt" aria-hidden="true"></i></div>
                    <h3>More styles &amp; inventory</h3>
                    <p>Deep stock across core blanks and new arrivals.</p>
                </div>
                <div class="swc-means__item">
                    <div class="swc-means__icon"><i class="fa-solid fa-tag" aria-hidden="true"></i></div>
                    <h3>Sharper wholesale pricing</h3>
                    <p>Volume savings on the brands you already buy.</p>
                </div>
                <div class="swc-means__item">
                    <div class="swc-means__icon"><i class="fa-solid fa-truck-fast" aria-hidden="true"></i></div>
                    <h3>Faster nationwide shipping</h3>
                    <p>Multiple warehouses to get orders out quickly.</p>
                </div>
                <div class="swc-means__item">
                    <div class="swc-means__icon"><i class="fa-solid fa-star" aria-hidden="true"></i></div>
                    <h3>BulkBucks &amp; promos</h3>
                    <p>Rewards and deals designed for repeat buyers.</p>
                </div>
                <div class="swc-means__item">
                    <div class="swc-means__icon"><i class="fa-solid fa-id-badge" aria-hidden="true"></i></div>
                    <h3>One login &amp; profile</h3>
                    <p>Merged accounts when emails match (see boxes below).</p>
                </div>
                <div class="swc-means__item">
                    <div class="swc-means__icon"><i class="fa-solid fa-headset" aria-hidden="true"></i></div>
                    <h3>Expanded support</h3>
                    <p>Phone, email, and chat on BulkApparel.com.</p>
                </div>
            </div>
        </section>

        <!-- Account migration -->
        <section class="swc-migrate" aria-label="Account migration options">
            <div class="swc-migrate__grid">
                <div class="swc-migrate__box swc-migrate__box--green">
                    <div class="swc-migrate__icon" aria-hidden="true"><i class="fa-solid fa-user"></i></div>
                    <h3>Already have a BulkApparel account?</h3>
                    <ul class="swc-migrate__list">
                        <li>Use the same email as ShirtChamp when possible.</li>
                        <li>We'll merge eligible profiles on March 31, 2026.</li>
                        <li>Log in anytime to shop — no downtime.</li>
                    </ul>
                    <a class="swc-migrate__btn" href="https://www.bulkapparel.com/login">Log in to merge accounts <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
                </div>
                <div class="swc-migrate__box swc-migrate__box--blue">
                    <div class="swc-migrate__icon" aria-hidden="true"><i class="fa-solid fa-check"></i></div>
                    <h3>Don't have a BulkApparel account?</h3>
                    <ul class="swc-migrate__list">
                        <li>Create one now with your ShirtChamp email.</li>
                        <li>Start ordering immediately on BulkApparel.</li>
                        <li>Your history transfers where applicable after migration.</li>
                    </ul>
                    <a class="swc-migrate__btn" href="https://www.bulkapparel.com/login#register">Create your account <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
                </div>
                <div class="swc-migrate__box swc-migrate__box--orange">
                    <div class="swc-migrate__icon" aria-hidden="true"><i class="fa-solid fa-desktop"></i></div>
                    <h3>ShirtChamp.com is no longer active</h3>
                    <p class="swc-migrate__note">The ShirtChamp storefront has sunset; all shopping and account access continue on BulkApparel. Use the buttons here or visit BulkApparel.com.</p>
                </div>
            </div>
        </section>

        <!-- Comparison -->
        <section class="swc-compare-wrap" aria-labelledby="swc-compare-title">
            <header class="swc-section-head">
                <div class="swc-section-head__inner">
                    <h2 id="swc-compare-title">More of what you need</h2>
                </div>
            </header>
            <div style="overflow-x: auto;">
                <table class="swc-compare">
                    <thead>
                        <tr>
                            <th class="swc-compare__then" scope="col">ShirtChamp (then)</th>
                            <th class="swc-compare__now" scope="col">BulkApparel (now)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Focused blank assortment</td>
                            <td><i class="fa-solid fa-arrow-right-long swc-compare__arrow" aria-hidden="true"></i> <strong>Massive inventory</strong> — tees, fleece, workwear &amp; more</td>
                        </tr>
                        <tr>
                            <td>Single fulfillment footprint</td>
                            <td><i class="fa-solid fa-arrow-right-long swc-compare__arrow" aria-hidden="true"></i> <strong>Multiple warehouses</strong> for faster delivery</td>
                        </tr>
                        <tr>
                            <td>Core ordering tools</td>
                            <td><i class="fa-solid fa-arrow-right-long swc-compare__arrow" aria-hidden="true"></i> <strong>Modern cart, saved lists,</strong> quick reorder</td>
                        </tr>
                        <tr>
                            <td>Limited rewards</td>
                            <td><i class="fa-solid fa-arrow-right-long swc-compare__arrow" aria-hidden="true"></i> <strong>BulkBucks</strong> &amp; volume discounts</td>
                        </tr>
                        <tr>
                            <td>Standard support</td>
                            <td><i class="fa-solid fa-arrow-right-long swc-compare__arrow" aria-hidden="true"></i> <strong>Expanded team</strong> — phone, email &amp; chat</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Help -->
        <section class="swc-help" aria-labelledby="swc-help-heading">
            <div class="swc-help__inner">
                <h2 id="swc-help-heading">Need help? We're here for you</h2>
                <div class="swc-help__cols">
                    <div class="swc-help__col">
                        <i class="fa-solid fa-envelope" aria-hidden="true"></i>
                        <h3>Email</h3>
                        <p><a href="mailto:support@bulkapparel.com">support@bulkapparel.com</a></p>
                    </div>
                    <div class="swc-help__col">
                        <i class="fa-solid fa-phone" aria-hidden="true"></i>
                        <h3>Phone</h3>
                        <p><a href="tel:1-877-629-5110">1-877-629-5110</a></p>
                    </div>
                    <div class="swc-help__col">
                        <i class="fa-solid fa-comments" aria-hidden="true"></i>
                        <h3>Live chat</h3>
                        <p>Available on <a href="https://www.bulkapparel.com">BulkApparel.com</a> during business hours.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Trust strip -->
        <section class="swc-trust" aria-label="Customer trust">
            <div class="swc-trust__inner">
                <p class="swc-trust__text">Trusted by thousands of customers. 5-Star Shopper Approved.</p>
                <div class="swc-trust__rating">
                    <span class="stars" aria-hidden="true"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></span>
                    <span>5.0</span>
                </div>
            </div>
        </section>
    </main>

    <?php include('./components/layout/footer.php') ?>
</body>

</html>
