<?php
use guestbook\Error;
if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");
	
	if (base64_decode($_SESSION['privilege']) != 1) {
		$error = new Error($lang['noPermission']);
		die($error->showError());
	}
	
	echo '<div class="mainTitle">' . $lang['advancedOptions'] . '</div>';
	echo '<div class="helpPopup ' . $alignHelp . '"><a href="#" onclick="openHelp(\'advOptions\');">' . $lang['help'] . '</a></div>';
	
	$submitId = isset($_POST['submit']) ? secureVar($_POST['submit'], 'html') : '';
	
	if ((! empty($submitId)) && isset($submitId)) {
		$optionsCheck['hidden'] = secureVar(trim($_POST['hiddenField']), 'html');
		$optionsCheck['optionsType'] = secureVar(trim($_POST['optionsType']), 'html');
				
		if (($optionsCheck['hidden'] != '') || ($optionsCheck['optionsType'] == '') ||  empty($optionsCheck['optionsType'])) {
			$error = new Error("Humans only ! Go away WALL&#183;E");
			die($error->showError());
		}
		
		$errorField = '';
		
		if ($optionsCheck['optionsType'] == 'paths') {
			$optionsCheck['backupFolder'] = secureVar(trim($_POST['backupFolder']), 'html');
			$optionsCheck['smiliesFolder'] = secureVar(trim($_POST['smiliesFolder']), 'html');
			$optionsCheck['langFolder'] = secureVar(trim($_POST['langFolder']), 'html');
			$optionsCheck['themesFolder'] = secureVar(trim($_POST['themesFolder']), 'html');
			
			if (($optionsCheck['backupFolder'] == '') ||  empty($optionsCheck['backupFolder']))
				$errorField .= $lang['backupFolder'] . ' ' . $lang['isEmpty'] . '<br />';
			
			if (($optionsCheck['smiliesFolder'] == '') ||  empty($optionsCheck['smiliesFolder']))
				$errorField .= $lang['smiliesFolder'] . ' ' . $lang['isEmpty'] . '<br />';
			
			if (($optionsCheck['langFolder'] == '') ||  empty($optionsCheck['langFolder']))
				$errorField .= $lang['langFolder'] . ' ' . $lang['isEmpty'] . '<br />';
			
			if (($optionsCheck['themesFolder'] == '') ||  empty($optionsCheck['themesFolder']))
				$errorField .= $lang['themesFolder'] . ' ' . $lang['isEmpty'] . '<br />';
			
			
			if ($errorField == '') {
				$con->connect();
				$queryMsg = "update " . $dbTables['config'] . " set backupFolder='" . secureVar($optionsCheck['backupFolder'], 'sql') . "',
				 smiliesFolder='" . secureVar($optionsCheck['smiliesFolder'], 'sql') . "', 
				 langFolder='" . secureVar($optionsCheck['langFolder'], 'sql') . "', 
				 themesFolder='" . secureVar($optionsCheck['themesFolder'], 'sql') . "' 
				 where id='" . secureVar($config['id'], 'sql') . "';";
				if ($con->modify($queryMsg))
					echo "<div class=\"msgSuccess\">" . $lang['changeSuccess'] . "</div>";
				else {
					$con->printError();
					echo "<div class=\"msgError\">" . $lang['dataError'] . "</div>";
				}
				$con->close();
			}
			
		}
		elseif ($optionsCheck['optionsType'] == 'changeEmail') {
			$optionsCheck['email'] = secureVar(trim($_POST['email']), 'html');
			$optionsCheck['receiveEmailNotification'] = secureVar(trim($_POST['receiveEmailNotification']), 'html');
			
			if (($optionsCheck['email'] == '') ||  empty($optionsCheck['email']))
				$errorField .= $lang['email'] . ' ' . $lang['isEmpty'] . '<br />';
			
			if (($optionsCheck['receiveEmailNotification'] == '') ||  empty($optionsCheck['receiveEmailNotification'])) {
				if ($optionsCheck['receiveEmailNotification'] != 0)
					$errorField .= $lang['receiveEmailNotification'] . ' ' . $lang['isEmpty'] . '<br />';
			}
			
			if ($errorField == '') {
				$con->connect();
				$queryMsg = "update " . $dbTables['config'] . " set email='" . secureVar(base64_encode($optionsCheck['email']), 'sql') . "',
				 receiveEmailNotification='" . secureVar($optionsCheck['receiveEmailNotification'], 'sql') . "'  
				 where id='" . secureVar($config['id'], 'sql') . "';";
				if ($con->modify($queryMsg))
					echo "<div class=\"msgSuccess\">" . $lang['changeSuccess'] . "</div>";
				else {
					$con->printError();
					echo "<div class=\"msgError\">" . $lang['dataError'] . "</div>";
				}
				$con->close();
			}
			
		}
		elseif ($optionsCheck['optionsType'] == 'database') {
			$optionsCheck['dbHost'] = secureVar(trim($_POST['dbHost']), 'html');
			$optionsCheck['dbDatabase'] = secureVar(trim($_POST['dbDatabase']), 'html');
			$optionsCheck['dbUsername'] = secureVar(trim($_POST['dbUsername']), 'html');
			$optionsCheck['dbPassword'] = secureVar(trim($_POST['dbPassword']), 'html');
			$optionsCheck['dbPrefix'] = secureVar(trim($_POST['dbPrefix']), 'html');
			
			if (($optionsCheck['dbHost'] == '') ||  empty($optionsCheck['dbHost']))
				$errorField .= $lang['dbHost'] . ' ' . $lang['isEmpty'] . '<br />';
			
			if (($optionsCheck['dbDatabase'] == '') ||  empty($optionsCheck['dbDatabase']))
				$errorField .= $lang['dbDatabase'] . ' ' . $lang['isEmpty'] . '<br />';
			
			if (($optionsCheck['dbUsername'] == '') ||  empty($optionsCheck['dbUsername']))
				$errorField .= $lang['dbUsername'] . ' ' . $lang['isEmpty'] . '<br />';
			
			/*if (($optionsCheck['dbPassword'] == '') ||  empty($optionsCheck['dbPassword']))
				$errorField .= $lang['dbPassword'] . ' ' . $lang['isEmpty'] . '<br />';*/
			
			if (($optionsCheck['dbPrefix'] == '') ||  empty($optionsCheck['dbPrefix']))
				$errorField .= $lang['dbPrefix'] . ' ' . $lang['isEmpty'] . '<br />';
			
			if ($errorField == '') {
				
				$data_file = "<?php

if (__FILE__ == \$_SERVER['SCRIPT_FILENAME'])
	die(\"This file cannot be executed directly\");

\$data['dbHost'] = \"" . base64_encode($optionsCheck['dbHost']) . "\";
\$data['dbUsername'] = \"" . base64_encode($optionsCheck['dbUsername']) . "\";
\$data['dbPassword'] = \"" . base64_encode($optionsCheck['dbPassword']) . "\";
\$data['dbDatabase'] = \"" . base64_encode($optionsCheck['dbDatabase']) . "\";
\$data['dbPrefix'] = \"" . base64_encode($optionsCheck['dbPrefix']) . "\";

?>";
				
				echo $lang['manualDbFileCreation'] . "<br />
				<textarea rows='11' cols='70' onfocus='this.select()'>" . $data_file . "</textarea>";
			}
		}
		
		if ($errorField != '')
			echo "<div class=\"msgError\">$errorField</div>";
	}
	
	require '../configuration.php';
	
	echo '<table border="0" width="100%"><tr><td>';
	
	$generatePaths = isset($_GET['paths']) ? secureVar($_GET['paths'], 'html') : '';
	
	$chPaths['backupFolder'] = $config['backupFolder'];
	$chPaths['smiliesFolder'] = $config['smiliesFolder'];
	$chPaths['langFolder'] = $config['langFolder'];
	$chPaths['themesFolder'] = $config['themesFolder'];
	
	if ((! empty($generatePaths)) && isset($generatePaths)) {
		$chPaths['backupFolder'] = realpath("./backup");
		$chPaths['smiliesFolder'] = realpath("../images/custom");
		$chPaths['langFolder'] = realpath("../languages");
		$chPaths['themesFolder'] = realpath("../themes");
	}

	echo '
	<form method="post" action="index.php?a=advOptions">
		<fieldset>
			<table>
				<tr>
					<td colspan="2" class="tableTitle">' . $lang['changePaths'] . '</td>
				</tr>
				<tr>
					<td>' . $lang['backupFolder'] . '</td>
					<td><input type="text" name="backupFolder" value="' . $chPaths['backupFolder'] . '" size="50" /></td>
				</tr>
				<tr>
					<td>' . $lang['smiliesFolder'] . '</td>
					<td><input type="text" name="smiliesFolder" value="' . $chPaths['smiliesFolder'] . '" size="50" /></td>
				</tr>
				<tr>
					<td>' . $lang['langFolder'] . '</td>
					<td><input type="text" name="langFolder" value="' . $chPaths['langFolder'] . '" size="50" /></td>
				</tr>
				<tr>
					<td>' . $lang['themesFolder'] . '</td>
					<td><input type="text" name="themesFolder" value="' . $chPaths['themesFolder'] . '" size="50" /></td>
				</tr>
				<tr>
					<td colspan="2" align="right">
						<input type="hidden" name="hiddenField" value="" />
						<input type="hidden" name="optionsType" value="paths" />
						<a href="index.php?a=advOptions&paths=ok">' . $lang['generatePaths'] . '</a>
						<input type="submit" name="submit" value="' . $lang['change'] . '" />
					</td>
				</tr>
			</table>
		</fieldset>
	</form>';
	
	echo '</td></tr><tr><td>';
	
	echo '
	<form method="post" action="index.php?a=advOptions">
		<fieldset>
			<table>
				<tr>
					<td colspan="2" class="tableTitle">' . $lang['changeEmail'] . '</td>
				</tr>
				<tr>
					<td>' . $lang['email'] . '</td>
					<td><input type="text" name="email" value="' . base64_decode($config['email']) . '" size="25" /></td>
				</tr>
				<tr>
					<td>' . $lang['receiveEmailNotification'] . '</td>
					<td><select name="receiveEmailNotification">';
					if ($config['receiveEmailNotification']) {
						echo '<option value="1">' . $lang['yes'] . '</option>';
						echo '<option value="0">' . $lang['no'] . '</option>';
					}
					else {
						echo '<option value="0">' . $lang['no'] . '</option>';
						echo '<option value="1">' . $lang['yes'] . '</option>';
					}
					echo '</select></td>
				</tr>
				<tr>
					<td colspan="2" align="right">
						<input type="hidden" name="hiddenField" value="" />
						<input type="hidden" name="optionsType" value="changeEmail" />
						<input type="submit" name="submit" value="' . $lang['change'] . '" />
					</td>
				</tr>
			</table>
		</fieldset>
	</form>';
	
	echo '</td></tr><tr><td>';
	
	echo '
	<form method="post" action="index.php?a=advOptions">
		<fieldset>
			<table>
				<tr>
					<td colspan="2" class="tableTitle">' . $lang['changeDatabase'] . '</td>
				</tr>
				<tr>
					<td>' . $lang['dbHost'] . '</td>
					<td><input type="text" name="dbHost" value="' . base64_decode($data['dbHost']) . '" /></td>
				</tr>
				<tr>
					<td>' . $lang['dbDatabase'] . '</td>
					<td><input type="text" name="dbDatabase" value="' . base64_decode($data['dbDatabase']) . '" /></td>
				</tr>
				<tr>
					<td>' . $lang['dbUsername'] . '</td>
					<td><input type="text" name="dbUsername" value="' . base64_decode($data['dbUsername']) . '" /></td>
				</tr>
				<tr>
					<td>' . $lang['dbPassword'] . '</td>
					<td><input type="text" name="dbPassword" value="' . base64_decode($data['dbPassword']) . '" /></td>
				</tr>
				<tr>
					<td>' . $lang['dbPrefix'] . '</td>
					<td><input type="text" name="dbPrefix" value="' . base64_decode($data['dbPrefix']) . '" /></td>
				</tr>
				<tr>
					<td colspan="2" align="right">
						<input type="hidden" name="hiddenField" value="" />
						<input type="hidden" name="optionsType" value="database" />
						<input type="submit" name="submit" value="' . $lang['change'] . '" />
					</td>
				</tr>
			</table>
		</fieldset>
	</form>';
	
	echo '</td></tr></table>';

?>
