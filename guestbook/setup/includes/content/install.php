<?php

echo '<div>
	<div class="title">' . $lang['mysqlConfiguration'] . '</div>
	<form method="post" action="index.php?a=config&lang=' . $instLang . '">
		<fieldset>
			<table class="table">
				<tr>
					<td>' . $lang['host'] . '</td>
					<td><input type="text" name="host" value="" /></td>
				</tr>
				<tr>
					<td>' . $lang['username'] . '</td>
					<td><input type="text" name="username" value="" /></td>
				</tr>
				<tr>
					<td>' . $lang['password'] . '</td>
					<td><input type="text" name="password" value="" /></td>
				</tr>
				<tr>
					<td>' . $lang['database'] . '</td>
					<td><input type="text" name="database" value="" /></td>
				</tr>
				<tr>
					<td>' . $lang['prefix'] . '</td>
					<td><input type="text" name="prefix" value="angora_" /></td>
				</tr>
			</table>
	
			<div class="title">' . $lang['guestbookConfiguration'] . '</div>
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
				<tr>
					<td>' . $lang['adminEmail'] . '</td>
					<td><input type="text" name="adminEmail" value="" /></td>
				</tr>
			</table>
			<div id="continue">
				<input type="hidden" name="hidden" value="Lupa" />
				<input type="submit" name="submit" value="' . $lang['next'] . '" />
			</div>
		</fieldset>
	</form>
</div>';

?>