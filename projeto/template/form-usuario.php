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
<form action="../Controllers/usuarioController.php" method="post">
    <input type="hidden" name="id" value="<?= $usuario->getId() ?>"/>
    <div class="col-md-6">
        <label>Nome</label>
        <input class="form-control" type="text" name="Nome" 
               value="<?= $usuario->getNome() ?>"/>
    </div>
    <div class="col-md-6">
        <label>Idade</label>
        <input class="form-control" type="number" name="idade"
               value="<?= $usuario->getIdade() ?>"/>
    </div>
    <div class="col-md-3">
        <input type="submit" class="btn" value="Salvar usuário" />
    </div>    
</form>

