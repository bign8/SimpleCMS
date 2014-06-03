$(document).ready( function() { 
	$('#divNav').hide();
	$('#uName').focus();
	$('#frmLogin').validate({
		rules: {
			uName: { required: true },
			pWord: { required: true }
		},
		messages: {
			uName: { required: "User Name is Required." },
			pWord: { required: "Password is Required." }
		},
		submitHandler: function(){
			$('#divPortal').scope().login($('#uName').val(), $('#pWord').val());
		}
	});
	
	$('#frmChgPassword').validate({
		rules: {
			oldpw: { required: true },
			newpw: "required",
			newpwmatch: { equalTo: "#newpw" },
		},
		messages: {
			oldpw: { required: "Old Password is Required." },
			newpw: { required: "New Password is Required." },
			newpwmatch: { equalTo: "Passwords Must Match." }
		},
		submitHandler: function(form){
			var uri = '/adminD/portal.php?action=changePassword&custID=' + sessionStorage.getItem('custID') + '&oldPWord=' + $('#oldpw').val() + '&newPWord=' + $('#newpw').val();
			$.ajax({
				type: 'post',
				url: uri,
				success: function(html){
					switch(html){
						case 'success':
							$('#confirmChgPasswordTxt').html("Your password has been successfully updated.<br /><br />You will not be logged out and can log back in using your new password.");
							$('#confirmChgPassword').dialog('open');
							$('#divNav').show();
							$('#chgPassword').dialog('close');
							break;
						case 'error':
							$('#uiErrMsg').html("There was a problem updating your password. Please try again later.<br /><br />If this problem persists, please contact technical support.");
							$('#uiDialogError').dialog('option', 'title', 'Error Updating Password');
							$('#uiDialogError').dialog('open');
							$('#chgPassword').dialog('close');
							break;
						case 'invalid old password':
							$('#uiErrMsg').html("Your old password does not match the one associated with this account. Please enter your old password again and try changing your password again.<br /><br />If this problem persists, please contact technical support.");
							$('#uiDialogError').dialog('option', 'title', 'Old Password Mismatch');
							$('#uiDialogError').dialog('open');
							break;
						default:

					}
				}
			})
		}
	})
} )