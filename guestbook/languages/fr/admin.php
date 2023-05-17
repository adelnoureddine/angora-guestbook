<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

// General
$lang['charset'] = "UTF-8";
$lang['dir'] = "ltr";
$lang['lang'] = "fr";
$lang['isEmpty'] = "ne peut pas être vide !";
$lang['change'] = "Changer";
$lang['add'] = "Ajouter";
$lang['dataError'] = "Erreur dans la base de données";
$lang['changeSuccess'] = "Changement réussi";
$lang['yes'] = "Oui";
$lang['no'] = "Non";
$lang['javascriptEnabled'] = "JavaScript doit être activé !";
$lang['noPermission'] = "Vous n'avez pas la permission d'accéder à cette page !<br />Seulement les Super Admins peuvent ;)";
$lang['modify'] = "Modifier";
$lang['remove'] = "Supprimer";
$lang['help'] = "Aide en ligne";
$lang['sure'] = "Êtes-vous sûr(e)&nbsp;?";

// Boxes

// includes/boxes/panel.php
$lang['posts'] = "Messages";
$lang['administrators'] = "Administrateurs";
$lang['preferences'] = "Préférences";
$lang['logout'] = "Logout";
$lang['tools'] = "Outils";
$lang['phpinfo'] = "phpinfo";
$lang['navigation'] = "Navigation";
$lang['start'] = "Démarrer";
$lang['changePass'] = "Changer le mot de passe";
$lang['addAdmins'] = "Ajouter/Supprimer des admins";
$lang['options'] = "Options";
$lang['advancedOptions'] = "Options avancées";
$lang['smilies'] = "Émotions";
$lang['censored'] = "Mots censurés";
$lang['database'] = "Base de données";
$lang['backupRestore'] = "Sauvegarder/Restaurer";
$lang['optimize'] = "Optimiser";
$lang['messages'] = "Messages";
$lang['search'] = "Recherche";
$lang['banIP'] = "Bannir/Ne pas bannir des IPs";
$lang['trash'] = "Corbeille";
$lang['about'] = "À propos";
$lang['uploadCenter'] = "Centre de téléchargement";
$lang['guestbook'] = "Livre d'or";

// includes/content/login.php
$lang['username'] = "Nom";
$lang['password'] = "Mot de passe";
$lang['login'] = "Login";
$lang['errorLogin'] = "Erreur dans le login";
$lang['nomatch'] = "ne correspondent pas";
$lang['LIP'] = "IP";
$lang['lUserAgent'] = "UserAgent";
$lang['doesntExist'] = "n'existe pas";
$lang['wrongPassword'] = "Mot de passe erroné";
$lang['javascriptNeeded'] = "JavaScript doit être activé pour pouvoir
se connecter";
$lang['forgotPass'] = "Mot de passe oublié&nbsp;?";

// includes/content/changePass.php
$lang['normalAdmin'] = "Admin normal";
$lang['superAdmin'] = "Super admin";
$lang['normalAdminText'] = "Veuillez contacter le super administrateur pour changer votre mot de passe";
$lang['superAdminText'] = "Entrer le courriel associé avec le livre d'or pour que Angora en crée un autre mot de passe";
$lang['emailChangePass'] = "Courriel";
$lang['getNewPass'] = "Générer un nouveau mot de passe";
$lang['isIncorrect'] = "est incorrect";
$lang['forgotPassSubject'] = "Votre nouveau mot de passe";
$lang['forgotPassText'] = "Un nouveau mot de passe a été généré. N'oubliez pas de le changer. Le nouveau mot de passe est : ";

// javascript password strength meter
$lang['passNotEntered'] = "Pas de mot de passe";
$lang['weak'] = "Faible";
$lang['better'] = "Mieux";
$lang['medium'] = "Moyen";
$lang['strong'] = "Fort";
$lang['strongest'] = "Très fort";

// includes/content/start.php
$lang['gbVersion'] = "Version du livre d'or";
$lang['phpVersion'] = "Version PHP";
$lang['sqlVersion'] = "Version MySQL";
$lang['numPosts'] = "Nombre de messages";
$lang['loggedAs'] = "Connecté en tant que";
$lang['latestNews'] = "Dernières nouvelles";
$lang['infos'] = "Infos";
$lang['downloadNewVersion'] = "Télécharger";
$lang['changeLog'] = "Changelog";
$lang['newVersionAvailable'] = "Un nouvelle version est disponible";
$lang['normalUpdate'] = "Mise à jour normale";
$lang['securityUpdate'] = "Mise à jour de sécurité !";

