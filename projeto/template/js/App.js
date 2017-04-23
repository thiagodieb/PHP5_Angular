var app = angular.module("Caixa",['ngRoute']);
app.config(function($routeProvider){

$routeProvider
  .when('/', {
    templateUrl : 'lista-usuario.php',
    controller  : 'UsuarioController'
  })
  .when('/usuario/adicionar', {
    templateUrl : 'form-usuario.php',
    controller  : 'UsuarioController'
  })
  .when('/logout', {
  	template : '',
  	controller  : 'LogoutController'
  })	
  .when('/login', {
  	templateUrl : 'form-login.php',
  	controller  : 'LoginController'
  })
});

app.service("UsuarioService",function($http,$location,$rootScope){
	

	this.verificarSession = function (f){
			if(!$rootScope.ShowMenu){
				$location.path("/login");
			}		
	}

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
		d = {'nome':params.nome,'idade':params.idade}
		if(params.id != undefined)
			d.id =params.id
		
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

	this.sair = function(f){
		$http.get("../Controllers/loginController.php?acao=logout")
		    .then(function(response) {
		    	f(response.data);
		});
	};

	this.entrar = function(params,f){
		d = {'email':params.email,'senha':params.senha}
		$http({
			method: "post",
            url: '../Controllers/loginController.php',
            data:  "data="+JSON.stringify(d),
            //data:  "nome=Joaquim&idade=10&id=1",
            headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
        }).then(function(response) {
        	if(response.data.search("false") == 1){
        		alert("não está correto");
        	}else{
        		f();
        	}
		});
        	
	};
});
