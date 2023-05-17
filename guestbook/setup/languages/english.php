<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

// General
$lang['charset'] = "UTF-8";
$lang['dir'] = "ltr";
$lang['lang'] = "en";
$lang['title'] = "Angora Guestbook Web Installer";
$lang['ok'] = "OK";
$lang['no'] = "NO";
$lang['next'] = "Next >>";
$lang['previous'] = "<< Previous";
$lang['isEmpty'] = "can't be empty!";

// includes/content/lang.php
$lang['language'] = "Language";

// includes/content/check.php
$lang['requiredSettings'] = "Required settings";
$lang['phpVersion'] = "PHP version >= 5.2.0";
$lang['mysqlSupport'] = "MySQL support";
$lang['mysqlVersion'] = "MySQL version >= 4.1.0";
$lang['recommendedSettings'] = "Recommended settings";
$lang['gdLibrary'] = "GD Image Library";
$lang['zlibSupport'] = "zlib support";

// includes/content/licence.php
$lang['angLicence'] = "Angora guestbook licence";

// includes/content/method.php
$lang['instMethod'] = "Installation method";
$lang['updateFrom'] = "Update from ANG versions 0.7.x";
$lang['updateFrom2'] = "Update from version 1.6.1";
$lang['newInstallation'] = "New installation";

//includes/content/update.php
$lang['convertTables'] = "Converting tables";
$lang['convertionDone'] = "Convertion done";
$lang['convertionFailed'] = "Convertion failed";
$lang['cleaningUp'] = "Cleaning up";
$lang['dropOldTables'] = "Drop old tables";
$lang['renameNewTables'] = "Rename new tables";

// includes/content/install.php
$lang['mysqlConfiguration'] = "MySQL configuration";
$lang['host'] = "Host";
$lang['username'] = "MySQL username";
$lang['password'] = "MySQL password";
$lang['database'] = "MySQL database name";
$lang['prefix'] = "MySQL table prefix";

// includes/content/config.php
$lang['mysqlInstallation'] = "MySQL Installation";
$lang['dataError'] = "Database error!";
$lang['installationDone'] = "Installation done";
$lang['guestbookConfiguration'] = "Guestbook configuration";
$lang['adminName'] = "Super admin name";
$lang['adminPass'] = "Password";
$lang['adminPassConf'] = "Confirm password";
$lang['adminEmail'] = "Email";
$lang['fileCreation'] = "File creation";

// includes/content/finish.php
$lang['finishInstallation'] = "Finish Installation";
$lang['areDifferent'] = "are different!";
$lang['adminConfigurationDone'] = "Admin configuration done";
$lang['generalConfigurationDone'] = "General configuration done";
$lang['manualDbFileCreation'] = "Copy and paste the information below into a new file, and name it : data.php
<br />
Then place it in your guestbook root folder.";

$lang['deleteSetup'] = "Remember to delete the setup folder!";
$lang['yesYouCan'] = "You can go to";
$lang['adminCenter'] = "Administrator center";
$lang['newGuestbook'] = "Your new guestbook";
$lang['finishing'] = "Finishing";

// javascript password strength meter
$lang['passNotEntered'] = "Password not entered";
$lang['weak'] = "Weak";
$lang['better'] = "Better";
$lang['medium'] = "Medium";
$lang['strong'] = "Strong";
$lang['strongest'] = "Strongest";

?>
