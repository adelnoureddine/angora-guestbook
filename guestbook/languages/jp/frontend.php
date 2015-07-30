<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

// General
$lang['charset'] = "UTF-8";
$lang['dir'] = "ltr";
$lang['lang'] = "jp";

// Boxes
$lang['sign'] = "ゲストブックにコメントする";
$lang['view'] = "コメントを見る";
$lang['search'] = "検索";
$lang['statistics'] = "統計";
$lang['next'] = "次 >>";
$lang['previous'] = "<< 前";
$lang['poweredBy'] = "Powered by";
$lang['page'] = "ページ";

// content/posts.php
$lang['noPostsToYourQuery'] = "検索条件に一致するコメントはありません。";

// content/sign.php
$lang['name'] = "名前";
$lang['message'] = "コメント";
$lang['country'] = "国";
$lang['location'] = "地域";
$lang['email'] = "Email";
$lang['rating'] = "評価";
$lang['send'] = "送る";
$lang['isEmpty'] = "は空欄にできません！";
$lang['isBig'] = "が多すぎます！";
$lang['emailInvalid'] = "は有効なメールではありません！";
$lang['bannedIP'] = "はアクセス禁止です";
$lang['floodTime'] = "最近既に、ゲストブックにコメントしています！";
$lang['errorSigndb'] = "データベースへの書き込みエラー";
$lang['redirect'] = "インデックスページに移動します";
$lang['okSign'] = "ゲストブックに書き込みました！";
$lang['captcha'] = "キャプチャコード";
$lang['captchaError'] = "キャプチャコードが間違っています";
$lang['newMsgEmailSubject'] = "ゲストブックへの新しいコメント！";
$lang['newMsgEmail'] = "ゲストブックに新しいコメントが記入されました。";
$lang['numberResults'] = "結果数 : ";

// content/stats.php
$lang['total'] = "合計";
$lang['nbPosts'] = "コメント数";
$lang['browser'] = "ブラウザ";
$lang['os'] = "OS";
$lang['when'] = "When";
$lang['allTime'] = "All Time";
$lang['lastMonth'] = "Last Month";

?>