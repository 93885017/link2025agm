<?php
require_once 'class/dbConnect.php';
require_once 'class/HelperClass.php';
require_once 'class/BilingualClass.php';
$default_lang = 'tc';
include 'config.php';

if (isset($_COOKIE[SITE_SESSION_KEY . 'lang'])) {
    $default_lang = $_COOKIE[SITE_SESSION_KEY . 'lang'];
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

if (!$isTesting) {
    $helperObj->checkCurrentSection('finish_page');
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

<body>
    <div class="main-container desktop-section">
        <div class="desktop-image-container"><img src="style/images/desktop/<?= DESTOP_FINSIH_IMG ?>" class="full-img" alt="finish" border=0 /></div>
    </div>
    <div class="main-container mobile-section"><img src="style/images/mobile/<?= MOBILE_FINSIH_IMG ?>" class="full-img" alt="finish" border=0 /></div>
    <script src="plugin/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>