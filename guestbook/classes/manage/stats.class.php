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
		$this->tableOS = array("Windows 9.x"=>"0", "Windows 7"=>"0", "Windows Vista"=>"0", "Windows XP"=>"0", "Linux"=>"0", "Mac OS"=>"0", "Unix"=>"0", "Solaris"=>"0", "Palm webOS"=>"0", "iOS"=>"0", "Blackberry"=>"0", "Android"=>"0", "Windows Phone"=>"0", "Symbian"=>"0", "Others"=>"0");
		$this->tableBrowser = array("Internet Explorer"=>"0", "Firefox"=>"0", "Opera"=>"0", "Safari"=>"0", "Google Chrome"=>"0", "Mozilla/Netscape"=>"0", "Konqueror"=>"0", "Others"=>"0");
	}
	
	function __destruct() {
		unset($this->tableOS);
		unset($this->tableBrowser);
	}

	function calculateStats($userAgent) {
		// Browser Calculation
		if (eregi('firefox', $userAgent)) {
			$this->tableBrowser["Firefox"]++;
		}
		elseif (eregi('opera', $userAgent)) {
			$this->tableBrowser["Opera"]++;
		}
		elseif (eregi('chrome', $userAgent)) {
			$this->tableBrowser["Google Chrome"]++;
		}
		elseif (eregi('konqueror', $userAgent)) {
			$this->tableBrowser["Konqueror"]++;
		}
		elseif (eregi('safari', $userAgent)) {
			$this->tableBrowser["Safari"]++;
		}
		elseif (eregi('msie', $userAgent)) {
			$this->tableBrowser["Internet Explorer"]++;
		}
		elseif (eregi('mozilla', $userAgent) || eregi('netscape', $userAgent)) {
			$this->tableBrowser["Mozilla/Netscape"]++;
		}
		else {
			$this->tableBrowser["Others"]++;
		}
		
		// OS Calculation
		if (eregi('webos', $userAgent)) {
			$this->tableOS["Palm webOS"]++;
		}
		if (eregi('windows phone', $userAgent)) {
			$this->tableOS["Palm webOS"]++;
		}
		elseif (eregi('blackberry', $userAgent)) {
			$this->tableOS["Blackberry"]++;
		}
		elseif (eregi('android', $userAgent)) {
			$this->tableOS["Android"]++;
		}
		elseif (eregi('symbian', $userAgent)) {
			$this->tableOS["Symbian"]++;
		}
		elseif (eregi('iphone', $userAgent) || eregi('ipod', $userAgent) || eregi('ipad', $userAgent)) {
			$this->tableOS["iOS"]++;
		}
		elseif (eregi('win9', $userAgent) || eregi('win32', $userAgent) || eregi('windows 9',$ $userAgent) || eregi('nt 4', $userAgent) || eregi('nt 5.0', $userAgent) || eregi('win3', $userAgent)) {
			$this->tableOS["Windows 9.x"]++;
		}
		elseif (eregi('nt 5.1', $userAgent) || eregi('nt 5.2', $userAgent) || eregi('nt 5.3', $userAgent) || eregi('nt 5.4', $userAgent) || eregi('nt 5.5', $userAgent)) {
			$this->tableOS["Windows XP"]++;
		}
		elseif (eregi('nt 6.0', $userAgent)) {
			$this->tableOS["Windows Vista"]++;
		}
		elseif (eregi('nt 6.1', $userAgent)) {
			$this->tableOS["Windows 7"]++;
		}
		elseif (eregi('linux', $userAgent) || eregi('suse', $userAgent) || eregi('ubuntu', $userAgent) || eregi('redhat', $userAgent) || eregi('debian', $userAgent) || eregi('gentoo', $userAgent)) {
			$this->tableOS["Linux"]++;
		}
		elseif (eregi('mac', $userAgent) || eregi('macos', $userAgent) || eregi('mac os', $userAgent)) {
			$this->tableOS["Mac OS"]++;
		}
		elseif (eregi('unix', $userAgent)) {
			$this->tableOS["Unix"]++;
		}
		elseif (eregi('solaris', $userAgent) || eregi('SunOS', $userAgent) || eregi('sunos', $userAgent)) {
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