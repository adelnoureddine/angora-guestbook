<?php
use guestbook\Error;

$magic = isset($magic) ? $magic : "";
if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

if ((!isset($_SESSION['nameField']) || $_SESSION['nameField'] == "") || (!isset($_SESSION['messageField']) || $_SESSION['messageField'] == "") || (!isset($_SESSION['hiddenField']) || $_SESSION['hiddenField'] == "") || (!isset($_SESSION['captchaField']) || $_SESSION['captchaField'] == "") || (!isset($_SESSION['emailField']) || $_SESSION['emailField'] == "")) {
	session_regenerate_id();
	$_SESSION['nameField'] = md5(uniqid(rand(), true));
	$_SESSION['messageField'] = md5(uniqid(rand(), true));
	$_SESSION['hiddenField'] = md5(uniqid(rand(), true));
	$_SESSION['captchaField'] = md5(uniqid(rand(), true));
	$_SESSION['emailField'] = md5(uniqid(rand(), true));
}

$boxContent = new XTemplate('./themes/' . $config['guestbookTheme'] . '/content/sign.tpl');

$signOk = false;

$scriptInclude = "<script type=\"text/javascript\">
function showFlag(flag){
	document.getElementById(\"flagsPic\").src = 'images/countries/'+flag.value+'.png';
}

function showStar(star){
	document.getElementById(\"starsPic\").src = 'images/stars/'+star.value+'.gif';
}
</script>
<script type=\"text/javascript\" src=\"javascript/popup.js\"></script>
";

$boxContent->assign("SCRIPTS", $scriptInclude);

// Check if already send
$submitId = isset($_POST['submit']) ? secureVar($_POST['submit'], 'html') : "";

$boxContent->assign("FORM_NAME", 'signForm');
$boxContent->assign("URL_SIGN", 'index.php?a=sign');
$boxContent->assign("LANG_NAME", isset($lang) ? $lang['name'] : "");
$boxContent->assign("NAME_FIELD", $_SESSION['nameField']);
$boxContent->assign("LANG_MESSAGE", $lang['message']);
$boxContent->assign("MESSAGE_FIELD", $_SESSION['messageField']);
$boxContent->assign("LANG_COUNTRY", $lang['country']);
$boxContent->assign("COUNTRY_FIELD", 'country');
$boxContent->assign("LANG_LOCATION", $lang['location']);
$boxContent->assign("LOCATION_FIELD", 'location');
$boxContent->assign("LANG_EMAIL", $lang['email']);
$boxContent->assign("EMAIL_FIELD", $_SESSION['emailField']);
$boxContent->assign("LANG_RATING", $lang['rating']);
$boxContent->assign("RATING_FIELD", 'rating');
$boxContent->assign("LANG_SEND", $lang['send']);
$boxContent->assign("MAX_CHAR_FIELD", $config['maxCharField']);
$boxContent->assign("FLAG_ICON", 'flagsPic');
$boxContent->assign("STAR_ICON", 'starsPic');
$boxContent->assign("FLAG_IMG", 'images/countries/00.png');
$boxContent->assign("STAR_IMG", 'images/countries/00.png');
$boxContent->assign("HIDDEN_FIELD", $_SESSION['hiddenField']);

if ($config['reCaptcha'])
    $captcha = recaptcha_get_html($config['reCaptchapubk']);
else {
    $captcha = "<img src=\"includes/captcha.php\" alt=\"captcha code\" id=\"captchaCode\" onclick=\"this.src = this.src + '?' + (new Date()).getTime();\" style=\"cursor: pointer;\" />";
    $captcha .= " <img src=\"images/posts/reload.gif\" alt=\"Reload captcha code\" onclick=\"document.getElementById('captchaCode').src = document.getElementById('captchaCode').src + '?' + (new Date()).getTime();\" style=\"cursor: pointer;\" />";
}

if ((! empty($submitId)) && isset($submitId)) {
	$signCheck['name'] = secureVar(trim($_POST[$_SESSION['nameField']]), 'html');
	$signCheck['country'] = secureVar(trim($_POST['country']), 'html');
	$signCheck['location'] = secureVar(trim($_POST['location']), 'html');
	$signCheck['email'] = secureVar(trim($_POST[$_SESSION['emailField']]), 'html');
	$signCheck['rating'] = secureVar(trim($_POST['rating']), 'html');
	$signCheck['message'] = secureVar(trim($_POST[$_SESSION['messageField']]), 'html');
	if (array_key_exists($_SESSION['captchaField'], $_POST)) {
		$signCheck['captcha'] = secureVar(trim($_POST[$_SESSION['captchaField']]), 'html');
	} 
	$signCheck['hiddenField'] = secureVar(trim($_POST[$_SESSION['hiddenField']]), 'html');

	if ($signCheck['hiddenField'] != '') {
		$error = new Error("Humans only ! Go away WALL&#183;E");
		die($error->showError());
	}

	$errorField = "";
	if (($signCheck['name'] == '') ||  empty($signCheck['name']))
		$errorField .= $lang['name'] . ' ' . $lang['isEmpty'] . '<br />';

	if (($signCheck['message'] == '') ||  empty($signCheck['message']))
		$errorField .= $lang['message'] . ' ' . $lang['isEmpty'] . '<br />';

	if ($config['checkEmail']) {
		if ((($signCheck['email'] == '') ||  empty($signCheck['email'])) && $config['checkEmail'])
			$errorField .= $lang['email'] . ' ' . $lang['isEmpty'] . '<br />';
		else {
			include_once 'classes/email/email.class.php';
			$email = new Email($signCheck['email']);
			if (!$email->checkMail())
				$errorField .= $signCheck['email'] . $lang['emailInvalid'] . '<br />';
		}
	}


	if ($config['reCaptcha']) {
		$resp = recaptcha_check_answer ($config['reCaptchaprvk'],
								$_SERVER["REMOTE_ADDR"],
								$_POST["recaptcha_challenge_field"],
								$_POST["recaptcha_response_field"]);
		if (!$resp->is_valid)
			$errorField .= $lang['captchaError'] . '<br />';
	}
	else {
		if ($config['checkCaptcha']) {
			if (($signCheck['captcha'] == '') ||  empty($signCheck['captcha']))
				$errorField .= $lang['captcha'] . ' ' . $lang['isEmpty'] . '<br />';
			elseif (hash('sha1', $signCheck['captcha']) != $_SESSION['captcha_value'])
				$errorField .= $lang['captchaError'] . '<br />';
		}
	}

	if (strlen($signCheck['name']) > $config['maxCharField'])
		$errorField .= $lang['name'] . ' ' . $lang['isBig'] . ' (' . strlen($signCheck['name']) . '/' . $config['maxCharField'] . ')<br />';

	if (strlen($signCheck['location']) > $config['maxCharField'])
		$errorField .= $lang['location'] . ' ' . $lang['isBig'] . ' (' . strlen($signCheck['location']) . '/' . $config['maxCharField'] . ')<br />';

	if (strlen($signCheck['email']) > $config['maxCharField'])
		$errorField .= $lang['email'] . ' ' . $lang['isBig'] . ' (' . strlen($signCheck['email']) . '/' . $config['maxCharField'] . ')<br />';

	if (strlen($signCheck['message']) > $config['maxCharMsg'])
		$errorField .= $lang['message'] . ' ' . $lang['isBig'] . ' (' . strlen($signCheck['message']) . '/' . $config['maxCharMsg'] . ')<br />';

	$con->connect();
	$con->getRows("Select ip from " . (isset($dbTables) ? $dbTables['ip'] : "") . ";");
	if ($con->getNumRows() > 0) {
		foreach ($con->queryResult as $res) {
			if (preg_match("/^" . $res['ip'] . "/", $_SERVER['REMOTE_ADDR'])) {
				$errorField .= secureVar($_SERVER['REMOTE_ADDR'], 'html') . ' ' . $lang['bannedIP'] . '<br />';
				break;
			}
		}
	}

	$con->getRows("Select ip, date from " . $dbTables['posts'] . " where ip='" . secureVar($_SERVER['REMOTE_ADDR'], 'sql') . "';");
	if ($con->getNumRows() > 0) {
		foreach ($con->queryResult as $res) {
			if (time() <= ($res['date'] + $config['floodTime'])) {
				$errorField .= secureVar($_SERVER['REMOTE_ADDR'], 'html') . ' ' . $lang['floodTime'] . '<br />';
				break;
			}
		}
	}

	$signCheck['publish'] = !$config['moderateMsg'];
	if ($config['autoCensor']) {
		include_once 'classes/manage/message.class.php';
		if (Message::isCensored($signCheck['message']))
			$signCheck['publish'] = 0;
	}

	$boxContent->assign("ERROR_MSG", $errorField);
	$boxContent->parse('sign.signCheck');

	$signCheck['date'] = time();
	$signCheck['ip'] = getIP();
	$signCheck['useragent'] = $_SERVER['HTTP_USER_AGENT'];

	include_once 'classes/manage/countries.class.php';
	$countriesName = new Countries();
	$ratingArray = array("0" => "0", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5");

	$resCountries = $countriesName->getCountry($signCheck['country']);
	if (empty($resCountries) || ($resCountries == ''))
		$signCheck['country'] = '00';

	if (! in_array($signCheck['rating'], $ratingArray))
		$signCheck['rating'] = '-1';

	if ($errorField == "") {
		$queryMsg = "INSERT INTO " . $dbTables['posts'] . " (
		`id` ,
		`name` ,
		`country` ,
		`date` ,
		`location` ,
		`email` ,
		`message` ,
		`useragent` ,
		`rating` ,
		`publish` ,
		`ip` )
		VALUES (
		NULL ,
		'" . secureVar($signCheck['name'], 'sql') . "',
		'" . secureVar($signCheck['country'], 'sql') . "',
		'" . secureVar($signCheck['date'], 'sql') . "',
		'" . secureVar($signCheck['location'], 'sql') . "',
		'" . secureVar(base64_encode($signCheck['email']), 'sql') . "',
		'" . secureVar($signCheck['message'], 'sql') . "',
		'" . secureVar($signCheck['useragent'], 'sql') . "',
		'" . secureVar($signCheck['rating'], 'sql') . "',
		'" . secureVar($signCheck['publish'], 'sql') . "',
		'" . secureVar($signCheck['ip'], 'sql') . "' )";

		if ($con->modify($queryMsg)) {

			// Send email if enabled
			if ($config['receiveEmailNotification']) {
				include_once 'classes/email/email.class.php';
				$senderEmail = base64_decode($config['email']);
				$sendEmail = new Email($senderEmail);
				$sendEmail->sendEmail($senderEmail, $senderEmail, $lang['newMsgEmailSubject'], $lang['newMsgEmail'], "text");
			}

			$signOk = true;
			$boxContent->assign("LANG_OK_MSG", $lang['okSign']);
			$boxContent->assign("URL_REDIRECT", 'index.php');
			$boxContent->assign("LANG_REDIRECT", $lang['redirect']);
			$boxContent->parse('sign.signOK');

			$_SESSION = array();
			unset($_SESSION);
			session_destroy();
		}
		else {
			$con->printError();
			$boxContent->assign("ERROR_MSG", $lang['errorSigndb']);
			$boxContent->parse('sign.signErr');
		}

	}

    if ($config['reCaptcha'])
        $captcha = recaptcha_get_html($config['reCaptchapubk']);
    else {
        $captcha = "<img src=\"includes/captcha.php\" alt=\"Captcha code\" id=\"captchaCode\" onclick=\"this.src = this.src + '?' + (new Date()).getTime();\" style=\"cursor: pointer;\" />";
        $captcha .= " <img src=\"images/posts/reload.gif\" alt=\"Reload captcha code\" onclick=\"document.getElementById('captchaCode').src = document.getElementById('captchaCode').src + '?' + (new Date()).getTime();\" style=\"cursor: pointer;\" />";
    }

	$boxContent->assign("NAME_VALUE", stripslashes($signCheck['name']));
	$boxContent->assign("COUNTRY_VALUE", $signCheck['country']);
	$boxContent->assign("LOCATION_VALUE", stripslashes($signCheck['location']));
	$boxContent->assign("EMAIL_VALUE", stripslashes($signCheck['email']));
	$boxContent->assign("RATING_VALUE", $signCheck['rating']);
	$boxContent->assign("MESSAGE_VALUE", stripslashes($signCheck['message']));
}

include_once 'classes/manage/countries.class.php';
$countryName = new Countries();
$selected = '';

foreach ($countryName->getCountriesArray() as $id_cc => $country_name)
{
	if (isset($signCheck['country']) && !empty($signCheck['country'])) {
		if ($signCheck['country'] == $id_cc)
			$selected = "selected";
		else
			$selected = '';
	}

	if (strlen($country_name) > 23)	{
		$country_name = substr($country_name, 0, 23);
	}

	$boxContent->assign('ID_COUNTRY', $id_cc);
	$boxContent->assign('COUNTRY_NAME', $country_name);
	$boxContent->assign('SELECTED', $selected);
	$boxContent->parse('sign.signForm.countries');
}

$ratingArray = array("0" => "0", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5");
$selected = '';

foreach ($ratingArray as $id_rate => $rate_value)
{
	if (isset($signCheck['rating']) && !empty($signCheck['rating'])) {
		if ($signCheck['rating'] == $id_rate)
			$selected = "selected";
		else
			$selected = '';
	}

	$boxContent->assign('ID_RATE', $id_rate);
	$boxContent->assign('RATE_NAME', $rate_value);
	$boxContent->assign('SELECTED', $selected);
	$boxContent->parse('sign.signForm.rating');
}

if ($config['checkCaptcha'] && !$config['reCaptcha']) {
	$boxContent->assign("CAPTCHA_FIELD", isset($_SESSION['captchaField']) ? $_SESSION['captchaField'] : "");
	$boxContent->assign("LANG_CAPTCHA", $lang['captcha']);
	$boxContent->assign("CAPTCHA", $captcha);
	$boxContent->parse('sign.signForm.captcha');
}

if ($config['reCaptcha']) {
    $boxContent->assign("CAPTCHA", $captcha);
	$boxContent->parse('sign.signForm.recaptcha');
}

$publishPage = true;
$con->connect();
$con->getRows("Select ip from " . $dbTables['ip'] . ";");
if ($con->getNumRows() > 0) {
	foreach ($con->queryResult as $res) {
		if (preg_match("/^" . $res['ip'] . "/", $_SERVER['REMOTE_ADDR'])) {
			$errorFieldBanIP = secureVar($_SERVER['REMOTE_ADDR'], 'html') . ' ' . $lang['bannedIP'] . '<br />';
			$publishPage = false;
			break;
		}
	}
}

if (!$publishPage) {
	$boxContent->assign("IP_BANNED", $errorFieldBanIP);
	$boxContent->parse('sign.bannedIP');
}
else {
	if (!$signOk)
		$boxContent->parse('sign.signForm');
}

$boxContent->parse('sign');
$boxContent = $boxContent->text('sign');

?>
