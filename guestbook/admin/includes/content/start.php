<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");
	
	echo '<div class="mainTitle">' . $lang['start'] . '</div>';
	echo '<div class="helpPopup ' . $alignHelp . '"><a href="#" onclick="openHelp(\'start\');">' . $lang['help'] . '</a></div>';

	$startBoxClass = 'startBox';
	$downloadLink = '';
	if ((empty($_SESSION['latestVersion'])) || (! isset($_SESSION['latestVersion']))) {
		$updateGetURL = true;
		$remoteFile = 'http://aguestbook.sourceforge.net/update.xml';
		try {
			$updatesXML = new SimpleXMLElement($remoteFile, NULL, true);
		}
		catch (Exception $e) {
			try {
				$ch = curl_init();
				$timeout = 5; // set to zero for no timeout
				curl_setopt ($ch, CURLOPT_URL, $remoteFile);
				curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
				
				ob_start();
				curl_exec($ch);
				curl_close($ch);
				$file_content = ob_get_contents();
				ob_end_clean();
				$updatesXML = new SimpleXMLElement($file_content, NULL, false);
			}
			catch (Exception $e) {
				$updateGetURL = false;
			}
		}
		
		if ($updateGetURL) {
			foreach ($updatesXML->update as $updatesElement) {
				$_SESSION['latestVersion'] = (String) $updatesElement->version;
				$_SESSION['dateVersion'] = (String) $updatesElement->date;
				$_SESSION['downloadLink'] = (String) $updatesElement->download;
				$_SESSION['changelogLink'] = (String) $updatesElement->changelog;
				$_SESSION['severityUpdate'] = (String) $updatesElement->severity;
				break;
			}
		}
	}

	$updatesLinks = '';
	if ($config['angVersion'] < $_SESSION['latestVersion']) {
		switch ($_SESSION['severityUpdate']) {
			case 'normal' :
				$classUpdate = 'updateLinksLow';
				$severity = $lang['normalUpdate'];
				break;
			case 'security' :
				$classUpdate = 'updateLinksHigh';
				$severity = $lang['securityUpdate'];
				break;
			default :
				$severity = $lang['normalUpdate'];
				$classUpdate = 'updateLinksLow';
		}
		
		$updatesLinks = '<table border="0" class="' . $classUpdate . '">
			<tr>
				<td colspan="3">' . $lang['newVersionAvailable'] . ' : ' . $_SESSION['latestVersion'] . ' (' . $_SESSION['dateVersion'] . ')</td>
			</tr>
			<tr>
				<td>' . $severity . '</td>
				<td><a href="' . $_SESSION['downloadLink'] . '" onclick="window.open(this.href);return false;">' . $lang['downloadNewVersion'] . '</a></td>
				<td><a href="' . $_SESSION['changelogLink'] . '" onclick="window.open(this.href);return false;">' . $lang['changeLog'] . '</a></td>
			</tr>
		</table>';
	}
	
	echo '<span class="titleMsg">' . $lang['infos'] . '</span>';	
	echo '<div class="startBox">';
	echo $lang['gbVersion'] . ' : ' . $config['angVersion'];
	echo $updatesLinks;
	echo '</div>';
	
	echo '<div class="startBox">';
	echo $lang['phpVersion'] . ' : ' . phpversion();
	echo '<br />';
	$con->connect();
	echo $lang['sqlVersion'] . ' : ';
	echo $con->getVersion();
	echo '</div>';
	
	echo '<div class="startBox">';
	$con->getRows("Select id from " . $dbTables['posts'] . ";");
	echo $lang['numPosts'] . ' : ' . $con->getNumRows();
	echo '<br />';
	echo $lang['loggedAs'] . ' : ' . base64_decode($_SESSION['username']);
	echo '</div>';
	
	$con->close();
	
	echo '<span class="titleMsg">' . $lang['latestNews'] . '</span>';
	echo '<div class="startBox">';
	if ($rss = simplexml_load_file('http://sourceforge.net/export/rss2_projnews.php?group_id=150468')) {
		$data = $rss->channel;
		$i = 0;
		foreach ($data->item as $value) {
			if ($i >= 5)
				break;
			else {
				echo "<a title=\"News\" href=\"" . $value->link . "\" target=\"_blank\">" . utf8_decode($value->title) ."</a>\n";
				echo '<br />';
				$i++;
			}
		}
	}
	echo '</div>';

?>