<?php
    session_start();
    include "util.php";
    $envs = getEnvVars();
    $username = isset($envs["USERNAME"]) ? $envs["USERNAME"]: "";
    $password = isset($envs["PASSWORD"]) ? $envs["PASSWORD"] : "";
    if (isset($_SESSION["username"]) && isset($_SESSION["password"])) {
        header("Location: env.php");
    }
    include "header.php";
?>

<?php
    // show login if username and password are set
    if (!empty($username) && !empty($password)) {
        include "login-form.php";
    }
?>

<?php
    // if either username || password are not set allow user to set password
    if (empty($username) || empty($password)) {
        include "setup-form.php";
    }
?>
<?php if(isset($_GET["error"])):?>
    <script>
        setBanner("<?= $_GET["error"]?>", "error");
    </script>
<?php endif; ?>
<?php if(isset($_GET["success"])):?>
    <script>
        setBanner("<?= $_GET["success"]?>", "success");
    </script>
<?php endif; ?>
<?php include "footer.php"; ?>
