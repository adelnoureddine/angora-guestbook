<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

$boxContent = new XTemplate('./themes/' . $config['guestbookTheme'] . '/boxes/title.tpl');

$boxContent->assign("TITLE_NAME", $config['gbTitle']);

$boxContent->parse('title');
$boxContent = $boxContent->text('title');

?>