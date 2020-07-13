<?php
    session_start();
    include "util.php";
    checkAuth();
    $envs = getEnvVars();
    $sniffing = "";
    if (isset($envs["SET_SNIFFING"]) && $envs["SET_SNIFFING"] == "true" ) {
        $sniffing = "true";
    }
?>
<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>
<div class="sidebar-content">
<div class="app-card">
    <div class="logo-container">
        <img src="./images/arc.svg" alt="logo"/>
    </div>
    <h2 class="centered-text">Configure your Arc Instance's Environment Variables</h2>
    <form method="post" action="post-env.php" class="pure-form pure-form-stacked">
        <label for="username">Master Username</label>
        <small>This will reset your admin username</small>
        <input required class="pure-input-1" name="username" id="username" type="text" placeholder="Username" value="<?=$envs["USERNAME"]?>" />

        <label for="username">Master Password</label>
        <small>This will reset your admin password</small>
        <input required class="pure-input-1" name="password" id="password" type="password" placeholder="Password" value="<?=$envs["PASSWORD"]?>"/>

        <label for="cluster_url">Elasticsearch URL</label>
        <small>URL format: https://your-search-domain.com:port. If your URL is protected by basic-auth use the format https://search-credentials@your-search-domain.com:port</small>
        <input required name="cluster_url" type="text" placeholder="Cluster URL" class="pure-input-1" value="<?=$envs["ES_CLUSTER_URL"]?>"/>

        <small> Set sniffing to enable automatic detection of other upstream Elasticsearch nodes. We don't recommend this setting if your Elasticsearch is already behind a load balancer.</small>
        <div style="margin-bottom:30px;">
            <?php if ($sniffing == "true") { ?>
                <input name="set_sniffing" id="set_sniffing" type="checkbox" value="<?=$sniffing?>" checked="<?$sniffing?>"/>
            <?php } else { ?>
                <input name="set_sniffing" id="set_sniffing" type="checkbox" value="<?=$sniffing?>" />
            <?php  } ?>
            <label for="set_sniffing" style="display:inline;">Set Sniffing</label>
        </div>

        <label for="arc_id">ARC ID</label>
        <small>You can obtain your ARC Id by visiting <a href="https://arc-dashboard.appbase.io/install" target="_blank">https://arc-dashboard.appbase.io/install</a></small>
        <input required name="arc_id" type="text" placeholder="Arc ID" class="pure-input-1" value="<?=$envs["ARC_ID"]?>"/>

        <label for="open_faas_gateway">OpenFaas Gateway</label>
        <small>You can obtain your OpenFaas Gateway by following docs <a href="https://docs.appbase.io/docs/search/Functions/hosting#5-configure-appbase" target="_blank">here</a></small>
        <input name="open_faas_gateway" type="text" placeholder="OpenFaas Gateway URL" class="pure-input-1" value="<?=$envs["OPENFAAS_GATEWAY"]?>"/>

        <label for="open_faas_kube_config">Kube Config Path</label>
        <small>Enter KubeConfig file path where OpenFaas is deployed, for more information you can read docs <a href="https://kubernetes.io/docs/concepts/configuration/organize-cluster-access-kubeconfig/" target="_blank">here</a></small>
        <input name="open_faas_kube_config" type="text" placeholder="KubeConfig file path" class="pure-input-1" value="<?=$envs["OPENFAAS_KUBE_CONFIG"]?>"/>

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
</div>
