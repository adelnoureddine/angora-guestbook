<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

// General
$lang['charset'] = "UTF-8";
$lang['dir'] = "ltr";
$lang['lang'] = "en";

// Boxes
$lang['sign'] = "Sign Guestbook";
$lang['view'] = "View Posts";
$lang['search'] = "Search";
$lang['statistics'] = "Statistics";
$lang['next'] = "Next >>";
$lang['previous'] = "<< Previous";
$lang['poweredBy'] = "Powered by";
$lang['page'] = "Page";

// content/posts.php
$lang['noPostsToYourQuery'] = "There is no posts meeting your query's requirements";

// content/sign.php
$lang['name'] = "Name";
$lang['message'] = "Message";
$lang['country'] = "Country";
$lang['location'] = "Location";
$lang['email'] = "Email";
$lang['rating'] = "Rating";
$lang['send'] = "Send";
$lang['isEmpty'] = "can't be empty!";
$lang['isBig'] = "is too big!";
$lang['emailInvalid'] = " is not a valid email!";
$lang['bannedIP'] = "is banned";
$lang['floodTime'] = "you have already signed the guestbook lately!";
$lang['errorSigndb'] = "Error in signing the database";
$lang['redirect'] = "You will be redirected to the index page";
$lang['okSign'] = "You have signed the guestbook!";
$lang['captcha'] = "Captcha code";
$lang['captchaError'] = "Incorrect captcha code";
$lang['newMsgEmailSubject'] = "New signature in your guestbook !";
$lang['newMsgEmail'] = "Someone has posted a new signature in your guestbook.";
$lang['numberResults'] = "Number of results : ";

// content/stats.php
$lang['total'] = "Total";
$lang['nbPosts'] = "Number of posts";
$lang['browser'] = "Browser";
$lang['os'] = "OS";
$lang['when'] = "When";
$lang['allTime'] = "All Time";
$lang['lastMonth'] = "Last Month";

?>