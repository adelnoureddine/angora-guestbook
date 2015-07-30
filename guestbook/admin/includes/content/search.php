<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");
	
	echo '<div class="mainTitle">' . $lang['search'] . '</div>';
	echo '<div class="helpPopup ' . $alignHelp . '"><a href="#" onclick="openHelp(\'search\');">' . $lang['help'] . '</a></div>';
	
	echo "
	<form method=\"post\" action=\"index.php?a=posts\">
		<fieldset>
			<p>" . $lang['search'] . " : <input type=\"text\" name=\"searchData\" value=\"\" />
				<select name=\"searchType\">
					<option value='posts'>" . $lang['sPosts'] . "</option>
					<option value='ip'>" . $lang['sIP'] . "</option>
					<option value='ua'>" . $lang['sUA'] . "</option>
					<option value='countries'>" . $lang['sCountries'] . "</option>
					<option value='trash'>" . $lang['sTrash'] . "</option>
				</select>
				<input type=\"hidden\" name=\"hiddenField\" value=\"\" />
				<input type=\"submit\" name=\"submit\" value=\"" . $lang['search'] . "\" />
			</p>
		</fieldset>
	</form>";

?>