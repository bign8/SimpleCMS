var cnt = 0;
var itmCnt = 0;
if(typeof(Storage) != "undefined"){
	for(var key in localStorage){
		if(key.substr(0, 4) == 'item'){
			cnt = parseFloat(key.substr(4));
		}
	}
	itmCnt = cnt + 1;
}
$(document).ready( function(){
	fnGetItems('machine');
	getCartItems();
});
function showDtl(id, btnID){
	if($(id).is(':visible')){
		$(id).hide();
		$(btnID).val("Show Details");
	} else {
		$(id).show();
		$(btnID).val("Hide Details");
	}
}
// function checkOut(){
// 	$('#prodForm').hide();
// 	$('#prodCheckout').show();
// 	getCartList();
// }
function emptyCart(){
	if(typeof(Storage) != "undefined"){
		for(var key in localStorage){
			if(key.substr(0, 4) == 'item'){
				localStorage.removeItem(key);
			}
		}
	}
	alert("Your cart is empty.");
	getCartItems();
	itmCnt = 0;
}
function addCart(frmID){
	if(typeof(Storage) != "undefined"){
		$('input[type=checkbox]').each(function(){
			if(this.checked){
				var f = 'item' + itmCnt;
				localStorage.setItem(f, $(this).val());
				itmCnt++;
				this.checked = false;
			}
		});
		alert("Your items have been added to your cart.");
		getCartItems();
	} else {
		alert("You are currently using a browser that does not support our shopping cart. Please update your browser to the latest version.");
	}
}
function addCartMask(frmID){
	if(typeof(Storage) != "undefined"){
		$('input[type=radio]').each(function(){
			if(this.checked){
				var f = 'item' + itmCnt;
				localStorage.setItem(f, $(this).val());
				itmCnt++;
				if($(this).val() != "maskfullface" && $(this).val() != "masknasal" && $(this).val() != "masknasalpillow"){
					this.checked = false;
				}
			}
		})
		alert("Your items have been added to your cart.");
		getCartItems();
	} else {
		alert("You are currently using a browser that does not support our shopping cart. Please update your browser to the latest version.");
	}
}
function getCartItems(){
	var numItems = 0;
	if(typeof(Storage) != "undefined"){
		for(var key in localStorage){
			if(key.substr(0, 4) == 'item'){
				if(localStorage.getItem(key) != "maskfullface" && localStorage.getItem(key) != "masknasal" && localStorage.getItem(key) != "masknasalpillow"){
					numItems++;
				}
			};
		}
		$('#numItems').html(numItems);
	}
}
function fnGetItems( itmType ){
	dataStr = "action=getProductList&itmType=" + itmType;
	$.ajax({
		type: 'post',
		url: '/products/productClass.php',
		data: dataStr,
		success: function(html){
			$('#tdProdSelect').html(html);
			$('.nyroModal').nyroModal();
		}
	})
}
function fnBigImg( obj, multiplier ){
	obj.style.height = "250px";
	obj.style.width = "250px";
}
function fnSmallImg( obj, multiplier){
	obj.style.height = "50px";
	obj.style.width = "50px";
}