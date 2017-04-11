<link rel="stylesheet" type="text/css" 
      href="css/bootstrap.css">
<?php
include '../autoload.php';
use Classes\Model\UsuarioModel;
use Classes\Entity\UsuarioEntity;
$model = new UsuarioModel;
$usuario = new UsuarioEntity();
if(isset($_GET["id"])){
    $usuario = $model->hidratar($_GET["id"]);
}
?>

<div class="container bs-docs-container">
    <div class="row">

        <div class="navbar navbar-default">
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                     <li role="presentation" ><a href="lista-usuario.php">Lista de Usuário</a></li>
                </ul>
            </div>
        </div>

        <form action="../Controllers/usuarioController.php" method="post">
            <input type="hidden" name="id" value="<?= $usuario->getId() ?>"/>
 
            <div class="form-group">
                <label>Nome</label>
                <input class="form-control" type="text" name="Nome" 
                       value="<?= $usuario->getNome() ?>"/>
            </div>
 
            <div class="form-group">
                <label>Idade</label>
                <input class="form-control" type="number" name="idade"
                       value="<?= $usuario->getIdade() ?>"/>
            </div>

            <?php if(isset($_GET["id"])){ ?>

            <div class="form-group">
                <label>Email</label>
                <input class="form-control" type="email" name="email"
                       value="<?= $usuario->getEmail() ?>"/>
            </div>

            <div class="form-group">
                <label>Senha</label>
                <input class="form-control" type="password" name="senha"
                      value="<?= $usuario->getSenha() ?>"/>
            </div>

            <?php } ?>
            <input type="submit" class="btn" value="Salvar usuário" />
         </form>
    </div>
</div>
