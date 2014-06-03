angular.module('sdportal', []);

$(document).ready( function() { 
	$('#chgPassword').dialog({
		autoOpen: false,
		modal: true,
		width: 400,
		title: "Change Password Required",
		closeOnEscape: false,
   		dialogClass: "noclose"
	});
	$('#confirmChgPassword').dialog({
		autoOpen: false,
		modal: true,
		width: 400,
		title: 'Password Changed Successfully',
		closeOnEscape: false,
		buttons: [
			{ text: "Okay", click: function(){
				sessionStorage.clear();
				$(this).dialog('close');
				window.location = '/portal/index.php';
			}}
		]
	});
	$('#confirmCancelDialog').dialog({
		autoOpen: false,
		modal: true,
		width: 400,
		closeOnEscape: false,
		buttons: [
			{ text: "Yes", click: function(){
				$(this).dialog('close');
				$('#divPortal').scope().getUserData();
				$('#divPerInfo').scope().personalEdit = false;
			}},
			{ text: "No", click: function(){
				$(this).dialog('close');
			}}
		]
	})
	$('#divNav').hide();
});
function removeFormat(field){
	var retStr = "";
	for(i = 0; i < $(field).val().length; i++){
		if(!isNaN($(field).val().substr(i, 1)) && $(field).val().substr(i, 1) != " "){
			retStr += $(field).val().substr(i, 1);
		}
	}
	$(field).val(retStr);
};
function formatSSN(field){
	if($(field).val().length == 9){
		$(field).val($(field).val().substr(0, 3) + "-" + $(field).val().substr(3, 2) + "-" + $(field).val().substr(5, 4));
	}
};
function formatPhone(field){
	if($(field).val().length == 10){
		$(field).val("(" + $(field).val().substr(0, 3) + ") " + $(field).val().substr(3, 3) + "-" + $(field).val().substr(6, 4));
	}
};
function formatZip(field){
	if($(field).val().length == 5){
		$(field).val($(field).val() + "-0000");
	};
	if($(field).val().length == 9){
		$(field).val($(field).val().substr(0, 5) + "-" + $(field).val().substr(5, 4));
	};
};
function checkNum(field){
	if(isNaN($(field).val().substr(-1))){
		alert("Please enter numbers only.");
		$(field).val($(field).val().substr(0, $(field).val().length - 1));
	}
}