<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

$boxContent = new XTemplate('./themes/' . $config['guestbookTheme'] . '/boxes/footNotes.tpl');

$boxContent->assign("LANG_STATISTICS", $lang['statistics']);
$boxContent->assign("URL_STATISTICS", 'index.php?a=stats');
$boxContent->assign("LANG_POWERED_BY", $lang['poweredBy']);
$boxContent->assign("LANG_ANG_NAME", $config['angName']);
$boxContent->assign("LANG_ANG_VERSION", $config['angVersion']);
$boxContent->assign("URL_ANG", $config['angUrl']);

$boxContent->parse('footnotes');
$boxContent = $boxContent->text('footnotes');

?>