// includes/content/about.php
$lang['author'] = "Auteur";
$lang['licence'] = "Licence";
$lang['website'] = "Site web";

// includes/content/changePass.php
$lang['oldPassword'] = "Ancien mot de passe";
$lang['newPassword'] = "Nouveau mot de passe";
$lang['confirmNewPassword'] = "Confirmer le nouveau mot de passe";
$lang['wrongOldPass'] = "Ancien mot de passe erroné";
$lang['newPassMatch'] = "Les nouveaux mot de passe ne correspondent pas";

// includes/content/optimize.php
$lang['optimizationSuccess'] = "Optimisation terminée";
$lang['optimizationNeeded'] = "Les tables ont besoin d'être optimisées";
$lang['optimizationNotNeeded'] = "Optimisation non requise";

// includes/content/banIP.php
$lang['ipnumber'] = "Numéro IP";
$lang['ban'] = "Bannir";
$lang['unban'] = "Ne pas bannir";
$lang['ipBanned'] = "est déjà banni";

// includes/content/backup.php
$lang['backupDatabase'] = "Sauvegarder la base de données";
$lang['restoreDatabase'] = "Restaurer la base de données";
$lang['sqlFile'] = "Fichier SQL";
$lang['restore'] = "Restaurer";
$lang['permissionsError'] = "Pas de permissions pour écrire le fichier SQL";
$lang['bLog'] = "Historique de sauvegarde";
$lang['bDate'] = "Date";
$lang['bOperation'] = "Opération";
$lang['unkownOperation'] = "Opération inconnnue";
$lang['bClear'] = "Nettoyer";

// includes/content/options.php
$lang['changeTitles'] = "Changer les titres";
$lang['gbTitle'] = "Titre du livre d'or";
$lang['headTitle'] = "Titre d'entête";

$lang['changeMetaTags'] = "Changer les meta-tags";
$lang['metaDescription'] = "Description des meta-tags";
$lang['metaKeywords'] = "Mots clés meta-tags";

$lang['changeMaxChar'] = "Changer max. caractères";
$lang['maxCharMsg'] = "Max. car. dans le message";
$lang['maxCharField'] = "Max. car. dans les champs";

$lang['changeSecurity'] = "Changer les mesures de sécurité";
$lang['floodTime'] = "Temps anti-flood (en sec.)";
$lang['moderateMsg'] = "Modérer les messages&nbsp;?";
$lang['autoCensor'] = "Censure automatique des messages&nbsp;?";
$lang['checkEmail'] = "Vérifier courriel&nbsp;?";
$lang['checkCaptcha'] = "Utiliser CAPTCHA&nbsp;?";
$lang['debug'] = "Mode debug&nbsp;?";
$lang['reCaptcha'] = "Utiliser reCaptcha?";
$lang['reCaptchapubk'] = "Clé publique reCaptcha";
$lang['reCaptchaprvk'] = "Clé privée reCaptcha";

$lang['changeLanguages'] = "Changer de langue";
$lang['guestbookLang'] = "Langue du livre d'or";
$lang['adminLang'] = "Langue du centre d'admin";

$lang['changeVisual'] = "Changer les effets visuels";
$lang['guestbookTheme'] = "Thème du livre d'or";
$lang['mobileTheme'] = "Thème de la version mobile";
$lang['numPostsPerPage'] = "No. de messages/page";
$lang['pagesFormat'] = "Format de page";
$lang['dateSort'] = "Tri par date";
$lang['ascending'] = "Croissant";
$lang['descending'] = "Décroissant";
$lang['several'] = "Plusieurs pages";
$lang['allinone'] = "Tout dans une seule page";
$lang['dateFormat'] = "Format de la date";
$lang['timezone'] = "Fuseau horaire";

$lang['changeOffline'] = "Changer les options hors-ligne";
$lang['offline'] = "Livre d'or hors-ligne&nbsp;?";
$lang['offlineMessage'] = "Message hors-ligne";

