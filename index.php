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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/star-rating-svg@3.5.0/src/css/star-rating-svg.min.css ">
</head>

<body>
    <?php include('./components/layout/header.php') ?>
    <main>
        <div class="container">
            <div class="product-container">
                <div class="product-container__header">
                    <h2>Rating & Reviewes</h2>
                </div>

                <div class="product-container__content">
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
                <div class="row product-container__scales">
                    <div class="col-3">
                        <?php include('./components/reviews/review-scale-horizontal.php') ?>
                    </div>
                    <div class="col-3">
                        <?php include('./components/reviews/review-scale-horizontal.php') ?>
                    </div>
                    <div class="col-3">
                        <?php include('./components/reviews/review-scale-horizontal.php') ?>
                    </div>
                    <div class="col-3">
                        <?php include('./components/reviews/review-scale-horizontal.php') ?>
                    </div>
                    <div class="col-3">
                        <?php include('./components/reviews/review-scale-horizontal.php') ?>
                    </div>
                    <div class="col-3">
                        <?php include('./components/reviews/review-scale-horizontal.php') ?>
                    </div>
                    <div class="col-3">
                        <?php include('./components/reviews/review-graph.php') ?>
                    </div>
                    <div class="col-3">
                        <?php include('./components/reviews/review-graph.php') ?>
                    </div>
                </div>
                <?php include('./components/reviews/review-conversation.php') ?>

            </div>
        </div>
    </main>
    <?php include('./components/layout/footer.php') ?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/star-rating-svg@3.5.0/dist/jquery.star-rating-svg.min.js"></script>
    <script>
        $(".star-rating-comment").starRating({
            initialRating: 4,
            activeColor: '#013068',
            strokeWidth: 10,
            starSize: 25,
            readOnly: true,
            useFullStar: true,
        });
        $(".star-overall").starRating({
            initialRating: 4,
            activeColor: '#013068',
            strokeWidth: 10,
            starSize: 25,
            useFullStar: true,
            readOnly: true
        });
    </script>
</body>


</html>