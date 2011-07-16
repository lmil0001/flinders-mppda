;(function ($) {
	$("#action_prevRecord, #action_nextRecord").live("click", function() {
		var button = $(this);
		var link   = button.metadata().link;
		
		$("#ModelAdminPanel").fn("loadForm", link, function() {
			$("#ModelAdminPanel").fn("addHistory", link);
		});
	});
})(jQuery);