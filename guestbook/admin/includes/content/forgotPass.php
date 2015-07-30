<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

$submitId = secureVar($_POST['submit'], 'html');
	
if ((! empty($submitId)) && isset($submitId)) {
	$forgotPassCheck['email'] = secureVar(trim($_POST['emailField']), 'html');
	$forgotPassCheck['hidden'] = secureVar(trim($_POST['hiddenField']), 'html');
	
	if ($forgotPassCheck['hidden'] != '') {
		$error = new Error("Humans only ! Go away WALL&#183;E");
		die($error->showError());
	}
	
	$errorField = '';
	if (($forgotPassCheck['email'] == '') ||  empty($forgotPassCheck['email']))
		$errorField .= $lang['emailChangePass'] . ' ' . $lang['isEmpty'] . '<br />';
	
	if ($forgotPassCheck['email'] != base64_decode($config['email']))
		$errorField .= $lang['emailChangePass'] . ' ' . $lang['isIncorrect'] . '<br />';
	
	if ($errorField != '') {
		echo "<div class=\"msgError\">$errorField</div>";
	}
	else {
		$con->connect();
		$newSalt = substr(hash('sha1', uniqid(rand(), true)), 0, 5);
		$newRandomPassword = substr(hash('sha1', uniqid(rand(), true)), 0, 8);
		$newPassword = hash('sha256', $newRandomPassword . $newSalt);
		$saveSalt = base64_encode($newSalt);
		$queryMsg = "update " . $dbTables['admin'] . " set password='" . secureVar($newPassword, 'sql') . "', salt='" . secureVar($saveSalt, 'sql') . "' where privilege='1';";
		if ($con->modify($queryMsg)) {
			// Send email with the new password
			include_once '../classes/email/email.class.php';
			$senderEmail = base64_decode($config['email']);
			$sendEmail = new Email($senderEmail);
			$sendEmail->sendEmail($senderEmail, $senderEmail, $lang['forgotPassSubject'], $lang['forgotPassText'] . $newRandomPassword, "text");
			
			echo "<div class=\"msgSuccess\">" . $lang['changeSuccess'] . "</div>";
		}
		else {
			$con->printError();
			echo "<div class=\"msgError\">" . $lang['dataError'] . "</div>";
		}
		$con->close();
	}
}
		

echo "<script type=\"text/javascript\">
		function toggle(obj) {
			var el = document.getElementById(obj);
			
			if ( el.style.display != 'none' )
				el.style.display = 'none';
			else
				el.style.display = '';
		}
	</script>";

echo '<div class="centerText">';

echo '<a href="javascript:toggle(\'normalAdmin\')">' . $lang['normalAdmin'] . '</a>
	<div id="normalAdmin" class="forgotPassText">' . $lang['normalAdminText'] . '</div>';

echo '<br /><br />
	<a href="javascript:toggle(\'superAdmin\')">' . $lang['superAdmin'] . '</a>
	<div id="superAdmin" class="forgotPassText">' . $lang['superAdminText'] . '
	<form action="index.php?a=forgotPass" method="post">
		<fieldset>
			' . $lang['emailChangePass'] . ' : <input type="text" name="emailField" value="" />
			<input type="hidden" name="hiddenField" value="" />
			<input type="submit" name="submit" value="' . $lang['getNewPass'] . '" />
		</fieldset>
	</form>
	</div>';

echo '</div>';

?>