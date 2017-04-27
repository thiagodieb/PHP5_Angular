var app = angular.module("sistemaNotas",[]);


app.controller("notasController", function($scope,notasService){
	$scope.alunos = [];
	$scope.qtTurmas = 0; 


	$scope.carregarLista = function(){
		notasService.listar(function(data){
			$scope.alunos = data;
			$scope.qtTurmas	= data.length;		
		});
	};

	$scope.adicionarRascunho = function(){
		$last_obj = $scope.alunos[$scope.alunos.length-1];
		console.log($last_obj);
		$scope.aluno.id = undefined !== $last_obj &&
						  undefined !== $last_obj.id && 
						  $last_obj.id != 0 
						  ? 
						  (parseInt($last_obj.id) + 1)
						  :
						  1;
		$scope.alunos.push($scope.aluno);
		alert("Aluno adicionado na lista de rascunho");
		$scope.aluno = "";
	};

	$scope.fecharTurma = function(){
		notasService.salvar($scope.alunos,function(){
			$scope.carregarLista();
		});
		
	};
});

app.service("notasService",function($http,$rootScope){

	this.listar = function(f){
		$http.get("index.php?action=listar")
		    .then(function(response) {
		    	f(response.data);
		});
	};

	this.salvar = function(params,f){
		$d = [];
		for (var i = params.length - 1; i >= 0; i--) {
			delete params[i]['$$hashKey'];
			$d.push({"id":params[i].id,
				"nome":params[i].nome,
				"turma":params[i].turma,
				"nota1":params[i].nota1,
				"nota2":params[i].nota2,
				"nota3":params[i].nota3,
				"nota4":params[i].nota4
			});
		}

		$http({
			method: "post",
            url: 'index.php?action=salvar',
            data:  "data="+JSON.stringify($d),
            //data:  "nome=Joaquim&idade=10&id=1",
            headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
        }).then(function(response) {
	    	f();
		});


	};

});
