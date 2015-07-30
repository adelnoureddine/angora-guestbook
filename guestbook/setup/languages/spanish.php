<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

// General
$lang['charset'] = "UTF-8";
$lang['dir'] = "ltr";
$lang['lang'] = "es";
$lang['title'] = "Instalador Web de Angora Libro de visitas";
$lang['ok'] = "OK";
$lang['no'] = "NO";
$lang['next'] = "Siguiente >>";
$lang['previous'] = "<< Anterior";
$lang['isEmpty'] = "no puede estar vacío!";

// includes/content/lang.php
$lang['language'] = "Idioma";

// includes/content/check.php
$lang['requiredSettings'] = "Configuración requerida";
$lang['phpVersion'] = "Versión de PHP >= 5.2.0";
$lang['mysqlSupport'] = "Soporte para MySQL";
$lang['mysqlVersion'] = "Versión de MySQL >= 4.1.0";
$lang['recommendedSettings'] = "Configuración recomendada";
$lang['gdLibrary'] = "Librería GD de imagen";
$lang['zlibSupport'] = "Soporte para zlib";

// includes/content/licence.php
$lang['angLicence'] = "Licencia de Angora Libro de visitas";

// includes/content/method.php
$lang['instMethod'] = "Método de instalación";
$lang['updateFrom'] = "Actualizar versiones ANG 0.7.x";
$lang['updateFrom2'] = "Update from versions 1.x";
$lang['newInstallation'] = "Nueva instalación";

//includes/content/update.php
$lang['convertTables'] = "Convirtiendo tablas";
$lang['convertionDone'] = "Conversión realizada";
$lang['convertionFailed'] = "Conversión fallida";
$lang['cleaningUp'] = "Limpiando";
$lang['dropOldTables'] = "Eliminando tablas anticuadas";
$lang['renameNewTables'] = "Renombrando tablas nuevas";

// includes/content/install.php
$lang['mysqlConfiguration'] = "Configuración MySQL";
$lang['host'] = "Host";
$lang['username'] = "Usuario MySQL";
$lang['password'] = "Contraseña MySQL";
$lang['database'] = "Nombre de la base de datos MySQL";
$lang['prefix'] = "Prefijo de tablas MySQL";

// includes/content/config.php
$lang['mysqlInstallation'] = "Instalación MySQL";
$lang['dataError'] = "Error en la base de datos!";
$lang['installationDone'] = "Instalación realizada";
$lang['guestbookConfiguration'] = "Configuración del libro de visitas";
$lang['adminName'] = "Nombre de Super Administrador";
$lang['adminPass'] = "Contraseña";
$lang['adminPassConf'] = "Confirmar contraseña";
$lang['adminEmail'] = "Correo electrónico";
$lang['fileCreation'] = "Crear fichero";

// includes/content/finish.php
$lang['finishInstallation'] = "Final de instalación";
$lang['areDifferent'] = "son diferentes!";
$lang['adminConfigurationDone'] = "Configuración de administrador realizada";
$lang['generalConfigurationDone'] = "Configuración general realizada";
$lang['manualDbFileCreation'] = "Copia y pega la información que aparece debajo en un nuevo fichero llamado: data.php
<br />
Luego colócalo en la carpeta raiz de tu libro de visitas.";

$lang['deleteSetup'] = "Recuerda que debes eliminar la carpeta setup!";
$lang['yesYouCan'] = "Ahora puedes ir a";
$lang['adminCenter'] = "Centro de administración";
$lang['newGuestbook'] = "Tu nuevo libro de visitas";
$lang['finishing'] = "Finalizando";

// javascript password strength meter
$lang['passNotEntered'] = "No has escrito una contraseña";
$lang['weak'] = "Débil";
$lang['better'] = "Regular";
$lang['medium'] = "Media";
$lang['strong'] = "Dura";
$lang['strongest'] = "Inaccesible";

?>