<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

// General
$lang['charset'] = "UTF-8";
$lang['dir'] = "ltr";
$lang['lang'] = "es";
$lang['isEmpty'] = "no puede estar vacío!";
$lang['change'] = "Cambiar";
$lang['add'] = "Añadir";
$lang['dataError'] = "Error en la base de datos";
$lang['changeSuccess'] = "Cambio efectuado con éxito";
$lang['yes'] = "Sí";
$lang['no'] = "No";
$lang['javascriptEnabled'] = "Debes habilitar JavaScript!";
$lang['noPermission'] = "No tienes permisos para acceder a esta página!<br />Solo el Super Administrador puede ;)";
$lang['modify'] = "Modificar";
$lang['remove'] = "Eliminar";
$lang['help'] = "Ayuda online";
$lang['sure'] = "¿Está seguro?";

// Boxes

// includes/boxes/panel.php
$lang['posts'] = "Firmas";
$lang['administrators'] = "Administradores";
$lang['preferences'] = "Preferencias";
$lang['logout'] = "Desconectar";
$lang['tools'] = "Herramientas";
$lang['phpinfo'] = "phpinfo";
$lang['navigation'] = "Navegación";
$lang['start'] = "Iniciar";
$lang['changePass'] = "Cambiar contraseña";
$lang['addAdmins'] = "Añadir/Eliminar administradores";
$lang['options'] = "Opciones";
$lang['advancedOptions'] = "Opciones avanzadas";
$lang['smilies'] = "Emoticonos";
$lang['censored'] = "Palabras censuradas";
$lang['database'] = "Base de datos";
$lang['backupRestore'] = "Respaldar/Restaurar";
$lang['optimize'] = "Optimizar";
$lang['messages'] = "Mensajes";
$lang['search'] = "Buscar";
$lang['banIP'] = "Invalidar/Validar IPs";
$lang['trash'] = "Papelera";
$lang['about'] = "Acerca de";
$lang['uploadCenter'] = "Control de subidas";
$lang['guestbook'] = "Libro de visitas";

// includes/content/login.php
$lang['username'] = "Usuario";
$lang['password'] = "Contraseña";
$lang['login'] = "Inicio";
$lang['errorLogin'] = "Error durante el inicio";
$lang['nomatch'] = "no concuerda";
$lang['LIP'] = "IP";
$lang['lUserAgent'] = "UserAgent";
$lang['doesntExist'] = "no existe";
$lang['wrongPassword'] = "Contraseña incorrecta";
$lang['javascriptNeeded'] = "Debes habilitar JavaScript para iniciar sesión";
$lang['forgotPass'] = "Olvidaste la contraseña?";

// includes/content/changePass.php
$lang['normalAdmin'] = "Administrador normal";
$lang['superAdmin'] = "Super Administrador";
$lang['normalAdminText'] = "Contacta con tu super administrador para reestablecer la contraseña";
$lang['superAdminText'] = "Escribe tu correo electrónico asociado a el libro de visitas, para que Angora genere una nueva contraseña";
$lang['emailChangePass'] = "Correo electrónico";
$lang['getNewPass'] = "Generar una nueva contraseña";
$lang['isIncorrect'] = "es incorrecto";
$lang['forgotPassSubject'] = "Tu nueva contraseña";
$lang['forgotPassText'] = "Se ha generado una nueva contraseña. Recuerda que debes cambiarla. La contraseña es : ";

// javascript password strength meter
$lang['passNotEntered'] = "No has escrito una contraseña";
$lang['weak'] = "Débil";
$lang['better'] = "Regular";
$lang['medium'] = "Media";
$lang['strong'] = "Dura";
$lang['strongest'] = "Inaccesible";

// includes/content/start.php
$lang['gbVersion'] = "Libro de visitas versión";
$lang['phpVersion'] = "PHP Versión";
$lang['sqlVersion'] = "MySQL Versión";
$lang['numPosts'] = "Número de firmas";
$lang['loggedAs'] = "Conectado como";
$lang['latestNews'] = "Últimas noticias";
$lang['infos'] = "Infos";
$lang['downloadNewVersion'] = "descargar";
$lang['changeLog'] = "cambios";
$lang['newVersionAvailable'] = "Nueva versión disponible";
$lang['normalUpdate'] = "Actualización normal";
$lang['securityUpdate'] = "Actualización de seguridad!";

