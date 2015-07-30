<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

// General
$lang['charset'] = "UTF-8";
$lang['dir'] = "ltr";
$lang['lang'] = "en";
$lang['isEmpty'] = "can't be empty!";
$lang['change'] = "Change";
$lang['add'] = "Add";
$lang['dataError'] = "Database error";
$lang['changeSuccess'] = "Change done successufly";
$lang['yes'] = "Yes";
$lang['no'] = "No";
$lang['javascriptEnabled'] = "JavaScript must be enabled!";
$lang['noPermission'] = "You don't have permissions to access this page!<br />Only Super Admins can ;)";
$lang['modify'] = "Modify";
$lang['remove'] = "Remove";
$lang['help'] = "Online help";
$lang['sure'] = "Are you sure?";

// Boxes

// includes/boxes/panel.php
$lang['posts'] = "Posts";
$lang['administrators'] = "Administrators";
$lang['preferences'] = "Preferences";
$lang['logout'] = "Logout";
$lang['tools'] = "Tools";
$lang['phpinfo'] = "phpinfo";
$lang['navigation'] = "Navigation";
$lang['start'] = "Start";
$lang['changePass'] = "Change password";
$lang['addAdmins'] = "Add/Remove admins";
$lang['options'] = "Options";
$lang['advancedOptions'] = "Advanced options";
$lang['smilies'] = "Smilies";
$lang['censored'] = "Censored words";
$lang['database'] = "Database";
$lang['backupRestore'] = "Backup/Restore";
$lang['optimize'] = "Optimize";
$lang['messages'] = "Messages";
$lang['search'] = "Search";
$lang['banIP'] = "Ban/Unban IPs";
$lang['trash'] = "Trash";
$lang['about'] = "About";
$lang['uploadCenter'] = "Upload center";
$lang['guestbook'] = "Guestbook";

// includes/content/login.php
$lang['username'] = "Name";
$lang['password'] = "Password";
$lang['login'] = "Login";
$lang['errorLogin'] = "Error in login";
$lang['nomatch'] = "doesn't match";
$lang['LIP'] = "IP";
$lang['lUserAgent'] = "UserAgent";
$lang['doesntExist'] = "doesn't exist";
$lang['wrongPassword'] = "Wrong password";
$lang['javascriptNeeded'] = "You need javascript enabled to login";
$lang['forgotPass'] = "Forgot password?";

// includes/content/changePass.php
$lang['normalAdmin'] = "Normal admin";
$lang['superAdmin'] = "Super admin";
$lang['normalAdminText'] = "Contact your super administrator to reset your password";
$lang['superAdminText'] = "Enter the same email associated with the guestbook to have Angora generate a new password for you";
$lang['emailChangePass'] = "Email";
$lang['getNewPass'] = "Generate a new password";
$lang['isIncorrect'] = "is incorrect";
$lang['forgotPassSubject'] = "Your new password";
$lang['forgotPassText'] = "A new password has been generated. Please remember to change it. The new password is : ";

// javascript password strength meter
$lang['passNotEntered'] = "Password not entered";
$lang['weak'] = "Weak";
$lang['better'] = "Better";
$lang['medium'] = "Medium";
$lang['strong'] = "Strong";
$lang['strongest'] = "Strongest";

// includes/content/start.php
$lang['gbVersion'] = "Guestbook version";
$lang['phpVersion'] = "PHP Version";
$lang['sqlVersion'] = "MySQL Version";
$lang['numPosts'] = "Number of posts";
$lang['loggedAs'] = "Logged as";
$lang['latestNews'] = "Latest news";
$lang['infos'] = "Infos";
$lang['downloadNewVersion'] = "Download";
$lang['changeLog'] = "Changelog";
$lang['newVersionAvailable'] = "New version available";
$lang['normalUpdate'] = "Normal update";
$lang['securityUpdate'] = "Security update!";

// includes/content/about.php
$lang['author'] = "Author";
$lang['licence'] = "Licence";
$lang['website'] = "Website";

// includes/content/changePass.php
$lang['oldPassword'] = "Old password";
$lang['newPassword'] = "New password";
$lang['confirmNewPassword'] = "Confirm new password";
$lang['wrongOldPass'] = "Wrong old password";
$lang['newPassMatch'] = "New passwords doesn't match";

// includes/content/optimize.php
$lang['optimizationSuccess'] = "Optimization done";
$lang['optimizationNeeded'] = "Tables need optimization";
$lang['optimizationNotNeeded'] = "No need for optimization";

// includes/content/banIP.php
$lang['ipnumber'] = "IP number";
$lang['ban'] = "Ban";
$lang['unban'] = "Unban";
$lang['ipBanned'] = "is already banned";

// includes/content/backup.php
$lang['backupDatabase'] = "Backup Database";
$lang['restoreDatabase'] = "Restore Database";
$lang['sqlFile'] = "SQL file";
$lang['restore'] = "Restore";
$lang['permissionsError'] = "No permission to write the uploaded SQL file";
$lang['bLog'] = "Backup log";
$lang['bDate'] = "Date";
$lang['bOperation'] = "Operation";
$lang['unkownOperation'] = "Unkown operation";
$lang['bClear'] = "Clear";

// includes/content/options.php
$lang['changeTitles'] = "Change titles";
$lang['gbTitle'] = "Guestbook title";
$lang['headTitle'] = "Head title";

