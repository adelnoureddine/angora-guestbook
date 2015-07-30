<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

// General
$lang['charset'] = "UTF-8";
$lang['dir'] = "ltr";
$lang['lang'] = "fi";
$lang['isEmpty'] = "ei voi olla tyhjä!";
$lang['change'] = "Vaihda";
$lang['add'] = "Lisää";
$lang['dataError'] = "Tietokanta virhe";
$lang['changeSuccess'] = "Vaihto onnistunut";
$lang['yes'] = "Kyllä";
$lang['no'] = "Ei";
$lang['javascriptEnabled'] = "JavaScript pitää olla käytössä!";
$lang['noPermission'] = "Sinulla ei ole pääsyoikeutta tälle sivulle! <br />Vain Super Admineilla on ;)";
$lang['modify'] = "Muokkaa";
$lang['remove'] = "Poista";
$lang['help'] = "Online apu";
$lang['sure'] = "Oletko varma?";

// Boxes

// includes/boxes/panel.php
$lang['posts'] = "Viestit";
$lang['administrators'] = "Ylläpitäjät";
$lang['preferences'] = "Ominaisuudet";
$lang['logout'] = "Kirjaudu ulos";
$lang['tools'] = "Työkalut";
$lang['phpinfo'] = "phpinfo";
$lang['navigation'] = "Valikko";
$lang['start'] = "Alku";
$lang['changePass'] = "Vaihda salasana";
$lang['addAdmins'] = "Lisää/Poista admineja";
$lang['options'] = "Valinnat";
$lang['advancedOptions'] = "Tarkemmat valinnat";
$lang['smilies'] = "Hymiöt";
$lang['censored'] = "Sensurioidut sanat";
$lang['database'] = "Tietokanta";
$lang['backupRestore'] = "Varmuuskopio/Palautus";
$lang['optimize'] = "Optimoi";
$lang['messages'] = "Viestit";
$lang['search'] = "Etsi";
$lang['banIP'] = "Bannaa/Unbannaa IP:itä";
$lang['trash'] = "Roska";
$lang['about'] = "Tietoa";
$lang['uploadCenter'] = "Lataus keskus";
$lang['guestbook'] = "Vieraskirja";

// includes/content/login.php
$lang['username'] = "Nimi";
$lang['password'] = "Salasana";
$lang['login'] = "Kirjaudu";
$lang['errorLogin'] = "Virhe kirjautumisessa";
$lang['nomatch'] = "ei vastaa";
$lang['LIP'] = "IP";
$lang['lUserAgent'] = "UserAgent";
$lang['doesntExist'] = "ei ole olemassa";
$lang['wrongPassword'] = "Väärä salasana";
$lang['javascriptNeeded'] = "Javascript tulee olla käytössä kirjautuaksesi";
$lang['forgotPass'] = "Unohditko salasanan?";

// includes/content/changePass.php
$lang['normalAdmin'] = "Normaali admin";
$lang['superAdmin'] = "Super admin";
$lang['normalAdminText'] = "Ota yhteyttä Super adminiisi resetoidaksesi salasanan";
$lang['superAdminText'] = "Syötä sama sähköposti jota käytit kirjautuessasi jotta Angora voi generoida sinulle uuden salasanan";
$lang['emailChangePass'] = "Sähköposti";
$lang['getNewPass'] = "Generoi uusi salasana";
$lang['isIncorrect'] = "ei ole oikein";
$lang['forgotPassSubject'] = "Uusi salasanasi";
$lang['forgotPassText'] = "Uusi salasana on generoitu. Muista vaihtaa se. Uusi salasana on : ";

// javascript password strength meter
$lang['passNotEntered'] = "Salasanaa ei syötetty";
$lang['weak'] = "Heikko";
$lang['better'] = "Parempi";
$lang['medium'] = "Keskiverto";
$lang['strong'] = "Vahva";
$lang['strongest'] = "Vahvin";

// includes/content/start.php
$lang['gbVersion'] = "Vieraskirjan versio";
$lang['phpVersion'] = "PHP Versio";
$lang['sqlVersion'] = "MySQL Versio";
$lang['numPosts'] = "Viestien lukumäärä";
$lang['loggedAs'] = "Kirjautuneena:";
$lang['latestNews'] = "Uusimmat uutiset";
$lang['infos'] = "Infot";
$lang['downloadNewVersion'] = "lataa";
$lang['changeLog'] = "Muutoslogi";
$lang['newVersionAvailable'] = "Uusi versio saatavilla";
$lang['normalUpdate'] = "Normaali päivitys";
$lang['securityUpdate'] = "Tietoturva päivitys!";

