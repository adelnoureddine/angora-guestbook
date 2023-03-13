<?php

class Os {
	
	private $osArray = array( //array [0] : icon     array [1] : title
		"000" => "Unknown",
        "and" => "Android",
        "bla" => "Blackberry",
        "fre" => "Freebsd",
        "ios" => "iOS",
        "lin" => "Linux",
        "deb" => array("Linux_Debian","Debian"),
        "red" => array("Linux_Redhat","Redhat"),
        "sus" => array("Linux_Suse","Suse"),
        "mac" => array("Macos","Mac OS"),
        "pal" => array("Palm_Webos","Palm WebOS"),
        "sol" => "Solaris",
        "sym" => "Symbian",
        "ubu" => "Ubuntu",
        "uni" => "Unix",
        "wne" => array("win_new","New Windows"),
        "wol" => array("win_old","Old Windows"),
        "wph" => array("Windows_Phone","Windows Phone"),
        "wi9" => array("win_old","Windows 9.x"),
        "wix" => array("win_new","Windows XP"),
        "wiv" => array("win_new","Windows Vista"),
        "wi7" =>  array("win_new","Windows 7"),
        "wi8" =>  array("win_new","Windows 8"),
        "wi1" =>  array("win_new","Windows 10/11"), 
	);

    private $osStatsArray = array("wi9","wix","wiv","wi7","wi8","wi1","pal","lin");

	function __construct() {
	}
    
	function __destruct() {
		unset($this->osArray);
        unset($this->osStatsArray);
	}
	
	function getOs($osCode) {
		return is_array($this->osArray[$osCode]) ? strtolower($this->osArray[$osCode][0]) : strtolower($this->osArray[$osCode]);
	}

    function getOsTitle($osCode){
        return is_array($this->osArray[$osCode]) ? $this->osArray[$osCode][1] : $this->osArray[$osCode];
    }
    
    function getOsCode($osName) {
        if($osName == "Palm webOS") return "pal";
        if($osName == "Palm webOS") return "pal";
        if($osName == "Mac OS") return "mac";
        foreach ($this->osArray as $code => $os) {
           
            $osValue = is_array($os) ? $os[0] : $os;
            if (in_array($code, ['wi9', 'wix', 'wiv', 'wi7', 'wi8', 'wi1'])) {
                $osValue = $os[1];
            }
            
            if (strtolower($osName) === strtolower($osValue)) {
                return $code;
            }
        }
        return "000";
    }

    function Statsfilter($osCode, $userAgent){
        switch ($osCode) {
            case 'wi9':
                $patterns = array('/win9/i', '/win32/i', '/windows 9/i', '/nt 4/i', '/nt 5.0/i', '/win3/i');
                break;
            case 'wix':
                $patterns = array('/nt 5.1/i', '/nt 5.2/i', '/nt 5.3/i', '/nt 5.4/i', '/nt 5.5/i');
                break;
            case 'pal':
                $patterns = array('/windows phone/i', '/webos/i');
                break;
            case 'wiv':
                $patterns = array('/nt 6.0/i');
                break;
            case 'wi7':
                $patterns = array('/nt 6.1/i');
                break;
            case 'wi8':
                $patterns = array('/nt 6.2/i', '/nt 6.3/i');
                break;
            case 'wi1':
                $patterns = array('/nt 10/i');
                break;
            case 'lin':
                $patterns = array('/linux/i', '/suse/i', '/ubuntu/i', '/redhat/i', '/debian/i', '/gentoo/i');
                break;
            default:
                return false;
        }
        
        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $userAgent)) {
                return true;
            }
        }
        return false;
    }
	
	function getOsArray() {
		$arrayReturn = array_unique($this->osArray);
		asort($arrayReturn);
		return $arrayReturn;
	}

    function getOsStatsArray(){
        $arrayReturn = array_unique($this->osStatsArray);
		asort($arrayReturn);
		return $arrayReturn;
    }
}

?>
