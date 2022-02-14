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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/star-rating-svg@3.5.0/src/css/star-rating-svg.min.css ">
</head>

<body>
    <?php include('./components/layout/header.php') ?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <main>
        <div class="container" id="printThis">
            <div class="row mt-2">
                <div class="col-12">
                    <h3>Choose Color</h3>
                </div>
                <div class="col-12 mt-1">

                    <ul class="admin-color-picker" id="adminColorPicker">

                    </ul>


                    <div class="admin-color-dropdown mt-1" id="adminColorDropdown">
                        <button class="btn admin-color-dropdown__btn">
                            <span class="color">

                            </span>
                            <span class="text">
                                White
                            </span>
                            <span class="select">
                                (Select)
                            </span>
                            <span class="icon">

                            </span>
                        </button>

                        <ul style="display: none;">

                        </ul>
                    </div>
                </div>

                <div class="col-12 mt-2">
                    <h3>Quantity</h3>
                </div>
                <div class="col-12 mt-1">
                    <ul class="admin-sizes-picker" id="adminSizesPicker">

                    </ul>
                </div>
            </div>



        </div>
        <!-- <?php include('./components/feedback_modal.php') ?> -->

    </main>

    <script>
        var arrayOfColors = [{
                title: "White",
                color: "#fdfdfd"
            },
            {
                title: "Black",
                color: "#04080b"
            },
            {
                title: "Antique Cherry Red",
                color: "#c11b34"
            },
            {
                title: "Antique Irish Green",
                color: "#009b57"
            }, {
                title: "Antique Jade Dome",
                color: "#006269"
            },
            {
                title: "Antique Orange",
                color: "#b33d26"
            },
            {
                title: "Antique Sapphire",
                color: "#3368AA"
            },
            {
                title: "Ash",
                color: "#cfc9ca"
            },
            {
                title: "Azalea",
                color: "#e38ea8"
            },
            {
                title: "Berry",
                color: "#7f2952"
            }, {
                title: "Blackberry",
                color: "#221c35"
            }, {
                title: "Brown Savana",
                color: "#7a6855"
            }, {
                title: "Cardinal",
                color: "#940f22"
            }, {
                title: "Carolina Blue",
                color: "#7596c7"
            }, {
                title: "Charcoal",
                color: "#524949"
            }, {
                title: "Cobalt",
                color: "#1d62a7"
            }, {
                title: "Coral Silk",
                color: "#ff7f50"
            }, {
                title: "Cornsilk",
                color: "#ffdc72"
            }, {
                title: "Daisy",
                color: "#ffdc72"
            }, {
                title: "Dark Chocolate",
                color: "#46322e"
            }, {
                title: "Dark Heather",
                color: "#4d4d52"
            }, {
                title: "Electric Green",
                color: "#009b57"
            }, {
                title: "Forest Green",
                color: "#10271b"
            }, {
                title: "Garnet",
                color: "#861B2D"
            }, {
                title: "Gold",
                color: "#fcb129"
            }, {
                title: "Graphite Heather",
                color: "#524949"
            }, {
                title: "Gravel",
                color: "#b0acae"
            }, {
                title: "Heather Military Green",
                color: "#55513e"
            }, {
                title: "Heather Navy",
                color: "#414657"
            }, {
                title: "Heather Radiant Orchid",
                color: "#B8AACB"
            }, {
                title: "Heather Red",
                color: "#d51a2a"
            }, {
                title: "Heather Sapphire",
                color: "#09A5D6"
            }, {
                title: "Heliconia",
                color: "#d63b79"
            }, {
                title: "Ice Grey",
                color: "#ccc6c4"
            }, {
                title: "Indigo Blue",
                color: "#3a5064"
            }, {
                title: "Irish Green",
                color: "#009b57"
            }, {
                title: "Kiwi",
                color: "#93aa6a"
            }, {
                title: "Light Blue",
                color: "#9fb7cc"
            }, {
                title: "Light Pink",
                color: "#fcdce4"
            }, {
                title: "Lilac",
                color: "#B8AACB"
            }, {
                title: "Lime",
                color: "#abd482"
            }, {
                title: "Maroon",
                color: "#521123"
            }, {
                title: "Midnight",
                color: "#0f142a"
            }, {
                title: "Military Green",
                color: "#55513e"
            }, {
                title: "Mint Green",
                color: "#62F1DF"
            }, {
                title: "Natural",
                color: "#ede1cd"
            }, {
                title: "Navy",
                color: "#0f142a"
            }, {
                title: "Neon Blue",
                color: "#3368AA"
            }, {
                title: "Neon Green",
                color: "#009b57"
            }, {
                title: "Old Gold",
                color: "#F09916"
            }, {
                title: "Orange",
                color: "#f36d2c"
            }, {
                title: "Purple",
                color: "#4c3873"
            }, {
                title: "Red",
                color: "#d51a2a"
            }, {
                title: "Royal",
                color: "#1d62a7"
            }, {
                title: "Russet",
                color: "#521123"
            }, {
                title: "S. Orange",
                color: "#f58321"
            }, {
                title: "Safety Green",
                color: "#c3dc78"
            }, {
                title: "Safety Pink",
                color: "#f175a6"
            }, {
                title: "Sand",
                color: "#c8b69f"
            }, {
                title: "Sapphire",
                color: "#007db6"
            }, {
                title: "Sky",
                color: "#71BDD7"
            }, {
                title: "Sport Grey",
                color: "#b0acae"
            }, {
                title: "Sunset",
                color: "#d27e4e"
            }, {
                title: "Tennessee Orange",
                color: "#E64823"
            }, {
                title: "Texas Orange",
                color: "#ab5a30"
            }, {
                title: "Tropical Blue",
                color: "#3368AA"
            }, {
                title: "Turf Green",
                color: "#007a3e"
            }, {
                title: "Tweed",
                color: "#04080b"
            }, {
                title: "Violet",
                color: "#9094c4"
            }, {
                title: "Yellow Haze",
                color: "#fedb9d"
            }
        ]
        var pickerTemplate = '';
        var dropdownTemplate = '';

        for (var i = 0; i < arrayOfColors.length; i++) {
            var colorHex = arrayOfColors[i].color;
            var colorText = arrayOfColors[i].title;

            pickerTemplate += `
            <li data-id="${i}" style="background-color: ${colorHex};" data-color="${colorHex}" data-text="${colorText}" title="${colorText}">
                
            </li>
            `;

            dropdownTemplate += `
            <li data-id="${i}" data-color="${colorHex}" data-text="${colorText}" title="${colorText}">
                <span class="color" style="background-color: ${colorHex};">

                </span>
                <span class="text">
                    ${colorText}
                </span>
            </li>
            `
        }

        // Picker
        var colorPicker = $('.admin-color-picker');

        colorPicker.html(pickerTemplate);

        function changePickerColor(id, color, text) {
            colorPicker.attr('data-id', id);
            colorPicker.attr('data-color', color);
            colorPicker.attr('data-text', text);
        }

        function changePickerActive(id) {
            colorPicker.find('li').removeClass('active');
            colorPicker.find(`li[data-id='${id}']`).addClass('active');
        }

        colorPicker.find('li').click(function() {
            var colorId = $(this).attr('data-id');
            var colorText = $(this).attr('data-text');
            var colorHex = $(this).attr('data-color');
            changeDropdownColor(colorId, colorHex, colorText);
            changePickerColor(colorId, colorHex, colorText)
            changeDropdownActive(colorId)
            changePickerActive(colorId);
        })

        // Dropdown
        var colorDropdown = $('.admin-color-dropdown');
        var colorDropdownList = colorDropdown.find('ul');
        var colorDropdownItem = colorDropdown.find('li');
        var colorDropdownButton = colorDropdown.find('button');

        colorDropdownList.html(dropdownTemplate);


        colorDropdownButton.click(function(e) {
            colorDropdownList.slideToggle();
            e.stopPropagation()
        })

        $(window).click(function(e) {
            colorDropdownList.slideUp();
            e.stopPropagation();
        })

        function changeDropdownColor(id, color, text) {
            colorDropdownButton.find('.color').attr('style', `background-color: ${color};`);
            colorDropdownButton.find('.text').html(text);
            colorDropdown.attr('data-id', id);
            colorDropdown.attr('data-color', color);
            colorDropdown.attr('data-text', text);

        }

        function changeDropdownActive(id) {
            colorDropdown.find('li').removeClass('active');
            colorDropdown.find(`li[data-id='${id}']`).addClass('active');
        }

        colorDropdown.find('li').click(function(e) {
            var colorId = $(this).attr('data-id');
            var colorText = $(this).attr('data-text');
            var colorHex = $(this).attr('data-color');
            changeDropdownColor(colorId, colorHex, colorText);
            changePickerColor(colorId, colorHex, colorText)
            changeDropdownActive(colorId);
            changePickerActive(colorId)
        })


        var arrayOfSizes = ['S', 'M', 'L', 'XL', '2XL', '3XL', '4XL', '5XL'];
        var sizesTemplate = '';

        for (var i = 0; i < arrayOfSizes.length; i++) {
            var curSize = arrayOfSizes[i];
            sizesTemplate += `
                <li data-size="${curSize}">
                    ${curSize}
                </li>
            `
        }

        var sizesPicker = $('.admin-sizes-picker');
        sizesPicker.html(sizesTemplate);


        sizesPicker.find('li').click(function(e) {
            sizesPicker.find('li').removeClass('active');
            $(this).addClass('active');
            sizesPicker.attr('data-size',  $(this).attr('data-size'))
        })


        // Actions here, target it with #id


        $('#adminColorPicker').click(function() {
            var colorId = $(this).attr('data-id');
            var colorText = $(this).attr('data-text');
            var colorHex = $(this).attr('data-color');
            console.log('ColorPicker: ',colorId, colorText, colorHex)
        })

        $('#adminColorDropdown').click(function() {
            var colorId = $(this).attr('data-id');
            var colorText = $(this).attr('data-text');
            var colorHex = $(this).attr('data-color');
            console.log('ColorDropdown: ',colorId, colorText, colorHex)
        })

        $('#adminSizesPicker').click(function() {
            var size = $(this).attr('data-size');
            console.log('Sizes Picker: ',size)
        });
    </script>
    <?php include('./components/layout/footer.php') ?>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.4/jspdf.plugin.autotable.min.js"></script> -->
</body>


</html>