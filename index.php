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
    <link id="theme" rel="stylesheet" href="./css/themes/st-patrick-day.theme.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300&display=swap" rel="stylesheet">

</head>

<body>
    <?php include('./components/layout/header.php') ?>
    <main>
        <div class="container">
            <div class="product-container">
                <div class="product-container__header">
                    <h2>Rating & Reviewes</h2>
                </div>

                <div class="row">
                    <div class="col-4">
                        <?php include('./components/reviews/review-overall.php') ?>
                    </div>

                    <div class="col-4">
                        <div class="review-breakdown">
                            <h3 class="review-breakdown__title">Rating Breakdown</h3>
                            <?php include('./components/reviews/review-summary.php') ?>
                        </div>
                    </div>
                    
                    <div class="col-4">
                        <?php include('./components/reviews/review-recommended.php') ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include('./components/layout/footer.php') ?>
</body>


</html>