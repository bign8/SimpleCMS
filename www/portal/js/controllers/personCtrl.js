$(document).ready( function(){
	
});
function PersonCtrl($rootScope, $scope, $http){
	$scope.personalEdit = false;

	$scope.setPersonalEdit = function(){
		$scope.personalEdit = true;
	}
	$scope.cancelPersonalEdit = function(){
		$('#confirmCancelText').html("If you cancel your edits now any changes you have made will be lost.<br /><br />Are you sure?");
		$('#confirmCancelDialog').dialog('option', 'title', 'Confirm Cancel Edit');
		$('#confirmCancelDialog').dialog('open');
	}
}