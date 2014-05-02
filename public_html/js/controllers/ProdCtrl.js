function ProdCtrl($scope, $http){
	$scope.getItemList = function(itemType){
		var uri = '/js/controllers/ProdClass.php?action=getProductList&itmType=' + itemType;
		$http({
			method: 'post',
			url: uri,
		}).success(function(data, status, headers){
			$scope.itemList = data;
		}).error(function(data, status, headers){

		)};
	};
	$scope.getItemList('machine');
}