<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

$boxContent = new XTemplate('./themes/' . $config['guestbookTheme'] . '/boxes/menu.tpl');

$boxContent->assign("LANG_VIEW", $lang['view']);
$boxContent->assign("URL_VIEW", 'index.php');
$boxContent->assign("LANG_SIGN", $lang['sign']);
$boxContent->assign("URL_SIGN", 'index.php?a=sign');

$boxContent->parse('menu');
$boxContent = $boxContent->text('menu');

?>