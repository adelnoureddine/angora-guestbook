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

	function isCompatible($userAgent) {
		$compatible = false;
		
		if (((eregi('firefox', $userAgent)) ||
			(eregi('opera', $userAgent)) ||
			(eregi('chrome', $userAgent)) ||
			(eregi('safari', $userAgent)) ||
			(eregi('msie', $userAgent)) ||
			(eregi('mozilla', $userAgent))) &&
				(! eregi('konqueror', $userAgent))
			) {
			$compatible = true;
		}
		
		return $compatible;
	}
	
}

?>