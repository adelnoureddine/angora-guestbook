<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

// General
$lang['charset'] = "UTF-8";
$lang['dir'] = "ltr";
$lang['lang'] = "jp";
$lang['title'] = "Angora ゲストブック ウェッブ インストーラー";
$lang['ok'] = "OK";
$lang['no'] = "NO";
$lang['next'] = "次 >>";
$lang['previous'] = "<< 前";
$lang['isEmpty'] = "空欄にできません！";

// includes/content/lang.php
$lang['language'] = "言語";

// includes/content/check.php
$lang['requiredSettings'] = "必須設定";
$lang['phpVersion'] = "PHP バージョン >= 5.2.0";
$lang['mysqlSupport'] = "MySQL サポート";
$lang['mysqlVersion'] = "MySQL バージョン >= 4.1.0";
$lang['recommendedSettings'] = "推奨設定";
$lang['gdLibrary'] = "GD イメージライブラリ";
$lang['zlibSupport'] = "zlib サポート";

// includes/content/licence.php
$lang['angLicence'] = "Angora ゲストブック ライセンス";

// includes/content/method.php
$lang['instMethod'] = "インストール方法";
$lang['updateFrom'] = "ANG バージョン 0.7.x からのアップデート";
$lang['updateFrom2'] = "Update from versions 1.6.1";
$lang['newInstallation'] = "新規インストール";

//includes/content/update.php
$lang['convertTables'] = "テーブルを変換";
$lang['convertionDone'] = "変換完了";
$lang['convertionFailed'] = "変換失敗";
$lang['cleaningUp'] = "削除する";
$lang['dropOldTables'] = "旧テーブルを削除";
$lang['renameNewTables'] = "新テーブルの名前を変更";

// includes/content/install.php
$lang['mysqlConfiguration'] = "MySQLの設定";
$lang['host'] = "ホスト";
$lang['username'] = "MySQL ユーザ名";
$lang['password'] = "MySQL パスワード";
$lang['database'] = "MySQL データベース名";
$lang['prefix'] = "MySQL テーブル プレフィクス";

// includes/content/config.php
$lang['mysqlInstallation'] = "MySQL インストレーション";
$lang['dataError'] = "データベースエラー！";
$lang['installationDone'] = "インストレーション完了";
$lang['guestbookConfiguration'] = "ゲストブック設定";
$lang['adminName'] = "最高管理者名";
$lang['adminPass'] = "パスワード";
$lang['adminPassConf'] = "パスワードを再入力";
$lang['adminEmail'] = "Email";
$lang['fileCreation'] = "ファイル作成";

// includes/content/finish.php
$lang['finishInstallation'] = "インストレーション終了";
$lang['areDifferent'] = "が異なっています！";
$lang['adminConfigurationDone'] = "管理者設定完了";
$lang['generalConfigurationDone'] = "一般設定完了";
$lang['manualDbFileCreation'] = "下記情報を、新しいファイルにコピー＆ペーストし、次の名前にして下さい : data.php
<br />
そしてそのファイルを、あなたのゲストブックのルートフォルダに保存して下さい。";

$lang['deleteSetup'] = "setupフォルダを必ず削除して下さい！";
$lang['yesYouCan'] = "以下に進めます。";
$lang['adminCenter'] = "管理者センター";
$lang['newGuestbook'] = "あなたの新しいゲストブック";
$lang['finishing'] = "最後に";

// javascript password strength meter
$lang['passNotEntered'] = "パスワード未入力";
$lang['weak'] = "弱い";
$lang['better'] = "やや弱い";
$lang['medium'] = "中位";
$lang['strong'] = "やや強い";
$lang['strongest'] = "強い";

?>