// includes/content/about.php
$lang['author'] = "Autor";
$lang['licence'] = "Licencia";
$lang['website'] = "Sitio web";
$lang['logoLicence'] = "Logo de la licencia";

// includes/content/changePass.php
$lang['oldPassword'] = "Contraseña anterior";
$lang['newPassword'] = "Nueva contraseña";
$lang['confirmNewPassword'] = "Confirma nueva contraseña";
$lang['wrongOldPass'] = "Contraseña anterior incorrecta";
$lang['newPassMatch'] = "Las nuevas contraseñas no coinciden";

// includes/content/optimize.php
$lang['optimizationSuccess'] = "Optimización completada";
$lang['optimizationNeeded'] = "Las tablas necesitan una optimización";
$lang['optimizationNotNeeded'] = "Optimización innecesaria";

// includes/content/banIP.php
$lang['ipnumber'] = "IP número";
$lang['ban'] = "Invalidar";
$lang['unban'] = "Validar";
$lang['ipBanned'] = "ya está invalidada";

// includes/content/backup.php
$lang['backupDatabase'] = "Respaldar base de datos";
$lang['restoreDatabase'] = "Restaurar base de datos";
$lang['sqlFile'] = "Fichero SQL";
$lang['restore'] = "Restaurar";
$lang['permissionsError'] = "Sin permisos para escribir el fichero SQL almacenado";
$lang['bLog'] = "Informe de respaldo";
$lang['bDate'] = "Fecha";
$lang['bOperation'] = "Operación";
$lang['unkownOperation'] = "Operación desconocida";
$lang['bClear'] = "Limpiar";

// includes/content/options.php
$lang['changeTitles'] = "Cambiar títulos";
$lang['gbTitle'] = "Título del libro de visitas";
$lang['headTitle'] = "Título de cabecera";

$lang['changeMetaTags'] = "Cambiar meta-tags";
$lang['metaDescription'] = "Descripción en meta-tags";
$lang['metaKeywords'] = "Palabras clave en meta-tags";

$lang['changeMaxChar'] = "Cambiar carácteres máximos";
$lang['maxCharMsg'] = "Carácteres máximos por mensaje";
$lang['maxCharField'] = "Carácteres máximos por campo";

$lang['changeSecurity'] = "Cambiar medidas de seguridad";
$lang['floodTime'] = "Tiempo frente a envíos masivos (en seg.)";
$lang['moderateMsg'] = "Moderar mensajes?";
$lang['autoCensor'] = "Auto-censurar mensajes?";
$lang['checkEmail'] = "Comprobar correo electrónico?";
$lang['checkCaptcha'] = "Usar CAPTCHA?";
$lang['reCaptcha'] = "Use reCaptcha?";
$lang['reCaptchapubk'] = "reCaptcha public key";
$lang['reCaptchaprvk'] = "reCaptcha private key";

$lang['changeLanguages'] = "Cambiar idiomas";
$lang['guestbookLang'] = "Idioma del libro de visitas";
$lang['adminLang'] = "Administrar idioma";

$lang['changeVisual'] = "Cambiar efectos visuales";
$lang['guestbookTheme'] = "Tema del libro de visitas";
$lang['mobileTheme'] = "Tema para móvil";
$lang['numPostsPerPage'] = "Número de firmas/página";
$lang['pagesFormat'] = "Formato de páginas";
$lang['dateSort'] = "Sort by date";
$lang['ascending'] = "Ascending";
$lang['descending'] = "Descending";
$lang['several'] = "Varias páginas";
$lang['allinone'] = "Todas en una página";
$lang['dateFormat'] = "Formato de fecha";
$lang['timezone'] = "Timezone";

$lang['changeOffline'] = "Cambiar opciones offline";
$lang['offline'] = "Libro de visitas offline?";
$lang['offlineMessage'] = "Mensaje offline";

