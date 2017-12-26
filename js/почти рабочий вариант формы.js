jQuery(function() {
	jQuery(document).on('click', '#submit', function(e){
		jQuery('#panel-heading').width(jQuery('#contact_form').width());

		// var form = jQuery(this); // зaпишeм фoрму, чтoбы пoтoм нe былo прoблeм с this
		var error = false;		
		form.find('input').each(function() {
		// 	if( !jQuery(this).val().trim() ) { //если в поле пусто
		// 		error = true;
		// 		jQuery("#panel-heading").addClass('succ-error').html('Заполните все поля!');
		// 		jQuery(this).addClass("form-error");				

		// 	} else {
		// 		jQuery(this).removeClass("form-error");											
		// 	}
		});


	    e.preventDefault();

	    var fd = new FormData();
	    var file = jQuery(document).find('input[type="file"]');

		var name = jQuery("#name").val();
		var email = jQuery("#email").val();
		var subject = jQuery("#subject").val();
		var message = jQuery("#message").val();


	    var individual_file = file[0].files[0];
	 	fd.append("file", individual_file);

	    fd.append("name", name);
	    fd.append("email", email);
	    fd.append("subject", subject);
	    fd.append("message", message);
	    fd.append('action', 'send_form');


	    jQuery.ajax({
	        type: 'POST',
	        url: myPlugin.ajaxurl,
	        data: fd,
	        contentType: false,
	        processData: false,
	        success: function(response){

	            console.log(response);
	        }
	    });
	    return false;
	});

});