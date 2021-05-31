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
                <div class="checkout-main">
                    <div class="card--checkout ">
                        <?php include('./includes/checkout-address.php') ?>
                        <?php include('./includes/checkout-shipping.php') ?>
                        <?php include('./includes/checkout-payment.php') ?>
                        <?php include('./includes/checkout-items.php') ?>
                    </div>
                    <div class="card--checkout mt-1">
                        <?php include('./includes/checkout-done.php') ?>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include('./components/layout/footer.php') ?>

    <script>
        var doneClass = 'checkout-done';
        var showClass = 'checkout-open';
        var checkoutAccountForm = $('#checkoutAccountForm');
        var checkoutPaymentForm = $('#checkoutPaymentForm');
        var checkoutShippingForm = $('#checkoutShippingForm');
        var checkoutItemForm = $('#checkoutItemsForm');   

        function toggleMarkDone(form, done) {
            if(done) {
                return form.addClass(doneClass);
            }
            form.removeClass(doneClass);
        }

        function toggleMarkShow(form, show) {
            if(show !== undefined && show) {
                form.addClass(showClass);
            } else if(show !== undefined && !show) {
                form.removeClass(showClass);
            } else {
                form.toggleClass(showClass)
            }
        }

        //  checkout account form
        function openAccountMethod() {
            toggleMarkShow(checkoutAccountForm, false);
        }

        checkoutAccountForm.find('.btn--secondary').click(function(){
            veritfyAccountDetails();
        })

        checkoutAccountForm.find('.arrow-down').click(function(){
            toggleMarkShow(checkoutAccountForm);
        })

        
        function veritfyAccountDetails() {
            toggleMarkDone(checkoutAccountForm, true);
            openShippingMethod();
        }


        // shipping account form 
        function openShippingMethod() {
            if(isFormDone(checkoutAccountForm)) {
                alert('Showing Shipping Form')
                toggleMarkShow(checkoutAccountForm, false);
                toggleMarkShow(checkoutShippingForm, true);
            }
        }

        checkoutShippingForm.find('.btn--secondary').click(function(){
            veritfyShippingDetails();
        })

        checkoutShippingForm.find('.arrow-down').click(function() {
            toggleMarkShow(checkoutShippingForm);
        })

        function veritfyShippingDetails() {
            toggleMarkDone(checkoutShippingForm, true);
            openPaymentMethod();
        }



        //  payment account form
        function openPaymentMethod() {
            if(isFormDone(checkoutShippingForm)) {
                alert('Showing Payment Form')
                toggleMarkShow(checkoutShippingForm, false);
                toggleMarkShow(checkoutPaymentForm, true);
            }
        }

        checkoutPaymentForm.find('.btn--secondary').click(function(){
            veritfyPaymentDetails();
        })

        checkoutPaymentForm.find('.arrow-down').click(function() {
            openPaymentMethod();
        })

        function veritfyPaymentDetails() {
            toggleMarkDone(checkoutPaymentForm, true);
            alert('Sending to database, finalizing the process..')
        }



        function isFormDone(form) {
            console.log(form, form.hasClass(doneClass))
            return form.hasClass(doneClass);
        }



        

        

    </script>
</body>


</html>