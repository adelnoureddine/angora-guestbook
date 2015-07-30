<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

// General
$lang['charset'] = "UTF-8";
$lang['dir'] = "ltr";
$lang['lang'] = "ru";

// Boxes
$lang['sign'] = "Войти в гостевую книгу";
$lang['view'] = "Просмотр сообщений";
$lang['search'] = "Поиск";
$lang['statistics'] = "Статистика";
$lang['next'] = "Следующие >>";
$lang['previous'] = "<< Предыдущие";
$lang['poweredBy'] = "Разработано";
$lang['page'] = "Страница";

// content/posts.php
$lang['noPostsToYourQuery'] = "Нет сообщений соответствующих Вашему запросу";

// content/sign.php
$lang['name'] = "Имя";
$lang['message'] = "Сообщение";
$lang['country'] = "Страна";
$lang['location'] = "Место расположения";
$lang['email'] = "Электронный адрес";
$lang['rating'] = "Рейтинг";
$lang['send'] = "Отправить";
$lang['isEmpty'] = "не может быть пустым!";
$lang['isBig'] = "слишком большого размера!";
$lang['emailInvalid'] = " не верный электронный адрес!";
$lang['bannedIP'] = "запрещен";
$lang['floodTime'] = "Вы уже входили в гостевую книгу ранее!";
$lang['errorSigndb'] = "Ошибка записи в базу данных";
$lang['redirect'] = "Вы будете перемещены на следующуй страницу";
$lang['okSign'] = "Вы вошли в гостевую книгу!";
$lang['captcha'] = "Код Captcha";
$lang['captchaError'] = "Captcha введена не верно";
$lang['newMsgEmailSubject'] = "Новая запись в Вашей гостевой книге !";
$lang['newMsgEmail'] = "Кто-то оставил новую запись в Вашей гостевой книге.";
$lang['numberResults'] = "Количество результатов : ";

// content/stats.php
$lang['total'] = "Всего";
$lang['nbPosts'] = "Количество сообщений";
$lang['browser'] = "Просмотр";
$lang['os'] = "ОС";
$lang['when'] = "When";
$lang['allTime'] = "All Time";
$lang['lastMonth'] = "Last Month";

?>