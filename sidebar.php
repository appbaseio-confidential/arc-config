<style>
	.custom-restricted-width {
		width: 14em;
	}
</style>
<div class="pure-menu custom-restricted-width">
	<?php $activePage = basename($_SERVER['PHP_SELF'], ".php"); ?>
	<ul class="pure-menu-list">
		<li id="env.php" class="pure-menu-item <?= ($activePage == 'env') ? 'pure-menu-selected':''; ?>">
			<a href="./env.php" class="pure-menu-link">Environment Variables</a>
		</li>
		<li id="logs.php" class="pure-menu-item <?= ($activePage == 'logs') ? 'pure-menu-selected':''; ?>">
			<a href="./logs.php" class="pure-menu-link">Logs</a>
		</li>
	</ul>
</div>
