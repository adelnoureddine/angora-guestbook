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

class Os {
	
	private $osArray = array(
		"000" => "Unknown",
        "and" => "Android",
        "bla" => "Blackberry",
        "fre" => "Freebsd",
        "ios" => "IoS",
        "lin" => "Linux",
        "deb" => "Linux_Debian",
        "red" => "Linux_Redhat",
        "sus" => "Linux_Suse",
        "mac" => "Macos",
        "pal" => "Palm_Webos",
        "sol" => "Solaris",
        "sym" => "Symbian",
        "ubu" => "Ubuntu",
        "uni" => "Unix",
        "wne" => "win_new",
        "wol" => "win_old",
        "wph" => "Windows_Phone"
	);
	
	function __construct() {
	}
	
	function __destruct() {
		unset($this->osArray);
	}
	
	function getOs($osCode) {
		return strtolower($this->osArray[$osCode]);
	}
    
    function getOsCode($osName) {
        foreach ($this->osArray as $code => $os) {
            if (strtolower($osName) === strtolower($os)) {
                return $code;
            }
        }
        return "000";
    }

    function transformStatName($osName) {
        $transfo = $osName;
        if ($osName == "Windows 10/11"){
           $transfo = "win_new";
        }elseif (preg_match('/Windows 8/i',$osName) || preg_match('/Windows 7/i',$osName) || preg_match('/vista/i',$osName) || preg_match('/windows xp/i',$osName) || preg_match('/9.x/i',$osName)){
            $transfo = "win_old";
        }

        return $transfo;
    }
	
	function getOsArray() {
		$arrayReturn = array_unique($this->osArray);
		asort($arrayReturn);
		return $arrayReturn;
	}
	
}

?>