<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

	echo '<div class="panel ' . $float . '">';
	
	echo "
		<p>
			<img src=\"../images/logo/angora_small.png\" alt=\"Angora logo\" />
		</p>
		<p>
			" . $lang['navigation'] . "
			<br />
			<a href=\"index.php?a=start\">" . $lang['start'] . "</a>
			<br />
			<a href=\"../index.php\" target=\"_blank\">" . $lang['guestbook'] . "</a>
		</p>
		<p>
			" . $lang['messages'] . "
			<br />
			<a href=\"index.php?a=posts\">" . $lang['posts'] . "</a>
			<br />
			<a href=\"index.php?a=smilies\">" . $lang['smilies'] . "</a>
			<br />
			<a href=\"index.php?a=censored\">" . $lang['censored'] . "</a>
			<br />
			<a href=\"index.php?a=search\">" . $lang['search'] . "</a>
			<br />
			<a href=\"index.php?a=banIP\">" . $lang['banIP'] . "</a>
			<br />
			<a href=\"index.php?a=posts&t=trash\">" . $lang['trash'] . "</a>
		</p>
		<p>
			" . $lang['administrators'] . "
			<br />
			<a href=\"index.php?a=changePass\">" . $lang['changePass'] . "</a>";
			if (base64_decode($_SESSION['privilege']) == 1)
				echo "<br /><a href=\"index.php?a=admin\">" . $lang['addAdmins'] . "</a>";
		echo "
		</p>
		<p>
			" . $lang['preferences'] . "
			<br />
			<a href=\"index.php?a=options\">" . $lang['options'] . "</a>
			<br />";
			if (base64_decode($_SESSION['privilege']) == 1)
				echo "<a href=\"index.php?a=advOptions\">" . $lang['advancedOptions'] . "</a>
				<br />";
		echo "
			<a href=\"index.php?a=upload\">" . $lang['uploadCenter'] . "</a>
		</p>
		<p>
			" . $lang['database'] . "
			<br />
			<a href=\"index.php?a=backup\">" . $lang['backupRestore'] . "</a>
			<br />
			<a href=\"index.php?a=optimize\">" . $lang['optimize'] . "</a>
		</p>
		<p>
			" . $lang['tools'] . "
			<br />
			<a href=\"index.php?a=about\">" . $lang['about'] . "</a>
			<br />";
			if (base64_decode($_SESSION['privilege']) == 1)
				echo "<a href=\"index.php?a=phpinfo\">" . $lang['phpinfo'] . "</a>
				<br />";
			echo "<a href=\"index.php?a=logout\">" . $lang['logout'] . "</a>
		</p>
	
	";

	echo '</div>'

?>