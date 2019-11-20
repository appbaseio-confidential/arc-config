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
		<div class="icon">
			<i onclick="reloadLogsContent()" style="font-size:24px" class="fa">&#xf021;</i>
		</div>
		<div id="logs" class="logs-content">
		</div>
	</div>
</div>
<script>
    async function reloadLogsContent() {
		const res = await fetch('log-command.php');
		const html = await res.text();
		const logContainer = document.getElementById('logs');
		if (logContainer) {
			logContainer.innerHTML = html;
		}
	}
	reloadLogsContent();

	setInterval(function(){
        reloadLogsContent();
    }, 5000);
</script>