$lang['changeImage'] = "Changer le format d'images";
$lang['resizeImg'] = "Redimensionner les images&nbsp;?";
$lang['imgWidth'] = "Largeur";
$lang['imgHeight'] = "Hauteur";

// includes/content/admin.php
$lang['addAdmin'] = "Ajouter admin";
$lang['modifyAdmins'] = "Modifier admins";
$lang['superAdminPassword'] = "Mot de passe du super admin";
$lang['adminName'] = "Nom du nouvel admin";
$lang['superPassError'] = "Mot de passe du super admin est erronée";
$lang['superAdmin'] = "Super Admin";

// includes/content/upload.php
$lang['upload'] = "Télécharger";
$lang['file'] = "Fichier";
$lang['uploadSmilies'] = "Émotions";
$lang['uploadThemes'] = "Thèmes";
$lang['uploadLanguages'] = "Langues";
$lang['uploadLocation'] = "Lieu de téléchargement";
$lang['uploadError'] = "Erreur dans le téléchargement";
$lang['cantDelete'] = "Ne peut pas supprimer le fichier";

// includes/content/smilies.php
$lang['addSmiley'] = "Ajouter une émotion";
$lang['modifySmilies'] = "Modifier les émotions";
$lang['smileyName'] = "Nom de l'émotion";
$lang['smileyCode'] = "Code de l'émotion";
$lang['smileyPath'] = "URL de l'image de l'émotion";

// includes/content/censored.php
$lang['addCensored'] = "Ajouter un mot à censurer";
$lang['modifyCensored'] = "Modifier les mots censurés";
$lang['censoredOriginal'] = "Mot initial";
$lang['censoredReplacement'] = "Mot de remplacement";

// includes/content/search.php
$lang['sPosts'] = "Messages";
$lang['sIP'] = "IP";
$lang['sUA'] = "User Agent";
$lang['sCountries'] = "Code de pays";
$lang['sTrash'] = "Messages dans la corbeille";
$lang['searchType'] = "Type de recherche";
$lang['searchData'] = "Rercherche de données";

// includes/content/posts.php
$lang['pIP'] = "IP";
$lang['pEmail'] = "Courriel";
$lang['noPostsToYourQuery'] = "Il n'y a pas de messages qui correspondent à votre requête";
$lang['actions'] = "Actions";
$lang['globalActions'] = "Actions globales";
$lang['pModify'] = "Modifier";
$lang['pDelete'] = "Supprimer";
$lang['pUnpublish'] = "Ne pas publier";
$lang['pPublish'] = "Publier";
$lang['pReply'] = "Répondre";
$lang['pBanIP'] = "Bannir IP";
$lang['pUnbanIP'] = "Ne pas bannir IP";
$lang['pRestore'] = "Restaurer";
$lang['emptyTrash'] = "Vider la corbeille";
$lang['deleteUnpublishedPosts'] = "Supprimer tous les messages non publiés";

// includes/boxes/pageLinks.php
$lang['previous'] = "<< Précédent";
$lang['next'] = "Suivant >>";
$lang['page'] = "Page";

// includes/content/advOptions.php
$lang['changePaths'] = "Changer les chemins";
$lang['backupFolder'] = "Sauvegarde";
$lang['smiliesFolder'] = "Émotions";
$lang['langFolder'] = "Langues";
$lang['themesFolder'] = "Thèmes";
$lang['generatePaths'] = "Génération automatique des chemins";

$lang['changeEmail'] = "Changer courriel";
$lang['email'] = "Courriel";
$lang['receiveEmailNotification'] = "Recevoir une notification courriel&nbsp;?";

$lang['changeDatabase'] = "Informations de la base de données";
$lang['dbHost'] = "Hébergement de la base de données";
$lang['dbDatabase'] = "Nom de la base de données";
$lang['dbUsername'] = "Nom d'utilisateur";
$lang['dbPassword'] = "Mot de passe";
$lang['dbPrefix'] = "Préfixe des tables";

$lang['manualDbFileCreation'] = "Copiez puis collez les informations ci-dessous dans un nouveau fichier et nommez-le data.php.
<br />
Puis placez-le dans le répertoire principal de votre livre d'or.";

?>
