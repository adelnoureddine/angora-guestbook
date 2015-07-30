<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

// General
$lang['charset'] = "UTF-8";
$lang['dir'] = "ltr";
$lang['lang'] = "es";

// Boxes
$lang['sign'] = "Firmar libro de visitas";
$lang['view'] = "Ver firmas";
$lang['search'] = "Buscar";
$lang['statistics'] = "Estadísticas";
$lang['next'] = "Siguiente >>";
$lang['previous'] = "<< Anterior";
$lang['poweredBy'] = "Potenciado por";
$lang['page'] = "Página";

// content/posts.php
$lang['noPostsToYourQuery'] = "No hay firmas que coincidan con los criterios de búsqueda";

// content/sign.php
$lang['name'] = "Nombre";
$lang['message'] = "Mensaje";
$lang['country'] = "País";
$lang['location'] = "Ubicación";
$lang['email'] = "Correo electrónico";
$lang['rating'] = "Clasificación";
$lang['send'] = "Enviar";
$lang['isEmpty'] = "no puede estar vacío!";
$lang['isBig'] = "es demasiado grande!";
$lang['emailInvalid'] = " no es un correo electrónico válido!";
$lang['bannedIP'] = "está invalidada";
$lang['floodTime'] = " recientemente ya has firmado en el libro de visitas!";
$lang['errorSigndb'] = "Error durante inicio de la base de datos";
$lang['redirect'] = "Serás redirigido a la página de inicio";
$lang['okSign'] = "Has firmado en el libro de visitas!";
$lang['captcha'] = "Código captcha";
$lang['captchaError'] = "Código captcha incorrecto";
$lang['newMsgEmailSubject'] = "Nueva firma en tu libro de visitas !";
$lang['newMsgEmail'] = "Alguien ha enviado una nueva firma a tu libro de visitas.";
$lang['numberResults'] = "Número de resultados : ";

// content/stats.php
$lang['total'] = "Total";
$lang['nbPosts'] = "Número de firmas";
$lang['browser'] = "Navegador";
$lang['os'] = "OS";
$lang['when'] = "Cuando";
$lang['allTime'] = "Todo el tiempo";
$lang['lastMonth'] = "Último mes";

?>