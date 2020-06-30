<?php
    session_start();
    include "util.php";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST["username"]) && isset($_POST["password"]) && !empty($_POST["username"]) && !empty($_POST["username"])) {
            $data = array();
            $data["USERNAME"] = $_SESSION["username"] = $_POST["username"];
            $data["PASSWORD"] = $_SESSION["password"] = $_POST["password"];
            $_SESSION["EXPIRES"] = time();
            upsertEnvVars($data);
            upsertLogFile($data);
            header("Location: env.php");
        } else {
            header("Location: index.php?error=Invalid username or password");
        }
    } else {
        header("Location: index.php?error=Invalid method");
    }
?>
