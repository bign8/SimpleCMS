$(document).ready(function(){
	$('#uiDialogGenInfo').dialog({
		autoOpen: false,
		modal: true,
		width: 450,
	})
})
function getReplacementList(){
	$('#uiDialogGenInfo').dialog('option', 'title', 'Replacement Time Table');
	$('#uiDialogGenInfo').dialog('option', 'width', '450');
	var dataStr = "action=getReplaceList";
	$.ajax({
		type: 'post',
		url: '/uiDialog/uiDialogUtil.php',
		data: dataStr,
		success: function(data){
			$('#uiGenInfoMsg').html(data);
		}
	});
	$('#uiDialogGenInfo').dialog({
		buttons: [
			{ text: "Ok", click: function(){ $(this).dialog('close'); }}
		]
	});
	$('#uiDialogGenInfo').dialog('open');
}
function getTerms(){
	$('#uiDialogGenInfo').dialog('option', 'title', 'Terms and Definitions');
	$('#uiDialogGenInfo').dialog('option', 'width', '800');
	var dataStr = "action=getTerms";
	$.ajax({
		type: 'post',
		url: '/uiDialog/uiDialogUtil.php',
		data: dataStr,
		success: function(data){
			$('#uiGenInfoMsg').html(data);
		}
	});
	$('#uiDialogGenInfo').dialog({
		buttons: [
			{ text: "Close", click: function(){ $(this).dialog('close'); }}
		]
	});
	$('#uiDialogGenInfo').dialog('open');
}
function showStarDustVideo(){
	$('#uiDialogGenInfo').dialog('option', 'title', 'StarDust Video');
	$('#uiDialogGenInfo').dialog('option', 'width', '580');
	$('#uiGenInfoMsg').html('<iframe width="560" height="315" src="//www.youtube.com/embed/OalyGp3E6ZI" frameborder="0" allowfullscreen></iframe>');
	$('#uiDialogGenInfo').dialog({
		buttons: [
			{ text: "Close", click: function(){ $(this).dialog('close'); }}
		]
	});
	$('#uiDialogGenInfo').dialog('open');
}