<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

// General
$lang['charset'] = "UTF-8";
$lang['dir'] = "rtl";
$lang['lang'] = "ar";
$lang['isEmpty'] = "لا يمكن أن يكون فارغًا!";
$lang['change'] = "تعديل";
$lang['add'] = "إضافة";
$lang['dataError'] = "خطأ في قاعدة البيانات";
$lang['changeSuccess'] = "تم التعديل بنجاح";
$lang['yes'] = "نعم";
$lang['no'] = "لا";
$lang['javascriptEnabled'] = "JavaScript يحب تفعيل!";
$lang['noPermission'] = "لا تملك صلاحية مشاهدة هذه الصفحة!<br />فقط المدير الاعلى يستطيع ;)";
$lang['modify'] = "تعديل";
$lang['remove'] = "حذف";
$lang['help'] = "مساعدة على الانترنت";
$lang['sure'] = "هل أنت متأكد؟";

// Boxes

// includes/boxes/panel.php
$lang['posts'] = "التوقيعات";
$lang['administrators'] = "المدراء";
$lang['preferences'] = "خصائص";
$lang['logout'] = "تسجيل خروج";
$lang['tools'] = "أدوات";
$lang['phpinfo'] = "phpinfo";
$lang['navigation'] = "تصفّح";
$lang['start'] = "إبدأ";
$lang['changePass'] = "تعديل كلمة السرّ";
$lang['addAdmins'] = "إضافة/حذف المدراء";
$lang['options'] = "خيارات";
$lang['advancedOptions'] = "خيارات متقدمة";
$lang['smilies'] = "إبتسامات";
$lang['censored'] = "رقابة الكلمات";
$lang['database'] = "قاعدة البيانات";
$lang['backupRestore'] = "حفظ/إستعادة";
$lang['optimize'] = "تحسين";
$lang['messages'] = "رسائل";
$lang['search'] = "بحث";
$lang['banIP'] = "حظر/رفع الحظر عن IP";
$lang['trash'] = "سلّة المهملات";
$lang['about'] = "عن";
$lang['uploadCenter'] = "مركز التحميل";
$lang['guestbook'] = "دفتر الزوار";

// includes/content/login.php
$lang['username'] = "الاسم";
$lang['password'] = "كلمة السرّ";
$lang['login'] = "دخول";
$lang['errorLogin'] = "خطأ في عملية تسجيل الدخول";
$lang['nomatch'] = "لا يتوافقان";
$lang['LIP'] = "IP";
$lang['lUserAgent'] = "UserAgent";
$lang['doesntExist'] = "غير موجود";
$lang['wrongPassword'] = "كلمة السرّ خاطئة";
$lang['javascriptNeeded'] = "تحتاج إلى تفعيل javscript لتسجيل الدخول";
$lang['forgotPass'] = "نسيت كلمة السرّ؟";

// includes/content/changePass.php
$lang['normalAdmin'] = "مدير";
$lang['superAdmin'] = "المدير الاعلى";
$lang['normalAdminText'] = "إتصل بالمدير الاعلى للحصول على كلمة سرّ جديدة";
$lang['superAdminText'] = "إكتب البريد الالكتروني المتصّل بدفتر الزوار لكي تقوم Angora بتوليد كلمة سرّ جديدة لك";
$lang['emailChangePass'] = "البريد الالكتروني";
$lang['getNewPass'] = "توليد كلمة سرّ جديدة";
$lang['isIncorrect'] = "خاطئ";
$lang['forgotPassSubject'] = "كلمة السرّ الجديدة";
$lang['forgotPassText'] = "لقد تم توليد كلمة سرّ جديدة. تذكر أن تعدّلها في أسرع وقت. كلمة السرّ الجديدة هي : ";

// javascript password strength meter
$lang['passNotEntered'] = "لم يتم إدخال أيّة كلمة سرّ";
$lang['weak'] = "ضعيف";
$lang['better'] = "أفضل";
$lang['medium'] = "متوسط";
$lang['strong'] = "قوي";
$lang['strongest'] = "قوي جدّا";

// includes/content/start.php
$lang['gbVersion'] = "نسخة دفتر الزوار";
$lang['phpVersion'] = "PHP نسخة";
$lang['sqlVersion'] = "MySQL نسخة";
$lang['numPosts'] = "عدد التواقيع";
$lang['loggedAs'] = "متصل كـ";
$lang['latestNews'] = "آخر الاخبار";
$lang['infos'] = "معلومات";
$lang['downloadNewVersion'] = "تحميل";
$lang['changeLog'] = "المتغيرات";
$lang['newVersionAvailable'] = "هناك نسخة جديدة متوفرة";
$lang['normalUpdate'] = "تحديث عادي";
$lang['securityUpdate'] = "تحديث حماية!";

