<?php

session_name('angoraAdmin');
session_start();
session_regenerate_id();

$magic = "0xDEADBEEF";
$lang = array();

include_once '../classes/error/error.class.php';
include_once 'includes/checks.php';

require_once '../configuration.php';

include_once '../classes/functions.php';

date_default_timezone_set($config['timezone']);

startCompression();

// Debug informations
if ($config['debug']) {
	$startTime = getTime();
}

include_once "../languages/" . $config['adminLang'] . "/admin.php";

echo "<!DOCTYPE html 
     PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\"
     \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">

<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"" . $lang['lang'] . "\" lang=\"" . $lang['lang'] . "\" dir=\"" . $lang['dir'] . "\">

<head>
<link rel=\"stylesheet\" href=\"includes/style/layout.css\" type=\"text/css\" />
<link rel=\"stylesheet\" href=\"includes/style/style.css\" type=\"text/css\" />
<meta http-equiv=\"Content-Type\" lang=\"" . $lang['lang'] . "\" content=\"text/html; charset=" . $lang['charset'] . "\" />
<title>" . $config['headTitle'] . "</title>";

$pageName = isset($_GET['a']) ? secureVar($_GET['a'], 'html') : '';

if ((empty($pageName)) || ($pageName == '') || ($pageName == 'login')) {
	echo "<script type=\"text/javascript\" src=\"../javascript/webtoolkit.sha256.js\"></script>
	</head><body>";
	require_once 'includes/content/login.php';
}
elseif ($pageName == 'logout') {
	echo "</head><body>";
	require_once 'includes/content/logout.php';
}
elseif ($pageName == 'forgotPass') {
	echo "</head><body>";
	require_once 'includes/content/forgotPass.php';
}
else {
	$float = 'floatLeft';
	$alignHelp = 'alignRight';
	if ($lang['dir'] == 'rtl') {
		$float = 'floatRight';
		$alignHelp = 'alignLeft';
	}
	
	echo "</head><body>";
	echo "<script type=\"text/javascript\" src=\"../javascript/popup.js\"></script>";
	require_once 'includes/iden.php';
	include_once 'includes/boxes/panel.php';
	
	echo '<div class="content ' . $float . '">';

	switch ($pageName) {
		case 'start' :
			require_once 'includes/content/start.php';
			break;
		case 'options' :
			require_once 'includes/content/options.php';
			break;
		case 'phpinfo' :
			require_once 'includes/content/phpinfo.php';
			break;
		case 'about' :
			require_once 'includes/content/about.php';
			break;
		case 'changePass' :
			require_once 'includes/content/changePass.php';
			break;
		case 'optimize' :
			require_once 'includes/content/optimize.php';
			break;
		case 'banIP' :
			require_once 'includes/content/banIP.php';
			break;
		case 'backup' :
			require_once 'includes/content/backup.php';
			break;
		case 'admin' :
			require_once 'includes/content/admin.php';
			break;
		case 'upload' :
			require_once 'includes/content/upload.php';
			break;
		case 'smilies' :
			require_once 'includes/content/smilies.php';
			break;
		case 'censored' :
			require_once 'includes/content/censored.php';
			break;
		case 'posts' :
			require_once 'includes/content/posts.php';
			break;
		case 'search' :
			require_once 'includes/content/search.php';
			break;
		case 'advOptions' :
			require_once 'includes/content/advOptions.php';
			break;
		default :
			require_once 'includes/content/start.php';
	}
}

// Debug informations
if ($config['debug']) {
	$endTime = getTime();
	$totalTime = $endTime - $startTime;
	
	$debug['pageGenerated'] = 'Page was generated in ' . $totalTime . ' seconds';
	
	if (function_exists('memory_get_usage'))
		$debug['memoryUsage'] = 'Memory usage : ' . round(memory_get_usage() / 1024) . ' KB';
	else
		$debug['memoryUsage'] = '';
	
	$debug['numberQueries'] = 'Page used ' . $con->getNumQueries() . ' queries';
	
	$debug['queriesData'] = '<div id="queriesList">';
	foreach ($con->getQueriesDebug() as $queryData) {
		$debug['queriesData'] .= $queryData . '<br />';
	}
	$debug['queriesData'] .= '</div>';
	
	function dump_array($array) {
    	return print_r($array, true);
    }
    
    $debug['dumpVars'] = '<div id="dumpVars">Variables dump<br />GET Vars<br />' . dump_array($_GET) . '<br /><br />POST Vars<br />
    ' . dump_array($_POST) . '<br /><br />SESSION Vars<br />
    ' . dump_array($_SESSION) . '<br /><br />COOKIE Vars<br />' . dump_array($_COOKIE) . '</div>';

	echo '<link rel="stylesheet" href="../includes/commonStyle.css" type="text/css" />';
    echo '<div id="debug">DEBUG<br />' . $debug['pageGenerated'] . '<br />' . $debug['memoryUsage'] . '<br />' 
    . $debug['numberQueries'] . '<br />' . $debug['queriesData'] . '<hr />' . $debug['dumpVars'] . '</div>';
}

echo '</div>';
echo "</body></html>";

?>
