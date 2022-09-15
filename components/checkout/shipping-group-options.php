<div class="shipping-group__options">
    <div class="row">
        <?php foreach($shipping_options as $option):
            
            $activeClass = $option['selected'] ? 'ship-option-active' : '';
            $checkedAttr = $option['selected'] ? 'checked' : '';
            
            ?>
            <div class="col-12 col-lg-12 col-xl-6 mb-1 mb-lg-2">
            <div class="note-message-icon" style="position: absolute;right: 22px;top: 6px;">
                <button type="button" class="btn info-popup-btn">
                    <span class="info-popup-btn__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M13 9h-2V7h2m0 10h-2v-6h2m-1-9A10 10 0 002 12a10 10 0 0010 10 10 10 0 0010-10A10 10 0 0012 2z" />
                        </svg>
                    </span>
                </button>
                <div class="info-popup-text">
                    <div class="info-popup-text__container">
                        <div class="info-popup-text__close-button">
                            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" />
                            </svg>
                        </div>
                        <div class="info-popup-text__text-image">
                            <img src="<?=$option['description_image']?>" style="max-height: 200px; width: auto;" loading="lazy">
                            <?=$option['description']?> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="ship-option <?=$activeClass?>">
                <input type="radio" id="shipping_option_<?=$option['id']?>" name="shipping_method" value="<?=$option['id']?>" data-amount="<?=$option['amount']?>" data-days="<?=$option['additionalDaysForEstimatedDelivery']?>" <?=$checkedAttr?> data-title="<?=$option['name']?> - <?=$option['amount']?>">
                <label for="shipping_option_{$option['id']}">
                    <div class="ship-option__main">
                        <div class="ship-option__title">
                            <div class="image-container">
                                <img src="<?=$option['image']?>" loading="lazy">
                            </div>
                            <h3><?=$option['name']?><span> - <?=$option['amount']?></span>
                            </h3>
                            <div class="note-message-icon" style="display:none !important">
                                <button type="button" class="btn info-popup-btn">
                                    <span class="info-popup-btn__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path d="M13 9h-2V7h2m0 10h-2v-6h2m-1-9A10 10 0 002 12a10 10 0 0010 10 10 10 0 0010-10A10 10 0 0012 2z" />
                                        </svg>
                                    </span>
                                </button>
                                <div class="info-popup-text"><?=$option['description']?></div>
                            </div>

                        </div>
                        <small>  <?=$option['title']?></small>
                    </div>
                </label>
                <!-- New cart and Checkout updates | switch position WL 7/19/2021 -->
            </div>
        </div>
        <?php endforeach ?>
    </div>
</div>