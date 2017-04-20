 angular.module('meuApp', [])
    .controller('primeiroController', function($scope) {
        $scope.name = "";
        $scope.lastname = "";
        $scope.people = new Array();
        $scope.alunos = ['Leo','Robson','Fabio'];
 
        $scope.fullname = function() {
            return $scope.name + " " + $scope.lastname;
        }

		$scope.addList = function() {
			
			$scope.people.push({'name':$scope.name,'lastname':$scope.lastname})
			$scope.name ="";
			$scope.lastname = "";	
        }

    }).controller('segundoController',function($scope){

        $scope.name = "Novo nome";

    });