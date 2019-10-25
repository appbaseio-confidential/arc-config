<?php
    $filePath = "/etc/systemd/system/arc.env";
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
            if (!empty(trim($value))) {
                $fileContent = $fileContent.$key."=".$value."\n";
            }
        }
        global $filePath;
        $file = fopen($filePath, "w") or die("Unable to open file!");
        fwrite($file, $fileContent);
    }

    function restartService() {
        return shell_exec("sudo systemctl restart arc"); 
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
        session_destroy();
        session_unset();
        header("Location: index.php".$data);
    }
?>
