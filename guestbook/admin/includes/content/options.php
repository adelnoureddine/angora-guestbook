<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");
	
	echo '<div class="mainTitle">' . $lang['options'] . '</div>';
	echo '<div class="helpPopup ' . $alignHelp . '"><a href="#" onclick="openHelp(\'options\');">' . $lang['help'] . '</a></div>';
	
	$submitId = secureVar($_POST['submit'], 'html');
	
	if ((! empty($submitId)) && isset($submitId)) {
		$optionsCheck['hidden'] = secureVar(trim($_POST['hiddenField']), 'html');
		$optionsCheck['optionsType'] = secureVar(trim($_POST['optionsType']), 'html');
				
		if (($optionsCheck['hidden'] != '') || ($optionsCheck['optionsType'] == '') ||  empty($optionsCheck['optionsType'])) {
			$error = new Error("Humans only ! Go away WALL&#183;E");
			die($error->showError());
		}
				
		function doUpdate($arrayValues, $checkVars) {
			global $con;
			global $lang;
			global $config;
			global $dbTables;
			$errorField = '';
			$queryMsg = "UPDATE " . $dbTables['config'] . " SET ";
			foreach ($arrayValues as $id => $value) {
				$optionsCheck['' .  $value . ''] = secureVar(trim($_POST['' .  $value . '']), 'html');
				if ($checkVars) {
					if (($optionsCheck['' .  $value . ''] == '') ||  empty($optionsCheck['' .  $value . '']))
						if ($optionsCheck['' .  $value . ''] != 0)
							$errorField .= $lang['' .  $value . ''] . ' ' . $lang['isEmpty'] . '<br />';
				}
				if ($errorField == '') {
					$con->connect();
					$queryMsg .= "$value='" . secureVar($optionsCheck['' .  $value . ''], 'sql') . "', ";
					$con->close();
				}
			}
			$queryMsg = substr($queryMsg, 0, -2);
			
			if ($errorField == '') {
				$con->connect();
				$queryMsg .= " where id='" . $config['id'] . "';";
				if ($con->modify($queryMsg))
					echo "<div class=\"msgSuccess\">" . $lang['changeSuccess'] . "</div>";
				else {
					$con->printError();
					echo "<div class=\"msgError\">" . $lang['dataError'] . "</div>";
				}
				$con->close();
			}
			else {
				echo "<div class=\"msgError\">$errorField</div>";
			}
		}

		switch ($optionsCheck['optionsType']) {
			case 'titles' :
				doUpdate(array("0" => "headTitle", "1" => "gbTitle"), 1);
				break;
			case 'metatags' :
				doUpdate(array("0" => "metaDescription", "1" => "metaKeywords"), 0);
				break;
			case 'maxchar' :
				doUpdate(array("0" => "maxCharField", "1" => "maxCharMsg"), 1);
				break;
			case 'security' :
				doUpdate(array("0" => "floodTime", "1" => "moderateMsg", "2" => "autoCensor", "3" => "checkEmail", "4" => "checkCaptcha", "5" => "reCaptcha", "6" => "reCaptchapubk", "7" => "reCaptchaprvk", "8" => "debug"), 1);
				break;
			case 'languages' :
				doUpdate(array("0" => "guestbookLang", "1" => "adminLang"), 1);
				break;
			case 'visualeffects' :
				doUpdate(array("0" => "guestbookTheme", "1" => "mobileTheme", "2" => "pagesFormat", "3" => "numPostsPerPage", "4" => "dateFormat", "5" => "timezone"), 1);
				break;
			case 'gboffline' :
				doUpdate(array("0" => "offline", "1" => "offlineMessage"), 1);
				break;
			case 'image' :
				doUpdate(array("0" => "resizeImg", "1" => "imgWidth", "2" => "imgHeight"), 1);
				break;
			default : ;
		}
		
		if ($errorField != '') {
			echo "<div class=\"msgError\">$errorField</div>";
		}
	}
    
    function showTableRow($name, $type, $var='') {
        global $lang;
        global $config;
        $row = '<tr><td>' . $lang['' . $name . ''] . '</td>';
        
        switch ($type) {
            case 'yesno' :
                $row .= '<td><select name="' . $name . '">';
                if ($config['' . $name . '']) {
                    $row .= '<option value="1">' . $lang['yes'] . '</option>';
                    $row .= '<option value="0">' . $lang['no'] . '</option>';
                }
                else {
                    $row .= '<option value="0">' . $lang['no'] . '</option>';
                    $row .= '<option value="1">' . $lang['yes'] . '</option>';
                }
                $row .= '</select>';
                $row .= '</td></tr>';
                break;
            case 'input' :
                $row .= '<td><input type="text" name="' . $name . '" value="' . $config['' . $name . ''] . '" size="' . $var . '" /></td>';
                break;
            default : ;
        }
        
        $row .= '</td></tr>';
        echo $row;
    }
	
	require '../configuration.php';
	
	echo '<table border="0" width="100%"><tr><td>';

	/**
	 * Titles box
	 */
					
	echo '
	<form method="post" action="index.php?a=options">
		<fieldset>
			<table>
				<tr>
					<td colspan="2" class="tableTitle">' . $lang['changeTitles'] . '</td>
				</tr>';
                
                showTableRow('headTitle', 'input', 15);
                showTableRow('gbTitle', 'input', 15);
                
                echo '
				<tr>
					<td colspan="2" align="right">
						<input type="hidden" name="hiddenField" value="" />
						<input type="hidden" name="optionsType" value="titles" />
						<input type="submit" name="submit" value="' . $lang['change'] . '" />
					</td>
				</tr>
			</table>
		</fieldset>
	</form>';
	
	echo '</td><td>';
	
	/**
	 * Max. characters box 
	 */
	
	echo '
	<form method="post" action="index.php?a=options">
		<fieldset>
			<table>
				<tr>
					<td colspan="2" class="tableTitle">' . $lang['changeMaxChar'] . '</td>
				</tr>';
                
                showTableRow('maxCharField', 'input', 5);
                showTableRow('maxCharMsg', 'input', 5);
                
				echo '
				<tr>
					<td colspan="2" align="right">
						<input type="hidden" name="hiddenField" value="" />
						<input type="hidden" name="optionsType" value="maxchar" />
						<input type="submit" name="submit" value="' . $lang['change'] . '" />
					</td>
				</tr>
			</table>
		</fieldset>
	</form>';
	
	echo '</td></tr><tr><td>';
	
	/**
	 * Languages box
	 */
	
	echo '
	<form method="post" action="index.php?a=options">
		<fieldset>
			<table>
				<tr>
					<td colspan="2" class="tableTitle">' . $lang['changeLanguages'] . '</td>
				</tr>
				<tr>
					<td>' . $lang['guestbookLang'] . '</td>
					<td><select name="guestbookLang">';
					if ($handle = opendir('../languages/')) {
						while (($file = readdir($handle)) != false) {
							if ($file != "." && $file != ".." && !is_file($file)) {
								if ($config['guestbookLang'] == $file)
									echo '<option value="' . $file . '" selected="selected">' . $file . '</option>';
								else
									echo '<option value="' . $file . '">' . $file . '</option>';
							}
						}
					}
					closedir($handle);
					echo '</select></td>
				</tr>
				<tr>
					<td>' . $lang['adminLang'] . '</td>
					<td><select name="adminLang">';
					if ($handle = opendir('../languages/')) {
						while (($file = readdir($handle)) != false) {
							if ($file != "." && $file != ".." && !is_file($file)) {
								if ($config['adminLang'] == $file)
									echo '<option value="' . $file . '" selected="selected">' . $file . '</option>';
								else
									echo '<option value="' . $file . '">' . $file . '</option>';
							}
						}
					}
					closedir($handle);
					echo '</select></td>
				</tr>
				<tr>
					<td colspan="2" align="right">
						<input type="hidden" name="hiddenField" value="" />
						<input type="hidden" name="optionsType" value="languages" />
						<input type="submit" name="submit" value="' . $lang['change'] . '" />
					</td>
				</tr>
			</table>
		</fieldset>
	</form>';
	
	echo '</td><td>';
	
	/**
	 * Meta tags box
	 */
	
	echo '
	<form method="post" action="index.php?a=options">
		<fieldset>
			<table>
				<tr>
					<td colspan="2" class="tableTitle">' . $lang['changeMetaTags'] . '</td>
				</tr>';
                
                showTableRow('metaDescription', 'input', 15);
                showTableRow('metaKeywords', 'input', 15);
                
				echo '
				<tr>
					<td colspan="2" align="right">
						<input type="hidden" name="hiddenField" value="" />
						<input type="hidden" name="optionsType" value="metatags" />
						<input type="submit" name="submit" value="' . $lang['change'] . '" />
					</td>
				</tr>
			</table>
		</fieldset>
	</form>';
	
	echo '</td></tr><tr><td>';
	
	/**
	 * Security measures box
	 */
	
	echo '
	<form method="post" action="index.php?a=options">
		<fieldset>
			<table>
				<tr>
					<td colspan="2" class="tableTitle">' . $lang['changeSecurity'] . '</td>
				</tr>';
                
                showTableRow('floodTime', 'input', 5);
                showTableRow('moderateMsg', 'yesno');
                showTableRow('autoCensor', 'yesno');
                showTableRow('checkEmail', 'yesno');
                
                echo '
                <tr>
					<td>' . $lang['checkCaptcha'] . '</td>
					<td><select name="checkCaptcha">';
					if (function_exists("gd_info")) {
						if ($config['checkCaptcha']) {
							echo '<option value="1">' . $lang['yes'] . '</option>';
							echo '<option value="0">' . $lang['no'] . '</option>';
						}
						else {
							echo '<option value="0">' . $lang['no'] . '</option>';
							echo '<option value="1">' . $lang['yes'] . '</option>';
						}
					}
					else {
						echo '<option value="0">' . $lang['no'] . '</option>';
					}
					echo '</select></td>
				</tr>';
                
                showTableRow('reCaptcha', 'yesno');
                showTableRow('reCaptchapubk', 'input', 5);
                showTableRow('reCaptchaprvk', 'input', 5);
                showTableRow('debug', 'yesno');
                
                echo '
				<tr>
					<td colspan="2" align="right">
						<input type="hidden" name="hiddenField" value="" />
						<input type="hidden" name="optionsType" value="security" />
						<input type="submit" name="submit" value="' . $lang['change'] . '" />
					</td>
				</tr>
			</table>
		</fieldset>
	</form>';
	
	echo '</td><td>';
	
	/**
	 * Visual effects box
	 */
	
	echo '
	<form method="post" action="index.php?a=options">
		<fieldset>
			<table>
				<tr>
					<td colspan="2" class="tableTitle">' . $lang['changeVisual'] . '</td>
				</tr>
				<tr>
					<td>' . $lang['guestbookTheme'] . '</td>
					<td><select name="guestbookTheme">';
					if ($handle = opendir('../themes/')) {
						while (($file = readdir($handle)) != false) {
							if ($file != "." && $file != ".." && !is_file($file)) {
								if ($config['guestbookTheme'] == $file)
									echo '<option value="' . $file . '" selected="selected">' . $file . '</option>';
								else
									echo '<option value="' . $file . '">' . $file . '</option>';
							}
						}
					}
					closedir($handle);
					echo '</select></td>
				</tr>
				<tr>
					<td>' . $lang['mobileTheme'] . '</td>
					<td><select name="mobileTheme">';
					if ($handle = opendir('../themes/')) {
						while (($file = readdir($handle)) != false) {
							if ($file != "." && $file != ".." && !is_file($file)) {
								if ($config['mobileTheme'] == $file)
									echo '<option value="' . $file . '" selected="selected">' . $file . '</option>';
								else
									echo '<option value="' . $file . '">' . $file . '</option>';
							}
						}
					}
					closedir($handle);
					echo '</select></td>
				</tr>
				<tr>
					<td>' . $lang['pagesFormat'] . '</td>
					<td><select name="pagesFormat">';
					if ($config['pagesFormat'] == 'several') {
						echo '<option value="several">' . $lang['several'] . '</option>';
						echo '<option value="allinone">' . $lang['allinone'] . '</option>';
					}
					elseif ($config['pagesFormat'] == 'allinone') {
						echo '<option value="allinone">' . $lang['allinone'] . '</option>';
						echo '<option value="several">' . $lang['several'] . '</option>';
					}
					echo '</select></td>
				</tr>';
                showTableRow('numPostsPerPage', 'input', 5);
                showTableRow('dateFormat', 'input', 10);
                showTableRow('timezone', 'input', 10);
                
                echo '
				<tr>
					<td colspan="2" align="right">
						<input type="hidden" name="hiddenField" value="" />
						<input type="hidden" name="optionsType" value="visualeffects" />
						<input type="submit" name="submit" value="' . $lang['change'] . '" />
					</td>
				</tr>
			</table>
		</fieldset>
	</form>';
	
	echo '</td></tr><tr><td>';
	
	/**
	 * Offline options box
	 */
	
	echo '
	<form method="post" action="index.php?a=options">
		<fieldset>
			<table>
				<tr>
					<td colspan="2" class="tableTitle">' . $lang['changeOffline'] . '</td>
				</tr>';

                showTableRow('offline', 'yesno');
                
                echo '
				<tr>
					<td colspan="2">' . $lang['offlineMessage'] . '</td>
				</tr>
				<tr>
					<td colspan="2">
						<textarea name="offlineMessage">' . $config['offlineMessage'] . '</textarea>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="right">
						<input type="hidden" name="hiddenField" value="" />
						<input type="hidden" name="optionsType" value="gboffline" />
						<input type="submit" name="submit" value="' . $lang['change'] . '" />
					</td>
				</tr>
			</table>
		</fieldset>
	</form>';
	
	echo '</td><td>';
	
	/**
	 * Images format box
	 */
	
	echo '
	<form method="post" action="index.php?a=options">
		<fieldset>
			<table>
				<tr>
					<td colspan="2" class="tableTitle">' . $lang['changeImage'] . '</td>
				</tr>';
                showTableRow('resizeImg', 'yesno');
                
                showTableRow('imgWidth', 'input', 5);
                showTableRow('imgHeight', 'input', 5);
                
                echo '
				<tr>
					<td colspan="2" align="right">
						<input type="hidden" name="hiddenField" value="" />
						<input type="hidden" name="optionsType" value="image" />
						<input type="submit" name="submit" value="' . $lang['change'] . '" />
					</td>
				</tr>
			</table>
		</fieldset>
	</form>';
	
	echo '</td></tr></table>';

?>