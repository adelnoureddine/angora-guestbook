<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

// General
$lang['charset'] = "UTF-8";
$lang['dir'] = "ltr";
$lang['lang'] = "tr";

// Boxes
$lang['sign'] = "Ziyaretçi Defterine Yaz";
$lang['view'] = "Mesajlarý Göster";
$lang['search'] = "Arama";
$lang['statistics'] = "Ýstatistikler";
$lang['next'] = "Sonraki >>";
$lang['previous'] = "<< Önceki";
$lang['poweredBy'] = "Üretici";
$lang['page'] = "Sayfa";

// content/posts.php
$lang['noPostsToYourQuery'] = "Sorgunuza uyan hiçbir sonuç bulunamadý.";

// content/sign.php
$lang['name'] = "Adý - Soyadý";
$lang['message'] = "Mesajý";
$lang['country'] = "Ülkesi";
$lang['location'] = "Konumu";
$lang['email'] = "E-Posta Adresi";
$lang['rating'] = "Puaný";
$lang['send'] = "Gönder";
$lang['isEmpty'] = "boþ olamaz!";
$lang['isBig'] = "çok fazla uzun!";
$lang['emailInvalid'] = " geçerli bir e-posta adresi deðil!";
$lang['bannedIP'] = "engellenmiþ";
$lang['floodTime'] = "yakýn zamanda zaten mesaj yazmýþsýnýz!";
$lang['errorSigndb'] = "Veritabanýna kayýt hatasý";
$lang['redirect'] = "Ana sayfaya yönlendirileceksiniz";
$lang['okSign'] = "Mesajýnýz ziyaretçi defterimize kaydedildi!";
$lang['captcha'] = "Doðrulama Kodu";
$lang['captchaError'] = "Hatalý Doðrulama Kodu";
$lang['newMsgEmailSubject'] = "Ziyaretçi Defterinize Yeni Mesaj Yazýldý!";
$lang['newMsgEmail'] = "Birisi Ziyaretçi Defterinize Yeni Bir Mesaj Yazdý.";
$lang['numberResults'] = "Sonuç Sayýsý : ";

// content/stats.php
$lang['total'] = "Toplam";
$lang['nbPosts'] = "Mesaj Sayýsý";
$lang['browser'] = "İnternet Tarayıcı";
$lang['os'] = "OS";
$lang['when'] = "Ne zaman";
$lang['allTime'] = "Her Zaman";
$lang['lastMonth'] = "Geçen Ay";

?>