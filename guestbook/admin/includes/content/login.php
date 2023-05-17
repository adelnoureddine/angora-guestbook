<?php
use guestbook\Error;
if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

echo '<noscript>';
$error = new Error($lang['javascriptNeeded']);
echo $error->showError() . '</noscript>';

function printLogin() {
	global $lang;
echo "
	<body onload=\"document.getElementById('username').focus()\">
	<br /><br />
	<div class=\"logo\">
		<img src=\"../images/logo/angora_medium.png\" alt=\"Angora logo\" />
	</div>
	<div class=\"login\">
		<form method=\"post\" action=\"index.php?a=login\">
			<fieldset>
				<table border=\"0\">
					<tr>
						<td>" . $lang['username'] . "</td>
						<td><input type=\"text\" name=\"username\" id=\"username\" autocomplete=\"off\" /></td>
					</tr>
				</table>
				<p>
					<input type=\"hidden\" name=\"hiddenField\" value=\"\" />
					<input type=\"hidden\" name=\"step\" value=\"user\" />
					<input type=\"hidden\" name=\"ip\" value=\"" . $_SERVER['REMOTE_ADDR'] . "\" />
					<input type=\"hidden\" name=\"useragent\" value=\"" . $_SERVER['HTTP_USER_AGENT'] . "\" />
					<input type=\"submit\" name=\"submit\" value=\"" . $lang['login'] . "\" />
				</p>
			</fieldset>
		</form>
	</div>
	
	<div class=\"forgotPass\"><a href=\"index.php?a=forgotPass\">" . $lang['forgotPass'] . "</a></div>";
}

$loginCheck['step'] = isset($_POST['step']) ? secureVar(trim($_POST['step']), 'html') : '';

switch ($loginCheck['step']) {
	case 'user' :
		$loginCheck['hidden'] = secureVar(trim($_POST['hiddenField']), 'html');
		$loginCheck['ip'] = secureVar(trim($_POST['ip']), 'html');
		$loginCheck['useragent'] = secureVar(trim($_POST['useragent']), 'html');
		$loginCheck['username'] = secureVar(trim($_POST['username']), 'html');

		if ($loginCheck['hidden'] != '') {
			$error = new Error("Humans only ! Go away WALL&#183;E");
			die($error->showError());
		}
		
		$errorField = '';
		
		if ($loginCheck['ip'] != $_SERVER['REMOTE_ADDR'])
			$errorField .= $lang['LIP'] . ' ' . $lang['nomatch'] . '<br />';
		
		if ($loginCheck['useragent'] != $_SERVER['HTTP_USER_AGENT'])
			$errorField .= $lang['lUserAgent'] . ' ' . $lang['nomatch'] . '<br />';
		
		if ($errorField != '') {
			echo "<div class=\"msgError\">$errorField</div>";
			printLogin();
		}
		else {
			$admin['username'] = base64_encode($loginCheck['username']);
			
			$errorField = '';
			if (($loginCheck['username'] == '') ||  empty($loginCheck['username']))
				$errorField .= $lang['username'] . ' ' . $lang['isEmpty'] . '<br />';
			
			if ($errorField != '') {
				echo "<div class=\"msgError\">$errorField</div>";
				printLogin();
			}
			else {
				$con->connect();
				$con->getRows("Select username, salt from " . $dbTables['admin'] . " where username='" . secureVar($admin['username'], 'sql') . "';");
				if ($con->getNumRows() <= 0) {
					echo '<div class="msgError">' . $loginCheck['username'] . ' ' . $lang['doesntExist'] . '</div>';
					printLogin();
					exit();
				}
	
				foreach ($con->queryResult as $res) {
					$_SESSION['salt'] = $res['salt'];
					$_SESSION['challenge'] = hash('sha1', uniqid(rand(), true));
					$_SESSION['username'] = $res['username'];
					break;
				}
				$con->close();
				
				/**
				 * Generate second login page
				 * */
				
				echo "
				<body onload=\"document.getElementById('unhashedPassword').focus()\">
				<script type=\"text/javascript\" src=\"../javascript/webtoolkit.sha256.js\"></script>
				<br /><br />
				<div class=\"logo\">
					<img src=\"../images/logo/angora_medium.png\" alt=\"Angora logo\" />
				</div>
				<div class=\"login\">
					<form method=\"post\" action=\"index.php?a=login\">
						<fieldset>
							<table border=\"0\">
								<tr>
									<td>" . $lang['password'] . "</td>
									<td><input type=\"password\" name=\"unhashedPassword\" id=\"unhashedPassword\" autocomplete=\"off\" onkeyup=\"this.form.password.value = SHA256(SHA256(this.form.unhashedPassword.value + '" . base64_decode($_SESSION['salt']) . "') + '" . $_SESSION['challenge'] . "')\" /></td>
								</tr>
							</table>
							<p>
								<input type=\"hidden\" name=\"hiddenField\" value=\"\" />
								<input type=\"hidden\" name=\"password\" value=\"\" />
								<input type=\"hidden\" name=\"step\" value=\"pass\" />
								<input type=\"hidden\" name=\"ip\" value=\"" . $_SERVER['REMOTE_ADDR'] . "\" />
								<input type=\"hidden\" name=\"useragent\" value=\"" . $_SERVER['HTTP_USER_AGENT'] . "\" />
								<input type=\"submit\" name=\"submit\" value=\"" . $lang['login'] . "\" />
							</p>
						</fieldset>
					</form>
				</div>
				
				<div class=\"forgotPass\"><a href=\"index.php?a=forgotPass\">" . $lang['forgotPass'] . "</a></div>";
			}
		}
		break;
	case 'pass' :
		$loginCheck['password'] = secureVar(trim($_POST['password']), 'html');;
		
		$errorField = '';
		if (($loginCheck['password'] == '') ||  empty($loginCheck['password']))
			$errorField .= $lang['password'] . ' ' . $lang['isEmpty'] . '<br />';
		
		if ($errorField != '') {
			echo "<div class=\"msgError\">$errorField</div>";
			printLogin();
		}
		else {
			$con->connect();
			$con->getRows("Select * from " . $dbTables['admin'] . " where username='" . secureVar($_SESSION['username'], 'sql') . "';");
			if ($con->getNumRows() <= 0) {
				echo '<div class="msgError">' . $loginCheck['username'] . ' ' . $lang['doesntExist'] . '</div>';
				printLogin();
				exit();
			}
			foreach ($con->queryResult as $res) {
				$salt = base64_decode($res['salt']);
				$admin['password'] = hash('sha256', $res['password'] . $_SESSION['challenge']);
				if ($admin['password'] == $loginCheck['password']) {
					$_SESSION['id'] = base64_encode($res['id']);
					$_SESSION['privilege'] = base64_encode($res['privilege']);
					$_SESSION['username'] = $res['username'];
					$_SESSION['iden'] = TRUE;
					$_SESSION['HTTP_USER_AGENT'] = hash('sha1', $_SERVER['HTTP_USER_AGENT']);
					$loginCheck['iden'] = true;
					unset($_SESSION['challenge']);
					unset($_SESSION['salt']);
					header("Location: ./index.php?a=start");
					break;
				}
				break;
			}
			$con->close();
			unset($_SESSION['challenge']);
			unset($_SESSION['salt']);
			
			echo '<div class="msgError">' . $lang['wrongPassword'] . '</div>';
			printLogin();
		}
		break;
	default : 
		printLogin();
}

?>
