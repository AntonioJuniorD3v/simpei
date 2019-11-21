  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Histórico do Equipamento
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">

      <!-- row -->
      <div class="row">
        <div class="col-md-12">
          <!-- The time line -->
          <ul class="timeline">

          <?php foreach($viewData as $key => $e){ ?>
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-red">
                    <?php echo $e[37] ?>
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>


              <div class="timeline-item">

                <h2 class="timeline-header"><a href="#"><?php echo $e[0].' - '.$e['resumo'] ?></a> </h2>
 
                <div class="timeline-body ">
                <div class="">
                  <h4>Informações:</h4>
                  <div style="margin-left: 20px; ">
                  <div class="row">
                  <div class="col-12 col-sm-3">
                    <div class="info-box bg-light">
                      <div class="info-box-content">
                        <span class="info-box-text text-center text-muted">Tipo Manutenção</span>
                        <span class="info-box-number text-center text-muted mb-0"><?php echo $e['tipoManutencao'] ?></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-sm-3">
                    <div class="info-box bg-light">
                      <div class="info-box-content">
                        <span class="info-box-text text-center text-muted">Setor</span>
                        <span class="info-box-number text-center text-muted mb-0"><?php echo $e[13] ?></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-sm-3">
                    <div class="info-box bg-light">
                      <div class="info-box-content">
                        <span class="info-box-text text-center text-muted">Analista</span>
                        <span class="info-box-number text-center text-muted mb-0"><?php echo $e[30] ?> <span>
                      </span></span></div>
                    </div>
                  </div>
                  <div class="col-12 col-sm-3">
                    <div class="info-box bg-light">
                      <div class="info-box-content">
                        <span class="info-box-text text-center text-muted">Técnico</span>
                        <span class="info-box-number text-center text-muted mb-0"><?php echo $e[15] ?> <span>
                      </span></span></div>
                    </div>
                </div>
              </div>
                  </div>
                </div>

                <div class="row ">
                  <div class="col-12 ">

                    <h4>Comentários:</h4>

                    <div class="col-12 col-sm-12">
                      <div class="info-box bg-light">
                      <div class="info-box-content col-12">

                        <?php foreach($viewData[$key]['descricao'] as $d){ ?>

                          <div class="post col-12">
                            <div class=" col-5">
                              <span class="username">
                                <h5><?php echo $d['nome'] ?></h5>
                              </span>
                            </div>

                            <div class="m-100 col-8" style="margin-left:15px;">
                              <!-- /.user-block -->
                              <p >
                              - <?php echo $d['descricao'] ?>
                              </p>
                            </div>
                          </div>
                          
                        <?php } ?>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              </div>
            </li>
            <!-- END timeline item -->
          <?php } ?>



           
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


