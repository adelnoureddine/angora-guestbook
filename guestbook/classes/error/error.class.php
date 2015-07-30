<?php

/**
 ****************************************************
 * error.class.php                                  *
 ****************************************************
 * Angora Guestbook                                 *
 ****************************************************
 * Software author :            Adel Noureddine     *
 * Copyright 2005 - 2009 by :   Adel Noureddine     *
 ****************************************************
 * The Error class file                             *
 ****************************************************
 * */

class Error {

	private $errorText;
	private $errorStyle;

	function __construct($errorText) {
		$this->errorText = $errorText;
		if (preg_match('/admin/i', $_SERVER['SCRIPT_FILENAME']))
			$this->errorStyle = "<link rel=\"stylesheet\" href=\"../includes/commonStyle.css\" type=\"text/css\" />";
		else
			$this->errorStyle = "<link rel=\"stylesheet\" href=\"includes/commonStyle.css\" type=\"text/css\" />";
	}

	function __destruct() {
		unset($this->errorText);
		unset($this->errorStyle);
	}

	function showError() {
		return $this->errorStyle . "<div id=\"errorReporting\"><h1>Error !</h1><br />" . $this->errorText . "</div>";
	}

}

?>
