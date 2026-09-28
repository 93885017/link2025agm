<?php
$currentSection = 'logout';
require_once 'common.inc.php';
require_once 'class/Member.php';
$memberObj = new Member();
echo $memberObj->logout();

unset($_SESSION['testMode']);

echo '<script>window.location.href = "index.php";</script>';
exit;