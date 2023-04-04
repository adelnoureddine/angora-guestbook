<?php
use guestbook\Error;
if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

// Get post id
$postId = isset($_GET['id']) ? secureVar($_GET['id'], 'html') : "";

// Get flag
$countryId = isset($_GET['cc']) ? secureVar($_GET['cc'], 'html') : "";

// Get OS
$osId = isset($_GET['os']) ? secureVar($_GET['os'], 'html') : "";

// Get Browser
$browserId = isset($_GET['br']) ? secureVar($_GET['br'], 'html') : "";

// Get Rate
$rateId = isset($_GET['ra']) ? secureVar($_GET['ra'], 'html') : "";

// Get search query
$searchId = isset($_POST['s']) ? secureVar($_POST['s'], 'html') : "";

$boxContent = new XTemplate('./themes/' . $config['guestbookTheme'] . '/content/posts.tpl');

$searchUsed = false;

$con->connect();

// Get single post
if ((! empty($postId)) && isset($postId) && is_numeric($postId))
	$queryMsg = "select posts.*, reply.id as rid, reply.post_id as post_id, reply.date as rdate, reply.message as rmessage, reply.name as rname from " . $dbTables['posts'] . " posts LEFT JOIN " . $dbTables['reply'] . " reply ON (posts.id = reply.post_id) where posts.publish=true and posts.id=\"" . secureVar($postId, 'sql')  . "\";";

// Get single country posts
elseif ((!empty($countryId)) && isset($countryId) && (strlen($countryId) == 2)) {
	$queryMsg = "select posts.*, reply.id as rid, reply.post_id as post_id, reply.date as rdate, reply.message as rmessage, reply.name as rname from " . $dbTables['posts'] . " posts LEFT JOIN " . $dbTables['reply'] . " reply ON (posts.id = reply.post_id) where posts.publish=true and posts.country=\"" . secureVar($countryId, 'sql')  . "\" group by posts.date " . $config['dateSort'] . ";";

	include_once 'classes/manage/countries.class.php';
	$countryName = new Countries();
	$boxContent->assign("SEARCH_COUNTRY_ICON", "images/countries/" . secureVar($countryId, 'html') . ".png");
	$boxContent->assign("SEARCH_COUNTRY_NAME", $countryName->getCountry($countryId));
	$boxContent->parse('posts.search_countries');
}

elseif ((!empty($osId)) && isset($osId) && (strlen($osId) == 3)) {
	include_once 'classes/manage/os.class.php';
	$queryMsg = "select posts.*, reply.id as rid, reply.post_id as post_id, reply.date as rdate, reply.message as rmessage, reply.name as rname from " . $dbTables['posts'] . " posts LEFT JOIN " . $dbTables['reply'] . " reply ON (posts.id = reply.post_id) where posts.publish=true group by posts.date " . $config['dateSort'] . ";";
	$os = new Os();
	$boxContent->assign("SEARCH_OS_ICON", "images/os/icon_" . $os->getOS($osId) . ".png");
	$boxContent->assign("SEARCH_OS_NAME", $os->getOSTitle($osId));
	$boxContent->parse('posts.search_os');
}

elseif ((!empty($browserId)) && isset($browserId) && (strlen($browserId) == 3)) {
	include_once 'classes/manage/browsers.class.php';
	$queryMsg = "select posts.*, reply.id as rid, reply.post_id as post_id, reply.date as rdate, reply.message as rmessage, reply.name as rname from " . $dbTables['posts'] . " posts LEFT JOIN " . $dbTables['reply'] . " reply ON (posts.id = reply.post_id) where posts.publish=true group by posts.date " . $config['dateSort'] . ";";
	$browser = new Browsers();
	$boxContent->assign("SEARCH_BROWSER_ICON", "images/browsers/icon_" . $browser->getBrowser($browserId) . ".png");
	$boxContent->assign("SEARCH_BROWSER_NAME", $browser->getBrowser($browserId));
	$boxContent->parse('posts.search_browsers');
}

