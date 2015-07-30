<?php

echo '<div>
	<div class="title">' . $lang['mysqlInstallation'] . '</div>';

// Start installation
// Updating

require_once '../data.php';

$installCheck['hidden'] = secureVar(trim($_POST['hidden']), 'html');

if ($installCheck['hidden'] == 'Romulus and Remus') {

	$installCheck['adminName'] = secureVar(trim($_POST['adminName']), 'html');
	$installCheck['adminPass'] = secureVar(trim($_POST['adminPass']), 'html');
	$installCheck['adminPassConf'] = secureVar(trim($_POST['adminPassConf']), 'html');

	$errorField = "";
	if (($installCheck['adminName'] == '') ||  empty($installCheck['adminName']))
		$errorField .= $lang['adminName'] . ' ' . $lang['isEmpty'] . '<br />';

	if (($installCheck['adminPass'] == '') ||  empty($installCheck['adminPass']))
		$errorField .= $lang['adminPass'] . ' ' . $lang['isEmpty'] . '<br />';

	if (($installCheck['adminPassConf'] == '') ||  empty($installCheck['adminPassConf']))
		$errorField .= $lang['adminPassConf'] . ' ' . $lang['isEmpty'] . '<br />';

	if ($installCheck['adminPass'] != $installCheck['adminPassConf'])
		$errorField .= $lang['adminPass'] . ', ' . $lang['adminPassConf'] . ' ' . $lang['areDifferent'] . '<br />';

	if ($errorField != '') {
		echo "<div class=\"msgError\">$errorField</div>";
		echo '<div id="previous"><a href="index.php?a=newAdmin&lang=' . $instLang . '">' . $lang['previous'] . '</a></div>';
	}
	else {
		// Start installation

		$installCheck['host'] = base64_decode($datahost0);
		$installCheck['username'] = base64_decode($username0);
		$installCheck['password'] = base64_decode($userpass0);
		$installCheck['database'] = base64_decode($database0);
		$installCheck['prefix'] = "tmpAngoraPrefix_";

		require_once '../classes/database/sql.class.php';
		require_once '../classes/database/mysql.class.php';

		$con = new AngoraMySQL();
		$con->setCon($installCheck['host'], $installCheck['username'], $installCheck['password'], $installCheck['database']);
		$con->connect();

		$instDone = true;
		$sqlfile = "sql/angora_1_5_installation.sql";

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

					$sql = ereg_replace('#__', $installCheck['prefix'], $sql);
					@$con->modify($sql);

					if (mysql_error() != "")
						$instDone = false;
					$sql="";
				}
			}
		}

		$con->close();

		if ($instDone) {
			echo "<div class=\"msgSuccess\">" . $lang['installationDone'] . "</div>";

			// Add admin data
			$newSalt = substr(hash('sha1', uniqid(rand(), true)), 0, 5);
			$newPassword = hash('sha256', $installCheck['adminPass'] . $newSalt);
			$saveSalt = base64_encode($newSalt);
			$adminName = base64_encode($installCheck['adminName']);

			$dbTables['admin'] = $installCheck['prefix'] . "admin";
			$dbTables['config'] = $installCheck['prefix'] . "config";

			$con->connect();
			$queryMsg = "INSERT INTO " . $dbTables['admin'] . " (id, username, password, salt, privilege) VALUES
			(NULL, '" . secureVar($adminName, 'sql') . "', '" . secureVar($newPassword, 'sql') . "', '" . secureVar($saveSalt, 'sql') . "', '1')";

			if ($con->modify($queryMsg)) {
				echo "<div class=\"msgSuccess\">" . $lang['adminConfigurationDone'] . "</div>";

				// Start converting data

				$db_configuration =  $pre . "configuration";
				$db_admin = $pre . "admin";
				$db_admin_reply = $pre . "admin_reply";
				$db_archive_posts = $pre . "archive_posts";
				$db_ip = $pre . "ip";
				$db_posts = $pre . "posts";
				$db_censor = $pre . "censor";
				$db_smilies = $pre . "smilies";
				$db_backup = $pre . "backup";

				$dbTables['config'] =  $installCheck['prefix'] . "config";
				$dbTables['admin'] = $installCheck['prefix'] . "admin";
				$dbTables['trash'] = $installCheck['prefix'] . "trash";
				$dbTables['reply'] = $installCheck['prefix'] . "reply";
				$dbTables['posts'] = $installCheck['prefix'] . "posts";
				$dbTables['censored'] = $installCheck['prefix'] . "censored";
				$dbTables['smilies'] = $installCheck['prefix'] . "smilies";
				$dbTables['ip'] = $installCheck['prefix'] . "ip";
				$dbTables['backupLog'] = $installCheck['prefix'] . "backupLog";

				echo "<div class=\"title\">" . $lang['convertTables'] . "</div>";

				$con->connect();

				// Posts table
				$resultPosts = true;
				$queryMsg = "Select * from $db_posts";
				$con->getRows($queryMsg);
				foreach ($con->queryResult as $res) {
					if ($res['publish'] == "true")
						$newPublish = 1;
					else
						$newPublish = 0;
					$queryMsg = "Insert into " . $dbTables['posts'] . "
					(id, name, country, date, location, email, message, useragent, rating, publish, ip)
					 values (
					'" . secureVar($res['id'], 'sql') . "',
					'" . secureVar($res['name'], 'sql') . "',
					'" . secureVar($res['flag'], 'sql') . "',
					'" . secureVar($res['date'], 'sql') . "',
					'" . secureVar($res['country'], 'sql') . "',
					'" . secureVar($res['email'], 'sql') . "',
					'" . secureVar($res['message'], 'sql') . "',
					'" . secureVar($res['useragent'], 'sql') . "',
					'" . secureVar($res['stars'], 'sql') . "',
					'" . secureVar($newPublish, 'sql') . "',
					'" . secureVar($res['ip'], 'sql') . "');";
					if (! $con->modify($queryMsg)) {
						$resultPosts = false;
						$con->printError();
					}
				}

				echo 'Posts.....';
				if ($resultPosts)
					echo $lang['ok'];
				else
					echo $lang['no'];
				echo '<br />';

				// Reply table
				$resultReply = true;
				$queryMsg = "Select * from $db_admin_reply";
				$con->getRows($queryMsg);
				foreach ($con->queryResult as $res) {
					$queryMsg = "Insert into " . $dbTables['reply'] . "
					(id, admin_id, post_id, name, date, message)
					 values (
					'" . secureVar($res['id'], 'sql') . "',
					-1,
					'" . secureVar($res['post_id'], 'sql') . "',
					'" . secureVar($res['admin'], 'sql') . "',
					'" . secureVar($res['date'], 'sql') . "',
					'" . secureVar($res['message'], 'sql') . "');";
					if (! $con->modify($queryMsg))
						$resultReply = false;
				}

				echo 'Admin_reply.....';
				if ($resultReply)
					echo $lang['ok'];
				else
					echo $lang['no'];
				echo '<br />';

				// Trash table
				$resultTrash = true;
				$queryMsg = "Select * from $db_archive_posts";
				$con->getRows($queryMsg);
				foreach ($con->queryResult as $res) {
					if ($res['publish'] == "true")
						$newPublish = 1;
					else
						$newPublish = 0;
					$queryMsg = "Insert into " . $dbTables['trash'] . "
					(id, name, country, date, location, email, message, useragent, rating, publish, ip)
					 values (
					'" . secureVar($res['id'], 'sql') . "',
					'" . secureVar($res['name'], 'sql') . "',
					'" . secureVar($res['flag'], 'sql') . "',
					'" . secureVar($res['date'], 'sql') . "',
					'" . secureVar($res['country'], 'sql') . "',
					'" . secureVar($res['email'], 'sql') . "',
					'" . secureVar($res['message'], 'sql') . "',
					'" . secureVar($res['useragent'], 'sql') . "',
					'" . secureVar($res['stars'], 'sql') . "',
					'" . secureVar($newPublish, 'sql') . "',
					'" . secureVar($res['ip'], 'sql') . "');";
					if (! $con->modify($queryMsg))
						$resultTrash = false;
				}

				echo 'Archive_posts.....';
				if ($resultTrash)
					echo $lang['ok'];
				else
					echo $lang['no'];
				echo '<br />';

				// Smilies table
				$resultSmilies = true;
				$queryMsg = "Select * from $db_smilies";
				$con->getRows($queryMsg);
				foreach ($con->queryResult as $res) {
					$queryMsg = "Insert into " . $dbTables['smilies'] . "
					(id, name, code, path)
					 values (
					'" . secureVar($res['id'], 'sql') . "',
					'" . secureVar($res['description'], 'sql') . "',
					'" . secureVar($res['code'], 'sql') . "',
					'" . secureVar($res['picture'], 'sql') . "');";
					if (! $con->modify($queryMsg))
						$resultSmilies = false;
				}

				echo 'Smilies.....';
				if ($resultSmilies)
					echo $lang['ok'];
				else
					echo $lang['no'];
				echo '<br />';

				// IP table
				$resultIP = true;
				$queryMsg = "Select * from $db_ip";
				$con->getRows($queryMsg);
				foreach ($con->queryResult as $res) {
					$queryMsg = "Insert into " . $dbTables['ip'] . "
					(id, ip)
					 values (
					'" . secureVar($res['id'], 'sql') . "',
					'" . secureVar($res['ip'], 'sql') . "');";
					if (! $con->modify($queryMsg))
						$resultIP = false;
				}

				echo 'IP.....';
				if ($resultIP)
					echo $lang['ok'];
				else
					echo $lang['no'];
				echo '<br />';

				// Censored table
				$resultCensored = true;
				$queryMsg = "Select * from $db_censor";
				$con->getRows($queryMsg);
				foreach ($con->queryResult as $res) {
					$queryMsg = "Insert into " . $dbTables['censored'] . "
					(id, original, replacement)
					 values (
					'" . secureVar($res['id'], 'sql') . "',
					'" . secureVar($res['original'], 'sql') . "',
					'" . secureVar($res['replacement'], 'sql') . "');";
					if (! $con->modify($queryMsg))
						$resultCensored = false;
				}

				echo 'Censor.....';
				if ($resultCensored)
					echo $lang['ok'];
				else
					echo $lang['no'];
				echo '<br />';

				// Config table
				$resultConfig = true;
				$queryMsg = "Select * from $db_configuration";
				$con->getRows($queryMsg);
				foreach ($con->queryResult as $res) {
					if ($res['offline'] == "true")
						$newOffline = 1;
					else
						$newOffline = 0;

					if ($res['moderate_p'] == "true")
						$newModerate = 1;
					else
						$newModerate = 0;

					if ($res['img_verification'] == "true")
						$newCaptcha = 1;
					else
						$newCaptcha = 0;

					if ($res['resize_img'] == "true")
						$newResize = 1;
					else
						$newResize = 0;

					if ($res['sendmail'] == "true")
						$newEmailNotif = 1;
					else
						$newEmailNotif = 0;

					if ($res['auto_censor'] == "true")
						$newCensor = 1;
					else
						$newCensor = 0;

					$chPaths['backupFolder'] = realpath("../admin/backup");
					$chPaths['smiliesFolder'] = realpath("../images/custom");
					$chPaths['langFolder'] = realpath("../languages");
					$chPaths['themesFolder'] = realpath("../themes");

					$themeRetro = 'retro';
					if ($lang['dir'] == 'rtl')
						$themeRetro = 'retroRTL';

					$queryMsg = "Insert into " . $dbTables['config'] . "
					(id,offline,offlineMessage,guestbookLang,guestbookTheme,mobileTheme,pagesFormat,numPostsPerPage,adminLang,dateFormat,gbTitle,checkEmail,maxCharField,maxCharMsg,floodTime,moderateMsg,checkCaptcha,headTitle,resizeImg,imgWidth,imgHeight,metaKeywords,metaDescription,backupFolder,smiliesFolder,langFolder,themesFolder,receiveEmailNotification,email,autoCensor,debug,timezone,reCaptcha,reCaptchapubk,reCaptchaprvk)
					 values (
					'" . secureVar($res['id'], 'sql') . "',
					'" . secureVar($newOffline, 'sql') . "',
					'" . secureVar($res['offline_message'], 'sql') . "',
					'" . secureVar($instLang, 'sql') . "',
					'" . secureVar($themeRetro, 'sql') . "',
					'" . secureVar('mobile', 'sql') . "',
					'" . secureVar($res['spages'], 'sql') . "',
					'" . secureVar($res['pages'], 'sql') . "',
					'" . secureVar($instLang, 'sql') . "',
					'" . secureVar($res['date_format'], 'sql') . "',
					'" . secureVar($res['title'], 'sql') . "',
					'" . secureVar(0, 'sql') . "',
					'" . secureVar($res['max_char_field'], 'sql') . "',
					'" . secureVar($res['max_char_message'], 'sql') . "',
					'" . secureVar($res['flood_time'], 'sql') . "',
					'" . secureVar($newModerate, 'sql') . "',
					'" . secureVar($newCaptcha, 'sql') . "',
					'" . secureVar($res['head'], 'sql') . "',
					'" . secureVar($newResize, 'sql') . "',
					'" . secureVar($res['img_width'], 'sql') . "',
					'" . secureVar($res['img_height'], 'sql') . "',
					'" . secureVar($res['keyword'], 'sql') . "',
					'" . secureVar($res['description'], 'sql') . "',
					'" . secureVar($chPaths['backupFolder'], 'sql') . "',
					'" . secureVar($chPaths['smiliesFolder'], 'sql') . "',
					'" . secureVar($chPaths['langFolder'], 'sql') . "',
					'" . secureVar($chPaths['themesFolder'], 'sql') . "',
					'" . secureVar($newEmailNotif, 'sql') . "',
					'" . secureVar($res['email'], 'sql') . "',
					'" . secureVar($newCensor, 'sql') . "',
					'" . secureVar(0, 'sql') . "',
					'',
					'',
					'',
					''
					);";
					if (! $con->modify($queryMsg)) {
						$resultConfig = false;
						$con->printError();
					}
				}

				echo 'Configuration.....';
				if ($resultConfig)
					echo $lang['ok'];
				else
					echo $lang['no'];
				echo '<br />';

				$con->close();

				if ($resultCensored && $resultConfig && $resultIP && $resultPosts && $resultReply && $resultSmilies && $resultTrash) {
					echo "<div class=\"msgSuccess\">" . $lang['convertionDone'] . "</div>";

					echo "<div class=\"title\">" . $lang['cleaningUp'] . "</div>";

					$con->connect();

					$con->modify("DROP TABLE IF EXISTS " . $db_configuration . ";");
					$con->modify("DROP TABLE IF EXISTS " . $db_admin . ";");
					$con->modify("DROP TABLE IF EXISTS " . $db_admin_reply . ";");
					$con->modify("DROP TABLE IF EXISTS " . $db_archive_posts . ";");
					$con->modify("DROP TABLE IF EXISTS " . $db_ip . ";");
					$con->modify("DROP TABLE IF EXISTS " . $db_posts . ";");
					$con->modify("DROP TABLE IF EXISTS " . $db_censor . ";");
					$con->modify("DROP TABLE IF EXISTS " . $db_smilies . ";");
					$con->modify("DROP TABLE IF EXISTS " . $db_backup . ";");
					echo $lang['dropOldTables'] . '.....' . $lang['ok'] . '<br />';

					$con->modify("RENAME TABLE " . $dbTables['config'] . " TO " . $pre . "config" . ";");
					$con->modify("RENAME TABLE " . $dbTables['admin'] . " TO " . $pre . "admin" . ";");
					$con->modify("RENAME TABLE " . $dbTables['trash'] . " TO " . $pre . "trash" . ";");
					$con->modify("RENAME TABLE " . $dbTables['reply'] . " TO " . $pre . "reply" . ";");
					$con->modify("RENAME TABLE " . $dbTables['posts'] . " TO " . $pre . "posts" . ";");
					$con->modify("RENAME TABLE " . $dbTables['censored'] . " TO " . $pre . "censored" . ";");
					$con->modify("RENAME TABLE " . $dbTables['smilies'] . " TO " . $pre . "smilies" . ";");
					$con->modify("RENAME TABLE " . $dbTables['ip'] . " TO " . $pre . "ip" . ";");
					$con->modify("RENAME TABLE " . $dbTables['backupLog'] . " TO " . $pre . "backupLog" . ";");
					echo $lang['renameNewTables'] . '.....' . $lang['ok'] . '<br />';

					$con->close();

					// Creation of data.php file

					echo "<div class=\"title\">" . $lang['fileCreation'] . "</div>";

					$data_file = "<?php

if (@\$magic != \"0xDEADBEEF\")
	die(\"This file cannot be executed directly\");

\$data['dbHost'] = \"" . base64_encode($installCheck['host']) . "\";
\$data['dbUsername'] = \"" . base64_encode($installCheck['username']) . "\";
\$data['dbPassword'] = \"" . base64_encode($installCheck['password']) . "\";
\$data['dbDatabase'] = \"" . base64_encode($installCheck['database']) . "\";
\$data['dbPrefix'] = \"" . base64_encode($pre) . "\";

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
					echo "<div class=\"msgError\">" . $lang['convertionFailed'] . "</div>";

					$con->connect();

					$con->modify("DROP TABLE IF EXISTS " . $dbTables['config'] . ";");
					$con->modify("DROP TABLE IF EXISTS " . $dbTables['admin'] . ";");
					$con->modify("DROP TABLE IF EXISTS " . $dbTables['trash'] . ";");
					$con->modify("DROP TABLE IF EXISTS " . $dbTables['reply'] . ";");
					$con->modify("DROP TABLE IF EXISTS " . $dbTables['posts'] . ";");
					$con->modify("DROP TABLE IF EXISTS " . $dbTables['censored'] . ";");
					$con->modify("DROP TABLE IF EXISTS " . $dbTables['smilies'] . ";");
					$con->modify("DROP TABLE IF EXISTS " . $dbTables['ip'] . ";");
					$con->modify("DROP TABLE IF EXISTS " . $dbTables['backupLog'] . ";");

					$con->close();

					echo '<div id="previous"><a href="index.php?a=newAdmin&lang=' . $instLang . '">' . $lang['previous'] . '</a></div>';
				}
			}

			@$con->close();
		}
		else {
			echo "<div class=\"msgError\">" . $lang['dataError'] . "</div>";
			echo '<div id="previous"><a href="index.php?a=newAdmin&lang=' . $instLang . '">' . $lang['previous'] . '</a></div>';
		}
	}
}

echo '</div>';

?>
