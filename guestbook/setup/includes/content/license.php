<?php

$continue = true;

echo '<div>
	<div class="title">' . $lang['angLicence'] . '</div>
		<iframe src="includes/content/license.html" class="license" frameborder="0" scrolling="auto"></iframe>
		<div id="continue"><a href="index.php?a=method&lang=' . $instLang . '">' . $lang['next'] . '</a></div>
	</div>';

?>