<?php
use guestbook\Error;
echo '<div>
	<div class="title">' . $lang['mysqlInstallation'] . '</div>';

$installCheck['hidden'] = secureVar(trim($_POST['hidden']), 'html');

if ($installCheck['hidden'] == 'Lupa') {
	// Start installation
	
	$installCheck['host'] = secureVar(trim($_POST['host']), 'html');
	$installCheck['username'] = secureVar(trim($_POST['username']), 'html');
	$installCheck['password'] = secureVar(trim($_POST['password']), 'html');
	$installCheck['database'] = secureVar(trim($_POST['database']), 'html');
	$installCheck['prefix'] = secureVar(trim($_POST['prefix']), 'html');
	
	$installCheck['adminName'] = secureVar(trim($_POST['adminName']), 'html');
	$installCheck['adminPass'] = secureVar(trim($_POST['adminPass']), 'html');
	$installCheck['adminPassConf'] = secureVar(trim($_POST['adminPassConf']), 'html');
	$installCheck['adminEmail'] = secureVar(trim($_POST['adminEmail']), 'html');
	
	$errorField = "";
	if (($installCheck['host'] == '') ||  empty($installCheck['host']))
		$errorField .= $lang['host'] . ' ' . $lang['isEmpty'] . '<br />';
	
	if (($installCheck['username'] == '') ||  empty($installCheck['username']))
		$errorField .= $lang['username'] . ' ' . $lang['isEmpty'] . '<br />';
	
	if (($installCheck['database'] == '') ||  empty($installCheck['database']))
		$errorField .= $lang['database'] . ' ' . $lang['isEmpty'] . '<br />';
	
	if (($installCheck['adminName'] == '') ||  empty($installCheck['adminName']))
		$errorField .= $lang['adminName'] . ' ' . $lang['isEmpty'] . '<br />';
	
	if (($installCheck['adminPass'] == '') ||  empty($installCheck['adminPass']))
		$errorField .= $lang['adminPass'] . ' ' . $lang['isEmpty'] . '<br />';
	
	if (($installCheck['adminPassConf'] == '') ||  empty($installCheck['adminPassConf']))
		$errorField .= $lang['adminPassConf'] . ' ' . $lang['isEmpty'] . '<br />';
	
	if (($installCheck['adminEmail'] == '') ||  empty($installCheck['adminEmail']))
		$errorField .= $lang['adminEmail'] . ' ' . $lang['isEmpty'] . '<br />';
	
	if ($installCheck['adminPass'] != $installCheck['adminPassConf'])
		$errorField .= $lang['adminPass'] . ', ' . $lang['adminPassConf'] . ' ' . $lang['areDifferent'] . '<br />';
	
	if ($errorField != '') {
		echo "<div class=\"msgError\">$errorField</div>";
		echo '<div id="previous"><a href="index.php?a=install&lang=' . $instLang . '">' . $lang['previous'] . '</a></div>';
	}
	else {
		// Installing
		
		require_once '../classes/database/sql.class.php';
		require_once '../classes/database/mysqli.class.php';
		
		$con = new AngoraMySQLi();
		$con->setCon($installCheck['host'], $installCheck['username'], $installCheck['password'], $installCheck['database']);
		$con->connect();
		
		$instDone = true;
		$sqlfile = "sql/angora_2_0_installation.sql";

		$sql = '';
		if (is_file($sqlfile)) {
			$lines = @file($sqlfile);
			if (is_array($lines)) {
				foreach($lines as $line) {
					$sql.=trim($line);
					if(empty($sql)) {
						$sql="";
						continue;
					}
					elseif(preg_match("/^[#-].*+\r?\n?/i",trim($line))) {
						$sql="";
						continue;
					}
					elseif(!preg_match("/;[\r\n]+/",$line))
						continue;
					
					$sql = preg_replace('/#__/', $installCheck['prefix'], $sql);
					@$con->modify($sql);
					
					if ($con->printError() != "")
						
						$instDone = false;
					$sql="";
				}
			}
		}
		
		$con->close();
		
		if ($instDone) {
			echo "<div class=\"msgSuccess\">" . $lang['installationDone'] . "</div>";
			
			// Add admin data
			
			$con->connect();
			
			$newSalt = substr(hash('sha1', uniqid(rand(), true)), 0, 5);
			$newPassword = hash('sha256', $installCheck['adminPass'] . $newSalt);
			$saveSalt = base64_encode($newSalt);
			$adminName = base64_encode($installCheck['adminName']);
			
			$dbTables['admin'] = $installCheck['prefix'] . "admin";
			$dbTables['config'] = $installCheck['prefix'] . "config";
		
			$queryMsg = "INSERT INTO " . $dbTables['admin'] . " (id, username, password, salt, privilege) VALUES 
			(NULL, '" . secureVar($adminName, 'sql') . "', '" . secureVar($newPassword, 'sql') . "', '" . secureVar($saveSalt, 'sql') . "', '1')";
			
			if ($con->modify($queryMsg)) {
				echo "<div class=\"msgSuccess\">" . $lang['adminConfigurationDone'] . "</div>";			
				
				$savedEmail = base64_encode($installCheck['adminEmail']);
				$chPaths['backupFolder'] = realpath("../admin/backup");
				$chPaths['smiliesFolder'] = realpath("../images/smilies");
				$chPaths['langFolder'] = realpath("../languages");
				$chPaths['themesFolder'] = realpath("../themes");
				
				$checkCaptcha = 0;
				if (extension_loaded('gd'))
					$checkCaptcha = 1;
				
				$themeRetro = 'retro';
				if ($lang['dir'] == 'rtl')
					$themeRetro = 'retroRTL';
				
				$queryMsg = "INSERT INTO " . $dbTables['config'] . " (id,offline,offlineMessage,guestbookLang,guestbookTheme,mobileTheme,pagesFormat,numPostsPerPage,adminLang,dateFormat,gbTitle,checkEmail,maxCharField,maxCharMsg,floodTime,moderateMsg,checkCaptcha,headTitle,resizeImg,imgWidth,imgHeight,metaKeywords,metaDescription,backupFolder,smiliesFolder,langFolder,themesFolder,receiveEmailNotification,email,autoCensor,debug,dateSort) VALUES 
				(0, '0', 'The guestbook is offline!', '" . secureVar($instLang, 'sql') . "', '" . secureVar($themeRetro, 'sql') . "', 'mobile', 'several', '5', '" . secureVar($instLang, 'sql') . "', 'd-m-Y H:i:s', 'My guestbook', '0', '35', '500', '30', '0', '" . secureVar($checkCaptcha, 'sql') . "', 'Angora 2.0', '0', '100', '100', '', '', '" . secureVar($chPaths['backupFolder'], 'sql') . "', '" . secureVar($chPaths['smiliesFolder'], 'sql') . "', '" . secureVar($chPaths['langFolder'], 'sql') . "', '" . secureVar($chPaths['themesFolder'], 'sql') . "', '0', '" . secureVar($savedEmail, 'sql') . "', '0', '0', 'desc')";
				
				if ($con->modify($queryMsg)) {
					echo "<div class=\"msgSuccess\">" . $lang['generalConfigurationDone'] . "</div>";
					
					// Creation of data.php file
			
					echo "<div class=\"title\">" . $lang['fileCreation'] . "</div>";
	
			$data_file = "<?php

if (@\$magic != \"0xDEADBEEF\")
	die(\"This file cannot be executed directly\");

\$data['dbHost'] = \"" . base64_encode($installCheck['host']) . "\";
\$data['dbUsername'] = \"" . base64_encode($installCheck['username']) . "\";
\$data['dbPassword'] = \"" . base64_encode($installCheck['password']) . "\";
\$data['dbDatabase'] = \"" . base64_encode($installCheck['database']) . "\";
\$data['dbPrefix'] = \"" . base64_encode($installCheck['prefix']) . "\";

?>";
			
					echo $lang['manualDbFileCreation'] . "<br />
						<textarea rows='11' cols='70' onfocus='this.select()'>" . $data_file . "</textarea>";
					
					// Remember to delete setup folder !!
					
					echo "<div class=\"title\">" . $lang['finishing'] . "</div>";
					
					echo '<div>' . $lang['deleteSetup'] . '<br />' . $lang['yesYouCan'] . ' : <br />
					<a href="../index.php">' . $lang['newGuestbook'] . '</a>
					<br />
					<a href="../admin/">' . $lang['adminCenter'] . '</a>';
			
				}
				else {
					echo "<div class=\"msgError\">" . $lang['dataError'] . "</div>";
					echo '<div id="previous"><a href="index.php?a=config&lang=' . $instLang . '">' . $lang['previous'] . '</a></div>';
				}
				$con->close();
			}
			else {
				$con->close();
				echo "<div class=\"msgError\">" . $lang['dataError'] . "</div>";
				echo '<div id="previous"><a href="index.php?a=config&lang=' . $instLang . '">' . $lang['previous'] . '</a></div>';
			}	
		}
		else {
			echo "<div class=\"msgError\">" . $lang['dataError'] . "</div>";
			echo '<div id="previous"><a href="index.php?a=install&lang=' . $instLang . '">' . $lang['previous'] . '</a></div>';
		}
	}
}
else {
	include_once '../classes/error/error.class.php';
	$error = new Error("Humans only ! Go away WALL&#183;E");
	die($error->showError());
}

echo '</div>';

?>
