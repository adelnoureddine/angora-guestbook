<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");
	
if (@is_dir("setup")) {
	$error = new Error("Setup directory exists. You either haven't installed your guestbook, or forgot to delete the setup folder.");
	die($error->showError());
}

if (!file_exists("data.php")) {
	$error = new Error("Data file doesn't exist. Have you installed your guestbook yet?");
	die($error->showError());
}

require_once 'configuration.php';

if ($config['offline']) {
	$error = new Error($config['offlineMessage']);
	die($error->showError());
}

include_once 'classes/mobile/mobile.class.php';
if (Mobile::isMobile($_SERVER['HTTP_USER_AGENT']))
	$config['guestbookTheme'] = $config['mobileTheme'];

?>