// includes/content/about.php
$lang['author'] = "Tekijä";
$lang['licence'] = "Lisenssi";
$lang['website'] = "Nettisivut";

// includes/content/changePass.php
$lang['oldPassword'] = "Vanha salasana";
$lang['newPassword'] = "Uusi salasana";
$lang['confirmNewPassword'] = "Vahvista uusi salasana";
$lang['wrongOldPass'] = "Väärä vanha salasana";
$lang['newPassMatch'] = "Uudet salasanat eivät täsmää";

// includes/content/optimize.php
$lang['optimizationSuccess'] = "Optimointi valmist";
$lang['optimizationNeeded'] = "Taulukot vaativat optimointia";
$lang['optimizationNotNeeded'] = "Ei tarvetta optimoinnille";

// includes/content/banIP.php
$lang['ipnumber'] = "IP numero";
$lang['ban'] = "Bannaa";
$lang['unban'] = "Unbannaa";
$lang['ipBanned'] = "on jo bannattu";

// includes/content/backup.php
$lang['backupDatabase'] = "Varmuuskopioi tietokanta";
$lang['restoreDatabase'] = "Palauta tietokanta";
$lang['sqlFile'] = "SQL tiedosto";
$lang['restore'] = "Palauta";
$lang['permissionsError'] = "Ei oikeutta kirjoittaa ladattua SQL tiedostoa";
$lang['bLog'] = "Varmuuskopioi logi";
$lang['bDate'] = "Päiväys";
$lang['bOperation'] = "Operaatio";
$lang['unkownOperation'] = "Tuntematon operaatio";
$lang['bClear'] = "Tyhjennä";

// includes/content/options.php
$lang['changeTitles'] = "Vaihda otsikoita";
$lang['gbTitle'] = "Vieraskirjan otsikko";
$lang['headTitle'] = "Pää-otsikko";

$lang['changeMetaTags'] = "Vaihda meta-tageja";
$lang['metaDescription'] = "Meta-tagien kuvaus";
$lang['metaKeywords'] = "Meta-tagien avainsanat";

$lang['changeMaxChar'] = "Vaihda max. merkkien määrä";
$lang['maxCharMsg'] = "Max. merkit viesteissä";
$lang['maxCharField'] = "Max. merkit kentissä";

$lang['changeSecurity'] = "Vaihda turvallisuuden määrää";
$lang['floodTime'] = "Anti-flood aika (sekunneissa)";
$lang['moderateMsg'] = "Moderoi viestit?";
$lang['autoCensor'] = "Sensuroi viestit?";
$lang['checkEmail'] = "Tarkasta sähköposti?";
$lang['checkCaptcha'] = "Käytä CAPTCHA tunnistusta?";
$lang['debug'] = "Debug mode?";
$lang['reCaptcha'] = "Käytä reCaptchaa?";
$lang['reCaptchapubk'] = "reCaptchan yleinen avain";
$lang['reCaptchaprvk'] = "reCaptchan yksityinen avain";

$lang['changeLanguages'] = "Vaihda kieltä";
$lang['guestbookLang'] = "Vieraskirjan kieli";
$lang['adminLang'] = "Adminin kieli";

$lang['changeVisual'] = "Vaihda visuaalisia tehosteita";
$lang['guestbookTheme'] = "Vieraskirjan teema";
$lang['mobileTheme'] = "Mobiili teema";
$lang['numPostsPerPage'] = "Viestit/sivu (määrä)";
$lang['pagesFormat'] = "Sivujen muoto";
$lang['several'] = "Monia sivuja";
$lang['allinone'] = "Kaikki yhdellä sivulla";
$lang['dateFormat'] = "Päivämäärän muoto";
$lang['timezone'] = "Aikavyöhyke";

$lang['changeOffline'] = "Vaihda offline-asetuksia";
$lang['offline'] = "Vieraskirja offline-tilaan?";
$lang['offlineMessage'] = "Offline viesti";

