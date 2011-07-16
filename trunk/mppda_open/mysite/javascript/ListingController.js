var ListingController = (function($) {
	var $form = $('#Form_FilterForm');
	
	var self = {
		/**
		 * Binds the event handlers.
		 */
		init: function() {
			var self = this;

			$('select', $form).each(function() {
				// IE can't hide select options, so keep a cloned copy.
				$(this).data('original', $(this).clone());
				$(this).change(self.loadFacetsFromServer);
			});
			$('button[type="reset"]', $form).live('click', this.resetFacets);
		},
		/**
		 * Loads the facets data from the server.
		 */
		loadFacetsFromServer: function() {
			var $selects = $('select', $form)
			var data     = $selects.serialize();
			var url      = $form.metadata().facetsLink;

			$form.addClass('loading');
			$selects.attr('disabled', 'disabled');

			$.get(url, data, function(data) {
				self.loadFacetsFromObject(data);
				$selects.removeAttr('disabled');
				$form.removeClass('loading');
			});
		},
		/**
		 * Loads the faceting data from an object.
		 */
		loadFacetsFromObject: function(data) {
			$.each(data, function(name, options) {
				$('select[name="' + name + '"]', $form).each(function() {
					var selected = $(this).val();
					$(this).html($(this).data('original').html());

					$(this).find('option').each(function() {
						var val = $(this).val();

						if (!val) {
							return;
						} else if (val in options) {
							$(this).text(options[$(this).val()]);
						} else {
							$(this).remove();
						}
					});
					
					$(this).val(selected);
				});
			});
		},
		/**
		 * Resets the facet form and reloads the facets from the server.
		 */
		resetFacets: function() {
			$('select', $form).each(function() {
				$(this).html($(this).data('original').html());
			});
			$('select', $form).val('');
			$('input.text', $form).val('');

			return false;
		}
	};
	
	return self;
}(jQuery));

ListingController.init();