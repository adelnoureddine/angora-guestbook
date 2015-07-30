<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

// General
$lang['charset'] = "UTF-8";
$lang['dir'] = "ltr";
$lang['lang'] = "jp";
$lang['isEmpty'] = "は空欄にできません！";
$lang['change'] = "変更";
$lang['add'] = "追加";
$lang['dataError'] = "データベースエラー";
$lang['changeSuccess'] = "変更が無事終了しました";
$lang['yes'] = "はい";
$lang['no'] = "いいえ";
$lang['javascriptEnabled'] = "Javaスクリプトを有効にして下さい！";
$lang['noPermission'] = "このページへのアクセス許可がありません！<br />最高管理者のみアクセスできます。;)";
$lang['modify'] = "修正";
$lang['remove'] = "除去";
$lang['help'] = "オンラインヘルプ";
$lang['sure'] = "確かですか？";

// Boxes

// includes/boxes/panel.php
$lang['posts'] = "コメント";
$lang['administrators'] = "管理者";
$lang['preferences'] = "諸設定";
$lang['logout'] = "ログアウト";
$lang['tools'] = "ツール";
$lang['phpinfo'] = "PHP 情報";
$lang['navigation'] = "ナビゲーション";
$lang['start'] = "スタート";
$lang['changePass'] = "パスワードを変更";
$lang['addAdmins'] = "管理者の追加／削除";
$lang['options'] = "オプション";
$lang['advancedOptions'] = "詳細オプション";
$lang['smilies'] = "顔文字";
$lang['censored'] = "検閲ワード";
$lang['database'] = "データベース";
$lang['backupRestore'] = "バックアップ／復元";
$lang['optimize'] = "最適化";
$lang['messages'] = "コメント";
$lang['search'] = "検索";
$lang['banIP'] = "アクセス禁止／解除 IP";
$lang['trash'] = "ごみ箱";
$lang['about'] = "情報";
$lang['uploadCenter'] = "アップロードセンター";
$lang['guestbook'] = "ゲストブック";

// includes/content/login.php
$lang['username'] = "名前";
$lang['password'] = "パスワード";
$lang['login'] = "ログイン";
$lang['errorLogin'] = "ログインエラー";
$lang['nomatch'] = "は合致しません";
$lang['LIP'] = "IP";
$lang['lUserAgent'] = "ユーザーエージェント";
$lang['doesntExist'] = "は存在しません";
$lang['wrongPassword'] = "間違ったパスワード";
$lang['javascriptNeeded'] = "ログインする為に、Javaスクリプトを有効にして下さい";
$lang['forgotPass'] = "パスワードを忘れた？";

// includes/content/changePass.php
$lang['normalAdmin'] = "一般管理者";
$lang['superAdmin'] = "最高管理者";
$lang['normalAdminText'] = "あなたの最高管理者に連絡し、パスワードをリセットしてもらいましょう";
$lang['superAdminText'] = "Angoraに新しいパスワードを発行させる為、ゲストブックに関連のあるメールアドレスを入力して下さい。";
$lang['emailChangePass'] = "メール";
$lang['getNewPass'] = "新しいパスワードを発行する";
$lang['isIncorrect'] = "は正しくありません";
$lang['forgotPassSubject'] = "あなたの新しいパスワード";
$lang['forgotPassText'] = "新しいパスワードが発行されましたので、これを変更して下さい。新しいパスワード ：";

// javascript password strength meter
$lang['passNotEntered'] = "パスワードが入力されていません";
$lang['weak'] = "弱い";
$lang['better'] = "やや弱い";
$lang['medium'] = "中位";
$lang['strong'] = "やや強い";
$lang['strongest'] = "強い";

