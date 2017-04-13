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

<div class="container bs-docs-container">
    <div class="row"> 
 
        <div class="navbar navbar-default">
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                     <li role="presentation" ><a href="form-usuario.php">Novo Usuário</a></li>
                     <li role="presentation" ><a href="../Controllers/loginController.php?acao=logout">Logout</a></li>
                </ul>
            </div>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Idade</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach( $usuarios as $usuario): ?>
                 <div id="bloco_<?= $usuario["id"] ?>" style="display:none">
                    <?= $usuario["nome"] ?>

                     <form action="../Controllers/usuarioController.php" method="post">
                        <input type="hidden" name="id" value="<?= $usuario['id'] ?>"/>
             
                        <div class="form-group">
                            <label>Nome</label>
                            <input class="form-control" type="text" name="nome" 
                                   value="<?= $usuario['nome'] ?>"/>
                        </div>
             
                        <div class="form-group">
                            <label>Idade</label>
                            <input class="form-control" type="number" name="idade"
                                   value="<?= $usuario['idade']?>"/>
                        </div>
                        <input type="submit" class="btn" value="Salvar usuário" />
                        <a class="btn btn-primary cancel" 
                           href="javascript:esconder('bloco_<?= $usuario['id']?>')" >
                            Cancelar
                        </a>
                     </form>
                </div>
                <tr>
                    <td class="nome"><?= ($usuario["nome"]) ?></td>
                    <td><?= $usuario["idade"] ?></td>
                    <td>
                        <a class="btn btn-primary edicao" 
                           href="#" text="<?= $usuario["id"]?>">
                            Editar  Rápida
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-primary" 
                           href="form-usuario.php?id=<?= $usuario["id"] ?>" >
                            Editar
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-danger" 
                            href="javascript:confirmar('../Controllers/usuarioController.php?id=<?=$usuario['id']?>&acao=d','Você realmente deseja Excluir ?');">
                            Deletar
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-primary" 
                            href="javascript:confirmar('../Controllers/usuarioController.php?id=<?=$usuario['id']?>&acao=v','Você realmente deseja Visualizar informações do usuário ?');">
                            Visualizar
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php
    if($user['login'] == true){
        $_SESSION['usuario']['login'] =    "false";
    }

?>

<script type="text/javascript" src="js/script.js"></script>
