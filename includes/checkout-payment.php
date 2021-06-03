<div class="card--checkout-box" id="checkoutPaymentForm">
    <div class="card--checkout-box__header">

        <div class="card--checkout-box__header-icon">
            <?php $name = "payment";
            include('./includes/icons.php') ?>
        </div>

        <div class="card--checkout-box__header-body">
            <h2 class="card--checkout-box__header-title">
                Payment Method & Information
            </h2>

            <div class="card--checkout-box__header-text done-text">
                
            </div>
        </div>

        <div class="card--checkout-box__header-action">
            <button class="btn btn--secondary btn--secondary-invert save-continue">Place Order</button>
            <button class="btn card--checkout-box__arrow arrow-down">
                <?php $name = "chevron-down";
                include('./includes/icons.php') ?>
            </button>
        </div>
    </div>

    <div class="card__body">
        <div class="row no-gutters">
            <div class="col-8 d-flex mx-auto">
                <div class="payment-row">
                    <button class="btn payment-choice payment-choice-active" id="paymentCreditCardBtn">
                        <span class="payment-choice__icon">
                            <?php $name = "credit-card";
                            include('./includes/icons.php') ?>
                        </span>
                        <span class="payment-choice__text">
                            Credit card
                        </span>
                    </button>

                    <div class="payment-row__or">
                        or
                    </div>

                    <button class="btn payment-choice" id="paymentPaypalBtn">
                        <span class="payment-choice__icon">
                            <?php $name = "paypal";
                            include('./includes/icons.php') ?>
                        </span>
                        <span class="payment-choice__text">
                            Paypal
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="card__action">
        <button class="btn btn--secondary ml-auto">Place Order</button>
    </div>
</div>


<script>
    var paymentActiveClass = 'payment-choice-active';
    var paypalBtn = $("#paymentPaypalBtn");
    var creditCardBtn = $('#paymentCreditCardBtn');


    paypalBtn.click(function(){
        $(this).addClass(paymentActiveClass);
        creditCardBtn.removeClass(paymentActiveClass)
    })

    creditCardBtn.click(function(){
        $(this).addClass(paymentActiveClass);
        paypalBtn.removeClass(paymentActiveClass)
    })
</script>