// includes/content/start.php
$lang['gbVersion'] = "ゲストブック バージョン";
$lang['phpVersion'] = "PHP バージョン";
$lang['sqlVersion'] = "MySQL バージョン";
$lang['numPosts'] = "コメントの数";
$lang['loggedAs'] = "ログイン名";
$lang['latestNews'] = "最新ニュース";
$lang['infos'] = "インフォ";
$lang['downloadNewVersion'] = "ダウンロード";
$lang['changeLog'] = "チェンジログ";
$lang['newVersionAvailable'] = "新バージョン利用可能";
$lang['normalUpdate'] = "通常のアップデート";
$lang['securityUpdate'] = "セキュリティアップデート！";

// includes/content/about.php
$lang['author'] = "作者";
$lang['licence'] = "ライセンス";
$lang['website'] = "ウェッブサイト";

// includes/content/changePass.php
$lang['oldPassword'] = "古いパスワード";
$lang['newPassword'] = "新しいパスワード";
$lang['confirmNewPassword'] = "新しいパスワードを再入力";
$lang['wrongOldPass'] = "古いパスワードが正しくありません";
$lang['newPassMatch'] = "新しいパスワードが合致していません";

// includes/content/optimize.php
$lang['optimizationSuccess'] = "最適化終了";
$lang['optimizationNeeded'] = "テーブルに最適化が必要";
$lang['optimizationNotNeeded'] = "最適化の必要なし";

// includes/content/banIP.php
$lang['ipnumber'] = "IP ナンバー";
$lang['ban'] = "禁止";
$lang['unban'] = "解除";
$lang['ipBanned'] = "は既に禁止されています";

// includes/content/backup.php
$lang['backupDatabase'] = "データベースをバックアップ";
$lang['restoreDatabase'] = "データベースを復元";
$lang['sqlFile'] = "SQL ファイル";
$lang['restore'] = "復元";
$lang['permissionsError'] = "アップロードされたSQLファイルへの書き込み許可はありません。";
$lang['bLog'] = "バックアップログ";
$lang['bDate'] = "日付";
$lang['bOperation'] = "操作";
$lang['unkownOperation'] = "不明な操作";
$lang['bClear'] = "消去";

// includes/content/options.php
$lang['changeTitles'] = "タイトルの変更";
$lang['gbTitle'] = "ゲストブックタイトル";
$lang['headTitle'] = "ヘッドタイトル";

$lang['changeMetaTags'] = "METAタグの変更";
$lang['metaDescription'] = "METAタグ説明文";
$lang['metaKeywords'] = "METAタグキーワード";

$lang['changeMaxChar'] = "最大文字数の変更";
$lang['maxCharMsg'] = "コメント最大文字数";
$lang['maxCharField'] = "フィールド最大文字数";

$lang['changeSecurity'] = "セキュリティ対策の変更";
$lang['floodTime'] = "アンチフラッドタイム（秒）";
$lang['moderateMsg'] = "コメントを管理する？";
$lang['autoCensor'] = "コメントを自動検閲する？";
$lang['checkEmail'] = "メールを確認する？";
$lang['checkCaptcha'] = "キャプチャを使う？";
$lang['debug'] = "デバグモード？";
$lang['reCaptcha'] = "Use reCaptcha?";
$lang['reCaptchapubk'] = "reCaptcha public key";
$lang['reCaptchaprvk'] = "reCaptcha private key";

$lang['changeLanguages'] = "言語の変更";
$lang['guestbookLang'] = "ゲストブックの言語";
$lang['adminLang'] = "管理者の言語";

$lang['changeVisual'] = "見かけの変更";
$lang['guestbookTheme'] = "ゲストブックのテーマ";
$lang['mobileTheme'] = "携帯のテーマ";
$lang['numPostsPerPage'] = "コメント／ページの数";
$lang['pagesFormat'] = "ページフォーマット";
$lang['several'] = "いくつかのページ";
$lang['allinone'] = "１ページに全て";
$lang['dateFormat'] = "日付フォーマット";
$lang['timezone'] = "Timezone";

$lang['changeOffline'] = "オフラインオプションの変更";
$lang['offline'] = "ゲストブックをオフラインにする？";
$lang['offlineMessage'] = "オフラインメッセージ";

