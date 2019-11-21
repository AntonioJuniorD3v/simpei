  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="">
            <h1 class="m-0 text-dark">Usuários</h1>
          </div><!-- /.col -->
          &nbsp;
          &nbsp;
          &nbsp;
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap"><i class="fas fa-plus-circle" style="padding-right:10px;"></i>Cadastrar</button>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Modal Cadastrar -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cadastrar Usuário</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" class="row" action="<?php echo BASE_URL ?>usuario/cadastrar">
              <div class="form-group col-6">
                <label for="recipient-name" class="col-form-label">Nome:</label>
                <input type="text" class="form-control" name="nome" id="recipient-name">
              </div>
              <div class="form-group col-6">
                <label for="message-text" class="col-form-label">Usuário:</label>
                <input type="text" class="form-control" name="usuario" id="recipient-name">
              </div>
              <div class="form-group col-6">
                <label for="message-text" class="col-form-label">Senha:</label>
                <input type="password" class="form-control" name="senha" id="recipient-name">
              </div>
              <div class="form-group col-6">
                <label for="message-text" class="col-form-label">Matricula:</label>
                <input type="number" class="form-control" name="matricula" id="recipient-name">
              </div>
              <div class="form-group col-6">
                <label for="message-text" class="col-form-label">Função:</label>
                <select class="form-control" name="funcao" id="exampleFormControlSelect1">
                  <option>Analista</option>
                  <option>Técnico</option>
                </select>
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal Editar -->
    <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditarLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar Usuário</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <form method="POST" class="row" action="<?php echo BASE_URL ?>usuario/editar">
          <input type="text" class="form-control" name="id" id="id" hidden>
               <div class="form-group col-6">
                <label for="recipient-name" class="col-form-label">Nome:</label>
                <input type="text" class="form-control" name="nome" id="nome">
              </div>
              <div class="form-group col-6">
                <label for="message-text" class="col-form-label">Usuário:</label>
                <input type="text" class="form-control" name="usuario" id="usuario">
              </div>
              <div class="form-group col-6">
                <label for="message-text" class="col-form-label">Senha:</label>
                <input type="password" class="form-control" name="senha" id="senha">
              </div>
              <div class="form-group col-6">
                <label for="message-text" class="col-form-label">Matricula:</label>
                <input type="number" class="form-control" name="matricula" id="matricula">
              </div>
              <div class="form-group col-6">
                <label for="message-text" class="col-form-label">Função:</label>
                <select class="form-control" name="funcao" id="funcao">
                  <option>Analista</option>
                  <option>Técnico</option>
                </select>
              </div>
              <div class="form-group col-6">
                <label for="message-text" class="col-form-label">Estado:</label>
                <select class="form-control" name="estado" id="estado">
                  <option>Ativado</option>
                  <option>Desativado</option>
                </select>
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal Desativar -->
    <div class="modal fade" id="modalDesativar" tabindex="-1" role="dialog" aria-labelledby="modalDesativar" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tem certeza que deseja desativar?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="POST" action="<?php echo BASE_URL ?>usuario/desativar">
            <input type="text" id="id" name="id" hidden>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button class="btn btn-primary" type="submit">Sim</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <section class="content">

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Controle de Usuários</h3>
          <div class="card-tools">

          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0" style="overflow: auto; " >
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Usuário</th>
                <th>Nome</th>
                <th>Matricula</th>
                <th>Função</th>
                <th>Estado</th>
                <th style="width: 40px">Ações</th>
              </tr>
            </thead>
            <tbody id="resultado">
              <?php foreach ($viewData as $data) { ?>
                <tr >
                    <td><?php echo $data['usuario'] ?></td>
                    <td><?php echo $data['nome'] ?></td>
                    <td><?php echo $data['matricula'] ?></td>
                    <td>
                      <div class="">
                        <?php if ($data['funcao'] == 0) { ?>
                          <span >Técnico</span>
                        <?php } ?>
                        <?php if ($data['funcao'] == 1) { ?>
                          <span>Analista</span>
                        <?php } ?>
                      </div>
                    </td>
                    <td>
                      <div class="">
                        <?php if ($data['estado'] == 1) { ?>
                          <span class="badge bg-success">Ativo</span>
                        <?php } ?>
                        <?php if ($data['estado'] == 0) { ?>
                          <span class="badge bg-danger">Desativado</span>
                        <?php } ?>
                      </div>
                    </td>
                    <td>
                      <div class="btn-group" role="group" aria-label="Exemplo básico" style="height:30px; overflow:hidden;">
                        <button type="button" class="btn  btn-primary btn-sm" data-toggle="modal" data-target="#modalEditar"
                          data-id="<?php echo $data['id'] ?> "
                          data-nome="<?php echo $data['nome'] ?>" 
                          data-usuario="<?php echo $data['usuario'] ?>"
                          data-funcao="<?php echo $data['funcao'] ?>"
                          data-estado="<?php echo $data['estado'] ?>" 
                          data-matricula="<?php echo $data['matricula'] ?>">
                          <i class="fas fa-edit"></i>
                        </button>
                          &nbsp;
                          &nbsp;
                        <button type="submit" class="btn btn-danger btn-sm" data-id="<?php echo $data['id'] ?>" data-toggle="modal" data-target="#modalDesativar">
                          <i class="fas fa-trash-alt"></i>
                        </button>
                      </div>
                    </td>
                  </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->