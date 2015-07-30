<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

$boxContent = new XTemplate('./themes/' . $config['guestbookTheme'] . '/content/stats.tpl');

include_once 'classes/manage/stats.class.php';
$stats = new Stats();

$durationId = secureVar($_GET['d'], 'html');
$lastMonthSeconds = time() - 2629743;

if ($durationId == 'lastmonth') {
	$queryMsg = "select useragent from " . $dbTables['posts'] . " where publish='1' and date>=" . $lastMonthSeconds . ";";
	$lastMonthURL = $lang['lastMonth'];
	$allTimeURL = '<a href="index.php?a=stats&d=alltime">' . $lang['allTime'] . '</a>';
}
else {
	$queryMsg = "select useragent from " . $dbTables['posts'] . " where publish='1';";
	$lastMonthURL = '<a href="index.php?a=stats&d=lastmonth">' . $lang['lastMonth'] . '</a>';
	$allTimeURL = $lang['allTime'];
}

$con->connect();
$con->getRows($queryMsg);
$totalNumber = 0;
$totalFlags = $con->getNumRows();

if ($totalFlags > 0) {

	if ($con->getNumRows() > 0) {
		foreach ($con->queryResult as $res) {
			$stats->calculateStats($res['useragent']);
			$totalNumber++;
		}
	}
	$con->close();

	foreach ($stats->getTableOS() as $tabos=>$num) {
		if ($num > 0) {
			$percentage = number_format((($num * 100) / $totalNumber), 2);
			
			$boxContent->assign('OS_NAME', $tabos);
			$boxContent->assign('NUM_OS', $num);
			$boxContent->assign('PER_OS', $percentage);
			$boxContent->parse('stats.stats_posts.statOS');
		}
	}

	foreach ($stats->getTableBrowser() as $tabos=>$num) {
		if ($num > 0) {
			$percentage = number_format((($num * 100) / $totalNumber), 2);
			
			$boxContent->assign('BROWSER_NAME', $tabos);
			$boxContent->assign('NUM_BROWSER', $num);
			$boxContent->assign('PER_BROWSER', $percentage);
			$boxContent->parse('stats.stats_posts.statBrowser');
		}
	}


	if ($durationId == 'lastmonth')
		$queryMsg = "select country, count(country) as nb_country from " . $dbTables['posts'] . " where publish='1' and date>=" . $lastMonthSeconds . " group by country order by nb_country desc, country asc;";
	else
		$queryMsg = "select country, count(country) as nb_country from " . $dbTables['posts'] . " where publish='1' group by country order by nb_country desc, country asc;";
		
	$con->connect();
	$con->getRows($queryMsg);

	//$totalFlags = 0;
	if ($con->getNumRows() > 0) {
		include_once 'classes/manage/countries.class.php';
		$countryName = new Countries();
		
		foreach ($con->queryResult as $res) {
			if ($res['country'] != '') {
				//$totalFlags += $res['nb_country'];
				$percentage = number_format((($res['nb_country'] * 100) / $totalFlags), 2);
				
				$boxContent->assign("FLAG_ICON", "images/countries/" . $res['country'] . ".png");
				$boxContent->assign("FLAG_ID", $res['country']);
				$boxContent->assign("URL_FLAG", "index.php?cc=" . $res['country']);
				$boxContent->assign("NUM_FLAG", $res['nb_country']);
				$boxContent->assign("NAME_FLAG", $countryName->getCountry($res['country']));
				$boxContent->assign('PER_FLAG', $percentage);
				$boxContent->parse('stats.stats_posts.flagStats');
			}
		}
	}
	
	$boxContent->assign('TOTAL_FLAGS', $totalFlags);
	$boxContent->assign('LANG_COUNTRY', $lang['country']);
	$boxContent->assign('LANG_NB_POSTS', $lang['nbPosts']);
	$boxContent->assign('LANG_TOTAL', $lang['total']);
	$boxContent->assign('LANG_BROWSER', $lang['browser']);
	$boxContent->assign('LANG_OS', $lang['os']);

	$boxContent->assign("ALL_TIME", $allTimeURL);
	$boxContent->assign("LAST_MONTH", $lastMonthURL);
	$boxContent->assign('LANG_WHEN', $lang['when']);
	$boxContent->parse('stats.stats_posts');
}
else {
	$boxContent->assign("NO_MESSAGES", $lang['noPostsToYourQuery']);
	$boxContent->parse('stats.no_posts');
}

$con->close();

$boxContent->parse('stats');
$boxContent = $boxContent->text('stats');

?>