var ecommRoute = angular.module('ecommRoute',['ngRoute','ngCookies']);

ecommRoute.config(function($routeProvider,$locationProvider,$qProvider){
	$locationProvider.html5Mode(true).hashPrefix('#');
	$routeProvider.when('/',{
		templateUrl: '/templates/home.html'
	})

	$qProvider.errorOnUnhandledRejections(false);
});