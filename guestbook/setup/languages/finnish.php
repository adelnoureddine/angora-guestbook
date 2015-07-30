<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

// General
$lang['charset'] = "UTF-8";
$lang['dir'] = "ltr";
$lang['lang'] = "fi";
$lang['title'] = "Angora Guestbook Web-asennus";
$lang['ok'] = "OK";
$lang['no'] = "EI";
$lang['next'] = "Seuraava >>";
$lang['previous'] = "<< Edellinen";
$lang['isEmpty'] = "ei voi olla tyhjä!";

// includes/content/lang.php
$lang['language'] = "Kieli";

// includes/content/check.php
$lang['requiredSettings'] = "Vaadittavat asetukset";
$lang['phpVersion'] = "PHP versio >= 5.2.0";
$lang['mysqlSupport'] = "MySQL-tuki";
$lang['mysqlVersion'] = "MySQL versio >= 4.1.0";
$lang['recommendedSettings'] = "Suositeltavat asetukset";
$lang['gdLibrary'] = "GD Image Library";
$lang['zlibSupport'] = "zlibluki";

// includes/content/licence.php
$lang['angLicence'] = "Angora guestbook lisenssi";

// includes/content/method.php
$lang['instMethod'] = "Asennus tapa";
$lang['updateFrom'] = "Päivitys ANG versioista 0.7.x";
$lang['updateFrom2'] = "Päivitys versiosta 1.x";
$lang['newInstallation'] = "Uusi asennus";

//includes/content/update.php
$lang['convertTables'] = "Muunnetaan taulukoita";
$lang['convertionDone'] = "Muuntaminen valmis";
$lang['convertionFailed'] = "Muuntaminen epäonnistui";
$lang['cleaningUp'] = "Tyhjennetään";
$lang['dropOldTables'] = "Poista vanhat taulukot";
$lang['renameNewTables'] = "Nimeä uudet taulukot uudelleen";

// includes/content/install.php
$lang['mysqlConfiguration'] = "MySQL asetukset";
$lang['host'] = "Host";
$lang['username'] = "MySQL käyttäjänimi";
$lang['password'] = "MySQL salasana";
$lang['database'] = "MySQL tietokannan nimi";
$lang['prefix'] = "MySQL taulukon etuliite";

// includes/content/config.php
$lang['mysqlInstallation'] = "MySQL Asennus";
$lang['dataError'] = "Tietokanta virhe!";
$lang['installationDone'] = "Asennus valmis";
$lang['guestbookConfiguration'] = "Vieraskirjan asetukset";
$lang['adminName'] = "Super adminin nimi";
$lang['adminPass'] = "Salasana";
$lang['adminPassConf'] = "Vahvista salasana";
$lang['adminEmail'] = "Sähköposti";
$lang['fileCreation'] = "Tiedoston valmistus";

// includes/content/finish.php
$lang['finishInstallation'] = "Viimeistele asennus";
$lang['areDifferent'] = "ovat eriävät!";
$lang['adminConfigurationDone'] = "Admin asetukset valmiit";
$lang['generalConfigurationDone'] = "Yleiset asetukset valmiit";
$lang['manualDbFileCreation'] = "Kopioi ja liitä allaoleva tieto uuteen tiedostoon ja tallenna tiedosto nimellä : data.php
<br />
Sitten siirrä se vieraskirjasi pää-hakemistoon.";

$lang['deleteSetup'] = "Muista poistaa asennus (setup) kansio!";
$lang['yesYouCan'] = "Voit siirtyä";
$lang['adminCenter'] = "Ylläpito-keskus";
$lang['newGuestbook'] = "Uusi vieraskirjasi";
$lang['finishing'] = "Viimeistellään";

// javascript password strength meter
$lang['passNotEntered'] = "Salasanaa ei syötetty";
$lang['weak'] = "Heikko";
$lang['better'] = "Parempi";
$lang['medium'] = "Keskiverto";
$lang['strong'] = "Vahva";
$lang['strongest'] = "Vahvin";

?>