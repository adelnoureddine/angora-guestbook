<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);

require_once 'data.php';
include_once 'classes/error/error.class.php';

$config['mysqlDriver'] = 'mysqli';

require_once 'classes/database/sql.class.php';
switch ($config['mysqlDriver']) {
	case 'mysql' :
		require_once 'classes/database/mysqli.class.php';
		$con = new AngoraMySQLi();
		break;
	case 'mysqli' :
		require_once 'classes/database/mysqli.class.php';
		$con = new AngoraMySQLi();
		break;
	default :
		require_once 'classes/database/mysqli.class.php';
		$con = new AngoraMySQLi();
}

$con->setCon(base64_decode($data['dbHost']),
base64_decode($data['dbUsername']),
base64_decode($data['dbPassword']),
base64_decode($data['dbDatabase']));

$data['dbPrefixDecoded'] = base64_decode($data['dbPrefix']);

$dbTables['config'] =  $data['dbPrefixDecoded'] . "config";
$dbTables['admin'] = $data['dbPrefixDecoded'] . "admin";
$dbTables['trash'] = $data['dbPrefixDecoded'] . "trash";
$dbTables['reply'] = $data['dbPrefixDecoded'] . "reply";
$dbTables['posts'] = $data['dbPrefixDecoded'] . "posts";
$dbTables['censored'] = $data['dbPrefixDecoded'] . "censored";
$dbTables['smilies'] = $data['dbPrefixDecoded'] . "smilies";
$dbTables['ip'] = $data['dbPrefixDecoded'] . "ip";
$dbTables['backupLog'] = $data['dbPrefixDecoded'] . "backupLog";

unset($data['dbPrefixDecoded']);

$con->connect();

$con->getRows("Select * from " . $dbTables['config'] . ";");

foreach ($con->queryResult as $res) {
	$config['id'] = $res['id'];
	$config['guestbookTheme'] = $res['guestbookTheme'];
	$config['guestbookLang'] = $res['guestbookLang'];
	$config['adminLang'] = $res['adminLang'];
	$config['mobileTheme'] = $res['mobileTheme'];

	$config['metaDescription'] = $res['metaDescription'];
	$config['metaKeywords'] = $res['metaKeywords'];

	$config['offline'] = $res['offline'];
	$config['offlineMessage'] = $res['offlineMessage'];
	$config['checkCaptcha'] = $res['checkCaptcha'];
	$config['reCaptcha'] = $res['reCaptcha'];
	$config['reCaptchapubk'] = $res['reCaptchapubk'];
	$config['reCaptchaprvk'] = $res['reCaptchaprvk'];

	$config['pagesFormat'] = $res['pagesFormat'];
	$config['numPostsPerPage'] = $res['numPostsPerPage'];
	$config['dateFormat'] = $res['dateFormat'];

	$config['gbTitle'] = $res['gbTitle'];
	$config['headTitle'] = $res['headTitle'];
	$config['checkEmail'] = $res['checkEmail'];
	$config['maxCharField'] = $res['maxCharField'];
	$config['maxCharMsg'] = $res['maxCharMsg'];
	$config['floodTime'] = $res['floodTime'];
	$config['moderateMsg'] = $res['moderateMsg'];

	$config['resizeImg'] = $res['resizeImg'];
	$config['imgWidth'] = $res['imgWidth'];
	$config['imgHeight'] = $res['imgHeight'];

	$config['email'] = $res['email'];
	$config['backupFolder'] = $res['backupFolder'];
	$config['smiliesFolder'] = $res['smiliesFolder'];
	$config['langFolder'] = $res['langFolder'];
	$config['themesFolder'] = $res['themesFolder'];

	$config['receiveEmailNotification'] = $res['receiveEmailNotification'];
	$config['autoCensor'] = $res['autoCensor'];
	$config['timezone'] = $res['timezone'];

	$config['debug'] = $res['debug'];
	break;
}

$config['angName'] = 'Angora';
$config['angVersion'] = '1.6.1';
$config['angUrl'] = 'http://aguestbook.sourceforge.net';

$con->close();

?>
