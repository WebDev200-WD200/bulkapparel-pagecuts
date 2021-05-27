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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js"></script>
    <main>
        <div class="container" id="printThis">
            <div class="product-container">
                <div class="product-container__header">
                    <h2>Rating & Reviewes</h2>
                </div>

                <div class="product-container__content">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-4 mt-3 mt-md-2 mt-lg-0">
                            <?php include('./components/reviews/review-overall.php') ?>
                        </div>

                        <div class="col-12 col-md-6 col-lg-4 mt-1 mt-md-2 mt-lg-0">
                            <div class="review-breakdown">
                                <h3 class="review-breakdown__title">Rating Breakdown</h3>
                                <?php include('./components/reviews/review-summary.php') ?>
                            </div>
                        </div>

                        <div class="col-12 col-md-12 mt-md-3 col-lg-0 col-lg-4 mt-2 mt-md-2 mt-lg-0 ">
                            <?php include('./components/reviews/review-recommended.php') ?>
                        </div>
                    </div>
                </div>
                <div class="row product-container__scales">
                    <div class="col-4 col-md-4 col-lg-3 mb-2 mb-md-3 mb-lg-0">
                        <?php include('./components/reviews/scales/fit-scales-graph.php') ?>
                    </div>
                    <div class="col-4 col-md-4 col-lg-3 mb-2 mb-md-3 mb-lg-0">
                        <?php include('./components/reviews/scales/shrinkage-graph.php') ?>
                    </div>
                    <div class="col-4 col-md-4 col-lg-3 mb-2 mb-md-3 mb-lg-0">
                        <?php include('./components/reviews/scales/product-softness-graph.php') ?>
                    </div>
                    <div class="col-4 col-md-4 col-lg-3 mb-2 mb-md-3 mb-lg-0">
                        <?php include('./components/reviews/scales/product-durability-graph.php') ?>
                    </div>
                    <div class="col-4 col-md-4 col-lg-3 mb-2 mb-md-3 mb-lg-0">
                        <?php include('./components/reviews/scales/material-quality-graph.php') ?>
                    </div>
                    <div class="col-4 col-md-4 col-lg-3 mb-2 mb-md-3 mb-lg-0">
                        <?php include('./components/reviews/scales/value-money-graph.php') ?>
                    </div>
                    <div class="col-6 col-md-6 col-lg-3 mb-0 mb-md-3 px-0 mb-lg-0">
                        <?php include('./components/reviews/review-primary-usage-pie-graph.php') ?>
                    </div>
                    <div class="col-6 col-md-6 col-lg-3 mb-0 mb-md-3 px-0 mb-lg-0">
                        <?php include('./components/reviews/customization-pie-graph.php') ?>
                    </div>
                </div>
                <?php include('./components/reviews/review-conversation.php') ?>

            </div>
        </div>
        <button class="btn btn--primary" id="print">Hello World click this</button>
    </main>
    <?php include('./components/layout/footer.php') ?>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.4/jspdf.plugin.autotable.min.js"></script> -->
    <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/star-rating-svg@3.5.0/dist/jquery.star-rating-svg.min.js"></script>
    <script>
        $(".star-rating-comment").starRating({
            initialRating: 4,
            activeColor: '#013068',
            strokeWidth: 10,
            starSize: 25,
            ratedColor: '#013068',
            readOnly: true,
            useFullStar: true,
            useGradient: false
        });
        $(".star-overall").starRating({
            initialRating: 4,
            activeColor: '#013068',
            ratedColor: '#013068',
            strokeWidth: 10,
            starSize: 35,
            useFullStar: true,
            readOnly: true,
            useGradient: false
        });

        var opt = {
            margin: 0,
            filename: 'myfile.pdf',
            image: {
                type: 'jpeg',
                quality: 0.98
            },
            html2canvas: {
                scale: 2
            },
            jsPDF: {
                unit: 'in',
                format: 'letter',
                orientation: 'portrait'
            }
        }

        function downloadPdf() {
            var element = document.getElementById('printThis');
            var worker = html2pdf();
            worker.set(opt).from(element).toImg().toPdf().save();
        }

        $('#print').click(function() {
            downloadPdf()
        })
    </script>
</body>


</html>