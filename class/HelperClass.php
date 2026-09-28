<?php
class HelperClass
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function checkCurrentSection($sectionName, $setionValue = '')
    {
        $sql = "SELECT meta_value FROM site_config WHERE meta_key = 'enable_section'";
        $result = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_array($result);
        $redirectTo = '';
        if ($row) {

            if ($row['meta_value'] == 'video_page' && $setionValue == 'login') {
                $redirectTo = '';
            } elseif ($row['meta_value'] !== $sectionName) {
                switch ($row['meta_value']) {
                    case "video_page":
                        $redirectTo = "home.php";
                        break;
                    case "finish_page":
                        $redirectTo = "finish.php";
                        break;
                    default:
                        $redirectTo = "index.php";
                        break;
                        break;
                }
            } else {
                $redirectTo = '';
            }
        }

        if ($redirectTo != '') {
            $currTime = time();
            echo '<script>
                window.location = "' . $redirectTo .'?t=' . $currTime . '";
                </script>';
            exit;
        }

    }

    public function updateSiteConfig($key, $value)
    {
        try {
            $sql = "UPDATE site_config SET meta_value = ?, updated_at = NOW() WHERE meta_key = ?";
            $stmt = mysqli_prepare($this->conn, $sql);
            if (!$stmt) {
                throw new Exception("Failed to prepare statement: " . mysqli_error($this->conn));
            }
            mysqli_stmt_bind_param($stmt, 'ss', $value, $key);
            if (!mysqli_stmt_execute($stmt)) {
                throw new Exception("Failed to execute statement: " . mysqli_stmt_error($stmt));
            }
            mysqli_stmt_close($stmt);
        } catch (Exception $e) {
            return ['result' => false, 'message' => 'Failed to update the section. Please contact the system admin. ('.$e->getMessage().')'];
        }
        return ['result'=> true, 'message' => 'Updated successfully'];
    }

    public function getSiteConfig($metaKey)
    {
        $sql = "SELECT meta_value FROM site_config WHERE meta_key = '$metaKey'";
        $result = mysqli_query($this->conn, $sql);
       
        $row = mysqli_fetch_array($result);
        if ($row) {
            return $row['meta_value'];
        } else {
            return false;
        }
    }

    public function checkCampaignStart($testMode)
    {
        date_default_timezone_set('Asia/Hong_Kong');
        $now = time();

        if ($testMode) {
            $target = mktime(3, 12, 0, 7, 9, 2023);
        } else {
            $startTime = $this->getSiteConfig('start_time');
            $target = strtotime($startTime);
        }

        // if ($target > $now) {
        //     echo 'The compare time is in the future.';
        // } elseif ($target < $now) {
        //     echo 'The compare time is in the past.';
        // } else {
        //     echo 'The compare time is the same as the current time.';
        // }

        return ($now > $target);
    }

    public function checkCampaignEnd($testMode)
    {
        date_default_timezone_set('Asia/Hong_Kong');
        $now = time();

        if ($testMode) {
            $target = mktime(3, 12, 0, 7, 20, 2023);
        } else {
            $endTime = $this->getSiteConfig('end_time');
            $target = strtotime($endTime);
        }
        return ($now > $target);
    }
}
