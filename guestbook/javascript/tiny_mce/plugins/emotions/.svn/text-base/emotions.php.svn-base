<?php

session_start();
session_regenerate_id();

$magic = "0xDEADBEEF";

require_once '../../../../configuration.php';
include_once '../../../../classes/functions.php';

startCompression();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>{#emotions_dlg.title}</title>
	<script type="text/javascript" src="../../tiny_mce_popup.js"></script>
	<script type="text/javascript" src="js/emotions.js"></script>
	<base target="_self" />
</head>
<body>
	<div align="center">
		<div class="title">{#emotions_dlg.title}:<br /><br /></div>
		
		<table border="0" cellspacing="0" cellpadding="4">
		  <tr>
			<td><a href="javascript:EmotionsDialog.insert(':)');"><img src="../../../../images/smilies/smile.gif" alt=":)" title=":)" border="0" /></a></td>
			<td><a href="javascript:EmotionsDialog.insert(';)');"><img src="../../../../images/smilies/wink.gif" alt=";)" title=";)" border="0" /></a></td>
			<td><a href="javascript:EmotionsDialog.insert(':D');"><img src="../../../../images/smilies/laugh.gif" alt=":D" title=":D" border="0" /></a></td>
			<td><a href="javascript:EmotionsDialog.insert(':(');"><img src="../../../../images/smilies/sad.gif" alt=":(" title=":(" border="0" /></a></td>
		  </tr>
			<td><a href="javascript:EmotionsDialog.insert(':mad:');"><img src="../../../../images/smilies/mad.gif" alt=":mad:" title=":mad:" border="0" /></a></td>
			<td><a href="javascript:EmotionsDialog.insert(':eek:');"><img src="../../../../images/smilies/eek.gif" alt=":eek:" title=":eek:" border="0" /></a></td>
			<td><a href="javascript:EmotionsDialog.insert(':conf:');"><img src="../../../../images/smilies/confused.gif" alt=":conf:" title=":conf:" border="0" /></a></td>
			<td><a href="javascript:EmotionsDialog.insert(':tong:');"><img src="../../../../images/smilies/tongue.gif" alt=":tong:" title=":tong:" border="0" /></a></td>
		  <tr>
		  </tr>
			<td><a href="javascript:EmotionsDialog.insert(':cool:');"><img src="../../../../images/smilies/cool.gif" alt=":cool:" title=":cool:" border="0" /></a></td>
			<td><a href="javascript:EmotionsDialog.insert(':shy:');"><img src="../../../../images/smilies/shy.gif" alt=":shy:" title=":shy:" border="0" /></a></td>
			<td><a href="javascript:EmotionsDialog.insert(':love:');"><img src="../../../../images/smilies/love.gif" alt=":love:" title=":love:" border="0" /></a></td>
			<td><a href="javascript:EmotionsDialog.insert(':ssmile:');"><img src="../../../../images/smilies/sunsmile.gif" alt=":ssmile:" title=":ssmile:" border="0" /></a></td>
		  <tr>
		  </tr>
			<td><a href="javascript:EmotionsDialog.insert(':angry:');"><img src="../../../../images/smilies/angry.gif" alt=":angry:" title=":angry:" border="0" /></a></td>
			<td><a href="javascript:EmotionsDialog.insert(':cry:');"><img src="../../../../images/smilies/cry.gif" alt=":cry:" title=":cry:" border="0" /></a></td>
			<td><a href="javascript:EmotionsDialog.insert(':sleep:');"><img src="../../../../images/smilies/sleep.gif" alt=":sleep:" title=":sleep:" border="0" /></a></td>
			<td><a href="javascript:EmotionsDialog.insert(':music:');"><img src="../../../../images/smilies/music.gif" alt=":music:" title=":music:" border="0" /></a></td>
		  <tr>
		  </tr>
		</table>
		
		<?php 
			$con->connect();
			$queryMsg = "Select * from " . $dbTables['smilies'] . ";";
			$con->getRows($queryMsg);
			
			foreach ($con->queryResult as $res) {
				echo '<br />';
				echo "<a href=\"javascript:EmotionsDialog.insert('" . $res['name'] . "');\"><img src=\"" . $res['path'] . "\" alt=\"" . $res['name'] . "\" title=\"" . $res['name'] . "\" border=\"0\" /></a>";
			}
			
			$con->close();
		?>
	</div>
</body>
</html>