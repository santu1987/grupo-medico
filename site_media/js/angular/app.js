angular.module("GrupoMedicoApp",["ngRoute"])
.config(function($routeProvider){
	$routeProvider
		.when("/",{
			controller: "MainController",
			templateUrl: "site_media/templates/inicio.html"
		})
});