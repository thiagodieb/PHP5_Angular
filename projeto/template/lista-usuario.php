<?php 
session_start();
include './../autoload.php';

use Classes\Model\UsuarioModel;
use Classes\Model\Autenticacao;
$usuario = new UsuarioModel();
$usuarios = $usuario->listar();

$user = $_SESSION['usuario'];

?>
 
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<script src="js/angular.min.js"></script>
<script src="js/UsuarioController.js"></script>
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


    function msgBoasVindas(){
        if(<?php echo $user['login']?>){
            alert("Olá, <?php echo $user['nome']?>, seja bem vindo ");
        }
        
    }
    msgBoasVindas();
</script>

<div class="container bs-docs-container" ng-app="Caixa" ng-controller="UsuarioController">
    <div class="row"> 
 
        <div class="navbar navbar-default">
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                     <li role="presentation" ><a href="form-usuario.php">Novo Usuário</a></li>
                     <li role="presentation" ><a href="../Controllers/loginController.php?acao=logout">Logout</a></li>
                </ul>
            </div>
        </div>

        <table class="table table-striped" ng-show="usuarios">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Idade</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="usuario in usuarios">
                    <td class="nome">{{usuario.nome}}</td>
                    <td>{{usuario.idade}}</td>
                    <td>
                        <a class="btn btn-primary" ng-click="editar(usuario.id)">
                            Editar
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-danger" ng-click="deletar(usuario.id)">
                            Deletar
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-primary" ng-click="visualizar(usuario.id)">
                            Visualizar
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="modal" style="display:block" role="dialog" ng-show="visualizar_usuario">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Visualização do Usuário</h4>
          </div>
          <div class="modal-body">
            <p><b>Nome:</b>{{visualizar_usuario.nome}}</p>
            <p><b>E-mail:</b>{{visualizar_usuario.email}}</p>
            <p><b>Idade:</b>{{visualizar_usuario.idade}}</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" ng-click="visualizar_usuario=''">Fechar</button>
          </div>
        </div>

      </div>
    </div>


    <div class="modal" style="display:block" role="dialog" ng-show="editar_usuario">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Editar  Usuário</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
                <label>Nome</label>
                <input class="form-control" type="text" ng-model="editar_usuario.nome"/>
            </div>
            <div class="form-group">
                <label>Idade</label>
                <input class="form-control" type="number" ng-model="editar_usuario.idade"/>
            </div>

          </div>
          <div class="modal-footer">
             <button type="button" class="btn" data-dismiss="modal" ng-click="salvar()">Salvar</button>
            <button type="button" class="btn btn-default" data-dismiss="modal" ng-click="editar_usuario=''">Fechar</button>
          </div>
        </div>

      </div>
    </div>



</div>

<?php
    if($user['login'] == true){
        $_SESSION['usuario']['login'] =    "false";
    }

?>

<script type="text/javascript" src="js/script.js"></script>
