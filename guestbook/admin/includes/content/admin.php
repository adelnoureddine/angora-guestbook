<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");
	
	if (base64_decode($_SESSION['privilege']) != 1) {
		$error = new Error($lang['noPermission']);
		die($error->showError());
	}
	
	echo '<div class="mainTitle">' . $lang['addAdmins'] . '</div>';
	echo '<div class="helpPopup ' . $alignHelp . '"><a href="#" onclick="openHelp(\'admin\');">' . $lang['help'] . '</a></div>';
	
	$submitId = secureVar($_POST['submit'], 'html');
	
	if ((! empty($submitId)) && isset($submitId)) {		
		$adminCheck['hidden'] = secureVar(trim($_POST['hiddenField']), 'html');
		$adminCheck['adminType'] = secureVar(trim($_POST['adminType']), 'html');
		
		if (($adminCheck['hidden'] != '') || ($adminCheck['adminType'] == '') ||  empty($adminCheck['adminType'])) {
			$error = new Error("Humans only ! Go away WALL&#183;E");
			die($error->showError());
		}
		
		if ($adminCheck['adminType'] == 'addNewAdmin') {
			$adminCheck['superAdminPassword'] = secureVar(trim($_POST['superAdminPassword']), 'html');
			$adminCheck['newPassword'] = secureVar(trim($_POST['newPassword']), 'html');
			$adminCheck['confirmNewPassword'] = secureVar(trim($_POST['confirmNewPassword']), 'html');
			$adminCheck['adminName'] = secureVar(trim($_POST['adminName']), 'html');
			
			$errorField = '';
			if (($adminCheck['adminName'] == '') ||  empty($adminCheck['adminName']))
				$errorField .= $lang['adminName'] . ' ' . $lang['isEmpty'] . '<br />';
			
			if (($adminCheck['superAdminPassword'] == '') ||  empty($adminCheck['superAdminPassword']))
				$errorField .= $lang['superAdminPassword'] . ' ' . $lang['isEmpty'] . '<br />';
			
			if (($adminCheck['newPassword'] == '') ||  empty($adminCheck['newPassword']))
				$errorField .= $lang['newPassword'] . ' ' . $lang['isEmpty'] . '<br />';
			
			if (($adminCheck['confirmNewPassword'] == '') ||  empty($adminCheck['confirmNewPassword']))
				$errorField .= $lang['confirmNewPassword'] . ' ' . $lang['isEmpty'] . '<br />';
			
			if ($adminCheck['newPassword'] != $adminCheck['confirmNewPassword'])
				$errorField .= $lang['newPassMatch'] . '<br />';
			
			$superPassCheck = false;
			$con->connect();
			$con->getRows("Select password, salt from " . $dbTables['admin'] . " where privilege='1';");
	
			foreach ($con->queryResult as $res) {
				$salt = base64_decode($res['salt']);
				$admin['password'] = hash('sha256', $adminCheck['superAdminPassword'] . $salt);
				if (($admin['password'] == $res['password'])) {
					$superPassCheck = true;
					break;
				}
				break;
			}
			
			$con->close();
			
			if (! $superPassCheck)
				$errorField .= $lang['superPassError'] . '<br />';
			
			if ($errorField != '') {
				echo "<div class=\"msgError\">$errorField</div>";
			}
			else {
				$newSalt = substr(hash('sha1', uniqid(rand(), true)), 0, 5);
				$newPassword = hash('sha256', $adminCheck['newPassword'] . $newSalt);
				$saveSalt = base64_encode($newSalt);
				$adminName = base64_encode($adminCheck['adminName']);
				
				$con->connect();
				$queryMsg = "INSERT INTO " . $dbTables['admin'] . " (id, username, password, salt, privilege) VALUES 
				(NULL, '" . secureVar($adminName, 'sql') . "', '" . secureVar($newPassword, 'sql') . "', '" . secureVar($saveSalt, 'sql') . "', '0')";
				if ($con->modify($queryMsg))
					echo "<div class=\"msgSuccess\">" . $lang['changeSuccess'] . "</div>";
				else {
					$con->printError();
					echo "<div class=\"msgError\">" . $lang['dataError'] . "</div>";
				}
				$con->close();
			}
		}
		elseif ($adminCheck['adminType'] == 'modifyAdmin') {
			$adminCheck['adminID'] = secureVar(trim($_POST['adminID']), 'html');
			$adminID = base64_decode($adminCheck['adminID']);
			$adminCheck['superAdminPassword'] = secureVar(trim($_POST['superAdminPassword']), 'html');
			
			
			$errorField = '';				
			if (($adminCheck['superAdminPassword'] == '') ||  empty($adminCheck['superAdminPassword']))
				$errorField .= $lang['superAdminPassword'] . ' ' . $lang['isEmpty'] . '<br />';
			else {
				$superPassCheck = false;
				$con->connect();
				$con->getRows("Select password, salt from " . $dbTables['admin'] . " where privilege='1';");
		
				foreach ($con->queryResult as $res) {
					$salt = base64_decode($res['salt']);
					$admin['password'] = hash('sha256', $adminCheck['superAdminPassword'] . $salt);
					if (($admin['password'] == $res['password'])) {
						$superPassCheck = true;
						break;
					}
					break;
				}
				
				$con->close();
				
				if (! $superPassCheck)
					$errorField .= $lang['superPassError'] . '<br />';
			}
			
			if ($errorField != '') {
				echo "<div class=\"msgError\">$errorField</div>";
			}
			else {			
				if ($submitId == $lang['remove']) {
					$con->connect();
					$queryMsg = "DELETE FROM " . $dbTables['admin'] . " WHERE id='" . secureVar($adminID, 'sql') . "';";
					if ($con->modify($queryMsg))
						echo "<div class=\"msgSuccess\">" . $lang['changeSuccess'] . "</div>";
					else {
						$con->printError();
						echo "<div class=\"msgError\">" . $lang['dataError'] . "</div>";
					}
					$con->close();
				}
				elseif ($submitId == $lang['modify']) {
					$adminCheck['newPassword'] = secureVar(trim($_POST['newPassword']), 'html');
					$adminCheck['confirmNewPassword'] = secureVar(trim($_POST['confirmNewPassword']), 'html');
					
					$errorField = '';					
					if (($adminCheck['newPassword'] == '') ||  empty($adminCheck['newPassword']))
						$errorField .= $lang['newPassword'] . ' ' . $lang['isEmpty'] . '<br />';
					
					if (($adminCheck['confirmNewPassword'] == '') ||  empty($adminCheck['confirmNewPassword']))
						$errorField .= $lang['confirmNewPassword'] . ' ' . $lang['isEmpty'] . '<br />';
					
					if ($adminCheck['newPassword'] != $adminCheck['confirmNewPassword'])
						$errorField .= $lang['newPassMatch'] . '<br />';
					
					if ($errorField != '') {
						echo "<div class=\"msgError\">$errorField</div>";
					}
					else {
						$newSalt = substr(hash('sha1', uniqid(rand(), true)), 0, 5);
						$newPassword = hash('sha256', $adminCheck['newPassword'] . $newSalt);
						$saveSalt = base64_encode($newSalt);					
						$con->connect();
						$queryMsg = "update " . $dbTables['admin'] . " set password='" . secureVar($newPassword, 'sql') . "', salt='" . secureVar($saveSalt, 'sql') . "' where id='" . secureVar($adminID, 'sql') . "';";
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
		}
	}
	
	echo '<span class="titleMsg">' . $lang['addAdmin'] . '</span>';
	
	echo "
	<form method=\"post\" action=\"index.php?a=admin\">
		<fieldset>
			<table border=\"0\">
				<tr>
					<td>" . $lang['adminName'] . "</td>
					<td><input type=\"text\" name=\"adminName\" /></td>
				</tr>
				<tr>
					<td>" . $lang['newPassword'] . "</td>
					<td><input type=\"password\" name=\"newPassword\" /></td>
				</tr>
				<tr>
					<td>" . $lang['confirmNewPassword'] . "</td>
					<td><input type=\"password\" name=\"confirmNewPassword\" /></td>
				</tr>
				<tr>
					<td>" . $lang['superAdminPassword'] . "</td>
					<td><input type=\"password\" name=\"superAdminPassword\" /></td>
				</tr>
			</table>
			<p>
				<input type=\"hidden\" name=\"hiddenField\" value=\"\" />
				<input type=\"hidden\" name=\"adminType\" value=\"addNewAdmin\" />
				<input type=\"submit\" name=\"submit\" value=\"" . $lang['add'] . "\" />
			</p>
		</fieldset>
	</form>";
	
	echo '<span class="titleMsg">' . $lang['modifyAdmins'] . '</span>';
	
	$queryMsg = "select id, username, privilege from " . $dbTables['admin'] . ";";
	$con->connect();
	$con->getRows($queryMsg);
	if ($con->getNumRows() > 0) {
		echo '<br />';
		foreach ($con->queryResult as $res) {
			if ($res['privilege'] != 1) {
				echo "
				<form method=\"post\" action=\"index.php?a=admin\">
					<fieldset>
						<table class='borderTable'>
							<tr>
								<td colspan='2' class='tableTitle'>" . base64_decode($res['username']) . "</td>
							</tr>
							<tr>
								<td>" . $lang['newPassword'] . "</td>
								<td><input type=\"password\" name=\"newPassword\" /></td>
							</tr>
							<tr>
								<td>" . $lang['confirmNewPassword'] . "</td>
								<td><input type=\"password\" name=\"confirmNewPassword\" /></td>
							</tr>
							<tr>
								<td>" . $lang['superAdminPassword'] . "</td>
								<td><input type=\"password\" name=\"superAdminPassword\" /></td>
							</tr>
							<tr>
								<td colspan='2'>
									<input type=\"hidden\" name=\"hiddenField\" value=\"\" />
									<input type=\"hidden\" name=\"adminType\" value=\"modifyAdmin\" />
									<input type=\"hidden\" name=\"adminID\" value=\"" . base64_encode($res['id']) ."\" />
									<input type=\"submit\" name=\"submit\" value=\"" . $lang['modify'] . "\" />
									<input type=\"submit\" name=\"submit\" value=\"" . $lang['remove'] . "\" />
								</td>
							</tr>
						</table>
					</fieldset>
				</form>";
			}
			elseif ($res['privilege'] == 1)
				echo "<span class='adminTitle'>" . base64_decode($res['username']) . "</span> - " . $lang['superAdmin'];
		}
	}
	$con->close();

?>