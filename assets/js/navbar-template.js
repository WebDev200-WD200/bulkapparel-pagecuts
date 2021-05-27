const headerTemplate = `
<div class="navbar__main">
    <div class="container">
        
            <button class="btn navbar__hamburger-btn n-mobile-only" id="burger-btn">
                    <span></span>
            </button>

            <a href="/" class="navbar__logo">
                    <img src="./assets/img/logo.svg" alt="Bulkapparel logo">
            </a>

            <div class="navbar__ads n-desktop-only">
                    <div class="ads-free-shipping">
                            <div class="free-text">
                                    <h2>Free Shipping</h2>
                                    <p>on order over<span class="price-bold">$99.00</span>
                                    </p>
                            </div>

                            <div class="free-icon">
                                    <span class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 64 64">
                                                    <path
                                                            d="M61 16H35a1 1 0 000 2h25v4H26v-4h5a1 1 0 000-2h-6a1 1 0 00-1 1v11H11a1 1 0 00-.781.375l-8 10A1 1 0 002 39v12a1 1 0 001 1h3.08a7 7 0 100-2H4V40h17a1 1 0 001-1v-6a1 1 0 00-2 0v5h-6.382l4-8H24v20h-1a1 1 0 000 2h15.08a7 7 0 100-2H26v-8h31a1 1 0 000-2H26V24h34v26h-5a1 1 0 000 2h6a1 1 0 001-1V17a1 1 0 00-1-1zM13 46a5 5 0 11-5 5 5.006 5.006 0 015-5zm-1.618-8H5.08l6.4-8h3.9zM45 46a5 5 0 11-5 5 5.006 5.006 0 015-5z" />
                                                    <path
                                                            d="M13 54a3 3 0 10-3-3 3 3 0 003 3zm0-4a1 1 0 11-1 1 1 1 0 011-1zm32 4a3 3 0 10-3-3 3 3 0 003 3zm0-4a1 1 0 11-1 1 1 1 0 011-1zM33 29a1 1 0 000-2h-4a1 1 0 00-1 1v8a1 1 0 002 0v-3h2a1 1 0 000-2h-2v-2zm6-2h-2a1 1 0 00-1 1v8a1 1 0 002 0v-3h1a1 1 0 011 1v2a1 1 0 002 0v-2a2.981 2.981 0 00-.78-2A2.987 2.987 0 0039 27zm-1 4v-2h1a1 1 0 010 2zm11-2a1 1 0 000-2h-4a1 1 0 00-1 1v8a1 1 0 001 1h4a1 1 0 000-2h-3v-2h2a1 1 0 000-2h-2v-2zm8 0a1 1 0 000-2h-4a1 1 0 00-1 1v8a1 1 0 001 1h4a1 1 0 000-2h-3v-2h2a1 1 0 000-2h-2v-2z" />
                                            </svg>
                                    </span>
                            </div>
                    </div>

                    <button class="btn btn--track">
                            <figure>
                                    <svg class="btn--track__icon"
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 16 16">
                                            <path
                                                    d="M11.489 5.014H5.512a.498.498 0 00-.498.498v5.976c0 .275.223.498.498.498h5.977a.498.498 0 00.498-.498V5.512a.498.498 0 00-.498-.498zm-3.487.996H9v.996h-.997V6.01zm2.989 4.98H6.01V6.01h.995v1.494c0 .275.223.498.498.498h1.993a.498.498 0 00.498-.498V6.01h.996v4.98z" />
                                            <path
                                                    d="M16.502 8.002h-1.546A6.485 6.485 0 009 2.044V.498a.498.498 0 00-.997 0v1.546a6.485 6.485 0 00-5.957 5.958H.499a.498.498 0 000 .996h1.546a6.485 6.485 0 005.957 5.958v1.546a.498.498 0 00.997 0v-1.546a6.485 6.485 0 005.957-5.958h1.546a.498.498 0 100-.996zM9 13.956v-.476a.498.498 0 10-.997 0v.476a5.488 5.488 0 01-4.957-4.958h.475a.498.498 0 000-.996h-.475a5.488 5.488 0 014.957-4.958v.476a.498.498 0 00.997 0v-.476a5.487 5.487 0 014.957 4.958h-.475a.498.498 0 100 .996h.475A5.488 5.488 0 019 13.956zM1.528 4.018a.498.498 0 00.498-.498V2.025H3.52a.498.498 0 000-.996H1.528a.498.498 0 00-.498.498V3.52c0 .275.223.498.498.498zM3.52 14.975H2.026V13.48a.498.498 0 10-.996 0v1.993c0 .275.223.498.498.498H3.52a.498.498 0 000-.996zM15.473 12.982a.498.498 0 00-.498.498v1.495h-1.494a.498.498 0 100 .996h1.992a.498.498 0 00.498-.498V13.48a.498.498 0 00-.498-.498zM13.481 2.025h1.494V3.52a.498.498 0 00.996 0V1.527a.498.498 0 00-.498-.498h-1.992a.498.498 0 100 .996z" />
                                    </svg>
                            </figure>

                            <div class="btn--track__label">
                                    Track your order
                            </div>
                    </button>
            </div>

            <div class="navbar__search n-desktop-only">
                    <div class=" inp--search">
                            <input type="text" class="inp inp--search__input"
                                    placeholder="Search Product, Brands">
                            <button class="btn inp--search__button">
                                    <span class="icon">
                                            <svg width="19" height="18" viewBox="0 0 16 16"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                            d="M18.66 16.66l-5.332-5.116a6.764 6.764 0 001.62-4.378c0-3.844-3.258-6.97-7.264-6.97C3.679.195.42 3.321.42 7.165c0 3.843 3.259 6.97 7.264 6.97a7.417 7.417 0 004.563-1.554l5.331 5.115c.15.144.392.144.54 0l.541-.518a.357.357 0 000-.52zM7.683 12.669c-3.162 0-5.735-2.469-5.735-5.503 0-3.035 2.573-5.503 5.735-5.503 3.163 0 5.735 2.468 5.735 5.503 0 3.034-2.572 5.503-5.735 5.503z" />
                                            </svg>
                                    </span>
                            </button>
                    </div>

            </div>

            <div class="navbar__action">
                    <button class="btn btn--track n-mobile-only">
                            <figure>
                            </figure>

                            <div class="btn--track__label">
                                    Track Order
                            </div>
                    </button>

                    <div class="navbar__login">
                            <a href="/" class="btn btn--icon n-mobile-only">
                                    <span class="icon">
                                            <?xml version="1.0" encoding="UTF-8"?>
                                            <svg viewBox="0 0 35 35"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                            d="M16.018.001C7.228.001.1 7.128.1 15.92c0 8.79 7.127 15.917 15.918 15.917 8.792 0 15.918-7.126 15.918-15.917S24.81 0 16.018 0zm0 4.76a5.265 5.265 0 110 10.53 5.265 5.265 0 010-10.53zm-.004 22.914a11.682 11.682 0 01-7.607-2.806 2.244 2.244 0 01-.787-1.705c0-2.949 2.386-5.309 5.335-5.309h6.127c2.95 0 5.327 2.36 5.327 5.309 0 .656-.287 1.279-.787 1.705a11.678 11.678 0 01-7.608 2.806z" />
                                            </svg>
                                    </span>
                            </a>

                            <a href="/" class="btn btn--my-account flex-pc-only">
                                    My Account <span>
                                            <?xml version="1.0" encoding="UTF-8"?>
                                            <!DOCTYPE svg
                                                    PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                    version="1.1" width="24" height="24"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                            d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" />
                                            </svg>
                                    </span>

                            </a>

                            <div class="login-floater">
                                    <form name="frmLoginpop" id="frmLoginpop" method="post"
                                            action="" novalidate="novalidate">

                                            <div class="row">
                                                    <div class="col-12">
                                                            <div class="errordivpop"
                                                                    style="margin-top: 10px;color:red;padding-bottom: 20px;display: block;">
                                                                    <label>Wrong
                                                                            Username/Password
                                                                            entered!</label>
                                                            </div>
                                                    </div>
                                                    <div class="col-12 mb-2">
                                                            <div class="inp-group">
                                                                    <label
                                                                            for="uemailpop">Email</label>
                                                                    <input type="email"
                                                                            class="validate[required,custom[email]] inp inp--primary"
                                                                            name="uemailpop"
                                                                            id="uemailpop"
                                                                            value=""
                                                                            autocomplete="off">
                                                            </div>

                                                    </div>

                                                    <div class="col-12 mb-2">
                                                            <div class="inp-group">
                                                                    <label
                                                                            for="upasswordpop">Password</label>
                                                                    <input type="password"
                                                                            name="upasswordpop"
                                                                            class="validate[required,minSize[5],maxSize[12]] inp inp--primary"
                                                                            id="upasswordpop"
                                                                            value="">
                                                            </div>
                                                    </div>

                                                    <div class="col-12 mb-3" id="sid">
                                                            <div
                                                                    class="login-floater__action">
                                                                    <button type="submit"
                                                                            name="loginpop"
                                                                            id="loginpop"
                                                                            class="btn btn--primary mr-auto">
                                                                            Login
                                                                    </button>

                                                                    <div class="log-sub-left"
                                                                            style="padding-top: 12px;">
                                                                            <label
                                                                                    style="font-size: 14px;"><input
                                                                                            id="my-checkpop"
                                                                                            name="my-checkpop"
                                                                                            type="checkbox">
                                                                                    Keep me
                                                                                    logged
                                                                                    in</label>
                                                                    </div>
                                                            </div>
                                                    </div>

                                                    <div class="col-12 forget-row">
                                                            <div
                                                                    class="login-floater__footer">
                                                                    <p
                                                                            style="margin-bottom: 12px;font-size: 18px">
                                                                            Don't have an
                                                                            account? <a
                                                                                    href="https://robx2.bulkapparel.com/login"
                                                                                    style="float: none;font-style: normal;">Register
                                                                                    Now!</a>
                                                                    </p>
                                                                    <a href="https://robx2.bulkapparel.com/forgotpassword"
                                                                            style="float: none;font-style: normal;font-size: 18px">Forgot
                                                                            Password?</a>
                                                            </div>

                                                    </div>
                                            </div>
                                            <input type="hidden" id="mailTrackingNo"
                                                    value="">
                                    </form>
                            </div>

                    </div>


                    <div class="navbar__cart">
                            <button class="btn btn--icon">
                                    <span class="icon">
                                            <?xml version="1.0" encoding="UTF-8"?>
                                            <svg viewBox="0 0 32 30"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                            d="M24.783 23.257c1.956 0 3.523 1.291 3.523 2.885 0 1.594-1.567 2.885-3.523 2.885-1.956 0-3.54-1.291-3.54-2.885 0-1.594 1.584-2.885 3.54-2.885zM7.08 23.257c1.957 0 3.524 1.291 3.524 2.885 0 1.594-1.567 2.885-3.523 2.885-1.956 0-3.54-1.291-3.54-2.885 0-1.594 1.584-2.885 3.54-2.885zM22.836 16.045H9.648c-1.328 0-2.488-.598-3.098-1.485L.22 5.198A1.2 1.2 0 010 4.506c0-.8.796-1.442 1.77-1.442h26.173L29.625.179h5.78v2.885h-3.541L25.5 14.004l2.39 3.534c.274.419.433.887.433 1.392 0 1.594-1.584 2.885-3.54 2.885H3.54V18.93h20.49c.248 0 .443-.159.443-.36a.294.294 0 00-.053-.174l-1.584-2.35z" />
                                            </svg>
                                    </span>



                            </button>

                            <div class="navbar__cart-price">
                                    $1,194.20
                                    <span class="btn--icon__count">
                                            3
                                    </span>
                            </div>
                    </div>
            </div>
    </div>
</div>
<div class="navbar__middle n-mobile-only">
    <div class="container">
            <div class="navbar__middle-ads">
                    <a class="btn btn--ads" href="/shipping">
                            <img src="./assets/img/free-shipping.png" alt="Free Shipping">
                            <p>SAME DAY FREE SHIPPING over $99.00</p>
                    </a>
                    <a class="btn btn--ads" href="/">
                            <img src="./assets/img/bulk-discount.png" alt="Bulk Discount">
                            <p>BULK DISCOUNT</p>
                    </a>
            </div>

            <div class="navbar__middle-search">
                    <div class=" inp--search">
                            <input type="text" class="inp inp--search__input"
                                    placeholder="Search Product, Brands">
                            <button class="btn inp--search__button">
                                    <span class="icon">
                                            <svg width="19" height="18" viewBox="0 0 16 16"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                            d="M18.66 16.66l-5.332-5.116a6.764 6.764 0 001.62-4.378c0-3.844-3.258-6.97-7.264-6.97C3.679.195.42 3.321.42 7.165c0 3.843 3.259 6.97 7.264 6.97a7.417 7.417 0 004.563-1.554l5.331 5.115c.15.144.392.144.54 0l.541-.518a.357.357 0 000-.52zM7.683 12.669c-3.162 0-5.735-2.469-5.735-5.503 0-3.035 2.573-5.503 5.735-5.503 3.163 0 5.735 2.468 5.735 5.503 0 3.034-2.572 5.503-5.735 5.503z" />
                                            </svg>
                                    </span>
                            </button>
                    </div>
                    <div id="search-auto" class="search search-auto ">
                            <!--search-show-->
                            <div class="search__live">
                                    <div class="search__live-header">
                                            <h1>You Search <span>"gildan"</span></h1>
                                    </div>
                                    <ul class="search__live-list" id="result-image">
                                            <li class="card--search" data-image="5">
                                                    <a class="card--search__link"
                                                            href="https://robx2.bulkapparel.com/tshirts/g500-gildan-wholesale-t-shirt-5000">
                                                            <div class="card--search__img">
                                                                    <img src="https://robx2.bulkapparel.com/styleImages/SCImages/cart-images/16_fm.jpg"
                                                                            alt="Gildan 5000 Heavy Cotton T-"
                                                                            draggable="false"
                                                                            >
                                                            </div>
                                                            <div class="card--search__body">
                                                                    <div
                                                                            class="card--search__title">
                                                                            Gildan 5000
                                                                            Heavy Cotton
                                                                            T-Shirt in bulk
                                                                    </div>
                                                            </div>
                                                    </a>
                                            </li>
                                            <li class="card--search" data-image="14">
                                                    <a class="card--search__link"
                                                            href="https://robx2.bulkapparel.com/tshirts/g640-gildan-t-shirt-64000-softstyle">
                                                            <div class="card--search__img">
                                                                    <img src="https://robx2.bulkapparel.com/styleImages/SCImages/cart-images/32_fm.jpg"
                                                                            alt="Gildan 64000 Softstyle T-Sh"
                                                                            draggable="false"
                                                                            >
                                                            </div>
                                                            <div class="card--search__body">
                                                                    <div
                                                                            class="card--search__title">
                                                                            Gildan 64000
                                                                            Softstyle
                                                                            T-Shirt in bulk
                                                                    </div>
                                                            </div>
                                                    </a>
                                            </li>
                                            <li class="card--search" data-image="17">
                                                    <a class="card--search__link"
                                                            href="https://robx2.bulkapparel.com/tshirts/g200-gildan-2000-t-shirt-ultra-cotton-test-rob">
                                                            <div class="card--search__img">
                                                                    <img src="https://robx2.bulkapparel.com/styleImages/SCImages/cart-images/39_fm.jpg"
                                                                            alt="Gildan 2000 Ultra Cotton T-"
                                                                            draggable="false"
                                                                            >
                                                            </div>
                                                            <div class="card--search__body">
                                                                    <div
                                                                            class="card--search__title">
                                                                            Gildan 2000
                                                                            Ultra Cotton
                                                                            T-Shirt Test
                                                                            091420
                                                                    </div>
                                                            </div>
                                                    </a>
                                            </li>
                                            <li class="card--search" data-image="54">
                                                    <a class="card--search__link"
                                                            href="https://robx2.bulkapparel.com/tshirts/g800-gildan-t-shirt-8000-dryblend-50-50">
                                                            <div class="card--search__img">
                                                                    <img src="https://robx2.bulkapparel.com/styleImages/SCImages/cart-images/146_fm.jpg"
                                                                            alt="Gildan 8000 DryBlend T-Shir"
                                                                            draggable="false"
                                                                            >
                                                            </div>
                                                            <div class="card--search__body">
                                                                    <div
                                                                            class="card--search__title">
                                                                            Gildan 8000
                                                                            DryBlend T-Shirt
                                                                            in bulk
                                                                    </div>
                                                            </div>
                                                    </a>
                                            </li>
                                            <li class="card--search" data-image="123">
                                                    <a class="card--search__link"
                                                            href="https://robx2.bulkapparel.com/fleece/gildan-18500-hoodie-heavy-blend-hooded-sweatshirt">
                                                            <div class="card--search__img">
                                                                    <img src="https://robx2.bulkapparel.com/styleImages/SCImages/cart-images/395_fm.jpg"
                                                                            alt="Gildan 18500 Heavy Blend Ho"
                                                                            draggable="false"
                                                                            >
                                                            </div>
                                                            <div class="card--search__body">
                                                                    <div
                                                                            class="card--search__title">
                                                                            Gildan 18500
                                                                            Heavy Blend
                                                                            Hooded
                                                                            Sweatshirt in
                                                                            bulk
                                                                    </div>
                                                            </div>
                                                    </a>
                                            </li>
                                            <li class="card--search" data-image="195">
                                                    <a class="card--search__link"
                                                            href="https://robx2.bulkapparel.com/tshirts/g500b-gildan-5000b-kids-t-shirt-wholesale">
                                                            <div class="card--search__img">
                                                                    <img src="https://robx2.bulkapparel.com/styleImages/SCImages/cart-images/543_fm.jpg"
                                                                            alt="Gildan 5000B Heavy Cotton Y"
                                                                            draggable="false"
                                                                            >
                                                            </div>
                                                            <div class="card--search__body">
                                                                    <div
                                                                            class="card--search__title">
                                                                            Gildan 5000B
                                                                            Heavy Cotton
                                                                            Youth T-Shirt
                                                                            wholesale
                                                                    </div>
                                                            </div>
                                                    </a>
                                            </li>
                                            <li class="card--search" data-image="187">
                                                    <a class="card--search__link"
                                                            href="https://robx2.bulkapparel.com/tshirts/gildan-8000b-dryblend-youth-50-50-t-shirt">
                                                            <div class="card--search__img">
                                                                    <img src="https://robx2.bulkapparel.com/styleImages/SCImages/cart-images/526_fm.jpg"
                                                                            alt="Gildan 8000B DryBlend Youth"
                                                                            draggable="false"
                                                                            >
                                                            </div>
                                                            <div class="card--search__body">
                                                                    <div
                                                                            class="card--search__title">
                                                                            Gildan 8000B
                                                                            DryBlend Youth
                                                                            T-Shirt
                                                                            wholesale
                                                                    </div>
                                                            </div>
                                                    </a>
                                            </li>
                                            <li class="card--search" data-image="111">
                                                    <a class="card--search__link"
                                                            href="https://robx2.bulkapparel.com/fleece/g180-gildan-sweatshirt-18000-heavy-blend-crewneck">
                                                            <div class="card--search__img">
                                                                    <img src="https://robx2.bulkapparel.com/styleImages/SCImages/cart-images/372_fm.jpg"
                                                                            alt="Gildan 18000 Heavy Blend Sw"
                                                                            draggable="false"
                                                                            >
                                                            </div>
                                                            <div class="card--search__body">
                                                                    <div
                                                                            class="card--search__title">
                                                                            Gildan 18000
                                                                            Heavy Blend
                                                                            Sweatshirt in
                                                                            bulk
                                                                    </div>
                                                            </div>
                                                    </a>
                                            </li>
                                            <li class="card--search" data-image="200">
                                                    <a class="card--search__link"
                                                            href="https://robx2.bulkapparel.com/tshirts/gildan-2000b-ultra-cotton-youth-t-shirt">
                                                            <div class="card--search__img">
                                                                    <img src="https://robx2.bulkapparel.com/styleImages/SCImages/cart-images/551_fm.jpg"
                                                                            alt="Gildan 2000B Ultra Cotton Y"
                                                                            draggable="false"
                                                                            >
                                                            </div>
                                                            <div class="card--search__body">
                                                                    <div
                                                                            class="card--search__title">
                                                                            Gildan 2000B
                                                                            Ultra Cotton
                                                                            Youth T-Shirt
                                                                            wholesale
                                                                    </div>
                                                            </div>
                                                    </a>
                                            </li>
                                            <li class="card--search" data-image="35">
                                                    <a class="card--search__link"
                                                            href="https://robx2.bulkapparel.com/tshirts-longsleeves/gildan-5400-heavy-cotton-long-sleeve-t-shirt">
                                                            <div class="card--search__img">
                                                                    <img src="https://robx2.bulkapparel.com/styleImages/SCImages/cart-images/94_fm.jpg"
                                                                            alt="Gildan 5400 Heavy Cotton Lo"
                                                                            draggable="false"
                                                                            >
                                                            </div>
                                                            <div class="card--search__body">
                                                                    <div
                                                                            class="card--search__title">
                                                                            Gildan 5400
                                                                            Heavy Cotton
                                                                            Long Sleeve
                                                                            T-Shirt in bulk
                                                                    </div>
                                                            </div>
                                                    </a>
                                            </li>
                                    </ul>

                                    <div class="search__help">
                                            <h1 class="search__help-title">How Can We Help?
                                            </h1>
                                            <ul class="search__help-list">
                                                    <li class="search__help-items">
                                                            <a
                                                                    href="https://robx2.bulkapparel.com/cms/page/shipping">Shipping</a>
                                                    </li>
                                                    <li class="search__help-items">
                                                            <a
                                                                    href="https://robx2.bulkapparel.com/tracking">Tracking</a>
                                                    </li>
                                                    <li class="search__help-items">
                                                            <a
                                                                    href="https://robx2.bulkapparel.com/cms/page/help">Help
                                                                    / FAQ</a>
                                                    </li>
                                                    <li class="search__help-items">
                                                            <a
                                                                    href="https://robx2.bulkapparel.com/cms/page/returns">Return
                                                                    Policy</a>
                                                    </li>
                                            </ul>
                                    </div>

                            </div>
                            <div class="search__auto">
                                    <div class="search__auto-header">
                                    </div>
                                    <ul class="search__auto-result" id="result-text">
                                            <li>
                                                    <h3>Suggestions</h3>
                                            </li>
                                            <li></li>
                                            <li data-text="5"><a
                                                            href="https://robx2.bulkapparel.com/tshirts/g500-gildan-wholesale-t-shirt-5000">Gildan
                                                            5000 Heavy Cotton ...</a></li>
                                            <li data-text="14"><a
                                                            href="https://robx2.bulkapparel.com/tshirts/g640-gildan-t-shirt-64000-softstyle">Gildan
                                                            64000 Softstyle T-...</a></li>
                                            <li data-text="17"><a
                                                            href="https://robx2.bulkapparel.com/tshirts/g200-gildan-2000-t-shirt-ultra-cotton-test-rob">Gildan
                                                            2000 Ultra Cotton ...</a></li>
                                            <li data-text="54"><a
                                                            href="https://robx2.bulkapparel.com/tshirts/g800-gildan-t-shirt-8000-dryblend-50-50">Gildan
                                                            8000 DryBlend T-Sh...</a></li>
                                            <li data-text="123"><a
                                                            href="https://robx2.bulkapparel.com/fleece/gildan-18500-hoodie-heavy-blend-hooded-sweatshirt">Gildan
                                                            18500 Heavy Blend ...</a></li>
                                            <li data-text="195"><a
                                                            href="https://robx2.bulkapparel.com/tshirts/g500b-gildan-5000b-kids-t-shirt-wholesale">Gildan
                                                            5000B Heavy Cotton...</a></li>
                                            <li data-text="187"><a
                                                            href="https://robx2.bulkapparel.com/tshirts/gildan-8000b-dryblend-youth-50-50-t-shirt">Gildan
                                                            8000B DryBlend You...</a></li>
                                            <li data-text="111"><a
                                                            href="https://robx2.bulkapparel.com/fleece/g180-gildan-sweatshirt-18000-heavy-blend-crewneck">Gildan
                                                            18000 Heavy Blend ...</a></li>
                                            <li data-text="200"><a
                                                            href="https://robx2.bulkapparel.com/tshirts/gildan-2000b-ultra-cotton-youth-t-shirt">Gildan
                                                            2000B Ultra Cotton...</a></li>
                                            <li data-text="35"><a
                                                            href="https://robx2.bulkapparel.com/tshirts-longsleeves/gildan-5400-heavy-cotton-long-sleeve-t-shirt">Gildan
                                                            5400 Heavy Cotton ...</a></li>
                                            <li class="see-more-results" data-count="1"><a
                                                            href="javascript:void(0);">See
                                                            More
                                                            Results</a></li>
                                            <li class="view-all-results"><a
                                                            href="javascript:void(0);">View
                                                            All Results</a></li>
                                    </ul>
                            </div>
                    </div>
            </div>
    </div>
</div>
<div class="navbar__footer" id="navbar-footer">
    <div class="container">
        <button class="navbar__filter" id="btnFilter">
                <svg viewBox="0 0 28 25" fill="#000" xmlns="http://www.w3.org/2000/svg"><path d="M27.062 4.768H23.1C22.616 2.545 20.683.902 18.364.902c-2.32 0-4.253 1.643-4.736 3.866H0V6.7h13.628c.483 2.223 2.416 3.866 4.736 3.866s4.252-1.643 4.736-3.866h3.962V4.768zm-8.698 3.866c-1.643 0-2.9-1.257-2.9-2.9s1.257-2.9 2.9-2.9 2.9 1.257 2.9 2.9-1.257 2.9-2.9 2.9zM0 20.232h3.963c.483 2.223 2.416 3.866 4.736 3.866s4.252-1.643 4.736-3.866h13.627V18.3H13.434c-.483-2.223-2.416-3.866-4.735-3.866-2.32 0-4.253 1.643-4.736 3.866H0v1.933zm8.699-3.866c1.643 0 2.9 1.256 2.9 2.9 0 1.643-1.257 2.9-2.9 2.9s-2.9-1.257-2.9-2.9 1.257-2.9 2.9-2.9z"/></svg>    
                Filter
        </button>
        <ul class="navbar__footer-list">
        </ul>
    </div>

</div>
</div>


`;

