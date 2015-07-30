<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

// General
$lang['charset'] = "UTF-8";
$lang['dir'] = "ltr";
$lang['lang'] = "tr";
$lang['isEmpty'] = "Boþ Olamaz!";
$lang['change'] = "Deðiþtir";
$lang['add'] = "Ekle";
$lang['dataError'] = "Veritabaný Hatasý";
$lang['changeSuccess'] = "Deðiþiklikler baþarýyla tamamlandý";
$lang['yes'] = "Evet";
$lang['no'] = "Hayýr";
$lang['javascriptEnabled'] = "JavaScript açýk olmalýdýr !";
$lang['noPermission'] = "Bu sayfaya eriþime yetkili deðilsiniz ! <br />Sadece Super Adminler eriþebilir ;)";
$lang['modify'] = "Düzenle";
$lang['remove'] = "Sil";
$lang['help'] = "Online Yardým";
$lang['sure'] = "Emin misiniz?";

// Boxes

// includes/boxes/panel.php
$lang['posts'] = "Mesajlar";
$lang['administrators'] = "Yöneticiler";
$lang['preferences'] = "Tercihler";
$lang['logout'] = "Çýkýþ Yap";
$lang['tools'] = "Araçlar";
$lang['phpinfo'] = "phpinfo";
$lang['navigation'] = "Navigation";
$lang['start'] = "Baþlat";
$lang['changePass'] = "Parola Deðiþtir";
$lang['addAdmins'] = "Yönetici Ekle/Sil";
$lang['options'] = "Seçenekler";
$lang['advancedOptions'] = "Geliþmiþ Seçenekler";
$lang['smilies'] = "Smilies";
$lang['censored'] = "Kelime Sansürü";
$lang['database'] = "Veritabaný";
$lang['backupRestore'] = "Yedekle/Geir Yükle";
$lang['optimize'] = "Ýyileþtir";
$lang['messages'] = "Mesajlar";
$lang['search'] = "Arama";
$lang['banIP'] = "IP Engelle/Çöz";
$lang['trash'] = "Çöp Kutusu";
$lang['about'] = "Hakkýnda";
$lang['uploadCenter'] = "Yükleme Merkezi";
$lang['guestbook'] = "Ziyaretçi Defteri";

// includes/content/login.php
$lang['username'] = "Adý - Soyadý";
$lang['password'] = "Parola";
$lang['login'] = "Giriþ";
$lang['errorLogin'] = "Giriþ Hatasý";
$lang['nomatch'] = "eþleþmiyor";
$lang['LIP'] = "IP";
$lang['lUserAgent'] = "UserAgent";
$lang['doesntExist'] = "bulunamadý";
$lang['wrongPassword'] = "Hatalý Parola";
$lang['javascriptNeeded'] = "Giriþte ekranýnda JavaScript özelliði açýk olmalýdýr";
$lang['forgotPass'] = "Parolamý Unuttum?";

// includes/content/changePass.php
$lang['normalAdmin'] = "Normal Yönetici";
$lang['superAdmin'] = "Super Yönetici";
$lang['normalAdminText'] = "Parolanýzý sýfýrlamak için lütfen Süper Yönetici ile irtibat kurunuz.";
$lang['superAdminText'] = "Sizin için yeni bir parola oluþturmasýný istediðiniz yöneticinizin e-posta adresini giriniz.";
$lang['emailChangePass'] = "E-Posta";
$lang['getNewPass'] = "Yeni bir parola oluþtur";
$lang['isIncorrect'] = "doðru deðil";
$lang['forgotPassSubject'] = "Yeni Parolanýz";
$lang['forgotPassText'] = "Yeni parolanýz oluþturuldu. Lütfen yeni parolaýzý unutmayacaðýnýz þekilde not alýn. Yeni Parolanýz : ";

// javascript password strength meter
$lang['passNotEntered'] = "Parola girilmedi";
$lang['weak'] = "Zayýf";
$lang['better'] = "Daha Ýyi";
$lang['medium'] = "Orta";
$lang['strong'] = "Güçlü";
$lang['strongest'] = "Çok Güçlü";

// includes/content/start.php
$lang['gbVersion'] = "Ziyaretçi Defteri Versiyonu";
$lang['phpVersion'] = "PHP Versiyonu";
$lang['sqlVersion'] = "MySQL Versiyonu";
$lang['numPosts'] = "Mesaj Sayýsý";
$lang['loggedAs'] = "Giriþ Yapan";
$lang['latestNews'] = "Son Haberler";
$lang['infos'] = "Bilgiler";
$lang['downloadNewVersion'] = "innDir";
$lang['changeLog'] = "Versiyon Değişiklikleri";
$lang['newVersionAvailable'] = "Yeni Versiyon Mevcut";
$lang['normalUpdate'] = "Normal Güncelleme";
$lang['securityUpdate'] = "Güvenlik Güncellemesi!";

