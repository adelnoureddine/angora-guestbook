<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

// General
$lang['charset'] = "UTF-8";
$lang['dir'] = "ltr";
$lang['lang'] = "de";
$lang['isEmpty'] = "darf nicht leer sein!";
$lang['change'] = "Ändern";
$lang['add'] = "Hinzufügen";
$lang['dataError'] = "Datenbankfehler";
$lang['changeSuccess'] = "Änderung erfolgreich";
$lang['yes'] = "Ja";
$lang['no'] = "Nein";
$lang['javascriptEnabled'] = "JavaScript muss aktiviert sein !";
$lang['noPermission'] = "Du hast keine Rechte, um diese Seite zu ändern ! <br />Nur der Super-Admin darf das ;)";
$lang['modify'] = "Ändern";
$lang['remove'] = "Entfernen";
$lang['help'] = "Online-Hilfe";
$lang['sure'] = "Bist du sicher?";

// Boxes

// includes/boxes/panel.php
$lang['posts'] = "Posts";
$lang['administrators'] = "Administratoren";
$lang['preferences'] = "Persönliche Einstellungen";
$lang['logout'] = "Abmelden";
$lang['tools'] = "Werkzeuge";
$lang['phpinfo'] = "phpinfo";
$lang['navigation'] = "Navigation";
$lang['start'] = "Start";
$lang['changePass'] = "Passwort ändern";
$lang['addAdmins'] = "Admin hinzufügen/entfernen";
$lang['options'] = "Optionen";
$lang['advancedOptions'] = "Erweiterte Optionen";
$lang['smilies'] = "Smilies";
$lang['censored'] = "Zensierte Worte";
$lang['database'] = "Datenbank";
$lang['backupRestore'] = "Sichern/Wiederherstellen";
$lang['optimize'] = "Optimieren";
$lang['messages'] = "Nachrichten";
$lang['search'] = "Suche";
$lang['banIP'] = "IPs verbannen/Bann aufheben";
$lang['trash'] = "Papierkorb";
$lang['about'] = "Über";
$lang['uploadCenter'] = "Upload-Center";
$lang['guestbook'] = "Gästebuch";

// includes/content/login.php
$lang['username'] = "Name";
$lang['password'] = "Passwort";
$lang['login'] = "Login";
$lang['errorLogin'] = "Fehler beim Login";
$lang['nomatch'] = "stimmt nicht überein";
$lang['LIP'] = "IP";
$lang['lUserAgent'] = "Benutzer-Agent";
$lang['doesntExist'] = "existiert nicht";
$lang['wrongPassword'] = "Falsches Passwort";
$lang['javascriptNeeded'] = "Du brauchst aktiviertes Javascript, zum Anmelden";
$lang['forgotPass'] = "Passwort vergessen?";

// includes/content/changePass.php
$lang['normalAdmin'] = "Normaler Admin";
$lang['superAdmin'] = "Super-Admin";
$lang['normalAdminText'] = "Kontaktiere deinen Super-Admin, um dein Passwort zurückzusetzen";
$lang['superAdminText'] = "Gib die email-Adresse deines Gästebuchs ein, damit Angora ein neues Passwort für dich generieren kann";
$lang['emailChangePass'] = "Email";
$lang['getNewPass'] = "Generiere ein neues Passwort";
$lang['isIncorrect'] = "ist falsch";
$lang['forgotPassSubject'] = "Dein neues Passwort";
$lang['forgotPassText'] = "Ein neues Passwort wurde generiert. Denk bitte dran, es zu ändern. Das neue Passwort lautet : ";

// javascript password strength meter
$lang['passNotEntered'] = "Passwort nicht eingegeben";
$lang['weak'] = "Schwach";
$lang['better'] = "Besser";
$lang['medium'] = "Mittel";
$lang['strong'] = "Stark";
$lang['strongest'] = "Stärkstes";

// includes/content/start.php
$lang['gbVersion'] = "Gästebuch-Version";
$lang['phpVersion'] = "PHP Version";
$lang['sqlVersion'] = "MySQL Version";
$lang['numPosts'] = "Anzahl Posts";
$lang['loggedAs'] = "Angemeldet als";
$lang['latestNews'] = "Letzte Neuigkeit";
$lang['infos'] = "Infos";
$lang['downloadNewVersion'] = "Download";
$lang['changeLog'] = "Änderungshistorie";
$lang['newVersionAvailable'] = "Neue Version verfügbar";
$lang['normalUpdate'] = "Normales Update";
$lang['securityUpdate'] = "Sicherheits-Update!";

