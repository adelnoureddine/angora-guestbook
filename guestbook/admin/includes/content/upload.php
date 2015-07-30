<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");
	
	echo '<div class="mainTitle">' . $lang['uploadCenter'] . '</div>';
	echo '<div class="helpPopup ' . $alignHelp . '"><a href="#" onclick="openHelp(\'upload\');">' . $lang['help'] . '</a></div>';
	
	$submitId = secureVar($_POST['submit'], 'html');
	
	$deleteFile = secureVar($_GET['file'], 'html');
		
	if ((! empty($deleteFile)) && isset($deleteFile)) {
		$deleteFileFolder = secureVar($_GET['dir'], 'html');
		if ($deleteFileFolder == 'smilies') {
			$file = $config['smiliesFolder'] . '/' . base64_decode($deleteFile);
			if (unlink($file))
				echo "<div class=\"msgSuccess\">" . $lang['changeSuccess'] . "</div>";
			else
				echo "<div class=\"msgError\">" . $lang['cantDelete'] . " : " . base64_decode($deleteFile) . "</div>";
		}
	}

	if ((! empty($submitId)) && isset($submitId)) {
		$uploadCheck['uploadFile'] = @$HTTP_POST_FILES['uploadFile']['name'];
		$uploadCheck['uploadLocation'] = secureVar(trim($_POST['uploadLocation']), 'html');
		$uploadCheck['hidden'] = secureVar(trim($_POST['hiddenField']), 'html');
		
		if ($uploadCheck['hidden'] != '') {
			$error = new Error("Humans only ! Go away WALL&#183;E");
			die($error->showError());
		}
		
		$errorField = '';
		if (($uploadCheck['uploadFile'] == '') ||  empty($uploadCheck['uploadFile']))
			$errorField .= $lang['file'] . ' ' . $lang['isEmpty'] . '<br />';
		
		if (($uploadCheck['uploadLocation'] == '') ||  empty($uploadCheck['uploadLocation']))
			$errorField .= $lang['uploadLocation'] . ' ' . $lang['isEmpty'] . '<br />';
		
		if ($errorField != '') {
			echo "<div class=\"msgError\">$errorField</div>";
		}
		else {
			switch ($uploadCheck['uploadLocation']) {
				case 'guestbookSmilies' :
					$uploadDir = $config['smiliesFolder'];
					$allowed_mime_types = array('image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/bmp', 'multipart/x-zip', 'application/x-zip-compressed', 'application/x-zip', 'application/zip');
					break;
				case 'guestbookTheme' :
					$uploadDir = $config['themesFolder'];
					$allowed_mime_types = array('multipart/x-zip', 'application/x-zip-compressed', 'application/x-zip', 'application/zip');
					break;
				case 'guestbookLang' :
					$uploadDir = $config['langFolder'];
					$allowed_mime_types = array('multipart/x-zip', 'application/x-zip-compressed', 'application/x-zip', 'application/zip');
					break;
				default :
					$uploadDir = $config['smiliesFolder'];
					$allowed_mime_types = array('image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/bmp', 'multipart/x-zip', 'application/x-zip-compressed', 'application/x-zip', 'application/zip');
					break;
			}
			
			$uploadDir .= "/";
			
			require_once '../classes/auc/auc.class.php';
			$auc = new auc();
			$auc->upload_dir($uploadDir, false);
			$auc->make_safe = true;
			$auc->max_file_size = 5242880;
			$auc->overwrite = true;
			$auc->check_file_type = 'allowed';
			$auc->allowed_mime_types = $allowed_mime_types;
			$result = $auc->upload(uploadFile);
			if (is_array($result)) {
				echo "<div class=\"msgError\">" . $lang['uploadError'] . "</div>";
				echo '<pre>' . var_dump($result) . '</pre>';
			}
			else
				echo "<div class=\"msgSuccess\">" . $lang['changeSuccess'] . "</div>";
		}
	}

	echo "
	<form method=\"post\" action=\"index.php?a=upload\" enctype=\"multipart/form-data\">
		<fieldset>
			" . $lang['file'] . " : <input type='file' name='uploadFile' />
			<select name='uploadLocation'>
				<option value='guestbookSmilies'>" . $lang['uploadSmilies'] . "</option>
				<option value='guestbookTheme'>" . $lang['uploadThemes'] . "</option>
				<option value='guestbookLang'>" . $lang['uploadLanguages'] . "</option>
			</select>
				
			<input type=\"hidden\" name=\"hiddenField\" value=\"\" />
			<input type=\"submit\" name=\"submit\" value=\"" . $lang['upload'] . "\" />
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
	            echo '&nbsp;&nbsp;<a href="index.php?a=upload&file=' . base64_encode($file) . '&dir=smilies" onclick="if (! window.confirm(\'' . $lang['sure'] . '\')) return false;"><img src="../images/admin/delete.gif" alt="delete" /></a> 
	            <a href="../images/custom/' . secureVar($file, 'html') . '" onclick="window.open(this.href);return false;">' . secureVar($file, 'html') . '</a><br />';
	        }
    	}
    	closedir($handle);
	}
	echo '</div>';

?>