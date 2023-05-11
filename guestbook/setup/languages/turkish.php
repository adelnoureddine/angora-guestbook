<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

// General
$lang['charset'] = "UTF-8";
$lang['dir'] = "ltr";
$lang['lang'] = "tr";
$lang['title'] = "Angora Ziyaretçi Defteri Kurulum Sihirbazý";
$lang['ok'] = "TAMAM";
$lang['no'] = "HAYIR";
$lang['next'] = "Sonraki >>";
$lang['previous'] = "<< Önceki";
$lang['isEmpty'] = "boþ olamaz!";

// includes/content/lang.php
$lang['language'] = "Dil/Lisan";

// includes/content/check.php
$lang['requiredSettings'] = "Gerekli Ayarlar";
$lang['phpVersion'] = "PHP Versiyonu >= 5.2.0";
$lang['mysqlSupport'] = "MySQL Desteði";
$lang['mysqlVersion'] = "MySQL Versiyonu >= 4.1.0";
$lang['recommendedSettings'] = "Önerilen Ayarlar";
$lang['gdLibrary'] = "GD Resim Modülü";
$lang['zlibSupport'] = "ZLib Desteði";

// includes/content/licence.php
$lang['angLicence'] = "Angora Ziyaretçi Defteri Lisansý";

// includes/content/method.php
$lang['instMethod'] = "Kurulum Þekli";
$lang['updateFrom'] = "ANG 0.7.x Versiyondan Güncelleme";
$lang['updateFrom2'] = "1.6.1 Versiyonlardan Yükseltme Yap";
$lang['newInstallation'] = "Yeni Kurulum";

//includes/content/update.php
$lang['convertTables'] = "Tablolar Çeviriliyor";
$lang['convertionDone'] = "Çevirme Tamamlandý";
$lang['convertionFailed'] = "Çeviri Hatasý";
$lang['cleaningUp'] = "Temizleniyor";
$lang['dropOldTables'] = "Eski Tablolarý Kaldýr";
$lang['renameNewTables'] = "Yeni Tablolarý Adlandýr";

// includes/content/install.php
$lang['mysqlConfiguration'] = "MySQL Ayarlarý";
$lang['host'] = "Sunucu";
$lang['username'] = "MySQL Kullanýcý Adý";
$lang['password'] = "MySQL Parolasý";
$lang['database'] = "MySQL Veritabaný Adý";
$lang['prefix'] = "MySQL Tablo Öneki";

// includes/content/config.php
$lang['mysqlInstallation'] = "MySQL Kurulumu";
$lang['dataError'] = "Veritabaný Hatasý!";
$lang['installationDone'] = "Tebrikler, Kurulum Tamamlandý";
$lang['guestbookConfiguration'] = "Ziyaretçi Defteri Ayarlarý";
$lang['adminName'] = "Süper Yönetici Adý";
$lang['adminPass'] = "Parola";
$lang['adminPassConf'] = "Parola Doðrulama";
$lang['adminEmail'] = "E-Posta Adresi";
$lang['fileCreation'] = "Dosya Oluþturma";

// includes/content/finish.php
$lang['finishInstallation'] = "Kurulum Tamamlandý";
$lang['areDifferent'] = "farklý!";
$lang['adminConfigurationDone'] = "Yönetici Ayarlarý Tamamlandý";
$lang['generalConfigurationDone'] = "Genel Ayarlar Tamamlandý";
$lang['manualDbFileCreation'] = "Aþaðýdaki bilgileri kopyalayýp yeni bir dosyaya yapýþtýrýp, (Not Defteri programý ile olabilir) adýný data.php olarak kaydedin.
<br />
Ziyaretçi Defterinizin ana klasörüne yükleyin.";

$lang['deleteSetup'] = "Kurulum klasörünü SÝLMEYÝ UNUTMAYINIZ!";
$lang['yesYouCan'] = "Gidebilirsin";
$lang['adminCenter'] = "Yönetim Paneli";
$lang['newGuestbook'] = "Ziyaretçi Defteriniz";
$lang['finishing'] = "Tamamlanýyor";

// javascript password strength meter
$lang['passNotEntered'] = "Parola girilmedi";
$lang['weak'] = "Zayýf";
$lang['better'] = "Daha Ýyi";
$lang['medium'] = "Orta";
$lang['strong'] = "Güçlü";
$lang['strongest'] = "Çok Güçlü";

?>