// includes/content/about.php
$lang['author'] = "Autor";
$lang['licence'] = "Lizenz";
$lang['website'] = "Webseite";
$lang['logoLicence'] = "Lizenz des Logos";

// includes/content/changePass.php
$lang['oldPassword'] = "Altes Passwort";
$lang['newPassword'] = "Neues Passwort";
$lang['confirmNewPassword'] = "Bestätige neues Passwort";
$lang['wrongOldPass'] = "Falsches altes Passwort";
$lang['newPassMatch'] = "Neue Passwörte stimmen nicht überein";

// includes/content/optimize.php
$lang['optimizationSuccess'] = "Optimierung erfolgreich";
$lang['optimizationNeeded'] = "Tabellen brauchen keine Optimierung";
$lang['optimizationNotNeeded'] = "Keine Optimierung nötig";

// includes/content/banIP.php
$lang['ipnumber'] = "IP-Adresse";
$lang['ban'] = "Verbannen";
$lang['unban'] = "Bann aufheben";
$lang['ipBanned'] = "ist bereits verbannt";

// includes/content/backup.php
$lang['backupDatabase'] = "Datenbank sichern";
$lang['restoreDatabase'] = "Datenbank wiederherstellen";
$lang['sqlFile'] = "SQL-Datei";
$lang['restore'] = "Wiederherstellen";
$lang['permissionsError'] = "Keine Rechte, um die hochgeladene SQL-Datei zu erzeugen";
$lang['bLog'] = "Sicherungs-Protokoll";
$lang['bDate'] = "Datum";
$lang['bOperation'] = "Aktion";
$lang['unkownOperation'] = "Unbekannte Aktion";
$lang['bClear'] = "Alles löschen";

// includes/content/options.php
$lang['changeTitles'] = "Titel ändern";
$lang['gbTitle'] = "Titel des Gästebuchs";
$lang['headTitle'] = "Hauptüberschrift";

$lang['changeMetaTags'] = "Meta-tags ändern";
$lang['metaDescription'] = "Beschreibung der Meta-tags";
$lang['metaKeywords'] = "Meta-tags Schlüsselwörter";

$lang['changeMaxChar'] = "Max. Anzahl Zeichen ändern";
$lang['maxCharMsg'] = "Max. Anzahl Zeichen in Nachricht";
$lang['maxCharField'] = "Max. Anzahl Zeichen in Feldern";

$lang['changeSecurity'] = "Sicherheitsmaßnahmen ändern";
$lang['floodTime'] = "Zeit des Anti-floods (in Sek.)";
$lang['moderateMsg'] = "Nachrichten moderieren?";
$lang['autoCensor'] = "Auto-Zensur der Nachrichten?";
$lang['checkEmail'] = "Email überpüfen?";
$lang['checkCaptcha'] = "CAPTCHA benutzen?";
$lang['reCaptcha'] = "reCaptcha benutzen?";
$lang['reCaptchapubk'] = "reCaptcha öffentlicher Schlüssel";
$lang['reCaptchaprvk'] = "reCaptcha privater Schlüssel";

$lang['changeLanguages'] = "Sprachen ändern";
$lang['guestbookLang'] = "Sprache des Gästebuchs";
$lang['adminLang'] = "Sprache des Admins";

$lang['changeVisual'] = "Visuelle Effekte ändern";
$lang['guestbookTheme'] = "Gästebuchthema";
$lang['mobileTheme'] = "Mobilthema";
$lang['numPostsPerPage'] = "Anzahl Nachrichten/Seite";
$lang['pagesFormat'] = "Seitenformat";
$lang['dateSort'] = "Sort by date";
$lang['ascending'] = "Ascending";
$lang['descending'] = "Descending";
$lang['several'] = "Verschiedene Seiten";
$lang['allinone'] = "Alle auf einer Seite";
$lang['dateFormat'] = "Datumsformat";
$lang['timezone'] = "Zeitzone";

$lang['changeOffline'] = "Offline-Optionen ändern";
$lang['offline'] = "Gästebuch offline?";
$lang['offlineMessage'] = "Offline-Nachricht";

