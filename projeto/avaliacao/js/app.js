var app = angular.module("sistemaNotas",[]);


app.controller("notasController", function($scope,notasService){
	$scope.alunos = [];
	$scope.qtTurmas = 0; 


	$scope.popular = function(id){
		$scope.editar = "OK";
		for (var i = $scope.alunos.length - 1; i >= 0; i--) {
			if ($scope.alunos[i].id == id){
				$scope.aluno.id = parseInt($scope.alunos[i].id);
				$scope.aluno.nota1 = parseInt($scope.alunos[i].nota1);
				$scope.aluno.nota2 = parseInt($scope.alunos[i].nota2);
				$scope.aluno.nota3 = parseInt($scope.alunos[i].nota3);
				$scope.aluno.nota4 = parseInt($scope.alunos[i].nota4);
				$scope.aluno.nome = $scope.alunos[i].nome;
				$scope.aluno.turma = $scope.alunos[i].turma;
			}
		}
	};
	$scope.excluir = function(id){
		notasService.excluir(id,function(){
			$scope.carregarLista();
		},true);
	};


	$scope.carregarLista = function(){
		notasService.listar(function(data){
			$scope.alunos = data;
			$scope.qtTurmas	= data.length;		
		});
	};

	$scope.adicionarRascunho = function(){
		$last_obj = $scope.alunos[$scope.alunos.length-1];
		console.log($scope.aluno.id);
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

	$scope.salvarEdicao = function(){
		notasService.salvar($scope.aluno,function(){
			$scope.carregarLista();
			$scope.editar = '';
			$scope.aluno = '';
		},true);
		
	};
});

app.service("notasService",function($http,$rootScope){

	this.listar = function(f){
		$http.get("index.php?action=listar")
		    .then(function(response) {
		    	f(response.data);
		});
	};

	this.excluir = function(id,f){
		$http.get("index.php?action=excluir&id="+id)
		    .then(function(response) {
		    	f(response.data);
		});
	};

	this.salvar = function(params,f,editar){
		$d = [];
		if(params[0] !== undefined){
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
		}else{
			$d.push({"id":params.id,
				"nome":params.nome,
				"turma":params.turma,
				"nota1":params.nota1,
				"nota2":params.nota2,
				"nota3":params.nota3,
				"nota4":params.nota4
			});
		}
		
		$url = editar == true ? 'index.php?action=editar':'index.php?action=salvar';
		$http({
			method: "post",
            url: $url,
            data:  "data="+JSON.stringify($d),
            //data:  "nome=Joaquim&idade=10&id=1",
            headers : {'Content-Type': 'application/x-www-form-urlencoded'} 
        }).then(function(response) {
	    	f();
		});


	};

});
