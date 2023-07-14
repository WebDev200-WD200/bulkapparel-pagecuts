[:header_template:] <!-- import /var/www/html/addon/email-header-template.php, replace [:base_url:], [:pre-header:] -->

<table>
    <tr>
        <td>
            <h1 style=" font-size: 26px; font-weight: 700; color: #003170; letter-spacing: -1px; margin-top: 30px;">
                Order Delivered!
            </h1>
        </td>
    </tr>
</table>

<table>
    <tr>
        <td>
            <p style="font-size:16px;color:#3e3e3e">
                Dear [:customer:],
                <br><br>
                We hope this email finds you well. We wanted to inform you that your order has been successfully delivered to the specified address. As per your request, we are providing you with the necessary details to track your package.
                <br><br>
                To ensure a seamless experience, we have included a link below that will redirect you to our website where you can access the actual tracking information for your order.
            </p>
        </td>
    </tr>

    <tr>
        <td class="view-tracking-button" style="background-color: #003170; text-align: center; border-radius: 5px;" bgcolor="#003170" align="center">
            <a class href="<?= $base_url ?>" style="display: inline-block; text-decoration: none; color: #fff; font-weight: bold; font-size: 18px; height: 100%; width: 100%; padding: 15px;">
                View Tracking
            </a>
        </td>
    </tr>
</table>


<br>
<br>
<table width="100%">
    <tr>
        <td class="card__thanks" style=" font-weight: 600;">
            Thank you for shopping with us! <br>
            <a href="<?= $base_url ?>" style=" color: #003170; font-weight: 700;">bulkapparel.com</a>
            Team
        </td>
    </tr>

    <!-- added tr and td | Make the footer of our emails nicer | WL 12/27/22 -->
    <tr>

        <td colspan="4">
            <br><br>

            <h4 style="margin:0;font-size: 19px;color: #003170;">Similar Items</h4>
        </td>
    </tr>
    <tr>
        <td>
            [:product-box:] <!-- Start - Orderconfirmation and tracking email we need to able to add shirts for advertising - RM - 02/04/2021 -->
        </td>
    </tr>
    <!-- added tr and td | Make the footer of our emails nicer | WL 12/27/22 -->
</table>

[:footer_template:] <!-- import /var/www/html/addon/email-footer-template.php, replace [:base_url:], [:year:], [:blog-url:] -->