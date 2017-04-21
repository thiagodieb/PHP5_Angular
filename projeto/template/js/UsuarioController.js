var app = angular.module("Caixa",[]);

app.controller("UsuarioController", function($scope,UsuarioService){
 	$scope.usuarios = "";

 	funcao = function(data){
 		console.log("repassei o valor para o html");
 		$scope.usuarios	= data;
 	}

	UsuarioService.listar(funcao);
	console.log("já chamei a funcao listar");

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
		UsuarioService.salvar($scope.editar_usuario,function(data){
			UsuarioService.listar(function(data){
				$scope.editar_usuario = "";
				$scope.usuarios = data;
			});	
		})
	};	

});

app.service("UsuarioService",function($http){

	this.listar = function(f){
		$http.get("../Controllers/usuarioController.php?acao=l")
		    .then(function(response) {
		    	console.log("estou abrindo o response");
		    	console.log(response.data);
		    	f(response.data);
		});
	};

	this.visualizar = function(id,f){
		$http.get("../Controllers/usuarioController.php?id="+id+"&acao=v")
		    .then(function(response) {
		    	f(response.data);
		});
	};

	this.deletar = function(id,f){
		$http.get("../Controllers/usuarioController.php?id="+id+"&acao=d")
		    .then(function(response) {
		    	f(response.data);
		});
	};

	this.salvar = function(params,f){
		d = {'id':params.id,'nome':params.nome,'idade':params.idade}
		$http({
			method: "post",
            url: '../Controllers/usuarioController.php',
            data:  "data="+JSON.stringify(d),
            //data:  "nome=Joaquim&idade=10&id=1",
            headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
        }).then(function(response) {
	    	f();
		});


	};

});

