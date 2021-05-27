<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/checkout.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link id="theme" rel="stylesheet" href="./css/themes/st-patrick-day.theme.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/star-rating-svg@3.5.0/src/css/star-rating-svg.min.css ">
</head>

<body id="page">
    <?php include('./components/layout/header.php') ?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js"></script>
    <main>
        <div class="container">
            <div class="checkout-page">
                <div class="card--checkout checkout-main">
                    <?php include('./includes/checkout-address.php') ?>
                    <?php include('./includes/checkout-payment.php') ?>

                </div>
            </div>
        </div>
    </main>

    <?php include('./components/layout/footer.php') ?>
</body>


</html>