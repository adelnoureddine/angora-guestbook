<?php

/**
 ****************************************************
 * email.class.php                                  *
 ****************************************************
 * Angora Guestbook                                 *
 ****************************************************
 * Software author :            Adel Noureddine     *
 * Copyright 2005 - 2009 by :   Adel Noureddine     *
 ****************************************************
 * The Email class file                             *
 ****************************************************
 * */

class Email {

	private $email;
	private $to;
	private $subject;
	private $from;
	private $message;
	private $format;
	private $headers;

	function __construct($email) {
		$this->email = $email;
	}

	function __destruct() {
		unset($this->email);
	}

	private function buildEmail($from, $to, $subject, $message, $format) {
		$this->from = $from;
		$this->to = $to;
		$this->subject = $subject;
		$this->message = $message;
		if ($format == "text")
			$this->format = "Content-type: text/html\r\n";
		else // Nothing for now... but will be useful when HTML format is added
			$this->format = "Content-type: text/html\r\n";

		$this->headers = "From: " . $this->from . "\r\n"
		. "From: " . $this->from
		. "Reply-To: " . $this->from . "\r\n";
	}

	function sendEmail($from, $to, $subject, $message, $format) {
		$this->buildEmail($from, $to, $subject, $message, $format);
		@mail($this->to, $this->subject, $this->message, $this->headers);
	}

	function checkMail() {
		$result = false;

		if(preg_match('/^.+\@(\[?)[a-zA-Z0-9\-\.]+\.([a-zA-Z]{2,6}|[0-9]{2,4})(\]?)$/',$this->email)) {
			[$user_name, $mail_domain] = explode("@", $this->email);
			if (preg_match('/win/i', PHP_OS)) {
				$disabled_functions = explode(',', str_replace(' ', '', ini_get('disable_functions')));
				if (!in_array('exec', $disabled_functions))
					$result = $this->checkDNS("$mail_domain");
				else
					$result = true;
			}
			else
				$result = checkdnsrr("$mail_domain","MX");
		}
		else
			$result = false;
		return $result;
	}

	private function checkDNS($hostName) {
		if(!empty($hostName)) {
			$recType = "MX";
			exec("nslookup -type=$recType " . escapeshellcmd($hostName), $result);
			foreach ($result as $line) {
				if(preg_match("/^$hostName/i", $line)) {
					return true;
				}
			}
			return false;
		}
		else
			return false;
	}

}

?>
