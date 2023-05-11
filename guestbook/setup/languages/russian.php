<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

// General
$lang['charset'] = "UTF-8";
$lang['dir'] = "ltr";
$lang['lang'] = "ru";
$lang['title'] = "Система установки Гостевой Книги Angora";
$lang['ok'] = "OK";
$lang['no'] = "Нет";
$lang['next'] = "Далее >>";
$lang['previous'] = "<< Назад";
$lang['isEmpty'] = "не может быть пустым!";

// includes/content/lang.php
$lang['language'] = "Язык";

// includes/content/check.php
$lang['requiredSettings'] = "Необходимые настройки";
$lang['phpVersion'] = "Версия PHP >= 5.2.0";
$lang['mysqlSupport'] = "Поддержка MySQL";
$lang['mysqlVersion'] = "Версия MySQL >= 4.1.0";
$lang['recommendedSettings'] = "Рекомендуемые настройки";
$lang['gdLibrary'] = "Библиотека работы с изображениями GD";
$lang['zlibSupport'] = "поддержка zlib";

// includes/content/licence.php
$lang['angLicence'] = "Лицензия Гостевой книги Angora";

// includes/content/method.php
$lang['instMethod'] = "Метод установки";
$lang['updateFrom'] = "Обновить ANG с версии 0.7.x";
$lang['updateFrom2'] = "Обновить с версии 1.6.1";
$lang['newInstallation'] = "Новай установка";

//includes/content/update.php
$lang['convertTables'] = "Конвертация таблиц";
$lang['convertionDone'] = "Конвертация завершена";
$lang['convertionFailed'] = "Конвертация провалена";
$lang['cleaningUp'] = "Очистка";
$lang['dropOldTables'] = "Удаление старых таблиц";
$lang['renameNewTables'] = "Переименование новых таблиц";

// includes/content/install.php
$lang['mysqlConfiguration'] = "Конфигурация MySQL";
$lang['host'] = "Хост";
$lang['username'] = "MySQL пользователь";
$lang['password'] = "MySQL пароль";
$lang['database'] = "MySQL имя базы данных";
$lang['prefix'] = "MySQL префикс таблиц";

// includes/content/config.php
$lang['mysqlInstallation'] = "Установка MySQL";
$lang['dataError'] = "Ошибка базы данных!";
$lang['installationDone'] = "Установка завершена";
$lang['guestbookConfiguration'] = "Конфигурация гостевой книги";
$lang['adminName'] = "Имя супер-администратора";
$lang['adminPass'] = "Пароль";
$lang['adminPassConf'] = "Подтверждение пароля";
$lang['adminEmail'] = "Электронный адрес";
$lang['fileCreation'] = "Создание файла";

// includes/content/finish.php
$lang['finishInstallation'] = "Завершить установку";
$lang['areDifferent'] = "различаются!";
$lang['adminConfigurationDone'] = "Конфигурация администраторов завершена";
$lang['generalConfigurationDone'] = "Основная конфигурация завершена";
$lang['manualDbFileCreation'] = "Скопируйте и вставьте информацию представленную ниже в новый файл и назовите его : data.php
<br />
Затем скопируйте его в корневую директорию Вашей гостевой книги.";

$lang['deleteSetup'] = "Не забудьте удалить установочные файлы!";
$lang['yesYouCan'] = "Вы можете перейти к";
$lang['adminCenter'] = "Центр администрирования";
$lang['newGuestbook'] = "Ваша новая гостевая книга";
$lang['finishing'] = "Завершение";

// javascript password strength meter
$lang['passNotEntered'] = "Пароль небыл введен";
$lang['weak'] = "Слабый";
$lang['better'] = "Лучше";
$lang['medium'] = "Средний";
$lang['strong'] = "Сильный";
$lang['strongest'] = "Достаточно сильный";

?>
