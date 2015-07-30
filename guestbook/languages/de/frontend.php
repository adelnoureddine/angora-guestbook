<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

// General
$lang['charset'] = "UTF-8";
$lang['dir'] = "ltr";
$lang['lang'] = "de";

// Boxes
$lang['sign'] = "Gästebuch signieren";
$lang['view'] = "Nachrichten anschauen";
$lang['search'] = "Suche";
$lang['statistics'] = "Statistiken";
$lang['next'] = "Nächste >>";
$lang['previous'] = "<< Vorherige";
$lang['poweredBy'] = "Erstellt von";
$lang['page'] = "Seite";

// content/posts.php
$lang['noPostsToYourQuery'] = "Es gibt keine Nachrichten, die deinen Suchkriterien entsprechen";

// content/sign.php
$lang['name'] = "Name";
$lang['message'] = "Nachricht";
$lang['country'] = "Land";
$lang['location'] = "Ort";
$lang['email'] = "Email";
$lang['rating'] = "Bewertung";
$lang['send'] = "Senden";
$lang['isEmpty'] = "darf nicht leer sein!";
$lang['isBig'] = "ist zu groß!";
$lang['emailInvalid'] = " ist keine gültige Email-Adresse!";
$lang['bannedIP'] = "wurde verbannt";
$lang['floodTime'] = "du hast das Gästebuch erst vor kurzem signiert!";
$lang['errorSigndb'] = "Fehler im Signieren der Datenbank";
$lang['redirect'] = "Du wirst zur Index-Seite weitergeleitet";
$lang['okSign'] = "Du hast das Gästebuch signiert!";
$lang['captcha'] = "Captcha-Code";
$lang['captchaError'] = "Falscher Captcha-Code";
$lang['newMsgEmailSubject'] = "Neue Unterschrift in deinem Gäastebuch !";
$lang['newMsgEmail'] = "Jemand hat eine neue Unterschruft un deinem Gästebuch hinterlassen.";
$lang['numberResults'] = "Anzahl der Ergebnisse : ";

// content/stats.php
$lang['total'] = "Insgesamt";
$lang['nbPosts'] = "Anzahl Nachrichten";
$lang['browser'] = "Browser";
$lang['os'] = "OS";
$lang['when'] = "Wann";
$lang['allTime'] = "Gesamter Zeitraum";
$lang['lastMonth'] = "Letzten Monat";

?>