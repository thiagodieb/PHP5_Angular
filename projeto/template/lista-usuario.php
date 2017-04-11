<?php 
include './../autoload.php';

use Classes\Model\UsuarioModel;
use Classes\Model\Autenticacao;
$usuario = new UsuarioModel();
$ve = new Autenticacao();
$ve->verificaLogin();
$usuarios = $usuario->listar();
?>
<link rel="stylesheet" type="text/css" 
      href="css/bootstrap.css">
<a class="btn btn-primary" href="form-usuario.php">Novo Usuário</a>
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
                    href="../Controllers/usuarioController.php?id=<?= $usuario["id"] ?>&acao=d" >
                    Deletar
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
