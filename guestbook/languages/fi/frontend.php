<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

// General
$lang['charset'] = "UTF-8";
$lang['dir'] = "ltr";
$lang['lang'] = "fi";

// Boxes
$lang['sign'] = "Kirjoita vieraskirjaan";
$lang['view'] = "Katso viestejä";
$lang['search'] = "Etsi";
$lang['statistics'] = "Tilastot";
$lang['next'] = "Seuraava >>";
$lang['previous'] = "<< Edellinen";
$lang['poweredBy'] = "Powered by";
$lang['page'] = "Sivu";

// content/posts.php
$lang['noPostsToYourQuery'] = "Ei viestejä haetuilla valinnoilla";

// content/sign.php
$lang['name'] = "Nimi";
$lang['message'] = "Viesti";
$lang['country'] = "Maa";
$lang['location'] = "Paikka";
$lang['email'] = "Sähköposti";
$lang['rating'] = "Arvosana";
$lang['send'] = "Lähetä";
$lang['isEmpty'] = "Ei voi olla tyhjä!";
$lang['isBig'] = "on liian iso!";
$lang['emailInvalid'] = " ei ole kelvollinen sähköposti!";
$lang['bannedIP'] = "on bannattu";
$lang['floodTime'] = "olet jo kirjoittanut vieraskirjaan lähi-aikana!";
$lang['errorSigndb'] = "Virhe kirjoittasessa tietokantaan";
$lang['redirect'] = "Sinut ohjataan etusivulle";
$lang['okSign'] = "Olet kirjoittanut vieraskirjaan!";
$lang['captcha'] = "Captcha koodi";
$lang['captchaError'] = "Väärä captcha koodi";
$lang['newMsgEmailSubject'] = "Uusi viesti vieraskirjassasi !";
$lang['newMsgEmail'] = "Joku on kirjoittanut uuden viestin vieraskirjaasi.";
$lang['numberResults'] = "Viestien määrä : "; //Not sure about meaning, can be different

// content/stats.php
$lang['total'] = "Yhteensä";
$lang['nbPosts'] = "Viestien määrä";
$lang['browser'] = "Selain";
$lang['os'] = "OS";
$lang['when'] = "Koska"; 
$lang['allTime'] = "Kaikkina aikoina";
$lang['lastMonth'] = "Viimekuu";

?>