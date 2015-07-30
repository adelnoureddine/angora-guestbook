<?php
echo '<div class="title">' . $lang['guestbookConfiguration'] . '</div>
<form method="post" action="index.php?a=update&lang=' . $instLang . '">
	<fieldset>
		<table class="table">
			<tr>
				<td>' . $lang['adminName'] . '</td>
				<td><input type="text" name="adminName" value="" /></td>
			</tr>
			<tr>
				<td>' . $lang['adminPass'] . '</td>
				<td>
					<input type="password" name="adminPass" value="" onkeyup="passwordStrength(this.value)" />
				</td>
			</tr>
			<tr>
				<td>
					<div id="passwordStrength" class="strength1"></div>
				</td>
				<td>
                     <div id="passwordDescription">' . $lang['passNotEntered'] . '</div>
				</td>
			</tr>
			<tr>
				<td>' . $lang['adminPassConf'] . '</td>
				<td><input type="password" name="adminPassConf" value="" /></td>
			</tr>
		</table>
		<div id="continue">
			<input type="hidden" name="hidden" value="Romulus and Remus" />
			<input type="submit" name="submit" value="' . $lang['next'] . '" />
		</div>
	</fieldset>
</form>';
?>