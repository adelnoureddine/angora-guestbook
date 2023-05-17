<?php

/**
 ****************************************************
 * functions.php                                    *
 ****************************************************
 * Angora Guestbook                                 *
 ****************************************************
 * Software author :            Adel Noureddine     *
 * Copyright 2005 - 2009 by :   Adel Noureddine     *
 ****************************************************
 * The functions file                               *
 ****************************************************
 * */

/**
 * Function to activate gzip compression
 */
function startCompression() {
	if (extension_loaded('zlib') && ini_get('zlib.output_compression'))  {
		//  Nothing
	}
	else {
		ob_end_clean();
		if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip'))
			ob_start("ob_gzhandler");
		else
			ob_start();
	}
}

/**
 * Return a sanitized string
 *
 * @param $var the string to sanitize
 * @param $type 'html' if the string should be published, 'sql' if it should be send to a sql query
 * @return string a sanitized version of the $var string
 */

function secureVar($var, $type) {
	global $con;
	
	switch ($type) {
		case 'sql' :
				$var = $con->real_escape_string($var);
			break;
		case 'html' :
				$var = htmlspecialchars($var, ENT_QUOTES);
			break;
		default :
				$var = $con->real_escape_string($var);
	}
	return $var;
}

/**
 * Get microtime, used to debug
 */
function getTime() {
	$mtime = microtime();
    $mtime = explode(' ', $mtime);
    return (double) $mtime[0] + $mtime[1];
}

/**
 * Get IP of visitor
 *
 * @return IP or empty string if no IP detected
 */
function getIP() {
	$ip = '';
	if (getenv("HTTP_CLIENT_IP"))
		$ip = getenv("HTTP_CLIENT_IP");
	else if(getenv("HTTP_X_FORWARDED_FOR"))
		$ip = getenv("HTTP_X_FORWARDED_FOR");
	else if(getenv("REMOTE_ADDR"))
		$ip = getenv("REMOTE_ADDR");
	else
		$ip = '';
	return $ip;
}

?>
