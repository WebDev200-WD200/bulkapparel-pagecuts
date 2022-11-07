<?php 
$qe_sku = $data['sku'];
$qe_gtin = $data['gtin'];
$qe_qty = $data['qty'] | 0;
$qe_group_id = isset($data['group_id']) ? $data['group_id'] : ""
?>

<div class="quantity-editor">
    <div class="quantity-editor__body">
        <button type="button" class="btn-quantity minus">
            -
        </button>

        <input class="input-quantity qty" type="number" name="quantity" data-group-id="<?=$qe_group_id?>" data-sku="<?= $qe_sku ?>" data-gtin="<?= $qe_gtin ?>" data-qty="<?= $qe_qty ?>" value="<?= $qe_qty ?>" pattern="\d*" maxlength="6" min="0">

        <button type="button" class="btn-quantity plus">
            +
        </button>
    </div>
</div>