$lang['changeImage'] = "Cambiar formato de imágenes";
$lang['resizeImg'] = "Redimensionar imágenes?";
$lang['imgWidth'] = "Ancho";
$lang['imgHeight'] = "Alto";

// includes/content/admin.php
$lang['addAdmin'] = "Añadir administrador";
$lang['modifyAdmins'] = "Modificar administradores";
$lang['superAdminPassword'] = "Clave de super administrador";
$lang['adminName'] = "Nombre del nuevo administrador";
$lang['superPassError'] = "Contraseña de super administrador incorrecta";
$lang['superAdmin'] = "Super Administrador";

// includes/content/upload.php
$lang['upload'] = "Subir";
$lang['file'] = "Fichero";
$lang['uploadSmilies'] = "Emoticonos";
$lang['uploadThemes'] = "Temas";
$lang['uploadLanguages'] = "Idiomas";
$lang['uploadLocation'] = "Ubicación de envíos";
$lang['uploadError'] = "Error de envío";
$lang['cantDelete'] = "No se puede eliminar el fichero";

// includes/content/smilies.php
$lang['addSmiley'] = "Añadir emoticono";
$lang['modifySmilies'] = "Modificar emoticonos";
$lang['smileyName'] = "Nombre emoticono";
$lang['smileyCode'] = "Código emoticono";
$lang['smileyPath'] = "URL imagen de emoticono";

// includes/content/censored.php
$lang['addCensored'] = "Añadir palabra censurada";
$lang['modifyCensored'] = "Modificar palabras censuradas";
$lang['censoredOriginal'] = "Palabra original";
$lang['censoredReplacement'] = "Palabra de reemplazo";

// includes/content/search.php
$lang['sPosts'] = "Firmas";
$lang['sIP'] = "IP";
$lang['sUA'] = "User Agent";
$lang['sCountries'] = "Códigos de país";
$lang['sTrash'] = "Firmas en papelera";
$lang['searchType'] = "Tipo de búsqueda";
$lang['searchData'] = "Datos de búsqueda";

// includes/content/posts.php
$lang['pIP'] = "IP";
$lang['pEmail'] = "Correo electrónico";
$lang['noPostsToYourQuery'] = "No hay firmas que coincidan con los criterios de búsqueda";
$lang['actions'] = "Acciones";
$lang['globalActions'] = "Acciones globales";
$lang['pModify'] = "Modificar";
$lang['pDelete'] = "Eliminar";
$lang['pUnpublish'] = "Ocultar";
$lang['pPublish'] = "Publicar";
$lang['pReply'] = "Responder";
$lang['pBanIP'] = "Invalidar IP";
$lang['pUnbanIP'] = "Validar IP";
$lang['pRestore'] = "Restaurar";
$lang['emptyTrash'] = "Vaciar papelera";
$lang['deleteUnpublishedPosts'] = "Eliminar todas las firmas no publicadas";

// includes/boxes/pageLinks.php
$lang['previous'] = "<< Anterior";
$lang['next'] = "Siguiente >>";
$lang['page'] = "Página";

// includes/content/advOptions.php
$lang['changePaths'] = "Cambiar ubicación";
$lang['backupFolder'] = "Respaldos";
$lang['smiliesFolder'] = "Emoticonos";
$lang['langFolder'] = "Idiomas";
$lang['themesFolder'] = "Temas";
$lang['generatePaths'] = "Auto-generate Paths";

$lang['changeEmail'] = "Cambiar correo electrónico";
$lang['email'] = "Correo electrónico";
$lang['receiveEmailNotification'] = "Recibir notificación por correo electrónico?";

$lang['changeDatabase'] = "Información de base de datos";
$lang['dbHost'] = "Host de la base de datos";
$lang['dbDatabase'] = "Nombre de la base de datos";
$lang['dbUsername'] = "Usuario";
$lang['dbPassword'] = "Contraseña";
$lang['dbPrefix'] = "Prefijo de tablas";

$lang['manualDbFileCreation'] = "Copia y pega la información que aparece debajo en un nuevo fichero llamado: data.php
<br />
Luego reemplaza el fichero data.php original de tu libro de visitas por el nuevo que has creado.";

?>