$lang['changeImage'] = "Bildformat ändern";
$lang['resizeImg'] = "Bildergröße ändern?";
$lang['imgWidth'] = "Breite";
$lang['imgHeight'] = "Höhe";

// includes/content/admin.php
$lang['addAdmin'] = "Admin hinzufügen";
$lang['modifyAdmins'] = "Admins ändern";
$lang['superAdminPassword'] = "Passwort des Super-Admins";
$lang['adminName'] = "Neuer Name des Admins";
$lang['superPassError'] = "Passwort des Super-Admins falsch";
$lang['superAdmin'] = "Super-Admin";

// includes/content/upload.php
$lang['upload'] = "Upload";
$lang['file'] = "Datei";
$lang['uploadSmilies'] = "Smilies";
$lang['uploadThemes'] = "Themen";
$lang['uploadLanguages'] = "Sprachen";
$lang['uploadLocation'] = "Ort für Upload";
$lang['uploadError'] = "Fehler bei Upload";
$lang['cantDelete'] = "Kann Datei nicht löschen";

// includes/content/smilies.php
$lang['addSmiley'] = "Smiley hinzufügen";
$lang['modifySmilies'] = "Smilies verändern";
$lang['smileyName'] = "Name des Smileys";
$lang['smileyCode'] = "Smiley Code";
$lang['smileyPath'] = "Smiley Bild-URL";

// includes/content/censored.php
$lang['addCensored'] = "Zensiertes Wort ändern";
$lang['modifyCensored'] = "Zensierte Wörter ändern";
$lang['censoredOriginal'] = "Original-Wort";
$lang['censoredReplacement'] = "Ersetzendes Wort";

// includes/content/search.php
$lang['sPosts'] = "Posts";
$lang['sIP'] = "IP";
$lang['sUA'] = "Benutzer-Agent";
$lang['sCountries'] = "Ländercode";
$lang['sTrash'] = "Nachrichten für Papierkorb";
$lang['searchType'] = "Suchart";
$lang['searchData'] = "Suchdaten";

// includes/content/posts.php
$lang['pIP'] = "IP";
$lang['pEmail'] = "Email";
$lang['noPostsToYourQuery'] = "Es gibt keine Nachrichten, die deinen Suchkriterien entsprechen";
$lang['actions'] = "Aktionen";
$lang['globalActions'] = "Globale Aktionen";
$lang['pModify'] = "Ändern";
$lang['pDelete'] = "Löschen";
$lang['pUnpublish'] = "Veröffentlichung aufheben";
$lang['pPublish'] = "Veröffentlichen";
$lang['pReply'] = "Antworten";
$lang['pBanIP'] = "IP verbannen";
$lang['pUnbanIP'] = "Bann der IP aufheben";
$lang['pRestore'] = "Wiederherstellen";
$lang['emptyTrash'] = "Papierkorb leeren";
$lang['deleteUnpublishedPosts'] = "Alle nicht publizierten Nachrichten löschen";

// includes/boxes/pageLinks.php
$lang['previous'] = "<< Vorherige";
$lang['next'] = "Nächste >>";
$lang['page'] = "Seite";

// includes/content/advOptions.php
$lang['changePaths'] = "Pfade ändern";
$lang['backupFolder'] = "Sichern";
$lang['smiliesFolder'] = "Smilies";
$lang['langFolder'] = "Sprachen";
$lang['themesFolder'] = "Themen";
$lang['generatePaths'] = "Pfade auto-generieren";

$lang['changeEmail'] = "Email-Adresse ändern";
$lang['email'] = "Email";
$lang['receiveEmailNotification'] = "Email-Benachrichtigung erhalten?";

$lang['changeDatabase'] = "Datenbank-Information";
$lang['dbHost'] = "Datenbankrechner";
$lang['dbDatabase'] = "Name der Datenbank";
$lang['dbUsername'] = "Benutzername";
$lang['dbPassword'] = "Passwort";
$lang['dbPrefix'] = "Tabellenpräfix";

$lang['manualDbFileCreation'] = "Kopiere die unten stehenden Informationen in eine neue Datei und benenne sie: data.php
<br />
Dann ersetze die alte data.php Datei auf dem Rechner des Gästebuchs mit der neuen.";

?>
