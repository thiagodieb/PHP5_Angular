<?php 
include './../autoload.php';

use Classes\Model\UsuarioModel;

$usuario = new UsuarioModel();

$usuarios = $usuario->listar();
?>
<link rel="stylesheet" type="text/css" 
      href="css/bootstrap.css">
<a class="btn btn-primary" href="form-usuario.html">Novo Usuário</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Idade</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach( $usuarios as $usuario): ?>
        <tr>
            <td><?= ($usuario["nome"]) ?></td>
            <td><?= $usuario["idade"] ?></td>
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
