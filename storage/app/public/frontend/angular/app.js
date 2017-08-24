var ecommApp = angular.module('ecommApp',['ecommRoute']);

ecommApp.directive('myNavbar',function(){
	return {
		restrict: 'E',
		templateUrl: 'templates/navbar.html',
		scope: true
	};
	
});