<?php
	$magic = "0xDEADBEEF";
	$lang = array();
	require_once 'includes/boxes/lang.php';
?>

<!DOCTYPE html 
     PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $lang['lang']; ?>" lang="<?php echo $lang['lang']; ?>" dir="<?php echo $lang['dir']; ?>">

<head>
<link rel="stylesheet" href="style/layout.css" type="text/css" />
<link rel="stylesheet" href="style/style.css" type="text/css" />
<meta http-equiv="Content-Type" lang="<?php echo $lang['lang']; ?>" content="text/html; charset=<?php echo $lang['charset']; ?>" />
<title><?php echo $lang['title']; ?></title>

<script>
function passwordStrength(password)
{
	var desc = new Array();
	desc[1] = "<?php echo $lang['weak']; ?>";
	desc[2] = "<?php echo $lang['better']; ?>";
	desc[3] = "<?php echo $lang['medium']; ?>";
	desc[4] = "<?php echo $lang['strong']; ?>";
	desc[5] = "<?php echo $lang['strongest']; ?>";

	var score = 1;

	//if password bigger than 6 give 1 point
	if (password.length > 6) score++;

	//if password has both lower and uppercase characters give 1 point	
	if ( ( password.match(/[a-z]/) ) && ( password.match(/[A-Z]/) ) ) score++;

	//if password has at least one number give 1 point
	if (password.match(/\d+/)) score++;

	//if password has at least one special caracther give 1 point
	if ( password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) )	score++;

	 document.getElementById("passwordDescription").innerHTML = desc[score];
	 document.getElementById("passwordStrength").className = "strength" + score;
}
</script>

</head>

<body>

<div id="wrapper">
	<div id="header">
		<?php echo $lang['title']; ?>
	</div>
</div>

<div id="bodyWrapper">

<?php

@$pageName = secureVar($_GET['a'], 'html');

if (! empty($pageName)) {
	switch ($pageName) {
		case 'lang' :
			require_once 'includes/content/lang.php';
			break;
		case 'check' :
			require_once 'includes/content/check.php';
			break;
		case 'licence' :
			require_once 'includes/content/license.php';
			break;
		case 'method' :
			require_once 'includes/content/method.php';
			break;
		case 'newAdmin' :
			require_once 'includes/content/newAdmin.php';
			break;
		case 'update' :
			require_once 'includes/content/update.php';
			break;
		case 'update2' :
			require_once 'includes/content/update2.php';
			break;
		case 'install' :
			require_once 'includes/content/install.php';
			break;
		case 'config' :
			require_once 'includes/content/config.php';
			break;
		default :
			require_once 'includes/content/lang.php';
	}
}
else {
	require_once 'includes/content/lang.php';
}

?>

</div>

</body>
</html>