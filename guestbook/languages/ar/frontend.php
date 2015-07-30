<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

// General
$lang['charset'] = "UTF-8";
$lang['dir'] = "rtl";
$lang['lang'] = "ar";

// Boxes
$lang['sign'] = "وقّع الدفتر";
$lang['view'] = "شاهد التوقيعات";
$lang['search'] = "بحث";
$lang['statistics'] = "إحصائات";
$lang['next'] = "التالي >>";
$lang['previous'] = "<< السابق";
$lang['poweredBy'] = "مدعوم من قبل";
$lang['page'] = "صفحة";

// content/posts.php
$lang['noPostsToYourQuery'] = "لا يوجد أيّ توقيع يوافق متطلبات إستفسارك";

// content/sign.php
$lang['name'] = "الاسم";
$lang['message'] = "التوقيع";
$lang['country'] = "الدولة";
$lang['location'] = "المكان";
$lang['email'] = "البريد الالكتروني";
$lang['rating'] = "التقدير";
$lang['send'] = "إرسال";
$lang['isEmpty'] = "لا يستطيع أن يكون فارغًا!";
$lang['isBig'] = "كبير جدًا!";
$lang['emailInvalid'] = "ليس بريد إلكتروني صحيح!";
$lang['bannedIP'] = "ممنوع";
$lang['floodTime'] = "لقد وقّعت الدفتر مؤخرًا!";
$lang['errorSigndb'] = "خطأ في قاعدة البيانات خلال التوقيع";
$lang['redirect'] = "سيتم تحويلك إلى صفحة البداية";
$lang['okSign'] = "لقد وقّعت الدفتر!";
$lang['captcha'] = "captcha كود";
$lang['captchaError'] = "خاطئ captcha كود";
$lang['newMsgEmailSubject'] = "توقيع جديد في دفترك!";
$lang['newMsgEmail'] = "لقد تم توقيع دفتر الزوار.";
$lang['numberResults'] = "عدد النتائج : ";

// content/stats.php
$lang['total'] = "مجموع";
$lang['nbPosts'] = "عدد التوقيعات";
$lang['browser'] = "متصفح";
$lang['os'] = "نظام التشغيل";
$lang['when'] = "متى";
$lang['allTime'] = "كل الوقت";
$lang['lastMonth'] = "آخر شهر";

?>