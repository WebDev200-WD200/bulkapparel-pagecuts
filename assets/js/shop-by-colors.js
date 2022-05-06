var colors = [
    {
        "name": 'White',
        "hex": '#fff'
    },
    {
        "name": 'Gray',
        "hex": '#AEA8A8'
    },
    {
        "name": 'Black',
        "hex": '#000'
    },
    {
        "name": 'Khaki',
        "hex": '#72815F'
    },
    {
        "name": 'Yellow',
        "hex": '#FAEA84'
    },
    {
        "name": 'Orange',
        "hex": '#EE7607'
    },
    {
        "name": 'Pink',
        "hex": '#E186CF'
    },
    {
        "name": 'Green',
        "hex": '#008000'
    },
    {
        "name": 'Blue',
        "hex": '#4C93BB'
    },
    {
        "name": 'Royal',
        "hex": '#0E0EF5'
    },
    {
        "name": 'Navy',
        "hex": '#06065A'
    },
    {
        "name": 'Brown',
        "hex": '#8D5C40'
    },
    {
        "name": 'Camo',
        "hex": '#5E6656'
    },
    {
        "name": 'Tie-Dye',
        "hex": '#09A4DE'
    },
    {
        "name": 'Neon',
        "hex": '#BDFF00'
    },
    {
        "name": 'Safety Green',
        "hex": '#42FF00'
    },
    {
        "name": 'Safety Orange',
        "hex": '#FF9900'
    },
    {
        "name": 'Safety Green',
        "hex": '#42FF00'
    },
    {
        "name": 'Orange',
        "hex": '#EE7607'
    },
    {
        "name": 'Pink',
        "hex": '#E186CF'
    },
    {
        "name": 'Green',
        "hex": '#008000'
    },
    {
        "name": 'Denim',
        "hex": '#4C93BB'
    }
]
function chunkArray(array, size) {
    let result = []
    for (let i = 0; i < array.length; i += size) {
        let chunk = array.slice(i, i + size)
        result.push(chunk)
    }
    return result
}

function shopByColorItem(color) {
    return ` <a href="#" class="shop-by-color">
        <div class="shop-by-color__box" style="background-color: ${color.hex};">
        </div>
        <div class="shop-by-color__title">
        ${color.name}
        </div>
    </a>`

}

function shopByColorDesktop() {
    var colorList = chunkArray(colors, 5);


    var columnTemplate = ''
    
    colorList.forEach(function (item) {
        var listTemplate = ''
        
        item.forEach(function (sub) {
            listTemplate+= `
            <li>
                ${shopByColorItem(sub)}
            </li>
            `;
        }) 


        columnTemplate += `
        <div class="shop-color-list__items">
            <ul>
                ${listTemplate}
            </ul>
        </div>
        `

    })

    return `
    <div class="shop-color-list">
       ${columnTemplate}
    </div>
    `
}


function generateShopByColor() {
    var shopByColorContainer = $('#shopByColorsContainer')
    console.log(shopByColorContainer)
    if ($(window).width() > 1000) {
        var desktopHtml = shopByColorDesktop();
        console.log(desktopHtml)
        shopByColorContainer.html(desktopHtml)
    } else {

    }
}


generateShopByColor()
setTimeout(function (param) {
}, 2000)


