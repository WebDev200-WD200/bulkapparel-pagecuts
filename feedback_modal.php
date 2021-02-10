<button class="btn btn--float-feedback" id="btn-feedback">
    Feedback
</button>
<div class="backdrop-new" id="modal-feedback" style="display:block;">
    <div class="modal__content">
        <div class="modal--feedback">
            <button class="btn modal__exit" id="exit-feedback">✖</button>

            <span id="feedback-main">
                <div class="modal__header">
                    <a href="#" class="modal__logo">
                        <img src="./images/logo.svg" alt="" draggable="">
                    </a>
                    <h1 class="modal__heading">Rate Your Experience?</h1>
                </div>

                <div class="modal__body mt-2 mt-lg-2">
                    <div class="row">
                        <div class="col-12 mb-lg-2">
                            <div class="input-group">
                                <div class="input-group__header">
                                    <label for="" class="input-group__label">Are you satisfied with the Service?</label>
                                </div>
                                <div id="rate-it"></div>
                                <input type="hidden" name="rating" value="5" id="rate-value">
                            </div>

                        </div>
                        <div class="col-12 mb-1 mb-lg-2">
                            <div class="input-group">
                                <div class="input-group__header">
                                    <label for="" class="input-group__label">Select a category best describe the nature
                                        of your feedback.</label>

                                </div>
                                <select class="inp inp--secondary" type="text" id="category" name="pemail" value=""
                                    placeholder="Please select any of the options">
                                    <option value="" hidden selected disabled>Please select any of the options</option>
                                    <option value="opt-1">Option 1</option>
                                    <option value="opt-2">Option 2</option>
                                    <option value="opt-3">Option 3</option>
                                    <option value="opt-4">Option 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 mb-2 mb-lg-3">
                            <div class="input-group">
                                <div class="input-group__header">
                                    <label for="" class="input-group__label">Care to share more?</label>
                                </div>
                                <p class="input-group__hint">How was your overall experience? What’s that one thing you
                                    won’t forget to this website?</p>
                                <textarea class="inp inp--secondary" type="text" id="pemail" name="pemail" value=""
                                    placeholder="Please enter your email address here"></textarea>
                            </div>
                        </div>
                        <div class="col-12 mb-1 mb-lg-2">
                            <div class="input-group">
                                <div class="input-group__header">
                                    <label for="" class="input-group__label">Enter your email address to recieved any
                                        reply to us about your feedback.</label>
                                </div>
                                <input class="inp inp--secondary" type="text" id="email" name="email" value=""
                                    placeholder="Please enter your email address here" autocomplete="false">
                            </div>
                        </div>
                        <div class="col-12 mb-1">
                            <button class="btn btn--feedback" id="feedback-submit">Send Feedback</button>
                        </div>
                    </div>

                    <div class="modal--feedback__footer">
                        <div class="separator"></div>
                        <p>
                            All users of our online services are subject to our <a href="/">Privacy Statement</a> and
                            agree to be bound by the <a href="/">Terms of Service</a>. Please do not submit personal or
                            account information. For all customer service questions visit or <a href="/">Help Center</a>
                        </p>
                    </div>

                </div>
            </span>
            <!-- If feedback is successfull show this -->
            <span id="feedback-success" style="display: none;">
                <div class="modal__header">
                    <a href="#" class="modal__logo">
                        <img src="./assets/img/logo.svg" alt="" draggable="">
                    </a>
                </div>

                <div class="modal__body mt-2 px-lg-3 px-2" style="text-align: center;">
                    <div class="modal--feedback__icon">
                        <svg viewBox="0 0 104 107" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M27.8519 10.0952C32.013 9.75433 35.9632 8.07496 39.14 5.29627C42.728 2.16063 47.287 0.438507 52 0.438507C56.713 0.438507 61.272 2.16063 64.86 5.29627C68.0367 8.07496 71.987 9.75433 76.1481 10.0952C80.8472 10.4806 85.259 12.5708 88.5924 15.9912C91.9257 19.4115 93.9628 23.9383 94.3384 28.7601C94.6683 33.028 96.3049 37.0836 99.0153 40.3426C102.071 44.0242 103.75 48.7021 103.75 53.5381C103.75 58.374 102.071 63.052 99.0153 66.7336C96.3073 69.9932 94.6706 74.0464 94.3384 78.3161C93.9628 83.1379 91.9257 87.6647 88.5924 91.085C85.259 94.5054 80.8472 96.5956 76.1481 96.9809C71.987 97.3218 68.0367 99.0012 64.86 101.78C61.272 104.916 56.713 106.638 52 106.638C47.287 106.638 42.728 104.916 39.14 101.78C35.9632 99.0012 32.013 97.3218 27.8519 96.9809C23.1528 96.5956 18.741 94.5054 15.4076 91.085C12.0742 87.6647 10.0372 83.1379 9.66161 78.3161C9.32938 74.0464 7.69271 69.9932 4.98466 66.7336C1.92874 63.052 0.250397 58.374 0.250397 53.5381C0.250397 48.7021 1.92874 44.0242 4.98466 40.3426C7.69271 37.083 9.32938 33.0297 9.66161 28.7601C10.0372 23.9383 12.0742 19.4115 15.4076 15.9912C18.741 12.5708 23.1528 10.4806 27.8519 10.0952V10.0952ZM75.9799 44.9557C77.1582 43.7039 77.8102 42.0272 77.7955 40.2869C77.7808 38.5465 77.1005 36.8817 75.9011 35.6511C74.7017 34.4204 73.0793 33.7223 71.3831 33.7072C69.687 33.6921 68.053 34.3611 66.833 35.5702L45.5312 57.4277L37.167 48.8453C35.947 47.6362 34.3129 46.9672 32.6168 46.9823C30.9207 46.9975 29.2983 47.6955 28.0989 48.9262C26.8995 50.1568 26.2192 51.8216 26.2045 53.562C26.1897 55.3023 26.8418 56.979 28.0201 58.2308L40.9577 71.506C42.1708 72.7503 43.8159 73.4494 45.5312 73.4494C47.2465 73.4494 48.8915 72.7503 50.1046 71.506L75.9799 44.9557V44.9557Z" />
                        </svg>
                    </div>

                    <h1 class="modal__heading mb-1 mb-lg-2 mt-2 mt-lg-3">Thank you for your feedback!</h1>
                    <p class="modal__text">We will review your feedback and we will take any action to this matter.
                        The information you provide in this suvery will not be used to investigate a specific complaint.
                    </p>
                </div>

                <div class="modal__body px-2 mt-3">
                    <div class="row">
                        <btn class="col-12 btn btn--feedback" id="feedback-close">Close</btn>
                    </div>
                
                </div>
            </span>


        </div>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/star-rating-svg@3.5.0/dist/jquery.star-rating-svg.min.js"></script>
