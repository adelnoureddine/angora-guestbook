<?php
use guestbook\Error;
if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

	echo '<div class="mainTitle">' . $lang['banIP'] . '</div>';
	echo '<div class="helpPopup ' . $alignHelp . '"><a href="#" onclick="openHelp(\'banIP\');">' . $lang['help'] . '</a></div>';
	
	$submitId = isset($_POST['submit']) ? secureVar($_POST['submit'], 'html') : '';
	
	if ((! empty($submitId)) && isset($submitId)) {
		$banCheck['ipnumber'] = secureVar(trim($_POST['ipnumber']), 'html');
		$banCheck['hidden'] = secureVar(trim($_POST['hiddenField']), 'html');
		$banCheck['banType'] = secureVar(trim($_POST['banType']), 'html');
		
		if ($banCheck['hidden'] != '') {
			$error = new Error("Humans only ! Go away WALL&#183;E");
			die($error->showError());
		}
		
		$errorField = '';
		if (($banCheck['ipnumber'] == '') ||  empty($banCheck['ipnumber']))
			$errorField .= $lang['ipnumber'] . ' ' . $lang['isEmpty'] . '<br />';
		
		if ($errorField != '') {
			echo "<div class=\"msgError\">$errorField</div>";
		}
		else {
			if ($banCheck['banType'] == 'add') {
				$con->connect();
				
				$queryBannedIP = "Select ip from " . $dbTables['ip'] . ";";
				$con->getRows($queryBannedIP);
				if ($con->getNumRows() > 0) {
					foreach ($con->queryResult as $res) {
						$bannedIPs[] = $res['ip'];
					}
				}
				
				if (empty($bannedIPs) || !in_array($banCheck['ipnumber'], $bannedIPs)) {
					// Add IP to ban table
					$queryMsg = "INSERT INTO " . $dbTables['ip'] . " (id, ip) VALUES (NULL, '" . secureVar($banCheck['ipnumber'], 'sql') . "');";
					if ($con->modify($queryMsg))
						echo "<div class=\"msgSuccess\">" . $lang['changeSuccess'] . "</div>";
					else {
						$con->printError();
						echo "<div class=\"msgError\">" . $lang['dataError'] . "</div>";
					}
				}
				else
					echo "<div class=\"msgError\">" . $banCheck['ipnumber'] . ' ' . $lang['ipBanned'] . "</div>";
				
				$con->close();
			}
			elseif ($banCheck['banType'] == 'remove') {
				$con->connect();
				$queryMsg = "DELETE FROM " . $dbTables['ip'] . " WHERE ip='" . secureVar($banCheck['ipnumber'], 'sql') . "';";
				if ($con->modify($queryMsg))
					echo "<div class=\"msgSuccess\">" . $lang['changeSuccess'] . "</div>";
				else {
					$con->printError();
					echo "<div class=\"msgError\">" . $lang['dataError'] . "</div>";
				}
				$con->close();
			}
		}
	}
	
	
	echo "
	<form method=\"post\" action=\"index.php?a=banIP\">
		<fieldset>
			<p>" . $lang['ipnumber'] . " : <input type=\"text\" name=\"ipnumber\" />
				<input type=\"hidden\" name=\"hiddenField\" value=\"\" />
				<input type=\"hidden\" name=\"banType\" value=\"add\" />
				<input type=\"submit\" name=\"submit\" value=\"" . $lang['ban'] . "\" />
			</p>
		</fieldset>
	</form>";
	
	$con->connect();
	$queryMsg = "select ip from " . $dbTables['ip'] . ";";
	$con->getRows($queryMsg);
	if ($con->getNumRows() > 0) {
		echo "
		<form method=\"post\" action=\"index.php?a=banIP\">
			<fieldset>
				<p>" . $lang['ipnumber'] . " : <select name=\"ipnumber\">";
				foreach ($con->queryResult as $res) {
					echo '<option value="' . $res['ip'] . '">' . $res['ip'] . '</option>';
				}
				echo "</select>
					<input type=\"hidden\" name=\"hiddenField\" value=\"\" />
					<input type=\"hidden\" name=\"banType\" value=\"remove\" />
					<input type=\"submit\" name=\"submit\" value=\"" . $lang['unban'] . "\" />
				</p>
			</fieldset>
		</form>";
	}
	$con->close();

?>
