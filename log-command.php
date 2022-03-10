<?php
	$output = shell_exec('tail /reactivesearch-data/.logs -n 50');
?>
<code>
	<pre><?php echo $output ?></pre>
</code>
