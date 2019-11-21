  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper ">
    <!-- Content Header (Page header) -->
    <div class="content-header col-4 mx-auto">
      <div class="container-fluid">
        <div class="row ">
          <div class="">
            <h1 class="m-0 text-dark">Alterar Senha</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

    <div class="card card-primary col-4 mx-auto">

              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="<?php echo BASE_URL ?>usuario/mudarSenha" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Senha Atual</label>
                    <input type="password" class="form-control" name="senhaAntiga" id="exampleInputEmail1" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nova Senha</label>
                    <input type="password" class="form-control" name="senhaAtual" id="exampleInputPassword1" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Confirmar Senha</label>
                    <input type="password" class="form-control" name="confirmarSenha" id="exampleInputPassword1" >
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary col-12">Atualizar</button>
                </div>
              </form>
            </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->