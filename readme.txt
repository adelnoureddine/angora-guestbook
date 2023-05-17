============
== README ==
============


Angora Guestbook
Author : Adel Noureddine
Website : http://aguestbook.sourceforge.net and https://github.com/adelnoureddine/angora-guestbook
Version : 2.0
Copyright (c) Adel Noureddine 2005 - 2023
The Angora Guestbook logo is copyrighted to Adel Noureddine, 2009 - 2023



INSTALLATION REQUIREMENTS
--------------------------
-> PHP version >= 8.0
-> MySQL version >= 8.0 or MariaDB version >= 10.0


NEW INSTALLATION
-----------------

1. Upload all files from the angora/ folder to your server
2. Create a database (if you don't have one already)
3. Run the setup installer at /setup/
4. Follow the instructions on the screen and choose "New installation" when asked

UPDATE FROM ANGORA GUESTBOOK VERSION 1.6.1
-----------------------------------------

NOTE: Use the 1.6.1 to 2.0 update patch, not the full 2.0 package.

1. Backup your files and database
2. Upload all files from the angora/ folder to your server and replace the old ones
3. Run the setup installer at /setup/
4. Follow the instructions on the screen and choose "Update from version 1.6.1" when asked


UPDATE FROM ANGORA GUESTBOOK VERSION 1.6 OR OLDER
--------------------------------------------------

Update from older version is not supported directly.
Update first to version 1.6.1 then use the update patch 1.6.1 to 2.0.

NOTE
-----

For TinyMCE :
tiny_mce/plugins/emotions/editor_plugin.js, editor_plugin_src.js and /js/emotions.js, are modified versions of the original files.
Modification for editor_plugin_src.js is line 14, where emotions.htm is replaced with emotions.php
emotions.php is a new file, in replacement of emotions.htm
Version used : 3.5.12


CREDITS
-------

== Version 2.0 ==
Version 2.0 wouldn't be possible without the work of Benjamin Fontaine and Barbara Jimenez.
They modernized Angora Guestbook to work with PHP 8 and added many new features, as part of their master's student project.

== Classes ==
Angora uses several classes based on the work of others.
Full credits details are available on the top of each class file.

auc.class.php : Mark Davidson (http://design.fluxnetworks.co.uk)
mysql_dump.inc.php : Harish Chauhan
dUnzip2.inc.php : Alexandre Tedeschi
xtemplate.class.php : Barnabas Debreceni (2000-2001), Jeremy Coates (2002-2007), http://www.phpxtemplate.org

== Javascript ==
webtoolkit.sha256.js : Angel Marin, Paul Johnston, http://www.webtoolkit.info
TinyMCE : http://tinymce.moxiecode.com
Yamli : http://www.yamli.com
rbYamli (Yamli plugin for TinyMCE) : http://youknowriad.nomade-dz.com/rbyamli-plugin-yamli-pour-tinymce/

== Fonts ==
Angora Guestbook uses the Bitsream Vera font which is made by Bitstream, Inc.

== Languages ==
Angora Guestbook is translated in different languages, here are the credits for the translators.

English, French and Arabic : Adel Noureddine
Turkish : Nejdet Acar
German : Tim Eufinger
Finish : Matti Koskinen
Japanese : Izumi Sakai
Spanish : Ricardo Uceda
Russian : Mihail Savochkin (until version 1.2.1), Epos Software Foundation (since version 1.5)
Traditional Chinese : rexx

== Images ==
The flags images used during the installer are made by Alpak (http://alpak.deviantart.com) and are under the CC Attribution-Noncommercial-No Derivative Works 3.0 Unported licence
