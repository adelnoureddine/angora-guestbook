<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

// General
$lang['charset'] = "UTF-8";
$lang['dir'] = "ltr";
$lang['lang'] = "ru";
$lang['isEmpty'] = "не может быть пустым!";
$lang['change'] = "Изменить";
$lang['add'] = "Добавить";
$lang['dataError'] = "Ошибка базы данных";
$lang['changeSuccess'] = "Изменения успешно применены";
$lang['yes'] = "Да";
$lang['no'] = "Нет";
$lang['javascriptEnabled'] = "JavaScript должен быть включен !";
$lang['noPermission'] = "У Вас нет доступа к этим страницам ! <br />Разрешение имеют только Супер-Администраторы ;)";
$lang['modify'] = "Изменить";
$lang['remove'] = "Удалить";
$lang['help'] = "Онлайн помощь";

$lang['changeLog'] = "Журнал изменений";

$lang['deleteUnpublishedPosts'] = "Удалить неопубликованные сообщения";
$lang['globalActions'] = "Глобальные действия";
$lang['ipBanned'] = "уже в списке запрещенных";
$lang['newVersionAvailable'] = "Новая версия доступна";
$lang['normalUpdate'] = "Стандартное обновление";
$lang['securityUpdate'] = "Обновление безопасности!";
$lang['browser'] = "Браузер";
$lang['sure'] = "Вы уверены?";

// Boxes

// includes/boxes/panel.php
$lang['posts'] = "Сообщения";
$lang['administrators'] = "Администраторы";
$lang['preferences'] = "Настройки";
$lang['logout'] = "Выход";
$lang['tools'] = "Инструменты";
$lang['phpinfo'] = "phpinfo";
$lang['navigation'] = "Навигация";
$lang['start'] = "Начало";
$lang['changePass'] = "Сменить пароль";
$lang['addAdmins'] = "Добавить/Удалить администраторов";
$lang['options'] = "Опции";
$lang['advancedOptions'] = "Продвинутые опции";
$lang['smilies'] = "Смайлики";
$lang['censored'] = "Цензура";
$lang['database'] = "База данных";
$lang['backupRestore'] = "Резервирование/Восстановление";
$lang['optimize'] = "Оптимизация";
$lang['messages'] = "Сообщения";
$lang['search'] = "Поиск";
$lang['banIP'] = "Запрет/Разрешение IP";
$lang['trash'] = "Корзина";
$lang['about'] = "О программе";
$lang['uploadCenter'] = "Центр загрузок";
$lang['guestbook'] = "Гостевая книга";

// includes/content/login.php
$lang['username'] = "Имя";
$lang['password'] = "Пароль";
$lang['login'] = "Логин";
$lang['errorLogin'] = "Ошибка входа";
$lang['nomatch'] = "не совпадают";
$lang['LIP'] = "IP";
$lang['lUserAgent'] = "UserAgent";
$lang['doesntExist'] = "не существует";
$lang['wrongPassword'] = "Неверный пароль";
$lang['javascriptNeeded'] = "Необходимо включить javascript, чтобы войти";
$lang['forgotPass'] = "Забыли пароль?";

// includes/content/changePass.php
$lang['normalAdmin'] = "Стандартный администратор";
$lang['superAdmin'] = "Супер администратор";
$lang['normalAdminText'] = "Свяжитесь с супер-администратором для сброса пароля";
$lang['superAdminText'] = "Введите электронный адрес, ассоциированный с гостевой книгой, чтобы Angora сгенерировала новый пароль для Вас";
$lang['emailChangePass'] = "Электронный адрес";
$lang['getNewPass'] = "Генерировать новый пароль";
$lang['isIncorrect'] = "не верный";
$lang['forgotPassSubject'] = "Ваш новый пароль";
$lang['forgotPassText'] = "Новый пароль был сгенерирован. Не забудьте изменить его. Ваш новый пароль: ";

// javascript password strength meter
$lang['passNotEntered'] = "Пароль не был введен";
$lang['weak'] = "Слабый";
$lang['better'] = "Лучше";
$lang['medium'] = "Средний";
$lang['strong'] = "Сильный";
$lang['strongest'] = "Достаточно сильный";

