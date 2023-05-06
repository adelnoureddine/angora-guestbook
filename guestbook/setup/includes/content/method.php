<?php

echo '<div>
	<div class="title">' . $lang['instMethod'] . '</div>
	<table class="table">
		<tr>
			<td><img src="images/install.png" alt="' . $lang['newInstallation'] . '" /></td>
			<td><a href="index.php?a=install&lang=' . $instLang . '">' . $lang['newInstallation'] . '</a></td>
		</tr>
		<tr>
			<td><img src="images/update2.png" alt="' . $lang['updateFrom2'] . '" /></td>
			<td><a href="index.php?a=update2&lang=' . $instLang . '">' . $lang['updateFrom2'] . '</a></td>
		</tr>
	</table>
</div>';

?>
