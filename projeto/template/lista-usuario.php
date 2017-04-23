    <div class="row" ng-init="listar()" > 

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


