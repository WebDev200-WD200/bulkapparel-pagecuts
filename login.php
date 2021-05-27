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
    <main>
        <div class="login">
            <div class="container">
                <div class="card card--new-form login__form" id="loginForm">
                    <div class="card--new-form__header">
                        <img src="https://300.bulkapparel.com/images/logo.svg" alt="" class="card-new-form__logo">
                        <h1 class="card--new-form__title mt-2 mb-1">Welcome Back</h1>
                        <p class="card--new-form__description mb-1">Log in with your email and password.</p>
                    </div>

                    <div class="card--new-form__body">
                        <input class="inp inp--new-form my-2" id="" type="text" placeholder="Email Address">
                        <input class="inp inp--new-form my-2" type="password" id="" type="text" placeholder="Password">
                        <label class="checkbox-custom my-2">Remember me
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>

                        <button class="btn btn--feedback w-100 mb-2" id="submitBtn">Login</button>

                        <p class="card--new-form__footer-text mt-1"><a href="">Forgot Password</a></p>
                        <p class="card--new-form__footer-text mt-1">Don't have an account? <a href="" id="toRegisterBtn">Sign up</a></p>

                    </div>
                </div>
                <div class="card card--new-form login__form" style="display: none;" id="registerForm">
                    <div class="card--new-form__header">
                        <img src="https://300.bulkapparel.com/images/logo.svg" alt="" class="card-new-form__logo">
                        <h1 class="card--new-form__title mt-2 mb-1">Create an Account</h1>
                        <!-- <p class="card--new-form__description mb-1"></p> -->
                    </div>

                    <div class="card--new-form__body">
                        <input class="inp inp--new-form my-2" id="" type="text" placeholder="Email Address">

                        <div class="form-group">
                            <input class="inp inp--new-form mt-2 mb-1" type="password" id="" type="text" placeholder="Password">
                            <p class="inp--new-form__hint">Password must be of minimum 8 characters</p>
                        </div>
                        <input class="inp inp--new-form my-2" type="password" id="" type="text" placeholder="Confirm Password">

                        <button class="btn btn--feedback w-100 mb-2" id="submitBtn">Login</button>

                        <p class="card--new-form__footer-text mt-1"><a href="">Forgot Password</a></p>
                        <p class="card--new-form__footer-text mt-1">Already have an account? <a href="" id="toLoginBtn">Login</a></p>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <script>
        var toRegisterBtn = $('#toRegisterBtn')
        var toLoginBtn = $('#toLoginBtn')
        var loginForm = $('#loginForm');
        var registerForm = $('#registerForm');

        toRegisterBtn.click(function(e) {
            e.preventDefault();
            showRegisterForm();
            window.location.hash = '#login'
        })
        toLoginBtn.click(function(e) {
            e.preventDefault();
            showLoginForm();
            window.location.hash = '#register'
        })


        function showLoginForm() {
            registerForm.fadeOut(200, function() {
                loginForm.fadeIn(200);
            });
        }

        function showRegisterForm() {
            loginForm.fadeOut(200, function() {
                registerForm.fadeIn(200);
            });
        }


        var hash = window.location.hash;

        if (hash === '#register') {
            showRegisterForm();
        } else {
            showLoginForm();
        }
    </script>
    <?php include('./components/layout/footer.php') ?>
</body>


</html>