$lang['changeImage'] = "Vaihda kuvien muotoa";
$lang['resizeImg'] = "Muuta kuvien kokoa?";
$lang['imgWidth'] = "Leveys";
$lang['imgHeight'] = "Korkeus";

// includes/content/admin.php
$lang['addAdmin'] = "Lisää admin";
$lang['modifyAdmins'] = "Muokkaa admineja";
$lang['superAdminPassword'] = "Super admin salasana";
$lang['adminName'] = "Uuden adminin nimi";
$lang['superPassError'] = "Super admin salasana on väärä";
$lang['superAdmin'] = "Super Admin";

// includes/content/upload.php
$lang['upload'] = "Lataa";
$lang['file'] = "Tiedosto";
$lang['uploadSmilies'] = "Hymiöt";
$lang['uploadThemes'] = "Teemat";
$lang['uploadLanguages'] = "Kielet";
$lang['uploadLocation'] = "Lataus kansio";
$lang['uploadError'] = "Lataus virhe";
$lang['cantDelete'] = "Tiedostoa ei voida poistaa";

// includes/content/smilies.php
$lang['addSmiley'] = "Lisää hymiö";
$lang['modifySmilies'] = "Muokkaa hymiöitä";
$lang['smileyName'] = "Hymiön nimi";
$lang['smileyCode'] = "Hymiön koodi";
$lang['smileyPath'] = "Hymiön kuvan URL";

// includes/content/censored.php
$lang['addCensored'] = "Lisää sensuroitava sana";
$lang['modifyCensored'] = "Muokkaa sensuroitavia sanoja";
$lang['censoredOriginal'] = "Alkuperäinen sana";
$lang['censoredReplacement'] = "Korvaava sana";

// includes/content/search.php
$lang['sPosts'] = "Viestit";
$lang['sIP'] = "IP";
$lang['sUA'] = "User Agent";
$lang['sCountries'] = "Maan koodi";
$lang['sTrash'] = "Poista viestejä";
$lang['searchType'] = "Haun tyyppi";
$lang['searchData'] = "Haku data";

// includes/content/posts.php
$lang['pIP'] = "IP";
$lang['pEmail'] = "Sähköposti";
$lang['noPostsToYourQuery'] = "Ei viestejä haetuilla valinnoilla";
$lang['actions'] = "Toiminnot";
$lang['globalActions'] = "Globaalit toiminnot";
$lang['pModify'] = "Muokkaa";
$lang['pDelete'] = "Poista";
$lang['pUnpublish'] = "Poista julkaisu";
$lang['pPublish'] = "Julkaise";
$lang['pReply'] = "Vastaa";
$lang['pBanIP'] = "Bannaa IP";
$lang['pUnbanIP'] = "Unbannaa IP";
$lang['pRestore'] = "Palauta";
$lang['emptyTrash'] = "Tyhjennä roskakori";
$lang['deleteUnpublishedPosts'] = "Poista kaikki julkaisemattomat viestit";

// includes/boxes/pageLinks.php
$lang['previous'] = "<< Edellinen";
$lang['next'] = "Seuraava >>";
$lang['page'] = "Sivu";

// includes/content/advOptions.php
$lang['changePaths'] = "Vaihda kansioita";
$lang['backupFolder'] = "Varmuuskopio";
$lang['smiliesFolder'] = "Hymiöt";
$lang['langFolder'] = "Kielet";
$lang['themesFolder'] = "Teemat";
$lang['generatePaths'] = "Määritä kansiot automaattisesti";

$lang['changeEmail'] = "Vaihda sähköposti";
$lang['email'] = "Sähköposti";
$lang['receiveEmailNotification'] = "Vastaanota sähköposti ilmoitus?";

$lang['changeDatabase'] = "Tietokannan tiedot";
$lang['dbHost'] = "Tietokannan hosti";
$lang['dbDatabase'] = "Tietokannan nimi";
$lang['dbUsername'] = "Käyttäjänimi";
$lang['dbPassword'] = "Salasana";
$lang['dbPrefix'] = "Taulukon etuliite";

$lang['manualDbFileCreation'] = "Kopioi ja liitä allaoleva tieto uuteen tiedostoon ja tallenna tiedosto nimellä : data.php
<br />
Sen jälkeen korvaa vieraskirjasi alkuperäinen data.php äsken tekemälläsi tiedostolla.";

?>