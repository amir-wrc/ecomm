var AuthCtrl = angular.module('AuthCtrl',[]);

AuthCtrl.controller('AuthController',function($scope,$http){

    $scope.homeContent=function(){

       $http.get('/api/home-content').then(function(response){
        //console.log(response.data);
        $scope.banners = response.data.banners;
        $scope.products = response.data.products;
         
      });
    	
    }

	});