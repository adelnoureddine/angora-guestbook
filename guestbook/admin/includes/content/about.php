<?php

if (@$magic != "0xDEADBEEF")
	die("This file cannot be executed directly");

	echo '<div class="mainTitle">' . $lang['about'] . '</div>';
	echo '<div class="helpPopup ' . $alignHelp . '"><a href="#" onclick="openHelp(\'about\');">' . $lang['help'] . '</a></div>';
	
	echo '<p><img src="../images/logo/angora_small.png" alt="Angora logo" />
	<br />&copy; 2009 Adel Noureddine</p>';
	
	echo $lang['author'] . ' : Adel Noureddine<br />';
	echo $lang['website'] . ' : <a href="http://aguestbook.sourceforge.net" target="_blank">http://aguestbook.sourceforge.net</a><br />';
	echo $lang['licence'] . ' : The Angora License (Version 1.1)';
	echo "<p>copyright &copy; 2005 - 2023 - Adel NOUREDDINE</p>
	<p><strong><u>Definitions :</u></strong><br />
	The <i>\"Author\"</i> refers to Adel NOUREDDINE.
	</p>
	<p><strong><u>Agreement :</u></strong>
	<br />
	This software is provided 'as-is', without any express or implied warranty.
	<br />
	In no event will the <i>Author</i> be held liable for any damages arising from the use of this software.
	<br /><br />
	Permission is granted to anyone to use this software for any purpose, including commercial applications, 
	and to alter it and redistribute it freely, subject to the following restrictions:
	<br />
	<p>1. The origin of this software must not be misrepresented; you must not claim that you wrote the original software.
	<br />
	If you use this software in a product, an acknowledgment in the product documentation would be appreciated but is not required.</p>
	
	<p>2. Altered source versions must be plainly marked as such, and must not be misrepresented as being the original software.
	<br />
	If you alter, transform, or build upon this work, you may distribute the resulting work only under the same, or a similar license.</p>
	
	<p>3. The name of the <i>Author</i> may not be used to endorse or promote products derived from this software without specific prior written permission.</p>
	
	<p>4. This notice may not be removed or altered from any source distribution.</p>";

?>