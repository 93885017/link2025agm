<?php
require_once 'class/LoginLog.php';
require_once 'class/dbConnect.php';

$db = new dbConnect();
$conn = $db->connect();

$logObj = new LoginLog();
$logObj->exportCSV($conn);
