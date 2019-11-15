<?php
session_start();
include "util.php";
checkAuth();
$envs = getEnvVars();
?>
<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>
<div class="sidebar-content">
<div class="app-card">
    <?php
    $output = shell_exec('head -n 100 ./logs.sample');
    ?>

    <code>
        <?php echo $output; ?>
    </code></div>
</div>
