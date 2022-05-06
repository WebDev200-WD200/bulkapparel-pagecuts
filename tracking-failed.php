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
    <link rel="stylesheet" href="css/tracking.css" />
    <!-- <link rel="stylesheet" href="./css/themes/themes.min.css"> -->
    <!-- Hallooween theme -->
    <!-- <link rel="stylesheet" href="./css/themes/halloween-theme.min.css"> -->

    <!-- Thanks giving theme-->
    <!-- <link id="theme" rel="stylesheet" href="./css/themes/christmas-theme.css"> -->

    <!-- New year theme-->
    <!-- <link id="theme" rel="stylesheet" href="./css/themes/new-year.theme.css"> -->
    <!-- New year theme-->

    <!-- <link id="theme" rel="stylesheet" href="./css/themes/valentines.theme.css"> -->
    <link id="theme" rel="stylesheet" href="./css/themes/independence-day.theme.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/star-rating-svg@3.5.0/src/css/star-rating-svg.min.css ">
</head>

<body>
    <?php include('./components/layout/header.php') ?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <main>

        <div class="container mt-1 mb-2">
            <div class="row no-gutters">
                <div class="col-md-12 col-lg-10 pr-md-0 pr-lg-1">
                    <div class="row">
                        <!-- Tracking Summary Start -->
                        <div class="col-12">
                            <div class="card--track tracking-summary">
                                <div class="tracking-summary__main">
                                    <button class="btn tracking-summary__remove">
                                        Remove <span>✖</span>
                                    </button>

                                    <h2 class="tracking-summary__number">
                                        <span>Tracking Number:</span> 940011189852489209387
                                    </h2>

                                    <div class="tracking-summary__status error mt-2 mt-lg-3">
                                        <span class="chip">Status</span>
                                        <h3>Label Created, not yet in system</h3>
                                    </div>

                                    <ul class="tracking-summary__progress">
                                        <li class="track-error">
                                            <div class="track-bread">
                                                <div class="track-bread__icon">
                                                    <svg width="35" height="34" viewBox="0 0 35 34" fill="000" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4.53027 30.8721L6.66924 28.7853L8.80821 30.8721L10.9472 28.7853L13.0861 30.8721L15.2251 28.7853L17.3641 30.8721L19.5031 28.7853L21.642 30.8721L23.781 28.7853L25.92 30.8721L28.0589 28.7853L30.1979 30.8721V3.0481L28.0589 5.13489L25.92 3.0481L23.781 5.13489L21.642 3.0481L19.5031 5.13489L17.3641 3.0481L15.2251 5.13489L13.0861 3.0481L10.9472 5.13489L8.80821 3.0481L6.66924 5.13489L4.53027 3.0481V30.8721ZM25.92 12.7865H8.80821V10.0041H25.92V12.7865ZM25.92 18.3513H8.80821V15.5689H25.92V18.3513ZM25.92 23.9161H8.80821V21.1337H25.92V23.9161Z" />
                                                    </svg>
                                                </div>

                                                <div class="track-bread__label">
                                                    <h4>Label Created,<br>not yet in system</h4>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="">
                                            <div class="track-bread">
                                                <div class="track-bread__icon">
                                                    <svg width="32" height="31" viewBox="0 0 32 31" fill="000" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M23.8622 14.7082H19.77C19.2295 13.2558 17.814 12.204 16.1411 12.204C14.4681 12.204 13.0526 13.2558 12.5121 14.7082H8.4199C7.99523 14.7082 5.84618 14.583 5.84618 12.204V10.9519C5.84618 8.66062 7.82794 8.44777 8.4199 8.44777H21.5201C22.0606 9.90018 23.4762 10.9519 25.1491 10.9519C26.173 10.9519 27.1549 10.5562 27.8789 9.85175C28.6029 9.14732 29.0096 8.19191 29.0096 7.19569C29.0096 6.19948 28.6029 5.24406 27.8789 4.53963C27.1549 3.8352 26.173 3.43945 25.1491 3.43945C23.4762 3.43945 22.0606 4.4912 21.5201 5.94361H8.4199C6.34805 5.94361 3.27246 7.27082 3.27246 10.9519V12.204C3.27246 15.8851 6.34805 17.2123 8.4199 17.2123H12.5121C13.0526 18.6647 14.4681 19.7165 16.1411 19.7165C17.814 19.7165 19.2295 18.6647 19.77 17.2123H23.8622C24.2869 17.2123 26.4359 17.3375 26.4359 19.7165V20.9686C26.4359 23.2599 24.4542 23.4727 23.8622 23.4727H10.762C10.2215 22.0203 8.80596 20.9686 7.13304 20.9686C6.10915 20.9686 5.1272 21.3643 4.4032 22.0687C3.6792 22.7732 3.27246 23.7286 3.27246 24.7248C3.27246 25.721 3.6792 26.6764 4.4032 27.3809C5.1272 28.0853 6.10915 28.481 7.13304 28.481C8.80596 28.481 10.2215 27.4293 10.762 25.9769H23.8622C25.9341 25.9769 29.0096 24.6372 29.0096 20.9686V19.7165C29.0096 16.0479 25.9341 14.7082 23.8622 14.7082ZM25.1491 5.94361C25.4904 5.94361 25.8177 6.07553 26.059 6.31034C26.3004 6.54515 26.4359 6.86362 26.4359 7.19569C26.4359 7.52776 26.3004 7.84623 26.059 8.08104C25.8177 8.31586 25.4904 8.44777 25.1491 8.44777C24.8078 8.44777 24.4805 8.31586 24.2391 8.08104C23.9978 7.84623 23.8622 7.52776 23.8622 7.19569C23.8622 6.86362 23.9978 6.54515 24.2391 6.31034C24.4805 6.07553 24.8078 5.94361 25.1491 5.94361ZM7.13304 25.9769C6.79174 25.9769 6.46443 25.845 6.22309 25.6102C5.98176 25.3753 5.84618 25.0569 5.84618 24.7248C5.84618 24.3927 5.98176 24.0743 6.22309 23.8394C6.46443 23.6046 6.79174 23.4727 7.13304 23.4727C7.47434 23.4727 7.80165 23.6046 8.04299 23.8394C8.28432 24.0743 8.4199 24.3927 8.4199 24.7248C8.4199 25.0569 8.28432 25.3753 8.04299 25.6102C7.80165 25.845 7.47434 25.9769 7.13304 25.9769Z" />
                                                    </svg>
                                                </div>

                                                <div class="track-bread__label">
                                                    <h4>In Transit</h4>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="">
                                            <div class="track-bread">
                                                <div class="track-bread__icon">
                                                    <svg width="30" height="30" viewBox="0 0 30 30" fill="000" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M3.78958 5.10522C3.14388 5.10522 2.52463 5.36173 2.06806 5.8183C1.61148 6.27488 1.35498 6.89413 1.35498 7.53982V20.9301H3.78958C3.78958 21.8987 4.17433 22.8275 4.8592 23.5124C5.54406 24.1973 6.47293 24.582 7.44148 24.582C8.41002 24.582 9.3389 24.1973 10.0238 23.5124C10.7086 22.8275 11.0934 21.8987 11.0934 20.9301H18.3972C18.3972 21.8987 18.7819 22.8275 19.4668 23.5124C20.1517 24.1973 21.0805 24.582 22.0491 24.582C23.0176 24.582 23.9465 24.1973 24.6314 23.5124C25.3162 22.8275 25.701 21.8987 25.701 20.9301H28.1356V14.8436L24.4837 9.97442H20.8318V5.10522H3.78958ZM12.3107 7.53982L17.1799 12.409L12.3107 17.2782V13.6263H5.00688V11.1917H12.3107V7.53982ZM20.8318 11.8004H23.875L26.2731 14.8436H20.8318V11.8004ZM7.44148 19.1042C7.92575 19.1042 8.39019 19.2965 8.73262 19.639C9.07505 19.9814 9.26743 20.4458 9.26743 20.9301C9.26743 21.4144 9.07505 21.8788 8.73262 22.2213C8.39019 22.5637 7.92575 22.7561 7.44148 22.7561C6.95721 22.7561 6.49277 22.5637 6.15034 22.2213C5.8079 21.8788 5.61553 21.4144 5.61553 20.9301C5.61553 20.4458 5.8079 19.9814 6.15034 19.639C6.49277 19.2965 6.95721 19.1042 7.44148 19.1042ZM22.0491 19.1042C22.5333 19.1042 22.9978 19.2965 23.3402 19.639C23.6826 19.9814 23.875 20.4458 23.875 20.9301C23.875 21.4144 23.6826 21.8788 23.3402 22.2213C22.9978 22.5637 22.5333 22.7561 22.0491 22.7561C21.5648 22.7561 21.1004 22.5637 20.7579 22.2213C20.4155 21.8788 20.2231 21.4144 20.2231 20.9301C20.2231 20.4458 20.4155 19.9814 20.7579 19.639C21.1004 19.2965 21.5648 19.1042 22.0491 19.1042Z" />
                                                    </svg>
                                                </div>

                                                <div class="track-bread__label">
                                                    <h4>Out for Delivery</h4>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="track-bread">
                                                <div class="track-bread__icon">
                                                    <svg width="27" height="30" viewBox="0 0 27 30" fill="000" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M24.819 18.0766V7.73926L12.5462 0.653564L0.273438 7.73926V21.9106L12.5462 28.9963L15.8111 27.1114C16.9707 28.2969 18.5869 29.034 20.3723 29.034C23.8919 29.034 26.7553 26.1706 26.7553 22.651C26.7553 20.8588 26.0125 19.2371 24.819 18.0766ZM12.5462 2.57623L22.3213 8.2199L18.2664 10.5611L8.49124 4.9174L12.5462 2.57623ZM11.7136 26.5929L1.93857 20.9493V9.66198L11.7136 15.3056V26.5929ZM2.77114 8.2199L6.82611 5.87873L16.6012 11.5224L12.5462 13.8636L2.77114 8.2199ZM13.3788 26.5929V15.3056L23.1539 9.66192V16.9068C22.3126 16.4977 21.3688 16.2681 20.3723 16.2681C16.8527 16.2681 13.9893 19.1315 13.9893 22.6511C13.9893 23.783 14.2858 24.8469 14.8048 25.7697L13.3788 26.5929ZM20.3723 27.3689C17.7709 27.3689 15.6544 25.2524 15.6544 22.651C15.6544 20.0496 17.7709 17.9332 20.3723 17.9332C22.9737 17.9332 25.0902 20.0496 25.0902 22.651C25.0902 25.2524 22.9738 27.3689 20.3723 27.3689Z" />
                                                        <path d="M22.3441 20.2323L19.6178 22.9736L18.3966 21.7648L17.2252 22.9481L19.627 25.3257L23.5247 21.4064L22.3441 20.2323Z" />
                                                    </svg>
                                                </div>

                                                <div class="track-bread__label">
                                                    <h4>Order Delivered</h4>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>

                                    <p class="tracking-summary__message mt-4">
                                        A status update is not yet avaiable on your package. It will be avaiblalbe when the shipper provides an update or the package is delivered to USPS. Check back soon.
                                        <br><br>
                                        Sign up for informed delivery to recieve notifcations for packages addressed to you.
                                        <br><br>
                                        If you’d like to see the trackling information for an item sent in the past, <a href="">click here</a>
                                    </p>
                                </div>


                            </div>
                        </div>
                        <!-- Tracking Summary End -->

                    </div>
                </div>

                <div class="col-lg-2 d-md-none d-lg-block">
                    <!-- Tracking Sidebar Ads Start -->
                    <div class="card--track sp-offer">
                        <h3 style="font-size:17pt"> Testing Spring Coupons</h3>
                        <div class="sp-offer-box">
                            <h2>"Spring5"</h2>
                            <h3>$5 off $65</h3>
                        </div>
                        <h4 style="float:left; width:100%; text-align:center; color:#44414F; margin: 0px 0px; font-size:16px; font-weight:100;">OR</h4>
                        <div class="sp-offer-box">
                            <h2>"Spring10"</h2>
                            <h3>$10 off $175</h3>
                        </div>
                        <h5>
                            <p style="text-align:center">Coupon expires 05/30/20</p>
                        </h5>
                        <h5>
                            <p style="text-align:center">*Not Valid with any other offers</p>
                        </h5>
                        <h5><br></h5>
                        <h2>Volume Discounts</h2>
                        <h4>Starting From</h4>
                        <h4 style="float:left; width:100%;color:#d83939;text-align:left;font-size:18px;font-weight:500;margin-left:14px">Save 5% Over $250<br>Save 7% Over $500<br>Save 10% Over $1,000<br>Save 12% Over $2,500<br>Save 14% Over $5,000</h4>
                        <h5><br></h5>
                        <br>
                        <h5>
                            <p style="text-align:center">** All warehouses are currently</p>
                        </h5>
                        <h4>
                            <p style="text-align:center;font-size:16px;color:green;font-weight:600"> operating as normal.</p>
                        </h4>
                        <h5>
                            <p style="text-align:center;font-size:13px;color:navy"> We will offer customer support by Chat and Email only.</p>
                            <p style="text-align:center;font-size:14px;color:Green"> All orders are being processsed and shipped at this time.**</p>
                        </h5>
                        <h3><a href="https://300dev.bulkapparel.com/generate_coupon?code=SALEANDSAVE" style="font-size: 15px;color: #d83939;margin: auto;">PROMO : SALEANDSAVE</a></h3>
                    </div>
                    <!-- Tracking Sidebar Ads End -->
                </div>


            </div>
        </div>

    </main>
    <?php include('./components/layout/footer.php') ?>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.4/jspdf.plugin.autotable.min.js"></script> -->
</body>


</html>