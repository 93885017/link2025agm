<?php
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
date_default_timezone_set('Asia/Hong_Kong');
require_once 'class/dbConnect.php';
require_once 'class/HelperClass.php';

$db = new dbConnect();
$conn = $db->connect();
$helperObj = new HelperClass($conn);
$displayMsg = '';
$updateResult = null;

if (isset($_POST['submit'])) {

    $sel_section = $_POST['sel_section'];

    $updateResult = $helperObj->updateSiteConfig('enable_section', $sel_section);
}

$curr_section = $helperObj->getSiteConfig('enable_section');

mysqli_close($conn);

$sections = [
    'ready_page' => 'Ready Page',
    'video_page' => 'Video Page',
    'finish_page' => 'Finish Page',
];
?>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campaign Config</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="plugin/bootstrap/css/bootstrap.min.css">
    <script src="plugin/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <h1>Set Campaign Display Section</h1>
        <br>
        <form action="" method="post">
            <select id="sel_section" name="sel_section">
                <?php foreach ($sections as $value => $text) : ?>
                    <option value="<?= $value ?>" <?= ($curr_section == $value) ? 'selected' : '' ?>><?= $text ?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" name="submit" value="submit">
            <br>
            <div class="message-field" >
                <?php if ($updateResult) : ?>
                    <span class="<?= ($updateResult['result']) ? 'success' : 'error' ?>">
                        <?= $updateResult['message'] ?>
                         (<?php
                        echo date('Y-m-d H:i:s');
                        ?>)
                </span>
                <?php endif; ?>
            </div>
        </form>
        <script>
            $(document).ready(function() {
                $('form').submit(function(e) {
                    var curr_section = $('input[name="sel_section"]').val();
                    if (curr_section == '') {
                        alert('Please select the Display Section');
                        e.preventDefault();
                    }
                });
            });
        </script>
    </div>
    <style>
        .container {
            margin-top: 50px auto;
            text-align: center;
            width: 100%;
            padding-top: 8%;
        }
        .message-field {
            margin-top: 20px;
            font-size: 11px;
        }
        .success {
            color: green;
        }
        .error {
            color: red;
        }
    </style>
</body>

</html>