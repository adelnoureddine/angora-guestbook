<?php

$continue = true;

echo '<div>
	<div class="title">' . $lang['requiredSettings'] . '</div>
	<table class="table">
		<tr>
			<td>' . $lang['phpVersion'] . '</td>
			<td>';

			if (phpversion() >= 5.2)
				echo '<span class="ok">' . $lang['ok'] . '</span>';
			else {
				echo '<span class="no">' . $lang['no'] . ' - ' . phpversion() . '</span>';
				$continue = false;
			}

		echo '</td>
		</tr>
		<tr>
			<td>' . $lang['mysqlSupport'] . '</td>
			<td>';

			if (function_exists('mysqli_connect'))
				echo '<span class="ok">' . $lang['ok'] . '</span>';
			else {
				echo '<span class="no">' . $lang['no'] . '</span>';
				$continue = false;
			}

		echo '</td>
		</tr>
		<tr>
			<td>' . $lang['mysqlVersion'] . '</td>
			<td>';

			if (mysqli_get_client_info() >= 4.1)
				echo '<span class="ok">' . $lang['ok'] . '</span>';
			else {
				echo '<span class="no">' . $lang['no'] . ' - ' . mysqli_get_client_info() . '</span>';
			}

		echo '</td>
		</tr>
	</table>

	<div class="title">' . $lang['recommendedSettings'] . '</div>
	<table class="table">
		<tr>
			<td>' . $lang['gdLibrary'] . '</td>
			<td>';

			if (extension_loaded('gd'))
				echo '<span class="ok">' . $lang['ok'] . '</span>';
			else
				echo '<span class="no">' . $lang['no'] . '</span>';

		echo '</td>
		</tr>
		<tr>
			<td>' . $lang['zlibSupport'] . '</td>
			<td>';

			if (extension_loaded('zlib'))
				echo '<span class="ok">' . $lang['ok'] . '</span>';
			else
				echo '<span class="no">' . $lang['no'] . '</span>';

		echo '</td>
		</tr>
	</table>';

	if ($continue) {
		echo '<div id="continue"><a href="index.php?a=licence&lang=' . $instLang . '">' . $lang['next'] . '</a></div>';
	}

echo '</div>';

?>
