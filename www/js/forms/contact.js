$(document).ready(function(){
	$('#contactForm').validate({
		rules: {
			name: { required: true },
			phone: { required: true },
			email: { required: true, email: true },
			comments: { required: true }
		},
		messages: {
			name: { required: "<span style='color: red;'> Name is required.</span>" },
			phone: { required: "<span style='color: red;'> Phone number is required.</span>" },
			email: { required: "<span style='color: red;'> Email is required.</span>", email: "<span style='color: red;'> Invalid Email.</span>" },
			comments: { required: "<span style='color: red;'?> Comments are required.</span>" }
		},
		submitHandler: function(form){
			if($('#email').val() ===  ""){
				var dataStr = "name=" + $('#formElement_Name').val() + "&phone=" + $('#formElement_Phone').val() + "&email=" + $('#formElement_Email').val() + "&address=" + $('formElement_Address').val();
				dataStr += "&city=" + $('#formElement_City').val() + "&state=" + $('#formElement_State').val() + "&zip_code=" + $('#formElement_Zip_Code').val() + "&comments=" + $('#formElement_Comments').val();
				$.ajax({
					type: 'post',
					url: '/js/forms/contactMailer.php',
					data: dataStr,
					success: function(data){
						if(data > 0){
							$('#divContactForm').html($('#formElement_Name').val() + "<br /><br />Thank you for contacting Sleep Diagnostics Inc. We will respond to your request as soon as possible.<br /><br />Sleep Diagnostics - Staff");
						} else {
							$('#divContactForm').html($('#formElement_Name').val() + "<br /><br />We're sorry but there was aan error encountered while sending your contact request. Please try again later.<br /><br />If this problem persists please contact <a href='mailto:admin@sleepdia.com?subject=Contact Request Error'>Website Admin</a><br /><br />Sleep Diagnostics - Staff");
						}
					}
				});
			} else {
				alert("Your kung fu no good here."); 
			}
		}
	})
})