$lang['changeImage'] = "イメージフォーマットの変更";
$lang['resizeImg'] = "イメージサイズを変更？";
$lang['imgWidth'] = "幅";
$lang['imgHeight'] = "高さ";

// includes/content/admin.php
$lang['addAdmin'] = "管理者の追加";
$lang['modifyAdmins'] = "管理者の変更";
$lang['superAdminPassword'] = "最高管理者パスワード";
$lang['adminName'] = "新管理者名";
$lang['superPassError'] = "最高管理者パスワードが正しくありません";
$lang['superAdmin'] = "最高管理者";

// includes/content/upload.php
$lang['upload'] = "アップロード";
$lang['file'] = "ファイル";
$lang['uploadSmilies'] = "顔文字";
$lang['uploadThemes'] = "テーマ";
$lang['uploadLanguages'] = "言語";
$lang['uploadLocation'] = "ロケーションをアップロードする";
$lang['uploadError'] = "アップロードエラー";
$lang['cantDelete'] = "ファイルを削除できません";

// includes/content/smilies.php
$lang['addSmiley'] = "顔文字を追加する";
$lang['modifySmilies'] = "顔文字を変更する";
$lang['smileyName'] = "顔文字名";
$lang['smileyCode'] = "顔文字コード";
$lang['smileyPath'] = "顔文字画像URL";

// includes/content/censored.php
$lang['addCensored'] = "検閲語を追加する";
$lang['modifyCensored'] = "検閲語を変更する";
$lang['censoredOriginal'] = "元の単語";
$lang['censoredReplacement'] = "差し替え単語";

// includes/content/search.php
$lang['sPosts'] = "コメント";
$lang['sIP'] = "IP";
$lang['sUA'] = "ユーザーエージェント";
$lang['sCountries'] = "国別コード";
$lang['sTrash'] = "ゴミ箱のコメント";
$lang['searchType'] = "検索タイプ";
$lang['searchData'] = "検索データ";

// includes/content/posts.php
$lang['pIP'] = "IP";
$lang['pEmail'] = "Email";
$lang['noPostsToYourQuery'] = "検索条件に一致するコメントはありません。";
$lang['actions'] = "アクション";
$lang['globalActions'] = "グローバルアクション";
$lang['pModify'] = "修正";
$lang['pDelete'] = "削除";
$lang['pUnpublish'] = "非公開";
$lang['pPublish'] = "公開";
$lang['pReply'] = "返信";
$lang['pBanIP'] = "IPを禁止";
$lang['pUnbanIP'] = "IPを解禁";
$lang['pRestore'] = "復元";
$lang['emptyTrash'] = "ゴミ箱を空にする";
$lang['deleteUnpublishedPosts'] = "未公開コメント全てを削除"; 

// includes/boxes/pageLinks.php
$lang['previous'] = "<< 前";
$lang['next'] = "次 >>";
$lang['page'] = "ページ";

// includes/content/advOptions.php
$lang['changePaths'] = "パスの変更";
$lang['backupFolder'] = "バックアップ";
$lang['smiliesFolder'] = "顔文字";
$lang['langFolder'] = "言語";
$lang['themesFolder'] = "テーマ";
$lang['generatePaths'] = "パスを自動作成";

$lang['changeEmail'] = "メールの変更";
$lang['email'] = "Email";
$lang['receiveEmailNotification'] = "メール通知を受け取る？";

$lang['changeDatabase'] = "データベース情報";
$lang['dbHost'] = "データベースホスト";
$lang['dbDatabase'] = "データベース名";
$lang['dbUsername'] = "ユーザー名";
$lang['dbPassword'] = "パスワード";
$lang['dbPrefix'] = "テーブル　プレフィクス";

$lang['manualDbFileCreation'] = "新しいファイルに、下記情報をコピー＆ペーストし、次の名前にして下さい : data.php
<br />
そして、新しく作成したこのファイルと、あなたのゲストブックホストのdata.phpファイルを差し替えて下さい。";

?>