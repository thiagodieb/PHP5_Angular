app.controller("LoginController", function($scope,$location,$rootScope,UsuarioService){
	$rootScope.ShowMenu = "";
	
	$scope.login = function(){
		console.log("enviar post do entrar")
		UsuarioService.entrar($scope,function(){
			$rootScope.ShowMenu = "ok";
			$location.path("/");
		});
	}
	
});

