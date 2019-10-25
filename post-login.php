<?php
    session_start();
    include "util.php";
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $currentUsername = $_POST["username"];
        $currentPassword = $_POST["password"];
        if (!empty($currentPassword) && !empty($currentUsername)) {
            $envs = getEnvVars();
            $username = $envs["USERNAME"];
            $password = $envs["PASSWORD"];

            if ($currentUsername !== $username || $currentPassword !== $password) {
                header("Location: index.php?error=Invalid username or password");
            } else {
                $_SESSION["username"] = $username;
                $_SESSION["password"] = $password;
                $_SESSION["EXPIRES"] = time();
                header("Location: env.php");
            }
            
        } else {
            header("Location: index.php?error=Invalid username or password");
        }
    } else {
        header("Location: index.php?error=Invalid username or password");
    }
?>
