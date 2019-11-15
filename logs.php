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
    <div class="logo-container">
        <img src="./images/arc.svg" alt="logo"/>
    </div>
    <h2 class="centered-text">Arc Logs</h2>
    <div class="logs-content">
        <div class="icon"><i onclick="reloadPage()" style="font-size:24px" class="fa">&#xf021;</i></div>
    <?php
//    for production
//    TODO: replace container_name with https://github.com/appbaseio/arc-dockerized/blob/master/docker-compose.yaml#L15
    $output = shell_exec('docker logs [container_name] | sort -r | head -100');
//    if you are on local
//    $output = shell_exec('head -n 100 ./logs.sample');
    ?>

    <code>
        <pre><?php echo $output; ?></pre>
    </code></div>
</div>
</div>
<script>
    function reloadPage() {
        window.location.reload()
    }
</script>
