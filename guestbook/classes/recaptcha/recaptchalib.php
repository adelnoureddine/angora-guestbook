<?php

/*
 * https://gist.github.com/gene1wood/e56fa1604c4a3eaafe214ed600bae6c1
 * This is a PHP library that handles calling reCAPTCHA v2.
 * This library is backwards compatible with the old reCAPTCH v1 recaptchalib.php
 * by surfacing the recaptcha_check_answer and recaptcha_get_html functions.
 * https://storage.googleapis.com/google-code-archive-downloads/v2/code.google.com/recaptcha/recaptcha-php-1.11.zip
 */

/**
* Gets the challenge HTML (javascript and non-javascript version).
* This is called from the browser, and the resulting reCAPTCHA HTML widget
* is embedded within the HTML form it was called from.
* @param string $pubkey A public key for reCAPTCHA
* @param string $error The error given by reCAPTCHA (optional, default is null)
* @param boolean $use_ssl Should the request be made over ssl? (optional, default is false)

* @return string - The HTML to be embedded in the user's form.
*/
function recaptcha_get_html ($pubkey, $error = null, $use_ssl = false)
{
	return '<script src=\'https://www.google.com/recaptcha/api.js\'></script><div class="g-recaptcha" data-sitekey="'. $pubkey .'"></div>';
}

/**
 * Calls an HTTP POST function to verify if the user's guess was correct
 * @param string $privkey
 * @param string $remoteip
 * @param string $challenge
 * @param string $response
 * @param array $extra_params an array of extra variables to post to the server
 * @return ReCaptchaResponse
 */
function recaptcha_check_answer ($privkey, $remoteip = null, $challenge = null, $response = null, $extra_params = null)
{
	if ($privkey == null || $privkey == '') {
		die ("To use reCAPTCHA you must get an API key from <a href='https://www.google.com/recaptcha/admin/create'>https://www.google.com/recaptcha/admin/create</a>");
	}
	$recaptcha_response = new ReCaptchaResponse();

	if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])):

		$grResponse = $_POST['g-recaptcha-response'];
		// Verify with Google Servers
		$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$privkey.'&response='.$grResponse);
		$responseData = json_decode($verifyResponse);
		if($responseData->success):
			$recaptcha_response->is_valid = true;
		else:
			$recaptcha_response->is_valid = false;
			$recaptcha_response->error = $responseData["error-codes"][0];
		endif;
	else:
		$recaptcha_response->is_valid = false;
		$recaptcha_response->error = 'missing-g-recaptcha-response';
		return $recaptcha_response;
	endif;
	return $recaptcha_response;
}

/**
 * A ReCaptchaResponse is returned from recaptcha_check_answer()
 */
class ReCaptchaResponse {
	var $is_valid;
	var $error;
}
?>
