<?php

session_name('angoraGuestbook');
session_start();
session_regenerate_id();

$magic = "0xDEADBEEF";
$lang = array();
use guestbook\Error;
include_once 'classes/error/error.class.php';
include_once 'includes/checks.php';

require_once 'configuration.php';

include_once 'classes/functions.php';

date_default_timezone_set($config['timezone']);

startCompression();

// Debug informations
if ($config['debug']) {
	$startTime = getTime();
}

// Language settings

$langName = isset($_GET['l']) ? secureVar($_GET['l'], 'html') : "";

if (preg_match('#/#', $langName))
	$langName = $config['guestbookLang'];

if (! empty($langName))
	$_SESSION['langName'] = $langName;

if (empty($_SESSION['langName']))
	$langName = $config['guestbookLang'];
else
	$langName = $_SESSION['langName'];

if (is_file("languages/" . $langName . "/frontend.php"))
    @include_once "languages/" . $langName . "/frontend.php";
else {
    $error = new Error("The frontend language file doesn't exist");
	die($error->showError());
}

if ($config['reCaptcha'])
	require_once 'classes/recaptcha/recaptchalib.php';

// Theme settings
include_once 'classes/xtpl/xtemplate.class.php';

$themeName = isset($_GET['t']) ? secureVar($_GET['t'], 'html') : "";

if (! empty($themeName))
	$_SESSION['themeName'] = $themeName;

if (empty($_SESSION['themeName']))
	$themeName = $config['guestbookTheme'];
else
	$themeName = $_SESSION['themeName'];

if (is_file('./themes/' . $themeName . '/global.tpl'))
    $global = new XTemplate('./themes/' . $themeName . '/global.tpl');
else {
    $error = new Error("The global theme tpl doesn't exist");
	die($error->showError());
}

$global->assign("GUEST_THEME", $themeName);
$global->assign("META_TITLE", $config['headTitle']);
$global->assign("GUEST_LANG", $config['guestbookLang']);
$global->assign("CHARSET", $lang['charset']);
$global->assign("META_DESCRIPTION", $config['metaDescription']);
$global->assign("META_KEYWORD", $config['metaKeywords']);
$global->assign("DIR", $lang['dir']);
$global->assign("LANG", $lang['lang']);

require_once 'includes/boxes/title.php';
$global->assign("TITLE_BOX", $boxContent);

require_once 'includes/boxes/menu.php';
$global->assign("MENU_BOX", $boxContent);

$headIncludes = "";
$pageName = isset($_GET['a']) ? secureVar($_GET['a'], 'html') : "";

