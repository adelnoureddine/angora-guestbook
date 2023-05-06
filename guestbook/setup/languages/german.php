<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

// General
$lang['charset'] = "UTF-8";
$lang['dir'] = "ltr";
$lang['lang'] = "de";
$lang['title'] = "Angora Gästebuch Web Installer";
$lang['ok'] = "OK";
$lang['no'] = "NEIN";
$lang['next'] = "Nächste >>";
$lang['previous'] = "<< Vorherige";
$lang['isEmpty'] = "darf nicht leer sein!";

// includes/content/lang.php
$lang['language'] = "Sprache";

// includes/content/check.php
$lang['requiredSettings'] = "Erforderliche Einstellungen";
$lang['phpVersion'] = "PHP Version >= 5.2.0";
$lang['mysqlSupport'] = "MySQL support";
$lang['mysqlVersion'] = "MySQL Version >= 4.1.0";
$lang['recommendedSettings'] = "Empfohlene Einstellungen";
$lang['gdLibrary'] = "GD Bilderbibliothek";
$lang['zlibSupport'] = "zlib Support";

// includes/content/licence.php
$lang['angLicence'] = "Angora Gästebuch-Lizenz";

// includes/content/method.php
$lang['instMethod'] = "Installationsmethode";
$lang['updateFrom'] = "Update von ANG Version 0.7.x";
$lang['updateFrom2'] = "Update der Versionen 1.6.1";
$lang['newInstallation'] = "Neue Installation";

//includes/content/update.php
$lang['convertTables'] = "Tabellen umwandeln";
$lang['convertionDone'] = "Umwandlung ergfolgreich";
$lang['convertionFailed'] = "Umwandlung fehlgeschlagen";
$lang['cleaningUp'] = "Aufräumen";
$lang['dropOldTables'] = "Alte Tabellen löschen";
$lang['renameNewTables'] = "Neue Tabellen umbenennen";

// includes/content/install.php
$lang['mysqlConfiguration'] = "MySQL-Konfiguration";
$lang['host'] = "Host";
$lang['username'] = "MySQL-Benutzername";
$lang['password'] = "MySQL-Password";
$lang['database'] = "MySQL-Datenbankname";
$lang['prefix'] = "MySQL-Tabellenpräfix";

// includes/content/config.php
$lang['mysqlInstallation'] = "MySQL-Installation";
$lang['dataError'] = "Datenbankfehler!";
$lang['installationDone'] = "Installation fertig";
$lang['guestbookConfiguration'] = "Gästebuch-Konfiguration";
$lang['adminName'] = "Name des Super-Admins";
$lang['adminPass'] = "Passwort";
$lang['adminPassConf'] = "Passwort bestätigen";
$lang['adminEmail'] = "Email";
$lang['fileCreation'] = "Dateierstellung";

// includes/content/finish.php
$lang['finishInstallation'] = "Installation beenden";
$lang['areDifferent'] = "sind verschieden!";
$lang['adminConfigurationDone'] = "Admin-Konfiguration fertig";
$lang['generalConfigurationDone'] = "Allgemeine Konfiguration fertig";
$lang['manualDbFileCreation'] = "Kopiere die unten stehenden Informationen in eine neue Datei und benenne sie: data.php
<br />
Dann kopiere sie in das Wurzelverzeichnis deines Gästebuchs.";

$lang['deleteSetup'] = "Denk dran, den Installations-Ordner zu löschen!";
$lang['yesYouCan'] = "Du darfst nicht gehen nach";
$lang['adminCenter'] = "Administrator-Center";
$lang['newGuestbook'] = "Dein neues Gästebuch";
$lang['finishing'] = "Beenden";

// javascript password strength meter
$lang['passNotEntered'] = "Passwort nicht eingegeben";
$lang['weak'] = "Schwach";
$lang['better'] = "Besser";
$lang['medium'] = "Mittel";
$lang['strong'] = "Stark";
$lang['strongest'] = "Stärkstes";

?>
