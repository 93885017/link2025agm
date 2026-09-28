<?php
require_once 'class/dbConnect.php';
$db = new dbConnect();
$conn = $db->connect();

$confirmAdd = false;

if (isset($_GET['confirm']) && $_GET['confirm'] == 'Y') {
  $confirmAdd = true;
}

$fileName = '';
if (isset($_GET['file']) && $_GET['file'] != '') {
  $fileName = $_GET['file'];
}

if ($fileName == '') {
  echo '....';
  exit;
}

echo 'permission decied';exit;

/*
  csv format:
  username,name,email,password
  viewer7,test2,test2@test.com,123456
*/
// $file = fopen("importUse/testing account CSV.csv","r");
$file = fopen("importUse/" . $fileName, "r");
$i = 0;

$targetInsert = [];

while (!feof($file)) {
  $i++;

  $member = fgetcsv($file);
  $username = $member[0];
  $name = $member[1];
  $email = $member[2];
  $password = $member[3];

  if (intval($password) > 0 && $username !== '' && $name !== '') {
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);
    $email = mysqli_real_escape_string($conn, $email);
    $name = mysqli_real_escape_string($conn, $name);

    // insert into member table check if record exist
    $sql = "SELECT * FROM member WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
   
    if (!$row) {
      $targetInsert[] = [ $username, $name, $email, $password ];
    }
  }
}

if (count($targetInsert) > 0) {
  $sql = "INSERT INTO member (username, password, name, status, email) VALUES ";
  foreach ($targetInsert as $key => $value) {
    if ($key > 0) {
      $sql .= ', ';
    }
    $sql .= "('$value[0]', md5('$value[3]'), '$value[1]', 'active', '$value[2]')";
  }
  echo $sql . '<br>';
  if ($confirmAdd) {
    mysqli_query($conn, $sql);
  }
}

fclose($file);
echo 'done total: ' . $i;
exit;
