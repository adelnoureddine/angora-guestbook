tinyMCEPopup.requireLangPack();

var EmotionsDialog = {
	init : function(ed) {
		tinyMCEPopup.resizeToInnerSize();
	},

	insert : function(title) {
		var ed = tinyMCEPopup.editor, dom = ed.dom;

		tinyMCEPopup.execCommand('mceInsertContent', false, title);
		
		tinyMCEPopup.close();
	}

};

tinyMCEPopup.onInit.add(EmotionsDialog.init, EmotionsDialog);
