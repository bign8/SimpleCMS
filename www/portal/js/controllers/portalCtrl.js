function PortalCtrl($scope, $rootScope, $http){
	if(sessionStorage.custID){
		var uri = '/adminD/portal.php?action=login&uName=' + sessionStorage.uName + '&pWord=' + sessionStorage.pw;
		$http({
			method: 'post',
			url: uri,
		}).success(function(data, status, headers, config){
			if(data != 'email not found' && data != 'login invalid'){
				$scope.pgTemplate = "templates/portalMain.html";
				$scope.userDetails = data;
				$('#divNav').show();
			} else {
				$scope.pgTemplate = "templates/login.html";
				$scope.userDetails = "";
			}
		}).error(function(data, status, headers, config){
			alert(status);
		})
	} else {
		$scope.pgTemplate = "templates/login.html";
	};
	$scope.getUserData = function(){
		var uri = '/adminD/portal.php?action=login&uName=' + sessionStorage.uName + '&pWord=' + sessionStorage.pw;
		$http({
			method: 'post',
			url: uri,
		}).success(function(data, status, headers, config){
			if(data != 'email not found' && data != 'login invalid'){
				$scope.userDetails = data;
			} else {
				$scope.pgTemplate = "templates/login.html";
				$scope.userDetails = "";
			}
		})
	}
	$scope.login = function(uName, pWord){
		var uri = '/adminD/portal.php?action=login&uName=' + uName + '&pWord=' + pWord;
		$http({
			method: 'post',
			url: uri
		}).success(function(data, status, headers, config){
			if(data == 'email not found'){
				alert("Email Not Found");
			} else if(data == 'login invalid'){
				alert("Invalid Login");
			} else {
				$scope.userDetails = data;
				sessionStorage.setItem('custID', $scope.userDetails.custID);
				sessionStorage.setItem('uName', $scope.userDetails.email);
				sessionStorage.setItem('pw', $scope.userDetails.pWord);
				$scope.pgTemplate = "templates/portalMain.html";
				if($scope.userDetails.reset == 1){
					//alert("You must reset your password.");
					$('#chgPassword').dialog('open');
				}
				$('#divNav').show();
			}
		}).error(function(data, status, headers, config){

		});
	}
	$scope.resetPassword = function(){
		alert("reset password");
	}
	$scope.chgPortalTemplate = function(tmp){
		$scope.pgTemplate = tmp;
	}
}