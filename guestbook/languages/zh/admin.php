<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

// General
$lang['charset'] = "UTF-8";
$lang['dir'] = "ltr";
$lang['lang'] = "zh";
$lang['isEmpty'] = "不能為空白!";
$lang['change'] = "變更";
$lang['add'] = "新增";
$lang['dataError'] = "資料庫錯誤";
$lang['changeSuccess'] = "變更成功";
$lang['yes'] = "是";
$lang['no'] = "否";
$lang['javascriptEnabled'] = "必須啟用 JavaScript!";
$lang['noPermission'] = "你沒有存取此頁面的權限!<br />只有超級管理員可以 ;)";
$lang['modify'] = "修改";
$lang['remove'] = "移除";
$lang['help'] = "線上說明";
$lang['sure'] = "你確定嗎?";

// Boxes

// includes/boxes/panel.php
$lang['posts'] = "留言";
$lang['administrators'] = "管理員";
$lang['preferences'] = "偏好設定";
$lang['logout'] = "登出";
$lang['tools'] = "工具";
$lang['phpinfo'] = "phpinfo";
$lang['navigation'] = "導覽";
$lang['start'] = "首頁";
$lang['changePass'] = "變更密碼";
$lang['addAdmins'] = "新增/移除管理員";
$lang['options'] = "選項";
$lang['advancedOptions'] = "進階選項";
$lang['smilies'] = "表情符號";
$lang['censored'] = "過濾文字";
$lang['database'] = "資料庫";
$lang['backupRestore'] = "備份/還原";
$lang['optimize'] = "最佳化";
$lang['messages'] = "訊息";
$lang['search'] = "搜尋";
$lang['banIP'] = "禁止/解禁 IP";
$lang['trash'] = "垃圾";
$lang['about'] = "關於";
$lang['uploadCenter'] = "上傳中心";
$lang['guestbook'] = "留言板";

// includes/content/login.php
$lang['username'] = "名稱";
$lang['password'] = "密碼";
$lang['login'] = "登入";
$lang['errorLogin'] = "登入錯誤";
$lang['nomatch'] = "不符合";
$lang['LIP'] = "IP";
$lang['lUserAgent'] = "使用者識別";
$lang['doesntExist'] = "不存在";
$lang['wrongPassword'] = "密碼錯誤";
$lang['javascriptNeeded'] = "登入需要啟用 JavaScript";
$lang['forgotPass'] = "忘記密碼?";

// includes/content/changePass.php
$lang['normalAdmin'] = "一般管理員";
$lang['superAdmin'] = "超級管理員";
$lang['normalAdminText'] = "聯絡超級管理員以重設你的密碼";
$lang['superAdminText'] = "輸入與此留言板關連的 Email 讓 Angora 產生新的密碼";
$lang['emailChangePass'] = "Email";
$lang['getNewPass'] = "產生新密碼";
$lang['isIncorrect'] = "不正確";
$lang['forgotPassSubject'] = "你的新密碼";
$lang['forgotPassText'] = "新密碼已產生。請記得變更密碼。新密碼是: ";

// javascript password strength meter
$lang['passNotEntered'] = "未輸入密碼";
$lang['weak'] = "弱";
$lang['better'] = "較佳";
$lang['medium'] = "中等";
$lang['strong'] = "強";
$lang['strongest'] = "最強";

// includes/content/start.php
$lang['gbVersion'] = "留言板版本";
$lang['phpVersion'] = "PHP 版本";
$lang['sqlVersion'] = "MySQL 版本";
$lang['numPosts'] = "留言數";
$lang['loggedAs'] = "登入為";
$lang['latestNews'] = "最新消息";
$lang['infos'] = "資訊";
$lang['downloadNewVersion'] = "下載";
$lang['changeLog'] = "更新記錄";
$lang['newVersionAvailable'] = "有新版本可用";
$lang['normalUpdate'] = "一般更新";
$lang['securityUpdate'] = "安全性更新!";

// includes/content/about.php
$lang['author'] = "作者";
$lang['licence'] = "授權";
$lang['website'] = "網站";

// includes/content/changePass.php
$lang['oldPassword'] = "舊密碼";
$lang['newPassword'] = "新密碼";
$lang['confirmNewPassword'] = "確認新密碼";
$lang['wrongOldPass'] = "舊密碼錯誤";
$lang['newPassMatch'] = "新密碼不符合";

// includes/content/optimize.php
$lang['optimizationSuccess'] = "最佳化完成";
$lang['optimizationNeeded'] = "資料表需要最佳化";
$lang['optimizationNotNeeded'] = "不需要最佳化";

// includes/content/banIP.php
$lang['ipnumber'] = "IP";
$lang['ban'] = "禁止";
$lang['unban'] = "解禁";
$lang['ipBanned'] = "已經被禁止";

// includes/content/backup.php
$lang['backupDatabase'] = "備份資料庫";
$lang['restoreDatabase'] = "還原資料庫";
$lang['sqlFile'] = "SQL 檔案";
$lang['restore'] = "還原";
$lang['permissionsError'] = "上傳的 SQL 檔案沒有寫入權限";
$lang['bLog'] = "備份記錄";
$lang['bDate'] = "日期";
$lang['bOperation'] = "操作";
$lang['unkownOperation'] = "不明操作";
$lang['bClear'] = "清除";

// includes/content/options.php
$lang['changeTitles'] = "變更標題";
$lang['gbTitle'] = "留言板標題";
$lang['headTitle'] = "視窗標題";

