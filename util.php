<?php
    // env file path for local
    // $filePath = "env.sample";
    
    // env file path for AMI
    // $filePath = "/etc/systemd/system/arc.env";
    
    // env file path for docker images
    $filePath = "/arc-data/.env";

    function getEnvVars() {
        global $filePath;
        
        $file = fopen($filePath, "r");
        $fileLines = array();
        while(!feof($file))  {
            $result = fgets($file);
            if (!empty($result)) {
                $splitResult = explode("=", $result);
                $fileLines[$splitResult[0]] = trim($splitResult[1]);
            }
        }
        fclose($file);
        return $fileLines;
    }

    function upsertEnvVars($data) {
        $finalData = getEnvVars();
        foreach ($data as $key => $val) {
            $finalData[$key] = $val;
        }

        $fileContent = "";
        foreach ($finalData as $key => $value) {
            $trimValue = trim($value);
            if (!empty($trimValue)) {
                $fileContent = $fileContent.$key."=".$value."\n";
            }
        }
        global $filePath;
        $file = fopen($filePath, "w") or die("Unable to open file!");
        fwrite($file, $fileContent);
    }

    function checkAuth() {
        $currentTime = time();
        if (!isset($_SESSION["password"]) || !isset($_SESSION["username"]) || !isset($_SESSION["EXPIRES"]) || (time() - $_SESSION['EXPIRES'] > 900)) {
            logout("?error=Please login");
            header("Location: index.php?error=Please login");
        }
    }

    function logout($data="") {
        unset($_SESSION["username"]);
        unset($_SESSION["password"]);
        unset($_SESSION["EXPIRES"]);
        ini_set('session.gc_max_lifetime', 0);
        ini_set('session.gc_probability', 1);
        ini_set('session.gc_divisor', 1);
        session_destroy();
        session_unset();
        header("Location: index.php".$data);
    }
?>
