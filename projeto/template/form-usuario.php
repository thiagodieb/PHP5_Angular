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

     <div class="row">

        <form ng-submit="salvar()">
            <input type="hidden" name="id" value="<?= $usuario->getId() ?>"/>
 
            <div class="form-group">
                <label>Nome</label>
                <input class="form-control" type="text" ng-model="usuario.nome" 
                       />
            </div>
 
            <div class="form-group">
                <label>Idade</label>
                <input class="form-control" type="number" ng-model="usuario.idade"
                       value="<?= $usuario->getIdade() ?>"/>
            </div>

            <?php if(isset($_GET["id"])){ ?>

            <div class="form-group">
                <label>Email</label>
                <input class="form-control" type="email" ng-model="usuario.email"
                       value="<?= $usuario->getEmail() ?>"/>
            </div>

            <div class="form-group">
                <label>Senha</label>
                <input class="form-control" type="password" ng-model="usuario.senha"
                      value="<?= $usuario->getSenha() ?>"/>
            </div>

            <?php } ?>
            <input type="submit" class="btn" value="Salvar usuário" />
         </form>
    </div>