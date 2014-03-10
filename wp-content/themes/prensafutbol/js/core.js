jQuery(function(){ 
	jQuery("#menuequipos ul li a img").hover(function(){
		jQuery(this).delay(100).animate({ width: '40px' },{ duration: 300 });		
	},function(){
		jQuery(this).delay(100).animate({ width: '32px' },{ duration: 100 });
	});
});

jQuery(document).ready(function($) {
	jQuery('.selector-division li a.primera').click(function(event) {
		event.preventDefault();
		jQuery('.menuequipos').css('display', 'none');
		jQuery('#primera').css('display', 'block')
	});
	
	jQuery('.selector-division li a.segunda').click(function(event) {
		event.preventDefault();
		jQuery('.menuequipos').css('display', 'none');
		jQuery('#segunda').css('display', 'block')
	});
	
	jQuery('.selector-division li a.internacional').click(function(event) {
		event.preventDefault();
		jQuery('.menuequipos').css('display', 'none');
		jQuery('#internacional').css('display', 'block')
	});
	
	
	
	jQuery(".fontSizeSmall").click(function(){
		jQuery(".post p").css("font-size","13px") 
	});

	jQuery(".fontSizeMedium").click(function(){
		jQuery(".post p").css("font-size","15px") 
	});

	jQuery(".fontSizeLarge").click(function(){
		jQuery(".post p").css("font-size","17px") 
	});
	
	
});

