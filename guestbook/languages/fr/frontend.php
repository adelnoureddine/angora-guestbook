<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

// General
$lang['charset'] = "UTF-8";
$lang['dir'] = "ltr";
$lang['lang'] = "fr";

// Boxes
$lang['sign'] = "Signer le livre d'or";
$lang['view'] = "Voir les messages";
$lang['search'] = "Recherche";
$lang['statistics'] = "Statistiques";
$lang['next'] = "Suivant >>";
$lang['previous'] = "<< Précédent";
$lang['poweredBy'] = "Powered by";
$lang['page'] = "Page";

// content/posts.php
$lang['noPostsToYourQuery'] = "Il n'y a pas de messages qui corresponde à votre requête";

// content/sign.php
$lang['name'] = "Nom";
$lang['message'] = "Message";
$lang['country'] = "Pays";
$lang['location'] = "Lieu";
$lang['email'] = "Courriel";
$lang['rating'] = "Évaluation";
$lang['send'] = "Envoyer";
$lang['isEmpty'] = "ne peut pas être vide !";
$lang['isBig'] = "est trop grand !";
$lang['emailInvalid'] = "n'est pas un courriel valide !";
$lang['bannedIP'] = "est banni";
$lang['floodTime'] = "vous avez déjà signé le livre d'or récemment !";
$lang['errorSigndb'] = "Erreur lors de la signature dans la base de donnée";
$lang['redirect'] = "Vous allez être redirigé vers la page d'accueil";
$lang['okSign'] = "Vous avez signé le livre d'or !";
$lang['captcha'] = "Code captcha";
$lang['captchaError'] = "Code captcha incorrect";
$lang['newMsgEmailSubject'] = "Nouvelle signature dans votre livre d'or !";
$lang['newMsgEmail'] = "Quelqu'un a signé votre livre d'or.";
$lang['numberResults'] = "Nombre de résultats : ";

// content/stats.php
$lang['total'] = "Total";
$lang['nbPosts'] = "Nombre de messages";
$lang['browser'] = "Navigateur";
$lang['os'] = "OS";
$lang['when'] = "Quand";
$lang['allTime'] = "Tout le temps";
$lang['lastMonth'] = "Mois dernier";

?>