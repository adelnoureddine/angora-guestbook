<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

$con->connect();
$con->getRows("select id from " . $databaseName . " group by date desc;");
$numRowsAll = $con->getNumRows();
$con->close();
$numPages = ceil(($numRowsAll / $config['numPostsPerPage']));

$urlPrefix = 'index.php?a=posts&p=';

if ($pageNum <= 0) {
	$pageNum = 1;
	$previousUrl = $urlPrefix . $pageNum;
	$nextUrl = $urlPrefix . ($pageNum + 1);
}
elseif ($pageNum > $numPages) {
	$pageNum = $numPages;
	$previousUrl = $urlPrefix . ($pageNum - 1);
}
else {
	$previousUrl = $urlPrefix . ($pageNum - 1);
	$nextUrl = $urlPrefix . ($pageNum + 1);
}

echo "<table class=\"pageLinks\"><tr>
	<td align=\"left\" width=\"30%\">";

if ($pageNum > 1) {
	echo "<a href=\"" . $previousUrl . "\">" . $lang['previous'] . "</a>";
}

echo "</td>
	<td align=\"center\" width=\"40%\">" . $lang['page'] . " " . $pageNum . "/" . $numPages . "</td>
	<td align=\"right\" width=\"20%\">";

if ($pageNum < $numPages) {
	echo "<a href=\"" . $nextUrl . "\">" . $lang['next'] . "</a>";
}

echo "<td align=\"center\" width=\"10%\">
	<select onchange=\"location = this.options[this.selectedIndex].value;\">";

for ($i=1; $i<=($numPages); $i++) {
	if ($i == $pageNum)
		$selected = "selected=\"selected\"";
	else
		$selected = "";
	
	$urlPage = $urlPrefix . $i;
	echo "<option value=\"" . $urlPage . "\" " . $selected . ">" . $i . "</option>";
}

echo "</select></td></tr></table>";

?>