<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

	$_SESSION = array();
	unset($_SESSION);
	session_destroy();
	header("Location: ./index.php?a=login");
	die();
?>