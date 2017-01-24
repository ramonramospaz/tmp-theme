$(document).ready(function(){
	var stickyOffset = $('.notas').offset().top;
	$(window).scroll(function(){
		var sticky = $('.notas'),
		scroll = $(window).scrollTop();
		var scroll = scroll + 80;

		if (scroll >= stickyOffset){
			sticky.addClass('fixed');
		}else{
			sticky.removeClass('fixed');
		}
	});
	
});