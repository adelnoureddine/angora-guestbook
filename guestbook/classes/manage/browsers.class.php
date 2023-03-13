<?php

/**
 ****************************************************
 * countries.class.php                              *
 ****************************************************
 * Angora Guestbook                                 *
 ****************************************************
 * Software author :            Adel Noureddine     *
 * Copyright 2005 - 2009 by :   Adel Noureddine     *
 ****************************************************
 * The countries class file                         *
 ****************************************************
 * */

class Browsers {
	
	private $browsersArray = array(
		"000" => "Unknown",
		"moz" => "mozilla",
        "saf" => "safari",
        "chr" => "chrome",
        "msi" => "ie",
        "net" => "netscape",
        "ope" => "opera",
        "edg" => "edge",
        "kon" => "konqueror",
        "gal" => "galeon",
        "fir" => "firefox",
        "lin" => "links",

	);
	
    function __construct() {
	}
	
	function __destruct() {
		unset($this->browsersArray);
	}
	
	function getBrowser($browserCode) {
		return strtolower($this->browsersArray[$browserCode]);
	}
	
    function getBrowserCode($browserName) {
        foreach ($this->browsersArray as $code => $browser) {
        
            if (preg_match("/$browser/i", $browserName)) {
                return $code;
            }
        }
        return "000";
    }

	function getBrowsersArray() {
		$arrayReturn = array_unique($this->browsersArray);
		asort($arrayReturn);
		return $arrayReturn;
	}
	
}

?>