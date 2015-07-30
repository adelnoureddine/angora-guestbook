<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

// General
$lang['charset'] = "UTF-8";
$lang['dir'] = "ltr";
$lang['lang'] = "fr";
$lang['title'] = "Angora Guestbook Web Installer";
$lang['ok'] = "OK";
$lang['no'] = "NON";
$lang['next'] = "Suivant >>";
$lang['previous'] = "<< Précédent";
$lang['isEmpty'] = "ne peut pas être vide!";

// includes/content/lang.php
$lang['language'] = "Langue";

// includes/content/check.php
$lang['requiredSettings'] = "Paramètres requis";
$lang['phpVersion'] = "Version PHP >= 5.2.0";
$lang['mysqlSupport'] = "Support de MySQL";
$lang['mysqlVersion'] = "Version MySQL >= 4.1.0";
$lang['recommendedSettings'] = "Paramètres recommandés";
$lang['gdLibrary'] = "Libraire d'image GD";
$lang['zlibSupport'] = "Support de zlib";

// includes/content/licence.php
$lang['angLicence'] = "Licence d'utilisation du livre d'or Angora";

// includes/content/method.php
$lang['instMethod'] = "Méthode d'installation";
$lang['updateFrom'] = "Mise à jour depuis ANG versions 0.7.x";
$lang['updateFrom2'] = "Mise à jour depuis les versions 1.x";
$lang['newInstallation'] = "Nouvelle installation";

//includes/content/update.php
$lang['convertTables'] = "Conversion des tables";
$lang['convertionDone'] = "Conversion terminée";
$lang['convertionFailed'] = "Conversion échouée";
$lang['cleaningUp'] = "Nettoyage";
$lang['dropOldTables'] = "Suppression des anciennes tables";
$lang['renameNewTables'] = "Renommage des nouvelles tables";

// includes/content/install.php
$lang['mysqlConfiguration'] = "Configuration MySQL";
$lang['host'] = "Hébergeur";
$lang['username'] = "Nom d'utilisateur MySQL";
$lang['password'] = "Mot de passe MySQL";
$lang['database'] = "Nom de la base de donnée MySQL";
$lang['prefix'] = "Préfixe des tables MySQL";

// includes/content/config.php
$lang['mysqlInstallation'] = "Installation MySQL";
$lang['dataError'] = "Erreur de la base de donnée!";
$lang['installationDone'] = "Installation terminée";
$lang['guestbookConfiguration'] = "Configuration du livre d'or";
$lang['adminName'] = "Nom du Super admin";
$lang['adminPass'] = "Mode de passe";
$lang['adminPassConf'] = "Confirmation du mot de passe";
$lang['adminEmail'] = "Courriel";
$lang['fileCreation'] = "Création de fichier";

// includes/content/finish.php
$lang['finishInstallation'] = "Terminer l'installation";
$lang['areDifferent'] = "sont différents!";
$lang['adminConfigurationDone'] = "Configuration des admins terminée";
$lang['generalConfigurationDone'] = "Configuration générale terminée";
$lang['manualDbFileCreation'] = "Copier puis coller les informations ci-dessous dans un nouveau fichier et nommez-le : data.php
<br />
Puis placez-le dans le répertoire principale de votre livre d'or.";

$lang['deleteSetup'] = "N'oubliez pas de supprimer le répertoire d'installation!";
$lang['yesYouCan'] = "Vous pouvez aller à";
$lang['adminCenter'] = "Centre d'administration";
$lang['newGuestbook'] = "Votre nouveau livre d'or";
$lang['finishing'] = "Finalisation";

// javascript password strength meter
$lang['passNotEntered'] = "Pas de mot de passe";
$lang['weak'] = "Faible";
$lang['better'] = "Mieux";
$lang['medium'] = "Moyen";
$lang['strong'] = "Fort";
$lang['strongest'] = "Très fort";

?>