// includes/content/start.php
$lang['gbVersion'] = "Версия гостевой книги";
$lang['latestVersion'] = "Последняя версия";
$lang['phpVersion'] = "Версия PHP";
$lang['sqlVersion'] = "Версия MySQL";
$lang['numPosts'] = "Количество сообщений";
$lang['loggedAs'] = "Вошли как";
$lang['latestNews'] = "Последние новости";
$lang['infos'] = "Информация";
$lang['downloadNewVersion'] = "загрузить";

// includes/content/about.php
$lang['author'] = "Автор";
$lang['licence'] = "Лицензия";
$lang['website'] = "Веб-сайт";
$lang['logoLicence'] = "Лицензия логотипа";

// includes/content/changePass.php
$lang['oldPassword'] = "Старый пароль";
$lang['newPassword'] = "Новый пароль";
$lang['confirmNewPassword'] = "Подтвердите новый пароль";
$lang['wrongOldPass'] = "Старый пароль введен не верно";
$lang['newPassMatch'] = "Новые пароли не совпадают";

// includes/content/optimize.php
$lang['optimizationSuccess'] = "Оптимизация завершена";
$lang['optimizationNeeded'] = "Таблицы нуждаются в оптимизации";
$lang['optimizationNotNeeded'] = "Нет нужды в оптимизации";

// includes/content/banIP.php
$lang['ipnumber'] = "IP адрес";
$lang['ban'] = "Запретить";
$lang['unban'] = "Разрешить";

// includes/content/backup.php
$lang['backupDatabase'] = "Резервировать базу данных";
$lang['restoreDatabase'] = "Восстановить базу данных";
$lang['sqlFile'] = "SQL-файл";
$lang['restore'] = "Востановить";
$lang['permissionsError'] = "Нет прав для записи в загруженный SQL-файл";
$lang['bLog'] = "Журнал резервов";
$lang['bDate'] = "Дата";
$lang['bOperation'] = "Операция";
$lang['unkownOperation'] = "Неизвестная операция";
$lang['bClear'] = "Очистить";

// includes/content/options.php
$lang['changeTitles'] = "Изменить заголовки";
$lang['gbTitle'] = "Заголовок гостевой книги";
$lang['headTitle'] = "Заголовок шапки";

$lang['changeMetaTags'] = "Изменить мета-теги";
$lang['metaDescription'] = "Описание мета-тегов";
$lang['metaKeywords'] = "Мета-тег Ключевые слова";

$lang['changeMaxChar'] = "Изменить макс. кол-во символов";
$lang['maxCharMsg'] = "Макс. кол-во символов в сообщений";
$lang['maxCharField'] = "Макс. кол-во символов в поле";

$lang['changeSecurity'] = "Изменить меры безопасности";
$lang['floodTime'] = "Время для Анти-флуда (в сек.)";
$lang['moderateMsg'] = "Модерировать сообщения?";
$lang['autoCensor'] = "Использовать авто-цензор?";
$lang['checkEmail'] = "Проверять электронный адрес?";
$lang['checkCaptcha'] = "Использовать CAPTCHA?";
$lang['debug'] = "Режим отладки?";
$lang['reCaptcha'] = "Использовать reCaptcha?";
$lang['reCaptchapubk'] = "Публичный ключ reCaptcha";
$lang['reCaptchaprvk'] = "Приватный ключ reCaptcha";

$lang['changeLanguages'] = "Изменить языки";
$lang['guestbookLang'] = "Язык гостевой книги";
$lang['adminLang'] = "Язык админки";

$lang['changeVisual'] = "Изменить визуальные эффекты";
$lang['guestbookTheme'] = "Тема гостевой книги";
$lang['mobileTheme'] = "Мобильная тема";
$lang['numPostsPerPage'] = "Кол-во сообщений на странице";
$lang['pagesFormat'] = "Формат страниц";
$lang['dateSort'] = "Sort by date";
$lang['ascending'] = "Ascending";
$lang['descending'] = "Descending";
$lang['several'] = "Несколько страниц";
$lang['allinone'] = "Все на одной странице";
$lang['dateFormat'] = "Формат даты";
$lang['timezone'] = "Временная зона";

