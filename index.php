<?php
session_start();
require_once 'class/dbConnect.php';
require_once 'class/HelperClass.php';
require_once 'class/BilingualClass.php';
$default_lang = 'tc';
require_once 'config.php';

if (isset($_COOKIE[SITE_SESSION_KEY.'lang'])) {
    $default_lang = $_COOKIE[SITE_SESSION_KEY.'lang'];
}

$lang = (isset($_GET['lang']) && $_GET['lang'] != '') ? $_GET['lang'] : $default_lang;
$isTesting = (isset($_GET['testing']) && $_GET['testing'] == 'Y');

$accept_lang = array('en', 'tc', 'sc');
if (!in_array($lang, $accept_lang)) {
    $lang = 'tc';
}
$langObj = new BilingualClass();
$langObj->setLanguage($lang);

$db = new dbConnect();
$conn = $db->connect();

$helperObj = new HelperClass($conn);
$testMode = true;

if(!$isTesting) {
    $helperObj->checkCurrentSection('ready_page');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $langObj->getText('title') ?></title>
    <link rel="stylesheet" href="plugin/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/css/main.css?v=<?=SITE_VERSION?>">
    <script src="plugin/tools/functions.js?v=<?=SITE_VERSION?>"></script>
</head>

<body class="lang-<?=$lang?>">
    <div class="main-container desktop-section">
        <div class="desktop-image-container"><img src="style/images/desktop/<?=DESTOP_INDEX_IMG?>" class="full-img" alt="index" border=0 /></div>
    </div>
    <div class="main-container mobile-section"><img src="style/images/mobile/<?=MOBILE_INDEX_IMG?>" class="full-img" alt="index" border=0 /></div>
    <div class="main-container mobile-section-lanscape"><img src="style/images/mobile/<?=MOBILE_INDEX_IMG_LANDSCAPE?>" class="full-img" alt="index" border=0 /></div>
    <script src="plugin/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        setLanguage('<?=SITE_SESSION_KEY?>','<?= $lang ?>', false);
    </script>
    <style>
        .desktop-section {
            display: block;
        }

        .mobile-section {
            display: none;
        }

        /* Styles for desktop devices */
        @media only screen and (min-width: 760px) {
            /* CSS rules for desktop devices go here */
        }

        /* Styles for mobile devices */
        @media only screen and (max-width: 759px) {
            /* CSS rules for mobile devices go here */

            .desktop-section {
                display: none;
            }

            .mobile-section {
                display: block;
            }

            .lang-field {
                bottom: 26%;

            }

            .header-bar .left {
                font-size: 13px;
            }

            .mobile-section-lanscape {
                display: none;
            }

            /* Styles for mobile portrait orientation */
            @media only screen and (orientation: portrait) {
                /* CSS rules for mobile devices in portrait orientation go here */
            }

            /* Styles for mobile landscape orientation */
            @media only screen and (orientation: landscape) {

                /* CSS rules for mobile devices in landscape orientation go here */
                .mobile-section {
                    display: none;
                }

                .mobile-section-lanscape {
                    display: block;
                }
            }
        }
    </style>
</body>

</html>