// includes/content/about.php
$lang['author'] = "Yazan";
$lang['licence'] = "Lisans";
$lang['website'] = "Web Sitesi";

// includes/content/changePass.php
$lang['oldPassword'] = "Eski Parola";
$lang['newPassword'] = "Yeni Parola";
$lang['confirmNewPassword'] = "Yeni Parola Doðrulama";
$lang['wrongOldPass'] = "Hatalý Eski Parola";
$lang['newPassMatch'] = "Yeni Parolalar Eþleþmiyor";

// includes/content/optimize.php
$lang['optimizationSuccess'] = "Ýyileþtirme tamamlandý";
$lang['optimizationNeeded'] = "Tablolarda Ýyileþtirme Gerekiyor";
$lang['optimizationNotNeeded'] = "Tablolarda Ýyileþtirmeye Gerek Yok";

// includes/content/banIP.php
$lang['ipnumber'] = "IP Numarasý";
$lang['ban'] = "Engelle";
$lang['unban'] = "Çöz";
$lang['ipBanned'] = "zaten yasaklı";

// includes/content/backup.php
$lang['backupDatabase'] = "Veritabanýný Yedekle";
$lang['restoreDatabase'] = "Veritabanýný Geri Yükle";
$lang['sqlFile'] = "SQL Dosyasý";
$lang['restore'] = "Geri Yükle";
$lang['permissionsError'] = "Yüklenen SQL dosyada yazma izniniz yok";
$lang['bLog'] = "Yedekleme Kayýtlarý";
$lang['bDate'] = "Tarih";
$lang['bOperation'] = "Ýþlem";
$lang['unkownOperation'] = "Bilinmeyen Eylem";
$lang['bClear'] = "Temizle";

// includes/content/options.php
$lang['changeTitles'] = "Baþlýðý Deðiþtir";
$lang['gbTitle'] = "Ziyaretçi Defteri Baþlýðý";
$lang['headTitle'] = "Üst Baþlýk";

$lang['changeMetaTags'] = "Meta-Taglarý Deðiþtir";
$lang['metaDescription'] = "Meta-Tag Tanýmlamalarý";
$lang['metaKeywords'] = "Meta-Tag Kelimeleri";

$lang['changeMaxChar'] = "Azami karakterleri deðiþtir";
$lang['maxCharMsg'] = "Mesajlardaki Azami Karakter Sayýsý";
$lang['maxCharField'] = "Alanlarda Azami Karakter Sayýsý";

$lang['changeSecurity'] = "Güvenlik Seviyesini Deðiþtir";
$lang['floodTime'] = "Anti-Flood Süresi (dak.)";
$lang['moderateMsg'] = "Mesajlarda Yayýn Öncesi Kontrol?";
$lang['autoCensor'] = "Mesajlarda Otomatik Sansür?";
$lang['checkEmail'] = "E-Posta Kontrolü?";
$lang['checkCaptcha'] = "CAPTCHA Kullanýlsýn mý?";
$lang['debug'] = "Debug mode?";
$lang['reCaptcha'] = "reCaptcha Kullanılsın mı?";
$lang['reCaptchapubk'] = "reCaptcha anahtarı";
$lang['reCaptchaprvk'] = "reCaptcha özel anahtarı";

$lang['changeLanguages'] = "Dil Deðiþtir";
$lang['guestbookLang'] = "Ziyaretçi Defteri Dili";
$lang['adminLang'] = "Yönetim Paneli Dili";

$lang['changeVisual'] = "Görsel Efektleri Deðiþtir";
$lang['guestbookTheme'] = "Ziyaretçi Defteri Temasý";
$lang['mobileTheme'] = "Mobil Tema";
$lang['numPostsPerPage'] = "Mesaj/Sayfa Numaralarý";
$lang['pagesFormat'] = "Sayfa Formatý";
$lang['several'] = "Ayrý Sayfalar";
$lang['allinone'] = "Tek Sayfa";
$lang['dateFormat'] = "Tarif Formatý";
$lang['timezone'] = "Zaman Dilimi";

$lang['changeOffline'] = "ZD Kapatma Seçeneklerini Deðiþtir";
$lang['offline'] = "Ziyaretçi Defteri Kapatýlsýn mý?";
$lang['offlineMessage'] = "Kapatma Mesajý";

