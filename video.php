<?php
$section = 'video';
$selected = (isset($_GET['type']) && $_GET['type'] != '') ? $_GET['type'] : '1';

switch ($selected) {
    case "1":
    case "2":
        $_GET['lang'] = 'en';
        break;
    case "4":
        $_GET['lang'] = 'sc';
        break;
    default:
        $_GET['lang'] = 'tc';
        break;
}
$currentSection = 'video_page';
require_once 'common.inc.php';
?><!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
    <title><?= $langObj->getText('title') ?></title>
    <link rel="stylesheet" href="plugin/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/css/main.css?v=<?=SITE_VERSION?>">
    <script>
        window.addEventListener('resize', function () {
            claVideoFrame();
        });
        window.addEventListener('load', function () {
            claVideoFrame();
        });
        function claVideoFrame() {
            const videoField = document.querySelector('.video-field');
            if (videoField) {
                videoField.style.display = 'none';
                const maxScreenWidth = 1900;
                const calScreenWidth = Math.min(window.innerWidth, maxScreenWidth);
                const currVideoFieldWidth = (calScreenWidth < 600) ? calScreenWidth * 0.98 : calScreenWidth * 0.65;
               
                const frameHeight = (currVideoFieldWidth / (16 / 9));
                const videoFrameHeight = Math.trunc(frameHeight);
                const videoFrameWidth = Math.trunc(16 / 9 * videoFrameHeight);
                videoField.style.width = videoFrameWidth + 'px';
                
                const mainVideo = document.getElementById('main-video');
                videoField.style.height = mainVideo.style.height - 1 + 'px';
                videoField.style.display = 'block';
            }
        }
    </script>
</head>

<body class="bg-video lang-<?=$lang?>">
    <div class="main-container">
        <?php require_once 'header.php'; ?>
        <div class="video-field" id="video-field">
            <?php
            if ($selected == '1') {
                ?><iframe id="main-video" src="<?=VIDEO_URL_FLOOR?>" width="100%"
                    style="aspect-ratio: 16/9;" frameborder="0" scrolling="no" allow="autoplay"
                    allowfullscreen webkitallowfullscreen mozallowfullscreen oallowfullscreen msallowfullscreen></iframe><?php
            } else if ($selected == '2') {
                ?><iframe id="main-video" src="<?=VIDEO_URL_ENGLISH?>" width="100%"
                        style="aspect-ratio: 16/9;" frameborder="0" scrolling="no" allow="autoplay"
                        allowfullscreen webkitallowfullscreen mozallowfullscreen oallowfullscreen msallowfullscreen></iframe><?php
            } else if ($selected == '3') {
                ?><iframe id="main-video" src="<?=VIDEO_URL_CANTONESE?>" width="100%"
                            style="aspect-ratio: 16/9;" frameborder="0" scrolling="no" allow="autoplay"
                            allowfullscreen webkitallowfullscreen mozallowfullscreen oallowfullscreen msallowfullscreen></iframe><?php
            } else {
                ?><iframe id="main-video" src="<?=VIDEO_URL_PUTONGHUA?>" width="100%"
                            style="aspect-ratio: 16/9;" frameborder="0" scrolling="no" allow="autoplay"
                            allowfullscreen webkitallowfullscreen mozallowfullscreen oallowfullscreen msallowfullscreen></iframe><?php
            }
            ?>
            <div style="clear: both;"></div>
        </div>
        <br><br>
        <script src="plugin/bootstrap/js/bootstrap.bundle.min.js"></script>
        <style>
            .desktop-section {
                display: block;
            }

            .mobile-section {
                display: none;
            }

            .video-field {
                width: 65%;
                margin: 0 auto 2% auto;
                position: relative;
                overflow: hidden;
            }

            .pdf-selection {
                width: 100%;
            }

            .pdf-selection>a {
                color: black;
                text-decoration: none;
                display: none;
            }

            .channel-selection {
                margin-top: 8px;
                float: right;
            }

            .pdf_image {
                width: 38%;
            }

            @media (max-width: 600px) {
                .video-field {
                    width: 98%;
                    margin: 1% auto 1% auto;
                }

                .channel-selectin {
                    bottom: -10%;
                }

                .pdf_image {
                    width: 80%;
                }

                .desktop-section {
                    display: none;
                }

                .mobile-section {
                    display: block;
                }

            }
        </style>
        <script>
            function redirect() {
                window.location.href = 'login.php?reset=Y';
            }

            $(document).ready(function () {
                $('#messageModal').on('hidden.bs.modal', function () {
                    redirect();
                });
            });
        </script>
</body>
</html>