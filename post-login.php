<?php
session_set_cookie_params([
    'lifetime' => 0,
    'path' => '/',
    'domain' => '',      // Set if necessary
    'secure' => true,    // Set to true if using HTTPS
    'httponly' => true,
    'samesite' => 'Lax', // 'Lax' or 'Strict' as appropriate
]);
session_start();

include "util.php";

if (!function_exists('hash_equals')) {
    function hash_equals($known_string, $user_string) {
        if (!is_string($known_string) || !is_string($user_string)) {
            return false;
        }
        $len = strlen($known_string);
        if ($len !== strlen($user_string)) {
            return false;
        }
        $result = 0;
        for ($i = 0; $i < $len; $i++) {
            $result |= ord($known_string[$i]) ^ ord($user_string[$i]);
        }
        return $result === 0;
    }
}

if (isset($_POST["username"]) && isset($_POST["password"])) {
    $currentUsername = trim($_POST["username"]);
    $currentPassword = trim($_POST["password"]);

    if (!empty($currentUsername) && !empty($currentPassword)) {
        $envs = getEnvVars();

        if (!isset($envs["USERNAME"]) || !isset($envs["PASSWORD"])) {
            error_log("USERNAME or PASSWORD not set in env variables");
            header("Location: index.php?error=Server configuration error");
            exit();
        }

        $username = $envs["USERNAME"];
        $password = $envs["PASSWORD"];

        // Log the values for debugging
        error_log("Env USERNAME: '$username'");
        error_log("Env PASSWORD: '$password'");
        error_log("Input USERNAME: '$currentUsername'");
        error_log("Input PASSWORD: '$currentPassword'");

        if (!hash_equals($currentUsername, $username) || !hash_equals($currentPassword, $password)) {
            error_log("Login failed: Invalid username or password");
            header("Location: index.php?error=Invalid username or password");
            exit();
        } else {
            session_regenerate_id(true);
            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password;
            $_SESSION["EXPIRES"] = time();

            // Ensure session data is saved before redirecting
            session_write_close();

            error_log("Login successful for user: $username");
            header("Location: env.php");
            exit();
        }
    } else {
        error_log("Empty username or password");
        header("Location: index.php?error=Invalid username or password");
        exit();
    }
} else {
    error_log("Username or password not set in POST data");
    header("Location: index.php?error=Invalid username or password");
    exit();
}
?>