// includes/content/about.php
$lang['author'] = "المؤلف";
$lang['licence'] = "إتفاقية الاستخدام";
$lang['website'] = "الموقع";

// includes/content/changePass.php
$lang['oldPassword'] = "كلمة السرّ القديمة";
$lang['newPassword'] = "كلمة السرّ الجديدة";
$lang['confirmNewPassword'] = "تأكيد كلمة السرّ الجديدة";
$lang['wrongOldPass'] = "كلمة السرّ القديمة خاطئة";
$lang['newPassMatch'] = "كلمتي السرّ الجديدتين لا تتوافقان";

// includes/content/optimize.php
$lang['optimizationSuccess'] = "تم التحسين";
$lang['optimizationNeeded'] = "الجداول تحتاج إلى تحسين";
$lang['optimizationNotNeeded'] = "لا حاجة للتحسين";

// includes/content/banIP.php
$lang['ipnumber'] = "IP رقم";
$lang['ban'] = "حظر";
$lang['unban'] = "رفع الحظر";
$lang['ipBanned'] = "محظور مسبقًا";

// includes/content/backup.php
$lang['backupDatabase'] = "حفظ قاعدة البيانات";
$lang['restoreDatabase'] = "إستعادة قاعدة البيانات";
$lang['sqlFile'] = "SQL ملف";
$lang['restore'] = "إستعادة";
$lang['permissionsError'] = "لا صلاحية لكتابة ملف SQL";
$lang['bLog'] = "تأريخ التغيرات";
$lang['bDate'] = "التاريخ";
$lang['bOperation'] = "العملية";
$lang['unkownOperation'] = "عملية مجهولة";
$lang['bClear'] = "تنظيف";

// includes/content/options.php
$lang['changeTitles'] = "تعديل العناوين";
$lang['gbTitle'] = "عنوان دفتر الزوار";
$lang['headTitle'] = "عنوان رأس الصفحة";

$lang['changeMetaTags'] = "تعديل meta-tags";
$lang['metaDescription'] = "تفاصيل meta-tags";
$lang['metaKeywords'] = "كلمات meta-tags";

$lang['changeMaxChar'] = "الحدّ الاقصى للأحرف";
$lang['maxCharMsg'] = "الحدّ الاقصى في التوقيع";
$lang['maxCharField'] = "الحدّ الاقصى في الميادين";

$lang['changeSecurity'] = "تعديل تدابير الحماية";
$lang['floodTime'] = "Anti-flood time (in sec.)";
$lang['moderateMsg'] = "مراقبة التواقيع؟";
$lang['autoCensor'] = "رقابة تلقائية للتواقيع؟";
$lang['checkEmail'] = "التأكّد من البريد الالكتروني؟";
$lang['checkCaptcha'] = "إستخدام CAPTCHA?";
$lang['debug'] = "Debug mode?";
$lang['reCaptcha'] = "إستخدام reCaptcha?";
$lang['reCaptchapubk'] = "مفتاح reCaptcha العام";
$lang['reCaptchaprvk'] = "مفتاح reCaptcha الخاص";

$lang['changeLanguages'] = "تعديل اللغات";
$lang['guestbookLang'] = "لغة دفتر الزوار";
$lang['adminLang'] = "لغة مركز المدراء";

$lang['changeVisual'] = "تعديل التأثيرات البصرية";
$lang['guestbookTheme'] = "نمط دفتر الزوار";
$lang['mobileTheme'] = "النمط الخاص للهواتف النقالة";
$lang['numPostsPerPage'] = "عدد التوقيعات في كل صفحة";
$lang['pagesFormat'] = "بنية الصفحات";
$lang['dateSort'] = "Sort by date";
$lang['ascending'] = "Ascending";
$lang['descending'] = "Descending";
$lang['several'] = "عدّة صفحات";
$lang['allinone'] = "كلّ التوقيعات في صفحة واحدة";
$lang['dateFormat'] = "بنية التاريخ";
$lang['timezone'] = "منطقة زمنية";

$lang['changeOffline'] = "تعديل خيارات الاتصال";
$lang['offline'] = "دفتر الزوار خارج الخطّ؟";
$lang['offlineMessage'] = "رسالة خارج الخط";

