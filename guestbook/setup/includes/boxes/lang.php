<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

require_once '../classes/functions.php';
@$instLang = secureVar($_GET['lang'], 'html');
if (empty($instLang))
	$instLang = 'en';

switch ($instLang) {
	case 'en' :
		$instLangValue = 'english.php';
		break;
	case 'fr' :
		$instLangValue = 'french.php';
		break;
	case 'ar' :
		$instLangValue = 'arabic.php';
		break;
	case 'tr' :
		$instLangValue = 'turkish.php';
		break;
	case 'jp' :
		$instLangValue = 'japanese.php';
		break;
	case 'fi' :
		$instLangValue = 'finnish.php';
		break;
	case 'de' :
		$instLangValue = 'german.php';
		break;
	case 'es' :
		$instLangValue = 'spanish.php';
		break;
	case 'ru' :
		$instLangValue = 'russian.php';
		break;
	case 'zh' :
		$instLangValue = 'tradChinese.php';
		break;
	default :
		$instLangValue = 'english.php';
}

include_once "languages/" . $instLangValue;

?>