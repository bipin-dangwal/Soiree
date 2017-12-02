console.log('hello');



$(document).ready(function()
{
	$("#submit_request").on("click",function()
	{
		console.log('hellddo');

		
		var requestForm= $('#request_form');
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
			success: function(response)
			{
				console.log(response);
				("request_form").hide();
			}	
		});	
		}		
		

	});	
});


