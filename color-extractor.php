<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/shop-all-colors-page.css">
    <link id="theme" rel="stylesheet" href="./css/themes/independence-day.theme.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300&display=swap" rel="stylesheet">
</head>

<body>
    <main>

    </main>
    <script type="text/javascript">
        function tshirtWholesaleExtractor({
            brandName,
            brandCode,
            imagePrefix
        }) {
            // point the element cursor to the tshirtwholesale color chart table
            $($0).find('tr:first-child').remove();
            $($0).find('tr').each(function() {
                var image = $(this).find(':nth-child(1) img').attr('src');
                var name = $(this).find(':nth-child(2) a').text();
                var pantone = $(this).find(':nth-child(3)').text();
                var hex = $(this).find(':nth-child(4)').text();


                var rgb = null;
                var cmyk = null
                if (hex) {
                    rgb = hexToRgb(hex);
                    cmyk = rgb2cmyk(rgb.r, rgb.g, rgb.b);
                }
                var image = imagePrefix + image.replace('https://d1l2kcmc130e06.cloudfront.net/2/images/brand_colors/', '');
                defaultStructure({
                    brandCode,
                    brandName,
                    hex,
                    name,
                    cmyk,
                    rgb,
                    pantone,
                    swatchImage1: image,
                    colorPatternName: 'Solid'
                })

            })
        }
        tshirtWholesaleExtractor({
            brandCode: 'HAN',
            brandName: "Hanes",
            imagePrefix: '/hanes'
        })


        var colors = []

        function rgb2cmyk(r, g, b) {
            var computedC = 0;
            var computedM = 0;
            var computedY = 0;
            var computedK = 0;

            //remove spaces from input RGB values, convert to int
            var r = parseInt(('' + r).replace(/\s/g, ''), 10);
            var g = parseInt(('' + g).replace(/\s/g, ''), 10);
            var b = parseInt(('' + b).replace(/\s/g, ''), 10);

            if (r == null || g == null || b == null ||
                isNaN(r) || isNaN(g) || isNaN(b)) {
                console.log('Please enter numeric RGB values!');
                return;
            }
            if (r < 0 || g < 0 || b < 0 || r > 255 || g > 255 || b > 255) {
                console.log('RGB values must be in the range 0 to 255.');
                return;
            }

            // BLACK
            if (r == 0 && g == 0 && b == 0) {
                computedK = 1;
                return [0, 0, 0, 1];
            }

            computedC = 1 - (r / 255);
            computedM = 1 - (g / 255);
            computedY = 1 - (b / 255);

            var minCMY = Math.min(computedC,
                Math.min(computedM, computedY));
            computedC = Math.round((computedC - minCMY) / (1 - minCMY) * 100);
            computedM = Math.round((computedM - minCMY) / (1 - minCMY) * 100);
            computedY = Math.round((computedY - minCMY) / (1 - minCMY) * 100);
            computedK = Math.round(minCMY * 100);

            return {
                c: computedC,
                m: computedM,
                y: computedY,
                k: computedK
            };
        }


        function hexToRgb(hex) {
            var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
            return result ? {
                r: parseInt(result[1], 16),
                g: parseInt(result[2], 16),
                b: parseInt(result[3], 16)
            } : null;
        }


        function defaultStructure({
            brandCode,
            brandName,
            hex,
            name,
            cmyk,
            rgb,
            pantone,
            swatchImage1,
            colorPatternName
        }) {
            var color = {
                brandCode,
                brandName,
                hex,
                name,
                cmyk: cmyk ? {
                    C: cmyk.c,
                    M: cmyk.m,
                    Y: cmyk.y,
                    K: cmyk.k
                } : null,
                rgb: rgb ? {
                    R: rgb.r,
                    G: rgb.g,
                    B: rgb.b
                } : null,
                pantone,
                swatchImage1,
                colorPatternName
            }
            colors = [...colors, color];
        }

        console.log(JSON.stringify(colors))



        var bellaColors = [];
        var fetchData = [];

        sample.forEach(function(item) {
            bellaColors = [...item.color_item]
        })

        bellaColors.forEach(function(item) {


            fetchData.push(
                fetch(`https://www.bellacanvas.com/cgi-bin/live/wam_tmpl/shop_by_color.p?action=getDetails&page=shop_by_color&color_alias=${item.color_alias}&color_xref=${item.color_xref}&site=canvas&layout=Base&nocache=45392&content=json`).then(response => console.log(response))
            )

            $.ajax({
                url: "https://www.bellacanvas.com/cgi-bin/live/wam_tmpl/shop_by_color.p?action=getDetails&page=shop_by_color&color_alias=White/Grey/Black&color_xref=Ash&site=canvas&layout=Base&nocache=44663&content=jsonhttps://www.bellacanvas.com/cgi-bin/live/wam_tmpl/shop_by_color.p?action=getDetails&page=shop_by_color&color_alias=White/Grey/Black&color_xref=Ash&site=canvas&layout=Base&nocache=4466455",
            }).done(function(data) {
                console.log((JSON.parse(data.replace('<!-- Generated by Webspeed: http://www.webspeed.com/ -->', ''))).response.tColor_Item[0])
            });

        })
    </script>

</body>


</html>