$lang['changeOffline'] = "Изменить оффлайн-опции";
$lang['offline'] = "Отключить гостевую книгу?";
$lang['offlineMessage'] = "Отключить сообщения";

$lang['changeImage'] = "Изменить формат изображения";
$lang['resizeImg'] = "Изменить размер изображения?";
$lang['imgWidth'] = "Длина";
$lang['imgHeight'] = "Высота";

// includes/content/admin.php
$lang['addAdmin'] = "Добавить администратора";
$lang['modifyAdmins'] = "Изменить администраторов";
$lang['superAdminPassword'] = "Пароль супер-администратора";
$lang['adminName'] = "Имя нового администратора";
$lang['superPassError'] = "Пароль супер-администратора не верный";
$lang['superAdmin'] = "Супер администратор";

// includes/content/upload.php
$lang['upload'] = "Загрузить";
$lang['file'] = "Файл";
$lang['uploadSmilies'] = "Смайлики";
$lang['uploadThemes'] = "Темы";
$lang['uploadLanguages'] = "Языки";
$lang['uploadLocation'] = "Путь загрузки";
$lang['uploadError'] = "Ошибка загрузки";
$lang['cantDelete'] = "Не удалось удалить файл";

// includes/content/smilies.php
$lang['addSmiley'] = "Добавить смайлик";
$lang['modifySmilies'] = "Править смайлики";
$lang['smileyName'] = "Имя смайлика";
$lang['smileyCode'] = "Код смайлика";
$lang['smileyPath'] = "URL изображения";

// includes/content/censored.php
$lang['addCensored'] = "Добавить цензуру к слову";
$lang['modifyCensored'] = "Править установленные цензуры";
$lang['censoredOriginal'] = "Оригинальное слово";
$lang['censoredReplacement'] = "Слово для замены";

// includes/content/search.php
$lang['sPosts'] = "Сообщения";
$lang['sIP'] = "IP";
$lang['sUA'] = "User Agent";
$lang['sCountries'] = "Код страны";
$lang['sTrash'] = "Удаленные сообщения";
$lang['searchType'] = "Тип поиска";
$lang['searchData'] = "Данные поиска";

// includes/content/posts.php
$lang['pIP'] = "IP";
$lang['pEmail'] = "Электронный адрес";
$lang['noPostsToYourQuery'] = "Нет сообщений соответствующих Вашему запросу";
$lang['actions'] = "Действия";
$lang['pModify'] = "Изменить";
$lang['pDelete'] = "Удалить";
$lang['pUnpublish'] = "Снять публикацию";
$lang['pPublish'] = "Опубликовать";
$lang['pReply'] = "Ответить";
$lang['pBanIP'] = "Запретить IP";
$lang['pUnbanIP'] = "Разрешить IP";
$lang['pRestore'] = "Восстановить";
$lang['emptyTrash'] = "Очистить корзину";
$lang[''] = "";

// includes/boxes/pageLinks.php
$lang['previous'] = "<< Ранее";
$lang['next'] = "Позднее >>";
$lang['page'] = "Страница";

// includes/content/advOptions.php
$lang['changePaths'] = "Изменить пути";
$lang['backupFolder'] = "Резервировать";
$lang['smiliesFolder'] = "Смайлики";
$lang['langFolder'] = "Языки";
$lang['themesFolder'] = "ТЕмы";
$lang['generatePaths'] = "Автогенерация путей";

$lang['changeEmail'] = "Сменить электронный адрес";
$lang['email'] = "Электронный адрес";
$lang['receiveEmailNotification'] = "Получать уведомления по почте?";

$lang['changeDatabase'] = "Информация о базе данных";
$lang['dbHost'] = "Хост БД";
$lang['dbDatabase'] = "Имя БД";
$lang['dbUsername'] = "Пользователь";
$lang['dbPassword'] = "Пароль";
$lang['dbPrefix'] = "Префикс для таблиц";

$lang['manualDbFileCreation'] = "Скопируйте и вставьте информацию представленную ниже в новый файл и назовите его : data.php
<br />
Затем замените в Вашей гостевой книге хост и оригинальный файл data.php на созданный Вами.";

?>
