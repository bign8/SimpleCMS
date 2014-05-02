var cartStr = "";
$(document).ready(function(){
	$('#frmCheckOut').validate({
		errorElement: "div",
		rules: {
			fName: { required: true },
			lName: { required: true },
			dob: { required: true },
			phone: { required: true },
			uEmail: { required: true, email: true },
			address1: { required: true },
			city: { required: true },
			state: { required: true },
			zipCode: { required: true },
			insName: { required: true },
			idNum: { required: true },
			grpNum: { required: true }
		},
		messages: {
			fName: { required: "First Name is Required." },
			lName: { required: "Last Name is Required." },
			dob: { required: "Date of Birth is Required." },
			uEmail: { required: "Email is Required.", email: "Valid Email is Required." },
			address1: { required: "Address is Required." },
			city: { required: "City is Required." },
			state: { required: "State is Required." },
			zipCode: { required: "Zip Code is Required." },
			insName: { required: "Insurance Provider Name is Required." },
			idNum: { required: "Your Insurance ID Number is Required." },
			grpNum: { required: "Your Insurance Group Number is Required." }
		},
		submitHandler: function(form){
			var dataStr = "fName=" + $('#fName').val() + "&lName=" + $('#lName').val() + "&dob=" + $('#dob').val() + "&phone=" + $('#phone').val() + "&uEmail=" + $('#uEmail').val() + "&address1=" + $('#address1').val();
			dataStr += "&address2=" + $('#address2').val() + "&city=" + $('#city').val() + "&state=" + $('#state').val() + "&zipCode=" + $('#zipCode').val() + "&insName=" + $('#insName').val();
			dataStr += "&idNum=" + $('#idNum').val() + "&grpName=" + $('#grpNum').val() + "&items=";
			for(var key in localStorage){
				if(key.substr(0, 4) == "item"){
					dataStr += localStorage.getItem(key) + ",";
					localStorage.removeItem(key);
				}
			};
			$.ajax({
				type: 'post',
				url: '/js/forms/orderMailer.php',
				data: dataStr,
				success: function(html){
					if(html > 0){
						var confirmTxt = $('#fName').val() + " " + $('#lName').val() + "<br /><br />Your order has been received and we will ship your order within the next few days. We will contact you if there are any problems and/or quesitons.<br /><br />Thank you for your order.<br /><br />Sleep Diagnostics Inc.";
						$('#prodForm').show();
						$('#prodCheckout').hide();
						$('#prodForm').html(confirmTxt);
					} else {
						confirmTxt = $('#fName').val() + " " + $('#lName').val() + "<br /><br />There was a problem placing your order at this time. Please try again later.<br /><br />If this problem persists, please call or email to notify us you experienced a problem.<br /><br />We are sorry for any inconvience this may have caused.<br /><br />Sleep Diagnostics Inc.";
						$('#prodForm').show();
						$('#prodCheckout').hide();
						$('#prodForm').html(confirmTxt);
						getCartItems();
					}
				}
			})
		}
	})
})
function checkout(){
	cartStr = "";
	if(typeof(Storage) != "undefined"){
		for(var key in localStorage){
			if(key.substr(0, 4) == "item"){
				if(localStorage.getItem(key) != "machines" && localStorage.getItem(key) != "maskfullface" && localStorage.getItem(key) != "masknasal" && localStorage.getItem(key) != "masknasalpillow"){
					cartStr += "<input type='button' value='Remove' onclick=\"removeItem('" + key + "')\"/> " + localStorage.getItem(key) + "<br />";
				} else {
					localStorage.removeItem(key);
				}
			}
		}
		$('#cartDetails').html(cartStr);
		$('#prodForm').hide();
		$('#prodCheckout').show();
	}
}
function removeItem(key){
	localStorage.removeItem(key);
	$('#cartDetails').html("");
	checkout();
}
function continueShop(){
	$('#prodForm').show();
	$('#prodCheckout').hide();
}