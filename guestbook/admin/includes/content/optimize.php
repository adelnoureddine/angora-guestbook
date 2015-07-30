<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

	echo '<div class="mainTitle">' . $lang['optimize'] . ' ' . $lang['database'] . '</div>';
	echo '<div class="helpPopup ' . $alignHelp . '"><a href="#" onclick="openHelp(\'optimize\');">' . $lang['help'] . '</a></div>';
	
	$submitId = secureVar($_POST['submit'], 'html');
	
	$optimizeResults = array();
	
	if ((! empty($submitId)) && isset($submitId)) {
		$queryMsg = "OPTIMIZE TABLE " . $dbTables['config'] . ", " . $dbTables['admin'] . ", " . $dbTables['censored'] . ", " . $dbTables['ip'] . ", " . $dbTables['smilies'] . ", " . $dbTables['posts'] . ", " . $dbTables['reply'] . ", " . $dbTables['trash'] . ", " . $dbTables['backupLog'] . ";";
		$con->connect();
		if ($con->getRows($queryMsg)) {
			echo "<div class=\"msgSuccess\">" . $lang['optimizationSuccess'] . "</div>";
		}
		else {
			$con->printError();
			echo "<div class=\"msgError\">" . $lang['dataError'] . "</div>";
		}
		$con->close();
	}
	
	$queryMsg = "ANALYZE TABLE " . $dbTables['config'] . ", " . $dbTables['admin'] . ", " . $dbTables['censored'] . ", " . $dbTables['ip'] . ", " . $dbTables['smilies'] . ", " . $dbTables['posts'] . ", " . $dbTables['reply'] . ", " . $dbTables['trash'] . ", " . $dbTables['backupLog'] . ";";
	$con->connect();
	if ($con->getRows($queryMsg)) {
		foreach ($con->queryResult as $res) {
			$optimizeResults[] = $res['Msg_text'];
		}
	}
	$con->close();
	
	$optimizeNeeded = false;
	foreach ($optimizeResults as $key=>$value) {
		if (strripos($value, 'up to date') == false) {
			$optimizeNeeded = true;
			break;
		}
	}
	
	if ($optimizeNeeded) {
		echo $lang['optimizationNeeded'];
		echo "
			<form method=\"post\" action=\"index.php?a=optimize\">
				<fieldset>
					<input type=\"submit\" name=\"submit\" value=\"" . $lang['optimize'] . "\" />
				</fieldset>
			</form>";
	}
	else
		echo $lang['optimizationNotNeeded'];

?>