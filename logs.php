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
//    for production
//    TODO: replace container_name with https://github.com/appbaseio/arc-dockerized/blob/master/docker-compose.yaml#L15
    $output = shell_exec('docker logs [container_name] | sort -r | head -100');
//    if you are on local
//    $output = shell_exec('head -n 100 ./logs.sample');
    ?>

    <code>
        <?php echo $output; ?>
    </code></div>
</div>