elseif (isset($rateId) && $rateId >= -1 && $rateId <= 5) {
	$queryMsg = "select posts.*, reply.id as rid, reply.post_id as post_id, reply.date as rdate, reply.message as rmessage, reply.name as rname from " . $dbTables['posts'] . " posts LEFT JOIN " . $dbTables['reply'] . " reply ON (posts.id = reply.post_id) where posts.publish=true and posts.rating=\"" . secureVar($rateId, 'sql')  . "\" group by posts.date " . $config['dateSort'] . ";";
	
	$boxContent->assign("SEARCH_RATE_ICON", "images/stars/" . $rateId . ".gif");
	$boxContent->assign("SEARCH_RATE_NAME", $rateId);
	$boxContent->parse('posts.search_rates');
}

// Get search
elseif ((!empty($searchId)) && isset($searchId) && ($searchId != "") && !(isset($lang['searchInput']) && $searchId == $lang['searchInput'])) {
	
	$searchUsed = true;

	// Explode search data into words (explode by blank space)
	$searchData = explode(" ", trim($searchId));
	
	$queryMsg = "select posts.*, reply.id as rid, reply.post_id as post_id, reply.date as rdate, reply.message as rmessage, reply.name as rname from " . $dbTables['posts'] . " posts LEFT JOIN " . $dbTables['reply'] . " reply ON (posts.id = reply.post_id) where posts.publish=true and";
	
	// Search each word
	foreach ($searchData as $searchSingleData) {
		// Search is anything + search data + anything
		$searchSingleData = "%".$searchSingleData."%";
		
		$queryMsg .= " posts.name LIKE '" . secureVar($searchSingleData, 'sql') . "' || posts.message LIKE '" . secureVar($searchSingleData, 'sql') . "' ||";
	}
	
	// Remove additional ||
	$queryMsg = substr($queryMsg,0,(strLen($queryMsg)-3));
	$queryMsg .= " group by posts.date " . $config['dateSort'] . ";";
}

// Get the posts
else {
	// Get all posts
	if ($config['pagesFormat'] == 'allinone')
		$queryMsg = "select posts.*, reply.id as rid, reply.post_id as post_id, reply.date as rdate, reply.message as rmessage, reply.name as rname from " . $dbTables['posts'] . " posts LEFT JOIN " . $dbTables['reply'] . " reply ON (posts.id = reply.post_id) where posts.publish=true group by posts.date " . $config['dateSort'] . ";";
	
	// Get posts for the selected page
	elseif ($config['pagesFormat'] == 'several') {
		
		$pageNum = 1;
		// Get page number
		if (! empty($_GET['p']))
			$pageNum = secureVar($_GET['p'], 'html');

		$startingPostNum = ($pageNum - 1) * $config['numPostsPerPage'];
		
		$queryMsg = "select posts.*, reply.id as rid, reply.post_id as post_id, reply.date as rdate, reply.message as rmessage, reply.name as rname from " . $dbTables['posts'] . " posts LEFT JOIN " . $dbTables['reply'] . " reply ON (posts.id = reply.post_id) where posts.publish=true group by posts.date " . $config['dateSort'] . " limit " . secureVar($startingPostNum, 'sql') . " , " . secureVar($config['numPostsPerPage'], 'sql') . ";";
	}
	else {
		$error = new Error("The Cat doesn't know how to display the posts !");
		die($error->showError());
	}
}

// Get censored and smilies replacment lists
// Get it before process query, in order not to interfere with the other querie

include_once 'classes/manage/message.class.php';
$censoredList = Message::getCensoredList();
$smiliesReplacement = Message::getSmiliesReplacement();

// Process query

$con->getRows($queryMsg);