$(".navbar").html(headerTemplate);

// function changeTheme(theme) {
//     const headCss = $("#theme");
//     const themeScript = $('#theme-js');

//     if (theme === "halloween") {
//         headCss.attr("href", "./css/themes/halloween-theme.min.css");
//     } else if (theme === 'thanks-giving') {
//         headCss.attr("href", "./css/themes/thanks-giving-theme.min.css");
//     } else if (theme === 'christmas') {
//         headCss.attr("href", "./css/themes/christmas-theme.min.css");
//     } else {
//         themeScript.attr('src', '')
//     }
// }
function changeTheme(theme) {
  const body = $("body");
  const themeScript = $("#theme-js");

  body.removeClass(body.attr("class"));

  if (theme === "halloween") {
    body.addClass("themes--halloween");
  } else if (theme === "thanks-giving") {
    body.addClass("themes--thanks-giving");
  } else if (theme === "christmas") {
    body.addClass("themes--christmas");
  } else if (theme === "new-year") {
    body.addClass("themes--new-year");
  } else {
    body.addClass("themes--default");
  }
}

$(".navbar__footer-list").click(function (e) {
  var activeClass = "show-sub-list";
  var item = e.target.closest(".navbar__footer-item");
  var link = e.target.closest(".navbar__footer-link");
  $(item).toggleClass(activeClass);

  console.log(link);
  if (link) {
    window.location.href = $(link).attr("href");
  }
});

$("#burger-btn").click(function (e) {
  var showClass = "show-sidebar";
  var sidebar = $("#navbar-footer");

  console.log(sidebar, "Hello", sidebar.hasClass(showClass));
  if (!sidebar.hasClass(showClass)) {
    $("body").attr("style", "overflow:hidden;");
    sidebar.addClass(showClass);
  } else {
    $("body").attr("style", "overflow:auto;");
    sidebar.removeClass(showClass);
  }
});

$(document).ready(function () {
  if ($("body").hasClass("themes--christmas")) {
    var script = document.createElement("script"); // create a script DOM node
    script.src = url; // set its src to the provided URL

    document.head.appendChild(script);

    function initSnowFall() {
      $(document).snowfall({
        flakeCount: 200,
        round: true,
        maxSpeed: 5,
        maxSize: 8,
      });
    }

    // remove snow fall on mobile
    if ($(window).width() >= 768) {
      initSnowFall();

      // when on blur or fucos out detach snow fall to minimize processor process
      $(window)
        .blur(function () {
          $(document).snowfall("clear");
        })
        .focus(function () {
          initSnowFall();
        });
    }
  }
});
