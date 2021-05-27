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
    <link id="theme" rel="stylesheet" href="./css/themes/st-patrick-day.theme.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/star-rating-svg@3.5.0/src/css/star-rating-svg.min.css ">
</head>

<body>
    <?php include('./components/layout/header.php') ?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js"></script>
    <main>
        <div class="container">
            <div class="forgot-password">
                <div class="card card--new-form forgot-password__form">
                    <div class="card--new-form__header">
                        <h1 class="card--new-form__title mb-1">Forgot Password</h1>
                        <p class="card--new-form__description mb-1">Type your registered email, after pressing submit please check your email. If you can't find our email please verify your Spam folder also.</p>
                    </div>

                    <div class="card--new-form__body">
                        <input class="inp inp--new-form my-2" id="forgotEmailField" type="text" placeholder="Please enter your registered email here...">

                        <button class="btn btn--feedback w-100 mb-2" id="submitBtn">Submit</button>

                        <p class="card--new-form__footer-text">Don't have an account? <a href="">Sign up</a></p>
                    </div>
                </div>

            </div>
        </div>
    </main>
    <div class="backdrop-new" id="customModal" style="display:none;">
        <div class="modal__content">
            <div class="modal--feedback">
                <button class="btn modal__exit close">✖</button>

                <div class="modal__body mt-2 px-lg-2 px-1" style="text-align: center;">
                    <div class="modal--feedback__icon">
                        <svg viewBox="0 0 104 107" class="success-icon" style="display: none;" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M27.8519 10.0952C32.013 9.75433 35.9632 8.07496 39.14 5.29627C42.728 2.16063 47.287 0.438507 52 0.438507C56.713 0.438507 61.272 2.16063 64.86 5.29627C68.0367 8.07496 71.987 9.75433 76.1481 10.0952C80.8472 10.4806 85.259 12.5708 88.5924 15.9912C91.9257 19.4115 93.9628 23.9383 94.3384 28.7601C94.6683 33.028 96.3049 37.0836 99.0153 40.3426C102.071 44.0242 103.75 48.7021 103.75 53.5381C103.75 58.374 102.071 63.052 99.0153 66.7336C96.3073 69.9932 94.6706 74.0464 94.3384 78.3161C93.9628 83.1379 91.9257 87.6647 88.5924 91.085C85.259 94.5054 80.8472 96.5956 76.1481 96.9809C71.987 97.3218 68.0367 99.0012 64.86 101.78C61.272 104.916 56.713 106.638 52 106.638C47.287 106.638 42.728 104.916 39.14 101.78C35.9632 99.0012 32.013 97.3218 27.8519 96.9809C23.1528 96.5956 18.741 94.5054 15.4076 91.085C12.0742 87.6647 10.0372 83.1379 9.66161 78.3161C9.32938 74.0464 7.69271 69.9932 4.98466 66.7336C1.92874 63.052 0.250397 58.374 0.250397 53.5381C0.250397 48.7021 1.92874 44.0242 4.98466 40.3426C7.69271 37.083 9.32938 33.0297 9.66161 28.7601C10.0372 23.9383 12.0742 19.4115 15.4076 15.9912C18.741 12.5708 23.1528 10.4806 27.8519 10.0952V10.0952ZM75.9799 44.9557C77.1582 43.7039 77.8102 42.0272 77.7955 40.2869C77.7808 38.5465 77.1005 36.8817 75.9011 35.6511C74.7017 34.4204 73.0793 33.7223 71.3831 33.7072C69.687 33.6921 68.053 34.3611 66.833 35.5702L45.5312 57.4277L37.167 48.8453C35.947 47.6362 34.3129 46.9672 32.6168 46.9823C30.9207 46.9975 29.2983 47.6955 28.0989 48.9262C26.8995 50.1568 26.2192 51.8216 26.2045 53.562C26.1897 55.3023 26.8418 56.979 28.0201 58.2308L40.9577 71.506C42.1708 72.7503 43.8159 73.4494 45.5312 73.4494C47.2465 73.4494 48.8915 72.7503 50.1046 71.506L75.9799 44.9557V44.9557Z" />
                        </svg>

                        <svg viewBox="0 0 512 512" class="error-icon" style="display: none;" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path d="m507.606 145.568-141.174-141.174c-2.813-2.813-6.628-4.394-10.606-4.394h-199.652c-3.978 0-7.793 1.581-10.606 4.394l-141.174 141.174c-2.813 2.813-4.394 6.628-4.394 10.606v199.651c0 3.978 1.581 7.793 4.394 10.606l141.174 141.174c2.813 2.813 6.628 4.394 10.606 4.394h199.651c3.978 0 7.793-1.581 10.606-4.394l141.174-141.174c2.813-2.813 4.394-6.628 4.394-10.606v-199.651c.001-3.978-1.58-7.793-4.393-10.606z" fill="#f25a3c" />
                                <path d="m512 156.17v199.66c0 3.97-1.58 7.79-4.39 10.6l-141.18 141.18c-2.81 2.81-6.63 4.39-10.6 4.39h-99.83v-512h99.83c3.97 0 7.79 1.58 10.6 4.39l141.18 141.18c2.81 2.81 4.39 6.63 4.39 10.6z" fill="#e43539" />
                                <path d="m237.171 106h37.658c8.728 0 15.613 7.422 14.958 16.126l-12.793 170c-.589 7.826-7.11 13.874-14.958 13.874h-12.073c-7.848 0-14.369-6.049-14.958-13.874l-12.792-170c-.654-8.704 6.23-16.126 14.958-16.126z" fill="#e9f3fb" />
                                <path d="m289.79 122.13-12.8 170c-.58 7.82-7.11 13.87-14.95 13.87h-6.04v-200h18.83c8.73 0 15.61 7.42 14.96 16.13z" fill="#d6e9f8" />
                                <path d="m226.05 375.95v.1c0 16.541 13.409 29.95 29.95 29.95 16.541 0 29.95-13.409 29.95-29.95v-.1c0-16.541-13.409-29.95-29.95-29.95-16.541 0-29.95 13.409-29.95 29.95z" fill="#e9f3fb" />
                                <path d="m285.95 375.95v.1c0 8.27-3.35 15.76-8.77 21.18s-12.91 8.77-21.18 8.77v-60c16.54 0 29.95 13.41 29.95 29.95z" fill="#d6e9f8" />
                            </g>
                        </svg>
                    </div>

                    <h2 class="modal__heading mb-1 mb-lg-1 mt-2 mt-lg-3 title">Test</h2>
                    <p class="modal__text content" style="color: #000;">Test2</p>
                    <p class="modal__text extra mt-1" style="color: #000;"></p>
                    <!-- <p class="modal__text ellipsis mt-1">
                        <b>We usually respond within 1-2hrs during business hrs</b>
                    </p> -->
                </div>

                <div class="modal__body px-2 mt-2">
                    <div class="row">
                        <btn class="col-12 btn btn--feedback close">Close</btn>
                    </div>

                </div>
            </div>
        </div>
    </div>
   
    <script>
        var customModal = $('#customModal');
        var forgotEmailField = $('#forgotEmailField');


        function showCustomModal(type, title, content, extra, closeFunction) {
            var iconSuccess = $(customModal).find('.success-icon')
            var iconError = $(customModal).find('.error-icon')

            if (title) {
                $(customModal).find('.title').html(title)
            }

            if (content) {
                $(customModal).find('.content').html(content)
            }

            if (content) {
                $(customModal).find('.extra').html(extra)
            }

            if(type === 'success') {
                iconError.hide();
                iconSuccess.show();
            } else {
                iconError.show();
                iconSuccess.hide();
            }

            customModal.show();

            $(customModal).find('.close').on('click', function() {
                customModal.hide();
                if (closeFunction) {
                    closeFunction();
                }
            })

        }

        $('#submitBtn').click(function() {
            showCustomModal('success','Password Reset Confirmation Sent', 'Please check your email account', `
                <p>${forgotEmailField ? forgotEmailField.val() : ''}</p>
                <p class="modal__text ellipsis mt-1" style="font-size:16px;">
                  <b>We usually respond within 1-2hrs during business hrs</b>
                </p>
            `)
        })

    </script>
    <?php include('./components/layout/footer.php') ?>
</body>


</html>