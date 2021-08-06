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
    <link rel="stylesheet" href="css/orderconfirm.css">
    <!-- <link rel="stylesheet" href="./css/themes/themes.min.css"> -->
    <!-- Hallooween theme -->
    <!-- <link rel="stylesheet" href="./css/themes/halloween-theme.min.css"> -->

    <!-- Thanks giving theme-->
    <!-- <link id="theme" rel="stylesheet" href="./css/themes/christmas-theme.css"> -->

    <!-- New year theme-->
    <!-- <link id="theme" rel="stylesheet" href="./css/themes/new-year.theme.css"> -->
    <!-- New year theme-->

    <!-- <link id="theme" rel="stylesheet" href="./css/themes/valentines.theme.css"> -->
    <link id="theme" rel="stylesheet" href="./css/themes/independence-day.theme.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300&display=swap" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
</head>

<body id="page">
    <?php include('./components/layout/header.php') ?>
    <main>
        <div class="container">
            <div class="order-confirm mt-2">


                <div class="card--orderconfirm order-confirm__info">

                    <div class="order-confirm__print">
                        <img src="https://300.bulkapparel.com/images/logo.png" class="print-logo" alt="Logo">

                        <h2 class="print-header">
                            Thank you for Ordering!
                        </h2>
                    </div>

                    <div class="order-confirm__intro">
                        <div class="order-confirm__check">
                            <img src="./images/orderconfirm/order-check.png" alt="Order confirm check mark">
                        </div>

                        <h3 class="order-confirm__no">Order #<span>B62-01701-21065</span>
                        </h3>

                        <p class="order-confirm__confirmed">
                            order is confirmed!
                        </p>
                        <p class="order-confirm__paypal">
                            <img src="./images/orderconfirm/paypal.png" alt="Paypal"> payment is approved!
                        </p>

                        <p class="order-confirm__message">
                            Thank you for shopping at BulkApparel.com <br>We will email your tracking info soon.
                        </p>

                        <div class="order-confirm__buttons">
                            <a class="btn btn--secondary download-pdf" href="javascript:void(0);" id="printPdf">

                                <span class=" icon">
                                    <svg viewBox="0 0 19 17" fill="#000" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16.199 4.834L11.889.498l-.46-.184H1.285L.628.971v7.227h1.314v-6.57h7.884v4.599l.657.657h4.6v1.314h1.313v-2.89l-.197-.474zm-5.059.736V1.628l3.942 3.942H11.14zM1.285 9.512l-.657.657v7.884l.657.657H15.74l.657-.657v-7.884l-.657-.657H1.285zm13.797 7.884H1.942v-6.57h13.14v6.57zM4.57 14.768h-.42v1.314h-.894V12.14h1.393c.985 0 1.485.473 1.485 1.314a1.235 1.235 0 01-.42.946c-.326.254-.731.384-1.144.368zm-.079-1.905H4.15v1.222h.341c.473 0 .71-.21.71-.618 0-.407-.237-.604-.71-.604zm5.335 2.667a1.945 1.945 0 00.578-1.472c0-1.314-.696-1.918-2.102-1.918H6.909v3.942h1.393a2.102 2.102 0 001.524-.552zm-2.037-.17v-2.497h.434a1.236 1.236 0 01.92.328 1.196 1.196 0 01.328.88c.02.347-.098.687-.328.947a1.235 1.235 0 01-.907.341H7.79zm5.848-.802h-1.275v1.524h-.893V12.14h2.286v.723h-1.393v.972h1.275v.723z"></path>
                                    </svg>
                                </span>
                                <span class="text">
                                    Save PDF

                                </span>
                            </a>

                            <a class="btn btn--secondary download-print" href="javascript:void(0);" onclick="if (!window.__cfRLUnblockHandlers) return false; PrintElem('or-print');" disabled="disabled">Print</a>
                        </div>

                    </div>
                    <div class="order-confirm__body">

                        <div class="order-confirm__item">
                            <h2>Bill To</h2>
                            <p>
                                Christian Lugod<br>test@test.com<br>132 Block st. San Diego, 33333<br>333333<br>San Diego,&nbsp;DC,&nbsp;10012<br>(222) 222-2222<br></p>

                        </div>

                        <div class="order-confirm__item">
                            <h2>Ship To</h2>
                            <p>Christian Lugod<br>test@test.com<br>132 Block st. San Diego, 33333<br>333333<br>San Diego,&nbsp;DC,&nbsp;10012<br></p>
                        </div>

                        <div class="order-confirm__item">
                            <div id="shipcostid">
                                <h2>Order Date</h2>
                                <p>05/04/2021 04:15 pm</p><strong>Estimated Delivery - </strong> 1-3 Business Days<br><strong>Total Items - </strong>3
                            </div>
                        </div>

                        <div class="order-confirm__item">

                            <h2>Order Information</h2>
                            <div class="oc-left">
                                <p>Order#: <span style="font-weight:700;font-size: 110% ">B62-01701-21065</span></p>
                                <p>Total : $17.81</p>


                            </div>
                        </div>

                    </div>
                </div>

                <div class="card--orderconfirm order-confirm__summary">
                    <div class="order-confirm__header">
                        <h4>Order Summary</h4>
                    </div>
                    <div class="table table--primary">
                        <table class="orderconfirm-new-table" id="productList">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th><strong>Item</strong></th>
                                    <th><strong>Price</strong></th>
                                    <th><strong>Quantity</strong></th>
                                    <th><strong>Total</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="row-image">
                                        <div class="item-image">
                                            <a href="https://300.bulkapparel.com/tshirts/g200-gildan-2000-t-shirt-ultra-cotton">
                                                <img src="https://300.bulkapparel.com/styleImages/SCImages/wholesale-shirts-480-600/17130_f_fm.jpg" alt="product">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="row-item cart-desc">
                                        <ul>
                                            <li>
                                                <a class="item-title" href="https://300.bulkapparel.com/tshirts/g200-gildan-2000-t-shirt-ultra-cotton">G200 Gildan 2000 T-Shirt Ultra Cotton</a>
                                            </li>
                                            <li>
                                                <p class="item-color"><b>Color:</b> White <span style="background:#eeedec;"></span>
                                                </p>
                                            </li>
                                            <li class="item-size">
                                                <p><b>Size:</b> S</p>
                                            </li>

                                            <li id="B00760003" class="estDClass">

                                            </li>

                                        </ul>
                                    </td>
                                    <td class="row-price">$1.88</td>
                                    <td class="row-quantity">2</td>
                                    <td class="row-total">$3.76</td>
                                </tr>
                                <tr>
                                    <td class="row-image">
                                        <div class="item-image">
                                            <a href="https://300.bulkapparel.com/tshirts/g200-gildan-2000-t-shirt-ultra-cotton">
                                                <img src="https://300.bulkapparel.com/styleImages/SCImages/wholesale-shirts-480-600/17130_f_fm.jpg" alt="product">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="row-item cart-desc">
                                        <ul>
                                            <li>
                                                <a class="item-title" href="https://300.bulkapparel.com/tshirts/g200-gildan-2000-t-shirt-ultra-cotton">G200 Gildan 2000 T-Shirt Ultra Cotton</a>
                                            </li>
                                            <li>
                                                <p class="item-color"><b>Color:</b> White <span style="background:#eeedec;"></span>
                                                </p>
                                            </li>
                                            <li class="item-size">
                                                <p><b>Size:</b> L</p>
                                            </li>

                                            <li id="B00760005" class="estDClass">

                                            </li>

                                        </ul>
                                    </td>
                                    <td class="row-price">$1.88</td>
                                    <td class="row-quantity">2</td>
                                    <td class="row-total">$3.76</td>
                                </tr>
                                <tr>
                                    <td class="row-image">
                                        <div class="item-image">
                                            <a href="https://300.bulkapparel.com/tshirts/g200-gildan-2000-t-shirt-ultra-cotton">
                                                <img src="https://300.bulkapparel.com/styleImages/SCImages/wholesale-shirts-480-600/17130_f_fm.jpg" alt="product">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="row-item cart-desc">
                                        <ul>
                                            <li>
                                                <a class="item-title" href="https://300.bulkapparel.com/tshirts/g200-gildan-2000-t-shirt-ultra-cotton">G200 Gildan 2000 T-Shirt Ultra Cotton</a>
                                            </li>
                                            <li>
                                                <p class="item-color"><b>Color:</b> White <span style="background:#eeedec;"></span>
                                                </p>
                                            </li>
                                            <li class="item-size">
                                                <p><b>Size:</b> XL</p>
                                            </li>

                                            <li id="B00760006" class="estDClass">

                                            </li>

                                        </ul>
                                    </td>
                                    <td class="row-price">$1.88</td>
                                    <td class="row-quantity">1</td>
                                    <td class="row-total">$1.88</td>
                                </tr>
                                <tr>
                                    <td class="row-image">
                                        <div class="item-image">
                                            <a href="https://300.bulkapparel.com/tshirts/g200-gildan-2000-t-shirt-ultra-cotton">
                                                <img src="https://300.bulkapparel.com/styleImages/SCImages/wholesale-shirts-480-600/17130_f_fm.jpg" alt="product">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="row-item cart-desc">
                                        <ul>
                                            <li>
                                                <a class="item-title" href="https://300.bulkapparel.com/tshirts/g200-gildan-2000-t-shirt-ultra-cotton">G200 Gildan 2000 T-Shirt Ultra Cotton</a>
                                            </li>
                                            <li>
                                                <p class="item-color"><b>Color:</b> White <span style="background:#eeedec;"></span>
                                                </p>
                                            </li>
                                            <li class="item-size">
                                                <p><b>Size:</b> 2XL</p>
                                            </li>


                                            <li id="B00760007" class="estDClass">

                                            </li>

                                        </ul>
                                    </td>
                                    <td class="row-price">$5.32</td>
                                    <td class="row-quantity">2</td>
                                    <td class="row-total">$10.64</td>
                                </tr>


                                <!-- <tr id="cartinfoid">

                                    <td>&nbsp;<input type="hidden" name="amt" id="amt" value="30.03"><input type="hidden" name="subtotalold" id="subtotalold" value="20.04"></td>
                                    <td>&nbsp;</td>
                                    <td>
                                        <p class="totdes">Subtotal:<br>
                                            Shipping:<br><b>Total:</b>
                                        </p>
                                    </td>
                                    <td>
                                        <p>7 Items</p>
                                    </td>
                                    <td>
                                        <p>$20.04<br>
                                            $9.99<br><b>$30.03</b></p>
                                    </td>
                                </tr> -->
                            </tbody>
                        </table>
                        <ul class="compute">
                            <li class="compute__item">
                                <p class="title">Total Qty:</p>
                                <p class="value">20 Items</p>
                            </li>
                            <li class="compute__item">
                                <p class="title">Subtotal:</p>
                                <p class="value">$33.40</p>
                            </li>
                            <li class="compute__item">
                                <p class="title">Text:</p>
                                <p class="value">$3.36</p>
                            </li>
                            <li class="compute__item">
                                <p class="title">Shipping Fee:
                                    <span class="compute__free">Free</span>
                                </p>
                                <p class="value">$9.99</p>
                            </li>
                            <li class="compute__item compute__total">
                                <p class="title">Total: </p>
                                <p class="value">$46.75</p>
                            </li>
                        </ul>

                    </div>

                </div>


            </div>
        </div>
        <button class="btn btn--primary" id="print">Hello World click this</button>
    </main>
    <?php include('./components/layout/footer.php') ?>
</body>


</html>