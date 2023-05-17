<?php
use guestbook\Error;
if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");
	
	echo '<div class="mainTitle">' . $lang['backupRestore'] . ' ' . $lang['database'] . '</div>';
	echo '<div class="helpPopup ' . $alignHelp . '"><a href="#" onclick="openHelp(\'backup\');">' . $lang['help'] . '</a></div>';
	
	$actionId = isset($_GET['action']) ? secureVar($_GET['action'], 'html') : '';
	
	if ((! empty($actionId)) && isset($actionId)) {
		if ($actionId == "clear") {
			$con->connect();
			$queryMsg = "truncate table " . $dbTables['backupLog'] . ";";
			$con->modify($queryMsg);
			$con->close();
		}
	}
	
	$submitId = isset($_POST['submit']) ? secureVar($_POST['submit'], 'html') : '';
	
	if ((! empty($submitId)) && isset($submitId)) {
		$backupType['hidden'] = secureVar(trim($_POST['hiddenField']), 'html');
		$backupType['backupType'] = secureVar(trim($_POST['backupType']), 'html');
		
		if ($backupType['hidden'] != '') {
			$error = new Error("Humans only ! Go away WALL&#183;E");
			die($error->showError());
		}

		if ($backupType['backupType'] == 'restore') {
			if (base64_decode($_SESSION['privilege']) == 1) {
				$errorField = '';
				$uploadedFilePost = @$_FILES['uploadField']['name'];
				if (isset($uploadedFilePost) && !empty($uploadedFilePost)) {
					$uploadedFile = $config['backupFolder'] . '/' . basename($_FILES['uploadField']['name']);
					
					if (@move_uploaded_file($_FILES['uploadField']['tmp_name'], $uploadedFile)) {
						include_once '../classes/database/mysql_dump.inc.php';
						$mysql_dump = new MYSQL_DUMP(base64_decode($data['dbHost']), base64_decode($data['dbUsername']), base64_decode($data['dbPassword']));
						$con->connect();
						if ($mysql_dump->restoreDB($uploadedFile)) {
							@unlink($uploadedFile);
							$queryMsg = "insert into " . $dbTables['backupLog'] . " (id, date, operation) values (NULL, '" . secureVar(time(), 'sql') . "', '" . secureVar('r', 'sql') . "');";
							$con->modify($queryMsg);
							echo "<div class=\"msgSuccess\">" . $lang['changeSuccess'] . "</div>";
						}
						else
							echo "<div class=\"msgError\">" . $lang['dataError'] . "</div>";
						$con->close();
					}
					else
						$errorField .= $lang['permissionsError'] . '<br />';
				}
				else
					$errorField .= $lang['sqlFile'] . ' ' . $lang['isEmpty'] . '<br />';
				
				if ($errorField != '') {
					echo "<div class=\"msgError\">$errorField</div>";
				}
			}
		}
	}

	echo "<noscript>" . $lang['javascriptEnabled'] . "<br /></noscript>";

	echo '<span class="titleMsg">' . $lang['backupDatabase'] . '</span>';
	echo '<div class="startBox">';
	echo "<a href='#' onclick=\"window.open ('includes/content/doBackup.php', 'Backup', config='height=200, width=200, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, directories=no, status=no');\">" . $lang['backupDatabase'] . "</a>";
	echo '</div>';
	
	if (base64_decode($_SESSION['privilege']) == 1) {
		echo '<span class="titleMsg">' . $lang['restoreDatabase'] . '</span>';
		echo "<form method=\"post\" action=\"index.php?a=backup\" enctype='multipart/form-data'>
			<fieldset>
				<div class='startBox'> " . $lang['sqlFile'] . " : 
					<input type=\"file\" name=\"uploadField\" />
					<input type=\"hidden\" name=\"hiddenField\" value=\"\" />
					<input type=\"hidden\" name=\"backupType\" value=\"restore\" />
					<input type=\"submit\" name=\"submit\" value=\"" . $lang['restore'] . "\" />
				</div>
			</fieldset>
		</form>";
	}
	
	$con->connect();
	$queryMsg = "select date, operation from " . $dbTables['backupLog'] . " order by date desc;";
	$con->getRows($queryMsg);
	if ($con->getNumRows() > 0) {
		echo '<span class="titleMsg">' . $lang['bLog'] . '</span>';
		echo '<table border="0">
			<tr class="topInfosActions">
				<td>' . $lang['bDate'] . '</td>
				<td>' . $lang['bOperation'] . '</td>
			</tr>';
		foreach ($con->queryResult as $res) {
			echo "<tr class=\"topInfos\">
				<td>" . date($config['dateFormat'], secureVar($res['date'], 'html')) . "</td>
				<td>";
				if ($res['operation'] == "b")
					echo $lang['backupDatabase'];
				elseif ($res['operation'] == "r")
					echo $lang['restoreDatabase'];
				else
					echo $lang['unkownOperation'];
			echo"</td></tr>";
		}
		echo '<tr><td colspan="2" align="right"><a href="index.php?a=backup&action=clear">' . $lang['bClear'] . '</a></td></tr>
		</table>';
	}
	$con->close();

?>
