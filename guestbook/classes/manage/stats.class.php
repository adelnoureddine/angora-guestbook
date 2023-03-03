<?php

/**
 ****************************************************
 * stats.class.php                                  *
 ****************************************************
 * Angora Guestbook                                 *
 ****************************************************
 * Software author :            Adel Noureddine     *
 * Copyright 2005 - 2011 by :   Adel Noureddine     *
 ****************************************************
 * The stats class file                             *
 ****************************************************
 * */

class Stats {
	
	private $tableOS;
	private $tableBrowser;

	function __construct() {
		$this->tableOS = array("Windows 10/11"=>"0","Windows 9.x"=>"0", "Windows 7"=>"0", "Windows Vista"=>"0", "Windows XP"=>"0", "Linux"=>"0", "Mac OS"=>"0", "Unix"=>"0", "Solaris"=>"0", "Palm webOS"=>"0", "iOS"=>"0", "Blackberry"=>"0", "Android"=>"0", "Windows Phone"=>"0", "Symbian"=>"0", "Others"=>"0");
		$this->tableBrowser = array("Microsoft Edge"=>"0","Internet Explorer"=>"0", "Firefox"=>"0", "Opera"=>"0", "Safari"=>"0", "Google Chrome"=>"0", "Mozilla/Netscape"=>"0", "Konqueror"=>"0", "Others"=>"0");
	}
	
	function __destruct() {
		unset($this->tableOS);
		unset($this->tableBrowser);
	}

	function calculateStats($userAgent) {
		// Browser Calculation
		if (preg_match('/firefox/i', $userAgent)){
			$this->tableBrowser["Firefox"]++;
		}
		elseif (preg_match('/opera/i', $userAgent) || preg_match('/opr/i', $userAgent)) {
			$this->tableBrowser["Opera"]++;
		}
		elseif (preg_match('/edge/i', $userAgent) || preg_match('/edg/i', $userAgent)) {
			$this->tableBrowser["Microsoft Edge"]++;
		}
		elseif (preg_match('/chrome/i', $userAgent)) {
			$this->tableBrowser["Google Chrome"]++;
		}
		elseif (preg_match('/konqueror/i', $userAgent)) {
			$this->tableBrowser["Konqueror"]++;
		}
		elseif (preg_match('/safari/i', $userAgent)) {
			$this->tableBrowser["Safari"]++;
		}
		elseif (preg_match('/msie/i', $userAgent)) {
			$this->tableBrowser["Internet Explorer"]++;
		}
		elseif (preg_match('/mozilla/i', $userAgent) || preg_match('/netscape/i', $userAgent)) {
			$this->tableBrowser["Mozilla/Netscape"]++;
		}
		else {
			$this->tableBrowser["Others"]++;
		}
		
		// OS Calculation
		if (preg_match('/webos/i', $userAgent)) {
			$this->tableOS["Palm webOS"]++;
		}
		if (preg_match('/windows phone/i', $userAgent)) {
			$this->tableOS["Palm webOS"]++;
		}
		elseif (preg_match('/blackberry/i', $userAgent)) {
			$this->tableOS["Blackberry"]++;
		}
		elseif (preg_match('/android/i', $userAgent)) {
			$this->tableOS["Android"]++;
		}
		elseif (preg_match('/symbian/i', $userAgent)) {
			$this->tableOS["Symbian"]++;
		}
		elseif (preg_match('/iphone/i', $userAgent) || preg_match('/ipod/i', $userAgent) || preg_match('/ipad/i', $userAgent)) {
			$this->tableOS["iOS"]++;
		}
		elseif (preg_match('/win9/i', $userAgent) || preg_match('/win32/i', $userAgent) || preg_match('/windows 9/i', $userAgent) || preg_match('/nt 4/i', $userAgent) || preg_match('/nt 5.0/i', $userAgent) || preg_match('/win3/i', $userAgent)) {
			$this->tableOS["Windows 9.x"]++;
		}
		elseif (preg_match('/nt 5.1/i', $userAgent) || preg_match('/nt 5.2/i', $userAgent) || preg_match('/nt 5.3/i', $userAgent) || preg_match('/nt 5.4/i', $userAgent) || preg_match('/nt 5.5/i', $userAgent)) {
			$this->tableOS["Windows XP"]++;
		}
		elseif (preg_match('/nt 6.0/i', $userAgent)) {
			$this->tableOS["Windows Vista"]++;
		}
		elseif (preg_match('/nt 6.1/i', $userAgent)) {
			$this->tableOS["Windows 7"]++;
		}
		elseif (preg_match('/nt 6.2/i', $userAgent) || preg_match('/nt 6.3/i', $userAgent)) {
			$this->tableOS["Windows 8"]++;
		}
		elseif (preg_match('/nt 10/i', $userAgent)) {
			$this->tableOS["Windows 10/11"]++;
		}
		elseif (preg_match('/linux/i', $userAgent) || preg_match('/suse/i', $userAgent) || preg_match('/ubuntu/i', $userAgent) || preg_match('/redhat/i', $userAgent) || preg_match('/debian/i', $userAgent) || preg_match('/gentoo/i', $userAgent)) {
			$this->tableOS["Linux"]++;
		}
		elseif (preg_match('/mac/i', $userAgent) || preg_match('/macos/i', $userAgent) || preg_match('/mac os/i', $userAgent)) {
			$this->tableOS["Mac OS"]++;
		}
		elseif (preg_match('/unix/i', $userAgent)) {
			$this->tableOS["Unix"]++;
		}
		elseif (preg_match('/solaris/i', $userAgent) || preg_match('/SunOS/i', $userAgent) || preg_match('/sunos/i', $userAgent)) {
			$this->tableOS["Solaris"]++;
		}
		else {
			$this->tableOS["Others"]++;
		}
	}
	
	function getTableOS() {
		arsort($this->tableOS);
		return $this->tableOS;
	}
	
	function getTableBrowser() {
		arsort($this->tableBrowser);
		return $this->tableBrowser;
	}
	
}

?>
