<?php 
session_start();
include './../autoload.php';

use Classes\Model\UsuarioModel;
use Classes\Model\Autenticacao;
$usuario = new UsuarioModel();
$usuarios = $usuario->listar();

@$user = $_SESSION['usuario'];

?>
 
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<script src="js/angular.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular-route.js"></script>
<script src="js/App.js"></script>
<script src="js/UsuarioController.js"></script>
<script src="js/LogoutController.js"></script>
<script src="js/LoginController.js"></script>
<script type="text/javascript">

    window.addEventListener('unload',function(){
            console.log("saindo da pagina......");
    });

/*    var params = new URLSearchParams(window.location.search);

   function boasVindas(login){
        if(login != null){
            alert('Você, '+login+' muito bem vindo!');
        }
    }
*/
//    boasVindas(params.get('login'));
     
    window.onbeforeunload = function(){
        return '';
    };
      

    function confirmarVisualizacao(id){
        console.log(id);
    
        var resposta = confirm("Você realmente deseja Visualizar ?");

        if (resposta == true) {
            var url = "../Controllers/usuarioController.php?id="+id+"&acao=v";
            console.log(url);
            open(url,'_self');
        } 
    }
    function confirmarExclusao(id){
        console.log(id);
    
        var resposta = confirm("Você realmente deseja Excluir ?");

        if (resposta == true) {
            var url = "../Controllers/usuarioController.php?id="+id+"&acao=d";
            console.log(url);
            open(url,'_self');
        } 
    }

    function confirmar(url,texto){
        var resposta = confirm(texto);

        if (resposta == true) {
            console.log(url);
            open(url,'_self');
        } 
    }


    /*function msgBoasVindas(){
        if(<?php echo $user['login']?>){
            alert("Olá, <?php echo $user['nome']?>, seja bem vindo ");
        }
        
    }
    msgBoasVindas();*/
</script>
<body  ng-app="Caixa">

<div class="container bs-docs-container" >
    <div class="row" ng-show="ShowMenu">
        
            <div class="navbar navbar-default">
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li role="presentation" ><a href="#/">Principal</a></li>
                         <li role="presentation" ><a href="#/usuario/adicionar">Novo Usuário</a></li>
                         <li role="presentation" ><a href="#/logout">Logout</a></li>
                    </ul>
                </div>
            </div>
    </div>
    <div class="row" ng-view></div>
 </div>

<?php
    if($user['login'] == true){
        $_SESSION['usuario']['login'] =    "false";
    }

?>
</body>
<script type="text/javascript" src="js/script.js"></script>
