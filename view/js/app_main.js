(function($) {

	$('#header__icon').click(function(e){
		e.preventDefault();
		$('body').addClass('width--sidebar');
	});

	$('#site-cache').click(function(e){
		e.preventDefault();
		$('body').removeClass('width--sidebar');
	})
})(jQuery);