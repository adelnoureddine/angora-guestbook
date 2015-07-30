============
== README ==
============


Angora Guestbook
Author : Adel Noureddine
Website : http://aguestbook.sourceforge.net
Version : 1.6.1
Copyright (c) Adel Noureddine 2005 - 2011
The Angora Guestbook logo is copyrighted to Adel Noureddine, 2009 - 2011



INSTALLATION REQUIREMENTS
--------------------------
-> PHP version >= 5.2.0
-> MySQL version >= 4.1.0


NEW INSTALLATION
-----------------

1. Upload all files from the angora/ folder to your server
2. Create a database (if you don't have one already)
3. Run the setup installer at /setup/
4. Follow the instructions on the screen and choose "New installation" when asked

UPDATE FROM ANGORA GUESTBOOK VERSION 1.6
-----------------------------------------

NOTE: Use the 1.6 to 1.6.1 update patch, not the full 1.6.1 package.

1. Backup your files and database
2. Upload all files from the angora/ folder to your server and replace the old ones
3. You're done!


UPDATE FROM ANGORA GUESTBOOK VERSION 1.5
-----------------------------------------

NOTE: Use the 1.5 to 1.6.1 update patch, not the full 1.6.1 package.

1. Backup your files and database
2. Upload all files from the angora/ folder to your server and replace the old ones
3. You're done!


UPDATE FROM ANGORA GUESTBOOK VERSIONS 1.0, 1.1, 1.2 AND 1.2.1
-------------------------------------------------------------

NOTE: Use the 1.x to 1.6.1 update patch, not the full 1.6.1 package.

1. Backup your files and database
1. Upload all files from the guest/ folder to your server and replace the old ones
3. Run the setup installer at /setup/
4. Follow the instructions on the screen and choose "Update from versions 1.x" when asked


UPDATE FROM AN GUESTBOOK VERSION 0.7.x
---------------------------------------

1. Backup your files and database
2. Remove ALL your AN Guestbook files EXCEPT data.php (DO NOT DELETE THAT FILE)
3. Upload all files from the angora/ folder to your server
4. Run the setup installer at /setup/
5. Follow the instructions on the screen and choose "Update from ANG versions 0.7.x" when asked


NOTE
-----

The update works only for AN Guestbook versions 0.7.x (0.7, 0.7.1, 0.7.5, 0.7.6, 0.7.7).
If you are using an older version, please first update to any of the 0.7.x versions, before updating to Angora Guestbook.
There is no direct update for previous versions.

For TinyMCE :
tiny_mce/plugins/emotions/editor_plugin.js, editor_plugin_src.js and /js/emotions.js, are modified versions of the original files.
Modification for editor_plugin_src.js is line 14, where emotions.htm is replaced with emotions.php
emotions.php is a new file, in replacement of emotions.htm
Version used : 3.4.2


CREDITS
-------

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
