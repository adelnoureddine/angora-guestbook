<?php
use guestbook\Error;
if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

// Get post id
$postId = isset($_GET['id']) ? secureVar($_GET['id'], 'html') : "";

// Get flag
$countryId = isset($_GET['cc']) ? secureVar($_GET['cc'], 'html') : "";

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
	$queryMsg = "select posts.*, reply.id as rid, reply.post_id as post_id, reply.date as rdate, reply.message as rmessage, reply.name as rname from " . $dbTables['posts'] . " posts LEFT JOIN " . $dbTables['reply'] . " reply ON (posts.id = reply.post_id) where posts.publish=true and posts.country=\"" . secureVar($countryId, 'sql')  . "\" group by posts.date desc;";
	
	include_once 'classes/manage/countries.class.php';
	$countryName = new Countries();
	$boxContent->assign("SEARCH_COUNTRY_ICON", "images/countries/" . secureVar($countryId, 'html') . ".png");
	$boxContent->assign("SEARCH_COUNTRY_NAME", $countryName->getCountry($countryId));
	$boxContent->parse('posts.search_countries');
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
	$queryMsg .= " group by posts.date desc;";
}

// Get the posts
else {
	// Get all posts
	if ($config['pagesFormat'] == 'allinone')
		$queryMsg = "select posts.*, reply.id as rid, reply.post_id as post_id, reply.date as rdate, reply.message as rmessage, reply.name as rname from " . $dbTables['posts'] . " posts LEFT JOIN " . $dbTables['reply'] . " reply ON (posts.id = reply.post_id) where posts.publish=true group by posts.date desc;";
	
	// Get posts for the selected page
	elseif ($config['pagesFormat'] == 'several') {
		
		$pageNum = 1;
		// Get page number
		if (! empty($_GET['p']))
			$pageNum = secureVar($_GET['p'], 'html');

		$startingPostNum = ($pageNum - 1) * $config['numPostsPerPage'];
		
		$queryMsg = "select posts.*, reply.id as rid, reply.post_id as post_id, reply.date as rdate, reply.message as rmessage, reply.name as rname from " . $dbTables['posts'] . " posts LEFT JOIN " . $dbTables['reply'] . " reply ON (posts.id = reply.post_id) where posts.publish=true group by posts.date desc limit " . secureVar($startingPostNum, 'sql') . " , " . secureVar($config['numPostsPerPage'], 'sql') . ";";
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
	
	foreach ($con->queryResult as $res) {
		// Get data, format it if necessary, and publish it
		$userAgent = new Statistics($res['useragent']);
		$countryName = new Countries();
		$messageValue = Message::formatMessage(secureVar($res['message'], 'html'), $censoredList, isset($censoredLists) ? $censoredLists : []);
		$messageValue = Message::formatSmilies($messageValue, null, $smiliesReplacement);
				
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
		$boxContent->assign("PAGE_ADDR", "index.php?id=" . secureVar($res['id'], 'html'));
		$boxContent->assign("COUNTRY_ADDR", "index.php?cc=" . secureVar($res['country'], 'html'));
		$boxContent->assign("BROWSER_ICON", "images/browsers/icon_" . $userAgent->getBrowser() . ".png");
		$boxContent->assign("OS_ICON", "images/os/icon_" . $userAgent->getOS() . ".png");

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
else {
	$boxContent->assign("NO_MESSAGES", $lang['noPostsToYourQuery']);
	$boxContent->parse('posts.no_posts');
}

$con->close();

$boxContent->parse('posts');
$boxContent = $boxContent->text('posts');

?>
