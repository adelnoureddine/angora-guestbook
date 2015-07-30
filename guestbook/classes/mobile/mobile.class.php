<?php

/**
 ****************************************************
 * mobile.class.php                                 *
 ****************************************************
 * Angora Guestbook                                 *
 ****************************************************
 * Software author :            Adel Noureddine     *
 * Copyright 2005 - 2009 by :   Adel Noureddine     *
 ****************************************************
 * The mobile class file                            *
 ****************************************************
 * */

class Mobile {

	static function isMobile($agent) {
		$result = false;
		
		if (preg_match('/(iphone|ipod|android|symbian|smartphone|midp|wap|blackberry|opera mini|pocket|kindle|mobile|mobi|pda|psp|treo|webos)/i', $agent))
			$result = true;
		
		return $result;
	}
}

?>