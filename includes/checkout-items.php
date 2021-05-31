<div class="card--checkout-box" id="checkoutItemsForm">
    <div class="card--checkout-box__header">

        <div class="card--checkout-box__header-icon">
            <?php $name = "receipt";
            include('./includes/icons.php') ?>
        </div>

        <div class="card--checkout-box__header-body">
            <h2 class="card--checkout-box__header-title">
                Items(2)
            </h2>
        </div>

        <div class="card--checkout-box__header-action">
            <button class="btn btn--secondary btn--secondary-invert save-continue">Save & Continue</button>
            <button class="btn card--checkout-box__arrow arrow-down">
                <?php $name = "chevron-down";
                include('./includes/icons.php') ?>
            </button>
        </div>
    </div>

    <div class="card__body">
        <table class="checkout-table" id="productList">
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
                            <a href="https://300.bulkapparel.com/tshirts/g500-gildan-wholesale-t-shirt-5000">
                                <img src="https://300.bulkapparel.com/styleImages/SCImages/Color-item-480-600/16813_f_fm.jpg" alt="product">
                            </a>
                        </div>
                    </td>
                    <td class="row-item">
                        <ul>
                            <li><a href="https://300.bulkapparel.com/tshirts/g500-gildan-wholesale-t-shirt-5000" class="item-title">Gildan 5000 Heavy Cotton T-Shirt in bulk</a> </li>
                            <li>
                                <p class="item-color">
                                    <b>Color:</b>
                                    <span class="color-box" style="background:#fdfdfd;"></span>

                                    WHITE

                                </p>
                            </li>
                            <li class="item-size">
                                <p><b>Size:</b> S</p>
                            </li>

                            <li id="B00060003" class="estDClass">
                                <p class="item-est">
                                    <img src="https://300.bulkapparel.com//images/truck-icon.gif" style="width:30px">

                                    <span>
                                        <strong>Estimated Delivery - </strong> 1-3 Business Days</span>
                                </p>
                            </li>

                        </ul>
                    </td>
                    <td class="row-price">$1.67</td>
                    <td class="row-quantity">2</td>
                    <td class="row-total">$3.34</td>
                </tr>
            </tbody>
        </table>

        <div class="items__bottom">
            <ul class="checkout-summary" id="cartinfoid">
                <li>
                    <input type="hidden" name="amt" id="amt" value="13.33"><input type="hidden" name="subtotalold" id="subtotalold" value="3.34">
                </li>
                
                <li class="subtotal">
                    <p class="title tolies">Subtotal:</p>
                    <p class="value">$3.34</p>
                </li>
                <li class="shipping">
                    <p class="title">Shipping: (2 Items)</p>
                    <p class="value">$9.99</p>
                </li>
                <li class="total">
                    <p class="title">Total:</p>
                    <p class="value">$13.33</p>
                </li>

        </div>
    </div>

    <div class="card__action">
        <button class="btn btn--secondary ml-auto">Place Order</button>
    </div>
</div>


<script>

</script>