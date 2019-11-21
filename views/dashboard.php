  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content row">
        <!-- /.row -->
      <div class="container-fluid">

        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-file-signature"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">O.S em Aberto</span>
                <span class="info-box-number">
                  <?php echo $ordemServicoAberta ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-check-circle"></i></i></span>
              <div class="info-box-content">
                <span class="info-box-text">O.S Aguardando Validação</span>
                <span class="info-box-number"><?php echo $ordemServicoEmValidacao ?></span>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-info-circle"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Equipamentos Parado</span>
                <span class="info-box-number">  <?php echo count($equipamentosDesativado) ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-tools"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Equipamentos em Manutenção</span>
                <span class="info-box-number">  <?php echo count($equipamentosEmManutencao) ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

  
        </div>
        <!-- /.row -->
     
        <div class="row">

          <div class="col-lg-6">
            <div class="card ">
              <div class="card-header">
                <h3 class="card-title">Equipamentos Parado ou em Manutenção</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0" style="overflow: auto; " >
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">Cód.</th>
                      <th>Nome</th>
                      <th>Modelo</th>
                      <th>Estado</th>
                    </tr>
                  </thead>
                  <tbody id="resultado">
                    <?php foreach ($equipamentosDesativado as $data) { ?>
                      <tr >
                          <td><?php echo $data['idEquipamento'] ?></td>
                          <td><a href="equipamento/detalhesEquipamento?id=<?php echo $data['idEquipamento'] ?>" ><?php echo $data['nome'] ?></a></td>
                          <td><?php echo $data['modelo'] ?></td>
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
                        </tr>
                    <?php } ?>
                    <?php foreach ($equipamentosEmManutencao as $data) { ?>
                      <tr >
                          <td><?php echo $data['idEquipamento'] ?></td>
                          <td><a href="equipamento/detalhesEquipamento?id=<?php echo $data['idEquipamento'] ?>" ><?php echo $data['nome'] ?></a></td>
                          <td><?php echo $data['modelo'] ?></td>
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
                        </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
      
          </div>

          <div class="col-lg-6">

          <div class="card ">
              <div class="card-header">
                <h3 class="card-title">Manutenções nos últimos 7 dias</h3>

              </div>
              <div class="card-body">
                <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                  <canvas id="barChart" style="height: 230px; min-height: 230px; display: block; width: 487px;" width="487" height="230" class="chartjs-render-monitor"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
        </div>

        <div class="row">
        <div class="col-lg-6">
            <div class="card ">
              <div class="card-header">
                <h3 class="card-title">Próximas Manutenções Preditivas</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0" style="overflow: auto; " >
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">Cód.</th>
                      <th>Nome</th>
                      <th>Modelo</th>
                      <th>Próxima Manutenção</th>
                      <th>Estado</th>
                    </tr>
                  </thead>
                  <tbody id="resultado">
                    <?php foreach ($proximasManutencoesPreditivas as $data) { ?>
                      <tr >
                          <td><?php echo $data['idEquipamento'] ?></td>
                          <td><a href="equipamento/detalhesEquipamento?id=<?php echo $data['idEquipamento'] ?>" ><?php echo $data['nome'] ?></a></td>
                          <td><?php echo $data['modelo'] ?></td>
                          <td><?php echo $data['proximaManutencaoPreditiva'] ?></td>
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
                        </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
      
          </div>
          <div class="col-lg-6">
            <div class="card ">
              <div class="card-header">
                <h3 class="card-title">Proximas Manutenções Preventivas</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0" style="overflow: auto; " >
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">Cód.</th>
                      <th>Nome</th>
                      <th>Modelo</th>
                      <th>Próxima Manutenção</th>
                      <th>Estado</th>
                    </tr>
                  </thead>
                  <tbody id="resultado">
                    <?php foreach ($proximasManutencoesPreventivas as $data) { ?>
                      <tr >
                          <td><?php echo $data['idEquipamento'] ?></td>
                          <td><a href="equipamento/detalhesEquipamento?id=<?php echo $data['idEquipamento'] ?>" ><?php echo $data['nome'] ?></a></td>
                          <td><?php echo $data['modelo'] ?></td>
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
                        </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
      
          </div>
        
        </div>
     
      </div>
    </section>
 
  </div>

