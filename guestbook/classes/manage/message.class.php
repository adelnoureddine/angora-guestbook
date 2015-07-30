<?php

/**
 ****************************************************
 * message.class.php                                *
 ****************************************************
 * Angora Guestbook                                 *
 ****************************************************
 * Software author :            Adel Noureddine     *
 * Copyright 2005 - 2009 by :   Adel Noureddine     *
 ****************************************************
 * The message class file                           *
 ****************************************************
 * */

class Message {
	
	static function formatMessage($message, $censoredList=null, $censoredLists=array()) {
		global $config;
		$message = str_replace(chr(13), '<br />', $message);
		$message = str_replace('[BR]', '<br />', $message);

		$find = array(
				"'\[url\](.*?)\[/url\]'i",
				"'\[url=(.*?)\](.*?)\[/url\]'i",
				"'\[color=(.*?)\](.*?)\[/color\]'i",
				"'\[size=(.*?)\](.*?)\[/size\]'i",
				"'\[b\](.*?)\[/b\]'i",
				"'\[i\](.*?)\[/i\]'i",
				"'\[u\](.*?)\[/u\]'i"
			);

		$replace = array(
				"<a href=\"\\1\" onclick=\"window.open(this.href,'_blank');return false;\" rel=\"nofollow\">\\1</a>",
				"<a href=\"\\1\" onclick=\"window.open(this.href,'_blank');return false;\" rel=\"nofollow\">\\2</a>",
				"<span style=\"color:\\1;\">\\2</span>",
				"<span style=\"font-size:\\1px;\">\\2</span>",
				"<b>\\1</b>",
				"<i>\\1</i>",
				"<span style=\"text-decoration: underline;\">\\1</span>"
			);
		
		$message = preg_replace($find,$replace,$message);
		
		$find = array("'\[img\](.*?)\[/img\]'i");
		if ($config['resizeImg'])
			$replace = array("<a href=\"\\1\" target=\"_blank\"><img src=\"\\1\" alt=\"\\1\" width=\"" . $config['imgWidth'] . "\" height=\"" . $config['imgHeight'] . "\"></img></a>");
		else
			$replace = array("<img src=\"\\1\" alt=\"\\1\"></img>");

		$message = preg_replace($find,$replace,$message);
		
		if ($censoredList != null) {
			foreach ($censoredList as $res)
				$message = str_ireplace(trim($res['original']), trim($res['replacement']), $message);
		}
		
		$message = Message::textWrap($message);
		return $message;
	}
	
	static function formatSmilies($message, $notRoot, $smiliesReplacement) {
		$smiliesPath = "images/smilies";
		if ($notRoot == "admin")
			$smiliesPath = "../images/smilies";
		$message = str_replace(':)', '<img src=\'' . $smiliesPath . '/smile.gif\' alt=\'smilie\' />', $message);
		$message = str_replace(':D', '<img src=\'' . $smiliesPath . '/laugh.gif\' alt=\'smilie\' />', $message);
		$message = str_replace(';)', '<img src=\'' . $smiliesPath . '/wink.gif\' alt=\'smilie\' />', $message);
		$message = str_replace(':conf:', '<img src=\'' . $smiliesPath . '/confused.gif\' alt=\'smilie\' />', $message);
		$message = str_replace(':eek:', '<img src=\'' . $smiliesPath . '/eek.gif\' alt=\'smilie\' />', $message);
		$message = str_replace(':mad:', '<img src=\'' . $smiliesPath . '/mad.gif\' alt=\'smilie\' />', $message);
		$message = str_replace(':tong:', '<img src=\'' . $smiliesPath . '/tongue.gif\' alt=\'smilie\' />', $message);
		$message = str_replace(':cool:', '<img src=\'' . $smiliesPath . '/cool.gif\' alt=\'smilie\' />', $message);
		$message = str_replace(':(', '<img src=\'' . $smiliesPath . '/sad.gif\' alt=\'smilie\' />', $message);
		$message = str_replace(':shy:', '<img src=\'' . $smiliesPath . '/shy.gif\' alt=\'smilie\' />', $message);
		$message = str_replace(':love:', '<img src=\'' . $smiliesPath . '/love.gif\' alt=\'smilie\' />', $message);
		$message = str_replace(':ssmile:', '<img src=\'' . $smiliesPath . '/sunsmile.gif\' alt=\'smilie\' />', $message);
		$message = str_replace(':cry:', '<img src=\'' . $smiliesPath . '/cry.gif\' alt=\'smilie\' />', $message);
		$message = str_replace(':sleep:', '<img src=\'' . $smiliesPath . '/sleep.gif\' alt=\'smilie\' />', $message);
		$message = str_replace(':angry:', '<img src=\'' . $smiliesPath . '/angry.gif\' alt=\'smilie\' />', $message);
		$message = str_replace(':music:', '<img src=\'' . $smiliesPath . '/music.gif\' alt=\'smilie\' />', $message);

		if ($smiliesReplacement != null) {
			foreach ($smiliesReplacement as $res)
				$message = str_replace($res['code'], '<img src="' . $res['path'] . '" alt="' . $res['name'] . '" />', $message);
		}
		
		return htmlspecialchars_decode($message, ENT_QUOTES);
	}
	
	static function getCensoredList() {
		global $con;
		global $dbTables;		
		$con->getRows("Select original, replacement from " . $dbTables['censored'] . ";");
		if ($con->getNumRows() > 0)
			return $con->queryResult;
	}

	static function getSmiliesReplacement() {
		global $con;
		global $dbTables;
		$con->getRows("Select name, code, path from " . $dbTables['smilies'] . ";");
		if ($con->getNumRows() > 0)
			return $con->queryResult;
	}
	
	static function textWrap($message) {
		$newText = '';
		$tmp = explode('>', $message);
		$sizeof = sizeof($tmp);
		for ($i=0; $i<$sizeof; ++$i) {
			$tmp2 = explode('<', $tmp[$i]);
			if (!empty($tmp2[0]))
				$newText .= preg_replace('#([^\n\r .]{25})#i', '\\1  ', $tmp2[0]);
			if (!empty($tmp2[1]))
				$newText .= '<' . $tmp2[1] . '>';   
		}
		return $newText;
	}
	
	static function isCensored($message) {
		global $con;
		global $dbTables;
		$censoredMsg = $message;
		
		$con->getRows("Select original, replacement from " . $dbTables['censored'] . ";");
		if ($con->getNumRows() > 0) {
			foreach ($con->queryResult as $res) {
				$censoredMsg = str_replace($res['original'], $res['replacement'], $censoredMsg);
			}
		}
		
		if ($censoredMsg != $message)
			return true;
		else
			return false;
	}

}

?>