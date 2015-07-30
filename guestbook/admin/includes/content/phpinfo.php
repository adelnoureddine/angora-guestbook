<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");
	
	if (base64_decode($_SESSION['privilege']) != 1) {
		$error = new Error($lang['noPermission']);
		die($error->showError());
	}
	
	ob_start();
	phpinfo();
	
	preg_match ('%<style type="text/css">(.*?)</style>.*?<body>(.*?)</body>%s', ob_get_clean(), $matches);
	
	echo "<div class='phpinfodisplay'><style type='text/css'>\n",
	    join( "\n",
	        array_map(
	            create_function(
	                '$i',
	                'return ".phpinfodisplay " . preg_replace( "/,/", ",.phpinfodisplay ", $i );'
	                ),
	            preg_split( '/\n/', $matches[1] )
	            )
	        ),
	    "</style>\n",
	    $matches[2],
	    "\n</div>\n";
?>