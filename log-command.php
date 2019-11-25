<?php
	$output = shell_exec('journalctl --unit=arc.service -n 100 | tac');
?>
<code>
	<pre><?php echo $output ?></pre>
</code>