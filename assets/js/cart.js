
// Start - Delete Cart Item 
var cartItemDeleteBtn = $('.cart-group-item .delete');

cartItemDeleteBtn.on('click', function (e) {
    e.stopPropagation();

    var cardToDelete = $(this).parent('.cart-group-item');

    var styleId = $(cardToDelete).data('styleid')
    var groupId = $(cardToDelete).data('groupid')
    // do api call here

    if (cardToDelete.length) {
        cardToDelete.remove();
    }
})
// End - Delete Cart Item 


// Start - Quantity input
var cartQuantityInput = $('.cart-group-quantity');

cartQuantityInput.find('.input-quantity').on('keypress', function (e) {
    return e.metaKey || // cmd/ctrl
        e.which <= 0 || // arrow keys
        e.which == 8 || // delete key
        /[0-9]/.test(String.fromCharCode(e.which)); // numbers
})

function changeQuantityInput(self, type = 'input') {
    var input = $(self).siblings('.input-quantity');
    var prevValue = parseInt(input.val());
    var newValue = prevValue;
    switch (type) {
        case 'plus':
            newValue++
            break;
        case 'minus':
            newValue--
            break;
    }

    if (newValue <= 0) {
        // call api delete here
        alert('Delete Here')
    } else {
        input.val(newValue);
    }
}

cartQuantityInput.find('.plus').on('click', function (e) {
    e.stopPropagation();
    changeQuantityInput(this, 'plus')
})

cartQuantityInput.find('.minus').on('click', function (e) {
    e.stopPropagation();
    changeQuantityInput(this, 'minus')
})


// End - Quantity input


// Start - Change Destination

var btnDeliveryDate = $('#btnDeliveryDate');
var btnChangeDestination = $('#btnChangeDestination');
var cartDestinationEl = $('#cartDestination');
var cartZipcodeEl = $('#cartZipcode');
var inpZipCode = $('#inpZipCode');

btnDeliveryDate.on('click', function () {
    var zipCode = inpZipCode.val();

    if (zipCode == "") {
        return alert('Please enter zipcode');
    }

    //fetch zipcode info here

    cartZipcodeEl.hide();
    cartDestinationEl.show();


})

// End - Change Destination


btnChangeDestination.on('click', function () {
    cartZipcodeEl.show();
    cartDestinationEl.hide();
})
