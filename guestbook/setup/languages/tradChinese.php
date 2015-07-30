<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

// General
$lang['charset'] = "UTF-8";
$lang['dir'] = "ltr";
$lang['lang'] = "zh";
$lang['title'] = "Angora 留言板網路安裝程式";
$lang['ok'] = "確定";
$lang['no'] = "否";
$lang['next'] = "下一步 >>";
$lang['previous'] = "<< 前一步";
$lang['isEmpty'] = "不能為空白!";

// includes/content/lang.php
$lang['language'] = "語言";

// includes/content/check.php
$lang['requiredSettings'] = "基本需求設定";
$lang['phpVersion'] = "PHP 版本 >= 5.2.0";
$lang['mysqlSupport'] = "MySQL 支援";
$lang['mysqlVersion'] = "MySQL 版本 >= 4.1.0";
$lang['recommendedSettings'] = "建議設定";
$lang['gdLibrary'] = "GD Image Library";
$lang['zlibSupport'] = "zlib 支援";

// includes/content/licence.php
$lang['angLicence'] = "Angora 留言板授權";

// includes/content/method.php
$lang['instMethod'] = "安裝方式";
$lang['updateFrom'] = "從 ANG 0.7.x 更新";
$lang['updateFrom2'] = "從 1.x 版更新";
$lang['newInstallation'] = "全新安裝";

//includes/content/update.php
$lang['convertTables'] = "轉換資料表";
$lang['convertionDone'] = "轉換完成";
$lang['convertionFailed'] = "轉換失敗";
$lang['cleaningUp'] = "清理";
$lang['dropOldTables'] = "丟棄舊的資料表";
$lang['renameNewTables'] = "重新命名新的資料表";

// includes/content/install.php
$lang['mysqlConfiguration'] = "設置 MySQL";
$lang['host'] = "主機";
$lang['username'] = "MySQL 使用者名稱";
$lang['password'] = "MySQL 密碼";
$lang['database'] = "MySQL 資料庫名稱";
$lang['prefix'] = "MySQL 資料表前綴";

// includes/content/config.php
$lang['mysqlInstallation'] = "安裝 MySQL";
$lang['dataError'] = "資料庫錯誤!";
$lang['installationDone'] = "安裝完成";
$lang['guestbookConfiguration'] = "設置留言板";
$lang['adminName'] = "超級管理員名稱";
$lang['adminPass'] = "密碼";
$lang['adminPassConf'] = "確認密碼";
$lang['adminEmail'] = "Email";
$lang['fileCreation'] = "檔案建立";

// includes/content/finish.php
$lang['finishInstallation'] = "安裝完成";
$lang['areDifferent'] = "不同!";
$lang['adminConfigurationDone'] = "管理員設置完成";
$lang['generalConfigurationDone'] = "一般設置完成";
$lang['manualDbFileCreation'] = "複製貼上以下資訊到一個新檔案，並取名為 data.php
<br />
然後以此檔案取代原本的 data.php。";

$lang['deleteSetup'] = "記得刪除 setup 資料夾!";
$lang['yesYouCan'] = "你可以去";
$lang['adminCenter'] = "管理中心";
$lang['newGuestbook'] = "你的新留言板";
$lang['finishing'] = "完成";

// javascript password strength meter
$lang['passNotEntered'] = "未輸入密碼";
$lang['weak'] = "弱";
$lang['better'] = "較佳";
$lang['medium'] = "中等";
$lang['strong'] = "強";
$lang['strongest'] = "最強";

?>