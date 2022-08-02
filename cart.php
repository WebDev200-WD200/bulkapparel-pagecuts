<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/new-cart.css">
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
    <?php include('./components/layout/header.php') ?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <main>
        <div class="container">
            <div class="new-cart">
                <div class="new-cart-list">
                    <?php include('./components/cart/cart-group.php') ?>
                </div>
                <div class="new-cart-sidebar">
                    Cart Sidebar
                </div>
            </div>
        </div>
    </main>


    <div class="row no-gutters ml-3">
        <div class="col-auto d-flex justify-content-center flex-column mr-4">
            <b>Resale:</b>
        </div>
        <div class="col-auto d-flex justify-content-end flex-column mr-3">
            <label style="line-height: .5;" class="text-secondary" for=""><small>Status</small></label>
            <p>Pending</p>
        </div>
        <div class="col-auto d-flex justify-content-end flex-column mr-3">
            <label style="line-height: .5;" class="text-secondary" for=""><small>Resale# Acct</small></label>
            <p>srTwoOne111</p>
        </div>
        <div class="col-auto d-flex justify-content-end flex-column mr-3">
            <label style="line-height: .5;" class="text-secondary" for=""><small>Resale# Checkout</small></label>
            <p>srTwoOne111</p>
        </div>
        <div class="col-auto d-flex justify-content-end flex-column">
            <label style="line-height: .5;" class="text-secondary" for=""><small>Resale Permit</small></label>
            <p>1658705714sellerspermit</p>
        </div>
    </div>


    <?php include('./components/layout/footer.php') ?>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.4/jspdf.plugin.autotable.min.js"></script> -->
</body>


</html>