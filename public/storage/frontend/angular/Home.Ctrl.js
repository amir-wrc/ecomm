var HomeCtrl = angular.module('HomeCtrl',[]);
HomeCtrl.controller('HomeController', function($scope,$http) {
	$scope.banners = {};
	
	$scope.homeContent = function() {
		alert('ok');
		$http.get('/api/home-content').then(function(response){
			$scope.banners = response.data.banners;
			
			
		})
		.catch(function(reason){

		});
	}
});