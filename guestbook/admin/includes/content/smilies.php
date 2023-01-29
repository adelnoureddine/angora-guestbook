<?php
use guestbook\Error;
if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");
	
	if (base64_decode($_SESSION['privilege']) != 1) {
		$error = new Error($lang['noPermission']);
		die($error->showError());
	}
	
	echo '<div class="mainTitle">' . $lang['smilies'] . '</div>';
	echo '<div class="helpPopup ' . $alignHelp . '"><a href="#" onclick="openHelp(\'smilies\');">' . $lang['help'] . '</a></div>';
	
	$submitId = isset($_POST['submit']) ? secureVar($_POST['submit'], 'html') : '';
	
	if ((! empty($submitId)) && isset($submitId)) {		
		$smiliesCheck['hidden'] = secureVar(trim($_POST['hiddenField']), 'html');
		$smiliesCheck['smiliesType'] = secureVar(trim($_POST['smiliesType']), 'html');
		
		if (($smiliesCheck['hidden'] != '') || ($smiliesCheck['smiliesType'] == '') ||  empty($smiliesCheck['smiliesType'])) {
			$error = new Error("Humans only ! Go away WALL&#183;E");
			die($error->showError());
		}
		
		if ($smiliesCheck['smiliesType'] == 'addaSmiley') {
			$smiliesCheck['smileyName'] = secureVar(trim($_POST['smileyName']), 'html');
			$smiliesCheck['smileyCode'] = secureVar(trim($_POST['smileyCode']), 'html');
			$smiliesCheck['smileyPath'] = secureVar(trim($_POST['smileyPath']), 'html');
			
			$errorField = '';
			if (($smiliesCheck['smileyName'] == '') ||  empty($smiliesCheck['smileyName']))
				$errorField .= $lang['smileyName'] . ' ' . $lang['isEmpty'] . '<br />';
			
			if (($smiliesCheck['smileyCode'] == '') ||  empty($smiliesCheck['smileyCode']))
				$errorField .= $lang['smileyCode'] . ' ' . $lang['isEmpty'] . '<br />';
			
			if (($smiliesCheck['smileyPath'] == '') ||  empty($smiliesCheck['smileyPath']))
				$errorField .= $lang['smileyPath'] . ' ' . $lang['isEmpty'] . '<br />';
			
			if ($errorField != '') {
				echo "<div class=\"msgError\">$errorField</div>";
			}
			else {		
				$con->connect();
				$queryMsg = "INSERT INTO " . $dbTables['smilies'] . " (id, name, code, path) VALUES 
				(NULL, '" . secureVar($smiliesCheck['smileyName'], 'sql') . "', '" . secureVar($smiliesCheck['smileyCode'], 'sql') . "', '" . secureVar($smiliesCheck['smileyPath'], 'sql') . "')";
				if ($con->modify($queryMsg))
					echo "<div class=\"msgSuccess\">" . $lang['changeSuccess'] . "</div>";
				else {
					$con->printError();
					echo "<div class=\"msgError\">" . $lang['dataError'] . "</div>";
				}
				$con->close();
			}
		}
		elseif ($smiliesCheck['smiliesType'] == 'modifySmilies') {
			$smiliesCheck['smileyID'] = secureVar(trim($_POST['smileyID']), 'html');
			$smileyID = base64_decode($smiliesCheck['smileyID']);
			if ($submitId == $lang['remove']) {
				$con->connect();
				$queryMsg = "DELETE FROM " . $dbTables['smilies'] . " WHERE id='" . secureVar($smileyID, 'sql') . "';";
				if ($con->modify($queryMsg))
					echo "<div class=\"msgSuccess\">" . $lang['changeSuccess'] . "</div>";
				else {
					$con->printError();
					echo "<div class=\"msgError\">" . $lang['dataError'] . "</div>";
				}
				$con->close();
			}
			elseif ($submitId == $lang['modify']) {
				$smiliesCheck['smileyName'] = secureVar(trim($_POST['smileyName']), 'html');
				$smiliesCheck['smileyCode'] = secureVar(trim($_POST['smileyCode']), 'html');
				$smiliesCheck['smileyPath'] = secureVar(trim($_POST['smileyPath']), 'html');
				
				$errorField = '';
				if (($smiliesCheck['smileyName'] == '') ||  empty($smiliesCheck['smileyName']))
					$errorField .= $lang['smileyName'] . ' ' . $lang['isEmpty'] . '<br />';
				
				if (($smiliesCheck['smileyCode'] == '') ||  empty($smiliesCheck['smileyCode']))
					$errorField .= $lang['smileyCode'] . ' ' . $lang['isEmpty'] . '<br />';
				
				if (($smiliesCheck['smileyPath'] == '') ||  empty($smiliesCheck['smileyPath']))
					$errorField .= $lang['smileyPath'] . ' ' . $lang['isEmpty'] . '<br />';
				
				if ($errorField != '') {
					echo "<div class=\"msgError\">$errorField</div>";
				}
				else {		
					$con->connect();
					$queryMsg = "update " . $dbTables['smilies'] . " set name='" . secureVar($smiliesCheck['smileyName'], 'sql') . "', code='" . secureVar($smiliesCheck['smileyCode'], 'sql') . "', path='" . secureVar($smiliesCheck['smileyPath'], 'sql') . "' where id='" . secureVar($smileyID, 'sql') . "';";
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
	
	echo '<span class="titleMsg">' . $lang['addSmiley'] . '</span>';
	
	echo "
	<form method=\"post\" action=\"index.php?a=smilies\">
		<fieldset>
			<table border=\"0\">
				<tr>
					<td>" . $lang['smileyName'] . "</td>
					<td><input type=\"text\" name=\"smileyName\" /></td>
				</tr>
				<tr>
					<td>" . $lang['smileyCode'] . "</td>
					<td><input type=\"text\" name=\"smileyCode\" /></td>
				</tr>
				<tr>
					<td>" . $lang['smileyPath'] . "</td>
					<td><input type=\"text\" name=\"smileyPath\" size=\"40\" /></td>
				</tr>
			</table>
			<p>
				<input type=\"hidden\" name=\"hiddenField\" value=\"\" />
				<input type=\"hidden\" name=\"smiliesType\" value=\"addaSmiley\" />
				<input type=\"submit\" name=\"submit\" value=\"" . $lang['add'] . "\" />
			</p>
		</fieldset>
	</form>";
	
	echo "<script type=\"text/javascript\">
			function toggle(obj) {
				var el = document.getElementById('i' + obj);
				var el1 = document.getElementById('m' + obj);
				if ( el.style.display != 'none' ) {
					el.style.display = 'none';
					el1.src = '../images/posts/toggle.gif';
				}
				else {
					el.style.display = '';
					el1.src = '../images/posts/toggle1.gif';
				}
			}
		</script>";

	echo '<a href="javascript:toggle(1)"><img src="../images/posts/toggle.gif" alt="Toogle" id="m1" /> ' . $lang['uploadSmilies'] . '</a>';
	echo '<div id="i1" style="display : none;">';
			
	if ($handle = opendir($config['smiliesFolder'])) {
    	while (false !== ($file = readdir($handle))) {
	        if ($file != "." && $file != "..") {
	            echo '&nbsp;&nbsp; 
	            <a href="../images/custom/' . secureVar($file, 'html') . '" onclick="window.open(this.href);return false;">' . secureVar($file, 'html') . '</a><br />';
	        }
    	}
    	closedir($handle);
	}
	echo '</div><br /><br />';
	
	$queryMsg = "select id, name, code, path from " . $dbTables['smilies'] . ";";
	$con->connect();
	$con->getRows($queryMsg);
	if ($con->getNumRows() > 0) {
		echo '<span class="titleMsg">' . $lang['modifySmilies'] . '</span>';
		echo '<br />';
		foreach ($con->queryResult as $res) {
			echo "
			<form method=\"post\" action=\"index.php?a=smilies\">
				<fieldset>
					<table class='borderTable'>
						<tr>
							<td>" . $lang['smileyName'] . "</td>
							<td><input type=\"text\" name=\"smileyName\" value=\"" . $res['name'] . "\" /></td>
						</tr>
						<tr>
							<td>" . $lang['smileyCode'] . "</td>
							<td><input type=\"text\" name=\"smileyCode\" value=\"" . $res['code'] . "\" /></td>
						</tr>
						<tr>
							<td>" . $lang['smileyPath'] . "</td>
							<td><input type=\"text\" name=\"smileyPath\" size=\"40\" value=\"" . $res['path'] . "\" /></td>
						</tr>
						<tr>
							<td colspan='2'>
								<input type=\"hidden\" name=\"hiddenField\" value=\"\" />
								<input type=\"hidden\" name=\"smiliesType\" value=\"modifySmilies\" />
								<input type=\"hidden\" name=\"smileyID\" value=\"" . base64_encode($res['id']) ."\" />
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
