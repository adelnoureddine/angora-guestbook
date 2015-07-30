<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

// General
$lang['charset'] = "UTF-8";
$lang['dir'] = "ltr";
$lang['lang'] = "zh";

// Boxes
$lang['sign'] = "留下留言";
$lang['view'] = "檢視留言";
$lang['search'] = "搜尋";
$lang['statistics'] = "統計";
$lang['next'] = "下一頁 >>";
$lang['previous'] = "<< 前一頁";
$lang['poweredBy'] = "Powered by";
$lang['page'] = "頁面";

// content/posts.php
$lang['noPostsToYourQuery'] = "沒有留言符合你的搜尋要求";

// content/sign.php
$lang['name'] = "名稱";
$lang['message'] = "訊息";
$lang['country'] = "國家";
$lang['location'] = "位置";
$lang['email'] = "Email";
$lang['rating'] = "評分";
$lang['send'] = "送出";
$lang['isEmpty'] = "不能為空白!";
$lang['isBig'] = "太大!";
$lang['emailInvalid'] = " 不是一個有效的 Email!";
$lang['bannedIP'] = "被禁止";
$lang['floodTime'] = "你最近已經留言過了!";
$lang['errorSigndb'] = "寫入資料庫錯誤";
$lang['redirect'] = "你將會被自動轉至首頁";
$lang['okSign'] = "留言成功!";
$lang['captcha'] = "認證碼";
$lang['captchaError'] = "認證碼不正確";
$lang['newMsgEmailSubject'] = "你的留言板有新的留言!";
$lang['newMsgEmail'] = "有人在你的留言板留下新的留言。";
$lang['numberResults'] = "結果數: ";

// content/stats.php
$lang['total'] = "總共";
$lang['nbPosts'] = "留言數";
$lang['browser'] = "瀏覽器";
$lang['os'] = "作業系統";
$lang['when'] = "何時";
$lang['allTime'] = "任何時間";
$lang['lastMonth'] = "上個月";

?>