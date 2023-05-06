<?php

echo '<div>
	<div class="title">' . $lang['mysqlInstallation'] . '</div>';

// Installing

require_once '../configuration.php';

$con->connect();

$queryMsgAlter1 = "ALTER TABLE " . $dbTables['config'] . "
 ADD `dateSort` varchar(4) NOT NULL;";

if ($con->modify($queryMsgAlter1)) {
	$queryMsg = "UPDATE " . $dbTables['config'] . " SET dateSort='desc'";

	if ($con->modify($queryMsg)) {
		echo "<div class=\"msgSuccess\">" . $lang['installationDone'] . "</div>";

		// Remember to delete setup folder !!

		echo "<div class=\"title\">" . $lang['finishing'] . "</div>";

		echo '<div>' . $lang['deleteSetup'] . '<br />' . $lang['yesYouCan'] . ' : <br />
		<a href="../index.php">' . $lang['newGuestbook'] . '</a>
		<br />
		<a href="../admin/">' . $lang['adminCenter'] . '</a>';
	}
	else {
		echo "<div class=\"msgError\">" . $lang['dataError'] . "</div>";
		$con->printError();
		echo '<div id="previous"><a href="index.php?a=install&lang=' . $instLang . '">' . $lang['previous'] . '</a></div>';
	}
	
}
else {
	echo "<div class=\"msgError\">" . $lang['dataError'] . "</div>";
	$con->printError();
	echo '<div id="previous"><a href="index.php?a=method&lang=' . $instLang . '">' . $lang['previous'] . '</a></div>';
}

$con->close();

?>