if (! empty($pageName)) {
	switch ($pageName) {
		case 'sign' :
			if (empty($_SERVER['HTTPS']) || ($_SERVER['HTTPS'] == "off"))
				$url['pre'] = "http://";
			else
				$url['pre'] = "https://";

			$url['completePage'] = $url['pre'] . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
			$url['page'] =  substr($url['completePage'], 0, strrpos($url['completePage'], "/")+1);

			include_once 'classes/mobile/mobile.class.php';
			include_once 'classes/manage/tinymce.class.php';
			if ((! Mobile::isMobile($_SERVER['HTTP_USER_AGENT'])) && (Tinymce::isCompatible($_SERVER['HTTP_USER_AGENT']))) {
				if (extension_loaded('zlib') && ini_get('zlib.output_compression'))  {
					$headIncludes .= "<script type=\"text/javascript\" src=\"javascript/tiny_mce/tiny_mce.js\"></script>";
				}
				else {
					$headIncludes .= "<script type=\"text/javascript\" src=\"javascript/tiny_mce/tiny_mce_gzip.js\"></script>

<script type=\"text/javascript\">
tinyMCE_GZ.init({
	plugins : \"bbcode, emotions, inlinepopups, uploadImage, rbyamli\",
	languages : 'en',
	disk_cache : true,
	debug : false
});
</script>";
				}

$headIncludes .= "
<script type=\"text/javascript\">
	var characterLimit = " . $res['maxCharMsg'] . ";
	tinyMCE.init({
		mode : \"textareas\",
		theme : \"advanced\",
		width : 300,
		height : 200,
		document_base_url : \"" . $url['page'] . "\",
		remove_trailing_nbsp : true,
		entity_encoding : \"raw\",
		plugins : \"bbcode, emotions, inlinepopups, uploadImage, rbyamli\",
		theme_advanced_buttons1 : \"bold,italic,underline,link,unlink,image,uploadImage,forecolor,emotions,undo\",
		theme_advanced_buttons2 : \"\",
		theme_advanced_buttons3 : \"\",
		theme_advanced_path_location : \"top\",
		remove_linebreaks : false,
		theme_advanced_path : false,

		setup :function(ed) {
			ed.onBeforeSetContent.add(function(ed, o) {
			var strip = (tinyMCE.activeEditor.getContent()).replace(/(<([^>]+)>)/ig,\"\");
			var text = (characterLimit-strip.length);
			tinymce.DOM.setHTML(tinymce.DOM.get(tinyMCE.activeEditor.id + '_path_row'), text);
			}
			);

			ed.onKeyUp.add(function(ed, e) {
			var strip = (tinyMCE.activeEditor.getContent()).replace(/(<([^>]+)>)/ig,\"\");
			var text = (characterLimit-strip.length);
			tinymce.DOM.setHTML(tinymce.DOM.get(tinyMCE.activeEditor.id + '_path_row'), text);
			});
		}

	});
</script>";
			}

			require_once 'includes/content/sign.php';
			break;
		case 'stats' :
			require_once 'includes/content/stats.php';
			break;
		default :
			require_once 'includes/content/posts.php';
	}
}
else {
	require_once 'includes/content/posts.php';
}

$global->assign("HEAD_INCLUDE", $headIncludes);
$global->assign("CONTENT_BOX", $boxContent);

if (empty($pageName) || !file_exists("includes/content/" . $pageName . ".php")) {
	if (
	((! empty($postId)) && isset($postId) && is_numeric($postId))
	|| ((!empty($countryId)) && isset($countryId) && (strlen($countryId) == 2)) 
	|| ((!empty($osId)) && isset($osId) && (strlen($osId) == 3)) 
	|| ((!empty($browserId)) && isset($browserId) && (strlen($browserId) == 3)) 
	|| ((!empty($searchId)) && isset($searchId) && ($searchId != "") && !(isset($lang['searchInput']) && $searchId == $lang['searchInput']))
	|| ($config['pagesFormat'] == 'allinone')
	) {} else {
		$con->connect();
		$con->getRows("select id from " . $dbTables['posts'] . " where publish=true group by date desc;");
		$numRowsAll = $con->getNumRows();
		$con->close();
		$numPages = ceil(($numRowsAll / $config['numPostsPerPage']));

		if ($numPages > 1) {
			require_once 'includes/boxes/pageLinks.php';
			$global->assign("PAGE_LINKS_BOX", $boxContent);
		}
	}

	require_once 'includes/boxes/search.php';
	$global->assign("SEARCH_BOX", $boxContent);
}

require_once 'includes/boxes/footNotes.php';
$global->assign("FOOT_NOTES_BOX", $boxContent);

$global->parse('main');
$global->out('main');


// Debug informations
if ($config['debug']) {
	$endTime = getTime();
	$totalTime = $endTime - $startTime;

	$debug = array();
	$debug['pageGenerated'] = 'Page was generated in ' . $totalTime . ' seconds';

	if (function_exists('memory_get_usage'))
		$debug['memoryUsage'] = 'Memory usage : ' . round(memory_get_usage() / 1024) . ' KB';
	else
		$debug['memoryUsage'] = '';

	$debug['numberQueries'] = 'Page used ' . $con->getNumQueries() . ' queries using the ' . $config['mysqlDriver'] . ' adapter';

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

	echo '<link rel="stylesheet" href="includes/commonStyle.css" type="text/css" />';
    echo '<div id="debug">DEBUG<br />' . $debug['pageGenerated'] . '<br />' . $debug['memoryUsage'] . '<br />'
    . $debug['numberQueries'] . '<br />' . $debug['queriesData'] . '<hr />' . $debug['dumpVars'] . '</div>';
}

?>
