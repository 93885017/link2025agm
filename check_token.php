<?php
session_start(); // start the session

require_once 'class/dbConnect.php';
$db = new dbConnect();
$conn = $db->connect();

require_once 'class/Member.php';
$memberObj = new Member();

$message = 'fail';
$code = 401;
$isValid = false;

if(isset($_COOKIE[SITE_SESSION_KEY.'token']) && $_COOKIE[SITE_SESSION_KEY.'token'] != '') {
    $valid_access_token = $memberObj->checkIsValidAccessToken($conn, $_COOKIE[SITE_SESSION_KEY.'token'], $_COOKIE[SITE_SESSION_KEY.'username']);
    if($valid_access_token) {
        $message = 'success';
        $code = 200;
        $isValid = true;
    }
}

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$responseData = array(
    'message' => $message,
    'code' => $code,
    'valid' => ($isValid)? 'Y':'N',
);

print_r(json_encode($responseData));
