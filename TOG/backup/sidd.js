/*
*Developed and Maintaining by:Siddharth Singh, v 01.00
*Detail:Use for Om contact form
*Author URI: http://fileworld.in/
*Email:siddharthsingh91@gmail.com
*code version:01.00.01
*stripe:Payment Process
*/
<!-- The required Stripe lib -->

jQuery(document).ready(function(e) {
jQuery("input").removeProp("size");	
jQuery( "#my_select_plan" ).change(function () {
jQuery("#my_select_plan_two option:selected").removeAttr("selected");
jQuery("#my_select_plan_three option:selected").removeAttr("selected");
});

jQuery( "#my_select_plan_two" ).change(function () {
jQuery("#my_select_plan option:selected").removeAttr("selected"); 
jQuery("#my_select_plan_three option:selected").removeAttr("selected");
});   

jQuery( "#my_select_plan_three" ).change(function () {
jQuery("#my_select_plan option:selected").removeAttr("selected");
jQuery("#my_select_plan_two option:selected").removeAttr("selected");
});    
});

// This identifies your website in the createToken call below
Stripe.setPublishableKey('pk_live_gTwNBcAF0M12dPg7QSKBwPZY');
/*******************************************************************************
 * form ajax call for stripe start
 ******************************************************************************/
function stripeResponseHandler(status, response) {
	var themeURL=jQuery("#themeDir_page_link").text();
	if (response.error) {
		// re-enable the submit button
    // Show the errors on the form
 $('#payment-form').find('.payment-errors').text(response.error.message);
 $('#payment-form').find('button').prop('disabled', false);

	} else {
		var form$ = $("#payment-form1");
		// token contains id, last4, and card type
		var token = response['id'];
		// insert the token into the form so it gets submitted to the server
		form$.append("<input type='hidden' name='stripeToken' value='" + token+ "'/>");
		var select_one=jQuery( "#my_select_plan option:selected" ).val();
		var select_two=jQuery( "#my_select_plan_two option:selected" ).val();
		var select_three=jQuery( "#my_select_plan_three option:selected" ).val();
		if(select_one!="0"){
			var charge=parseInt(jQuery( "#my_select_plan option:selected" ).val())*100;
			}
		else if(select_two!="0"){
			var charge=parseInt(jQuery( "#my_select_plan_two option:selected" ).val())*100;
			}	
			else{
			var charge=parseInt(jQuery( "#my_select_plan_three option:selected" ).val())*100;	
				}
		var first_name=jQuery("#first_name").val();
		var last_name=jQuery("#last_name").val();
		var plain=jQuery("#my_select_plan option:selected" ).text();
		var last_charge=charge+(.03*charge);
		if(first_name==""){	jQuery(".payment-errors").html("First name");}
		else if(last_name==""){	jQuery(".payment-errors").html("Last name");}
				
		else if(last_charge==0){
			jQuery(".payment-errors").html("Select Traveler");
			}else{
			jQuery(".payment-errors").html("");	
		// and submit
		// form$.get(0).submit();
		$.ajax({
			beforeSend: function(){
				jQuery("#payment-form").html("<p id=\"sucess_full_payment\">Please wait....</p>")
				},
			type : 'POST',
			url : themeURL+'/payment/stripe.php',
			data : {
				'stripeToken' : token,
				'charges' : last_charge
			}
		})
		.done(
				function(data) {
					var datas=String(data);
					//console.log(datas);
					if(datas.match(/Error/gi)){
					   jQuery("#payment-form").html("<h4 id=\"sucess_full_payment\">Something went wrong please try agin later.</h4>");	
						}else if(datas.match(/Sucess/gi)) {
					jQuery("#payment-form1").hide();
					jQuery("#payment-form").html("<h1 id=\"sucess_full_payment\">Thank for your payment</h1>");
					
					payment=Object();
					payment.charges=Number(last_charge/100);
					payment.plain=plain;
					payment.first_name=first_name;
					payment.last_name=last_name;
						$.ajax({
						type : 'POST',
						url : themeURL+'/function/payment_email.php',
						data : {'payment' : payment}
							})
						}else{
					jQuery("#payment-form").html("<h1 id=\"sucess_full_payment\">System stop working please call to admin</h1>");		
							}
				});
	}
	}
}


function pay_with_credit_card(){
	var card_number=Number(jQuery("#card_number").val());
	var card_password=Number(jQuery("#card_password").val());
	var exp_month=Number(jQuery("#exp_month").val());
	var exp_year=Number(jQuery("#exp_year").val());
		
  Stripe.createToken({
				number : card_number,
				cvc : card_password,
				exp_month : exp_month,
				exp_year : exp_year
			}, stripeResponseHandler);
    
}
