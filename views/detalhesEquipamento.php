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
                    <?php echo $e[48] ?>
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
                        <span class="info-box-number text-center text-muted mb-0"><?php echo $e['nome'] ?> <span>
                      </span></span></div>
                    </div>
                  </div>
                  <div class="col-12 col-sm-3">
                    <div class="info-box bg-light">
                      <div class="info-box-content">
                        <span class="info-box-text text-center text-muted">Técnico</span>
                        <span class="info-box-number text-center text-muted mb-0"><?php echo $e[17] ?> <span>
                      </span></span></div>
                    </div>
                </div>
              </div>
                  </div>
                </div>

                <div class="row ">
                  <div class="col-12 ">

                    <h4>Comentários:</h4>
                    <div class="col-md-12">
            <!-- Box Comment -->
            <div class="card card-widget">
              
              <!-- /.card-header -->
         
              <!-- /.card-body -->
              <div class="card-footer card-comments">
                <?php foreach($viewData[$key]['descricao'] as $d){ ?>
                  <div class="card-comment">
                    <!-- User image -->

                    <div class="comment-text m-0">
                      <span class="username">
                      <?php echo $d['nome'] ?>
                        <span class="text-muted float-right"><?php echo $d['data'] ?></span>
                      </span><!-- /.username -->
                      <?php echo $d['descricao'] ?>
                    </div>
                    <!-- /.comment-text -->
                  </div>
                <?php } ?>
              </div>

            </div>
            <!-- /.card -->
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


