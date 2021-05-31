 <div class="card--checkout-box checkout-open" id="checkoutAccountForm">
     <div class="card--checkout-box__header">

         <div class="card--checkout-box__header-icon">
             <?php $name = "user";
                include('./includes/icons.php') ?>
         </div>

         <div class="card--checkout-box__header-body">
             <h2 class="card--checkout-box__header-title">
                 Account Details
             </h2>

             <div class="card--checkout-box__header-text  done-text">
                 <p>Shipping Address: Honolulu, HI 96814</p>
                 <p>Billing Address: Honolulu, HI 96814</p>
             </div>
         </div>

         <div class="card--checkout-box__header-action">
             <button class="btn btn--secondary btn--secondary-invert save-continue"> Save & Continue</button>
             <button class="btn card--checkout-box__arrow arrow-down">
                 <?php $name = "chevron-down";
                    include('./includes/icons.php') ?>
             </button>
         </div>
     </div>

     <div class="card__body">
         <div class="row no-gutters">
             <div class="col-12 col-lg-6 pr-1">
                 <a href="#" class="account-chooser">
                     <div class="account-chooser__icon">
                         <?php $name = "guest";
                            include('./includes/icons.php') ?>
                     </div>
                     <div class="account-chooser__body">
                         <h3 class="account-chooser__title">Continue as guest</h3>
                         <p class="account-chooser__text">using this option, you need to input your address manually</p>
                     </div>
                 </a>
             </div>
             <div class="col-12 col-lg-6">
                 <a href="#" class="account-chooser">
                     <div class="account-chooser__icon">
                         <?php $name = "login";
                            include('./includes/icons.php') ?>
                     </div>
                     <div class="account-chooser__body">
                         <h3 class="account-chooser__title">Login or Register</h3>
                         <p class="account-chooser__text">will automatically filled up all fields needed with your existing information.</p>
                     </div>
                 </a>
             </div>
         </div>
     </div>

     <div class="card__action">
        <button class="btn btn--secondary ml-auto">Save & Continue</button>
    </div>
 </div>