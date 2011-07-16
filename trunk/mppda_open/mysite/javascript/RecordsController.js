;(function($) {
	$("#scans-container").multipleElementsCycle({
		overrideStart: 0,
		elementContainer: '#scans-container',
		prevElement: '#scans-cycle-prev a',
		nextElement: '#scans-cycle-next a'
	});
	
	$("a#show-keywords").click(function() {
		link      = $(this).attr("href");
		$keywords = $("#all-keywords");
		
		if (!$keywords.is(":hidden")) {
			$keywords.toggle("fast");
			return false;
		}
		
		if ($keywords.hasClass("loading")) {
			$keywords.load(link, function() {
				$keywords.removeClass("loading");
			});
		}
		
		$keywords.toggle("fast");
		return false;
	});
	
	$("input#keywords-filter").live("keyup", function() {
		var $keywords = $("#keywords-cloud a");
		var filter    = $(this).val().toLowerCase();
		
		if (filter) {
			$keywords.each(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(filter) != -1);
			});
		} else {
			$keywords.show();
		}
	});
	
	$("#scans a").facebox({
		loadingImage: 'mysite/thirdparty/facebox/src/loading.gif',
		closeImage: 'mysite/thirdparty/facebox/src/closelabel.png'
	});
	$(document).bind("reveal.facebox", function() {
		$(".record-scan-thumb.record-scan-zoom").each(function() {
			$("img", this).zoomer({ big: $(this).attr("data-image-link") });
		});
	});
})(jQuery);