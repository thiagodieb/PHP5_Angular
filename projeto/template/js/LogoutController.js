app.controller("LogoutController", function($scope,$location,UsuarioService){
	UsuarioService.sair(function(){
		$location.path("/login");
	});
});

