<?php

/**
 ****************************************************
 * statistics.class.php                             *
 ****************************************************
 * Angora Guestbook                                 *
 ****************************************************
 * Software author :            Adel Noureddine     *
 * Copyright 2005 - 2011 by :   Adel Noureddine     *
 ****************************************************
 * The statistics class file                        *
 ****************************************************
 * */

class Statistics {
	
	private $userAgent;
	private $os;
	private $browser;

	function __construct($userAgent) {
		$this->userAgent = $userAgent;
		$this->calculateStats();
	}
	
	function __destruct() {
		unset($this->userAgent);
		unset($this->os);
		unset($this->browser);
	}

	private function calculateStats() {
		$browser = 'unknown';
		$os = 'unknown';
		
		// Browsers
		$browser = (preg_match('/mozilla/i', $this->userAgent)) ? 'mozilla' : $browser;		
		$browser = (preg_match('/safari/i', $this->userAgent)) ? 'safari' : $browser;
		$browser = (preg_match('/chrome/i', $this->userAgent)) ? 'chrome' : $browser;
		
		$browser = (preg_match('/msie/i', $this->userAgent)) ? 'ie' : $browser;
		$browser = (preg_match('/netscape/i', $this->userAgent)) ? 'netscape' : $browser;
		$browser = (preg_match('/opera/i', $this->userAgent) || preg_match('/opr/i', $this->userAgent)) ? 'opera' : $browser;
		$browser = (preg_match('/edge/i', $this->userAgent) || preg_match('/edg/i', $this->userAgent)) ? 'edge' : $browser;
		$browser = (preg_match('/konqueror/i', $this->userAgent)) ? 'konqueror' : $browser;
		$browser = (preg_match('/galeon/i', $this->userAgent)) ? 'galeon' : $browser;
		$browser = (preg_match('/firefox/i', $this->userAgent)) ? 'firefox' : $browser;
		$browser = (preg_match('/links/i', $this->userAgent)) ? 'links' : $browser;
		
		//Old Windows Systems
		$os = (preg_match('/windows/i', $this->userAgent)) ? 'win_old' : $os;
		$os = (preg_match('/win9/i', $this->userAgent)) ? 'win_old' : $os;
		$os = (preg_match('/win32/i', $this->userAgent)) ? 'win_old' : $os;
		$os = (preg_match('/windows 9/i', $this->userAgent)) ? 'win_old' : $os;
		$os = (preg_match('/nt 4/i', $this->userAgent)) ? 'win_old' : $os;
		$os = (preg_match('/nt 5.0/i', $this->userAgent)) ? 'win_old' : $os;
		$os = (preg_match('/win3/i', $this->userAgent)) ? 'win_old' : $os;

		// Mobile Systems
		$os = (preg_match('/webos/i', $this->userAgent)) ? 'palm_webos' : $os;
		$os = (preg_match('/iphone/i', $this->userAgent)) ? 'ios' : $os;
		$os = (preg_match('/ipod/i', $this->userAgent)) ? 'ios' : $os;
		$os = (preg_match('/ipad/i', $this->userAgent)) ? 'ios' : $os;
		$os = (preg_match('/blackberry/i', $this->userAgent)) ? 'blackberry' : $os;
		$os = (preg_match('/android/i', $this->userAgent)) ? 'android' : $os;
		$os = (preg_match('/windows phone/i', $this->userAgent)) ? 'windows_phone' : $os;
		$os = (preg_match('/symbian/i', $this->userAgent)) ? 'symbian' : $os;
		
		//New Windows Systems
		$os = (preg_match('/nt 5.1/i', $this->userAgent)) ? 'win_new' : $os;
		$os = (preg_match('/nt 5.2/i', $this->userAgent)) ? 'win_new' : $os;
		$os = (preg_match('/nt 5.3/i', $this->userAgent)) ? 'win_new' : $os;
		$os = (preg_match('/nt 5.4/i', $this->userAgent)) ? 'win_new' : $os;
		$os = (preg_match('/nt 5.5/i', $this->userAgent)) ? 'win_new' : $os;
		$os = (preg_match('/nt 6.0/i', $this->userAgent)) ? 'win_new' : $os;
		$os = (preg_match('/nt 6.1/i', $this->userAgent)) ? 'win_new' : $os;
		$os = (preg_match('/nt 6.2/i', $this->userAgent)) ? 'win_new' : $os;
		$os = (preg_match('/nt 6.3/i', $this->userAgent)) ? 'win_new' : $os;
		$os = (preg_match('/nt 10/i', $this->userAgent)) ? 'win_new' : $os;
		

		//Linux Systems
		$os = (preg_match('/linux/i', $this->userAgent)) ? 'linux' : $os;
		$os = (preg_match('/suse/i', $this->userAgent)) ? 'linux_suse' : $os;
		$os = (preg_match('/debian/i', $this->userAgent)) ? 'linux_debian' : $os;
		$os = (preg_match('/redhat/i', $this->userAgent)) ? 'linux_redhat' : $os;
		$os = (preg_match('/bsd/i', $this->userAgent)) ? 'freebsd' : $os;
		$os = (preg_match('/ubuntu/i', $this->userAgent)) ? 'ubuntu' : $os;

		if ($os == 'unknown') {
			$os = (preg_match('/mac/i', $this->userAgent)) ? 'macos' : $os;
			$os = (preg_match('/solaris/i', $this->userAgent)) ? 'solaris' : $os;
			$os = (preg_match('/unix/i', $this->userAgent)) ? 'unix' : $os;
			$os = (preg_match('/macos/i', $this->userAgent)) ? 'macos' : $os;
			$os = (preg_match('/mac os/i', $this->userAgent)) ? 'macos' : $os;
		}
		
		$this->os = $os;
		$this->browser = $browser;
	}

	function getOS() {
		return $this->os;
	}
	
	function getBrowser() {
		return $this->browser;
	}
	
	function getUserAgent() {
		return $this->userAgent;
	}
}

?>