$lang['changeMetaTags'] = "修改 meta-tags";
$lang['metaDescription'] = "Meta-tags 描述";
$lang['metaKeywords'] = "Meta-tags 關鍵字";

$lang['changeMaxChar'] = "變更最大長度";
$lang['maxCharMsg'] = "留言最大長度";
$lang['maxCharField'] = "欄位最大長度";

$lang['changeSecurity'] = "變更安全程度";
$lang['floodTime'] = "防止洗版時間(秒)";
$lang['moderateMsg'] = "人工過濾留言?";
$lang['autoCensor'] = "自動過濾留言?";
$lang['checkEmail'] = "檢查 Email?";
$lang['checkCaptcha'] = "使用驗證碼?";
$lang['debug'] = "除錯模式?";
$lang['reCaptcha'] = "使用 reCaptcha?";
$lang['reCaptchapubk'] = "reCaptcha public key";
$lang['reCaptchaprvk'] = "reCaptcha private key";

$lang['changeLanguages'] = "變更語言";
$lang['guestbookLang'] = "留言板語言";
$lang['adminLang'] = "管理員語言";

$lang['changeVisual'] = "變更視覺效果";
$lang['guestbookTheme'] = "留言板佈景";
$lang['mobileTheme'] = "行動裝置用佈景";
$lang['numPostsPerPage'] = "每頁留言數";
$lang['pagesFormat'] = "頁面格式";
$lang['several'] = "好幾頁";
$lang['allinone'] = "全部在同一頁";
$lang['dateFormat'] = "日期格式";
$lang['timezone'] = "時區";

$lang['changeOffline'] = "變更離線選項";
$lang['offline'] = "留言板離線?";
$lang['offlineMessage'] = "離線訊息";

$lang['changeImage'] = "變更圖片格式";
$lang['resizeImg'] = "調整圖片大小?";
$lang['imgWidth'] = "寬";
$lang['imgHeight'] = "高";

// includes/content/admin.php
$lang['addAdmin'] = "新增管理員";
$lang['modifyAdmins'] = "修改管理員";
$lang['superAdminPassword'] = "超級管理員密碼";
$lang['adminName'] = "新管理員名稱";
$lang['superPassError'] = "超級管理員密碼錯誤";
$lang['superAdmin'] = "超級管理員";

// includes/content/upload.php
$lang['upload'] = "上傳";
$lang['file'] = "檔案";
$lang['uploadSmilies'] = "表情符號";
$lang['uploadThemes'] = "佈景";
$lang['uploadLanguages'] = "語言";
$lang['uploadLocation'] = "上傳位置";
$lang['uploadError'] = "上傳錯誤";
$lang['cantDelete'] = "無法刪除檔案";

// includes/content/smilies.php
$lang['addSmiley'] = "新增表情符號";
$lang['modifySmilies'] = "修改表情符號";
$lang['smileyName'] = "名稱";
$lang['smileyCode'] = "符號";
$lang['smileyPath'] = "圖片連結";

// includes/content/censored.php
$lang['addCensored'] = "新增過濾文字";
$lang['modifyCensored'] = "修改過濾文字";
$lang['censoredOriginal'] = "原始文字";
$lang['censoredReplacement'] = "替換文字";

// includes/content/search.php
$lang['sPosts'] = "留言";
$lang['sIP'] = "IP";
$lang['sUA'] = "使用者識別";
$lang['sCountries'] = "國家代碼";
$lang['sTrash'] = "垃圾留言";
$lang['searchType'] = "搜尋類型";
$lang['searchData'] = "搜尋資料";

// includes/content/posts.php
$lang['pIP'] = "IP";
$lang['pEmail'] = "Email";
$lang['noPostsToYourQuery'] = "沒有留言符合你的搜尋要求";
$lang['actions'] = "動作";
$lang['globalActions'] = "全域動作";
$lang['pModify'] = "修改";
$lang['pDelete'] = "刪除";
$lang['pUnpublish'] = "隱藏";
$lang['pPublish'] = "顯示";
$lang['pReply'] = "回覆";
$lang['pBanIP'] = "禁止 IP";
$lang['pUnbanIP'] = "解禁 IP";
$lang['pRestore'] = "還原";
$lang['emptyTrash'] = "清空垃圾";
$lang['deleteUnpublishedPosts'] = "刪除所有隱藏留言";

// includes/boxes/pageLinks.php
$lang['previous'] = "<< 前一頁";
$lang['next'] = "下一頁 >>";
$lang['page'] = "頁面";

// includes/content/advOptions.php
$lang['changePaths'] = "變更路徑";
$lang['backupFolder'] = "備份";
$lang['smiliesFolder'] = "表情符號";
$lang['langFolder'] = "語言";
$lang['themesFolder'] = "佈景";
$lang['generatePaths'] = "自動產生路徑";

$lang['changeEmail'] = "變更 Email";
$lang['email'] = "Email";
$lang['receiveEmailNotification'] = "接收 Email 通知?";

$lang['changeDatabase'] = "資料庫資訊";
$lang['dbHost'] = "資料庫主機";
$lang['dbDatabase'] = "資料庫名稱";
$lang['dbUsername'] = "使用者名稱";
$lang['dbPassword'] = "密碼";
$lang['dbPrefix'] = "資料表前綴";

$lang['manualDbFileCreation'] = "複製貼上以下資訊到一個新檔案，並取名為 data.php
<br />
然後以此檔案取代原本的 data.php。";

?>