$lang['changeImage'] = "Resim Formatýný Deðiþtir";
$lang['resizeImg'] = "Resimler Boyutlandýrýlsýn mý?";
$lang['imgWidth'] = "Geniþlik";
$lang['imgHeight'] = "Yükseklik";

// includes/content/admin.php
$lang['addAdmin'] = "Yönetici Ekle";
$lang['modifyAdmins'] = "Yönetici Düzenle";
$lang['superAdminPassword'] = "Süper Yönetici Parolasý";
$lang['adminName'] = "Yeni Yönetici Adý";
$lang['superPassError'] = "Süper Yönetici Parolasý Hatalý";
$lang['superAdmin'] = "Süper Yönetici";

// includes/content/upload.php
$lang['upload'] = "Yükle";
$lang['file'] = "Dosya";
$lang['uploadSmilies'] = "Smilies";
$lang['uploadThemes'] = "Tema";
$lang['uploadLanguages'] = "Dil";
$lang['uploadLocation'] = "Yükleme Konumu";
$lang['uploadError'] = "Yükleme Hatasý";
$lang['cantDelete'] = "Dosya silinemez";

// includes/content/smilies.php
$lang['addSmiley'] = "Smiley Ekle";
$lang['modifySmilies'] = "Smilies Düzenle";
$lang['smileyName'] = "Smiley Adý";
$lang['smileyCode'] = "Smiley Kodu";
$lang['smileyPath'] = "Smiley Resim URL";

// includes/content/censored.php
$lang['addCensored'] = "Bir kelime sansürü ekle";
$lang['modifyCensored'] = "Sansürlenmiþ Kelimeleri Düzenle";
$lang['censoredOriginal'] = "Orijinal Kelima";
$lang['censoredReplacement'] = "Deðiþtirilecek Kelime";

// includes/content/search.php
$lang['sPosts'] = "Mesajlar";
$lang['sIP'] = "IP";
$lang['sUA'] = "Kullanýcý Bilgileri";
$lang['sCountries'] = "Ülke Kodu";
$lang['sTrash'] = "Çöpteki Mesajlar";
$lang['searchType'] = "Arama Türü";
$lang['searchData'] = "Aranan Veri";

// includes/content/posts.php
$lang['pIP'] = "IP";
$lang['pEmail'] = "E-Posta";
$lang['noPostsToYourQuery'] = "Sorgunuza uyan hiçbir mesaj bulunamadý.";
$lang['actions'] = "Eylemler";
$lang['globalActions'] = "Genel İşlemler";
$lang['pModify'] = "Düzenle";
$lang['pDelete'] = "Sil";
$lang['pUnpublish'] = "Yayýnlama";
$lang['pPublish'] = "Yayýnla";
$lang['pReply'] = "Cevapla";
$lang['pBanIP'] = "IP Engelle";
$lang['pUnbanIP'] = "IP Çöz";
$lang['pRestore'] = "Geri Yükle";
$lang['emptyTrash'] = "Çöpü Boþalt";
$lang['deleteUnpublishedPosts'] = "Yayımlanmamış Tüm Mesajları Sil";

// includes/boxes/pageLinks.php
$lang['previous'] = "<< Önceki";
$lang['next'] = "Sonraki >>";
$lang['page'] = "Sayfa";

// includes/content/advOptions.php
$lang['changePaths'] = "Yollarý Deðiþtir";
$lang['backupFolder'] = "Yedekleme";
$lang['smiliesFolder'] = "Smilies";
$lang['langFolder'] = "Diller";
$lang['themesFolder'] = "Temalar";
$lang['generatePaths'] = "Yollarý Otomatik Oluþtur";

$lang['changeEmail'] = "E-Posta Deðiþtir";
$lang['email'] = "E-Posta";
$lang['receiveEmailNotification'] = "E-Posta Bilgilendirilmesi Yapýlsýn mý?";

$lang['changeDatabase'] = "Veritabaný Bilgileri";
$lang['dbHost'] = "Veritabaný Sunucusu";
$lang['dbDatabase'] = "Veritabaný Adý";
$lang['dbUsername'] = "Kullanýcý Adý";
$lang['dbPassword'] = "Parola";
$lang['dbPrefix'] = "Tablo Öneki";

$lang['manualDbFileCreation'] = "Aþaðýdaki bilgileri kopyalayýp yeni bir dosyaya yapýþtýrýp, (Not Defteri programý ile olabilir) adýný data.php olarak kaydedin.
<br />
Sunucunuzdaki orijinal data.php dosyasý ile yeni oluþturduðunuzu deðiþtirin, yani üzerine yenisini yükleyin.";

?>