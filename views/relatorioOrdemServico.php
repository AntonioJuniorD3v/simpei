  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Relatório</h1>

          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <div class="row">
          <div class="col-12 ">
            <div class="card col-12 row mx-auto">
              <div class="card-header">
                <h4>Filtro <i class="fas fa-filter"></i></h4>
              </div>

              <div class="card-body row">
                
                <form id="formRelatorioOrdemServico" action="http://localhost/simpei/relatorio/gerarRelatorio" method="POST" class="col-12 row">
  
                  <div class="form-group col-3">
                  <label>Data:</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-calendar"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control float-right" id="reservation" name="data" required>
                  </div>
                  </div>
    
                  <div class="form-group col-3">
                    <label>Equipe Técnica</label>
                    <select name="equipeTecnica" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                      <option selected="selected" data-select2-id="3">Todas equipes</option>
                      <?php foreach($setores as $setor){ ?>
                        <option data-select2-id="3"><?php echo $setor['nome'] ?></option>
                      <?php }?>
                    </select>
                  </div>
    
                  <div class="form-group col-3">
                    <label>Técnico</label>
                    <select name="tecnico" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                      <option selected="selected" data-select2-id="3">Todos técnicos</option>
                      <?php foreach($usuarios as $usuario){ ?>
                        <option data-select2-id="3"><?php echo $usuario['nome'] ?></option>
                      <?php }?>
                    </select>
                  </div>

                  <div class="col-12 row">
                  
                  <div class="form-group col-3">
                    <label>Tipo de Manutenção</label>
                    <select name="tipoManutencao" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                      <option selected="selected" data-select2-id="3">Selecionar Todas</option>
                      <option data-select2-id="3">Preventiva</option>
                      <option data-select2-id="3">Preditiva</option>
                      <option data-select2-id="3">Corretiva</option>
                    </select>
                  </div>

                  <div class="form-group col-3">
                    <label>Equipamento</label>
                    <select name="equipamento" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                      <option selected="selected" data-select2-id="3">Todos</option>
                      <?php foreach($equipamentos as $equipamento){ ?>
                        <option data-select2-id="3"><?php echo $equipamento['nome'] ?></option>
                      <?php }?>
                    </select>
                  </div>
                  
                  </div>
                  
                  
                  <div class=" col-12 text-right">
                    <button type="submit" class="btn btn-primary ">Gerar Relatório </button>
                  </div>
                </div>
              </form>
            </div>

            <?php if(!empty($relatorio)) { ?>
              <button type="submit" class="btn btn-success "><i class="fas fa-file-download"></i> Download Relatório</button>
              <br>
              <br>

              <div class="card">
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover"  >
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Resumo</th>
                        <th>Equipamento</th>
                        <th>Equipe Técnica</th>
                        <th>Prioridade</th>
                        <th>Criada em</th>
                        <th>Status</th>
                        <th>Analista</th>
                        <th>Técnico</th>
                      </tr>
                    </thead>
                    <tbody >
                      <?php foreach($relatorio as $r){ ?>
                        <tr>
                          <td><?php echo $r[0] ?></td>
                          <td><?php echo $r['resumo'] ?></td>
                          <td><?php echo $r[22] ?></td>
                          <td><?php echo $r[13] ?></td>
                          <td><?php echo $r['prioridade'] ?></td>
                          <td><?php echo $r['dataInicial'] ?></td>
                          <td><?php echo $r['status'] ?></td>
                          <td><?php echo $r[29] ?></td>
                          <td><?php echo $r[15] ?></td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>

              <div class="card col-7 mx-auto">
                <div class="card-header mx-auto">

                <h5>Quantidade de atendimentos por técnico <i class="fas fa-user-cog"></i></h5>

                </div>
                        <div class="card-body ">
                          <canvas id="myChart" width="100" height="100"></canvas>

                        </div>
              </div>

              <div class="card col-7 mx-auto">
                <div class="card-header mx-auto">

                <h5>Quantidade de Ordem de Serviço <i class="fas fa-chart-line"></i></h5>

                </div>
                        <div class="card-body">
                          <canvas id="chartQuantidadeOrdemServico" width="100" height="100"></canvas>

                        </div>
              </div>
            <?php } ?>

          </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


