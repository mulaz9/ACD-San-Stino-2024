<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACD San Stino</title>
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <script type="text/javascript">
        var _iub = _iub || [];
        _iub.csConfiguration = {
            "consentOnContinuedBrowsing": false,
            "invalidateConsentWithoutLog": true,
            "perPurposeConsent": true,
            "siteId": 2796875,
            "whitelabel": false,
            "cookiePolicyId": 53613718,
            "lang": "it",
            "banner": {
                "acceptButtonCaptionColor": "#FFFFFF",
                "acceptButtonColor": "#0073CE",
                "acceptButtonDisplay": true,
                "backgroundColor": "#FFFFFF",
                "brandBackgroundColor": "#FFFFFF",
                "brandTextColor": "#000000",
                "closeButtonRejects": true,
                "customizeButtonCaptionColor": "#4D4D4D",
                "customizeButtonColor": "#DADADA",
                "customizeButtonDisplay": true,
                "explicitWithdrawal": true,
                "listPurposes": true,
                "logo": "https://res.cloudinary.com/mulaz/image/upload/v1695918508/small_logo_5907d9e523.png",
                "textColor": "#000000"
            }
        };
    </script>
    <script type="text/javascript" src="//cdn.iubenda.com/cs/iubenda_cs.js" charset="UTF-8" async></script>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php get_template_part('partials/boxes/headerbox'); ?>