<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

// General
$lang['charset'] = "UTF-8";
$lang['dir'] = "rtl";
$lang['lang'] = "ar";
$lang['title'] = "Angora Guestbook Web Installer";
$lang['ok'] = "تمام";
$lang['no'] = "لا";
$lang['next'] = "التالي>>";
$lang['previous'] = "<< السابق";
$lang['isEmpty'] = "لا يمكن أن يكون فارغًا!";

// includes/content/lang.php
$lang['language'] = "لغة";

// includes/content/check.php
$lang['requiredSettings'] = "إعدادات إجبارية";
$lang['phpVersion'] = "PHP version >= 5.2.0";
$lang['mysqlSupport'] = "MySQL دعم";
$lang['mysqlVersion'] = "MySQL version >= 4.1.0";
$lang['recommendedSettings'] = "إعدادات مفضّلة";
$lang['gdLibrary'] = "GD Image Library";
$lang['zlibSupport'] = "zlib دعم";

// includes/content/licence.php
$lang['angLicence'] = "Angora إتفاقية إستخدام دفتر الزوار";

// includes/content/method.php
$lang['instMethod'] = "طريقة التنصيب";
$lang['updateFrom'] = "تحديث من AN Guestbook 0.7.x";
$lang['updateFrom2'] = "تحديث من إصدارات 1.x";
$lang['newInstallation'] = "نسخة جديدة";

//includes/content/update.php
$lang['convertTables'] = "تحويل الجداول";
$lang['convertionDone'] = "تم التحويل بنجاح";
$lang['convertionFailed'] = "فشل التحويل";
$lang['cleaningUp'] = "تنظيف";
$lang['dropOldTables'] = "حذف الجداول القديمة";
$lang['renameNewTables'] = "إعادة تسمية الجداول الجديدة";

// includes/content/install.php
$lang['mysqlConfiguration'] = "MySQL خصائص";
$lang['host'] = "المزود";
$lang['username'] = "MySQL إسم";
$lang['password'] = "MySQL كلمة السرّ";
$lang['database'] = "MySQL إسم قاعدة البيانات";
$lang['prefix'] = "MySQL بادئ الجداول";

// includes/content/config.php
$lang['mysqlInstallation'] = "MySQL تنصيب";
$lang['dataError'] = "خطأ في قاعدة البيانات!";
$lang['installationDone'] = "تم التنصيب بنجاح";
$lang['guestbookConfiguration'] = "خصائص دفتر الزوار";
$lang['adminName'] = "إسم المدير الأعلى";
$lang['adminPass'] = "كلمة السرّ";
$lang['adminPassConf'] = "تأكيد كلمة السرّ";
$lang['adminEmail'] = "البريد الالكتروني";
$lang['fileCreation'] = "إنشاء الملف";

// includes/content/finish.php
$lang['finishInstallation'] = "إنهاء التنصيب";
$lang['areDifferent'] = "مختلفان!";
$lang['adminConfigurationDone'] = "خضائص المدير تمّت بنجاح";
$lang['generalConfigurationDone'] = "الخصائص العامة تمّت بنجاح";
$lang['manualDbFileCreation'] = "إنسخ ثم ألصق المعلومات أدناه إلى ملف جديد و سمّه : data.php
<br />
ثم ضعه في جذر مجلد دفتر الزوار.";

$lang['deleteSetup'] = "تذكّر أن تحذف مجلد التنصيب!";
$lang['yesYouCan'] = "تستطيع أن تذهب إلى";
$lang['adminCenter'] = "مركز المدير";
$lang['newGuestbook'] = "دفتر الزوار الجديد";
$lang['finishing'] = "إنهاء";

// javascript password strength meter
$lang['passNotEntered'] = "لم يتم إدخال أيّة كلمة سرّ";
$lang['weak'] = "ضعيف";
$lang['better'] = "أفضل";
$lang['medium'] = "متوسط";
$lang['strong'] = "قوي";
$lang['strongest'] = "قوي جدّا";

?>