<?php
use guestbook\Error;
if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");
	
	echo '<div class="mainTitle">' . $lang['changePass'] . '</div>';
	echo '<div class="helpPopup ' . $alignHelp . '"><a href="#" onclick="openHelp(\'changePass\');">' . $lang['help'] . '</a></div>';
	
	$submitId = isset($_POST['submit']) ? secureVar($_POST['submit'], 'html') : '';
	
	if ((! empty($submitId)) && isset($submitId)) {
		$passCheck['oldPassword'] = secureVar(trim($_POST['oldPassword']), 'html');
		$passCheck['newPassword'] = secureVar(trim($_POST['newPassword']), 'html');
		$passCheck['confirmNewPassword'] = secureVar(trim($_POST['confirmNewPassword']), 'html');
		$passCheck['hidden'] = secureVar(trim($_POST['hiddenField']), 'html');
		
		if ($passCheck['hidden'] != '') {
			$error = new Error("Humans only ! Go away WALL&#183;E");
			die($error->showError());
		}
		
		$errorField = '';
		if (($passCheck['oldPassword'] == '') ||  empty($passCheck['oldPassword']))
			$errorField .= $lang['oldPassword'] . ' ' . $lang['isEmpty'] . '<br />';
		
		if (($passCheck['newPassword'] == '') ||  empty($passCheck['newPassword']))
			$errorField .= $lang['newPassword'] . ' ' . $lang['isEmpty'] . '<br />';
		
		if (($passCheck['confirmNewPassword'] == '') ||  empty($passCheck['confirmNewPassword']))
			$errorField .= $lang['confirmNewPassword'] . ' ' . $lang['isEmpty'] . '<br />';
		
		if ($passCheck['newPassword'] != $passCheck['confirmNewPassword'])
			$errorField .= $lang['newPassMatch'] . '<br />';
		
		if ($errorField != '') {
			echo "<div class=\"msgError\">$errorField</div>";
		}
		else {
			$passCheck['newPassword'] = $passCheck['newPassword'];
			$passCheck['oldPassword'] = $passCheck['oldPassword'];
			$con->connect();
			$con->getRows("Select password, salt from " . $dbTables['admin'] . " where id='" . secureVar(base64_decode($_SESSION['id']), 'sql') . "';");
	
			foreach ($con->queryResult as $res) {
				if (hash('sha256', $passCheck['oldPassword'] . base64_decode($res['salt'])) == $res['password']) {
					$newSalt = substr(hash('sha1', uniqid(rand(), true)), 0, 5);
					$newPassword = hash('sha256', $passCheck['newPassword'] . $newSalt);
					$saveSalt = base64_encode($newSalt);
					$queryMsg = "update " . $dbTables['admin'] . " set password='" . secureVar($newPassword, 'sql') . "', salt='" . secureVar($saveSalt, 'sql') . "' where id='" . secureVar(base64_decode($_SESSION['id']), 'sql') . "';";
					if ($con->modify($queryMsg))
						echo "<div class=\"msgSuccess\">" . $lang['changeSuccess'] . "</div>";
					else {
						$con->printError();
						echo "<div class=\"msgError\">" . $lang['dataError'] . "</div>";
					}
				}
				else
					echo "<div class=\"msgError\">" . $lang['wrongOldPass'] . "</div>";
				break;
			}
			
			$con->close();
		}
	}
	
	echo "
	<form method=\"post\" action=\"index.php?a=changePass\">
		<fieldset>
			<table border=\"0\">
				<tr>
					<td>" . $lang['oldPassword'] . "</td>
					<td><input type=\"password\" name=\"oldPassword\" /></td>
				</tr>
				<tr>
					<td>" . $lang['newPassword'] . "</td>
					<td><input type=\"password\" name=\"newPassword\" /></td>
				</tr>
				<tr>
					<td>" . $lang['confirmNewPassword'] . "</td>
					<td><input type=\"password\" name=\"confirmNewPassword\" /></td>
				</tr>
			</table>
			<p>
				<input type=\"hidden\" name=\"hiddenField\" value=\"\" />
				<input type=\"submit\" name=\"submit\" value=\"" . $lang['change'] . "\" />
			</p>
		</fieldset>
	</form>";

?>
