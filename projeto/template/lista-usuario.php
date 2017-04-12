<?php 
include './../autoload.php';

use Classes\Model\UsuarioModel;
use Classes\Model\Autenticacao;
$usuario = new UsuarioModel();
$ve = new Autenticacao();
$ve->verificaLogin();
$usuarios = $usuario->listar();
?>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

<script type="text/javascript">
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
</script>

<div class="container bs-docs-container">
    <div class="row"> 
 
        <div class="navbar navbar-default">
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                     <li role="presentation" ><a href="form-usuario.php">Novo Usuário</a></li>
                     <li role="presentation" ><a href="../Controllers/loginController.php">Logout</a></li>
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
                <tr>
                    <td><?= ($usuario["nome"]) ?></td>
                    <td><?= $usuario["idade"] ?></td>
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