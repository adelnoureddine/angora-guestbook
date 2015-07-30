<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");
	
	$submitId = secureVar($_POST['submit'], 'html');

	$actionId = secureVar($_GET['action'], 'html');
	
	$pageNum = 1;
	// Get page number
	if (! empty($_GET['p']))
		$pageNum = secureVar($_GET['p'], 'html');
	
	// Get page type
	$typeId = secureVar($_GET['t'], 'html');
	$databaseName = $dbTables['posts'];
	$isTrash = false;
	if ((! empty($typeId)) && isset($typeId) && ($typeId == 'trash')) {
		$isTrash = true;
		$databaseName = $dbTables['trash'];
	}
	
	if ($isTrash) {
		echo '<div class="mainTitle">' . $lang['trash'] . '</div>';
		echo '<div class="helpPopup ' . $alignHelp . '"><a href="#" onclick="openHelp(\'trash\');">' . $lang['help'] . '</a></div>';
		
		$submitEmptyTrash = secureVar($_POST['submitEmptyTrash'], 'html');
		if ((! empty($submitEmptyTrash)) && isset($submitEmptyTrash)) {
			$con->connect();
			$queryMsg = "TRUNCATE TABLE " . $dbTables['trash'] . ";";
			if ($con->modify($queryMsg))
				echo "<div class=\"msgSuccess\">" . $lang['changeSuccess'] . "</div>";
			else {
				$con->printError();
				echo "<div class=\"msgError\">" . $lang['dataError'] . "</div>";
			}
			$con->close();
		}
	}
	else {
		echo '<div class="mainTitle">' . $lang['posts'] . '</div>';
		echo '<div class="helpPopup ' . $alignHelp . '"><a href="#" onclick="openHelp(\'posts\');">' . $lang['help'] . '</a></div>';
	}
	
	$postsTable = $dbTables['posts'];
	$trashTable = $dbTables['trash'];
	
	if ($isTrash) {
		$trashTable = $dbTables['posts'];
		$postsTable = $dbTables['trash'];
	}	
	
	$searchUsed = false;
	$postActionId = secureVar($_GET['postid'], 'html');
	
	if ((! empty($actionId)) && isset($actionId)) {
		$con->connect();
		$doQuery = true;
		
		switch ($actionId) {
			case "delete" :
				$queryMsg = "DELETE FROM " . $postsTable . " WHERE id='" . secureVar($postActionId, 'sql') . "';";
				if (! $isTrash) {
					$queryMsgTrash = "INSERT INTO " . $trashTable . " SELECT * FROM " . $postsTable .  " WHERE id='" . secureVar($postActionId, 'sql') . "';";
					$con->modify($queryMsgTrash);
				}
				else {
					$queryMsgReply = "DELETE FROM " . $dbTables['reply'] . " WHERE post_id='" . secureVar($postActionId, 'sql') . "';";
					$con->modify($queryMsgReply);
				}
				break;
			case "banIP" :
				// Get IP for id post
				$con->getRows("Select ip from " . $postsTable . " where id='" . secureVar($postActionId, 'sql') . "';");
				foreach ($con->queryResult as $res)
					$ipNumber = $res['ip'];
				
				// Add IP to ban table
				$queryMsg = "INSERT INTO " . $dbTables['ip'] . " (id, ip) VALUES (NULL, '" . secureVar($ipNumber, 'sql') . "');";
				break;
			case "unbanIP" :
				// Get IP for id post
				$con->getRows("Select ip from " . $postsTable . " where id='" . secureVar($postActionId, 'sql') . "';");
				foreach ($con->queryResult as $res)
					$ipNumber = $res['ip'];
				
				// Remove IP from ban table
				$queryMsg = "DELETE FROM " . $dbTables['ip'] . " WHERE ip='" . secureVar($ipNumber, 'sql') . "';";
				break;
			case "restore" :
				$queryMsgTrash = "INSERT INTO " . $dbTables['posts'] . " SELECT * FROM " . $dbTables['trash'] .  " WHERE id='" . secureVar($postActionId, 'sql') . "';";
				$con->modify($queryMsgTrash);
				$queryMsg = "DELETE FROM " . $dbTables['trash'] . " WHERE id='" . secureVar($postActionId, 'sql') . "';";
				break;
			case "publish" :
				$queryMsg = "update " . $postsTable . " set publish='1' WHERE id='" . secureVar($postActionId, 'sql') . "';";
				break;
			case "unpublish" :
				$queryMsg = "update " . $postsTable . " set publish='0' WHERE id='" . secureVar($postActionId, 'sql') . "';";
				break;
			case "deleteReply" :
				$queryMsg = "DELETE FROM " . $dbTables['reply'] . " WHERE id='" . secureVar($postActionId, 'sql') . "';";
				break;
			case "deleteUnpublishedPosts" :
				$queryMsgTrash = "INSERT INTO " . $trashTable . " SELECT * FROM " . $postsTable .  " WHERE publish='0';";
				$con->modify($queryMsgTrash);
				$queryMsg = "DELETE FROM " . $dbTables['posts'] . " WHERE publish='0';";
				break;
			default : 
				$doQuery = false;
		}
		
		if ($doQuery) {
			if ($con->modify($queryMsg))
				echo "<div class=\"msgSuccess\">" . $lang['changeSuccess'] . "</div>";
			else {
				$con->printError();
				echo "<div class=\"msgError\">" . $lang['dataError'] . "</div>";
			}
		}
		
		$con->close();
	}
	
	$messageData = secureVar($_POST['modifyMessage'], 'html');
		
	if ((! empty($messageData)) && isset($messageData)) {
		$con->connect();
		$queryMsg = "update " . $postsTable . " set message='" . secureVar($messageData, 'sql') . "' WHERE id='" . secureVar($postActionId, 'sql') . "';";
		if ($con->modify($queryMsg))
			echo "<div class=\"msgSuccess\">" . $lang['changeSuccess'] . "</div>";
		else {
			$con->printError();
			echo "<div class=\"msgError\">" . $lang['dataError'] . "</div>";
		}
		$con->close();
		unset($submitId);
	}
	
	$replyData = secureVar($_POST['replyMessage'], 'html');
		
	if ((! empty($replyData)) && isset($replyData)) {
		$con->connect();
		$queryMsg = "INSERT INTO " . $dbTables['reply'] . " (
			`id` ,
			`admin_id` ,
			`post_id` ,
			`name` ,
			`date` ,
			`message`
			)
			VALUES (
			NULL , '" . secureVar($_SESSION['id'], 'sql') . "', '" . secureVar($postActionId, 'sql') . "', '" . secureVar($_SESSION['username'], 'sql') . "', '" . secureVar(time(), 'sql') . "', '" . secureVar($replyData, 'sql') . "'
			);";
		if ($con->modify($queryMsg))
			echo "<div class=\"msgSuccess\">" . $lang['changeSuccess'] . "</div>";
		else {
			$con->printError();
			echo "<div class=\"msgError\">" . $lang['dataError'] . "</div>";
		}
		$con->close();
		unset($submitId);
	}
	
	$replyAdminData = secureVar($_POST['modifyReplyMessage'], 'html');
		
	if ((! empty($replyAdminData)) && isset($replyAdminData)) {
		$con->connect();
		$queryMsg = "update " . $dbTables['reply'] . " set message='" . secureVar($replyAdminData, 'sql') . "' WHERE id='" . secureVar($postActionId, 'sql') . "';";
		if ($con->modify($queryMsg))
			echo "<div class=\"msgSuccess\">" . $lang['changeSuccess'] . "</div>";
		else {
			$con->printError();
			echo "<div class=\"msgError\">" . $lang['dataError'] . "</div>";
		}
		$con->close();
		unset($submitId);
	}
	
	$checkedItems = $_POST['checkedItems'];
	if(! empty($checkedItems) && isset($checkedItems)) {
		$result = false;
		$items = explode(',', $checkedItems);
		$resultNewQuery = false;
		$actionIPDone = true;
		
		$con->connect();
		
		/**
		 * Do treatments, delete/ban/publish/unpublish
		 */
		if (isset($_POST['delete']) && !empty($_POST['delete'])) {
			foreach ($items as $value) {
				$queryMsg = "DELETE FROM " . $postsTable . " WHERE id='" . secureVar($value, 'sql') . "';";
				if (! $isTrash) {
					$queryMsgTrash = "INSERT INTO " . $trashTable . " SELECT * FROM " . $postsTable .  " WHERE id='" . secureVar($value, 'sql') . "';";
					$con->modify($queryMsgTrash);
				}
				else {
					$queryMsgReply = "DELETE FROM " . $dbTables['reply'] . " WHERE post_id='" . secureVar($value, 'sql') . "';";
					$con->modify($queryMsgReply);
				}
				if ($con->modify($queryMsg))
					$resultNewQuery = true;
				else
					$resultNewQuery = false;
			}
		}
		elseif (isset($_POST['ban']) && !empty($_POST['ban'])) {
			$actionIPDone = false;
			$addedIP = true;
			
			foreach ($items as $value) {
				// Get IP for id post
				$con->getRows("Select ip from " . $postsTable . " where id='" . secureVar($value, 'sql') . "';");
				foreach ($con->queryResult as $res)
					$ipNumber = $res['ip'];
				
				if ($addedIP) {
					$queryBannedIP = "Select ip from " . $dbTables['ip'] . ";";
					$con->getRows($queryBannedIP);
					if ($con->getNumRows() > 0) {
						foreach ($con->queryResult as $res) {
							$bannedNewIPs[] = $res['ip'];
						}
					}
				}
				
				if (empty($bannedNewIPs) || !in_array($ipNumber, $bannedNewIPs)) {
					// Add IP to ban table
					$queryMsg = "INSERT INTO " . $dbTables['ip'] . " (id, ip) VALUES (NULL, '" . secureVar($ipNumber, 'sql') . "');";
					if ($con->modify($queryMsg)) {
						echo "<div class=\"msgSuccess\">" . $lang['changeSuccess'] . "</div>";
						$addedIP = true;
					}
					else {
						$con->printError();
						$addedIP = false;
						echo "<div class=\"msgError\">" . $lang['dataError'] . "</div>";
					}
				}
				else {
					$addedIP = false;
					echo "<div class=\"msgError\">" . $ipNumber . ' ' . $lang['ipBanned'] . "</div>";
				}
			}
		}
		elseif (isset($_POST['publish']) && !empty($_POST['publish'])) {
			foreach ($items as $value) {
				$queryMsg = "update " . $postsTable . " set publish='1' WHERE id='" . secureVar($value, 'sql') . "';";
				if ($con->modify($queryMsg))
					$resultNewQuery = true;
				else
					$resultNewQuery = false;
			}
		}
		elseif (isset($_POST['unpublish']) && !empty($_POST['unpublish'])) {
			foreach ($items as $value) {
				$queryMsg = "update " . $postsTable . " set publish='0' WHERE id='" . secureVar($value, 'sql') . "';";
				if ($con->modify($queryMsg))
					$resultNewQuery = true;
				else
					$resultNewQuery = false;
			}
		}
		elseif (isset($_POST['restore']) && !empty($_POST['restore'])) {
			foreach ($items as $value) {
				$queryMsgTrash = "INSERT INTO " . $dbTables['posts'] . " SELECT * FROM " . $dbTables['trash'] .  " WHERE id='" . secureVar($value, 'sql') . "';";
				$con->modify($queryMsgTrash);
				$queryMsg = "DELETE FROM " . $dbTables['trash'] . " WHERE id='" . secureVar($value, 'sql') . "';";
				if ($con->modify($queryMsg))
					$resultNewQuery = true;
				else
					$resultNewQuery = false;
			}
		}
		else {
			$doNewQuery = false;
		}
		
		if ($actionIPDone) {
			if ($resultNewQuery)
				echo "<div class=\"msgSuccess\">" . $lang['changeSuccess'] . "</div>";
			else {
				$con->printError();
				echo "<div class=\"msgError\">" . $lang['dataError'] . "</div>";
			}
		}

		$con->close();
		unset($submitId);
	}
	
	
	$queryMsg = "";
	
	$con->connect();

	function produceSearchMsg($tableName, $searchString, $ua) {
		global $dbTables;
		// Explode search data into words (explode by blank space)
		$searchData = explode(" ", trim($searchString));
		
		//$queryMsg = "select * from " . $tableName . " where ";
		$queryMsg = "select posts.*, reply.id as rid, reply.post_id as post_id, reply.date as rdate, reply.message as rmessage, reply.name as rname from " . $tableName . " posts LEFT JOIN " . $dbTables['reply'] . " reply ON (posts.id = reply.post_id) where";
		
		// Search each word
		foreach ($searchData as $searchSingleData) {
			// Search is anything + search data + anything
			$searchSingleData = "%".$searchSingleData."%";
			
			if ($ua)
				$queryMsg .= " posts.useragent LIKE '" . secureVar($searchSingleData, 'sql') . "' ||";
			else 
				$queryMsg .= " posts.name LIKE '" . secureVar($searchSingleData, 'sql') . "' || posts.message LIKE '" . secureVar($searchSingleData, 'sql') . "' ||";
		}
		
		// Remove additional ||
		$queryMsg = substr($queryMsg,0,(strLen($queryMsg)-3));
		$queryMsg .= " group by posts.date desc;";
		return $queryMsg;
	}
	
	// Get post id
	$postId = secureVar($_GET['id'], 'html');
	
	// Get flag
	$countryId = secureVar($_GET['cc'], 'html');
	
	if ((! empty($postId)) && isset($postId) && is_numeric($postId))
		$queryMsg = "select posts.*, reply.id as rid, reply.post_id as post_id, reply.date as rdate, reply.message as rmessage, reply.name as rname from " . $databaseName . " posts LEFT JOIN " . $dbTables['reply'] . " reply ON (posts.id = reply.post_id) where posts.id=\"" . secureVar($postId, 'sql')  . "\";";
		
	// Get single country posts
	elseif ((!empty($countryId)) && isset($countryId) && (strlen($countryId) == 2))
		$queryMsg = "select posts.*, reply.id as rid, reply.post_id as post_id, reply.date as rdate, reply.message as rmessage, reply.name as rname from " . $databaseName . " posts LEFT JOIN " . $dbTables['reply'] . " reply ON (posts.id = reply.post_id) where posts.country=\"" . secureVar($countryId, 'sql')  . "\" group by posts.date desc;";

	elseif ((! empty($submitId)) && isset($submitId)) {
		
		$searchUsed = true;
		
		// Get search query and type
		$searchCheck['searchData'] = secureVar(trim($_POST['searchData']), 'html');
		$searchCheck['searchType'] = secureVar(trim($_POST['searchType']), 'html');
		$searchCheck['hidden'] = secureVar(trim($_POST['hiddenField']), 'html');

		if ($searchCheck['hidden'] != '') {
			$error = new Error("Humans only ! Go away WALL&#183;E");
			die($error->showError());
		}
		
		$errorField = '';
		if (($searchCheck['searchData'] == '') ||  empty($searchCheck['searchData']))
			$errorField .= $lang['searchData'] . ' ' . $lang['isEmpty'] . '<br />';
		
		if (($searchCheck['searchType'] == '') ||  empty($searchCheck['searchType']))
			$errorField .= $lang['searchType'] . ' ' . $lang['isEmpty'] . '<br />';
		
		if ($errorField != '') {
			echo "<div class=\"msgError\">$errorField</div>";
		}
		else {
			switch ($searchCheck['searchType']) {
				case "posts" :
					$queryMsg = produceSearchMsg($dbTables['posts'], $searchCheck['searchData'], false);
					break;
				case "ip" :
					$queryMsg = "select posts.*, reply.id as rid, reply.post_id as post_id, reply.date as rdate, reply.message as rmessage, reply.name as rname from " . $databaseName . " posts LEFT JOIN " . $dbTables['reply'] . " reply ON (posts.id = reply.post_id) where posts.ip LIKE '" . secureVar($searchCheck['searchData'], 'sql') . "';";
					break;
				case "ua" :
					$queryMsg = produceSearchMsg($dbTables['posts'], $searchCheck['searchData'], true);
					break;
				case "countries" :
					$queryMsg = "select posts.*, reply.id as rid, reply.post_id as post_id, reply.date as rdate, reply.message as rmessage, reply.name as rname from " . $databaseName . " posts LEFT JOIN " . $dbTables['reply'] . " reply ON (posts.id = reply.post_id) where posts.country LIKE '" . secureVar($searchCheck['searchData'], 'sql') . "';";
					break;
				case "trash" :
					$queryMsg = produceSearchMsg($dbTables['trash'], $searchCheck['searchData'], false);
					break;
				default : ;
			}
		}
	}
	else {
		// Get all posts
		if ($config['pagesFormat'] == 'allinone')
			$queryMsg = "select posts.*, reply.id as rid, reply.post_id as post_id, reply.date as rdate, reply.message as rmessage, reply.name as rname from " . $databaseName . " posts LEFT JOIN " . $dbTables['reply'] . " reply ON (posts.id = reply.post_id) group by posts.date desc;";

		// Get posts for the selected page
		elseif ($config['pagesFormat'] == 'several') {	
			$startingPostNum = ($pageNum - 1) * $config['numPostsPerPage'];
			
			$queryMsg = "select posts.*, reply.id as rid, reply.post_id as post_id, reply.date as rdate, reply.message as rmessage, reply.name as rname from " . $databaseName . " posts LEFT JOIN " . $dbTables['reply'] . " reply ON (posts.id = reply.post_id) group by posts.date desc limit " . secureVar($startingPostNum, 'sql') . " , " . secureVar($config['numPostsPerPage'], 'sql') . ";";
		}
		else {
			$error = new Error("The Cat doesn't know how to display the posts !");
			die($error->showError());
		}
	}
	
	if (!$isTrash) {
		$queryMsgUnpublished = "select id from " . $databaseName . " where publish='0';";
		$con->getRows($queryMsgUnpublished);
		if ($con->getNumRows() > 0)
			echo '<p><a href="index.php?a=posts&p=' . $pageNum . '&action=deleteUnpublishedPosts">-> ' . $lang['deleteUnpublishedPosts'] . '</a></p>';
	}
	
	
	
	// Get censored and smilies replacment lists
	// Get it before process query, in order not to interfere with the other querie
	
	include_once '../classes/manage/message.class.php';
	$censoredList = Message::getCensoredList();
	$smiliesReplacement = Message::getSmiliesReplacement();	
	
	// Get banned IPs list
	$queryMsgIP = "Select ip from " . $dbTables['ip'] . ";";
	$con->getRows($queryMsgIP);
	if ($con->getNumRows() > 0) {
		foreach ($con->queryResult as $res) {
			$bannedIPs[] = $res['ip'];
		}
	}
	
	
	$con->getRows($queryMsg);
	
	if ($con->getNumRows() > 0) {
		
		if ($isTrash) {
			echo '<form method="post" action="index.php?a=posts&t=trash">
				<fieldset>
					<input type="submit" name="submitEmptyTrash" value="' . $lang['emptyTrash'] . '" />
				</fieldset>
			</form>';
		}
		
		?>
		<script type="text/javascript">
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
			
			function checkAllFields(ref) {
				var chkAll = document.getElementById('checkAll');
				var checks = document.getElementsByName('checked_items[]');
				var checkedArray = new Array();
				var checked = document.getElementById('checkedItems');
				var boxLength = checks.length;
				var allChecked = false;
				var totalChecked = 0;
				
				if (ref == "all") {
					if (chkAll.checked == true) {
						for (i=0; i < boxLength; i++)
						checks[i].checked = true;
					}
					else {
						for (i=0; i < boxLength; i++)
						checks[i].checked = false;
					}
				}
				else {
					for (i=0; i < boxLength; i++) {
						if (checks[i].checked == true) {
							allChecked = true;
							continue;
						}
						else {
							allChecked = false;
							break;
						}
					}
					if (allChecked == true)
						chkAll.checked = true;
					else
						chkAll.checked = false;
				}
				
				for (j=0; j < boxLength; j++) {
					if (checks[j].checked == true)
						checkedArray.push(checks[j].value);
				}

				checked.value = checkedArray;
			}
		</script>
		
		<?php		
		
		include_once '../classes/manage/statistics.class.php';
		include_once '../classes/manage/countries.class.php';
		
		if ($con->getNumRows() > 1) {
			$urlGlobalActionPrefix = "index.php?a=posts&p=" . $pageNum;
	
			if ($isTrash) {
				$urlGlobalActionPrefix .= "&t=trash";
				$globalActionsMenu = '<input type="submit" name="restore" value="' . $lang['pRestore'] . '" /> - <input type="submit" name="delete" value="' . $lang['pDelete'] . '" /> - <input type="submit" name="ban" value="' . $lang['pBanIP'] . '" />';
			}
			else {
				$globalActionsMenu = '<input type="submit" name="delete" value="' . $lang['pDelete'] . '" /> - <input type="submit" name="ban" value="' . $lang['pBanIP'] . '" /> - <input type="submit" name="publish" value="' . $lang['pPublish'] . '" /> - <input type="submit" name="unpublish" value="' . $lang['pUnpublish'] . '" />';
			}
						
			echo "<form action=\"" . $urlActionPrefix . "\" method=\"post\"><fieldset>
			<table class=\"tablePosts\">
				<tr class=\"topInfosActions\">
					<td>" . $lang['globalActions'] . " : " . $globalActionsMenu . "
					</td>
					<td align=\"right\" width=\"10%\"><input type=\"checkbox\" onclick=\"checkAllFields('all');\" id=\"checkAll\" /></td>
				</tr>
			</table>
			<input type=\"hidden\" name=\"checkedItems\" id=\"checkedItems\" />
			</fieldset></form>";
		}
		
		foreach ($con->queryResult as $res) {
			// Get data, format it if necessary, and publish it
			$userAgent = new Statistics($res['useragent']);
			$countryName = new Countries();
			$messageValue = Message::formatMessage(secureVar($res['message'], 'html'), $censoredList);
			$messageValue = Message::formatSmilies($messageValue, "admin", $smiliesReplacement);
			
			$banIpLang = $lang['pBanIP'];
			$banIpAction = "banIP";
			if ((! empty($bannedIPs)) && (in_array($res['ip'], $bannedIPs))) {
				$banIpLang = $lang['pUnbanIP'];
				$banIpAction = "unbanIP";
			}
			
			$publishLang = $lang['pUnpublish'];
			$publishAction = "unpublish";
			$topInfoStyle = "topInfosActions";
			if (! $res['publish']) {
				$publishLang = $lang['pPublish'];
				$publishAction = "publish";
				$topInfoStyle = "topInfosActionsUnpublished";
			}
			
			echo "<div class=\"posts\">
				<table class=\"tablePosts\">
					<tr class=\"" . $topInfoStyle . "\">
						<td>" . $lang['actions'] . " : ";
						$urlActionPrefix = "<a href=\"index.php?a=posts&p=" . $pageNum . "&postid=" . secureVar($res['id'], 'html') . "&action=";
						if ($isTrash) {
							echo $urlActionPrefix . "restore&t=trash\">" .  $lang['pRestore'] . "</a> - " 
							. $urlActionPrefix . "delete&t=trash\">" .  $lang['pDelete'] . "</a> - ";
							echo $urlActionPrefix . $banIpAction . "&t=trash\">" .  $banIpLang . "</a>";
						}
						else {
							echo $urlActionPrefix . "modify\">" .  $lang['pModify'] . "</a> - " 
							. $urlActionPrefix . "delete\"\">" .  $lang['pDelete'] . "</a> - ";
							
							if ($res['rid'] == NULL)
								echo $urlActionPrefix . "reply\">" .  $lang['pReply'] . "</a> - ";

							echo $urlActionPrefix . $banIpAction . "\">" .  $banIpLang . "</a> - ";
							echo $urlActionPrefix . $publishAction . "\">" . $publishLang;
						}
			 			echo "</a></td>
			 			<td align=\"right\" width=\"10%\">
			 				<input type=\"checkbox\" value=\"" . secureVar($res['id'], 'html') . "\" name=\"checked_items[]\" onclick=\"checkAllFields(" . secureVar($res['id'], 'html') . ");\" />
			 			</td>
					</tr>
					<tr class=\"topInfos\">
						<td>";
			 			if ($isTrash)
			 				echo secureVar($res['name'], 'html');
			 			else
			 				echo "<a href=\"index.php?a=posts&id=" . secureVar($res['id'], 'html') . "\">" . secureVar($res['name'], 'html') . "</a>";
			 			echo ", " . date($config['dateFormat'], secureVar($res['date'], 'html')) . ", 
							" . secureVar($res['location'], 'html') . " <a href=\"index.php?a=posts&cc=" . secureVar($res['country'], 'html') . "\"><img src=\"../images/countries/" . secureVar($res['country'], 'html') . ".png\" 
							alt=\"" . $countryName->getCountry($res['country']) . "\" /></a> 
						</td>
						<td>
							<a href=\"javascript:toggle(" . secureVar($res['id'], 'html') . ")\"><img src=\"../images/posts/toggle1.gif\" id=\"m" . secureVar($res['id'], 'html') . "\" alt=\"toggle\" /></a>
						</td>
					</tr>
					<tr>
						<td colspan=\"2\" class=\"message\" id='i" . secureVar($res['id'], 'html') . "'>";
			 			if (isset($actionId) && ($postActionId == secureVar($res['id'], 'html'))) {
			 				$urlActionPrefix = "index.php?a=posts&p=" . $pageNum . "&postid=" . secureVar($res['id'], 'html');
				 				if ($isTrash)
				 					$urlActionPrefix .= "&t=trash";
				 			if ($actionId == 'modify') {
				 				echo "<form action=\"" . $urlActionPrefix . "\" method=\"post\"><fieldset>
				 					<textarea name='modifyMessage' rows='5' cols='50' onfocus='this.select()'>" .  htmlspecialchars_decode(secureVar($res['message'], 'html'), ENT_QUOTES) . "</textarea>
				 					<input type=\"hidden\" name=\"postid\" value=\"" . secureVar($res['id'], 'html') . "\" />
				 					<input type=\"submit\" name=\"submit\" value=\"" . $lang['modify'] . "\" />
				 					</fieldset></form>";
				 			}
				 			elseif ($actionId == 'reply') {
				 				echo $messageValue . "<hr />
				 				<form action=\"" . $urlActionPrefix . "\" method=\"post\"><fieldset>
				 					<textarea name='replyMessage' rows='5' cols='35'></textarea>
				 					<input type=\"hidden\" name=\"postid\" value=\"" . secureVar($res['id'], 'html') . "\" />
				 					<input type=\"submit\" name=\"submit\" value=\"" . $lang['modify'] . "\" />
				 					</fieldset></form>";
				 			}
				 			else
				 				echo $messageValue;
			 			}
			 			else
			 				echo $messageValue;
			 		echo"</td>
					</tr>
					<tr class=\"topInfos\">
						<td colspan=\"2\">" . $lang['lUserAgent'] . " : " . $userAgent->getUserAgent() . "</td>
					</tr>
					<tr class=\"topInfos\">
						<td>" . $lang['pEmail'] . " : " . secureVar(base64_decode($res['email']), 'html') . "</td>
						<td><img src=\"../images/os/icon_" . $userAgent->getOS() . ".png\" alt=\"OS\" />
						<img src=\"../images/browsers/icon_" . $userAgent->getBrowser() . ".png\" alt=\"Browser\" /></td>
					</tr>
					<tr class=\"topInfos\">
						<td>" . $lang['pIP'] . " : " . secureVar($res['ip'], 'html') . "</td>
						<td><img src=\"../images/stars/" . secureVar($res['rating'], 'html') . ".gif\" alt=\"" . secureVar($res['rating'], 'html') . "\" /></td>
					</tr>
				</table>";
			
			// Admin reply
		 	if ($res['rid'] != NULL) {
				$messageValue = Message::formatMessage(secureVar($res['rmessage'], 'html'), $censoredList);
				$messageValue = Message::formatSmilies($messageValue, "admin", $smiliesReplacement);
				
				echo "<table class=\"tableReply\">
					<tr class=\"topInfos\">
						<td align=\"left\">" 
						. secureVar(base64_decode($res['rname']), 'html') . "</a>, " . date($config['dateFormat'], secureVar($res['rdate'], 'html'));
				echo "</td>
						<td align=\"right\">";
						$urlActionPrefix = "<a href=\"index.php?a=posts&p=" . $pageNum . "&postid=" . secureVar($res['rid'], 'html') . "&action=";
						echo $urlActionPrefix . "modifyReply\">" .  $lang['pModify'] . "</a> - ";
						echo $urlActionPrefix . "deleteReply\">" .  $lang['pDelete'] . "</a>
						</td>
					</tr>
					<tr>
						<td class=\"message\" colspan=\"2\">";
						if ($actionId == 'modifyReply') {
			 				echo "<form action=\"index.php?a=posts&p=" . $pageNum . "&postid=" . secureVar($res['rid'], 'html') . "&action=modifiedReply\" method=\"post\"><fieldset>
			 					<textarea name='modifyReplyMessage' rows='5' cols='50' onfocus='this.select()'>" . htmlspecialchars_decode(secureVar($res['rmessage'], 'html'), ENT_QUOTES) . "</textarea>
			 					<input type=\"hidden\" name=\"postid\" value=\"" . secureVar($res['rid'], 'html') . "\" />
			 					<input type=\"submit\" name=\"submit\" value=\"" . $lang['modify'] . "\" />
			 					</fieldset></form>";
			 			}
			 			else
			 				echo $messageValue;
					echo "</td>
					</tr>
				</table>";
		 	}
			
			echo "</div>";
		}
				
		if (
		((! empty($postId)) && isset($postId) && is_numeric($postId)) 
		|| ((!empty($countryId)) && isset($countryId) && (strlen($countryId) == 2)) 
		|| ($config['pagesFormat'] == 'allinone')
		|| ($searchUsed)
		) {
			$con->close();
		} else {
			$con->connect();
			$con->getRows("select id from " . $databaseName . " group by date desc;");
			$numRowsAll = $con->getNumRows();
			$con->close();
			$numPages = ceil(($numRowsAll / $config['numPostsPerPage']));

			if ($numPages > 1)
				require_once 'includes/boxes/pageLinks.php';
		}
	}
	else {
		$con->close();
		echo $lang['noPostsToYourQuery'];
	}

?>