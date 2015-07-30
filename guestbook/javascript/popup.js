function openHelp(helpTopic) {
	h = 400;
	l = 350;
	helpLink = "http://aguestbook.sourceforge.net/onlinehelp/en/";
	url = helpLink + helpTopic + ".html";
	height_sc = Math.round((screen.availHeight-h)/2);
	width_sc = Math.round((screen.availWidth-l)/2);
	window.open(url, "Help", "toolbar=0,location=0,directories=0,status=0, scrollbars=1,resizable=1,menubar=0,top="+height_sc+",left="+width_sc+",width="+l+",height="+h);
}

function openPopup(url) {
	h = 400;
	l = 350;
	height_sc = Math.round((screen.availHeight-h)/2);
	width_sc = Math.round((screen.availWidth-l)/2);
	window.open(url, "Help", "toolbar=0,location=0,directories=0,status=0, scrollbars=1,resizable=1,menubar=0,top="+height_sc+",left="+width_sc+",width="+l+",height="+h);
}