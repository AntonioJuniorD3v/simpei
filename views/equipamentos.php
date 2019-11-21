  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-2">
            <h1 class="m-0 text-dark">Equipamentos</h1>
          </div><!-- /.col -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap"><i class="fas fa-plus-circle" style="padding-right:10px;"></i>Cadastrar</button>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Modal Cadastrar -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cadastrar Equipamento</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="<?php echo BASE_URL ?>equipamento/cadastrar">
            <div class="row">
              <div class="form-group col-8">
                <label for="recipient-name" class="col-form-label">Nome:</label>
                <input type="text" class="form-control" name="nome" id="recipient-name" required>
              </div>
              <div class="form-group col-4">
                <label for="message-text" class="col-form-label">Modelo:</label>
                <input type="text" class="form-control" name="modelo" id="recipient-name" required>
              </div>
            </div>

            <div class="row">
              <div class="form-group col-5">
                <label for="recipient-name" class="col-form-label">Patrimonio:</label>
                <input type="number" class="form-control" name="patrimonio" id="recipient-name" required>
              </div>
              <div class="form-group col-7">
                <label for="message-text" class="col-form-label">Estado:</label>
                <select class="form-control" name="estado" id="exampleFormControlSelect1">
                  <option>Produção</option>
                  <option>Manutenção</option>
                  <option>Descartado</option>
                </select>
              </div>
            </div>
            <div class="row">
            <div class="form-group col-6">
                <label for="message-text" class="col-form-label">Periodo Manutenção Preditiva:</label>
                <select class="form-control" name="periodoPreditiva" id="exampleFormControlSelect1">
                  <option>Semanal</option>
                  <option>Quinzenal</option>
                  <option>Mensal</option>
                  <option>Trimestral</option>
                  <option>Semestral</option>
                  <option>Anual</option>

                </select>
              </div>
              <div class="form-group col-6">
                <label for="message-text" class="col-form-label">Periodo Manutenção Preventiva:</label>
                <select class="form-control" name="periodoPreventiva" id="exampleFormControlSelect1">
                  <option>Semanal</option>
                  <option>Quinzenal</option>
                  <option>Mensal</option>
                  <option>Trimestral</option>
                  <option>Semestral</option>
                  <option>Anual</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <label for="message-text" class="col-form-label">Checklist Preditiva:</label>
                <input type="text" class="form-control" name="checklistPreditiva" id="cheklistPreditiva" value="" />
              </div>
              <div class="col-6">
                <label for="message-text" class="col-form-label">Checklist Preventiva:</label>
                <input type="text" class="form-control" name="checklistPreventiva" id="cheklistPreventiva" value="" />
              </div>
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
      <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar Equipamento</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="<?php echo BASE_URL ?>equipamento/editar">
            <input type="text" class="form-control" name="id" id="id" hidden>
            <div class="row">
              <div class="form-group col-8">
                <label for="recipient-name" class="col-form-label">Nome:</label>
                <input type="text" class="form-control" name="nome" id="nome" required>
              </div>
              <div class="form-group col-4">
                <label for="message-text" class="col-form-label">Modelo:</label>
                <input type="text" class="form-control" name="modelo" id="modelo" required>
              </div>
            </div>

            <div class="row">
              <div class="form-group col-5">
                <label for="recipient-name" class="col-form-label">Patrimonio:</label>
                <input type="number" class="form-control" name="patrimonio" id="patrimonio" required>
              </div>
              <div class="form-group col-7">
                <label for="message-text" class="col-form-label">Estado:</label>
                <select class="form-control" name="estado" id="estadoo">
                  <option>Produção</option>
                  <option>Manutenção</option>
                  <option>Descartado</option>
                </select>
              </div>
            </div>
            <div class="row">
            <div class="form-group col-6">
                <label for="message-text" class="col-form-label">Periodo Manutenção Preditiva:</label>
                <select class="form-control" name="periodoPreditiva" id="periodoPreditiva">
                  <option>Semanal</option>
                  <option>Quinzenal</option>
                  <option>Mensal</option>
                  <option>Trimestral</option>
                  <option>Semestral</option>
                  <option>Anual</option>

                </select>
              </div>
              <div class="form-group col-6">
                <label for="message-text" class="col-form-label">Periodo Manutenção Preventiva:</label>
                <select class="form-control" name="periodoPreventiva" id="periodoPreventiva">
                  <option>Semanal</option>
                  <option>Quinzenal</option>
                  <option>Mensal</option>
                  <option>Trimestral</option>
                  <option>Semestral</option>
                  <option>Anual</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <label for="message-text" class="col-form-label">Checklist Preditiva:</label>
                <input type="text" class="form-control" name="checklistPreditiva" id="checklistPreditivaEditar" value="" />
              </div>
              <div class="col-6">
                <label for="message-text" class="col-form-label">Checklist Preventiva:</label>
                <input type="text" class="form-control" name="checklistPreventiva" id="checklistPreventivaEditar" value="" />
              </div>
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
          <form method="POST" action="<?php echo BASE_URL ?>equipamento/desativar">
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
          <h3 class="card-title">Controle de Equipamentos</h3>
          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 200px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Pesquisar" id="busca">
              <div class="input-group-append">
                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0" style="overflow: auto; " >
          <table class="table table-striped">
            <thead>
              <tr>
                <th style="width: 10px">Cód.</th>
                <th>Nome</th>
                <th>Modelo</th>
                <th>Patrimônio</th>
                <th>Próxima Manutenção Preditiva</th>
                <th>Próxima Manutenção Preventiva</th>
                <th>Estado</th>
                <th style="width: 40px">Ação</th>
              </tr>
            </thead>
            <tbody id="resultado">
              <?php foreach ($viewData as $data) { ?>
                <tr >
                    <td><?php echo $data['idEquipamento'] ?></td>
                    <td><a href="equipamento/detalhesEquipamento?id=<?php echo $data['idEquipamento'] ?>" ><?php echo $data['nome'] ?></a></td>
                    <td><?php echo $data['modelo'] ?></td>
                    <td><?php echo $data['patrimonio'] ?></td>
                    <td><?php echo $data['proximaManutencaoPreditiva'] ?></td>
                    <td><?php echo $data['proximaManutencaoPreventiva'] ?></td>
                    <td>
                      <div class="">
                        <?php if ($data['estado'] == 'Produção') { ?>
                          <span class="badge bg-success"><?php echo $data['estado'] ?></span>
                        <?php } ?>
                        <?php if ($data['estado'] == 'Manutenção') { ?>
                          <span class="badge bg-warning"><?php echo $data['estado'] ?></span>
                        <?php } ?>
                        <?php if ($data['estado'] == 'Desativado') { ?>
                          <span class="badge bg-danger"><?php echo $data['estado'] ?></span>
                        <?php } ?>
                      </div>
                    </td>
                    <td>
                      <div class="btn-group" role="group" aria-label="Exemplo básico">
                        <button type="button" class="btn  btn-primary btn-sm" data-toggle="modal" data-target="#modalEditar"
                          data-id="<?php echo $data['idEquipamento'] ?> "
                          data-nome="<?php echo $data['nome'] ?>" 
                          data-modelo="<?php echo $data['modelo'] ?>"
                          data-patrimonio="<?php echo $data['patrimonio'] ?>" 
                          data-estado="<?php echo $data['estado'] ?>"
                          data-periodo-preditiva="<?php echo $data['periodoPreditiva'] ?>"
                          data-periodo-preventiva="<?php echo $data['periodoPreventiva'] ?>"
                          data-checklist-preditiva="<?php echo $data['checklistPreditiva'] ?>"
                          data-checklist-preventiva="<?php echo $data['checklistPreventiva'] ?>"                         
                        >
                          <i class="far fa-edit"></i></button>&nbsp;&nbsp;
                        <button type="submit" class="btn btn-danger btn-sm" data-id="<?php echo $data['idEquipamento'] ?>" data-toggle="modal" data-target="#modalDesativar"><i class="far fa-trash-alt"></i></button>
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