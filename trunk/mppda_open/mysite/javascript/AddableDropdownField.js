;(function($) {
	$('a.addabledropdown-add-item').live('click', function() {
		var select = $(this).siblings('select');
		var dialog = $('<div class="addabledropdown-add-item-dialog"></div>');
		var input  = $('<input type="text">').appendTo(dialog);

		dialog.dialog({
			title: 'Add Item',
			modal: true,
			height: 95,
			draggable: false,
			resizable: false,
			buttons: {
				'Add': function() {
					var val    = input.val();
					var option = $('<option></option>').val(val).text(val);

					select.append(option);
					select.val(val);

					dialog.dialog('close').remove();
				},
				'Cancel': function() {
					dialog.dialog('close').remove();
				}
			}
		});
		return false;
	});
})(jQuery);