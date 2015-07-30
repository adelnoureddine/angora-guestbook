<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

$boxContent = new XTemplate('./themes/' . $config['guestbookTheme'] . '/boxes/search.tpl');

$boxContent->assign("LANG_SEARCH", $lang['search']);
$boxContent->assign("URL_SEARCH", 'index.php');
$boxContent->assign("NAME_SEARCH", 's');

$boxContent->parse('search');
$boxContent = $boxContent->text('search');

?>