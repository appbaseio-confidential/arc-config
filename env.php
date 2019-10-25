<?php
    session_start();
    include "util.php";
    checkAuth();
    $envs = getEnvVars();
?>
<?php include "header.php"; ?>
<div class="app-card">
    <div class="logo-container">
        <img src="./images/arc.svg" alt="logo"/>
    </div>
    <h2 class="centered-text">Set Environment Variables</h2>
    <form method="post" action="post-env.php" class="pure-form pure-form-stacked">
        <input class="pure-input-1" name="username" id="username" type="text" placeholder="Username" value="<?=$envs["USERNAME"]?>" />
        
        <input class="pure-input-1" name="password" id="password" type="password" placeholder="Password" value="<?=$envs["PASSWORD"]?>"/>
        
        <input name="cluster_url" type="text" placeholder="Cluster URL" class="pure-input-1" value="<?=$envs["ES_CLUSTER_URL"]?>"/>
        
        <input name="arc_id" type="text" placeholder="Arc ID" class="pure-input-1" value="<?=$envs["ARC_ID"]?>"/>
        
        <button class="pure-button pure-button-primary">Save</button>
    </form>
    <form method="post" action="post-logout.php" class="flex-centered">
        <button class="link-button">Logout</button>
    </form>
</div>
<?php if(isset($_GET["error"])):?>
        <script>
            setBanner("<?= $_GET["error"]?>", "error");
        </script>
    <?php endif; ?>
<?php include "footer.php"; ?>
