jQuery(".mod_vkgallery_treeview").ready(function() {
	jQuery(".mod_vkgallery_treeview ul").each(function() {
		id = jQuery(this).attr('id');
		if (GetState(id)) {
			Show(id);
		} else {
			Hide(id);
		}
	});
	jQuery(".mod_vkgallery_treeview>ul").each(function() {
		Show(jQuery(this).attr('id'));
	});

	jQuery(".mod_vkgallery_treeview label").bind("click", function() {
		var list = jQuery(this).parent().find("ul");
		if (list.is(":visible")) {
			Hide(list.attr('id'));
		} else {
			Show(list.attr('id'));
		}
	});	

	function Show(id) {
		jQuery("#"+id).show();
		document.cookie=id+"=1";
	}

	function Hide(id) {
		jQuery("#"+id).hide();
		document.cookie=id+"=0";
	}

	function GetState(id) {
		return (document.cookie.match(new RegExp(id+"=[1,0]")) == id+"=1");
	}
});

