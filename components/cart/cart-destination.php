<?php 

$destination = $cart_data['destination'];
$groups = $cart_data['group']
?>
<div class="new-cart-section">
    <div class="new-cart-section__header">
        <h2>Shipping Destination</h3>
    </div>

    <div class="new-cart-section__content">

        <div class="cart-zipcode" id="cartZipcode">
            <div class="row">
                <div class="col-12">
                    <input class="inp inp--primary w-100" placeholder="Type zipcode here" id="inpZipCode"></input>
                </div>
                <div class="col-12 mt-1">
                    <div class="btn btn-cart btn-cart--block btn-cart--primary" id="btnDeliveryDate">
                        Get Delivery Date
                    </div>
                </div>
            </div>

        </div>

        <div class="cart-destination" id="cartDestination" style="display: none;">
            <div class="cart-destination__header">
                <h3 class="location"><?=$destination['location'] ?>, <?=$destination['zip_code'] ?></h3>
                <button class="btn change" id="btnChangeDestination">Change Destination</button>
            </div>

            <div class="cart-destination-groups">
                <p class="cart-destination-groups__subheader text-secondary">Earlist Delivery</p>
                <div class="cart-destination-groups__items">

                    <?php foreach($groups as $item) {?>
                    <div class="cart-destination-group">
                        <h5 class="cart-destination-group__name">
                            <?=$item['name'] ?>
                        </h5>
                        <div class="cart-destination-group__content">
                            <div class="row">
                                <div class="col-auto">
                                    <h4 class="cart-destination-group__date"><?=$item['earlist_delivery']?></h4>
                                    <p class="cart-destination-group__count text-secondary"><?=count($item['items'])?> Items</p>
                                </div>
                                <div class="col-auto d-flex align-item-center ml-auto">
                                    <a class="cart-destination-group__change" href="<?='#group'.$item['id'] ?>">Change</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>