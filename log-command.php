<?php
	$output = shell_exec('tail /arc-data/.logs');
?>
<code>
	<pre><?php echo $output ?></pre>
</code>