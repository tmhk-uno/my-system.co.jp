jQuery(document).ready(function () {
    
    jQuery('.flexslider').flexslider({
    	animation : 'slide',
    }); //initialization of flex slider

    //new WOW().init(); // Initialization of wow effects (animation)

    jQuery('nav#mmenu').mmenu();

    jQuery('textarea#comment').attr('placeholder','Comment');

	jQuery('input#author').attr('placeholder','Name *');

	jQuery('input#email').attr('placeholder','Email *');

	jQuery('input#url').attr('placeholder','Website');

});

function cform_validate(){
		var error = false;
		var name = jQuery.trim(jQuery('input[name="blocal_name"]').val());
		var email = jQuery.trim(jQuery('input[name="blocal_email"]').val());
		var number = jQuery.trim(jQuery('input[name="blocal_number"]').val());
		var comment = jQuery.trim(jQuery('textarea[name="blocal_comment"]').val());
		var captcha_code = jQuery.trim(jQuery('input[name="captcha_code"]').val());
		if( name=='' || email=='' || number=='' || comment=='' || captcha_code=='' ){ 	
			if(name==''){
				jQuery('input[name="blocal_name"]').addClass('blocal_error');
				error = true;
			}
			if(email==''){
				jQuery('input[name="blocal_email"]').addClass('blocal_error');
				error = true;
			}
			if(number==''){
				jQuery('input[name="blocal_number"]').addClass('blocal_error');
				error = true;
			}
			if(comment==''){
				jQuery('textarea[name="blocal_comment"]').addClass('blocal_error');
				error = true;
			}
			if(captcha_code==''){
				jQuery('input[name="captcha_code"]').addClass('blocal_error');
				error = true;
			}
			if(error){
				return false;
			}else{
				return true;
			}
		}else{
			if(!(jQuery.isNumeric(number))){
				jQuery('input[name="blocal_number"]').addClass('blocal_error');
				error = true;
			} 			
			if(error){
				return false;
			}else{
				return true;
			}
		}
	}