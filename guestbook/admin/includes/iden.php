<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

if (($_SESSION['HTTP_USER_AGENT'] != hash('sha1', $_SERVER['HTTP_USER_AGENT'])) || (empty($_SESSION['id'])) || (! $_SESSION['iden'])) {
	$_SESSION = array();
	unset($_SESSION);
	session_destroy();
	header("Location: ./index.php?a=login");
	die();
}

$magicBackup = "0xNOWALLEALLOWED";

?>