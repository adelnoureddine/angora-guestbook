<?php

/**
 ****************************************************
 * tinymce.class.php                                *
 ****************************************************
 * Angora Guestbook                                 *
 ****************************************************
 * Software author :            Adel Noureddine     *
 * Copyright 2005 - 2009 by :   Adel Noureddine     *
 ****************************************************
 * The tinymce browser compatibility class file     *
 ****************************************************
 * */

class Tinymce {

	static function isCompatible($userAgent) {
		$compatible = false;
		
		if (preg_match('/firefox|opera|chrome|safari|msie|mozilla/i', $userAgent) && !preg_match('/konqueror/i', $userAgent)) {
			$compatible = true;
		}
		
		return $compatible;
	}
	
}

?>
