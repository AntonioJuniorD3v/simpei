  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ordens de Serviço</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

      <div class="card" style="padding:10px;">
        <!-- /.card-header -->
        <div class="card-body p-0">
          <table class="table table-striped" id="tabelaOrdemServico">
            <thead>
              <tr>
                <th style="width: 10px">cód.</th>
                <th>Resumo</th>
                <th>Equipamento</th>
                <th>Equipe Técnica</th>
                <th>Prioridade</th>
                <th>Criada em</th>
                <th>Vencimento</th>
                <th>Status</th>
                <th>Técnico</th>
                <th style="width: 40px">Detalhes</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($viewData as $data){?>
                <tr>
                  <td><?php echo $data[0] ?></td>
                  <td><?php echo $data['resumo'] ?></td>
                  <td><?php echo $data['nome'] ?></td>
                  <td><?php echo $data[13] ?></td>
                  <td>
                    <?php echo $data['prioridade'] ?>
                  </td>
                  <td><?php echo $data[28] ?></td>
                  <td><?php echo $data[29] ?></td>
                  <td><?php echo $data['status'] ?></td>
                  <td></td>
                  <td>
                  <form method="POST" action="<?php echo BASE_URL ?>ordemServico/detalhesOrdemServico">
                    <input type="number" id="id" name="id" hidden value="<?php echo $data[0] ?>" >
                    <button type="submit" class="btn btn-primary btn-sm" >
                      Detalhes
                    </button>
              </form>
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