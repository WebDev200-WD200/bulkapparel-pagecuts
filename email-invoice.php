<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/email-invoice.css">
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
    <main>

        <?php

        $invoiceInfo = [
            "orderNo" => "B13215853158",
            "date" => "03/01/2022",
            "status" => "Shipped",
            "address1" => "2244 Faraday Ave #102",
            "address2" => "Carlsbad Ca, 92008",
            "email" => "Support@Bulkapparel.com"
        ];

        $billTo = [
            "name" => "Attn: Melissa Sorrelle",
            "address1" => "1371 Sardis Rd",
            "address2" => "Gardendale, AL 35071",
        ];

        $shipTo = [
            "name" => "Attn: Melissa Sorrelle",
            "address1" => "1371 Sardis Rd",
            "address2" => "Gardendale, AL 35071",
        ];

        $summary = [
            "subtotal" => 36.15,
            "shipping" => 8.95,
            "tax" => 8.95,
            "total" => 48.35,
        ];

        $paymentMethod = [
            "provider" => "Visa",
            "no" => "****4581"
        ];

        $items  = array(
            array(
                'gtin' => '12345678901234',
                'description' => 'G500 Gildan T-Shirt 5000 Heavy Cotton 5.3 ',
                'color' => 'Blue',
                'size' => 'M',
                'pieces' => 2,
                'price' => 10.00,
                'total' => 20.00
            ),
            array(
                'gtin' => '23456789012345',
                'description' => 'Hanes 5280 ComfortSoft T-Shirt',
                'color' => 'Black',
                'size' => 'L',
                'pieces' => 1,
                'price' => 25.00,
                'total' => 25.00
            ),
            array(
                'gtin' => '34567890123456',
                'description' => 'Fruit of the Loom 3930R HD Cotton Short Sleeve T-Shirt ',
                'color' => 'Gray',
                'size' => 'S',
                'pieces' => 3,
                'price' => 15.00,
                'total' => 45.00
            )
        );

        ?>


        <table class="email-template">
            <tbody>
                <tr>
                    <td>
                        <table class="email-invoice" width="800px">
                            <tbody>
                                <tr>
                                    <td class="email-invoice__header">
                                        <table>
                                            <tr>
                                                <td>
                                                   <a href="https://www.bulkapparel.com/images/logo.jpg">
                                                        <img class="email-invoice__logo" src="https://www.bulkapparel.com/images/logo.jpg" height="55px" width="231">
                                                   </a>
                                                </td>
                                                <td>
                                                    <p class="email-invoice__info">
                                                        <span><?= $invoiceInfo['address1'] ?></span>
                                                        <br>
                                                        <span><?= $invoiceInfo['address2'] ?></span>
                                                        <br>
                                                        <span><?= $invoiceInfo['email'] ?></span>
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="email-invoice__info">
                                                        <span>Order#: <?= $invoiceInfo['orderNo'] ?></span>
                                                        <br>
                                                        <span>Date:<?= $invoiceInfo['date'] ?></span>
                                                        <br>
                                                        <span>Status:<?= $invoiceInfo['status'] ?></span>
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="email-invoice__address">
                                        <table>
                                            <tr>
                                                <td class="email-invoice__address-column">
                                                    <table>
                                                        <tr>
                                                            <td class="title">
                                                                <b>Bill to:</b>
                                                            </td>
                                                            <td>
                                                                <p class="email-invoice__address-text">
                                                                    <span><?= $billTo['name'] ?></span>
                                                                    <br>
                                                                    <span><?= $billTo['address1'] ?></span>
                                                                    <br>
                                                                    <span><?= $billTo['address1'] ?></span>
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td class="email-invoice__address-column">
                                                    <table>
                                                        <tr>
                                                            <td class="title">
                                                                <b>Ship to:</b>
                                                            </td>
                                                            <td>
                                                                <p class="email-invoice__address-text">
                                                                    <span><?= $shipTo['name'] ?></span>
                                                                    <br>
                                                                    <span><?= $shipTo['address1'] ?></span>
                                                                    <br>
                                                                    <span><?= $shipTo['address1'] ?></span>
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>

                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="email-invoice__purchase">
                                        <table>
                                            <tr>
                                                <th>
                                                    Item
                                                </th>
                                                <th>
                                                    Description
                                                </th>
                                                <th>
                                                    Color
                                                </th>
                                                <th align="center">
                                                    Size
                                                </th>
                                                <th align="center">
                                                    Pieces
                                                </th>
                                                <th>
                                                    Price
                                                </th>
                                                <th>
                                                    Total
                                                </th>
                                            </tr>

                                            <?php foreach ($items as $item) : ?>
                                                <tr>
                                                    <td><?= $item['gtin'] ?></td>
                                                    <td><?= $item['description'] ?></td>
                                                    <td><?= $item['color'] ?></td>
                                                    <td align="center"><?= $item['size'] ?></td>
                                                    <td align="center"><?= $item['pieces'] ?></td>
                                                    <td><?= $item['price'] ?></td>
                                                    <td><?= $item['total'] ?></td>
                                                </tr>
                                            <?php endforeach ?>

                                        </table>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <table>
                                            <tr>
                                                <td class="email-invoice__payment">
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <p class="title">Payment Method</p>
                                                                <p class="method">
                                                                    <span><?=$paymentMethod['provider']?>
                                                                </span>
                                                                    <span><?=$paymentMethod['no']?>
                                                                
                                                                
                                                                </span>
                                                                </p>

                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>

                                                <td class="email-invoice__summary">
                                                    <table class="summary">
                                                        <tr>
                                                            <td>
                                                                <table>
                                                                    <tr>
                                                                       <td class="title">Subtotal</td>
                                                                       <td class="value"><?=$summary['subtotal']?></td> 
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="title">Shipping</td>
                                                                        <td class="value"><?=$summary['shipping']?></td> 
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="title">Tax</td>
                                                                        <td class="value"><?=$summary['tax']?></td> 
                                                                    </tr>
                                                                    <tr class="total">
                                                                        <td class="title">Total</td>
                                                                        <td class="value"><?=$summary['total']?></td> 
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>


    </main>
</body>


</html>