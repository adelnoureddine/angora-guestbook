<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

$boxContent = new XTemplate('./themes/' . $config['guestbookTheme'] . '/boxes/pageLinks.tpl');

$urlPrefix = 'index.php?p=';

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

if ($pageNum > 1) {
	$boxContent->assign("URL_PREVIOUS", $previousUrl);
	$boxContent->assign("LANG_PREVIOUS", $lang['previous']);
	$boxContent->parse('pageLinks.previous');
}

if ($pageNum < $numPages) {
	$boxContent->assign("LANG_NEXT", $lang['next']);
	$boxContent->assign("URL_NEXT", $nextUrl);
	$boxContent->parse('pageLinks.next');
}

for ($i=1; $i<=($numPages); $i++) {
	if ($i == $pageNum)
		$selected = "selected=\"selected\"";
	else
		$selected = "";
	
	$urlPage = $urlPrefix . $i;
	$boxContent->assign("SELECTED", $selected);
	$boxContent->assign("URL_PAGE", $urlPage);
	$boxContent->assign("PAGE_NUM", $i);
	$boxContent->parse('pageLinks.allPages');
}

$boxContent->assign("LANG_PAGE", $lang['page']);
$boxContent->assign("PAGE_NUM", $pageNum);
$boxContent->assign("NUM_PAGES", $numPages);

$boxContent->parse('pageLinks');
$boxContent = $boxContent->text('pageLinks');

?>
