<?php

declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bulk Apparel Banner</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bulk-blue: #002868;
            --bulk-bg: #f6f8fa;
            --panel-bg: #ffffff;
            --text-dark: #21304f;
            --text-body: #4f566b;
            --shadow-soft: 0 0 0 1px rgba(0, 40, 104, 0.03);
            --radius: 16px;
            --banner-max-width: 1200px;
            --banner-height: 170px;
            --side-gap: 28px;
        }

        /*
        $bulk-blue: #002868;
        $bulk-bg: #F6F8FA;
        $panel-bg: #ffffff;
        $text-dark: #21304f;
        $text-body: #4f566b;
        $radius: 16px;
        $banner-max-width: 2405px;
        $banner-height: 170px;
        $side-gap: 28px;
        */

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: "Roboto Condensed", Arial, sans-serif;
            background: #ffffff;
            color: var(--text-dark);
        }

        .page {
            padding: 16px;
        }

        .bulk-banner {
            width: 100%;
            width: var(--banner-max-width);
            /* min-height: var(--banner-height); */
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1.03fr 1.17fr;
            gap: var(--side-gap);
        }

        .bulk-banner__panel {
            background: var(--bulk-bg);
            border-radius: var(--radius);
            box-shadow: var(--shadow-soft);
        }

        .bulk-banner__panel--benefits {
            padding: 18px 20px 16px;
        }

        .bulk-banner__title {
            margin: 0 0 18px;
            font-size: 22px;
            line-height: 1.1;
            font-weight: 700;
            color: var(--bulk-blue);
            letter-spacing: -0.03em;
        }

        .benefits-list {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 14px;
        }

        .benefit-item {
            display: flex;
            align-items: flex-start;
            gap: 8px;
            min-width: 0;
        }

        .benefit-item__icon {
            width: 30px;
            height: 30px;
            flex: 0 0 30px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .benefit-item__icon svg,
        .bulk-banner__cta-icon svg {
            width: 100%;
            height: 100%;
            display: block;
        }

        .benefit-item__copy h3 {
            margin: 0;
            font-size: 16px;
            line-height: 1.2;
            font-weight: 700;
            color: #2a2e35;
        }

        .benefit-item__copy p {
            margin: 2px 0 0;
            font-size: 13px;
            line-height: 1.25;
            color: var(--text-body);
        }

        .bulk-banner__panel--cta {
            padding: 20px 18px;
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .bulk-banner__button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 50px;
            padding: 10px 34px;
            border-radius: 8px;
            background: #113574;
            color: #ffffff;
            text-decoration: none;
            font-size: 20px;
            line-height: 1;
            font-weight: 700;
            letter-spacing: -0.03em;
            min-width: 152px;
        }

        .bulk-banner__cta-copy {
            min-width: 0;
        }

        .bulk-banner__cta-title {
            margin: 0 0 6px 0;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 22px;
            line-height: 1.12;
            font-weight: 700;
            color: var(--bulk-blue);
            letter-spacing: -0.03em;
        }

        .bulk-banner__cta-icon {
            width: 24px;
            height: 24px;
            flex: 0 0 24px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .bulk-banner__cta-text {
            margin: 0;
            font-size: 14px;
            line-height: 1.35;
            color: var(--text-body);
        }

        .bulk-mini-card {
            width: 170px;
            height: auto;
            margin: 18px auto 0;
            padding: 14px 12px 16px;
            background: var(--bulk-bg);
            border-radius: 18px;
        }

        .bulk-mini-card__title {
            margin: 0 0 8px;
            display: flex;
            align-items: flex-start;
            gap: 8px;
            font-size: 22px;
            line-height: 1.1;
            font-weight: 700;
            color: var(--bulk-blue);
            letter-spacing: -0.03em;
        }

        .bulk-mini-card__icon {
            width: 22px;
            height: 22px;
            flex: 0 0 22px;
            margin-top: 1px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .bulk-mini-card__icon svg {
            width: 100%;
            height: 100%;
            display: block;
        }

        .bulk-mini-card__text {
            margin: 8px 0;
            font-size: 14px;
            line-height: 1.2;
            font-weight: 400;
            color: var(--text-body);
            letter-spacing: -0.03em;
        }

        .bulk-mini-card__button {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            /* min-height: 42px; */
            padding: 10px 12px;
            border-radius: 8px;
            background: #113574;
            color: #ffffff;
            text-decoration: none;
            font-size: 15px;
            line-height: 1;
            font-weight: 700;
            letter-spacing: -0.03em;
        }

        @media (max-width: 1200px) {
            .bulk-banner {
                grid-template-columns: 1fr;
            }

            .benefits-list {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 720px) {
            .page {
                padding: 12px;
            }

            .bulk-banner__title,
            .bulk-banner__cta-title {
                font-size: 22px;
            }

            .benefits-list {
                grid-template-columns: 1fr;
            }

            .bulk-banner__panel--cta {
                flex-direction: column;
                align-items: stretch;
            }

            .bulk-banner__button {
                width: 100%;
            }

            .bulk-banner__cta-text {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>
    <main class="page">
        <section class="bulk-banner" aria-label="Bulk apparel benefits and add in bulk">
            <div class="bulk-banner__panel bulk-banner__panel--benefits">
                <h2 class="bulk-banner__title">Benefits on choosing Bulkapparel!</h2>

                <div class="benefits-list">
                    <article class="benefit-item">
                        <div class="benefit-item__icon" aria-hidden="true">
                            <svg width="31" height="31" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.9073 18.8854L15.4167 16.149L19.926 18.8854L18.7313 13.7594L22.7396 10.2906L17.4594 9.86667L15.4167 5.01042L13.374 9.86667L8.09375 10.2906L12.1021 13.7594L10.9073 18.8854ZM0 30.8333V3.08333C0 2.23542 0.302167 1.50981 0.9065 0.9065C1.51083 0.303195 2.23644 0.00102778 3.08333 0H27.75C28.5979 0 29.324 0.302167 29.9284 0.9065C30.5327 1.51083 30.8344 2.23644 30.8333 3.08333V21.5833C30.8333 22.4312 30.5317 23.1574 29.9284 23.7617C29.3251 24.366 28.5989 24.6677 27.75 24.6667H6.16667L0 30.8333ZM4.85625 21.5833H27.75V3.08333H3.08333V23.3177L4.85625 21.5833Z" fill="#002868" />
                            </svg>
                        </div>
                        <div class="benefit-item__copy">
                            <h3>Fast Delivery</h3>
                            <p>Free Shipping over $79</p>
                        </div>
                    </article>

                    <article class="benefit-item">
                        <div class="benefit-item__icon" aria-hidden="true">
                            <svg width="43" height="43" viewBox="0 0 43 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.7874 29.3504L23.1239 31.1292C23.1239 31.1292 36.4653 28.4609 38.2441 28.4609C40.023 28.4609 40.023 30.2398 38.2441 32.0186C36.4653 33.7975 30.2393 39.134 24.9028 39.134C19.5663 39.134 16.0086 36.4657 12.4509 36.4657H3.55664" stroke="#002868" stroke-width="3.55769" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M3.55664 25.7931C5.33549 24.0143 8.89318 21.346 12.4509 21.346C16.0086 21.346 24.4581 24.9037 25.7922 26.6825C27.1264 28.4614 23.1239 31.1297 23.1239 31.1297M14.2297 16.0095V8.89408C14.2297 8.4223 14.4171 7.96984 14.7507 7.63625C15.0843 7.30265 15.5368 7.11523 16.0086 7.11523H37.3547C37.8265 7.11523 38.279 7.30265 38.6126 7.63625C38.9462 7.96984 39.1336 8.4223 39.1336 8.89408V23.1248" stroke="#002868" stroke-width="3.55769" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M22.2324 7.11523H31.1267V15.12H22.2324V7.11523Z" stroke="#002868" stroke-width="3.55769" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="benefit-item__copy">
                            <h3>100 Days</h3>
                            <p>Free Return</p>
                        </div>
                    </article>

                    <article class="benefit-item">
                        <div class="benefit-item__icon" aria-hidden="true">
                            <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.141 2.96329C15.4747 2.59061 15.8832 2.2925 16.3399 2.0884C16.7966 1.8843 17.2912 1.77881 17.7915 1.77881C18.2917 1.77881 18.7863 1.8843 19.243 2.0884C19.6997 2.2925 20.1082 2.59061 20.4419 2.96329L21.6871 4.35435C22.043 4.75191 22.4838 5.06434 22.9767 5.26849C23.4697 5.47264 24.0023 5.56329 24.5351 5.53372L26.4028 5.43055C26.9024 5.40301 27.4022 5.48116 27.8695 5.65988C28.3369 5.83861 28.7612 6.1139 29.1149 6.46778C29.4686 6.82165 29.7437 7.24616 29.9222 7.71357C30.1007 8.18098 30.1787 8.68079 30.1509 9.18036L30.0477 11.0464C30.0184 11.5788 30.1092 12.1111 30.3133 12.6037C30.5175 13.0964 30.8298 13.5368 31.2271 13.8925L32.6181 15.1377C32.9911 15.4714 33.2895 15.88 33.4937 16.3369C33.698 16.7938 33.8036 17.2886 33.8036 17.7891C33.8036 18.2895 33.698 18.7844 33.4937 19.2412C33.2895 19.6981 32.9911 20.1068 32.6181 20.4405L31.2271 21.6856C30.8295 22.0415 30.5171 22.4823 30.3129 22.9753C30.1088 23.4682 30.0181 24.0008 30.0477 24.5336L30.1509 26.4014C30.1784 26.9009 30.1003 27.4007 29.9215 27.868C29.7428 28.3354 29.4675 28.7597 29.1136 29.1135C28.7598 29.4672 28.3353 29.7423 27.8679 29.9208C27.4004 30.0993 26.9006 30.1772 26.4011 30.1494L24.5351 30.0462C24.0026 30.0169 23.4704 30.1077 22.9777 30.3118C22.4851 30.516 22.0446 30.8283 21.6889 31.2256L20.4437 32.6167C20.11 32.9896 19.7014 33.288 19.2445 33.4923C18.7876 33.6965 18.2928 33.8021 17.7923 33.8021C17.2919 33.8021 16.7971 33.6965 16.3402 33.4923C15.8833 33.288 15.4747 32.9896 15.141 32.6167L13.8958 31.2256C13.5399 30.828 13.0992 30.5156 12.6062 30.3115C12.1132 30.1073 11.5806 30.0167 11.0478 30.0462L9.18006 30.1494C8.68048 30.1769 8.18071 30.0988 7.71338 29.9201C7.24606 29.7413 6.82168 29.466 6.46797 29.1122C6.11426 28.7583 5.83917 28.3338 5.66067 27.8664C5.48216 27.399 5.40426 26.8992 5.43203 26.3996L5.53521 24.5336C5.5645 24.0011 5.47372 23.4689 5.26958 22.9762C5.06543 22.4836 4.75315 22.0431 4.35583 21.6874L2.96477 20.4422C2.5918 20.1085 2.29344 19.6999 2.08916 19.243C1.88488 18.7862 1.7793 18.2913 1.7793 17.7909C1.7793 17.2904 1.88488 16.7956 2.08916 16.3387C2.29344 15.8818 2.5918 15.4732 2.96477 15.1395L4.35583 13.8943C4.7534 13.5384 5.06582 13.0977 5.26997 12.6047C5.47412 12.1117 5.56477 11.5791 5.53521 11.0464L5.43203 9.17858C5.40475 8.67914 5.48309 8.17957 5.66193 7.71246C5.84078 7.24534 6.11611 6.82119 6.46995 6.46768C6.8238 6.11417 7.24822 5.83924 7.7155 5.66084C8.18278 5.48244 8.68243 5.40457 9.18184 5.43233L11.0478 5.5355C11.5803 5.5648 12.1126 5.47402 12.6052 5.26987C13.0979 5.06573 13.5383 4.75345 13.894 4.35613L15.141 2.96329Z" stroke="#002868" stroke-width="3.55769" />
                                <path d="M13.3438 13.3428H13.3615V13.3606H13.3438V13.3428ZM22.238 22.237H22.2558V22.2548H22.238V22.237Z" stroke="#002868" stroke-width="5.33654" stroke-linejoin="round" />
                                <path d="M23.1262 12.4534L12.4531 23.1264" stroke="#002868" stroke-width="3.55769" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="benefit-item__copy">
                            <h3>Bulk Discounts</h3>
                            <p>Free Returns</p>
                        </div>
                    </article>

                    <article class="benefit-item">
                        <div class="benefit-item__icon" aria-hidden="true">
                            <svg width="43" height="43" viewBox="0 0 43 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.33624 21.3462H21.3459V24.0145H5.33624V21.3462ZM2.66797 14.6755H16.0093V17.3438H2.66797V14.6755Z" fill="#002868" />
                                <path d="M39.9157 22.1547L35.9133 12.8158C35.8104 12.5758 35.6394 12.3713 35.4215 12.2276C35.2036 12.0839 34.9483 12.0073 34.6872 12.0073H30.6848V9.33902C30.6848 8.98518 30.5442 8.64584 30.294 8.39564C30.0438 8.14544 29.7045 8.00488 29.3507 8.00488H8.00451V10.6732H28.0165V27.4245C27.409 27.778 26.8772 28.248 26.4518 28.8076C26.0265 29.3671 25.7158 30.0052 25.5377 30.6852H17.154C16.8293 29.4275 16.057 28.3315 14.982 27.6025C13.907 26.8735 12.603 26.5616 11.3145 26.7253C10.026 26.889 8.84137 27.517 7.98274 28.4915C7.1241 29.4661 6.65039 30.7204 6.65039 32.0193C6.65039 33.3182 7.1241 34.5725 7.98274 35.5471C8.84137 36.5217 10.026 37.1496 11.3145 37.3133C12.603 37.477 13.907 37.1651 14.982 36.4361C16.057 35.7071 16.8293 34.6111 17.154 33.3534H25.5377C25.8279 34.4984 26.4917 35.514 27.4239 36.2394C28.3561 36.9648 29.5036 37.3587 30.6848 37.3587C31.866 37.3587 33.0135 36.9648 33.9457 36.2394C34.8779 35.514 35.5417 34.4984 35.8319 33.3534H38.6896C39.0434 33.3534 39.3828 33.2129 39.633 32.9627C39.8832 32.7125 40.0237 32.3731 40.0237 32.0193V22.6804C40.0237 22.4996 39.9869 22.3208 39.9157 22.1547ZM12.0069 34.6876C11.4792 34.6876 10.9633 34.5311 10.5245 34.2379C10.0857 33.9447 9.74371 33.528 9.54176 33.0404C9.3398 32.5528 9.28696 32.0163 9.38992 31.4988C9.49287 30.9812 9.747 30.5057 10.1202 30.1326C10.4933 29.7594 10.9688 29.5053 11.4864 29.4023C12.004 29.2994 12.5405 29.3522 13.028 29.5541C13.5156 29.7561 13.9323 30.0981 14.2255 30.5369C14.5187 30.9757 14.6752 31.4916 14.6752 32.0193C14.6752 32.727 14.3941 33.4057 13.8937 33.9061C13.3933 34.4065 12.7146 34.6876 12.0069 34.6876ZM30.6848 14.6756H33.8067L36.6671 21.3462H30.6848V14.6756ZM30.6848 34.6876C30.1571 34.6876 29.6412 34.5311 29.2024 34.2379C28.7636 33.9447 28.4216 33.528 28.2196 33.0404C28.0177 32.5528 27.9648 32.0163 28.0678 31.4988C28.1708 30.9812 28.4249 30.5057 28.798 30.1326C29.1712 29.7594 29.6467 29.5053 30.1642 29.4023C30.6818 29.2994 31.2183 29.3522 31.7059 29.5541C32.1935 29.7561 32.6102 30.0981 32.9034 30.5369C33.1966 30.9757 33.3531 31.4916 33.3531 32.0193C33.3531 32.727 33.0719 33.4057 32.5716 33.9061C32.0712 34.4065 31.3925 34.6876 30.6848 34.6876ZM37.3555 30.6852H35.8319C35.538 29.5424 34.8732 28.5294 33.9417 27.8051C33.0103 27.0808 31.8648 26.6861 30.6848 26.6828V24.0145H37.3555V30.6852Z" fill="#002868" />
                            </svg>
                        </div>
                        <div class="benefit-item__copy">
                            <h3>Fast Delivery</h3>
                            <p>Free Shipping over $79</p>
                        </div>
                    </article>
                </div>
            </div>

            <div class="bulk-banner__panel bulk-banner__panel--cta">
                <a class="bulk-banner__button" href="#">Add in Bulk</a>

                <div class="bulk-banner__cta-copy">
                    <h2 class="bulk-banner__cta-title">
                        <span class="bulk-banner__cta-icon" aria-hidden="true">
                            <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M27.4173 21.5416V33.2916M21.5423 27.4166H33.2923M5.87565 13.7083H9.79232C10.8311 13.7083 11.8273 13.2956 12.5618 12.5611C13.2963 11.8266 13.709 10.8304 13.709 9.79159V5.87492C13.709 4.83615 13.2963 3.83993 12.5618 3.10542C11.8273 2.3709 10.8311 1.95825 9.79232 1.95825H5.87565C4.83689 1.95825 3.84067 2.3709 3.10615 3.10542C2.37163 3.83993 1.95898 4.83615 1.95898 5.87492V9.79159C1.95898 10.8304 2.37163 11.8266 3.10615 12.5611C3.84067 13.2956 4.83689 13.7083 5.87565 13.7083ZM25.459 13.7083H29.3757C30.4144 13.7083 31.4106 13.2956 32.1452 12.5611C32.8797 11.8266 33.2923 10.8304 33.2923 9.79159V5.87492C33.2923 4.83615 32.8797 3.83993 32.1452 3.10542C31.4106 2.3709 30.4144 1.95825 29.3757 1.95825H25.459C24.4202 1.95825 23.424 2.3709 22.6895 3.10542C21.955 3.83993 21.5423 4.83615 21.5423 5.87492V9.79159C21.5423 10.8304 21.955 11.8266 22.6895 12.5611C23.424 13.2956 24.4202 13.7083 25.459 13.7083ZM5.87565 33.2916H9.79232C10.8311 33.2916 11.8273 32.8789 12.5618 32.1444C13.2963 31.4099 13.709 30.4137 13.709 29.3749V25.4583C13.709 24.4195 13.2963 23.4233 12.5618 22.6888C11.8273 21.9542 10.8311 21.5416 9.79232 21.5416H5.87565C4.83689 21.5416 3.84067 21.9542 3.10615 22.6888C2.37163 23.4233 1.95898 24.4195 1.95898 25.4583V29.3749C1.95898 30.4137 2.37163 31.4099 3.10615 32.1444C3.84067 32.8789 4.83689 33.2916 5.87565 33.2916Z" stroke="#002868" stroke-width="3.91667" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                        Add Multiple Colors &amp; Sizes in One Step
                    </h2>
                    <p class="bulk-banner__cta-text">
                        Select quantities across variants and add them all to your cart instantly.
                    </p>
                </div>
            </div>
        </section>

        <section class="bulk-mini-card" aria-label="Order in bulk card">
            <h2 class="bulk-mini-card__title">
                <span class="bulk-mini-card__icon" aria-hidden="true">
                    <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M27.4173 21.5416V33.2916M21.5423 27.4166H33.2923M5.87565 13.7083H9.79232C10.8311 13.7083 11.8273 13.2956 12.5618 12.5611C13.2963 11.8266 13.709 10.8304 13.709 9.79159V5.87492C13.709 4.83615 13.2963 3.83993 12.5618 3.10542C11.8273 2.3709 10.8311 1.95825 9.79232 1.95825H5.87565C4.83689 1.95825 3.84067 2.3709 3.10615 3.10542C2.37163 3.83993 1.95898 4.83615 1.95898 5.87492V9.79159C1.95898 10.8304 2.37163 11.8266 3.10615 12.5611C3.84067 13.2956 4.83689 13.7083 5.87565 13.7083ZM25.459 13.7083H29.3757C30.4144 13.7083 31.4106 13.2956 32.1452 12.5611C32.8797 11.8266 33.2923 10.8304 33.2923 9.79159V5.87492C33.2923 4.83615 32.8797 3.83993 32.1452 3.10542C31.4106 2.3709 30.4144 1.95825 29.3757 1.95825H25.459C24.4202 1.95825 23.424 2.3709 22.6895 3.10542C21.955 3.83993 21.5423 4.83615 21.5423 5.87492V9.79159C21.5423 10.8304 21.955 11.8266 22.6895 12.5611C23.424 13.2956 24.4202 13.7083 25.459 13.7083ZM5.87565 33.2916H9.79232C10.8311 33.2916 11.8273 32.8789 12.5618 32.1444C13.2963 31.4099 13.709 30.4137 13.709 29.3749V25.4583C13.709 24.4195 13.2963 23.4233 12.5618 22.6888C11.8273 21.9542 10.8311 21.5416 9.79232 21.5416H5.87565C4.83689 21.5416 3.84067 21.9542 3.10615 22.6888C2.37163 23.4233 1.95898 24.4195 1.95898 25.4583V29.3749C1.95898 30.4137 2.37163 31.4099 3.10615 32.1444C3.84067 32.8789 4.83689 33.2916 5.87565 33.2916Z" stroke="#002868" stroke-width="3.91667" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
                <span>Order In Bulk</span>
            </h2>
            <p class="bulk-mini-card__text">Easiest way to buy multiple colors and sizes in 1 click</p>
            <a class="bulk-mini-card__button" href="#">Add in Bulk</a>
        </section>
    </main>
</body>

</html>