if ($con->getNumRows() > 0) {
	
	if ($searchUsed) {
		$boxContent->assign("MESSAGES_LANG", $lang['numberResults']);
		$boxContent->assign("NUM_MESSAGES", $con->getNumRows());
		$boxContent->parse('posts.num_posts');
	}
	
	include_once 'classes/manage/statistics.class.php';
	include_once 'classes/manage/countries.class.php';
	include_once 'classes/manage/os.class.php';
	include_once 'classes/manage/browsers.class.php';
	
	foreach ($con->queryResult as $res) {
		// Get data, format it if necessary, and publish it
		$pub = true;
		$userAgent = new Statistics($res['useragent']);
		$countryName = new Countries();
		$messageValue = Message::formatMessage(secureVar($res['message'], 'html'), $censoredList, isset($censoredLists) ? $censoredLists : []);
		$messageValue = Message::formatSmilies($messageValue, null, $smiliesReplacement);
		
		$os = new Os();
		$browser = new Browsers();

		if ((!empty($osId)) && isset($osId) && (strlen($osId) == 3)) {
			$pageNum = 1;
			
			if(!in_array($osId,$os->getOsStatsArray())){
				if($userAgent->getOs() != $os->getOs($osId) ){
					$pub = false;
				}
			}else{
				$pub = $os->Statsfilter($osId,$res['useragent']);
			}
			
		}elseif((!empty($browserId)) && isset($browserId) && (strlen($browserId) == 3)){
			$pageNum = 1;
			if($userAgent->getBrowser() != $browser->getBrowser($browserId)){
				$pub = false;
			}
		}

		$osCode = $os->getOsCode($userAgent->getOs());
		$brCode = $browser->getBrowserCode($userAgent->getBrowser());

		if($pub){

			$boxContent->assign("DATE", date($config['dateFormat'], secureVar($res['date'], 'html')));
			$boxContent->assign("POST_ID", secureVar($res['id'], 'html'));
			$boxContent->assign("COUNTRY", $countryName->getCountry($res['country']));
			$boxContent->assign("COUNTRY_ICON", "images/countries/" . secureVar($res['country'], 'html') . ".png");
			$boxContent->assign("NAME", secureVar($res['name'], 'html'));
			$boxContent->assign("LOCATION", secureVar($res['location'], 'html'));
			$boxContent->assign("MESSAGE", $messageValue);
			$boxContent->assign("USER_AGENT", secureVar($res['useragent'], 'html'));
			$boxContent->assign("RATING", secureVar($res['rating'], 'html'));
			$boxContent->assign("RATING_ICON", "images/stars/" . secureVar($res['rating'], 'html') . ".gif");
			$boxContent->assign("RATING_ADDR", "index.php?ra=" . secureVar($res['rating'], 'html'));
			$boxContent->assign("PAGE_ADDR", "index.php?id=" . secureVar($res['id'], 'html'));
			$boxContent->assign("COUNTRY_ADDR", "index.php?cc=" . secureVar($res['country'], 'html'));
			$boxContent->assign("BROWSER_ICON", "images/browsers/icon_" . $userAgent->getBrowser() . ".png");
			$boxContent->assign("BROWSER_ADDR", "index.php?br=" . urlencode($brCode));
			$boxContent->assign("OS_ICON", "images/os/icon_" . secureVar($userAgent->getOS(), 'html') . ".png");
			$boxContent->assign("OS_ADDR", "index.php?os=" . urlencode($osCode));

			// Admin reply
			if ($res['rid'] != NULL) {
				$messageValue = Message::formatMessage(secureVar($res['rmessage'], 'html'), $censoredList, isset($censoredLists) ? $censoredLists : []);
				$messageValue = Message::formatSmilies($messageValue, null, $smiliesReplacement);
				
				$boxContent->assign("AD_NAME", secureVar(base64_decode($res['rname']), 'html'));
				$boxContent->assign("AD_DATE", date($config['dateFormat'], secureVar($res['rdate'], 'html')));
				$boxContent->assign("AD_MESSAGE", $messageValue);
				$boxContent->parse('posts.fetch_posts.fetch_adminReply');
			}
			
			$boxContent->parse('posts.fetch_posts');
		}
	}
}
else {
	$boxContent->assign("NO_MESSAGES", $lang['noPostsToYourQuery']);
	$boxContent->parse('posts.no_posts');
}

$con->close();

$boxContent->parse('posts');
$boxContent = $boxContent->text('posts');

?>