<script>
    $(document).ready(function () {
        var rateValue = $('#rate-value');
        var rateIt = $("#rate-it");
        
        var rate = rateIt.starRating({
            starSize: 35,
            totalStars: 5,
            initialRating: 5,
            emptyColor: '#C4C4C4',
            hoverColor: '#FFC700',
            activeColor: '#FFC700',
            ratedColor: '#FFC700',
            disableAfterRate: false,
            useGradient: false,
            starShape: 'rounded',
            callback: function(currentRating, $el){
                rateValue.val(currentRating)
            }
        });
        
        var feedBackBtn = $('#btn-feedback');
        var feedBackModal = $('#modal-feedback');
        var feedBackExit = $('#exit-feedback');
        var feedBackMain = $('#feedback-main');
        var feedBackSuccess = $('#feedback-success');
        var feedBackSubmit = $('#feedback-submit');
        var feedBackClose = $('#feedback-close');

        function feedBackShow() {
            feedBackBtn.hide();
            $('html').css({'overflow-y': 'hidden'})
            feedBackModal.show();
            feedBackShowMain();
        }
        
        function feedBackHide() {
            feedBackBtn.show();
            $('html').css({'overflow-y': 'auto'})
            feedBackModal.hide();
            feedBackShowMain();
        }

        function feedBackShowSuccess() {
            feedBackMain.hide();
            feedBackSuccess.show();
        }
        
        function feedBackShowMain() {
            feedBackMain.show();
            feedBackSuccess.hide();
        }

        feedBackBtn.click(feedBackShow)
        
        feedBackExit.click(feedBackHide)

        feedBackModal.click(function(){
            if(e.target !== e.currentTarget) return;
            feedBackHide();
        })

        feedBackSubmit.click(feedBackShowSuccess)
        feedBackClose.click(feedBackHide);
    })
</script>