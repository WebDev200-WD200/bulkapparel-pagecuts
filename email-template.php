<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/email-template.css">
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
        $email_id = 'test';
        $user_id = 'christian@webdev200.com';
        $reactions = [
            [
                "id" => 'angry',
                'image' => "https://300.bulkapparel.com/images/email/utils/feedback/angry.png",
                'title' => 'Angry',
                "alt" => 'angry emoji'
            ],
            [
                "id" => 'sad',
                'image' => "https://300.bulkapparel.com/images/email/utils/feedback/sad.png",
                'title' => 'Sad',
                "alt" => 'sad emoji'
            ],
            [
                "id" => 'neutral',
                'image' => "https://300.bulkapparel.com/images/email/utils/feedback/neutral.png",
                'title' => 'Neutral',
                "alt" => 'neutral emoji'
            ],
            [
                "id" => 'happy',
                'image' => "https://300.bulkapparel.com/images/email/utils/feedback/happy.png",
                'title' => 'Happy',
                "alt" => 'happy emoji'
            ],
            [
                "id" => 'love',
                'image' => "https://300.bulkapparel.com/images/email/utils/feedback/love.png",
                'title' => 'Love it!',
                "alt" => 'love emoji'
            ],
        ]
        ?>


        <table class="newsletter-feedback">
            <tbody>
                <tr>
                    <td class="newsletter-feedback__header">
                        <h2 class="newsletter-feedback__title">Rate our newsletter</h2>
                    </td>
                </tr>

                <tr>
                    <td class="newsletter-feedback__list">
                        <table>
                            <tr>
                                <?php foreach ($reactions as $key => $value) : ?>
                                    <td>
                                        <a class="newsletter-feedback__reaction" target="_blank" href="https://300.bulkapparel.com/newsletter-feedback?newsletter_id=*|HTML:CAMPAIGN_UID|*&amp;user_id=*|HTML:EMAIL|*&amp;feedback=<?= $value['id']; ?>" title="<?= $value['id']; ?>">
                                            <img class="newsletter-feedback__reaction-img" src="<?= $value['image']; ?>" alt="<?= $value['alt']; ?>" width="70">

                                            <p class="newsletter-feedback__reaction-p"><?= $value['title']; ?></p>
                                        </a>
                                    </td>
                                <?php endforeach; ?>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>

        <table class="email-links email-container">
            <tr>
                <td class="email-links__container">
                    <table>
                        <tr>
                            <td class="email-links__wrapper">
                                <a href="https://www.bulkapparel.com/tracking" class="email-links__link">
                                    <img src="https://mcusercontent.com/30a5cd6624e6806da8c4b670e/images/bcdae388-a2f4-e801-36e3-07a26f6528f3.png" alt="Track order">
                                </a>
                            </td>
                            <td class="email-links__wrapper">
                                <a href="https://www.bulkapparel.com/returns" class="email-links__link">
                                    <img src="https://mcusercontent.com/30a5cd6624e6806da8c4b670e/images/d6634fad-94a0-3c52-5198-16ea440fe4e7.png" alt="Return">
                                   
                                </a>
                            </td>
                            <td class="email-links__wrapper">
                                <a href="https://www.bulkapparel.com/customer-service" class="email-links__link">
                                    <img src="https://mcusercontent.com/30a5cd6624e6806da8c4b670e/images/70a24372-1514-af1b-7efe-3783d93173a8.png" alt="Contact">
                                </a>
                            </td>
                            <td class="email-links__wrapper">
                                <a href="https://blog.bulkapparel.com/" class="email-links__link">
                                    <img src="https://mcusercontent.com/30a5cd6624e6806da8c4b670e/images/8a5ea159-08ad-37cf-2b4c-f785bb3a678c.png" alt="Blog">
                                </a>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </main>
</body>


</html>