<?php
$section = "home";
$currentSection = 'video_page';
require_once 'common.inc.php';

// $buttonArr: button no => type value
$buttonArr = array(
    '1' => '1',
    '2' => '2',
    '3' => '3',
    '4' => '4'
);
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $langObj->getText('title') ?></title>
    <link rel="stylesheet" href="plugin/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/css/main.css?v=<?=SITE_VERSION?>">
</head>

<body class="lang-<?= $lang ?>">
    <div class="main-container desktop-section">
        <div class="desktop-image-container">
            <img src="style/images/desktop/home.jpg" class="full-img" alt="logo" border=0 />
            <div class="btn-field">
                <img src="style/images/desktop/home-lang.jpg" class="full-img" alt="logo" border=0 />
                <?php foreach ($buttonArr as $buttonNo => $typeValue) : ?>
                    <a href="video.php?type=<?= $typeValue ?>" border=0>
                        <div class="btn-click b<?= $buttonNo ?>">&nbsp;</div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
        <br><br><br><br>
    </div>
    <div class="main-container mobile-section">
        <img src="style/images/mobile/home.jpg" class="full-img" alt="logo" border=0 />
        <div class="btn-field">
            <img src="style/images/mobile/home-lang.jpg" class="full-img" alt="logo" border=0 />
            <?php foreach ($buttonArr as $buttonNo => $typeValue) : ?>
                <a href="video.php?type=<?= $typeValue ?>" border=0>
                    <div class="btn-click bm<?= $buttonNo ?>">&nbsp;</div>
                </a>
            <?php endforeach; ?>
        </div>
        <br><br><br><br>
    </div>
    <script src="plugin/bootstrap/js/bootstrap.bundle.min.js"></script>
    <style>
        .btn-field {
            width: 100%;
            position: relative;
        }

        .btn-click {
            position: absolute;
            top: 0;
            left: 0;
            width: 44.5%;
            height: 52%;
            cursor: pointer;
        }

        .btn-click.b1 {
            left: 6%;
            width: 19.5%;
        }

        .btn-click.b2 {
            left: 28.8%;
            width: 19.5%;
        }

        .btn-click.b3 {
            left: 51.6%;
            width: 19.5%;
        }

        .btn-click.b4 {
            left: 74.5%;
            width: 19.5%;
        }

        .btn-click.bm1 {
            left: 6%;
            width: 19.5%;
        }

        .btn-click.bm2 {
            left: 28.5%;
            width: 19.5%;
        }

        .btn-click.bm3 {
            left: 51.5%;
            width: 19.5%;
        }

        .btn-click.bm4 {
            left: 74.5%;
            width: 19.5%;
        }

        /* Styles for mobile devices */
        @media only screen and (max-width: 759px) {
            .btn-click {
                height: 100%;
            }
        }
    </style>
</body>

</html>