$lang['changeImage'] = "تعديل نمط الصور";
$lang['resizeImg'] = "تعديل حجم الصور؟";
$lang['imgWidth'] = "عرض";
$lang['imgHeight'] = "إرتفاع";

// includes/content/admin.php
$lang['addAdmin'] = "إضافة مدير";
$lang['modifyAdmins'] = "تعديل المدراء";
$lang['superAdminPassword'] = "كلمة سر المدير الاعلى";
$lang['adminName'] = "إسم المدير الجديد";
$lang['superPassError'] = "كلمة سر المدير الاعلى خاطئة";
$lang['superAdmin'] = "المدير الاعلى";

// includes/content/upload.php
$lang['upload'] = "رفع";
$lang['file'] = "ملف";
$lang['uploadSmilies'] = "إبتسامات";
$lang['uploadThemes'] = "أنماط";
$lang['uploadLanguages'] = "لغات";
$lang['uploadLocation'] = "مكان الرفع";
$lang['uploadError'] = "خطأ في الرفع";
$lang['cantDelete'] = "لا أستطيع حذف الملف";

// includes/content/smilies.php
$lang['addSmiley'] = "إضافة إبتسامة";
$lang['modifySmilies'] = "تعديل الابتسامات";
$lang['smileyName'] = "إسم الابتسامة";
$lang['smileyCode'] = "كود الابتسامة";
$lang['smileyPath'] = "رابط صورة الابتسامة";

// includes/content/censored.php
$lang['addCensored'] = "إضافة كلمة للمراقبة";
$lang['modifyCensored'] = "تعديل كلمات الرقابة";
$lang['censoredOriginal'] = "الكلمة الاصلية";
$lang['censoredReplacement'] = "كلمة الاستبدال";

// includes/content/search.php
$lang['sPosts'] = "تواقيع";
$lang['sIP'] = "IP";
$lang['sUA'] = "User Agent";
$lang['sCountries'] = "كود البلدان";
$lang['sTrash'] = "سلة المهملات";
$lang['searchType'] = "نوع البحث";
$lang['searchData'] = "بيانات البحث";

// includes/content/posts.php
$lang['pIP'] = "IP";
$lang['pEmail'] = "البريد الالكتروني";
$lang['noPostsToYourQuery'] = "لا يوجد أيّ توقيع يوافق متطلبات إستفسارك";
$lang['actions'] = "الاجراءات";
$lang['globalActions'] = "الاجراءات العامة";
$lang['pModify'] = "تعديل";
$lang['pDelete'] = "حذف";
$lang['pUnpublish'] = "إلغاء النشر";
$lang['pPublish'] = "نشر";
$lang['pReply'] = "ردّ";
$lang['pBanIP'] = "حظر IP";
$lang['pUnbanIP'] = "رفع حظر IP";
$lang['pRestore'] = "إستعادة";
$lang['emptyTrash'] = "إفراغ سلة المهملات";
$lang['deleteUnpublishedPosts'] = "حذف جميع التواقيع الغير منشورة";

// includes/boxes/pageLinks.php
$lang['previous'] = "<< السابق";
$lang['next'] = "التالي >>";
$lang['page'] = "صفحة";

// includes/content/advOptions.php
$lang['changePaths'] = "تعديل المسارات";
$lang['backupFolder'] = "حفظ";
$lang['smiliesFolder'] = "إبتسامات";
$lang['langFolder'] = "لغات";
$lang['themesFolder'] = "أنماط";
$lang['generatePaths'] = "توليد تلقائي للمسارات";

$lang['changeEmail'] = "تعديل البريد الالكتروني";
$lang['email'] = "البريد الالكتروني";
$lang['receiveEmailNotification'] = "إستقبل إشعارات بالبريد الالكتروني؟";

$lang['changeDatabase'] = "معلومات عن قاعدة البيانات";
$lang['dbHost'] = "المزود";
$lang['dbDatabase'] = "إسم قاعدة البيانات";
$lang['dbUsername'] = "إسم المستخدم";
$lang['dbPassword'] = "كلمة السرّ";
$lang['dbPrefix'] = "بادئ الجداول";

$lang['manualDbFileCreation'] = "إنسخ ثم ألصق المعلومات أدناه إلى ملف جديد و سمّه : data.php
<br />
ثم ضعه في جذر مجلد دفتر الزوار.";

?>
