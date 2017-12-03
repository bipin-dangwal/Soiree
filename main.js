console.log('hello');



jQuery(document).ready(function()
{

		



	jQuery("#submit_request").on("click",function()
	{
		console.log('hellddo');

		var requestForm= jQuery('#request_form');
        var dataString = "action=form_submit&"+requestForm.serialize();
		var ajaxurl = 'http://localhost/wordpress/wp-admin/admin-ajax.php';
		var actions ='form_submit';
			console.log(dataString);
		if (!requestForm[0].checkValidity()) 
		{
			requestForm[0].reportValidity();
			return;
		}
		else{

			$.ajax (
		{
			type: 'POST',	
			url: ajaxurl, 
			data: dataString,
			cache: false,
			success: function(result)
			{
				
				console.log(result);
				$('#request_form').trigger("reset");			
				$( "#msg" ).html(result);

			}	
		});	
		}		
		

	});	
	
});


