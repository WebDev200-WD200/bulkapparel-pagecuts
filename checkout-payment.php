<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/checkout-payment.css">
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
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300&display=swap" rel="stylesheet">
</head>

<body>

    <?php

    define('base_url_site', 'https://dev8888.bulkapparel.com/')

    ?>

    <div class="container">

        <div class="payment-method-box ">

            <div class="payment-method-box__method payment-devices--non-apple has-googlepay has-applepay">

                <div class="payment-choice payment-choice--paypal">
                    <button class="btn payment-button payment-button--paypal">
                        Pay with Paypal
                    </button>
                </div>

                <div class="payment-choice payment-choice--google-pay" style="display:none;">
                    <button class="btn payment-button payment-button--google-pay">
                        <img src="<?= base_url_site . 'images/payment/google-pay.svg' ?>" alt="Pay with google">
                    </button>
                </div>

                <div class="payment-choice payment-choice--apple-pay" style="display:none;">
                    <button class="btn payment-button payment-button--apple-pay">
                        <img src="<?= base_url_site . 'images/payment/buy-with-apple-pay.jpg' ?>" alt="Pay with apple">
                    </button>
                </div>

            </div>

            <p class="payment-method-box__card-info">
                or enter your card info below
            </p>
        </div>
    </div>



    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.4/jspdf.plugin.autotable.min.js"></script> -->
</body>


</html>