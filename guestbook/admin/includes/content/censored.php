<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");
	
	echo '<div class="mainTitle">' . $lang['censored'] . '</div>';
	echo '<div class="helpPopup ' . $alignHelp . '"><a href="#" onclick="openHelp(\'censored\');">' . $lang['help'] . '</a></div>';
	
	$submitId = secureVar($_POST['submit'], 'html');
	
	if ((! empty($submitId)) && isset($submitId)) {		
		$censoredCheck['hidden'] = secureVar(trim($_POST['hiddenField']), 'html');
		$censoredCheck['censoredType'] = secureVar(trim($_POST['censoredType']), 'html');
	
		if (($censoredCheck['hidden'] != '') || ($censoredCheck['censoredType'] == '') ||  empty($censoredCheck['censoredType'])) {
			$error = new Error("Humans only ! Go away WALL&#183;E");
			die($error->showError());
		}
		
		if ($censoredCheck['censoredType'] == 'addCensored') {
			$censoredCheck['censoredOriginal'] = secureVar(trim($_POST['censoredOriginal']), 'html');
			$censoredCheck['censoredReplacement'] = secureVar(trim($_POST['censoredReplacement']), 'html');
			
			$errorField = '';
			if (($censoredCheck['censoredOriginal'] == '') ||  empty($censoredCheck['censoredOriginal']))
				$errorField .= $lang['censoredOriginal'] . ' ' . $lang['isEmpty'] . '<br />';
			
			if (($censoredCheck['censoredReplacement'] == '') ||  empty($censoredCheck['censoredReplacement']))
				$errorField .= $lang['censoredReplacement'] . ' ' . $lang['isEmpty'] . '<br />';
			
			if ($errorField != '') {
				echo "<div class=\"msgError\">$errorField</div>";
			}
			else {		
				$con->connect();
				$queryMsg = "INSERT INTO " . $dbTables['censored'] . " (id, original, replacement) VALUES 
				(NULL, '" . secureVar($censoredCheck['censoredOriginal'], 'sql') . "', '" . secureVar($censoredCheck['censoredReplacement'], 'sql') . "')";
				if ($con->modify($queryMsg))
					echo "<div class=\"msgSuccess\">" . $lang['changeSuccess'] . "</div>";
				else {
					$con->printError();
					echo "<div class=\"msgError\">" . $lang['dataError'] . "</div>";
				}
				$con->close();
			}
		}
		elseif ($censoredCheck['censoredType'] == 'modifyCensored') {			
			$censoredCheck['censoredID'] = secureVar(trim($_POST['censoredID']), 'html');
			$censoredID = base64_decode($censoredCheck['censoredID']);
			if ($submitId == $lang['remove']) {
				$con->connect();
				$queryMsg = "DELETE FROM " . $dbTables['censored'] . " WHERE id='" . secureVar($censoredID, 'sql') . "';";
				if ($con->modify($queryMsg))
					echo "<div class=\"msgSuccess\">" . $lang['changeSuccess'] . "</div>";
				else {
					$con->printError();
					echo "<div class=\"msgError\">" . $lang['dataError'] . "</div>";
				}
				$con->close();
			}
			elseif ($submitId == $lang['modify']) {
				$censoredCheck['censoredOriginal'] = secureVar(trim($_POST['censoredOriginal']), 'html');
				$censoredCheck['censoredReplacement'] = secureVar(trim($_POST['censoredReplacement']), 'html');
				
				$errorField = '';
				if (($censoredCheck['censoredOriginal'] == '') ||  empty($censoredCheck['censoredOriginal']))
					$errorField .= $lang['censoredOriginal'] . ' ' . $lang['isEmpty'] . '<br />';
				
				if (($censoredCheck['censoredReplacement'] == '') ||  empty($censoredCheck['censoredReplacement']))
					$errorField .= $lang['censoredReplacement'] . ' ' . $lang['isEmpty'] . '<br />';
				
				if ($errorField != '') {
					echo "<div class=\"msgError\">$errorField</div>";
				}
				else {		
					$con->connect();
					$queryMsg = "update " . $dbTables['censored'] . " set original='" . secureVar($censoredCheck['censoredOriginal'], 'sql') . "', replacement='" . secureVar($censoredCheck['censoredReplacement'], 'sql') . "' where id='" . secureVar($censoredID, 'sql') . "';";
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
	
	echo '<span class="titleMsg">' . $lang['addCensored'] . '</span>';
	
	echo "
	<form method=\"post\" action=\"index.php?a=censored\">
		<fieldset>
			<table border=\"0\">
				<tr>
					<td>" . $lang['censoredOriginal'] . "</td>
					<td><input type=\"text\" name=\"censoredOriginal\" /></td>
				</tr>
				<tr>
					<td>" . $lang['censoredReplacement'] . "</td>
					<td><input type=\"text\" name=\"censoredReplacement\" /></td>
				</tr>
			</table>
			<p>
				<input type=\"hidden\" name=\"hiddenField\" value=\"\" />
				<input type=\"hidden\" name=\"censoredType\" value=\"addCensored\" />
				<input type=\"submit\" name=\"submit\" value=\"" . $lang['add'] . "\" />
			</p>
		</fieldset>
	</form>";
	
	$queryMsg = "select id, original, replacement from " . $dbTables['censored'] . ";";
	$con->connect();
	$con->getRows($queryMsg);
	if ($con->getNumRows() > 0) {
		echo '<span class="titleMsg">' . $lang['modifyCensored'] . '</span>';
		echo '<br />';
		foreach ($con->queryResult as $res) {
			echo "
			<form method=\"post\" action=\"index.php?a=censored\">
				<fieldset>
					<table class='borderTable'>
						<tr>
							<td>" . $lang['censoredOriginal'] . "</td>
							<td><input type=\"text\" name=\"censoredOriginal\" value=\"" . $res['original'] . "\" /></td>
						</tr>
						<tr>
							<td>" . $lang['censoredReplacement'] . "</td>
							<td><input type=\"text\" name=\"censoredReplacement\" value=\"" . $res['replacement'] . "\" /></td>
						</tr>
						<tr>
							<td colspan='2'>
								<input type=\"hidden\" name=\"hiddenField\" value=\"\" />
								<input type=\"hidden\" name=\"censoredType\" value=\"modifyCensored\" />
								<input type=\"hidden\" name=\"censoredID\" value=\"" . base64_encode($res['id']) ."\" />
								<input type=\"submit\" name=\"submit\" value=\"" . $lang['modify'] . "\" />
								<input type=\"submit\" name=\"submit\" value=\"" . $lang['remove'] . "\" />
							</td>
						</tr>
					</table>
				</fieldset>
			</form>";
		}
	}
	$con->close();

?>