$lang['changeMetaTags'] = "Change meta-tags";
$lang['metaDescription'] = "Meta-tags description";
$lang['metaKeywords'] = "Meta-tags keywords";

$lang['changeMaxChar'] = "Change max. characters";
$lang['maxCharMsg'] = "Max. chars. in message";
$lang['maxCharField'] = "Max. chars. in fields";

$lang['changeSecurity'] = "Change security measures";
$lang['floodTime'] = "Anti-flood time (in sec.)";
$lang['moderateMsg'] = "Moderate messages?";
$lang['autoCensor'] = "Auto-censor messages?";
$lang['checkEmail'] = "Check email?";
$lang['checkCaptcha'] = "Use CAPTCHA?";
$lang['debug'] = "Debug mode?";
$lang['reCaptcha'] = "Use reCaptcha?";
$lang['reCaptchapubk'] = "reCaptcha public key";
$lang['reCaptchaprvk'] = "reCaptcha private key";

$lang['changeLanguages'] = "Change languages";
$lang['guestbookLang'] = "Guestbook language";
$lang['adminLang'] = "Admin language";

$lang['changeVisual'] = "Change visual effects";
$lang['guestbookTheme'] = "Guestbook theme";
$lang['mobileTheme'] = "Mobile theme";
$lang['numPostsPerPage'] = "Num. of posts/page";
$lang['pagesFormat'] = "Pages format";
$lang['several'] = "Several pages";
$lang['allinone'] = "All in one page";
$lang['dateFormat'] = "Date format";
$lang['timezone'] = "Timezone";

$lang['changeOffline'] = "Change offline options";
$lang['offline'] = "Guestbook offline?";
$lang['offlineMessage'] = "Offline message";

$lang['changeImage'] = "Change images format";
$lang['resizeImg'] = "Resize images?";
$lang['imgWidth'] = "Width";
$lang['imgHeight'] = "Height";

// includes/content/admin.php
$lang['addAdmin'] = "Add admin";
$lang['modifyAdmins'] = "Modify admins";
$lang['superAdminPassword'] = "Super admin password";
$lang['adminName'] = "New admin name";
$lang['superPassError'] = "Super admin password is wrong";
$lang['superAdmin'] = "Super Admin";

// includes/content/upload.php
$lang['upload'] = "Upload";
$lang['file'] = "File";
$lang['uploadSmilies'] = "Smilies";
$lang['uploadThemes'] = "Themes";
$lang['uploadLanguages'] = "Languages";
$lang['uploadLocation'] = "Upload location";
$lang['uploadError'] = "Upload error";
$lang['cantDelete'] = "Can't delete the file";

// includes/content/smilies.php
$lang['addSmiley'] = "Add a smiley";
$lang['modifySmilies'] = "Modify smilies";
$lang['smileyName'] = "Smiley name";
$lang['smileyCode'] = "Smiley code";
$lang['smileyPath'] = "Smiley image URL";

// includes/content/censored.php
$lang['addCensored'] = "Add a censored word";
$lang['modifyCensored'] = "Modify censored words";
$lang['censoredOriginal'] = "Original word";
$lang['censoredReplacement'] = "Replacement word";

// includes/content/search.php
$lang['sPosts'] = "Posts";
$lang['sIP'] = "IP";
$lang['sUA'] = "User Agent";
$lang['sCountries'] = "Countries code";
$lang['sTrash'] = "Trash posts";
$lang['searchType'] = "Search type";
$lang['searchData'] = "Search data";

// includes/content/posts.php
$lang['pIP'] = "IP";
$lang['pEmail'] = "Email";
$lang['noPostsToYourQuery'] = "There is no posts meeting your query's requirements";
$lang['actions'] = "Actions";
$lang['globalActions'] = "Global actions";
$lang['pModify'] = "Modify";
$lang['pDelete'] = "Delete";
$lang['pUnpublish'] = "Unpublish";
$lang['pPublish'] = "Publish";
$lang['pReply'] = "Reply";
$lang['pBanIP'] = "Ban IP";
$lang['pUnbanIP'] = "Unban IP";
$lang['pRestore'] = "Restore";
$lang['emptyTrash'] = "Empty trash";
$lang['deleteUnpublishedPosts'] = "Delete all unpublished posts";

// includes/boxes/pageLinks.php
$lang['previous'] = "<< Previous";
$lang['next'] = "Next >>";
$lang['page'] = "Page";

// includes/content/advOptions.php
$lang['changePaths'] = "Change paths";
$lang['backupFolder'] = "Backup";
$lang['smiliesFolder'] = "Smilies";
$lang['langFolder'] = "Languages";
$lang['themesFolder'] = "Themes";
$lang['generatePaths'] = "Auto-generate Paths";

$lang['changeEmail'] = "Change email";
$lang['email'] = "Email";
$lang['receiveEmailNotification'] = "Receive email notification?";

$lang['changeDatabase'] = "Database information";
$lang['dbHost'] = "Database host";
$lang['dbDatabase'] = "Database name";
$lang['dbUsername'] = "Username";
$lang['dbPassword'] = "Password";
$lang['dbPrefix'] = "Tables prefix";

$lang['manualDbFileCreation'] = "Copy and paste the information below into a new file, and name it : data.php
<br />
Then replace in your guestbook host the original data.php file with this newly created file.";

?>