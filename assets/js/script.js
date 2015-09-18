(function($){
	$(document).on('click', '#pc-view .button', function() {
		$("#pc-view").remove();
		
		Cookies.set('from-pc', true, { expires: 1 });
	});
})(jQuery);