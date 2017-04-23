app.controller("UsuarioController", function($scope,$location,UsuarioService){
 	$scope.usuarios = "";

 	UsuarioService.verificarSession();

	$scope.listar = function(){

	 	funcao = function(data){
	 		console.log("repassei o valor para o html");
	 		$scope.usuarios	= data;
	 	}

		UsuarioService.listar(funcao);
		console.log("já chamei a funcao listar");

	};

	$scope.visualizar = function(id){
		UsuarioService.visualizar(id,function(data){
			console.log(data);
			$scope.visualizar_usuario = data;
		})
	};

	$scope.deletar = function(id){
		UsuarioService.deletar(id,function(){
			UsuarioService.listar(function(data){
				$scope.usuarios = data;
			});		
		})
	};

	$scope.editar = function(id){
		UsuarioService.visualizar(id,function(data){
			$scope.editar_usuario = data;
		})
	};
	
	$scope.salvar = function(){
		
		$user = $scope.editar_usuario ? $scope.editar_usuario : $scope.usuario;
		console.log($user);
		UsuarioService.salvar($user,function(data){
			UsuarioService.listar(function(data){
				$scope.editar_usuario = "";
				$scope.usuarios = data;
				$location.path("/");
			});	
		})
	};	

});


